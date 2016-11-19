<?php
/**
* Mysqli类二次封装
*第一步：完成初始化
*第二步：增、删、改、查的基础函数,即query, execute
*第三步：依托函数query、execute完善各种功能的操作
*第四步：关闭连接
*/
class MysqliDB {
	
	public static $sql = null;        //最后执行的SQL语句
	public static $stmt = null;       //结果集
	public static $config = null;     //数据库配置信息
	public static $mysqli = null;     //mysqli实例对象
	public static $connected = false; //是否已经连接

	/*
	*第一步：完成初始化
	*/
	function __construct($dbconfig='') {
		if (!class_exists('mysqli')) self::throwErr('不支持mysqli,请先开启');
		if (!is_array($dbconfig)) {
			$dbconfig = array(
			'dbhost' => 'localhost',
			'dbuser' => 'root',
			'dbpwd'  => '123456',
			'dbname' => 'website',
			'dbtype' => 'mysql',
			'charset'=> 'utf-8');
		}
		if (empty($dbconfig['dbhost'])) {
			self::throwErr('没有定义数据库配置，请先配置');
		}
		self::$config = $dbconfig;
		if (!isset(self::$mysqli)) {
			$config = self::$config;
			extract($config);
			try {
				self::$mysqli = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
			} catch (Exception $e) {
				self::throwErr($e->getMessage());
			}
			if (self::$mysqli->errno) self::throwErr('数据库连接错误：'.self::$mysqli->error);
			self::$mysqli->query("SET NAMES $charset");
			self::$connected = true;
			unset($config);
		}
	}

	/*
	*第二步：增、删、改、查的基础函数
	*/
	//1.查询（select）函数、返回结果集
	public static function query($sql) {
		$mysqli = self::$mysqli;
		if (!$mysqli) return false;
		self::$sql = $sql;
		$query = $mysqli->query($sql);
		if (!$query) return self::throwErr('查询失败，SQL语句错误：'.$sql);
		return $query;
	}
	//2.增(insert)、删(delete)、改(update)函数,返回受影响的id和条数
	public static function execute($sql) {
		$mysqli = self::$mysqli;
		if (!$mysqli) return false;
		self::$sql = $sql;
		if (!empty(self::$stmt)) self::$stmt = null;
		self::$stmt = $mysqli->prepare($sql);
		$res = self::$stmt->execute();
		if (!$res) self::throwErr('预处理执行失败');
		return array('lastinsertid'=>$mysqli->insert_id, 'affectedrows'=>$mysqli->affected_rows);

	}

	/*
	*第三步：依托函数query、execute完善各种功能的操作
	*/
	//1.1得到所有记录
	public function get_all($sql) {
		$query = self::query($sql);
		while ($row=$query->fetch_assoc()) {
			$rows[] = $row;
		}
		return isset($rows)?$rows:null;
	}
	//1.2得到一条记录
	public function get_one($sql) {
		$query = self::query($sql);
		$row = $query->fetch_assoc();
		return $row;
	}
	//2.1插入(insert)记录
	public function add($table, $data) {
		self::check($table, $data);
		$keys = array_keys($data);
		array_walk($keys, array('MysqliDB', 'addSpecialChar'));
		$keys = join(',', $keys);
		$values = "'".join("','", array_values($data))."'";
		$sql = "INSERT INTO {$table}({$keys}) VALUES({$values});";
		$res = self::execute($sql);
		return $res['lastinsertid'];
	}
	//2.2删除(delete)记录
	public function del($table, $where=null, $order=null, $limit=0) {
		self::check($table);
		$sql = "DELETE FROM {$table}"
				.self::parseWhere($where)
				.self::parseOrder($order)
				.self::parseLimit($limit);
		$res = self::execute($sql);
		return $res['affectedrows'];
	}
	//2.3修改(update)记录
	public function update($table, $data, $where=null, $order=null, $limit=0) {
		self::check($table, $data);
		$sets = '';
		foreach ($data as $key => $value) {
			$sets .= "`$key`= '$value', ";
		}
		$sets = rtrim($sets, ', ');
		$sql = "UPDATE {$table} SET {$sets}"
				.self::parseWhere($where)
				.self::parseOrder($order)
				.self::parseLimit($limit).";";
		$res = self::execute($sql);
		return $res['affectedrows'];
	}
	//3.1普通的查找方法
	public function find($table, $where='', $group='', $having='', $order='', $limit='', $fields='*') {
		self::check($table);
		$sql = "SELECT".self::parseFields($fields)."FROM {$table}"
				.self::parseWhere($where)	
				.self::parseGroup($group)	
				.self::parseHaving($having)	
				.self::parseOrder($order)	
				.self::parseLimit($limit).";";
		return self::get_all($sql);	
	}
	//3.2根据ID查找
	public function find_by_id($table, $id, $fields='*') {
		self::check($table);
		$sql = "SELECT ".self::parseFields($fields)." FROM {$table} WHERE id = {$id};";
		return self::get_all($sql);
	}

/****************************条件解析函数**************************/
	public static function parseFields($fields=null) {
		if (is_array($fields)) {
			array_walk($fields, array('MysqliDB', 'addSpecialChar'));
			return implode(', ', $fields);
		}
		if (is_string($fields)) {
			if (strpos($fields, '`')===false) {
				$fields = explode(',', $fields);
				array_walk($fields, array('MysqliDB', 'addSpecialChar'));
				return implode(', ', $fields);
			}
			return $fields;
		}
		return null;
	}

	public static function parseWhere($where=null) {
		if (is_string($where)&&!empty($where)) return " WHERE ".$where;
		return null;
	}

	public static function parseGroup($group=null) {
		if (is_array($group)) return " GROUP BY ".implode(',', $group);
		if (is_string($group)&&!empty($group)) return " GROUP BY $group";
		return null;
	}

	public static function parseHaving($having) {
		if (is_string($having)&&!empty($having)) return " HAVING $having";
		return null;
	}

	public static function parseOrder($order=null) {
		if (is_array($order)) return " ORDER BY ".implode(',', $order);
		if (is_string($order)&&!empty($order)) return " ORDER BY ".$order;
		return null;
	}

	public static function parseLimit($limit=null) {
		if (is_array($limit)) {
			if (count($limit>1)) return " LIMIT ".$limit[0].','.limit[1];
			return " LIMIT ".limit[0];
		}
		if (is_string($limit)) return " LIMIT $limit";
		return null;
	}
/*****************************************************************/

	public static function check($table, $data=null) {
		if (isset($data)) {
			if (!is_array($data)) $errMsg[]="请以数组的形式传入数据<br>";
		}
		if (!$table) {
			$errMsg[] = '请选择要操作的数据表';
			self::throwErr($errMsg);
		}
		return true;
	}

	public static function addSpecialChar(&$value) {
		if ($value==='*'||strpos($value, '.')!==false||strpos($value, '`')!==false) {
			# code...nothing to be done
		} 
		if (strpos($value, '`')===false) $value = ' `'.trim($value).'` ';
		return $value;
	}
	//自定义错误处理函数
	public static function throwErr($error) {
		echo '<div style="width:90%;background:#222;font-size:20px;color:red;">'
			 	.$error.
			 '</div>';
		return false;
	}

	public function close() {
		self::$mysqli = null;
	}
}
/*require_once('../../config.php');
$mysqli = new MysqliDB();
$sql = "select * from user;";
$data = array(
	'username'=>'fuck',
	'password'=>md5(123465),
	);

var_dump($mysqli->find_by_id('user', '17'));*/
?>