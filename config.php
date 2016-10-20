<?php
	$config = array(
		/********连接数据库配置*******/ 
		'dbconfig' => array(
			'dbhost' => 'localhost',
			'dbuser' => 'root',
			'dbpwd'  => '123456',
			'dbname' => 'shopadmin',
			'dbtype' => 'mysql',
			'charset'=> 'utf8',
			'dsn' => 'mysql:host=localhost;dbname=shopadmin'
			),
		/****************************/

		/******第三方类库smarty的配置参数******/
		'viewconfig' => array(
			'setRightDelimiter' => '}',
			'setLeftDelimiter' => '{',
			'setTemplateDir'  => 'template',
			'setCompileDir'  => 'compile',
			'setCacheDir'   => 'cache'
			)
		/***************************************/
		);
?>