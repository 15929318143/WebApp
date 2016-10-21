<?php
/**
* 工具类：文件上传
*/
class Upload {

	private $maxSize; //默认上传文件大小限制
	private $allowExt;//默认上传文件类型
	private $flag;//是否检查上传文件的真实性
	private $path;//文件保存目录
	private $files;//上传文件
	
	public function __construct($files, $path='uploads', $maxSize=2097152, $allowExt=array(), $flag=true) {
		$this->maxSize = $maxSize;
		$this->allowExt = empty($allowExt)?$this->allow_ext():$allowExt;
		$this->flag = $flag;
		$this->path = $this->create_path($path);
		$this->files = $files;
	}

	public function upload() {
		$files = $this->get_file($this->files);
		$result = $this->check_file($files);
		return $result;	
	}

	private function get_file($files) {
		$i=0;
		$res = array();
		foreach ($files as $file) {
			if (is_string($file['name'])) {
				$res[$i] = $file;
				$i++;
			}
			if (is_array($file['name'])) {
				foreach ($file['name'] as $key => $value) {
					$res[$i]['name']     = $file['name'][$key];
					$res[$i]['type']     = $file['type'][$key];
					$res[$i]['tmp_name'] = $file['tmp_name'][$key];
					$res[$i]['error']    = $file['error'][$key];
					$res[$i]['size']     = $file['size'][$key];
					$i++;
				}
			}
		}
		return $res;
	}

	private function check_file($files) {
		$res = array();
		$maxSize = $this->maxSize;
		$allowExt = $this->allowExt;
		$flag = $this->flag;
		$path = $this->path;
		foreach ($files as $file) {
			if ($file['error']>0) {
				switch ($file['error']) {
					case 1:
						$res[] = $file['name']."上传文件超过了PHP配置文件中的upload_max_filesize选项的最大值";
						break;
					case 2:
						$res[] = $file['name']."超过了表单MAX_FILE_SIZE限制的大小";
						break;
					case 3:
						$res[] = $file['name']."文件部分被上传";
						break;
					case 4:
						$res[] = "没有选择上传文件";
						break;
					case 6:
						$res[] = "没有找到临时目录";
						break;
					case 7:
						$res[] = $file['name']."文件不可写";
					case 8:
						$res[] = "PHP扩展程序中断文件上传";
						break;
				}
				continue;
			}
			if ($file['error'] == 0){
				if ($file['size']>$maxSize) {
					$res[] = $file['name'].'上传文件过大';
					continue;
				}
				$ext = $this->get_ext($file['name']);
				$ext = strtolower($ext); 
				if (!in_array($ext, $allowExt)) {
					$res[] = $file['name'].'非法文件类型';
					continue;
				}
				if (!is_uploaded_file($file['tmp_name'])) {
					$res[] = $file['name'].'通过非HTTP POST方式上传';
					continue;
				}
				if ($flag) {
					if (!getimagesize($file['tmp_name'])) {
						$res[] = $file['name'].'不是真正的图片';
						continue;
					}
				}

				$name = $this->uniq_id();
				$destination = $path.'/'.$name.$ext;
				if (move_uploaded_file($file['tmp_name'], $destination)) {
					$res[] = $destination;
				} else {
					$res[] = $file['name'].'上传失败';
				}
			}
		}
		return $res;
	}

	private function allow_ext() {
		return array('jpeg', 'jpg', 'gif', 'png', 'wbnp');
	}

	private function uniq_id(){
		return md5(uniqid(microtime(true), true));
	}

	private function get_ext($file) {
		return  pathinfo($file, PATHINFO_EXTENSION);
	}

	private function create_path($path) {
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
			chmod($path, 0777);
		}
		return $path;
	}
}
/*header("Content-Tyep:text/html; charset=utf8");
require_once('Upload.class.php');
$upload = new upload($_FILES);
$res = $upload->upload();
echo "<pre>";
var_dump($_FILES);
print_r($res);*/
?>