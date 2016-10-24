<?php
	class adminController {

		private $admin = "";//当前管理员
		public static $view;
		public static $model;

		public function __construct() {
			//判断当前是否已登录admin模型
			self::$model = M("admin");
			self::$view = V("admin");
			$this->admin = self::$model->getAdmin();
			//如果不是登录页，而且没有登录，就跳转到登录页
			if (empty($this->admin)&&(FUCK::$method!=="login")) {
				$this->showMessage("请登录后再操作", "admin.php?controller=admin&method=login");
			}
		}


		//后台首页
		public function admin() {
			self::$view->admin();
		}

		//后台主页
		public function main() {
			self::$view->main();
		}

		//后台顶部
		public function top() {
			self::$view->top();
		}

		public function left() {
			self::$view->left();
		}

		//后台登录页
		public function login() {
			//检查是否设置自动登录，若已设置，则直接跳到后台首页
			if ($this->checkLogined()) {
				$this->admin();
			}
			if ($_POST) {
				$this->checkLogin();
			} else {
				self::$view->login();
			}
		}

		public function addAdmin() {
			$status = self::$model->addAdmin();
			switch ($status) {
				case 0:
					$this->showMessage("添加管理员成功", "admin.php?controller=admin&method=adminList");
					break;
				case 1:
					$this->showMessage("添加管理员失败，用户名不能为空", "admin.php?controller=admin&method=addAdminPage");
					break;
				case 2:
					$this->showMessage("添加管理员失败，密码不能为空", "admin.php?controller=admin&method=addAdminPage");
					break;
				case 3:
					$this->showMessage("添加管理员失败，邮箱不能为空", "admin.php?controller=admin&method=addAdminPage");
					break;
				case 4:
					$this->showMessage("添加管理员失败，管理员已存在", "admin.php?controller=admin&method=addAdminPage");
					break;
				case 5:
					$this->showMessage("添加管理员失败，邮箱已存在", "admin.php?controller=admin&method=addAdminPage");
					break;
				case 6:
					$this->showMessage("添加管理员失败，数据库操作错误", "admin.php?controller=admin&method=addAdminPage");
					break;
			}
		}

		public function addAdminPage() {
			self::$view->addAdminPage();
		}

		public function logout() {
			if (self::$model->logout()) {
				//设置当前管理员为空
				$this->admin = self::$model->getAdmin();
				//并跳转到登录页	
				$this->showMessage("退出登录成功", "admin.php?controller=admin&method=login");
			} else {
				$this->showMessage("退出登录失败", "admin.php?controller=admin&method=admin");
			}
		}

		public function adminList() {
			$data = self::$model->adminList();
			self::$view->adminList($data);
		}
		
		public function adminUpdate() {
			if ($_POST) {
				$status = self::$model->adminUpdate();
				switch ($status) {
					case 0:
						$this->showMessage("管理员更新信息成功", "admin.php?controller=admin&method=adminList");
						break;
					case 1:
						$this->showMessage("没有做任何修改", "admin.php?controller=admin&method=adminUpdate&id=".$_POST['id']);
						break;
					case 2:
						$this->showMessage("请输入正确的原密码", "admin.php?controller=admin&method=adminUpdate&id=".$_POST['id']);
						break;
					case 3:
						$this->showMessage("管理员名称已存在，请换其他的名称", "admin.php?controller=admin&method=adminUpdate&id=".$_POST['id']);
						break;
					case 4:
						$this->showMessage("与原密码一致，修改无效，请换其他密码", "admin.php?controller=admin&method=adminUpdate&id=".$_POST['id']);
						break;
					case 5:
						$this->showMessage("管理员邮箱已存在，请换其他的邮箱", "admin.php?controller=admin&method=adminUpdate&id=".$_POST['id']);
						break;
					case 6:
						$this->showMessage("系统错误，更新管理员信息失败", "admin.php?controller=admin&method=adminUpdate&id=".$_POST['id']);
						break;

				}
			} else {
				//获取id值
				if (isset($_GET['id'])&&!empty($_GET['id'])) {
					$id = $_GET['id'];
				}
				//根据id查询记录
				if (isset($id)) {
					$row = self::$model->getAdminById($id)[0];
					$row["password"] = md5($row["password"]);
				} else {
					$this->showMessage("当前ID不存在", "admin.php?controller=admin&method=adminList");
				}
				if (isset($row)&&!empty($row)) {
					//判断修改的管理员是否为当前已登录管理员
					if ($row["username"]==$this->admin) {
						$this->showMessage("当前管理员已经登录，不可修改", "admin.php?controller=admin&method=adminList");
					} else {
					//若不是当前已登录管理员，则跳到修改页面
						self::$view->adminUpdate($row);	
					}
				}
			}
		}
					
		public function adminDelete() {
			$status = self::$model->adminDelete(); 
			$url = 'admin.php?controller=admin&method=adminList';
			switch ($status) {
				case 0:
					$this->showMessage('删除管理员成功', $url);
					break;
				case 1:
					$this->showMessage('删除管理员失败，已登录管理员不可操作', $url);
					break;
				case 2:
					$this->showMessage('系统错误，删除失败', $url);
					break;
				case 3:
					$this->showMessage('删除失败，管理员不存在', $url);
					break;
			}
		}

		private function checkLogin() {
			switch (self::$model->login()) {
				case 0:
					$this->showMessage("登录成功", "admin.php?controller=admin&method=admin");
					break;
				case 1:
					$this->showMessage("验证码输入错误，请重试", "admin.php?controller=admin&method=login");
					break;
				case 2:
					$this->showMessage("用户名或密码不能为空", "admin.php?controller=admin&method=login");
					break;
				case 3:
					$this->showMessage("用户不存在", "admin.php?controller=admin&method=login");
					break;
			}
			$this->showMessage("登录失败", "admin.php?controller=admin&method=login");
		}

		private function checkLogined() {
			if (self::$model->checkLogined()) {
				$this->admin = self::$model->getAdmin();
			}
		}

		private function showMessage($msg, $url) {
			echo "<script>alert('$msg');window.location.href='$url';</script>";
		}
	}
?>