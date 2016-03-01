<?php
session_start();

//防止恶意调用
define('INDEX', true);
//引入公共配置文件
require dirname(__FILE__).'/includes/common.inc.php';
_code();
?>