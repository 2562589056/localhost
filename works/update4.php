<?php
	require("conn.php");
	require("on_session.php");
	$id = $_POST['id'];
	$name = $_POST['name'];
	$l_id = $_POST['l_id'];
	$quantity = $_POST['quantity'];
	$sql = "update library set ";
	$sql.= " name = '".$name."',";
	$sql.= " quantity = '".$quantity."',";
	$sql.= " l_id = '".$l_id."' ";
	$sql.= " where id = ".$id;
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('修改成功!');";
		echo "location.href='inventory.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('修改失败!');";
		echo "location.href='inventory.php';";
		echo "</script>";
	}
?>