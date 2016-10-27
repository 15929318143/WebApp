<?php
/* Smarty version 3.1.30, created on 2016-10-26 14:02:21
  from "F:\wamp64\www\Github\WebApp\template\admin\goods\listGoods.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5810b76dd22758_73152264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c60782c1eb2ca684d21ff0271ce7c79a85d1100e' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\admin\\goods\\listGoods.html',
      1 => 1477310392,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5810b76dd22758_73152264 (Smarty_Internal_Template $_smarty_tpl) {
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
	<link rel="stylesheet" href="scripts/jquery-ui/css/ui-lightness/jquery-ui-1.10.4.custom.css" />
	<?php echo '<script'; ?>
 src="scripts/jquery-ui/js/jquery-1.10.2.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="scripts/jquery-ui/js/jquery-ui-1.10.4.custom.min.js"><?php echo '</script'; ?>
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
				<td>
					<input type="button" class="btn" value="详情" onclick="showDetail(<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
, <?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['gName'];?>
)"/>
					<input type="button" class="btn" value="修改" onclick="editPro(<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
)"/>
					<input type="button" class="btn" value="删除" onclick="delPro(<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
)"/>
                    <div id="showDetail<?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
>" style="display:none;">
                    	<table class="table" cellspacing="0" cellpadding="0">
                    		<tr>
                    			<td width="20%" align="right">商品名称</td>
                    			<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['gName'];?>
</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品类别</td>
                    			<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品货号</td>
                    			<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['gLabel'];?>
</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品数量</td>
                    			<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['gSum'];?>
</td>
                    		</tr>
                    		<tr>
                    			<td  width="20%"  align="right">商品价格</td>
                    			<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['mPrice'];?>
</td>
                    		</tr>
                    		<tr>
                    			<td  width="20%"  align="right">东东网价格</td>
                    			<td><?php echo $_smarty_tpl->tpl_vars['rows']->value[$_smarty_tpl->tpl_vars['i']->value]['gPrice'];?>
</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">商品图片</td>
                    			<td>
                    			<?php echo '<?php 
                    			';?>$proImgs=getAllImgByProId($row['id']);
                    			foreach($proImgs as $img):
                    			<?php echo '?>';?>
                    			<img width="100" height="100" src="uploads/<?php echo '<?php ';?>echo $img['albumPath'];<?php echo '?>';?>" alt=""/> &nbsp;&nbsp;
                    			<?php echo '<?php ';?>endforeach;<?php echo '?>';?>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">是否上架</td>
                    			<td>
                    				<?php echo '<?php ';?>echo $row['isShow']==1?"上架":"下架";<?php echo '?>';?>
                    			</td>
                    		</tr>
                    		<tr>
                    			<td width="20%"  align="right">是否热卖</td>
                    			<td>
                    				<?php echo '<?php ';?>echo $row['isHot']==1?"热卖":"正常";<?php echo '?>';?>
                    			</td>
                    		</tr>
                    	</table>
                    	<span style="display:block;width:80%; ">
                    	商品描述<br/>
                    	<?php echo '<?php ';?>echo $row['pDesc'];<?php echo '?>';?>
                    	</span>
                    </div>
				</td>
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
