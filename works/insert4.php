<meta charset='utf-8'>
<?php
	require("on_session.php");
	require("conn.php");
	$u_name = $_POST['u_name'];
	$u_user = $_POST['u_user'];
	$u_sex = $_POST['u_sex'];
	$u_phone = $_POST['u_phone'];
	$u_address = $_POST['u_address'];
	$u_email = $_POST['u_email'];
	$u_bei = $_POST['u_bei'];
	
	//echo $u_name."<br>".$u_user."<br>".$u_sex."<br>".$u_phone."<br>".$u_address."<br>".$u_email."<br>".$u_bei;
	if($u_sex=='1')
	{
			$u_sex="男";
	}
	else
	{
		$u_sex="女";
	}
	
	$sql = "insert into user (u_id,u_name,u_user,u_sex,u_phone,u_address,u_email,u_bei) values(null,'".$u_name."','".$u_user."','".$u_sex."','".$u_phone."','".$u_address."','".$u_email."','".$u_bei."')";
	
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('添加成功!');";
		echo "location.href='user.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('添加失败!');";
		echo "location.href='user.php';";
		echo "</script>";
	}
?>