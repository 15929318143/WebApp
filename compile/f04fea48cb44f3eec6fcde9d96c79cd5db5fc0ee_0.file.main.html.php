<?php
/* Smarty version 3.1.30, created on 2016-10-15 15:32:12
  from "F:\wamp64\www\shopAdmin\template\admin\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5801db7c0d8da1_78175073',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f04fea48cb44f3eec6fcde9d96c79cd5db5fc0ee' => 
    array (
      0 => 'F:\\wamp64\\www\\shopAdmin\\template\\admin\\main.html',
      1 => 1476516727,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5801db7c0d8da1_78175073 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
	<title>Admin-Main</title>
	<link rel="stylesheet" type="text/css" href="styles/admin.css"/>
</head>
<body style="overflow-x: hidden;">
<div id="main">
	<dl>
		<dd>
			<div>
				<table cellpadding="0" cellspacing="0" border="1">
					<caption>系统信息</caption>
					<tr>
						<td>操作系统</td>
						<td class="operationSys"><?php echo $_smarty_tpl->tpl_vars['operationSys']->value;?>
</td>
					</tr>
					<tr>
						<td>服务器版本</td>
						<td class="serverVer"><?php echo $_smarty_tpl->tpl_vars['serverVer']->value;?>
</td>
					</tr>
					<tr>
						<td>PHP版本</td>
						<td class="phpVer"><?php echo $_smarty_tpl->tpl_vars['phpVer']->value;?>
</td>
					</tr>
					<tr>
						<td>运行方式</td>
						<td class="phpRunMode"><?php echo $_smarty_tpl->tpl_vars['phpRunMode']->value;?>
</td>
					</tr>
				</table>
			</div>
		</dd>
		<dd>
			<div>
				<table cellpadding="0" cellspacing="0" border="1">
					<caption>软件信息</caption>
					<tr>
						<td>系统名称</td>
						<td class="sysName"><?php echo $_smarty_tpl->tpl_vars['sysName']->value;?>
</td>
					</tr>
					<tr>
						<td>开发团队</td>
						<td class="team"><?php echo $_smarty_tpl->tpl_vars['team']->value;?>
</td>
					</tr>
					<tr>
						<td>公司地址</td>
						<td class="webAddr"><a href="#"><?php echo $_smarty_tpl->tpl_vars['webAddr']->value;?>
</a></td>
					</tr>
					<tr>
						<td>成功案例</td>
						<td class="successCase"><?php echo $_smarty_tpl->tpl_vars['successCase']->value;?>
</td>
					</tr>
				</table>
			</div>
		</dd>
	</dl>
</div>
</body>
</html><?php }
}
