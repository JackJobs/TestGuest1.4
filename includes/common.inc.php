<?php
//防止恶意调用
if(!defined('INDEX')){
	exit('Access Denied!');
}
//设置字符编码
header("Content-Type:text/html;charset=utf-8");
//定义根目录路径
define('ROOT', substr(dirname(__FILE__), 0,-9));


//拒接低版本
if(PHP_VERSION <'4.1.0'){
	exit('PHP 4.1.0 or higher version is needed!');
}

require ROOT.'/includes/global.func.php';
//计算程序运行时间，记录开始时间
define('START_TIME', _mtime());

//设置自动转椅状态字符
define('GPC',get_magic_quotes_gpc());
?>