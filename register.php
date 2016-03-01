<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>多用户留言系统--注册</title>

<?php 
session_start();
//防止恶意调用
define('INDEX', true);
//引入公共配置文件
require dirname(__FILE__).'/includes/common.inc.php';
//定义页面调用CSS常量
define("SCRIPT","register");
//引入css脚本
require ROOT.'/includes/title.inc.php';

if($_GET['action']=='register'){
	//通过验证码来防止恶意注册，跨站攻击
	_check_code($_POST['code'],$_SESSION['code']);
	//如果提交了表单，则加载register模块
	include ROOT.'/includes/register.func.php';
	$clean = array();
	//通过唯一标识符来防止恶意注册，跨站攻击
	//还可以登陆cookies验证
	$clean['uniqid']=_check_uniqid($_POST['uniqid'],$_SESSION['uniqid']);
	//刚注册的用户用来激活
	$clean['active'] = _uniqid();
	$clean['username']=_check_username($_POST['username']);
	$clean['password'] = _check_passsword($_POST['password1'],$_POST['password2'],6,20);
	$clean['question'] = _check_question($_POST['question']);
	$clean['answer'] = _check_answer($_POST['question'],$_POST['answer']);
	$clean['sex'] = _mysql_string($_POST['sex']);
	$clean['face'] = _mysql_string($_POST['face']);
	$clean['email'] = _check_email($_POST['email']);
	$clean['qq'] = _check_qq($_POST['qq']);
	$clean['url'] = _check_url($_POST['url']);
	print_r($clean);
}
$_SESSION['uniqid'] =$_uniqid = _uniqid();
?>
<script type="text/javascript" src="js/face.js"></script>

</head>
<body>
<?php 
//转换成硬路径，速度更快
require ROOT.'/includes/header.inc.php';
?>
<div id="register">
<h2>会员注册</h2>
<form method="post" name="faceform" action="register.php?action=register">
<input type="hidden" name="uniqid" value=<?php echo $_uniqid;?>></input>
<dl>
<dt>请认真填写以下内容</dt>
<dd>用 户 名：<input type="text" name="username" class="text"/>（*必填，至少两位）</dd>
<dd>密&nbsp;&nbsp;码：<input type="password" name="password1" class="text"/>（*必填，至少六位）</dd>
<dd>确认密码：<input type="password" name="password2" class="text"/>（*必填，同上） </dd>
<dd>密码提示：<input type="text" name="question" class="text"/>（*必填，至少两位） </dd>
<dd>密码回答：<input type="text" name="answer" class="text"/>（*必填，至少两位）</dd>
<dd>性&nbsp;&nbsp;别：<input type="radio" name="sex" value="男" checked="checked"/>男<input type="radio" name="sex" value="女"/>女</dd>
<dd class="face"><input type="hidden" name="face" value="face/01.gif"/><img src="face/m01.gif" alt="头像选择" id="faceimg"></img></dd>
<dd>电子邮件：<input type="text" name="email" class="text"/> </dd>
<dd>&nbsp;&nbsp;QQ&nbsp;：<input type="text" name="qq" class="text"/> </dd>
<dd>主页地址：<input type="text" name="url" class="text" value="http://"/> </dd>
<dd>验 证 码：<input type="text" name="code" class="text verify"/> <img src="code.php" alt="验证码" id="code"/></dd>
<dd><input type="submit" value="注册" class="submit"/></dd>
</dl>
</form>
</div>
<?php 
//转换成硬路径，速度更快
require ROOT.'/includes/footer.inc.php';

?>

</body>
</html>