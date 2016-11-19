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
		foreach ($cates as $k => $v) {
			$sql = "SELECT g.id,g.gName,g.gLabel,g.gSum,g.mPrice,g.gPrice,g.pubTime,g.isShow,g.isHot,a.albumPath FROM {$this->_gtable} g left join {$this->_atable} a on g.id=a.gId WHERE g.cId={$cates[$k]['id']} ORDER BY g.id DESC LIMIT 0,4;";
			$cates[$k]['rows'] = DB::get_all($sql);
		}
		$data = array(
			'goods'=>$cates
			);
		return $data?$data:null;
	}

	public function getUser() {
		return $this->user;
	}
}
?>