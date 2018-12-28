<meta charset='utf-8'>
<?php
require("conn.php");
$sql = "select name from library where l_id = 8";
$res = mysql_query($sql);
$arr = array();
$str = "var arr = [";
while($row = mysql_fetch_row($res))
{
	foreach($row as $v)
	{
		$str.="'".$v."',";
	}
}
$str.="']";

$str2 = substr($str,0,strlen($str)-3)."];";
echo $str2;
$file = fopen("test.txt","a+"); //次方法会自动生成文件test,txt,a表示追加写入，
			//w代表替换写入
fwrite($file,$str2);
fclose($file);
?>
