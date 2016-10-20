$(document).ready(function() {
	// 初始化网页的宽度
	var broWidth = $(window).width();
	$('body').css('width', broWidth+'px');
	$(window).resize(function() {
		broWidth = $(window).width();
		$('body').css('width', broWidth+'px');
	})

	/* index页 */
	// 商品分类目录下左侧栏的活动样式
	$('.shopClassList').each(function(index, element) {
		$(this).mouseenter(function () {
			$(this).find('right').addClass('hidden');
		});
		$(this).mouseleave(function () {
			$(this).find('.right').removeClass('hidden');
		});
	});

});
		