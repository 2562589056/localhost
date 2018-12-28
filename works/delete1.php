<meta charset='utf-8'>
<?php
	require("conn.php");
	require("on_session.php");
	$id = $_GET['id'];
	echo $id;
	$sql = " delete from kind where id =".$id;
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('删除成功!');";
		echo "location.href='type.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('删除失败!');";
		echo "location.href='type.php';";
		echo "</script>";
	}
?>