<meta charset='utf-8'>
<body>
<h1>长腿璇购物商城</h1>
<table border="1" cellpadding="0" cellspacing="0" width="100%" >
    <tr>
        <td>代号</td>
        <td>水果名称</td>
        <td>水果价格</td>
        <td>操作</td>
    </tr>

   <?php
    session_start();
    include("conn2.php");	
    $db = new db();
    $sql = "select * from discount";
    $arr = $db->Query($sql);
    foreach ($arr as $v)
    {
        echo " <tr>
        <td>{$v[0]}</td>
		<td>{$v[1]}</td>
        <td>{$v[2]}</td>
        <td>
        <a href='car2.php?ids={$v[0]}'>加入购物车</a>
		</td>
    </tr>";
    }
    ?>
    <?php
    //这里显示的是 购物车有多少产品，和产品的总价格
    $ann=array();
    if(!empty($_SESSION["gwc"]))
    {
        $ann=$_SESSION["gwc"];

    }
	//print_r($ann);
    $zhonglei = count($ann);
	

    $aa=0;
    foreach($ann as $k)
    {

        $k[0];//水果代号
        $k[1];//水果数量
        $sql1="select d_money_o from discount where d_id='{$k[0]}'";

        $danjia=$db->Query($sql1);
		//print_r($danjia);
        foreach($danjia as $n)
        {

            $aa=$aa + $n[0]*$k[1];
        }
    }
    echo"数量：{$zhonglei}<br/>
	价格:<mark>{$aa}元";
    ?>
</table>
<a href="tijiao.php">查看账户</a>
<a href="car3.php">查看购物车</a>

</body>