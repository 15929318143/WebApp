<?php
class indexController {

	private $user = "";//当前用户
	public static $view;
	public static $model;

	public function __construct() {
		self::$model = M('index');
		self::$view = V('index');
		$this->user = self::$model->getUser();
	}

	//前端首页
	public function index() {
		$data = self::$model->getGoods();
		self::$view->index($data);
	}

	//产品分类页
	public function classify() {
		self::$view->classify();
	}

	//商品介绍页

	public function description() {
		self::$view->description();
	}

	//筛选页
	public function screen() {
		self::$view->screen();
	}

	//购物车页
	public function settlement() {
		self::$view->settlement();
	}
}
?>