<?php
class indexModel {

	private $user = "";
	private $_table = "user";

	public function __construct() {
		if (isset($_SESSION['index'])&&!empty($_SESSION['index'])) {
			$this->index = $_SESSION['index'];
		}
	}
	
	public function getUser() {
		return $this->user;
	}
}
?>