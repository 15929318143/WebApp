$(document).ready(function () {
	$('#selectFileBtn').click(function() {
		//创建文件域
		$fileField = $('<input type="file" name="files[]"/>');
		$fileField.hide();
		//添加文件域
		$("#attachList").append($fileField);
		$fileField.trigger("click");
		$fileField.change(function() {
			$path = $(this).val();
			$filename = $path.substring($path.lastIndexOf("\\")+1);
			$attachItem = $(
				'<div class="attachItem">\
					<div class="left">a.gif</div>\
					<div class="right"><a href="#" title="删除附件">删除</a></div>\
				</div>'
				);
			$attachItem.find(".left").html($filename);			
			$("#attachList").append($attachItem);
		});
		$('.attachItem a').each(function(index, ele) {
			$(this).click(function() {
				$(this).closest('.attachItem').remove();
			});
		});
	});
});