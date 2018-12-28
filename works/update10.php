<?php
	header("Content-Type: text/html;charset=utf-8");
	require("on_session.php");
	require("conn.php");
	$pass1 = $_POST['pass1'];
	$pass2 = md5($_POST['pass2']);
	//echo $pass2;
	$user = $_SESSION['users'];
	//echo $pass1."<br>".$pass2."<br>".$user."<br>";
	$sql = "select * from admin where users = '".$user."'";
	$res = mysql_query($sql);
	$arr = array();
	while($row = mysql_fetch_assoc($res))
	{
		foreach($row as $v)
		{
			$arr[] = $v;
		}
	}
	//print_r($arr);
	
	$pass3 = md5($pass1);
	$pass4 = $arr[4];
	if(!($pass3==$pass4))
	{
		echo "<script>";
		echo "alert('原密码不正确!');";
		echo "location.href='updatePwd.php.';";
		echo "</script>";
	}
	$sql2 = "update admin set ";
	$sql2.= " pass = '".$pass2."' ";
	$sql2.= " where id = ".$arr[0];
	$res2 = mysql_query($sql2);
	if($res2)
	{
		echo "<script>";
		echo "alert('修改成功!');";
		echo "location.href='updatePwd.php.';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('修改失败!');";
		echo "location.href='updatePwd.php.';";
		echo "</script>";
	}
?>