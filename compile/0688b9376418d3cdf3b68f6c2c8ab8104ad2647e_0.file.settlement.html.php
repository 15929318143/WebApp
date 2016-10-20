<?php
/* Smarty version 3.1.30, created on 2016-10-19 21:38:39
  from "F:\wamp64\www\shopAdmin\template\settlement.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5807775ff23398_95662477',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0688b9376418d3cdf3b68f6c2c8ab8104ad2647e' => 
    array (
      0 => 'F:\\wamp64\\www\\shopAdmin\\template\\settlement.html',
      1 => 1476884315,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5807775ff23398_95662477 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>购物车</title>
	<link rel="stylesheet" type="text/css" href="styles/settlement.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/settlement.js"><?php echo '</script'; ?>
>
	<!-- [if IE6] >
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/DD_belatedPNG_0.0.8a.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/ie6FixPng.js"><?php echo '</script'; ?>
>
	<![endif]-->
</head>
<body>
<div id="header">
	<div class="topBar">
		<div class="comWidth">
			<ul>
				<li class="left leftFloat"><a href="#">收藏东东网</a></li>
				<li class="right rightFloat"><span>欢迎来到东东网！</span><a href="#">[登录]</a><a href="#">[免费注册]</a></li>
			</ul>
		</div>
	</div>
	<div class="logoBar">
		<div class="comWidth">
			<ul>
				<li><img src="images/icon/logo.png" alt="logo"/></li>
				<li class="shopProcess rightFloat">
					<span>我的购物车</span>
					<span>填写核对订单</span>
					<span>订单提交成功</span>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="main">
	<div class="comWidth">
		<form action="#" method="post">
			<table class="tb1" cellpadding='0' cellspacing='0'>
				<tr>
					<th colspan="2">收货信息</th>
				</tr>
				<tr>
					<td class="notice">选择地区：</td>
					<td>
						<select>
							<option>北京市 海淀区 五环内</option>
							<option>北京市 海淀区 五环内</option>
							<option>北京市 海淀区 五环内</option>
						</select>
					</td>
				</tr>
				<tr>
					<td  class="notice">详细地址：</td>
					<td><input type="text" name="area" placeholder="最多输入26个汉字"></td>
				</tr>
				<tr>
					<td  class="notice">收&nbsp; 货 &nbsp;人：</td>
					<td><input type="text" name="name" placeholder="最多10个汉字"></td>
				</tr>
				<tr>
					<td  class="notice">手&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机：</td>
					<td>
						<input type="text" name="area" placeholder="如1383838438"> 或固定电话：
						<input type="text" name="region_num" value="区号" style="width: 60px;"> -
						<input type="text" name="phone_num" value="电话号码" style="width: 80px;"> -
						<input type="text" name="ext_num" value="分机号" style="width: 100px;">
					</td>
				</tr>
				<tr>
					<td colspan="2"><input type="button" name="submit_area" value="确认收货地址"/></td>
				</tr>
			</table>
			<table class="tb2" cellpadding='0' cellspacing='0'>
				<tr>
					<th colspan="2">支付方式</th>
				</tr>
				<tr>
					<td><input type="radio" name="pay_method"><span class="wechat">微信支付&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;用微信扫一扫就能支付！</span></td>
				</tr>
				<tr>
					<td><input type="radio" name="pay_method"><span>货到付款&nbsp;&nbsp;&nbsp;&nbsp;送货上门后再付款，使用现金或刷银行卡</span></td>
				</tr>
			</table>
			<table class="tb3" cellpadding='0' cellspacing='0'>
				<tr>
					<th colspan="2">发票信息</th>
				</tr>
				<tr>
					<td colspan="2"><input type="checkbox" name="invoice">需要发票</td>
				</tr>
				<tr>
					<td  class="notice fix">发票类型：</td>
					<td>
						<select>
							<option>商业零售发票</option>
							<option>商业零售发票</option>
							<option>商业零售发票</option>
						</select>
					</td>
				</tr>
				<tr>
					<td  class="notice fix">发票抬头：</td>
					<td>
						<select>
							<option>个人</option>
							<option>个人</option>
							<option>个人</option>
						</select>
						<input type="text" name="invoice_area" placeholder="阿斯顿" style="padding: 2px;font-size: 12px;">
					</td>
				</tr>
				<tr>
					<td>
						<input type="button" name="submit_invoice" value="保存" class="active">
						<input type="reset" name="reset_invoice" value="取消">
					</td>
				</tr>
			</table>
			<table class="tb4" cellpadding='0' cellspacing='0'>
				<tr>
					<th colspan="6">送货清单</th>
				</tr>
				<tr>
					<td colspan="2" width="50%">商品名称</td>
					<td width="13%">单价</td>
					<td width="13%">返现</td>
					<td width="12%">数量</td>
					<td width="12%">小计</td>
				</tr>
				<tr>
					<td rowspan="2"><img src="images/settlement/product_00.png" alt="settlement goods"></td>
					<td style="border: none;color: #666666;padding-left: 30px;">Hisense 海信 BCD-202D 202升 三门冰箱（银色）</td>
					<td style="border: none;">￥1459.00</td>
					<td style="border: none;">￥0.00</td>
					<td style="border: none;">1</td>
					<td style="border: none;">￥1459.00</td>
				</tr>
				<tr>
					<td>[赠品] 保鲜盒 抽真空保鲜盒-海信冰洗赠品</td>
					<td></td>
					<td></td>
					<td>1</td>
					<td></td>
				</tr>
				<tr>
					<td colspan="5">
						<p><a href="#" style="color: #3377FF;">若您对包裹有特殊要求，请在此留言</a></p>
						<p style="color: #EE0000;border: none;" class="warnning">抱歉，以下商品暂时不能购买，已帮您自动在本次结算中剔除并扣减对应金额，您可以先购买其他商品：)</p>
					</td>
				</tr>
				<tr>
					<td rowspan="2"><img src="images/settlement/product_01.png" alt="settlement goods"></td>
					<td class="backup_goods">
						<span>清风，欧院系列 清香型 100抽3...</span><span>数量：1件</span><span>￥4.90<font style="color:#D70000;font-weight:bold;">(无货)</font></span>
					</td>
				</tr>
			</table>
			<table class="tb5" cellpadding='0' cellspacing='0'>
				<tr>
					<th>订单结算</th>
				</tr>
				<tr>
					<td>总计<span>￥1459.00</span></td>
				</tr>
				<tr>
					<td><input type="submit" name="submit" value="提交订单"></td>
				</tr>
			</table>
		</form>
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