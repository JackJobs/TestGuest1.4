<?php
//防止恶意调用
if(!defined('INDEX')){
	exit('Access Denied!');
}

if(!function_exists('_alert_back')){
	exit('函数_alert_back不存在');
}
if(!function_exists('_mysql_string')){
	exit('函数_mysql_string不存在');
}
/**
 * 检查并过滤用户名
 * @param string $_string 受污染的数据
 * @param number $min_num 最小位数
 * @param number $max_num 最大位数
 * @return string 返回过滤后的字符串
 */
function _check_username($_string,$min_num=2,$max_num=20){
	//去掉左右两边的空格
	$_string = trim($_string);
	//用户名长度不得小于两位或大于20位
	if(mb_strlen($_string,'utf-8')<$min_num || mb_strlen($_string,'utf-8') > $max_num){
		_alert_back('用户名不得小于'.$min_num.'或大于'.$max_num.'位');
	}
	//不得包含特殊字符
	$char_pattern = '/[<>\'\"\ ]/';
	if(preg_match($char_pattern, $_string)){
		_alert_back('用户名不得包含特殊字符');
	}
	//不得包含敏感字
	$_special_name[0]='习近平';
	$_special_name[1]='李克强';
	$_special_name[2]='胡锦涛';
	$_special_name[3]='温家宝';
	$_special_name[4]='毛泽东';
	$_special_name[5]='邓小平';
	if(in_array($_string, $_special_name)){
		_alert_back('用户名不得使用敏感字');
	}
	return _mysql_string($_string);
}

/**
 * 密码验证
 * @param string $password
 * @param string $password2
 * @param int $min_num
 * @param int $max_num
 * @return string
 */
function _check_passsword($password,$password2,$min_num=6,$max_num=20){
	//长度不得小于6位或大于20位
	if(mb_strlen($password,'utf-8')<$min_num || mb_strlen($password,'utf-8') > $max_num){
		_alert_back('密码不得小于'.$min_num.'或大于'.$max_num.'位');
	}
	
	//密码确认和密码必须相同
	if($password != $password2){
		_alert_back('密码确认和密码必须相同');
	}
	return _mysql_string(sha1($password));
}
//检查密码提示
function _check_question($question,$min_num=2,$max_num=20){
	$question = trim($question);
	//长度不得小于2位或大于20位
	if(mb_strlen($question,'utf-8')<$min_num || mb_strlen($question,'utf-8') > $max_num){
		_alert_back('密码不得小于'.$min_num.'或大于'.$max_num.'位');
	}
	return _mysql_string($question);
}

//检查密码回答
function _check_answer($question,$answer,$min_num=2,$max_num=20){
	$answer = trim($answer);
	//长度不得小于2位或大于20位
	if(mb_strlen($answer,'utf-8')<$min_num || mb_strlen($answer,'utf-8') > $max_num){
		_alert_back('密码不得小于'.$min_num.'或大于'.$max_num.'位');
	}
	if($question == $answer){
		_alert_back('密码提示和回答不能相同');
	}
	return _mysql_string(sha1($answer));
}
/**
 * 验证邮箱
 * @param unknown $_string
 * @return NULL|unknown
 */
function _check_email($_string,$min_num=6,$max_num=40){
	if(empty($_string)){
		return null;
	}else{
		if(!preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $_string)){
			_alert_back('邮箱格式不正确');
		}
		if(strlen($_string)<$min_num || strlen($_string) >$max_num){
			_alert_back('邮箱长度不符合要求');
		}
	}
	return _mysql_string($_string);
}
/**
 * 验证qq号码
 * @param unknown $_string
 * @return NULL|unknown
 */
function _check_qq($_string,$min_num=4,$max_num=20){
	if(empty($_string)){
		return null;
	}else{
		if(!preg_match("/^[1-9]{1}[0-9]{4,9}$/", $_string)){
			_alert_back('qq号码不正确');
		}
		if(strlen($_string)<$min_num || strlen($_string) >$max_num){
			_alert_back('qq长度不符合要求');
		}
	}
	return _mysql_string($_string);
}
/**
 * 验证用户网址
 * @param unknown $_string
 * @return NULL|unknown
 */
function _check_url($_string,$min_num=4,$max_num=40){
	if(empty($_string) || ($_string == 'http://')){
		return null;
	}else{
		if(!preg_match("/^https?:\/\/(\w\.)?[\w\-\.]+[\w\-\.]+$/", $_string)){
			_alert_back('网址格式不正确');
		}
		if(strlen($_string)<$min_num || strlen($_string) >$max_num){
			_alert_back('网址长度不符合要求');
		}
	}
	return _mysql_string($_string);
}
/**
 * 验证唯一标识符是否一致
 * @param unknown $first_uniqid
 * @param unknown $end_uniqid
 * @return unknown
 */
function _check_uniqid($first_uniqid,$end_uniqid){
	if((strlen($first_uniqid)!=40) || ($first_uniqid != $end_uniqid)){
		_alert_back('唯一标识符不正确');
	}
	return $first_uniqid;
}

?>