<?php
/* Smarty version 3.1.30, created on 2016-10-22 01:40:58
  from "F:\wamp64\www\Github\WebApp\template\admin\left.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580ac3aab1e852_84934641',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2cf1cd230f521b0539a6efcaca67d6991dded49a' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\left.html',
      1 => 1477100456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580ac3aab1e852_84934641 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>Admin-LeftBar</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/jquery-3.1.0.min.js'><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src='scripts/admin.js'><?php echo '</script'; ?>
>
</head>
<body>
<div id="leftBar">
	<div id="userBox">
		<div class="face"><img src="images/admin_icon/member.gif"></div>
		<div class="user">
			<ul>
				<li>用户：admin</li>
				<li>权限：超级管理员</li>
			</ul>
		</div>
	</div>
	<div id="leftNav">
		<ul>
			</li><li>
				<div class="option">商品管理</div>
				<ul class="list">
					<li><a href="admin.php?controller=goods&method=addGoods" target="rightFrame">添加商品</a></li>
					<li><a href="admin.php?controller=goods&method=listGoods" target="rightFrame">商品列表</a></li>
				</ul>
			</li>
			<li>
				<div class="option">分类管理</div>
				<ul class="list">
					<li><a href="admin.php?controller=classify&method=addCate" target="rightFrame">添加分类</a></li>
					<li><a href="admin.php?controller=classify&method=listCate" target="rightFrame">分类列表</a></li>
				</ul>
			</li>
			<li>
				<div class="option">订单管理</div>
				<ul class="list">
					<li><a href="#">分组权限</a></li>
					<li><a href="#">级别权限</a></li>
					<li><a href="#">角色管理</a></li>
					<li><a href="#">自定义权限</a></li>
				</ul>
			<li>
				<div class="option">用户管理</div>
				<ul class="list">
					<li><a href="#">分组权限</a></li>
					<li><a href="#">级别权限</a></li>
					<li><a href="#">角色管理</a></li>
					<li><a href="#">自定义权限</a></li>
				</ul>
			</li>
			<li>
				<div class="option">管理员管理</div>
				<ul class="list">
					<li><a href="admin.php?controller=admin&method=addAdminPage" target="rightFrame">添加管理员</a></li>
					<li><a href="admin.php?controller=admin&method=adminList" target="rightFrame">管理员列表</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>
</body>
</html><?php }
}
