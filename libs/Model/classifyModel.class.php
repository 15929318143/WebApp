<?php
/**
* 
*/
class classifyModel {
	
	private $_table = 'category';
	private $_gtable = 'goods';

	public function __construct() {
		# code...
	}

	public function addCate() {
		$cName = $_POST['cName'];
		if ($this->getByName($cName)) return 1;
		$data = array('cName'=>$cName);
		return DB::add($this->_table, $data)?0:2;
	}

	public function listCate() {
		$sql = "SELECT count(*) as 'total' FROM `$this->_table`;";
		$totalRows = DB::query($sql)->fetch_assoc()['total'];//所有记录的条数
		if (!$totalRows) return array('rows'=>null);
		$pageSize = 10;
		$totalPage = ceil($totalRows/$pageSize);
		//如果page不存在，或者为空，或者小于1，则赋其值为1
		$page = (isset($_GET['page'])&&!empty($_GET['page'])&&$_GET['page']>1)?$_GET['page']:1;
		//如果当前页码大于总页码，则赋其值为总页码数
		if ($page>$totalPage) $page = $totalPage;
		$controller = $_GET['controller'];
		$method = $_GET['method'];
		$pageBanner = new PageBanner($page, $this->_table, $totalPage, $pageSize, $controller, $method);
		$sql = $pageBanner->get_sql();
		$pageBan = $pageBanner->getBan();
		$rows = DB::get_all($sql);
		$pageBan = array('pageBan'=>$pageBan);
		$data = array(
			'rows'=>$rows,
			'pageBan'=>$pageBan
			);
		return $data?$data:array('rows'=>null);
	}

	public function deleteCate() {
		$id = isset($_GET['id'])&&!empty($_GET['id'])?$_GET['id']:'';
		DB::query('BEGIN');
		//删除该分类下的全部商品
		$where = "`cId`=$id";
		//如果有商品则删除
		if (DB::find($this->_gtable, $where)) {
			$r1 = DB::del($this->_gtable, $where);
		//如果没有，将$r1=true，方便下面操作
		} else {
			$r1 = true;
		}
		//删除该分类
		$where = "`id`= $id";
		$r2 = DB::del($this->_table, $where);
		if ($r1 && $r2) {
			DB::query('COMMIT');
			return true;
		} else {
			DB::query('ROLLBACK');
			return false;
		}
	}

	public function updateCate() {
		$id = $_POST['id'];
		$cName = $_POST['cName'];
		//如果cName为空或者内容与原来的一致，均视为没有做任何改动
		if (!$cName||$this->getById($id)[0]['cName']==$cName) return 1;
		$data = array('cName'=>$cName);
		$where = "`id`= $id";
		return DB::update($this->_table, $data, $where)?0:2;
	}

	public function getById($id) {
		if (isset($id)&&!empty($id)) {
			$row = DB::find_by_id($this->_table, $id);
		} else {
			return null;	
		}
		return $row?$row:null;
	}

	public function getByName($name) {
		if (isset($name)&&!empty($name)) {
			$where = "`cName`='$name'";
			$row = DB::find($this->_table, $where);
		} else {
			return null;
		}
		return $row?$row:null;
	}
}
?>