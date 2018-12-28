<?php
	define("IN_PHP",'12');
	include_once 'class/mysql.class.php';
	$dbObj = new db_mysql('localhost','root','123456','php2017');

	$act = isset($_GET['act'])?$_GET['act']:'';
	$curid = isset($_GET['curid'])?$_GET['curid']:'';

	if($act == 'delall')
	{
		$curid = substr($curid,0,strlen($curid)-1);
		$sql = "delete from tb_news where id in(".$curid.") ";
	}
	else
	{
		$sql = "delete from tb_news where id='".$curid."' ";//单删
	}
	//echo $sql;
	$rtn = $dbObj->query($sql);
	
	$arr['flg'] = $rtn;
	echo json_encode($arr);
?>