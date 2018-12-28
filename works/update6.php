<?php
	require("conn.php");
	require("on_session.php");
	$id = $_POST['id'];
	$name = $_POST['name'];
	$e_id = $_POST['e_id'];
	$num = $_POST['num'];
	$notes = $_POST['notes'];
	$sql = "update enter set ";
	$sql.= " name = '".$name."',";
	$sql.= " num = '".$num."',";
	$sql.= " notes = '".$notes."',";
	$sql.= " date = '".date("Y-m-d H:i:s")."',";
	$sql.= " e_id = ".$e_id." ";
	$sql.= " where id = ".$id;
	$res = mysql_query($sql);
	if($res)
	{
		echo "<script>";
		echo "alert('修改成功!');";
		echo "location.href='inbound.php';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('修改失败!');";
		echo "location.href='inbound.php';";
		echo "</script>";
	}
?>