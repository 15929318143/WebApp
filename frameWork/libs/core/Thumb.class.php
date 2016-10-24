<?php
class Thumb {

	private $info = array();//图片的基本信息
	private $image = null;  //所要操作的图片

	public function __construct($src) {
			$info = getimagesize($src);
			$this->info = array(
				'width' => $info[0],
				'height' => $info[1],
				'type' => image_type_to_extension($info[2], false),
				'mime' => $info['mime']
				);
			$fun = "imagecreatefrom{$this->info['type']}";
			$this->image = $fun($src);
	}

	public function thumb($w, $h) {
		$thumbImage = imagecreatetruecolor($w, $h);
		imagecopyresampled($thumbImage, $this->image, 0, 0, 0, 0, $w, $h, $this->info['width'], $this->info['height']);
		imagedestroy($this->image);
		$this->image = $thumbImage;
	}

	public function show() {
		header("content-type:".$this->info['mime']);
		$fun = "image{$this->info['type']}";
		$fun($this->image);
	}

	public function save($path='thumb') {
		$path = $this->check_path($path);
		$name = $this->uniq_id();
		$fun = "image{$this->info['type']}";
		$fun($this->image, $path.'/'.$name);
	}

	private function uniq_id(){
		return md5(uniqid(microtime(true), true));
	}

	private function check_path($path) {
		if (!file_exists($path)) {
			mkdir($path, 0777, true);
			chmod($path, 0777);
		}
		return $path;
	}

	public function __destruct() {
		imagedestroy($this->image);
	}
}
?>