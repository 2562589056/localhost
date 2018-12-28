<?php
	require("on_session.php");
	require("conn.php");
	$id = $_GET['id'];
	echo $id;
	$sql = "select * from user where u_id = ".$id;
	$res = mysql_query($sql);
	$arr = array();
	while($row = mysql_fetch_assoc($res))
	{
		$arr[] = $row;
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
		<form action='update9.php' method='post'>
			<table border='1' align='center' width='600' height='300'>
			<tr>
				<td colspan='3'>修改记录</td>
			</tr>
			<tr>
				<td>ID:</td>
				<td><input readonly='readonly' value="<?php echo $arr[0]['u_id']?>" name='u_id'></td>
			</tr>
			<tr>
				<td>用户名:</td>
				<td><input type='text' name='u_user' value='<?php echo $arr[0]['u_user']?>'></td>
			</tr>
			<tr>
				<td>姓名:</td>
				<td><input type='text' name='u_name'  value='<?php echo $arr[0]['u_name']?>'></td>
			</tr>
			<tr>
				<td>性别:</td>
				<td><input type='text' name='u_sex' value='<?php echo $arr[0]['u_sex']?>'></td>
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