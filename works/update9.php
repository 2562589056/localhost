<meta charset='utf-8'>
<?php
	require("conn.php");
	require("on_session.php");
	$u_id = $_POST['u_id'];
	$u_name = $_POST['u_name'];
	$u_user = $_POST['u_user'];
	$u_sex = $_POST['u_sex'];
	$sql ="update user set ";
	$sql.=" u_name = '".$u_name."',";
	$sql.=" u_user = '".$u_user."',";
	$sql.=" u_sex = '".$u_sex."' ";
	$sql.=" where u_id = ".$u_id;
	
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('修改成功!');";
		echo "location.href='user.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('修改失败!');";
		echo "location.href='user.php';";
		echo "</script>";
	}
?>