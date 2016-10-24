<?php
/**
* 
*/
class goodsController {

	public static $view;
	public static $model;
	
	public function __construct() {
		self::$view = V('goods');
		self::$model = M('goods');
	}

	public function addGoods() {
		$data = '';
		if ($_POST) {
			$status = self::$model->addGoods();
			$url1 = 'admin.php?controller=goods&method=addGoods';
			$url2 = 'admin.php?controller=goods&method=listGoods';
			switch ($status) {
				case 0:
					$data = array(
						'msg'=>"添加商品成功,请<a href=$url1>继续添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 1:
					$data = array(
						'msg'=>"失败，必须填写商品名称,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 2:
					$data = array(
						'msg'=>"失败，必须选择一个商品分类,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 3:
					$data = array(
						'msg'=>"失败，必须填写商品货号,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 4:
					$data = array(
						'msg'=>"失败，必须填写商品数量,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 5:
					$data = array(
						'msg'=>"失败，必须填写商品市场价,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 6:
					$data = array(
						'msg'=>"失败，必须填写商品东东价,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 7:
					$data = array(
						'msg'=>"失败，必须填写商品描述,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 8:
					$data = array(
						'msg'=>"失败，请选择商品图片，<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 9:
					$data = array(
						'msg'=>"图片上传失败,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 10:
					$data = array(
						'msg'=>"系统错误，操作商品表失败,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case 11:
					$data = array(
						'msg'=>"系统错误，操作相册表失败,请<a href=$url1>重新添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
			}
			$data['hidden'] = 'hidden';
		} else {
			$data = self::$model->getAll('category');
			if ($data) {
				$data = array('cates'=>$data);
			} else {
				$data = array('cates'=>null, 'hidden0'=>'hidden');	
			}
		}
		self::$view->addGoods($data);
	}

	public function listGoods() {
		$data = self::$model->listGoods();
		self::$view->listGoods($data);
	}
}
?>