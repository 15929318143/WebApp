<?php
/* Smarty version 3.1.30, created on 2016-10-21 10:29:30
  from "F:\wamp64\www\Github\WebApp\template\admin\classify\listCate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5809ee0a805990_94214236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a602531b60439c7add625cecbbc98c8ef606c070' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\classify\\listCate.html',
      1 => 1477045730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5809ee0a805990_94214236 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>管理员列表</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/jquery-3.1.0.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/listCate.js'><?php echo '</script'; ?>
>
</head>
<body>
<div id="adminList">
	<center>
		<table cellpadding="0" cellspacing="0" border="0" width="100%">
			<caption><a href="admin.php?controller=classify&method=addCate">添加</a></caption>
			<tr style="background-color: #E8E8E8;" class="field">
				<td width="10%">编号</td>
				<td width="30%">分类名称</td>
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
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</td>
				<td><a href="admin.php?controller=classify&method=updateCate&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
">编辑</a></td>
				<td><a href="admin.php?controller=classify&method=deleteCate&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
" class="del">删除</a></td>
			</tr>
			<?php }} else { ?>
			<tr class="row">
				<td colspan="5">暂无分类，是否<a href="admin.php?controller=classify&method=addCate">添加</a>？</td>
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
