<?php
//防止恶意调用
if(!defined('INDEX')){
	exit('Access Denied!');
}
function _mtime(){
	$mtime = explode(' ', microtime());
	return $mtime[1]+$mtime[0];
}

function _alert_back($msg){
	echo "<script type='text/javascript'>alert('".$msg."');history.back();</script>";
	exit();
}

function _code($width=75,$height=25,$code_num=4){
	//$nmsg必须初始化为字符串！
	$nmsg = '';
	for($i=0;$i<$code_num;$i++){
		$nmsg .= dechex(mt_rand(0,15));
	}
	$_SESSION['code'] = $nmsg;
	$im = imagecreatetruecolor($width, $height);
	
	$white = imagecolorallocate($im, 255, 255, 255);
	$black = imagecolorallocate($im, 0, 0, 0);
	imagefill($im, 0, 0, $white);
	imagerectangle($im, 0, 0, $width-1, $height-1, $black);
	
	//随机添加6条线
	for($i=0;$i<6;$i++){
		$color = imagecolorallocate($im, mt_rand(0,255), mt_rand(0,255), mt_rand(0,255));
		imageline($im, mt_rand(0,$width), mt_rand(0,$height),mt_rand(0,$width), mt_rand(0,$height), $color);
	}
	//随机雪花
	for($i=0;$i<100;$i++){
		$color = imagecolorallocate($im, mt_rand(200,255), mt_rand(200,255), mt_rand(200,255));
		imagestring($im, 1, mt_rand(1,$width-1), mt_rand(1,$height-1), '*', $color);
	}
	//添加四个随机字符
	for($i=0;$i<$code_num;$i++){
		$color = imagecolorallocate($im, mt_rand(0,100), mt_rand(0,150), mt_rand(0,200));
		imagestring($im, 5, $i*$width/$code_num+mt_rand(0,10), mt_rand(1,$height/2), $_SESSION['code'][$i], $color);
	}
	header('Content-Type:image/png');
	imagepng($im);
	imagedestroy($im);
}
/**
 * _check_code 验证验证码
 * @param unknown $first_code
 * @param unknown $end_code
 */
function _check_code($first_code,$end_code){
	if(!($first_code == $end_code)){
		_alert_back('验证码不正确');
	}
}
/**
 * _mysql_string给要存入数据库的字符转义
 * @param unknown $string
 * @return string
 */
function _mysql_string($string){
	if(!GPC){
		return addslashes($string);
	}
	return addslashes($string);
}
/**
 * 生成唯一标识符
 * @return string
 */
function _uniqid(){
	return sha1(uniqid(rand(),true));
}









?>