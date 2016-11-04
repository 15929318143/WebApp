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
		$arr = $_POST;
		//没有传来的id，那么表明执行添加操作
		if (!isset($arr['id'])) {
			//开启事务
			DB::query('BEGIN');
			//1.先处理表单内容
			if (!$arr['gName'])  return '1';
			if (!$arr['cId'])    return '2';
			if (!$arr['gLabel']) return '3';
			if (!$arr['gSum'])   return '4';
			if (!$arr['mPrice']) return '5';
			if (!$arr['gPrice']) return '6';
			if (!$arr['gDesc']=strip_tags($arr['gDesc']))  return '7';
			unset($arr['submit']);
			$arr['pubTime'] = time();
			$res1 = DB::add($this->_gtable, $arr);
				
			//2.先处理上传文件
			$files = isset($_FILES)&&!empty($_FILES)?$_FILES:null;
			if (!$files) return '8';
			$savePath = 'images/uploads';
			$upload = new Upload($files, $savePath);
			$res = $upload->upload();
			if (!$res['flag']) return '9';

			//3.按比例压缩上传的图片
			$imgs = $res['res'];
			$path = 'images/thumb/';
			$subPath = array('image_50','image_220','image_800');
			$thumbSize = array(50, 220, 800);
			for ($i=0; $i < count($imgs); $i++) { 
				//偷个懒，少写个循环,在这里生成上传到相册表的数据，因为这里刚好也迭代了$imgs
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
				return '0';
			} else {
				DB::query('ROLLBACK');
				return '10';
			}
		//有传过来的id,就是执行更新操作
		} else {
			//1.先处理表单内容
			if (!$arr['gName'])  unset($arr['gName']);
			if ($arr['cId']==$arr['old_cId']) unset($arr['cId']);
			//原分类id只是用来检查商品分类是否改变，用完就可以销毁了
			unset($arr['old_cId']);
			if (!$arr['gLabel']) unset($arr['gLabel']);
			if (!$arr['gSum'])   unset($arr['gSum']);
			if (!$arr['mPrice']) unset($arr['mPrice']);
			if (!$arr['gPrice']) unset($arr['gPrice']);
			if (!$arr['gDesc']=strip_tags($arr['gDesc']))  unset($arr['gDesc']);
			unset($arr['submit']);

			//2.先处理上传文件（如果有新上传的图片，执行上传操作）
			$files = isset($_FILES)&&!empty($_FILES)?$_FILES:null;
			if ($files) {
				$savePath = 'images/uploads';
				$upload = new Upload($files, $savePath);
				$res = $upload->upload();
				if (!$res['flag']) return '9';

				//3.按比例压缩上传的图片
				$imgs = $res['res'];
				$path = 'images/thumb/';
				$subPath = array('image_50','image_220','image_800');
				$thumbSize = array(50, 220, 800);
				for ($i=0; $i < count($imgs); $i++) { 
					//偷个懒，少写个循环,在这里生成上传到相册表的数据，因为这里刚好也迭代了$imgs
					$data[] = array(
						'gId' => $arr['id'],
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
			}
			$where = "`id`=".$arr['id'];
			unset($arr['id']);//更新不需要更新id，清除掉id
			if ($arr) {
				$res1 = DB::update($this->_gtable, $arr, $where);
			}
			return !isset($res1)&&!isset($res2)?'12':'11'; 
		}
	}

	public function delGoods() {
		$id = isset($_GET['id'])&&!empty($_GET['id'])?$_GET['id']:null;
		if ($id) {
			$sql = "DELETE g.*, a.* FROM {$this->_gtable} g, {$this->_atable} a WHERE g.id={$id} and a.gId={$id};";
			return DB::execute($sql)?true:false;
		} 
		return false;
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
		//获取商品的基本信息
		$sql = "SELECT g.id, g.gName, g.gLabel, g.gSum, g.mPrice, g.gPrice, g.gDesc, g.pubTime, g.isShow, g.isHot, c.cName FROM `{$this->_gtable}` g join `{$this->_ctable}` c on g.cId=c.id LIMIT {$offset}, {$pageSize};";
		$rows = DB::get_all($sql);
		//获取商品的图片
		$sql = "SELECT g.id, a.albumPath FROM `{$this->_gtable}` g join `{$this->_atable}` a on g.id=a.gId;";
		$imgsPath = DB::get_all($sql);
		//生成分页条
		$pageBan = $pageBanner->getBan();
		$pageBan = array('pageBan'=>$pageBan);
		$data = array(
			'rows'=>$rows,
			'imgsPath'=>$imgsPath,
			'pageBan'=>$pageBan
			);
		return $data?$data:array('rows'=>null);
	}

	public function getAll($table) {
		$sql = "SELECT * FROM `$table`;";
		$rows = DB::get_all($sql);
		return $rows?$rows:null;
	}

	public function getById($id) {
		//获取商品的基本信息
		$sql = "SELECT g.id, g.cId, g.gName, g.gLabel, g.gSum, g.mPrice, g.gPrice, g.gDesc, g.pubTime, g.isShow, g.isHot, c.cName FROM `{$this->_gtable}` g join `{$this->_ctable}` c on g.cId=c.id and g.id={$id};";
		$row = DB::get_one($sql)?DB::get_one($sql):null;
		return $row?$row:null;
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