<?php
/* Smarty version 3.1.30, created on 2016-10-21 04:21:40
  from "F:\wamp64\www\Github\WebApp\template\admin\admin.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580997d4e9ae80_78047587',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e5bf9333ab626551b519fde2f3e3b479b6ea7ad' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\admin.html',
      1 => 1477018740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580997d4e9ae80_78047587 (Smarty_Internal_Template $_smarty_tpl) {
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
		<iframe src="admin.php?controller=admin&method=left" scrolling="no" name="leftFrame" class="leftFrame"></iframe>
		<iframe src="admin.php?controller=admin&method=main" name="rightFrame" class="rightFrame"></iframe>
	</div>
	<div id="bottomFrame">
		<iframe src="template/admin/bottom.html" name="bottomFrame" class="bottomFrame"></iframe>
	</div>
</body>
</html><?php }
}
