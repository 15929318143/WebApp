<?php
/**
* 
*/
class goodsModel {

	private $_gtable='goods';//商品表
	private $_atable='album';//相册表
	private $_ctable='category';//分类表
	
	public function __construct() {
		# code...
	}

	public function addGoods() {
		//开启事务
		DB::query('BEGIN');
		//1.先处理表单内容
		$arr = $_POST;
		if (!$arr['gName'])  return 1;
		if (!$arr['cId'])    return 2;
		if (!$arr['gLabel']) return 3;
		if (!$arr['gSum'])   return 4;
		if (!$arr['mPrice']) return 5;
		if (!$arr['gPrice']) return 6;
		if (!$arr['gDesc']=strip_tags($arr['gDesc']))  return 7;
		unset($arr['submit']);
		$arr['pubTime'] = time();
		$res1 = DB::add($this->_gtable, $arr);

		//2.先处理上传文件
		$files = isset($_FILES)&&!empty($_FILES)?$_FILES:null;
		if (!$files) return 8;
		$savePath = 'images/uploads';
		$upload = new Upload($files, $savePath);
		$res = $upload->upload();
		if (!$res['flag']) return 9;

		//3.按比例压缩上传的图片
		$imgs = $res['res'];
		$path = 'images/thumb/';
		$subPath = array('image_50','image_220','image_800');
		$thumbSize = array(50, 220, 800);
		for ($i=0; $i < count($imgs); $i++) { 
			//偷个懒，少写个循环,在这里生成上传到相册表的数据
			$data[] = array(
				'gId' => $res1,
				'albumPath' => $imgs[$i]
				);
			$thumb = new Thumb($imgs[$i]);
			for ($j=0; $j < 3; $j++) { 
				$w = $thumbSize[$j];
				$h = $thumbSize[$j];
				$thumb->thumb($w, $h);
				$save = $subPath[$j];
				$thumb->save($path.$save);
			}
		}
		$res2 = $this->insertMultiArr($data);
		if ($res1 && $res2) {
			DB::query('COMMIT');
			return 0;
		} else {
			DB::query('ROLLBACK');
			return 10;
		}
		
	}

	public function listGoods() {
		$sql = "SELECT count(*) as 'total' FROM `$this->_gtable`;";
		$totalRows = DB::query($sql)->fetch_assoc()['total'];//所有记录的条数
		if (!$totalRows) return array('rows'=>null);
		$pageSize = 10;
		$totalPage = ceil($totalRows/$pageSize);
		//如果page不存在，或者为空，或者小于1，则赋其值为1
		$page = (isset($_GET['page'])&&!empty($_GET['page'])&&is_numeric($_GET['page'])&&$_GET['page']>1)?$_GET['page']:1;
		//如果当前页码大于总页码，则赋其值为总页码数
		if ($page>$totalPage) $page = $totalPage;
		$controller = $_GET['controller'];
		$method = $_GET['method'];
		$pageBanner = new PageBanner($page, $this->_gtable, $totalPage, $pageSize, $controller, $method);
		$offset = ($page-1)*$pageSize;
		// $sql = "SELECT g.id, g.gName, g.gLabel, g.gSum, g.mPrice, g.gPrice, g.gDesc, g.pubTime, g.isShow, g.isHot, c.cName FROM `{$this->_gtable}` g join `{$this->_ctable}` c on g.cId=c.id LIMIT {$offset}, {$pageSize};";
		$sql = "SELECT *, c.cName FROM `{$this->_gtable}` g join `{$this->_ctable}` c on g.cId=c.id LIMIT {$offset}, {$pageSize};";
		$pageBan = $pageBanner->getBan();
		$rows = DB::get_all($sql);
		$pageBan = array('pageBan'=>$pageBan);
		$data = array(
			'rows'=>$rows,
			'pageBan'=>$pageBan
			);
		return $data?$data:array('rows'=>null);
	}

	public function getAll($table) {
		$sql = "SELECT * FROM `$table`;";
		$rows = DB::get_all($sql);
		return $rows?$rows:null;
	}

	//二维数组插入记录的操作
	private function insertMultiArr($arr) {
		$res = null;
		for ($i=0; $i < count($arr); $i++) { 
			if (DB::add($this->_atable, $arr[$i])) {
				$res[] = 0;
			} else {
				$res[] = 1;
			}
		}
		return max($res)==0?true:false;
	}
}
?>