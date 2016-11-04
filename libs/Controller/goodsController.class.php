<?php
/**
* 
*/
class goodsController {

	public static $view;
	public static $model;
	private $url1;
	private $url2;
	
	public function __construct() {
		self::$view = V('goods');
		self::$model = M('goods');
		$this->url1 = 'admin.php?controller=goods&method=addGoods';
		$this->url2 = 'admin.php?controller=goods&method=listGoods';
	}

	public function addGoods() {
		$data = '';
		$id = isset($_GET['id'])&&!empty($_GET['id'])?$_GET['id']:null;
		//如果有post过来的数据，表明执行添加商品操作
		$url1 = $this->url1;
		$url2 = $this->url2;
		if ($_POST) {
			$status = self::$model->addGoods();
			switch ($status) {
				case '0':
					$data = array(
						'msg'=>"添加商品成功,请<a href=$url1>继续添加</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '1':
					$data = array(
						'msg'=>"失败，必须填写商品名称,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '2':
					$data = array(
						'msg'=>"失败，必须选择一个商品分类,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '3':
					$data = array(
						'msg'=>"失败，必须填写商品货号,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '4':
					$data = array(
						'msg'=>"失败，必须填写商品数量,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '5':
					$data = array(
						'msg'=>"失败，必须填写商品市场价,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '6':
					$data = array(
						'msg'=>"失败，必须填写商品东东价,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '7':
					$data = array(
						'msg'=>"失败，必须填写商品描述,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '8':
					$data = array(
						'msg'=>"失败，请选择商品图片，<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '9':
					$data = array(
						'msg'=>"图片上传失败,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '10':
					$data = array(
						'msg'=>"系统错误，发布商品失败,请<a href=$url1>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;
				case '11':
					$data = array(
						'msg'=>"更新商品信息成功,返回<a href=$url2>商品列表</a>"
						);
					break;
				case '12':
					$url = $url1.'&id='.$_POST['id'];
					$data = array(
						'msg'=>"没有做任何修改,请<a href=$url>重试</a>,或者返回<a href=$url2>商品列表</a>"
						);
					break;

				default:break;
			}
			$data['hidden'] = 'hidden';
		//显示添加商品的待填写的空白对话框
		} else {
			$cates = self::$model->getAll('category');
			if ($cates) $data = array('cates'=>$cates);
			else $data = array('cates'=>null, 'hidden0'=>'hidden');	
		}
		//如果有get过来的id，表明执行修改商品操作
		if ($id) {
			if ($row = self::$model->getById($id)) $data = array_merge($data, array('row'=>$row));
			else $data =array_merge($data, array('msg'=>"数据查询有误，请返回<a href=$url2>商品列表</a>", 'hidden'=>'hidden'));
		}
		self::$view->addGoods($data);
	}

	public function delGoods() {
		$data['hidden'] = 'hidden';
		if (self::$model->delGoods()) {
			$data['msg'] = "删除商品成功，返回<a href=$this->url2>商品列表</a>";
		} else {
			$data['msg'] = "删除商品失败，返回<a href=$this->url2>商品列表</a>";
		}
		$this->listGoods($data);
	}
	
	public function listGoods($value='') {
		if (!$value) {
			$data = self::$model->listGoods();
			self::$view->listGoods($data);
		} else {
			self::$view->listGoods($value);
		}
	}
}
?>