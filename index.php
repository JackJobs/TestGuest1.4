<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--首页</title>
<?php 
//防止恶意调用
define('INDEX', true);
//引入公共配置文件
require dirname(__FILE__).'/includes/common.inc.php';
//定义页面调用CSS常量
define("SCRIPT","index");
//引入css脚本
require ROOT.'/includes/title.inc.php';
?>
</head>
<body>
<?php 
//引入header文件
require ROOT.'/includes/header.inc.php';
?>
<div id="list">
<h2>最新帖子</h2>
</div>

<div id="user">
<h2>新进会员</h2>
</div>

<div id="pics">
<h2>最新图片</h2>
</div>
<?php 
//引入footer文件
require ROOT.'/includes/footer.inc.php';

?>
</body>
</html>
