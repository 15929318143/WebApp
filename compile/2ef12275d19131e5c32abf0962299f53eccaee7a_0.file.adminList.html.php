<?php
/* Smarty version 3.1.30, created on 2016-10-23 08:36:58
  from "F:\wamp64\www\Github\WebApp\template\admin\adminList.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580c76aac96dd2_33487673',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2ef12275d19131e5c32abf0962299f53eccaee7a' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\adminList.html',
      1 => 1477100812,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580c76aac96dd2_33487673 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>管理员列表</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
</head>
<body>
<div id="adminList">
	<center>
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<caption><a href="admin.php?controller=admin&method=addAdminPage">添加</a></caption>
			<tr style="background-color: #E8E8E8;" class="field">
				<td width="10%">编号</td>
				<td width="30%">管理员名称</td>
				<td width="40%">管理员邮箱</td>
				<td width="20%" colspan="2">操作</td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['rows']->value))-1+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['rows']->value))-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<tr class="row">
				<td><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['username'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['email'];?>
</td>
				<td><a href="admin.php?controller=admin&method=adminUpdate&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
">编辑</a></td>
				<td><a href="admin.php?controller=admin&method=adminDelete&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
">删除</a></td>
			</tr>
			<?php }} else { ?>
			<tr class="row">
				<td colspan="5">暂无其他管理员，是否<a href="admin.php?controller=admin&method=addAdminPage">添加</a>？</td>
			</tr>
			<?php }
?>

		</table>
		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['pageBan']->value['pageBan'])===null||$tmp==='' ? '' : $tmp);?>

	</center>
</div>
</body>
</html><?php }
}
