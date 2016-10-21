<?php
/**
* 
*/
class classifyView {
	
	public function __construct() {
		# code...
	}

	public function addCate($data='') {
		if ($data) VIEW::assign($data);
		VIEW::display('template/admin/classify/addCate.html');
	}

	public function listCate($data='') {
		if ($data) VIEW::assign($data);
		VIEW::display('template/admin/classify/listCate.html');
	}

	public function updateCate($data='') {
		if ($data) VIEW::assign($data);
		VIEW::display('template/admin/classify/updateCate.html');
	}
}
?>