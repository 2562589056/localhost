<?php
	require("on_session.php");
	$name = $_POST['name'];
	$quantity = $_POST['quantity'];
	$l_id = $_POST['l_id'];
	require("conn.php");
	$sql = "insert into library (id,name,quantity,l_id) values(null,'".$name."','".$quantity."','".$l_id."')";
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('添加成功!');";
		echo "location.href='inventory.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('添加失败!');";
		echo "location.href='inventory.php';";
		echo "</script>";
	}
?>