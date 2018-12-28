<meta charset='utf-8'>
<body>
<h1>查看购物车</h1>
<table width="100%" border="1"cellspacing="0" cellpadding="0">
    <tr>
        <td>商品名称</td>
        <td>商品单价</td>
        <td>商品数量</td>
        <td>操作</td>
    </tr>
   <?php
    session_start();
    if(!empty($_SESSION["gwc"]))
    {
        $arr = array();
        $arr = $_SESSION["gwc"];
        //造数组
    }
    include ('conn2.php');
    $db = new db();
    foreach ($arr as $v)
    {
        global $db;
        $sql = "select * from discount WHERE d_id = '{$v[0]}'";
        $att = $db->query($sql);
        foreach ($att as $a)
        {
            echo "<tr>
        <td>{$a[1]}</td>
        <td>{$a[2]}</td>
        <td>{$v[1]}</td>
        <td><a href='shanchu.php?ids={$a[0]}'>删除</a> </td>
    </tr> ";
//            蔬果的名称
//            单价
//            取int数量
//        这个地方也可以加索引shanchu.php?sy={$v}
        }
    }
    ?>
</table>

<a href="tijiao.php">提交订单</a>
</body>