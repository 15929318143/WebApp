<?php
/* Smarty version 3.1.30, created on 2016-10-15 15:32:11
  from "F:\wamp64\www\shopAdmin\template\admin\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5801db7b981c31_30992026',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7e151019df99d6ba37f5aeb204cb8ad71b0a439b' => 
    array (
      0 => 'F:\\wamp64\\www\\shopAdmin\\template\\admin\\admin.html',
      1 => 1476516730,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5801db7b981c31_30992026 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>后台首页</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/jquery-3.1.0.min.js'><?php echo '</script'; ?>
>
</head>
<!-- 构架样式
<frameset rows="90px, *, 190px" cols="*" frameborder="yes" border="1" framespacing="0">
	top样式
	<frame src="admin.php?controller=admin&method=top" id="topFrame" name="topFrame" scrolling="no" noresize="noresize"></frame>
	middle样式
	<frameset rows="*" cols="201px, *" frameborder="yes" border="0" framespacing="0">
		左侧栏样式
		<frame src="template/admin/left.html" id="leftFrame" name="leftFrame" scrolling="no" noresize="noresize"></frame>
		中间主体样式
		<frame src="admin.php?controller=admin&method=main" id="mainFrame" name="mainFrame" scrolling="auto" noresize="noresize"></frame>
	</frameset>
	bottom样式
	<frame src="template/admin/bottom.html" id="bottomFrame" name="bottomFrame" scrolling="no" noresize="noresize"></frame>
</frameset>
不可删除
<noframes></noframes> -->
<body>
	<div id="topFrame">
		<iframe src="admin.php?controller=admin&method=top" scrolling="no" name="topFrame" class="topFrame"></iframe>
	</div>
	<div id="mainFrame">
		<iframe src="template/admin/left.html" scrolling="no" name="leftFrame" class="leftFrame"></iframe>
		<iframe src="admin.php?controller=admin&method=main" name="rightFrame" class="rightFrame"></iframe>
	</div>
	<div id="bottomFrame">
		<iframe src="template/admin/bottom.html" name="bottomFrame" class="bottomFrame"></iframe>
	</div>
</body>
</html><?php }
}
