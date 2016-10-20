<?php
class indexController {

	private $user = "";//当前用户
	private $view;

	public function __construct() {
		$this->view = V('index');
		$model = M('index');
		$this->user = $model->getUser();
	}

	//前端首页
	public function index() {
		$this->view->index();
	}

	//产品分类页
	public function classify() {
		$this->view->classify();
	}

	//商品介绍页

	public function description() {
		$this->view->description();
	}

	//筛选页
	public function screen() {
		$this->view->screen();
	}

	//购物车页
	public function settlement() {
		$this->view->settlement();
	}
}
?>