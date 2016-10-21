<?php
/* Smarty version 3.1.30, created on 2016-10-21 08:04:42
  from "F:\wamp64\www\Github\WebApp\template\admin\addAdmin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5809cc1a8479e3_27216690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'beed2269ab43569be2aae9379cb8a247780c3472' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\addAdmin.html',
      1 => 1477037079,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5809cc1a8479e3_27216690 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>添加管理员</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
</head>
<body>
<div id="addAdmin">
	<center>
		<form action="admin.php?controller=admin&method=addAdmin" method="post">
			<table cellspacing="0" cellpadding="0" border="0" width="100%"> 
				<caption>添加管理员</caption>
				<tr>
					<td width="30%">管理员名称:</td>
					<td width="70%"><input type="text" name="username" placeholder="请输入管理员名称"></td>
				</tr>
				<tr>
					<td>管理员密码:</td>
					<td><input type="password" name="password" placeholder="请输入管理员密码"></td>
				</tr>
				<tr>
					<td>管理员邮箱:</td>
					<td><input type="text" name="email" placeholder="请输入管理员邮箱"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="添加管理员"></td>
				</tr>
			</table>
		</form>
	</center>
</div>
</body>
</html><?php }
}
