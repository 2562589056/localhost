<meta charset='utf-8'>
<?php
	session_start();
	if(!(isset($_SESSION['users'])))
	{
		echo "<script>";
		echo "alert('清先登录');";
		echo "location.href='login.php';";
		echo "</script>";
		exit();
	}
?>