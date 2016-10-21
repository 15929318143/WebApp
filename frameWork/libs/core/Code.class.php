<?php
class Code {

	private $font;    //验证码字体
	private $dict;    //字符字典
	private $width;   //验证码的宽度
	private $height;  //验证码的高度
	private $codeNum; //验证码的字符个数
	private $verify;  //验证码内容
	private $image;   //图像资源
	private $pixelNum;//干扰点数
	private $lineNum; //干扰线条数

	//默认宽100，高30，字符4个
	function __construct($font, $dict='', $w=100, $h=30, $codeNum=4, $lineNum=4, $pixelNum=200) {
		$this->font = $font;
		$this->dict = empty($dict)?'23456789abcdefghijkmnpqrstuvwxyzABCDEFGHIJKLMNPQRSTUVWXYZ':$dict;
		$this->width = $w;
		$this->height = $h;
		$this->codeNum = $codeNum;
		$this->pixelNum = $pixelNum;
		$this->lineNum = $lineNum;
	}

	public function createImage() {
		$this->bgImage();
		$this->addDisturb();
		$this->addCode();
		// $this->showImage();
	}


	//创建图像资源
	private function bgImage() {
		//创建图像资源
		$this->image = imagecreatetruecolor($this->width, $this->height);
		//随机背景色
		$bgColor = imagecolorallocate($this->image, mt_rand(50, 100), mt_rand(50, 100), mt_rand(50, 100));
		//填充背景色
		imagefilledrectangle($this->image, 1, 1, $this->width-2, $this->height-2, $bgColor);
		//边框颜色
		$borderColor = imagecolorallocate($this->image, 200, 200, 200);
		//画出矩形边框
		imagerectangle($this->image, 0, 0, $this->width-1, $this->height-1, $borderColor);
	}

	//添加干扰元素
	private function addDisturb() {
		//添加干扰点
		for ($i=0; $i < $this->pixelNum; $i++) { 
			$color = imagecolorallocate($this->image, mt_rand(120, 180), mt_rand(120, 180), mt_rand(120, 180));
			imagesetpixel($this->image, mt_rand(1, $this->width), mt_rand(1, $this->height), $color);
		}
		//添加干扰线
		for ($i=0; $i < $this->lineNum; $i++) { 
			$color = imagecolorallocate($this->image, mt_rand(120, 180), mt_rand(120, 180), mt_rand(120, 180));
			imageline($this->image, mt_rand(1, $this->width), mt_rand(1, $this->height), mt_rand(1, $this->width), mt_rand(1, $this->height), $color);
		}
	}

	//添加随机验证码
	private function addCode($flag=false) {
		if (!$flag) {
			$dict = $this->dict;
		} else {
			$dict = '1234567890';
		}
		$fontfile = $this->font;
		for ($i=0; $i <4 ; $i++) { 
			$size = mt_rand(14,18);
			$angle = mt_rand(-15,15);
			$x = mt_rand(0,10)+1.3*$i*$size;
			$y = mt_rand(16, 26);
			$color = imagecolorallocate($this->image, mt_rand(150, 255), mt_rand(150, 255), mt_rand(150, 255));
			if (is_array($dict)) {
				$index = mt_rand(0, count($dict));
				$text = $dict[$index];
			}
			if (is_string($dict)) {
				$text = substr($dict, mt_rand(0, strlen($dict)), 1);
			}

			imagettftext($this->image, $size, $angle, $x, $y, $color, $fontfile, $text);
			$this->verify .= $text;
		}
		$_SESSION['verify'] = strtolower($this->getVerify());
	}

	//输出验证码图像资源
    public function showImage() {
    	ob_clean();
        if(imagetypes() & IMG_GIF){
            header("Content-Type:image/gif");
            imagepng($this->image);
        }else if(imagetypes() & IMG_JPG){
            header("Content-Type:image/jpeg");
            imagepng($this->image);
        }else if(imagetypes() & IMG_PNG){
            header("Content-Type:image/png");
            imagepng($this->image);
        }else if(imagetypes() & IMG_WBMP){
            header("Content-Type:image/vnd.wap.wbmp");
            imagepng($this->image);
        }else{
            die("PHP不支持图像创建");
        }

    }

	//获取字符内容
	public function getVerify() {
		return $this->verify;
	}

    function __destruct() {
    	imagedestroy($this->image);
    }
}
/*$font = 'F:\wamp64\www\Github\WebApp\fonts\msyhbd.ttc';
$code = new Code($font);
$code->createImage();*/
?>