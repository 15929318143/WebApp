<?php

	function C($name, $method) {
		require_once('libs/Controller/'.$name.'Controller.class.php');
		$controller = $name.'Controller';
		$obj = new $controller;
		$obj->$method();	
	}

	function M($name) {
		require_once('libs/Model/'.$name.'Model.class.php');
		$model = $name.'Model';
		return new $model;
	}

	function V($name) {
		require_once('libs/View/'.$name.'View.class.php');
		$view = $name.'View';
		return new $view;
	}
	
	/*
	$path是路径 $name为第三方类名 
	$params是该类初始化时需要指定、赋值的属性，格式为array(属性名=>值)
	*/
	function ORG($path, $name, $params=array()) {
		require_once('libs/ORG/'.$path.$name.'class.php');
		$obj = new $name();
		if(!empty($params)) {
			foreach ($params as $key => $value) {
				$obj->$key($value);
			}
		}
		return $obj;
	}

	function checkSpecialChar($str) {
		return (!get_magic_quotes_gpc())?addslashes($str):$str;
	}
?>