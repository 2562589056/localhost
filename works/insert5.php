<meta charset='utf-8'>
<?php
	require("on_session.php");
	require("conn.php");
	$name = $_POST['c_name'];
	$quantity = $_POST['c_quantity'];
	$note = $_POST['c_note'];
	$idd = $_POST['c_idd'];
	$sql = " select * from library where name = '".$name."' and l_id = ".$idd;
	$res = mysql_query($sql);
	$row = mysql_num_rows($res);
	if($row)
	{
		$date = date('Y-m-d H:i:s');
		$sql2 = "insert into come (c_id,c_name,c_quantity,c_date,c_idd,c_note) values(null,'".$name."','".$quantity."','".$date."','".$idd."','".$note."')";
		$res2 = mysql_query($sql2);
		if($res2)
		{
			$sql3 = " select * from library where name = '".$name."' ";
			$res3 = mysql_query($sql3);
			$rows3 = array();
			while($row3= mysql_fetch_row($res3))
			{
				for($a=0;$a<count($row3);$a++)
				{
					$rows3[] = $row3[$a];
				}
			}
			//print_r($rows3);
			$sql4 = " update library set ";
			$sql4.= " name = '".$rows3[1]."',";
			$sql4.= " quantity = '".($rows3[2] - $quantity)."',";
			$sql4.= " l_id = ".$rows3[3]."";
			$sql4.= " where id = ".$rows3[0];
			$res4 = mysql_query($sql4);
			if($res3)
			{
				echo "<script>";
				echo "alert('出库成功!');";
				echo "location.href='outBoud.php';";
				echo "</script>";
			}
			else
			{
				echo "<script>";
				echo "alert('出库失败!');";
				echo "location.href='outBoud.php';";
				echo "</script>";
			}
		}
		else
		{
			echo "<script>";
			echo "alert('添加失败!');";
			echo "location.href='outBoud.php';";
			echo "</script>";
		}
	}
	else
	{
		echo "<script>";
		echo "alert('选择错误!');";
		echo "location.href='outBoud.php';";
		echo "</script>";
	}
?>