<?php
//防止恶意调用
if(!defined('INDEX')){
	exit('Access Denied!');
}
//禁止非html页面调用
if(!defined('SCRIPT')){
	exit('script error!');
}
?>
<link rel="stylesheet" type="text/css" href="styles/1/basic.css"/>
<link rel="stylesheet" type="text/css" href="styles/1/<?php echo SCRIPT;?>.css"/>
<link rel="shortcut icon" href="images/favicon.ico" />
