<?php
/**
* 
*/
class pageBanner {

	private $page; //当前页码
	private $pageSize; //每页显示记录条数
	private $offset;//每条记录的偏移量
	private $sql; //查询数据的SQL语句
	private $showPage;//显示页码数
	private $pageOffset; //当前页码的偏移量
	private $totalPage; //总页码数
	private $start; //所要显示的页码的首页
	private $end; //所要显示的页码的尾页
	private $pageBan;//分页条
	private $controller;//控制器
	private $method;//方法

	public function __construct($page, $table, $totalPage, $pageSize, $controller, $method, $showPage=5) {
		$this->page = $page;
		$this->totalPage = $totalPage;
		$this->pageSize = $pageSize;
		$this->offset = ($this->page-1)*$this->pageSize;
		$this->sql = "SELECT * FROM `$table` LIMIT $this->offset, $this->pageSize";
		$this->showPage = $showPage;
		$this->pageOffset = ($showPage-1)/2;
		$this->start = 1;
		$this->end = $this->totalPage;
		$this->pageBan = "<div class='page'>";
		$this->controller = $controller;
		$this->method = $method;
	}

	public function getBan() {
		$this->head();
		$this->body();
		$this->showPage();
		$this->tail();
		return $this->pageBan;

	}

	public function get_sql() {
		return $this->sql;
	}

	public function showRows($rows) {
		echo "<div class='content'>";
		echo "<table border='1' width='400px' cellspacing='0' cellpadding='0'";
			echo "<tr>";
				echo "<td>ID</td>";
				echo "<td>用户名</td>";
				echo "<td>权限</td>";
				echo "<td>锁定</td>";
			echo "</tr>";
			for ($i=0; $i < count($rows); $i++) { 
			echo "<tr>";
				echo "<td>".($i+$this->offset)."</td>";
				echo "<td>".$rows[$i]['username']."</td>";
				echo "<td>".$rows[$i]['permission']."</td>";
				echo "<td>".$rows[$i]['locked']."</td>";
			echo "</tr>";
			}
		echo "</table>";
		echo "</div>";
	}

	//首部
	private function head() {
		$page = $this->page;
		if ($page>1) {
			$this->pageBan .= "<a href='".$_SERVER['PHP_SELF']."?controller=$this->controller&method=$this->method&page=1' class='noborder hover'>首页</a>";
			$this->pageBan .= "<a href='".$_SERVER['PHP_SELF']."?controller=$this->controller&method=$this->method&page=".($page-1)."' class='hover'>&lt; 上一页</a>";
		} else {
			$this->pageBan .= "<a class='disable noborder'>首页</a>";
			$this->pageBan .= "<a class='disable'>&lt; 上一页</a>";
		}
	}	

	private function body() {
		$page = $this->page;
		$totalPage = $this->totalPage;
		$showPage = $this->showPage;
		$pageOffset = $this->pageOffset;
		//总页数大于所要显示的页数情况下
		if ($totalPage>$showPage) {
			//如果当前页大于偏移量+1，，则应有左省略号，（只有1、2、3页不大于偏移量+1）
			if ($page>$pageOffset+1) {
				$this->pageBan .= '...';
			}
			/*从第3页开始，所显示的数字页码的 首页=当前页-偏移量，结束页=当前页+偏移量
				如[3][4][5][6][7]，当前页为[5],首页为[3],结束页为[7]
			*/
			if ($page>$pageOffset) {
				$this->start = $page-$pageOffset;
				$this->end = $totalPage > $page+$pageOffset ? $page+$pageOffset : $totalPage;
			} else {
			//前2页
				$this->start = 1;
				$this->end = $totalPage > $showPage ? $showPage : $totalPage;
			}
			/*如果 当前页+偏移量 > 总页数，如[6][7][8][9][10],当前页[9],开始页理应为[7]
			,但页数不够,则开始页为[6]=[7]-([9]+2-[10]),结束页为[10]*/
			if ($page+$pageOffset>$totalPage) {
				$this->start = $this->start - ($page + $pageOffset - $this->end);
			}
		}
	}

	private function showPage() {
		for ($i=$this->start; $i <= $this->end; $i++) { 
			if ($this->page == $i) {
				$this->pageBan .= "<a class='current'>$i</a>";
			} else {
				$this->pageBan .= "<a href='".$_SERVER['PHP_SELF']."?controller=$this->controller&method=$this->method&page={$i}'>$i</a>";
			}
		}
		//当 总页数 >显示页数 并且总页数 >当前页 +偏移量时，应有右侧省略号
		if ($this->totalPage>$this->showPage&&$this->totalPage>$this->page+$this->pageOffset) {
			$this->pageBan .= '...';
		}
	}
				
	//尾部
	private function tail() {
		$page = $this->page;
		if ($page<$this->totalPage) {
			$this->pageBan .= "<a href='".$_SERVER['PHP_SELF']."?controller=$this->controller&method=$this->method&page=".($page+1)."'>下一页 &gt;</a>";	
			$this->pageBan .= "<a href='".$_SERVER['PHP_SELF']."?controller=$this->controller&method=$this->method&page=".$this->totalPage."' class='noborder'>尾页</a>";	
		} else {
			$this->pageBan .= "<a class='disable'>下一页 &gt;</a>";
			$this->pageBan .= "<a class='disable noborder'>尾页</a>";
		}
		$this->pageBan .= " 共{$this->totalPage}页,";
		$this->pageBan .= "<form action='".$_SERVER['PHP_SELF']."' method='get'>";
		$this->pageBan .= "<input type='hidden' name='controller' value=$this->controller>";
		$this->pageBan .= "<input type='hidden' name='method' value=$this->method>";
		$this->pageBan .= "到第<input type='text' name='page' size='2'>页";
		$this->pageBan .= "<input type='submit' value='确定'>";
		$this->pageBan .= "</form></div>";
	}
}
/*require_once('../db/MysqliDB.class.php');
$mysqli = new MysqliDB();
$table = 'user';
$sql = "select count(*) as total from `$table`;";
$query = $mysqli->query($sql);
$totalRows = $query->fetch_assoc()['total'];
$page = isset($_GET['page'])&&!empty($_GET['page'])?$_GET['page']:1;
$pageBanner = new pageBanner($page, $table, $totalRows);
$rows = $mysqli->get_all($pageBanner->get_sql());
$pageBanner->showRows($rows);
$pageBanner->showBan();*/
?>