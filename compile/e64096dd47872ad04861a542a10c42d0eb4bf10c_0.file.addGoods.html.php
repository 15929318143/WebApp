<?php
/* Smarty version 3.1.30, created on 2016-11-04 03:10:55
  from "F:\wamp64\www\Github\WebApp\template\admin\goods\addGoods.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_581bfc3f564156_42396017',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e64096dd47872ad04861a542a10c42d0eb4bf10c' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\goods\\addGoods.html',
      1 => 1478229050,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_581bfc3f564156_42396017 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>商品管理</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/jquery-3.1.0.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/tinymce/tinymce.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/tinymce/jquery.tinymce.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
>tinymce.init({ selector:'textarea' });<?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/addGoods.js'><?php echo '</script'; ?>
>
</head>
<body>
<center>
<div id="addGoods">
		<form action="admin.php?controller=goods&method=addGoods" method="post" enctype="multipart/form-data" class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden']->value)===null||$tmp==='' ? '' : $tmp);?>
">
			<table cellspacing="0" cellpadding="0" border="0" width="100%"> 
			<?php if (!(($tmp = @$_smarty_tpl->tpl_vars['row']->value['id'])===null||$tmp==='' ? '' : $tmp)) {?>
				<caption>添加商品</caption>
				<tr>
					<td width="20%">商品名称</td>
					<td width="70%"><input type="text" name="gName" placeholder="请输入商品名称"></td>
				</tr>
				<tr>
					<td width="20%">商品分类</td>
					<td width="70%">
						<select name="cId" class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden0']->value)===null||$tmp==='' ? '' : $tmp);?>
">
							<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['cates']->value))-1+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['cates']->value))-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</option>
							<?php }} else { ?>
						</select>
						<div class="noCate" style="float: left;margin-left: 53px;">暂无分类，请先<a href="admin.php?controller=classify&method=addCate">添加分类</a></div>
							<?php }
?>

					</td>
				</tr>
				<tr>
					<td width="20%">商品货号</td>
					<td width="70%"><input type="text" name="gLabel" placeholder="请输入商品货号"></td>
				</tr>
				<tr>
					<td width="20%">商品数量</td>
					<td width="70%"><input type="text" name="gSum" placeholder="请输入商品数量"></td>
				</tr>
				<tr>
					<td width="20%">商品市场价</td>
					<td width="70%"><input type="text" name="mPrice" placeholder="请输入商品市场价"></td>
				</tr>
				<tr>
					<td width="20%">商品东东价</td>
					<td width="70%"><input type="text" name="gPrice" placeholder="请输入商品东东价"></td>
				</tr>
				<tr>
					<td width="20%">商品描述(300字内)</td>
					<td width="70%">
						<textarea name="gDesc" placeholder="请输入300字以内的商品描述……"></textarea>
					</td>
				</tr>
				<tr>
					<td width="20%">商品图像</td>
					<td width="70%">
						<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
						<div id="attachList" class="clear"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="发布商品"></td>
				</tr>
			<?php } else { ?>
				<input type="hidden" name="id" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['id'])===null||$tmp==='' ? '' : $tmp);?>
">
				<input type="hidden" name="old_cId" value="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['cId'])===null||$tmp==='' ? '' : $tmp);?>
">
				<caption>更新商品</caption>
				<tr>
					<td width="20%">商品名称</td>
					<td width="70%"><input type="text" name="gName" placeholder="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gName'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
				</tr>
				<tr>
					<td width="20%">商品分类</td>
					<td width="70%">
						<select name="cId" class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden0']->value)===null||$tmp==='' ? '' : $tmp);?>
">
							<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['cates']->value))-1+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['cates']->value))-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
								<?php if ((($tmp = @$_smarty_tpl->tpl_vars['row']->value['cId'])===null||$tmp==='' ? '' : $tmp) == $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['id']) {?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
" selected="selected"><?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</option>
								<?php } else { ?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['cates']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</option>
								<?php }?>
							<?php }} else { ?>
						</select>
						<div class="noCate" style="float: left;margin-left: 53px;">暂无分类，请先<a href="admin.php?controller=classify&method=addCate">添加分类</a></div>
							<?php }
?>

					</td>
				</tr>
				<tr>
					<td width="20%">商品货号</td>
					<td width="70%"><input type="text" name="gLabel" placeholder="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gLabel'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
				</tr>
				<tr>
					<td width="20%">商品数量</td>
					<td width="70%"><input type="text" name="gSum" placeholder="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gSum'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
				</tr>
				<tr>
					<td width="20%">商品市场价</td>
					<td width="70%"><input type="text" name="mPrice" placeholder="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['mPrice'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
				</tr>
				<tr>
					<td width="20%">商品东东价</td>
					<td width="70%"><input type="text" name="gPrice" placeholder="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gPrice'])===null||$tmp==='' ? '' : $tmp);?>
"></td>
				</tr>
				<tr>
					<td width="20%">商品描述(300字内)</td>
					<td width="70%">
						<textarea name="gDesc" placeholder="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['row']->value['gDesc'])===null||$tmp==='' ? '' : $tmp);?>
"></textarea>
					</td>
				</tr>
				<tr>
					<td width="20%">商品图像</td>
					<td width="70%">
						<a href="javascript:void(0)" id="selectFileBtn">添加附件</a>
						<div id="attachList" class="clear"></div>
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="更新商品"></td>
				</tr>
			<?php }?>
			</table>
		</form>
		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['msg']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
</center>
</body>
</html><?php }
}
