<?php
	require("on_session.php");
	require("conn.php");
	echo "<pre>";
	print_r($_POST);
	echo "</pre>";
	$name = $_POST['name'];
	$num = $_POST['num'];
	$notes = $_POST['notes'];
	$e_id = $_POST['e_id'];
	$sql = " select * from library where name = '".$name."' and l_id = ".$e_id;
	$res = mysql_query($sql);
	$row = mysql_num_rows($res);
	if($row)
	{
		$date = date('Y-m-d H:i:s');
		$sql = "insert into enter (id,name,num,notes,date,e_id) values(null,'".$name."','".$num."','".$notes."','".$date."','".$e_id."')";
		$res = mysql_query($sql);
		if($res)
		{
			echo "<script>";
			echo "alert('添加成功!');";
			echo "</script>";
			$sql2 = " select * from library where name = '".$name."' ";
			$res2 = mysql_query($sql2);
			$rows3 = array();
			while($row3 = mysql_fetch_row($res2))
			{
				for($a=0;$a<count($row3);$a++)
				{
					$rows3[] = $row3[$a];
				}
			}
			//print_r($rows3);
			$sql3 = " update library set ";
			$sql3.= " name = '".$rows3[1]."',";
			$sql3.= " quantity = '".($rows3[2] + $num)."',";
			$sql3.= " l_id = ".$rows3[3]."";
			$sql3.= " where id = ".$rows3[0];
			$res3 = mysql_query($sql3);
			if($res3)
			{
				echo "<script>";
				echo "alert('入库成功!');";
				echo "location.href='inventory.php';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('入库失败!');";
				echo "location.href='inventory.php';";
				echo "</script>";
			}
			exit();
		}
		else
		{
			echo "<script>";
			echo "alert('添加失败!');";
			echo "location.href='inbound.php';";
			echo "</script>";
		}
	}
	else
	{
		echo "<script>";
		echo "alert('选择错误!');";
		echo "location.href='inbound.php';";
		echo "</script>";
	}
?>