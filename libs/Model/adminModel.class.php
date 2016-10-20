<?php
class adminModel { 

	private $admin = '';//当前管理员
	private $_table =  'admin';

	public function __construct() {
		if (isset($_SESSION['admin'])&&!empty($_SESSION['admin'])) {
			$this->admin = $_SESSION['admin'];
		}
	}

	//进行登录验证的一系列业务逻辑
	public function login() {
		//验证码
		$verify = strtolower($_POST['verify']);
		if ($verify!==$_SESSION['verify']) return 1;
		if (empty($_POST['username'])||empty($_POST['password'])) return 2;
		$username = addslashes($_POST['username']);
		$password = addslashes($_POST['password']);
		//用户验证
		if ($this->admin = $this->checkAdmin($username, $password)) {
			$_SESSION['admin'] = $this->admin['username'];
			//设置一周内自动登录
			if (isset($_POST['autoFlag']) && $_POST['autoFlag']) {
				setcookie('adminId', $this->admin['id'], time()+7*24*3600);
				setcookie('adminName', $this->admin['username'], time()+7*24*3600);
			}
			return 0;
		} else {
			return 3;
		}
	}

	public function addAdmin() {
		$username = $_POST['username'];
		if (empty($username)) return 1;
		$password = md5($_POST['password']);
		if (empty($password)) return 2;
		$email = $_POST['email'];
		if (empty($email)) return 3;
		if ($this->check($username)) return 4;
		if ($this->check($email, false)) return 5;
		$data = array(
			'username'=>$username,
			'password'=>$password,
			'email'=>$email
			);
		$res = DB::add($this->_table, $data);
		if ($res) return 0;
		return 6;
	}

	public function logout() {
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-1);
		}
		if (isset($_COOKIE['adminId'])) {
			setcookie('adminId', '', time()-1);
		}
		if (isset($_COOKIE['adminName'])) {
			setcookie('adminName', '', time()-1);
		}
		session_destroy();
		$this->admin = '';
		return true;
	}

	public function adminList() {
		$sql = "SELECT count(*) as 'total' FROM `$this->_table`;";
		$totalRows = DB::query($sql)->fetch_assoc()['total'];//所有记录的条数
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
		if ($data) {
			$view = V('admin');
			$view->adminList($data);
		}
	}

	public function adminUpdate() {
		$username = $_POST['username'];
		$password = $_POST['password1'];
		$email = $_POST['email'];
		//什么都没修改
		if (empty($username)&&empty($password)&&empty($email)) return 1;
		$id = $_POST['id'];
		$row = $this->getAdminById($id)[0];
		//原密码输入不正确
		if ($row['password']!=md5($_POST['password0'])) return 2;
		//用户名已存在
		if ($row['username']==$username||$this->check($username)) return 3;
		//密码与原密码一致
		if ($row['password']==md5($password)) return 4;
		//邮箱已存在
		if ($row['email']==$email||$this->check($email, false)) return 5;
		$data = array(
			'username'=>$username,
			'password'=>$password,
			'email'   =>$email
			);
		//清除空值
		$data = $this->checkArray($data);
		if (isset($data['password'])) {
			$data['password'] = md5($data['password']);
		}
		$where = "`id` = '$id'";
		return DB::update($this->_table, $data, $where)?0:6;

	}

	public function adminDelete() {
		if (isset($_GET['id'])&&!empty($_GET['id'])) {
			$id = $_GET['id'];
		}
		if (isset($id)) {
			$row = $this->getAdminById($id)[0];
			if ($row['username']==$this->admin) return 1;
			$where = "`id` = '$id'";
			return DB::del($this->_table, $where)?0:2;
		} 
		return 3;

	}

	public function getAdminById($id) {
		return DB::find_by_id($this->_table, $id);
	}
			
	public function getAdmin() {
		return $this->admin;
	} 

	public function checkLogined() {
		if (
			(isset($_SESSION['adminId'])  &&!empty($_SESSION['adminId'])   &&
			 isset($_SESSION['adminName'])&&!empty($_SESSION['adminName']))||
			(isset($_COOKIE['adminId'])   &&!empty($_COOKIE['adminId'])    &&
			 isset($_COOKIE['adminName']) &&!empty($_COOKIE['adminName']))
			) {
			$this->admin = $_COOKIE['adminName']?$_COOKIE['adminName']:$_SESSION['adminName'];
			return true;
		}
		return false;
	}

	//检查用户或邮箱是否已存在，存在则返回true,否则返回false;
	private function check($field, $flag=true) {
		if ($flag) {
			$where = "`username` = '$field'";
		} else {
			$where = "`email`='$field'";
		}	
		$res = DB::find($this->_table, $where)[0];
		if (!$res) return false;
		return true;
		
	}

	private function checkArray($arr) {
		foreach ($arr as $k=>$v) {
			if (!$arr[$k]) {
				unset($arr[$k]);
			}
		}
		return $arr;
	}

	private function checkAdmin($username, $password) {
		$where = "`username`='$username'";
		$admin = DB::find($this->_table, $where)[0];
		return !empty($admin)&&$admin["password"]==md5($password)?$admin:false;
	}
}
?>