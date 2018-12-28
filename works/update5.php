<?php
	require('conn.php');
	require("on_session.php");
	$id = $_GET['id'];
	$sql = "select * from enter where id =".$id;
	$res = mysql_query($sql);
	while($row=mysql_fetch_assoc($res))
	{
		$rows = $row;
	}
	
	$sql2 = "select * from kind";
	$res2 = mysql_query($sql2);
	$rows2 = array();
	while($row2=mysql_fetch_assoc($res2))
	{
		$rows2[] = $row2;
	}
	echo "<pre>";
	//print_r($rows2);
	echo "</pre>";
	foreach($rows2 as $v)
	{
		foreach($v as $k2=>$v2)
		{
			//echo $v2;
		}
	}
?>
<style>
<!--
	table
	{
		margin-left:500px;
	}
	td
	{
		text-align:center;
		font-size:26px;
	}
-->
</style>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
		<link rel="stylesheet" />
		<link rel="stylesheet" href="css/Site.css" />
		<link rel="stylesheet" href="css/zy.all.css" />
		<link rel="stylesheet" href="css/font-awesome.min.css" />
		<link rel="stylesheet" href="css/amazeui.min.css" />
		<link rel="stylesheet" href="css/admin.css" />
		<style>
		</style>
	<body>
		<form action='update6.php' method='post'>
			<table border='1' align='center' width='600' height='300'>
			<tr>
				<td colspan='3'>修改记录</td>
			</tr>
			<tr>
				<td>ID:</td>
				<td><input readonly='readonly' value="<?php echo $rows['id']?>" name='id'></td>
			</tr>
			<tr>
				<td>名称:</td>
				<td><input type='text' name='name' value='<?php echo $rows['name']?>'></td>
			</tr>
			<tr>
				<td>类型:</td>
				<td>
				<select name='e_id'>
					<option value=''>~~~~</option>
					<?php
						foreach($rows2 as $v)
						{
					?>
						<option <?php if($rows['e_id']==$v['id']){echo 'selected';}?> value='<?php echo $v['id']?>'><?php echo $v['lei']?></option>
					<?php
						}	
					?>
				</select></td>
			</tr>
			<tr>
				<td>数量:</td>
				<td><input type='text' name='num'  value='<?php echo $rows['num']?>'></td>
			</tr>
			<tr>
				<td>备注:</td>
				<td><input type='text' name='notes'  value='<?php echo $rows['notes']?>'></td>
			</tr>
			<tr>
				<td colspan='3'>
					<input type='submit' value='提交'>&nbsp;&nbsp;&nbsp;
					<input type='reset' value='取消'>
				</td>
			</tr>
			</table>
		</form>
	</body>
</html>