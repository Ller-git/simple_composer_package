<?php
namespace Ller\WaterMark;

class Water
{
	//存储路径
	private $path;

	//目标图片信息
	private $target_img;

	//新名称
	private $new_name;

	//后缀
	private $type;

	public function __construct($argument)
	{
		echo "luxuelong";
		$this->path = isset($argument['path']) ? $argument['path'] : __DIR__;
		$this->target_img = $argument['target_img'];
		$this->new_name = isset($argument['new_name']) ? $argument['new_name'] : $this->target_img['name'];
		$this->type = basename($this->target_img['type']);
		$this->new_name = $this->path.'/'.$this->new_name.'.'.$this->type;

		//处理图片
		$this->handler();
	}

	private function handler()
	{
		//创建图片资源
		$waterImg=imagecreatefromjpeg(__DIR__ . '/../img/china.jpg');

		//获取图片宽高信息
		list($w_w,$w_h)=getimagesize(__DIR__ . '/../img/china.jpg');

		// 判断接收的图片类型
		switch ($this->type) {
			case 'jpeg'||'jpg':
				$targetImg=imagecreatefromjpeg($this->target_img['tmp_name']);
				imagecopy($targetImg,$waterImg,0,0,0,0,$w_w,$w_h);
				imagejpeg($targetImg,$this->new_name);
				break;
			case 'gif':
				$targetImg=imagecreatefromjpeg($this->target_img['tmp_name']);
				imagecopy($targetImg,$waterImg,0,0,0,0,$w_w,$w_h);
				imagegif($targetImg,$this->new_name);
				break;
			case 'png':
				$targetImg=imagecreatefromjpeg($this->target_img['tmp_name']);
				imagecopy($targetImg,$waterImg,0,0,0,0,$w_w,$w_h);
				imagepng($targetImg,$this->new_name);
				break;
			default:
				echo "未检测到类型";
				break;
		}
		imagedestroy($targetImg);
		imagedestroy($waterImg);
	}
}