<meta charset='utf-8'>
<?php
	header("Content-type:text/html;charset=utf-8");
	//删除常量
	/*$xz = 32;
	echo $xz."<br>";
	unset($xz);
	echo $xz."<br>";*/

	//自定义常量注意:1.自定义变量定义的范围为全局    2.常量在运行使用期间常量不能删除,修改
	//define('常量名','值');
	//define('PI','31415');

	//define("PI",61);//不能修改正在使用的常熟

	//echo PI."<br>";

	/*unset('PI');//常量在使用期间不能删除
	echo PI;*/

	//判断某个常量是否定义过

	/*if(defined("PI"))
	{
		echo "yes<br>";
	}
	else
	{
		echo "No<br>";
	}*/

	/*$xy = 21;
	function demos()
	{
		global $xy;//声明全局变量
		echo $xy;
	}
	demos();*/

	
	/*echo __FILE__."<br>";
	echo dirname(__FILE__)."<br>";
	echo dirname(dirname(__FILE__))."<br>";
	echo str_replace('\\','/',dirname(dirname(__FILE__)))."<br>";*/

	//第几页
	$curp = isset($_GET['pno'])?$_GET['pno']:'1';

	//查询条件
	//新闻标题
	$ntitle = isset($_GET['ntitle'])?$_GET['ntitle']:'';

	//新闻类型
	$ntype = isset($_GET['ntype'])?$_GET['ntype']:'';
	$wheres = "";
	if($ntitle != '')
	{
		$wheres = " where title like '%".$ntitle."%' ";
	}
	if($ntype != '')
	{
		if($wheres != "")
		{
			$wheres.= " and tid='".$ntype."' ";
		}
		else
		{
			$wheres.= " where tid=".$ntype." ";
		}
		
	}
	echo '$wheres ='.$wheres."<br>";

	define('IN_PHP',14);

	$paths = str_replace('\\','/',dirname(dirname(__FILE__)));
	define('PATHS',$paths);
	//echo PATHS;
	
	//echo '$paths='.$paths."<br>";
	include_once PATHS.'\newsmanage\class\mysql.class.php';

	include_once PATHS.'\newsmanage\class\Page.class.php';

	$dbObj = new db_mysql("localhost",'root','123456','php2017');

	//查询总记录个数
	$sql = "select count(*) as n from tb_news";

	$totalArr = $dbObj->getone($sql);

	/*echo "<pre>";
	print_r($totalArr);
	echo "</pre>";*/

	
	$pageObj = new Page($totalArr['n'],15);

	$sql = "select n.id,title,tname from tb_news as n left join tb_type as t on tid=t.id ".$wheres." order by n.id desc limit ".$pageObj->limit();
	$nArr = $dbObj->getall($sql);

	/*echo "<pre>";
	print_r($nArr);
	echo "</pre>";*/

	//查询所有新闻类型
	$sql  = " select * from tb_type ";
	$typeArr = $dbObj->getall($sql);
?>
<html>
	<head>
		<title>新闻列表</title>
		<meta charset='utf-8'>
		<script src='jquery-1.12.4.js'></script>
		<script>
			//单删
			/*function delone2(ids,page)
			{
				if(confirm("确定要删除么?"))
				{
					$.get("news_del_2.php",{'curid':ids},function(d)
					{
						if(d.flg)
						{
							alert('删除成功');
							location.href='news_index.php?pno='+page;
						}
						else
						{
							alert('删除失败');
						}
					},'json');
				}
			}*/
			
			//全删
			function delall2(page)
			{
				var selstr = '';
				$('.sels').each(function(x,y)
				{
					if(y.checked)
					{
						selstr = selstr+$(y).val()+',';
					}
				});
				
				if(selstr == '')
				{
					alert('请选择要删除的记录');
					return;
				}

				if(confirm("确定要删除吗?"))
				{
					$.get('news_del_2.php',{"curid":selstr,'act':'delall'},function(d)
					{
						if(d.flg)
						{
							alert('删除成功');
							location.href='news_index.php?pno='+page;
						}
						else
						{
							alert('删除失败');
						}
					},'json');
				}
			}
			
			/*function selall(obj)
			{
				var cheks = document.getElementsByName('selid');
				for(var a=0;a<cheks.length;a++)
				{
					cheks[a].checked = obj.checked;
				}
			}*/
			
			//全选
			function selall(obj)
			{
				$(".sels").each(function(i,o)
				{
					$(o).attr('checked',obj.checked);
					//o.checked=obj.chehcked;
				})
			}
			
			function delone(ids,page)
			{
				if(confirm("确定要删除吗?"))
				{
					location.href='news_del.php?id='+ids+'&pid='+page+'';
				}
				else
				{
					
				}
			}
			
			/*function delall(curp)
			{
				var curselid = '';
				$(".sels").each(function(x,y)
				{
					if(y.checked)
					{
						curselid = curselid+y.value+',';
					}
				})
					//alert('news_del.php?act=delall&id='+curselid+"&pid="+curp);
				location.href='news_del.php?act=delall&id='+curselid+"&pid="+curp;
			}*/
		</script>
	<body>
	<form action='news_index.php' method='get'>
	新闻标题:<input type='text' name='ntitle' value='<?php echo $ntitle?>'>
	新闻类型:<select name='ntype'  value='<?php echo $ntype?>'>
				<option>-请选择-</option>
				<?php
					foreach($typeArr as $v)
					{
						echo "<option selected value='".$v['id']."'>".$v['tname']."</option>";
					}
				?>
			</select>
			<input type='submit' value='查询'>
	<table>
		<tr>
			<td>序号<input name='selid' type='checkbox' onclick='selall(this);'></td>
			<td>新闻标题</td>
			<td>新闻类型</td><td><a href='news_add.php'>添加</a></td>
		</tr>
		<?php
			for($a=0;$a<count($nArr);$a++)
			{
		?>
		<tr>
			<td><?php echo $nArr[$a]['id']?>
				<input class='sels' type='checkbox' value='<?=$nArr[$a]['id']?>'>
			</td>
			<td><?php echo $nArr[$a]['title']?></td>
			<td><?php echo $nArr[$a]['tname']?></td>
			<td><a href='news_update.php?nid=<?php echo $nArr[$a]['id']; ?>&page=<?php echo $curp; ?>'>修改</a>&nbsp;<!--<a href='news_del.php?id=<?php echo $nArr[$a]['id'];?>&pid=<?php echo $curp; ?>'>删除</a>-->
			<!--<a href='javascript:;' onclick="delone('<?php echo $nArr[$a]['id'] ?>','<?php echo $curp; ?>');">删除</a>-->
			<a href='javascript:;' onclick="delone('<?php echo $nArr[$a]['id'] ?>','<?php echo $curp; ?>');" >删除</a>
			</td>
		<?php
			}	
		?>
		<tr>
			<td colspan='4'>
				<?php
					echo $pageObj->pageBar(5);
				?>
				<!--
				&nbsp;<a href='javascript:;' class='sels' onclick="delall('<?=$curp; ?>');">全删
				-->
				&nbsp;<a href='javascript:;' onclick="delall2('<?=$curp;?>','<?php echo $curp; ?>');">全删</a>
				</a>
			</td>
		</tr>
	</table>
	</body>
</html>