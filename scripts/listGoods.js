function showDetail(id, t){
	$("#showDetail"+id).dialog({
		height:"auto",
		width: "auto",
		position: {my: "center", at: "center",  collision:"fit"},
		modal:true,//是否模式对话框
		draggable:true,//是否允许拖拽
		resizable:true,//是否允许拖动
		title:"商品名称："+t,//对话框标题
		show:"slide",
		hide:"explode"
	});
}
function delGoods(id){
	if(window.confirm("您确认要删除嘛？添加一次不易，且删且珍惜!")){
		window.location="admin.php?controller=goods&method=delGoods&id="+id;
	}
}
function search(){
	if(event.keyCode==13){
		var val=document.getElementById("search").value;
		window.location="listPro.php?keywords="+val;
	}
}
function change(val){
	window.location="listPro.php?order="+val;
}










