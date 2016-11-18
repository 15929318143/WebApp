<?php
class indexModel {

	private $user = "";
	private $_utable = "user";
	private $_gtable = "goods";
	private $_ctable = "category";
	private $_atable = "album";

	public function __construct() {
		if (isset($_SESSION['index'])&&!empty($_SESSION['index'])) {
			$this->index = $_SESSION['index'];
		}
	}
	
	public function getGoods() {
		$sql = "SELECT * FROM {$this->_ctable};";
		$cates = DB::get_all($sql);
		$sql = "SELECT * FROM {$this->_gtable};";
		$rows = DB::get_all($sql);
		$sql = "SELECT * FROM {$this->_atable};";
		$images = DB::get_all($sql);
		$sql = "SELECT g.id,g.gName,g.gPrice,g.gDesc,g.cId, c.cName, a.albumPath FROM {$this->_ctable} c left join ({$this->_gtable} g left join {$this->_atable} a on g.id=a.gId) on c.id=g.cId GROUP BY c.cName;";
		$row = DB::get_all($sql);
		$data = array(
			'cates'=>$cates,
			'rows'=>$rows,
			'images'=>$images
			);
		var_dump($row);
		return $data?$data:null;
	}

	public function getUser() {
		return $this->user;
	}
}
?>