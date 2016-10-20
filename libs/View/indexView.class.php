<?php
/**
* 
*/
class indexView {
	
	public function __construct() {
		# code...
	}

	public function index() {
		VIEW::display('template/index.html');
	}

	public function classify() {
		VIEW::display('template/classify.html');
	}

	public function description() {
		VIEW::display('template/description.html');
	}

	public function screen() {
		VIEW::display('template/screen.html');
	}
	
	public function settlement() {
		VIEW::display('template/settlement.html');
	}

}
?>