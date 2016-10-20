<?php
	header('Content-Type:text/html; charset=utf8');
	session_start();
	require_once('config.php');
	require_once('frameWork/fuck.php');
	FUCK::go($config);
?>