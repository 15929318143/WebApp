<?php
/* Smarty version 3.1.30, created on 2016-10-21 08:46:53
  from "F:\wamp64\www\Github\WebApp\template\admin\classify\updateCate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5809d5fd3e7394_04175819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4449380043aff8af323db444cc66b5a8da6c112' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\classify\\updateCate.html',
      1 => 1477039609,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5809d5fd3e7394_04175819 (Smarty_Internal_Template $_smarty_tpl) {
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
		<form action="admin.php?controller=classify&method=updateCate" method="post">
			<table cellpadding="0" cellspacing="0" border="0" width="80%">
				<caption>修改商品分类信息</caption>
				<tr>
					<th width="20%">字段</th>
					<th width="40%">当前信息</th>
					<th width="40%">更新信息</th>
				</tr>
				<tr>
					<td>分类名称</td>
					<td><?php echo $_smarty_tpl->tpl_vars['row']->value['cName'];?>
</td>
					<td><input type="text" name="cName" placeholder="请输入新的分类名称"></td>
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
