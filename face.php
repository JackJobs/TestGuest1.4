<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--头像选择</title>
<?php 
//防止恶意调用
define('INDEX', true);
//引入公共配置文件
require dirname(__FILE__).'/includes/common.inc.php';
//定义页面调用CSS常量
define("SCRIPT","face");
//引入css脚本
require ROOT.'/includes/title.inc.php';

?>
<script type="text/javascript" src="js/opener.js"></script>
</head>
<body>
<div id="face">
<h3>头像选择</h3>
<dl>
<?php 
for($i=1;$i<=9;$i++){
	echo '<dd><img src="face/m0'.$i.'.gif" alt="face/m0'.$i.'.gif" title="头像'.$i.'"</dd>';
}
for($i=10;$i<=64;$i++){
	echo '<dd><img src="face/m'.$i.'.gif" alt="face/m'.$i.'.gif" title="头像'.$i.'"</dd>';
}
?>
</dl>
</div>

</body>
</html>