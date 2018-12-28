<meta charset='utf-8'>
<?php
	require("on_session.php");
	require("conn.php");
	$id = $_GET['id'];
	$sql = "delete from user where u_id = ".$id;
	$res = mysql_query($sql);
	if($res)
	{
			echo "<script>";
			echo "alert('删除成功!');";
			echo "location.href='user.php';";
			echo "</script>";
	}
	else
	{
			echo "<script>";
			echo "alert('删除失败!');";
			echo "location.href='user.php';";
			echo "</script>";
	}
?>