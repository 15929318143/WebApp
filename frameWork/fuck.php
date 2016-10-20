<?php
	$currentDir = dirname(__FILE__);
	include_once($currentDir.'/include.list.php');
	foreach ($paths as $path) {
		require_once($currentDir.'/'.$path);
	}
	class FUCK {

		public static $config;
		public static $controller;
		public static $method;

		private static function init_db() {
			DB::init('MysqliDB', self::$config['dbconfig']);
		}

		private static function init_view() {
			VIEW::init('Smarty', self::$config['viewconfig']);
		}

		private static function init_controller() {
			if (preg_match("/admin/", $_SERVER['PHP_SELF'], $matchs)) {
				self::$controller = isset($_GET['controller'])?checkSpecialChar($_GET['controller']):'admin';
			} else {
				self::$controller = isset($_GET['controller'])?checkSpecialChar($_GET['controller']):'index';
			}
				
		}

		private static function init_method() {
			if (preg_match("/admin/", $_SERVER['PHP_SELF'], $matchs)) {
				self::$method = isset($_GET['method'])?checkSpecialChar($_GET['method']):'login';
			} else {
				self::$method = isset($_GET['method'])?checkSpecialChar($_GET['method']):'index';
			}
				
		}

		public static function go($config) {
			self::$config = $config;
			self::init_db();
			self::init_view();
			self::init_controller();
			self::init_method();
			C(self::$controller, self::$method);
		}
	}
?>