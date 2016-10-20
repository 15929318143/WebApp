<?php
/**
* 
*/
class DB {
	
	public static $db;

	public static function init($dbtype, $config='') {
		self::$db = new $dbtype($config);
	}

	public static function query($sql) {
		return self::$db->query($sql);
	}

	public static function execute($sql) {
		return self::$db->execute($sql);
	}

	public static function get_all($sql) {
		return self::$db->get_all($sql);
	}

	public static function get_one($sql) {
		return self::$db->get_one($sql);
	}

	public static function add($table, $data) {
		return self::$db->add($table, $data);
	}

	public static function del($table, $where=null, $order=null, $limit=0) {
		return self::$db->del($table, $where, $order, $limit);
	}

	public static function update($table, $data, $where=null, $order=null, $limit=0) {
		return self::$db->update($table, $data, $where, $order, $limit);
	}

	public static function find($table, $where=null, $group=null, $having=null, $order=null, $limit=0, $fields='*') {
		return self::$db->find($table, $where, $group, $having, $order, $limit, $fields);
	}

	public static function find_by_id($table, $id, $fields='*') {
		return self::$db->find_by_id($table, $id, $fields);
	}

	public static function close() {
		return self::$db->close();
	}
}
?>