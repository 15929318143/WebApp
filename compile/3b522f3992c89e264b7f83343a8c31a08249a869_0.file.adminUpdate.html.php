<?php
/* Smarty version 3.1.30, created on 2016-10-16 13:47:24
  from "F:\wamp64\www\shopAdmin\template\admin\adminUpdate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5803146c5c5de5_78751096',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b522f3992c89e264b7f83343a8c31a08249a869' => 
    array (
      0 => 'F:\\wamp64\\www\\shopAdmin\\template\\admin\\adminUpdate.html',
      1 => 1476596838,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5803146c5c5de5_78751096 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>修改管理员信息</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
</head>
<body>
<div id="adminUpdate">
	<center>
		<form action="admin.php?controller=admin&method=adminUpdate" method="post">
			<table cellpadding="0" cellspacing="0" border="0" width="80%">
				<caption>修改管理员信息</caption>
				<tr>
					<th width="20%">字段</th>
					<th width="40%">当前信息</th>
					<th width="40%">更新信息</th>
				</tr>
				<tr>
					<td>管理员名称</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['username'];?>
</td>
					<td><input type="text" name="username" placeholder="请输入新管理员名称"></td>
				</tr>
				<tr>
					<td>管理员密码</td>
					<td><input type="password" name="password0" placeholder="请输入原密码"></td>
					<td><input type="password" name="password1" placeholder="请输入新密码"></td>
				</tr>
				<tr>
					<td>管理员邮箱</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
					<td><input type="text" name="email" placeholder="请输入新邮箱"></td>
				</tr>
			</table>
			<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['row']->value['id'];?>
">
			<input type="submit" name="submit" value="确认修改"/>
			<input type="reset" name="reset"/>
		</form>
	</center>
</div>
</body>
</html><?php }
}
