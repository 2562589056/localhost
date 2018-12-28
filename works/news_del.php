<?php
	define("IN_PHP","666");
	//要删除的记录
	include_once 'class/mysql.class.php';
	$dbObj = new db_mysql("localhost","root","123456","php2017");

	//动作标识
	$act = isset($_GET['act'])?$_GET['act']:'';

	//第几页
	$pid = isset($_GET['pid'])?$_GET['pid']:'';
	
	//要删除的记录id
	$id = isset($_GET['id'])?$_GET['id']:'';
	if($act == 'delall')
	{
		$id = substr($id,0,strlen($id)-1);
		$sql = " delete from tb_news where id in(".$id.")";
	}
	else
	{
		$sql = " delete from tb_news where id='".$id."'";
	}
	$flg = $dbObj->query($sql);
	if($flg)
	{
		echo "<script>";
		echo "alert('删除成功');";
		echo "location.href='news_index.php?pno=".$pid."';";
		echo "</script>";
	}
	else
	{
		echo "<script>";
		echo "alert('删除失败');";
		echo "location.href='news_index.php?pno=".$pid."';";
		echo "</script>";
	}
?>