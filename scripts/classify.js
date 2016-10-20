$(document).ready(function() {
	// 初始化网页的宽度
	var broWidth = $(window).width();
	$('body').css('width', broWidth+'px');
	$(window).resize(function() {
		broWidth = $(window).width();
		$('body').css('width', broWidth+'px');
	})
	var aList = $(".banner a");
	$(".banner dd a").css('width', aList.length*815+"px");
	var imgs = $(".detail img:only-child");
	imgs.each(function(index, element) {
		var h = (190-$(this).height())/2;
		var padding = ($(this).outerWidth()-$(this).width())/2;
		$(this).css('padding-top', h+padding);
		$(this).css('padding-bottom', h+padding);
	});	
});