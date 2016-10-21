<?php
/* Smarty version 3.1.30, created on 2016-10-21 04:48:20
  from "F:\wamp64\www\Github\WebApp\template\admin\classify\addCate.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58099e1481de78_67889827',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11e55949b5f37c36e8dc5af1a04ce1da8689832d' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\classify\\addCate.html',
      1 => 1477025296,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58099e1481de78_67889827 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>添加管理员</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
</head>
<body>
<center>
<div id="addCate">
		<form action="admin.php?controller=classify&method=addCate" method="post" class="<?php echo (($tmp = @$_smarty_tpl->tpl_vars['hidden']->value)===null||$tmp==='' ? '' : $tmp);?>
">
			<table cellspacing="0" cellpadding="0" border="0" width="100%"> 
				<caption>添加分类</caption>
				<tr>
					<td width="30%">分类名称:</td>
					<td width="70%"><input type="text" name="cName" placeholder="请输入分类名称"></td>
				</tr>
				<tr>
					<td colspan="2"><input type="submit" name="submit" value="添加分类"></td>
				</tr>
			</table>
		</form>
		<?php echo (($tmp = @$_smarty_tpl->tpl_vars['msg']->value)===null||$tmp==='' ? '' : $tmp);?>

</div>
</center>
</body>
</html><?php }
}
