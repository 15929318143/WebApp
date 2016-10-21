<?php
/* Smarty version 3.1.30, created on 2016-10-21 04:12:32
  from "F:\wamp64\www\Github\WebApp\template\admin\login.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_580995b0dbb424_57002520',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3186c6e00326021d048bcb529b3f8d43fc158641' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\login.html',
      1 => 1477015878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_580995b0dbb424_57002520 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>管理员登录</title>
	<link rel="stylesheet" type="text/css" href="styles/login.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/login.js"><?php echo '</script'; ?>
>
</head>
<body>
<div id="header">
	<div class="comWidth">
		<div class="logo">
			<p>欢迎登录</p>
		</div>
	</div>
</div>
<div id="main">
	<div class="comWidth">
		<div id="form">
			<form action="admin.php?controller=admin&method=login" method="post">
				<table cellspacing="0" cellpadding="0">
					<tr>
						<td>管理员账号</td>
						<td><input type="text" name="username" placeholder="请输入管理员账号"/></td>
					</tr>
					<tr>
						<td>密码</td>
						<td><input type="password" name="password"></td>
					</tr>
					<tr>
						<td>验证码</td>
						<td><input type="text" name="verify"></td>
					</tr>
					<tr>
						<td><img src="template/getVerify.php" alt="login verify" id="verify"><a id="switch">看不清？换一张</a></td>
						<td><input type="checkbox" name="autoFlag" value="1">自动登录(一周之内自动登录)</td>
					</tr>
					<tr>
						<td><input type="submit" name="submit" value="登录"/></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<div id="footer">
	<div class="foot comWidth">
		<p>
			<a href="#">东东网简介 |</a>
			<a href="#">东东网公告 |</a>
			<a href="#">招贤纳士 |</a>
			<a href="#">联系我们 |</a>
			客服热线：138-3838-438
		</p>
		<p>
			Copyright @ 2006-forver 东东版权所有 帝都ICP备xxxxxxx号 魔都ICP证Bxxxxxxx号  东厂分局xx分局备案编号：xxoo!
		</p>
		<p>
			<img src="images/credible.png" alt="credible logo" />
			<img src="images/credible.png" alt="credible logo" />
			<img src="images/credible.png" alt="credible logo" />
			<img src="images/credible.png" alt="credible logo" />
			<img src="images/credible.png" alt="credible logo" />
		</p>
	</div>
</div>
</body>
</html><?php }
}
