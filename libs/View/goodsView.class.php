<?php
/**
* 
*/
class goodsView {
	
	public function __construct() {
		# code...
	}

	public function addGoods($data='') {
		if ($data) VIEW::assign($data);
		VIEW::display('template/admin/goods/addGoods.html');
	}

	public function listGoods($data='') {
		if ($data) VIEW::assign($data);
		VIEW::display('template/admin/goods/listGoods.html');
	}
}
?>