<?php
	require('conn.php');
	require("on_session.php");
	$id = $_GET['id'];
	$sql = "select * from kind where id =".$id;
	$res = mysql_query($sql);
	while($row=mysql_fetch_assoc($res))
	{
		$rows = $row;
	}
	print_r($rows['id']);
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
		<form action='update2.php' method='post'>
			<table border='1' align='center' width='600' height='300'>
			<tr>
				<td colspan='3'>修改记录</td>
			</tr>
			<tr>
				<td  colspan='2'>旧记录</td>
				<td>新记录</td>
			</tr>
			<tr>
				<td>ID:</td>
				<td><?php echo $rows['id'] ?></td>
				<td><input readonly='readonly' value="<?php echo $rows['id']?>" name='id'></td>
			</tr>
			<tr>
				<td>名称:</td>
				<td><?php echo $rows['lei'] ?></td>
				<td><input type='text' name='lei'></td>
			</tr>
			<tr>
				<td>备注:</td>
				<td><?php echo $rows['bei'] ?></td>
				<td><input type='text' name='bei'></td>
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