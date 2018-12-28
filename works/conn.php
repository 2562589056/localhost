<?php
	@mysql_connect('127.0.0.1','root','123456') or die("error:".mysql_error());
	//echo "OK";
	mysql_select_db("test") or die("error2:".mysql_error());
	//echo "ok";
	mysql_query("set names utf8");
?>