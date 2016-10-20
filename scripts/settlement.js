'use strict';
$(document).ready(function() {
	var broWidth = $(window).width();
	$('body').css('width', broWidth+'px');
	$(window).resize(function() {
		broWidth = $(window).width();
		$('body').css('width', broWidth+'px');
	});
	$('td:first-child').each(function(index, ele){
		var padding = ($(this).outerWidth()-$(this).width())/2;
		$(this).css('padding-left', padding+30);
	});
});