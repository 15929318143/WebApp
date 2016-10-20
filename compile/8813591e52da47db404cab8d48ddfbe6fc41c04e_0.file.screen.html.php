<?php
/* Smarty version 3.1.30, created on 2016-10-19 20:57:31
  from "F:\wamp64\www\shopAdmin\template\screen.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58076dbbd25bc7_79866584',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8813591e52da47db404cab8d48ddfbe6fc41c04e' => 
    array (
      0 => 'F:\\wamp64\\www\\shopAdmin\\template\\screen.html',
      1 => 1476881849,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58076dbbd25bc7_79866584 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>首页</title>
	<link rel="stylesheet" type="text/css" href="styles/screen.css"/>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/jquery-3.1.0.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 type="text/javascript" src="scripts/screen.js"><?php echo '</script'; ?>
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
<div id="main">
	<div class="comWidth">
		<div class="leftNav">
			<h4>产品分类</h4>
			<div class="wordList">
				<div>
					<li class="uTitle">手机通讯</li>
					<li><a href="#">手机</a></li>
					<li><a href="#">对讲机</a></li>
				</div>
				<div>
					<li class="uTitle">运营商</li>
					<li><a href="#">购机送费</a></li>
					<li><a href="#">"0"元购机</a></li>
					<li><a href="#">选号入网</a></li>
				</div>					
				<div>
					<li class="uTitle">手机配件</li>
					<li><a href="#">手机电池</a></li>
					<li><a href="#">蓝牙耳机</a></li>
					<li><a href="#">充电器/数据线</a></li>
					<li><a href="#">手机耳机</a></li>
					<li><a href="#">手机贴膜</a></li>
					<li><a href="#">手机存储卡</a></li>
					<li><a href="#">手机保护套</a></li>
					<li><a href="#">车载配件</a></li>
					<li><a href="#">iPhone配件</a></li>
				</div>
			</div>
			<div class="pictureList">
				<dl>
					<dd>
						<a href="#"><img src="images/banner/iPadmini.png" alt="iPad mini 1"/></a>
					</dd>
					<dd>
						<p><a href="#">全网底价 Apple 苹果 iPad mini 1</a></p>
						<p>￥2088.00</p>
					</dd>
				</dl>
				<dl>
					<dd>
						<a href="#"><img src="images/banner/Haier_jsq2.png" alt="iPad mini 1"/></a>
					</dd>
					<dd>
						<p><a href="#">Haier 海尔 JSQ2 0-E2 (12T) 燃</a></p>
						<p>￥1698.00</p>
					</dd>
				</dl>
				<dl>
					<dd>
						<a href="#"><img src="images/banner/iphone5s.png" alt="iPad mini 1"/></a>
					</dd>
					<dd>
						<p><a href="#">Apple 苹果 iPhone 5s 16G(GS)</a></p>
						<p>￥4979.00</p>
					</dd>
				</dl>
				<dl>
					<dd>
						<a href="#"><img src="images/banner/tamronsp.png" alt="iPad mini 1"/></a>
					</dd>
					<dd>
						<p><a href="#">TAMRON 腾龙 5pP 90mm F/2.8</a></p>
						<p>￥3680.00</p>
					</dd>
				</dl>
			</div>
		</div>
		<div class="productShow">
			<div class="fliter">
				<dl class="fliter_title">
					<dt>手机</dt>
					<dd>
						<a href="#">裸机(773)</a>
						<a href="#">合约机(192)</a>
					</dd>
				</dl>
				<dl class="screen">
					<dt>品牌</dt>
					<dd class="unlimited"><a href="#" class="active">不限</a></dd>
					<dd class="screenList">
						<ul>
							<li><a href="#">Samsung/三星</a></li>
							<li><a href="#">Apple/苹果</a></li>
							<li><a href="#">Huawei/华为</a></li>
							<li><a href="#">Miui/小米</a></li>
							<li><a href="#">Lenove/联想</a></li>
							<li><a href="#">Sony/索尼</a></li>
							<li><a href="#">HTC/宏达电</a></li>
							<li><a href="#">Coolpad/酷派</a></li>
							<li><a href="#">Meizu/魅族</a></li>
							<li><a href="#">3bk/步步高</a></li>
							<li><a href="#">Oppo/欧珀</a></li>
							<li><a href="#">Motorola/摩托罗拉</a></li>
						</ul>
					</dd>
					<dd class="more"><a href="#">更多</a></dd>
				</dl>
				<dl class="screen">
					<dt>屏幕尺寸</dt>
					<dd class="unlimited"><a href="#" class="active">不限</a></dd>
					<dd class="screenList">
						<ul>
							<li><a href="#">超大屏(>5.9英寸)</a></li>
							<li><a href="#">大屏幕(4.8-5.8英寸)</a></li>
							<li><a href="#">主流屏幕尺寸(4.0-4.7英寸)</a></li>
						</ul>
					</dd>
					<dd class="more"><a href="#">更多</a></dd>
				</dl>
				<dl class="screen">
					<dt>操作系统</dt>
					<dd class="unlimited"><a href="#" class="active">不限</a></dd>
					<dd class="screenList">
						<ul>
							<li><a href="#">Android</a></li>
							<li><a href="#">苹果iOS</a></li>
							<li><a href="#">Window Phone</a></li>
							<li><a href="#">Symbian</a></li>
							<li><a href="#">非智能机</a></li>
						</ul>
					</dd>
					<dd class="more"><a href="#">更多</a></dd>
				</dl>
				<dl class="screen">
					<dt>适用网络制式</dt>
					<dd class="unlimited"><a href="#" class="active">不限</a></dd>
					<dd class="screenList">
						<ul>
							<li><a href="#">4G(TD-LTE)</a></li>
							<li><a href="#">4G(FDD-TLE)</a></li>
							<li><a href="#">移动3G(TD-SCDMA)</a></li>
							<li><a href="#">移动3.5G(TD-HSDPA)</a></li>
						</ul>
					</dd>
					<dd class="more"><a href="#">更多</a></dd>
				</dl>
				<dl class="moreSelect">
					<dt>更多选项</dt>
					<dd>
						<select>
							<option>CPU核心数</option>
							<option>CPU核心数</option>
							<option>CPU核心数</option>
						</select>
						<select>
							<option>主摄像头像素主摄像头像素主摄像头像素</option>
							<option>主摄像头像素主摄像头像素主摄像头像素</option>
							<option>主摄像头像素主摄像头像素主摄像头像素</option>
							<option>主摄像头像素</option>
							<option>主摄像头像素</option>
						</select>
					</dd>
				</dl>
			</div>
			<div class="digital">
				<div class="title">
					<dl>
						<dd>
							<span>送至</span>
							<select>
								<option>海淀区五环内</option>
								<option>海淀区五环内</option>
								<option>海淀区五环内</option>
							</select>
						</dd>
						<dd>
							<input type="checkbox" name="existsProduct"/>
							<span>仅显示有货</span>
							<span>共<font style="color: #D70000">546631</font>件商品</span>
						</dd>
					</dl>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image"/>
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image" class="hidden" />
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image"/>
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image" class="hidden" />
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image"/>
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image" class="hidden" />
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image"/>
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image" class="hidden" />
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image"/>
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image" class="hidden" />
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image"/>
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				<div class="detail">
					<p>
						<a href="#"><img src="images/banner/xiaomi3G_GSM.png" alt="product detail"/></a>
						<img src="images/icon/renqi.png" alt="background image" class="hidden" />
					</p>
					<p><a href="#">小米 红米 3G (GSM/TD-SCDMA) 手机 灰色</a></p>
					<p><span>￥1699.00</span><a href="#">48860</a>评论</p>
					<p><a href="#">加入购物车</a></p>
				</div>
				
			</div>
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
