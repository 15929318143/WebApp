'use strict';
$(document).ready(function() {
	//初始化页面宽度
	var broWidth = $(window).width();
	$('body').css('width', broWidth+'px');
	$(window).resize(function() {
		broWidth = $(window).width();
		$('body').css('width', broWidth+'px');
	});
	// input样式
	var input = $('#form input');
	input.each(function(index, element) {
		if ($(this).attr('type')!=='checkbox') {
			$(this).css('border', '1px solid #A2A0A2');
			$(this).width(340);
			$(this).height(30);
		}
	});
	// 刷新验证码
	$('#switch').click(function(){
		$('#verify').attr('src', 'template/getVerify.php?flag='+Math.random());
	});
});
