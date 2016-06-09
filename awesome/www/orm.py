#!/usr/bin/env python
# coding=utf-8

__author__ = 'Kn'

import asyncio
import logging
import aiomysql

# 记录操作日志
def log(sql, args=()):
    logging.info('SQL:%s' % sql)

# 创建数据库连接池，避免频繁打开或关闭数据库连接
async def create_pool(loop, **kw):
    logging.info('create database connection pool...')
    global __pool
    # 调用一个子协程来创建全局连接池，create_pool返回一个pool实例对象
    __pool = await aiomysql.create_pool(
            # 连接的基本属性设置
            host = kw.get('host', 'localhost'),    # 数据库服务器位置，本地
            port = kw.get('port', 3306),           # MySQL端口号 
            user = kw['user'],                     # 登录用户名
            password = kw['password'],             # 登录密码
            db = kw['db'],                         # 数据库名
            charset = kw.get('charset', 'utf8'),   # 设置连接使用的编码格式
            autocommit = kw.get('autocommit', True),
            
            # 可选项设置
            maxsize = kw.get('maxsize', 10),       # 最大请求
            minsize = kw.get('minsize', 1),        # 最少请求
            loop = loop                            # 设置消息循环
            )


# select 返回结果集
async def select(sql, args, size=None):
    # sql: sql语句
    # args: 填入sql的参数，list类型，如['20160607','shit']
    # size: 获取记录数量
    log(sql, args)
    global __pool
    # 从连接池中获取一个连接
    with await __pool as conn: # with...as...的作用相当于try...exception...
        # 打开一个DictCursor，以dict的形式返回结果的游标
        cur = await conn.cursor(aiomysql.DictCursor)
        # sql的点位符为'?',MySQL的点位符为'%s',替换之
        await cur.execute(sql.replace('?', '%s'), args or ())
        # 如果传入size参数，就通过fetchmany()获取最多指定数量的记录
        if size:
            resultset = await cur.fetchmany(size)
        # 否则，通过fetchall()获取所有记录
        else:
            resultset = await cur.fetchall()
        await cur.close()
        logging.info('rows returned: %s' % len(resultset))
        return resultset

async def execute(sql, args, autocommit=True):
    log(sql)
    with await __pool as conn:
        if not autocommit:
            await conn.begin()
            '''
            连接对象的db.begin()方法用于开始一个事务
            如果数据库的AUTOCOMMIT已经开启就关闭它
            直到事务调用commit()和rollback()结束
            '''
        try:
            cur = await conn.cursor()
            await cur.execute(sql.replace('?', '%s'), args)
            affected = cur.rowcount
            '''
            指针对象的cursor.rowcount属性指出上次查询或更新所发生行数。
            -1表示还没开始查询或没有查询到数据
            '''
            await cur.close()
            if not autocommit:
                await conn.commit()   # 连接对象的db.commit()方法表示事务提交
        except BaseException as e:    # if you wana get all errors that you will get BaseException .
            if not commit:
                await conn.rollback() # 连接对象的db.rollback()方法表示事务回退
            raise
        return affected

# 该方法用来将其占位符拼接起来成'?,?,?'的形式，num表示为参数的个数
def create_args_string(num):
    L = []
    for i in range(num):
        L.append('?')
    return ', '.join(L)

# 父域
class Field(object):
                  # 字段名称，字段类型，是否为主键，默认参数是否存在
    def __init__(self, name, column_type, primary_key, default):
        self.name = name
        self.column_type = column_type
        self.primary_key = primary_key
        self.default = default
    
    # 返回类名（域名），字段类型，字段名
    def __str__(self):
        return '<%s, %s:%s>' % (self.__class__.__name__, self.column_type, self.name)

# 字符串类型域，映射varchar
class StringField(Field):
    # ddl 用于定义数据类型
    def __init__(self, name=None, primary_key=False, default=None, ddl='varchar(10)'):
        super().__init__(name, ddl, primary_key, default)

# 布尔类型域，映射boolean
class BooleanField(Field):

    def __init__(self, name=None, default=False):
        super().__init__(name, 'boolean', False, default)

# 整型域，映射Integer 
class IntegerField(Field):

    def __init__(self, name=None, primary_key=False, default=0):
        super().__init__(name, 'bigint', primary_key, default)

# 浮点型域，映射Float
class FloatField(Field):

    def __init__(self, name=None, primary_key=False, default=0.0):
        super().__init__(name, 'real', primary_key, default)

# 文本类型域
class TextField(Field):

    def __init__(self, name=None, default=None):
        super().__init__(name, 'text', False, default)

# 将具体的子类如User的映射信息读取出来
class ModelMetaclass(type):
    # cls: 当前准备创建的类对象，即元类的实例
    # name: 类名。例如User继承于Model，当使用该元类创建User类时，name=User
    # bases: 父类的元组
    # attrs: Model子类的属性和方法的字典
    def __new__(cls, name, bases, attrs):
        # 排除Model类本身
        if name == 'Model':
            return type.__new__(cls, name, bases, attrs)
        # 获取table名称.若没有定义__table__属性，将类名作为表名，这里注意or的用法
        tableName = attrs.get('__table__', None) or name
        logging.info('found model: %s (table: %s)' % (name, tableName))
        # 获取所有的Field和主键名
        mappings = dict()  # 用字典来存储类属性与数据库表的列的映射关系
        fields = []        # 用于保存主键外的属性
        primaryKey = None  # 用于保存主键
        # k是属性名，v是定义域。如name=StringField(ddl="varchar50"),k=name,v=StringField(ddl="varchar50")
        for k, v in attrs.items():
            if isinstance(v, Field):
                logging.info(' found mapping: %s ==> %s' % (k, v))
                mappings[k] = v
                # 如果当前键为主键
                if v.primary_key:
                    # 如果数据库中主键已存在，则报错，并返回错误信息
                    if primaryKey:
                        raise RuntimeError('Duplicate primary key for field: %s' % (k))
                    # 否则把找到的主键存入数据库中
                    primaryKey = k
                # 如果当前键不是主键，则保存到fields中
                else:
                    fields.append(k)
        if not primaryKey:
            raise RuntimeError('Primary key not found.')
        # 从类属性中删除已经加入了映射字典的键，以免重名
        for k in mappings.keys():
            attrs.pop(k)
        # 将非主键的属性变形，存放在escaped_fields中，方便增删改查语句的书写
        escaped_fields = list(map(lambda f:'`%s`' % f, fields))
        attrs['__mappings__'] = mappings      # 保存属性和列的映射关系
        attrs['__table__'] = tableName        # 表名
        attrs['__primary_key__'] = primaryKey # 主键属性名
        attrs['__fields__'] = fields          # 除主键外的属性名
    # 构造默认的SELECT, INSERT, UPDATE 和 DELETE 语句
        attrs['__select__'] = 'select `%s`, %s from `%s`' % (primaryKey, ', '.join(escaped_fields), tableName)
        attrs['__insert__'] = 'insert into `%s` (%s, `%s`) value (`%s`)' % (tableName,', '.join(escaped_fields), primaryKey, create_args_string(len(escaped_fields) + 1))
        attrs['__update__'] = 'update `%s` set %s where `%s`=?' % (tableName, ', '.join(map(lambda f: '`%s`=?' % (mappings.get(f).name or f), fields)), primaryKey)
        attrs['__delete__'] = 'delete from `%s` where `%s`=?' % (tableName, primaryKey)
        return type.__new__(cls, name, bases, attrs)

# 所有ORM映射的基类，继承自dict，通过ModelMetaclass元类来构造类
class Model(dict, metaclass=ModelMetaclass):
    
    # 初始化函数，调用其父类（dict）的方法
    def __init__(self, **kw):
        super(Model, self).__init__(**kw)

    def __getattr__(self, key):
        try:
            return self[key]
        except KeyError:
            raise AttributeError(r"'Model' object has no attribute '%s'" % key)

    def __setattr__(self, key, value):
        self[key] = value
    
    # 通过键取值，若值不存在，返回None
    def getValue(self, key):
        return getattr(self, key, None)
    
    #通过键取值，若值不存在，则返回默认值
    def getValueOrDefault(self, key):
        value = getattr(self, key, None)
        if value is None:
            field = self.__mappings__[key]  # field是一个定义域，比如FloatField
            if field.default is not None:
                # 1 id的StringField.default=next_id,因此调用该函数生成独立id，实现自增
                # 2 FloatField.default=time.time数，因此调用time.time函数返回当前时间，当前时间做id
                # 普通属性的StringField默认为None,因此返回None
                value = field.default() if callable(field.default) else field.default
                logging.debug('using default value for %s: %s' % (key, str(value)))
                # 通过default取到值之后将其作为当前值
                setattr(self, key, value)
        return value

    @classmethod
    async def findall(cls, where=None, args=None, **kw):
        ' find obiect by where clause. '
        '''
        cls表示当前类或类的对象可调用该方法，where表示sql中的where，args记录下所有的
        需要用点位符'?'的参数,**kw是一个tuple,里面有多个dict键值对，
        '''
        sql = [cls.__select__]
        # 我们定义的默认select语句没有where，因此若指定有where，需要在select语句中追加它
        if where:
            sql.append('where')
            sql.append(where)
        if args is None:
            args = []
        orderBy = kw.get('orderBy', Nonw)
        if orderBy:
            sql.append('order by')
            sql.append(orderBy)
        limit = kw.get('limit', None)
        if limit is not None:
            sql.append('limit')
            if isinstance(limit, int):
                sql.append('?')
                args.append(limit)
            elif isinstance(limit, tuple) and len(limit) == 2:
                sql.append('?, ?')
                args.append(limit)
            else:
                raise ValueError('Invailid limit value: %s' % str(limit))
        rs = await select(' '.join(sql), args)
        return [cls(**r) for  r in rs]
    
    @classmethod
    async def findNumber(cls, selectField, where=None, args=None):
        ' find number by select and where. '
        sql = ['select %s _num_from `%s`' % (selectField, cls.__table__)]
        if where:
            sql.append('where')
            sql.append(where)
        rs = await select(' '.join(sql), args, 1)
        if  len(rs) == 0:
            return None
        return rs[0]['_num_']

    @classmethod 
    async def find(cls, pk):
        ' find object by primary key. '
        rs = await select('%s where `%s`=?' % (cls.__select__, cls.__primary_key__), [pk], 1)
        if len(rs) == 0:
            return None
        # 注意，我们在select函数中，打开的是DictCursor，它以dict的形式返回结果
        return cls(**rs[0])

    async def save(self):
        print('进入save...')
        args = list(map(self.getValueOrDefault, self.__fields__))
        args.append(self.getValueOrDefault(self.__primary_key__))
        rows = await execute(self.__insert__, args)
        print('返回行数：', rows)
        if rows != 1:
            logging.warn('failed to insert record: affected rows: %s' % rows)
    
    async def update(self):
        args = list(map(self.getValue, self.__fields__))
        args.append(self.getValue(self.__primary_key__))
        rows = await execute(self.__update__, args)
        print('更新成功...')
        if row != 1:
            logging.warn('failed to update by primary key: affected rows: %s' % rows)

    async def remove(self):
        args = [self.getValue(self.__primary_key__)]
        rows = await execute(self.__delete__, args)
        print('删除成功...')
        if rows != 1:
            logging.warn('failed to remove by primary key: affected rows: %s' % rows)



