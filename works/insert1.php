<?php
	require("conn.php");
	require("on_session.php");
	$lei = $_POST['lei'];
	$bei = $_POST['bei'];
	echo $lei."<br>".$bei;
	$sql = "insert into kind (id,lei,bei) values(null,'".$lei."','".$bei."')";
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('添加成功!');";
		echo "location.href='type.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('添加失败!');";
		echo "location.href='type.php';";
		echo "</script>";
	}
?>