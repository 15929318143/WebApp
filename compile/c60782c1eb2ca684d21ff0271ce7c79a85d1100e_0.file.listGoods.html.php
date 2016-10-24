<?php
/* Smarty version 3.1.30, created on 2016-10-23 10:55:27
  from "F:\wamp64\www\Github\WebApp\template\admin\goods\listGoods.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580c971f28e027_72135065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c60782c1eb2ca684d21ff0271ce7c79a85d1100e' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\goods\\listGoods.html',
      1 => 1477220125,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580c971f28e027_72135065 (Smarty_Internal_Template $_smarty_tpl) {
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
			<caption><a href="admin.php?controller=goods&method=addGoods">添加</a></caption>
			<tr style="background-color: #E8E8E8;" class="field">
				<td width="10%">编号</td>
				<td width="40%">商品名称</td>
				<td width="20%">商品分类</td>
				<td width="9%">是否上架</td>
				<td width="21%" colspan="3">操作</td>
			</tr>
			<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['rows']->value))-1+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['rows']->value))-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
			<tr class="row">
				<td><input type="checkbox" name="checkbox"/> <?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['gName'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</td>
				<?php if ($_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['isShow'] == 1) {?>
				<td>YES</td>
				<?php } else { ?>
				<td>NO</td>
				<?php }?>
				<td><a href="admin.php?controller=goods&method=updateCate&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
">详情</a></td>
				<td><a href="admin.php?controller=goods&method=updateGoods&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
">修改</a></td>
				<td><a href="admin.php?controller=goods&method=deleteGoods&id=<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
" class="del">删除</a></td>
			</tr>
			<?php }} else { ?>
			<tr class="row">
				<td colspan="5">暂无商品，是否<a href="admin.php?controller=goods&method=addGoods">添加</a>？</td>
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
