 <?php
    //这里显示的是 购物车有多少产品，和产品的总价格
    $ann=array();
    if(!empty($_SESSION["gwc"]))
    {
        $ann=$_SESSION["gwc"];

    }
	print_r($ann);
	echo "<hr color='red'>";
    $zhonglei = count($ann);
	

    $aa=0;
    foreach($ann as $k)
    {

        $k[0];//水果代号
        $k[1];//水果数量
        $sql1="select d_money_o from discount where d_id='{$k[0]}'";

        $danjia=$db->Query($sql1);
		print_r($danjia);
		echo "<hr color='red'>";
        foreach($danjia as $n)
        {

            $aa=$aa + $n[0]*$k[1];
        }
    }
    echo"数量：{$zhonglei}<br/>
	价格:<mark>{$aa}元";
    ?>
<?php
	session_start();
	$id = $_GET['id'];
	if(empty($_SESSION['gwc']))
	{
		 $arr = array(array($id,1));
		 $_SESSION['gwc']=$arr;
	}
	else
	{
			$chuxian = false;
			$arr = $_SESSION['gwc'];
			 foreach ($arr as $v) 
			 {
				if ($v[0] == $id) //如果取过来的$v[0]（商品的代号）等于$ids那么就证明购物车中已经有了这一件商品
				{
					$chuxian = true;
					//如果出现，直接把chuxian改成true
				}
			}
		if($chuxian)
		{
			//购物车中有此商品
			for($i=0;$i<count($arr);$i++)
			{
				if($arr[$i][0] == $id)
				{
					//把点到的商品编号加1
					$arr[$i][1] += 1;
				}
			}
			$_SESSION["gwc"] = $arr;
		}
		else
		{
			 //这里就只剩下：购物车里有东西，但是并没有这件商品
			 $asg = array($id,1);
			 //设一个小数组
			 $arr[] = $asg;
			 $_SESSION["gwc"]=$arr;
		}
	}
echo "<script>";
echo  "location.href='index2.php';";
echo "</script>";
?>