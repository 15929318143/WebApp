<?php
/**
* 分类操作控制器
*/
class classifyController {

	public static $view;
	public static $model;
	
	public function __construct() {
		self::$view = V('classify');
		self::$model = M('classify');
	}

	public function addCate() {
		$data = '';
		$url1 = 'admin.php?controller=classify&method=addCate';
		$url2 = 'admin.php?controller=classify&method=listCate';
		if ($_POST) {
			$status = self::$model->addCate();
			switch ($status) {
				case 0:
					$data = array(
						'msg'=>"添加分类成功！，请".
							   "<a href=$url1>继续添加</a>".
							   "或者返回<a href=$url2>分类列表</a>",
						'hidden'=>'hidden'
						);
					break;
				case 1:
					$data = array(
						'msg'=>"分类已存在！不允许重复添加，请".
							   "<a href=$url1>重新添加</a>".
							   "或者返回<a href=$url2>分类列表</a>",
						'hidden'=>'hidden'
						);
					break;
				case 2:
					$data = array(
						'msg'=>"添加分类失败！，请".
							   "<a href=$url1>重新添加</a>".
							   "或者返回<a href=$url2>分类列表</a>",
						'hidden'=>'hidden'
						);
					break;
			}
		}
		self::$view->addCate($data);
	}

	public function listCate() {
		$data = self::$model->listCate();
		self::$view->listCate($data);
	}

	public function deleteCate() {
		$del = isset($_GET['del'])&&!empty($_GET['del'])?$_GET['del']:'';
		if ($del == 'yes') {
			$url = 'admin.php?controller=classify&method=listCate';
			if (self::$model->deleteCate()) {
				$this->showMsg('删除分类成功', $url);
			} else {
				$this->showMsg('删除分类失败', $url);
			}
		} else {
			$this->listCate();
		}
	}
			

	public function updateCate() {
		if ($_POST) {
			$id = $_POST['id'];
			$url = "admin.php?controller=classify&method=updateCate&id=$id";
			$status = self::$model->updateCate();
			switch ($status) {
				case 0:
					$this->showMsg('修改分类成功', $url);
					break;
				case 1:
					$this->showMsg('没有做任何修改', $url);
					break;
				case 2:
					$this->showMsg('系统错误,修改分类失败', $url);
					break;
			}
		} else {
			$id = isset($_GET['id'])&&!empty($_GET['id'])?$_GET['id']:'';
			$row = self::$model->getById($id)[0];
			$data = array('row'=>$row);
			self::$view->updateCate($data);
		}
	}

	private function showMsg($msg, $url) {
		echo "<script>alert('$msg');window.location.href='$url';</script>";
	}
}
?>