<?php
/* Smarty version 3.1.30, created on 2016-10-15 15:32:11
  from "F:\wamp64\www\shopAdmin\template\admin\top.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5801db7bf27895_92426813',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faf17c617cbbb2d2133622b8e9fa05bf971d837d' => 
    array (
      0 => 'F:\\wamp64\\www\\shopAdmin\\template\\admin\\top.html',
      1 => 1476516729,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5801db7bf27895_92426813 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>Admin-Top</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
</head>
<body>
<dir id="top">
	<div class="logoBar">
		<ul>
			<li><img src="images/admin_icon/logo.png" alt="logo"></li>
			<li>东东电子商务后台管理系统</li>
		</ul>
	</div>
	<div class="navBar">
		<ul>
			<b>欢迎 <?php echo (($tmp = @$_smarty_tpl->tpl_vars['username']->value)===null||$tmp==='' ? '您' : $tmp);?>
</b>
			<li><a href="admin.php?controller=admin&method=main" target="rightFrame">首页</a></li>
			<li><a href="#">前进</a></li>
			<li><a href="#">后退</a></li>
			<li><a href="#">刷新</a></li>
			<li><a href="admin.php?controller=admin&method=logout" target="_top">退出</a></li>
		</ul>
	</div>
	<div class="current">
		<ul>
			<li>管理员</li>
			<li>后台管理</li>
		</ul>
	</div>
</dir>
</body>
</html><?php }
}
