<!DOCTYPE html>
<?php
	md5('123456');
	session_start();
	$submit = isset($_POST['submit'])?$_POST['submit']:'';
	if($submit == '登录')
	{
		require("conn.php");
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$sql = "select * from admin where users = '".$user."' and pass = '".md5($pass)."'";
		$res = mysql_query($sql);
		$row = mysql_num_rows($res);
		if($row)
		{
			echo "123";
			$_SESSION['users'] = $user;
			echo "<script>";
			echo "alert('登录成功!');";
			echo "location.href='index.php';";
			echo "</script>";
		}
		else
		{
			echo "456";
			$_SESSION['users'] = null;
			echo "<script>";
			echo "alert('账号或密码错误');";
			echo "location.href='login.php';";
			echo "</script>";
		}
	}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> 
<meta http-equiv="Pragma" content="no-cache"> 
<meta http-equiv="Cache-Control" content="no-cache"> 
<meta http-equiv="Expires" content="0"> 
<title>后台管理</title>
<link href="login.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="login_box">
      <div class="login_l_img"><img src="images/login-img.png" /></div>
      <div class="login">
          <div class="login_logo"><a href="#"><img src="images/login_logo.png" /></a></div>
          <div class="login_name">
               <p>后台管理系统</p>
          </div>
          <form action='login.php' method="post">
              <input name="username" type="text"  value="用户名" onfocus="this.value=''" onblur="if(this.value==''){this.value='用户名'}">
<span id="password_text" onclick="this.style.display='none';document.getElementById('password').style.display='block';document.getElementById('password').focus().select();" >密码</span>
<input name="password" type="password" id="password" style="display:none;" onblur="if(this.value==''){document.getElementById('password_text').style.display='block';this.style.display='none'};"/>
              <input value="登录" style="width:100%;" type="submit" name='submit'>
          </form>
      </div>
      <div class="copyright">某某有限公司 版权所有©2016-2018 技术支持电话：000-00000000</div>
</div>
<div style="text-align:center;">
<p>更多模板：<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>
