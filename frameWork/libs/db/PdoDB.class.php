<?php
/**
* PDO类二次封装
*第一步：完成初始化
*第二步：增、删、改、查的基础函数,即query, execute
*第三步：依托函数query、execute完善各种功能的操作
*第四步：关闭连接
*/
class PdoDB {
	
	public static $sql = null;       //最后执行的SQL语句
	public static $stmt = null;      //保存结果集
	public static $link = null;      //连接标识符
	public static $error = null;     //错误信息
	public static $config = null;    //连接数据库的配置信息
	public static $numRows = null;   //受影响的条数 
	public static $pconnect = false; //长连接标识符
	public static $dbversion = null; //数据库版本信息
	public static $connected = false;//是否已经连接
	public static $lastInsertId=null;//最后插入的ID号

	/*
	*第一步：完成初始化
	*/
	public function __construct($dbconfig='') {
		/*第一步：检查是否开启PDO*/
		if (!class_exists('PDO')) return self::throwErr('不支持PDO, 请先开启');
		/*第二步：检查是否传入配置信息，如果没有,则采用默认配置*/
		if (!is_array($dbconfig)) {
			$dbconfig = array(
				'dbhost' => 'localhost',
				'dbuser' => 'root',
				'dbpwd'  => '123456',
				'dbname' => 'newsreport',
				'dbtype' => 'mysql',
				'charset'=> 'utf-8',
				'dsn'    => "mysql:host=localhost;dbname=newsreport"
			);
		}
		if (empty($dbconfig['dbhost'])) {
			return self::throwErr('没有定义数据库配置，请先配置');
		} else {
			self::$config = $dbconfig;
		}
		if (empty(self::$config['params'])) self::$config['params'] = array();
		/*第三步：检查是否开启连接，如果没有，则执行开启操作
		eg:$pdo= new PDO($dsn, $user, $pwd, array(PDO::ATTR_PERSISTERNT=>true));*/
		if (!isset(self::$link)) {
			$configs = self::$config;
			//是否开启长连接（persistent:持续的，连续的）
			if (self::$pconnect) {
				$configs['params'][constant('PDO::ATTR_PERSISTENT')] = true;
			}
			extract($configs);
			//开始连接
			try {
				self::$link = new PDO($dsn, $dbuser, $dbpwd, $params);
			} catch (PDOException $e) {
				self::throwErr($e->getMessage());
			}
			if (!self::$link) return self::throwErr('PDO连接错误');
			//如果连接成功，设置字符集
			self::$link->exec('SET NAMES '.$charset);
			//设置数据库的版本信息
			self::$dbversion = self::$link->getAttribute(constant('PDO::ATTR_SERVER_VERSION'));
			self::$connected = true;
			//初始化结束，注销掉配置信息
			unset($configs);
		}
	}

	/*
	*第二步：增、删、改、查的基础函数
	*/
	//1.查询（select）函数、返回结果集
	public static function query($sql) {
		$link = self::$link;
		if (!$link) return false;
		//之前是否有结果集，如果有，则释放结果集
		if (!empty(self::$stmt)) self::$stmt=null;
		self::$sql = $sql;
		self::$stmt = $link->prepare($sql);
		//检查结果集是否有错误
		self::checkErr();
		$res = self::$stmt->execute();
		return $res;
	}

	//2.增(insert)、删(delete)、改(update)函数,返回受影响的id和条数
	public static function execute($sql) {
		$link = self::$link;
		if (!$link) return false;
		//之前是否有结果集，如果有，则释放结果集
		if (!empty(self::$stmt)) self::$stmt = null;
		//保存SQL语句
		self::$sql = $sql;
		//预处理语句，产生结果集
		self::$stmt = $link->prepare($sql);
		//检查错误
		self::checkErr();
		//执行，返回boolean结果
		$res = self::$stmt->execute();
		if (!$res) return false;
		self::$lastInsertId = $link->lastInsertId();
		//受影响条数
		self::$numRows = self::$stmt->rowCount();
		return 'affected rows:'.self::$numRows;
	}

	/*
	*第三步：依托函数query、execute完善各种功能的操作
	*/
	//1.1得到所有记录
	public function get_all($sql) {
		self::query($sql);
		$res = self::$stmt->fetchAll(constant("PDO::FETCH_ASSOC"));
		return $res;
	}
	//1.2得到一条记录
	public function get_one($sql) {
		self::query($sql);
		$res = self::$stmt->fetch(constant("PDO::FETCH_ASSOC"));
		return $res;
	}
	//2.1插入(insert)记录
	public function add($table, $data) {
		if (!$table) return self::throwErr('请选择要操作的数据表!');
		if (!is_array($data)) return self::throwErr('请以数组的形式传入数据');
		$keys = array_keys($data);
		//回调函数：逐个给key添加反引号。addSpecialChar是类PdoDB的方法
		array_walk($keys, array('PdoDB', 'addSpecialChar'));
		$keys = join(',', $keys);
		$values = "'".join("','", array_values($data))."'";
		$sql = "INSERT INTO {$table}({$keys})  VALUES({$values});";
		return self::execute($sql);
	}
	//2.2删除(delete)记录
	public function del($table, $where=null, $order=null, $limit=0) {
		$sql = "DELETE FROM {$table}"
				.self::parseWhere($where)
				.self::parseOrder($order)
				.self::parseLimit($limit).";";
		return self::execute($sql);
	}
	//2.3修改(update)记录
	public function update($table, $data, $where=null, $order=null, $limit=0) {
		$sets = '';
		foreach ($data as $k => $v) {
			$sets .= "`$k` = '$v',";
		}
		$sets = rtrim($sets, ',');
		$sql = "UPDATE {$table} SET {$sets}"
				.self::parseWhere($where)
				.self::parseOrder($order)
				.self::parseLimit($limit).";";
		return self::execute($sql);
	}
	//3.1普通的查找方法
	public function find($table, $where=null, $group=null, $having=null, $order=null, $limit=null, $fields='*') {
		$sql = "SELECT ".self::parseFields($fields)." FROM {$table}"
				.self::parseWhere($where)
				.self::parseGroup($group)
				.self::parseHaving($having)
				.self::parseOrder($order)
				.self::parseLimit($limit).";";
		$data = self::get_all($sql);
		return count($data)==1?$data[0]:$data;
	}
	//3.2根据ID查找
	public function find_by_id($table, $id, $fields='*') {
		$sql = "SELECT ".self::parseFields($fields)." FROM {$table} WHERE id='$id';";
		return self::get_all($sql);
	}

/****************************条件解析函数**************************/
	public static function parseFields($fields=null) {
		if (is_array($fields)) {
			array_walk($fields, array('PdoDB', 'addSpecialChar'));
			return implode(',', $fields);//以逗号连接数组
		}
		if (is_string($fields)) {
			if (strpos($fields, '`')==false) {
				$fields = explode(',', $fields);//以逗号分隔字符串
				array_walk($fields, array('PdoDB', 'addSpecialChar'));
				return implode(',', $fields);
			}
			return $fields;
		}
		return null;
	}

	public static function parseWhere($where=null) {
		if (is_string($where)&&!empty($where)) return " WHERE $where ";
		return null;
	}

	public static function parseGroup($group=null) {
		if (is_array($group)) return "GROUP BY ".implode(',', $group);
		if (is_string($group)&&!empty($group)) return " GROUP BY $group ";
		return null; 
	}

	public static function parseHaving($having=null) {
		if (is_string($having)&&!empty($having)) return " HAVING $having ";
		return null;
	}

	public static function parseOrder($order=null) {
		if (is_array($order)) return " ORDER BY ".implode(',', $order);
		if (is_string($order)&&!empty($order)) return " ORDER BY $order "; 
		return null;
	}

	public static function parseLimit($limit=null) {
		if (is_array($limit)) {
			if (count($limit)>1) return " LIMIT ".$limit[0].','.$limit[1];
			return " LIMIT ".$limit[0];
		}
		if (is_string($limit)) return " LIMIT $limit";
		return null;
	}
/*****************************************************************/
	//添加特殊字符
	public static function addSpecialChar(&$value) {
		if ($value==='*'||strpos($value, '.')!==false||strpos($value, '`')!==false) {
			//1. "*"不用做任何处理
			//2. "`".$key1."`,`".$key2."`"……类似的，不做任何处理
			//3. "`key1`, `key2`,`key3`……"类似的，不做任何处理
			# so...nothing to be done!
		} 
		//trim($str)不指明参数，默认删除$str两侧的空白字符
		//trim(原字符串，要删除的字符)
		if (strpos($value, '`')===false) $value = '`'.trim($value).'`';
		return $value;
	}
	//检查错误
	public static function checkErr() {
		$obj = empty(self::$stmt)?self::$link:self::$stmt;
		$msgErr = $obj->errorInfo();
		if ($msgErr[0] != 00000) {
			self::$error = ' SQLSTATE'.$msgErr[0]."<br>".'
			SQL error:'.$msgErr[2].'
			Error SQL:'.self::$sql;
			return self::throwErr(self::$error);
		}
		if (self::$sql==='') {
			return self::throwErr('SQL语句为空');
		}
	}
	// 自定义异常处理
	public static function throwErr($msgErr) {
		echo '<div style="width:40%;background:#555;color:red;font-size:20px">
				'.$msgErr.'
			  </div>';
		return false;
	}
	// 关闭连接
	public static function close() {
		self::$link = null;
	}
}
/*$pdo = new PdoDB();
$sql = "SELECT * FROM `admin` WHERE `username`='root'";
var_dump($pdo->find('admin',"`username` = 'root'"));*/
?>