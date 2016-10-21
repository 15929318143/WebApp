<?php
class adminView {
	
	public function admin() {
		VIEW::display('template/admin/admin.html');
	}

	public function login() {
		VIEW::display('template/admin/login.html');
	}

	public function main() {
		$data = array(
			'team'   => '东东',
			'phpVer'  => PHP_VERSION,
			'webAddr'  => GetHostByName($_SERVER['SERVER_NAME']),
			'sysName'   => '东东网购电商后台管理系统',
			'serverVer'  => $_SERVER["SERVER_SOFTWARE"],
			'phpRunMode'  => php_sapi_name(),
			'successCase'  => '东东网购',
			'operationSys'  => php_uname('s')
			);
		VIEW::assign($data);
		VIEW::display('template/admin/main.html');
	}

	public function left() {
		VIEW::display('template/admin/left.html');
	}

	public function addAdminPage() {
		VIEW::display('template/admin/addAdmin.html');
	}

	public function adminList($data) {
		VIEW::assign($data);
		VIEW::display('template/admin/adminList.html');
	}

	public function adminUpdate($data) {
		$data = array('row'=>$data);
		VIEW::assign($data);
		VIEW::display('template/admin/adminUpdate.html');
	}

	public function top() {
		$data = array();
		if (isset($_SESSION['adminName'])) {
			$data = array('username'=>$_SESSION['adminName']);
		} 
		if (isset($_COOKIE['adminName'])) {
			$data = array('username'=>$_COOKIE['adminName']);
		}
		VIEW::assign($data);
		VIEW::display('template/admin/top.html');
	}
}
?>