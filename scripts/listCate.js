$(document).ready(function () {
	$('.del').each(function (index, ele) {
		$(this).click(function () {
			if (window.confirm("您确定要删除吗？删除后不能恢复哦（^_^）！")) {
				$(this).attr('href', $(this).attr('href')+'&del=yes');
			}
		});
	});
});