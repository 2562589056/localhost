<?php
	require('conn.php');
	require("on_session.php");
	$id = $_POST['id'];
	$lei = $_POST['lei'];
	$bei = $_POST['bei'];
	$sql = "update kind set ";
	$sql.= " lei = '".$lei."',";
	$sql.= " bei = '".$bei."' ";
	$sql.= " where id = ".$id;
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('修改成功');";
		echo "location.href='type.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('修改失败');";
		echo "location.href='type.php';";
		echo "</script>";
	}
?>