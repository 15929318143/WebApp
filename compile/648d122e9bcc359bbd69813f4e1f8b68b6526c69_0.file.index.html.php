<?php
/* Smarty version 3.1.30, created on 2016-11-19 01:21:33
  from "F:\wamp64\www\Github\WebApp\template\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_582fa91da03790_68009561',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '648d122e9bcc359bbd69813f4e1f8b68b6526c69' => 
    array (
      0 => 'F:\\wamp64\\www\\Github\\WebApp\\template\\index.html',
      1 => 1479518490,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_582fa91da03790_68009561 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="styles/index.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/index.js"><?php echo '</script'; ?>
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
				<li class="left leftFloat"><img src="images/logo.png"></li>
				<li class="middle leftFloat">
					<form action="#" method="get">
						<input type="text" name="search"/><input type="submit" name="submit" value="搜索"/>
					</form>
				</li>
				<li class="right rightFloat">
					<a href="#"><span class="shopCar leftFloat">购物车</span></a><a href="#"><span class="message leftFloat">0</span></a>
				</li>
			</ul>
		</div>
	</div>
	<div class="navBar">
		<div class="comWidth">
			<ul>
				<li class="left leftFloat">全部商品分类</li>
				<li class="right leftFloat">
					<a href="#" class="active">数码城</a>
					<a href="#">天黑黑</a>
					<a href="#">团购</a>
					<a href="#">发现</a>
					<a href="#">二手特卖</a>
					<a href="#">名品会</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<div id="content">
	<div class="shopClass comWidth">
		<div class="leftBar leftFloat">
			<div class="shopClassList">
				<ul class="left leftFloat">
					<li class="clearBoth leftFloat bold">
						<a href="#">手机</a>
						<a href="#">数码</a>
						<a href="#" class="ownBg">合约机</a>
					</li>
					<li class="clearBoth leftFloat">
						<a href="#">荣耀3X</a>
						<a href="#">单反</a>
						<a href="#">智能设备</a>
					</li>
				</ul>
				<ul class="right rightFloat">
					<li><img src="images/icon/shop_sj.jpg" alt=""></li>
				</ul>
			</div>
			<div class="shopClassList">
				<ul class="left leftFloat">
					<li class="clearBoth leftFloat bold">
						<a href="#">电脑</a>
						<a href="#">硬件外设</a>
						<a href="#" class="ownBg">装机宝</a>
					</li>
					<li class="clearBoth leftFloat">
						<a href="#">笔记本</a>
						<a href="#">单反</a>
						<a href="#">智能设备</a>
					</li>
				</ul>
				<ul class="right rightFloat">
					<li><img src="images/icon/shop_sj.jpg" alt=""></li>
				</ul>
			</div>
			<div class="shopClassList">
				<ul class="left leftFloat">
					<li class="clearBoth leftFloat bold">
						<a href="#">大家电</a>
					</li>
					<li class="clearBoth leftFloat">
						<a href="#">电视</a>
						<a href="#">空调</a>
						<a href="#">冰箱</a>
						<a href="#">洗衣机</a>
					</li>
				</ul>
				<ul class="right rightFloat">
					<li><img src="images/icon/shop_sj.jpg" alt=""></li>
				</ul>
			</div>
			<div class="shopClassList">
				<ul class="left leftFloat">
					<li class="clearBoth leftFloat bold">
						<a href="#">厨房电器</a>
						<a href="#">生活电器</a>
					</li>
					<li class="clearBoth leftFloat">
						<a href="#">空气净化器</a>
						<a href="#">微波炉</a>
						<a href="#">取暖设备</a>
					</li>
				</ul>
				<ul class="right rightFloat">
					<li><img src="images/icon/shop_sj.jpg" alt=""></li>
				</ul>
			</div>
			<div class="shopClassList">
				<ul class="left leftFloat">
					<li class="clearBoth leftFloat bold">
						<a href="#">食品/饮料/生鲜</a>
						<a href="#" class="ownBg">粮油</a>
					</li>
					<li class="clearBoth leftFloat">
						<a href="#">进口</a>
						<a href="#">方便面</a>
						<a href="#">零食</a>
						<a href="#">保健</a>
					</li>
				</ul>
				<ul class="right rightFloat">
					<li><img src="images/icon/shop_sj.jpg" alt=""></li>
				</ul>
			</div>
		</div>
		<div class="popList leftFloat hidden">
			<div class="kinds">
				<dl>
					<dt>电脑整机</dt>
					<dd>
						<a href="#">笔记本</a>
						<a href="#" class="label">超极本</a>
						<a href="#">上网本</a>
						<a href="#">平板电脑</a>
						<a href="#">台式机</a>
					</dd>
				</dl>
			</div>
			<div class="kinds">
				<dl>
					<dt>装机配件</dt>
					<dd>
						<a href="#">CPU</a>
						<a href="#">硬盘</a>
						<a href="#">SSD固态硬盘</a>
						<a href="#">内存</a>
						<a href="#">显示器</a>
						<a href="#">智能显示器</a>
						<a href="#">主板</a>
						<a href="#">显卡</a>
						<a href="#">机箱</a>
						<a href="#">电源</a>
						<a href="#">散热器</a>
						<a href="#">刻录机/光驱</a>
						<a href="#">声卡</a>
						<a href="#">拓展卡</a>
						<a href="#">服务器配件</a>
						<a href="#">DIY附件</a>
						<a href="#">装机/配件安装</a>
					</dd>
				</dl>
			</div>
			<div class="kinds">
				<dl>
					<dt>整机附件</dt>
					<dd>
						<a href="#">电脑包</a>
						<a href="#">电脑桌</a>
						<a href="#">电池</a>
						<a href="#">电源适配器</a>
						<a href="#">贴膜</a>
						<a href="#">清洁用品</a>
						<a href="#">笔记本散热器</a>
						<a href="#">USB拓展</a>
						<a href="#">平板配件</a>
						<a href="#">特色附件</a>
						<a href="#">插座网线/电话线</a>
						<a href="#">影音线材</a>
						<a href="#">电脑线材</a>
					</dd>
				</dl>
			</div>
			<div class="kinds">
				<dl>
					<dt>电脑外设</dt>
					<dd>
						<a href="#">鼠标</a>
						<a href="#">键盘</a>
						<a href="#">游戏外设</a>
						<a href="#">移动硬盘</a>
						<a href="#">摄像头</a>
						<a href="#">高清播放器</a>
						<a href="#">外置盒</a>
						<a href="#">移动硬盘包</a>
						<a href="#">手写板</a>
					</dd>
				</dl>
			</div>
			<div class="kinds">
				<dl>
					<dt>网络设备</dt>
					<dd>
						<a href="#">路由器</a>
						<a href="#">网卡</a>
						<a href="#">3G无线上网</a>
						<a href="#">交换机</a>
						<a href="#">网络存储</a>
						<a href="#">布线工具</a>
						<a href="#">网络配件</a>
						<a href="#">正版软件</a>
					</dd>
				</dl>
			</div>
			<div class="kinds">
				<dl>
					<dt>音频设备</dt>
					<dd>
						<a href="#">音箱</a>
						<a href="#">耳机/耳麦</a>
						<a href="#">麦克风</a>
						<a href="#">声卡</a>
						<a href="#">音频附件</a>
						<a href="#">录音笔</a>
					</dd>
				</dl>
			</div>
		</div>
		<div class="bigBan comWidth">
			<div class="banner">
				<ul class="imgBox">
					<li><img src="images/banner/banner_01.jpg" alt="banner"></li>
					<li><img src="images/banner/banner_02.jpg" alt="banner"></li>
				</ul>
				<ul class="imgIndex">
					<li><a href="#" class="active"></a><a href="#"></a><a href="#"></a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? (count($_smarty_tpl->tpl_vars['goods']->value))-1+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['goods']->value))-1)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 0, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration == 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration == $_smarty_tpl->tpl_vars['i']->total;?>
	<div class="persionalCpt comWidth">
		<div class="showTitle leftFloat">
			<ul>
				<li class="leftFloat left"><?php echo $_smarty_tpl->tpl_vars['goods']->value[$_smarty_tpl->tpl_vars['i']->value]['cName'];?>
</li>
				<li class="rightFloat"><a href="#" class=" more">更多&gt;&gt;&gt;</a></li>
			</ul>
		</div>
		<div class="showDetail comWidth">
			<div class="smallBan">
				<div class="banner2">
					<ul class="imgBox2">
						<li><img src="images/banner/banner_sm_01.jpg" alt="small banner"></li>
						<li><img src="images/banner/banner_sm_02.jpg" alt="small banner"></li>
					</ul>
					<ul class="imgIndex2">
						<li><a href="#" class="active"></a><a href="#"></a><a href="#"></a></li>
					</ul>
				</div>
			</div>
			<div class="imgList leftFloat">
			<?php
$_smarty_tpl->tpl_vars['j'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['j']->step = 1;$_smarty_tpl->tpl_vars['j']->total = (int) ceil(($_smarty_tpl->tpl_vars['j']->step > 0 ? (count($_smarty_tpl->tpl_vars['goods']->value[$_smarty_tpl->tpl_vars['i']->value]['rows']))-1+1 - (0) : 0-((count($_smarty_tpl->tpl_vars['goods']->value[$_smarty_tpl->tpl_vars['i']->value]['rows']))-1)+1)/abs($_smarty_tpl->tpl_vars['j']->step));
if ($_smarty_tpl->tpl_vars['j']->total > 0) {
for ($_smarty_tpl->tpl_vars['j']->value = 0, $_smarty_tpl->tpl_vars['j']->iteration = 1;$_smarty_tpl->tpl_vars['j']->iteration <= $_smarty_tpl->tpl_vars['j']->total;$_smarty_tpl->tpl_vars['j']->value += $_smarty_tpl->tpl_vars['j']->step, $_smarty_tpl->tpl_vars['j']->iteration++) {
$_smarty_tpl->tpl_vars['j']->first = $_smarty_tpl->tpl_vars['j']->iteration == 1;$_smarty_tpl->tpl_vars['j']->last = $_smarty_tpl->tpl_vars['j']->iteration == $_smarty_tpl->tpl_vars['j']->total;?>
				<div class="picBox leftFloat">
					<div class="upPic">
						<a href="#">
							<img src="<?php echo $_smarty_tpl->tpl_vars['goods']->value[$_smarty_tpl->tpl_vars['i']->value]['rows'][$_smarty_tpl->tpl_vars['j']->value]['albumPath'];?>
" alt=""/>
							<p class="p1"><?php echo $_smarty_tpl->tpl_vars['goods']->value[$_smarty_tpl->tpl_vars['i']->value]['rows'][$_smarty_tpl->tpl_vars['j']->value]['gName'];?>
</p>
							<p class="p2">￥<?php echo $_smarty_tpl->tpl_vars['goods']->value[$_smarty_tpl->tpl_vars['i']->value]['rows'][$_smarty_tpl->tpl_vars['j']->value]['gPrice'];?>
</p>
						</a>
					</div>
					<div class="downPic">
						<a href="#">
							<img src="images/shopImg.jpg" alt="">
							<p class="p3">NFC技术一碰轻松配对！接触屏幕<br><span>￥1800</span></p>
						</a>
					</div>
				</div>
			<?php }
}
?>

			</div>
		</div>
	</div>
	<?php }} else { ?>
	<div>
		
	</div>
	<?php }
?>

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
