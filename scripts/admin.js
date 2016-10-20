$(document).ready(function() {
	$('.list').hide();
	$('.option').click(function() {
		$(this).next().slideToggle(1000).parent('li').siblings('li').children('.list').hide(1000).end();
	});
});