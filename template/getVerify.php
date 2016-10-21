<?php
	session_start();
	require_once('../frameWork/libs/core/Code.class.php');
	$font = 'F:\wamp64\www\Github\WebApp\fonts\msyhbd.ttc';
	$code = new Code($font);
	$code->createImage();
	$code->showImage();
?>