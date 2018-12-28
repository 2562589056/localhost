<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/base.css" rel="stylesheet" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script src="js/jquery.simpleGal.js"></script>
<script type="text/javascript" src="js/jquery.imagezoom.min.js"></script>
<style>
img {
	max-width: none;
}
.tb-pic a {
	display: table-cell;
	text-align: center;
	vertical-align: middle;
}
.tb-pic a img {
	vertical-align: middle;
}
.tb-pic a {
*display:block;
*font-family:Arial;
*line-height:1;
}
.tb-thumb {
	margin: 10px 0 0;
	overflow: hidden;
}
.tb-thumb li {
	float: left;
	width: 86px;
	height: 86px;
	overflow: hidden;
	border: 1px solid #cdcdcd;
	margin-right: 5px;
}
.tb-thumb li:hover, .tb-thumb .tb-selected {
	width: 84px;
	height: 84px;
	border: 2px solid #799e0f;
}
.tb-s310, .tb-s310 a {
	height: 365px;
	width: 365px;
}
.tb-s310, .tb-s310 img {
	max-height: 365px;
	max-width: 365px;
}
.tb-booth {
	border: 1px solid #CDCDCD;
	position: relative;
	z-index: 1;
}
div.zoomDiv {
	z-index: 999;
	position: absolute;
	top: 0px;
	left: 0px;
	background: #ffffff;
	border: 1px solid #ccc;
	display: none;
	overflow: hidden;
}
div.zoomMask {
	position: absolute;
	background: url("images/mask.png") repeat;
	cursor: move;
	z-index: 1;
}
<!--?????-->
 .black_overlay {
	display: none;
	position: absolute;
	top: 0%;
	left: 0%;
	width: 100%;
	height: 1200px;
	background-color: black;
	z-index: 9999;
	-moz-opacity: 0.4;
	opacity: 0.40;
	filter: alpha(opacity=40);
}
.white_content {
	display: none;
	position: absolute;
	top: 20%;
	left: 40%;
	width: 400px;
	height: 175px;
	border: none;
	background-color: white;
	z-index: 100200;
	overflow: auto;
}
.white_content_small {
	display: none;
	position: absolute;
	top: 20%;
	left: 30%;
	width: 40%;
	height: 50%;
	background-color: white;
	z-index: 1002;
	overflow: auto;
}
.dialogbox {
	padding: 20px;
	line-height: 40px;
}
.addbtn {
	width: 22px;
	height: 22px;
	background: url(images/close2.png) no-repeat;
	margin-right: 5px;
	margin-top: 3px;
	border: none;
	float: right;
}
#a
{
		width:80px;
		height:60px;
}
</style>
<script type="text/javascript">
//?????
function ShowDiv(show_div,bg_div){
document.getElementById(show_div).style.display='block';
document.getElementById(bg_div).style.display='block' ;
var bgdiv = document.getElementById(bg_div);
bgdiv.style.width = document.body.scrollWidth;
// bgdiv.style.height = $(document).height();
$("#"+bg_div).height($(document).height());
};
//?????
function CloseDiv(show_div,bg_div)
{
document.getElementById(show_div).style.display='none';
document.getElementById(bg_div).style.display='none';
};

</script>
<script src='js/jquery-1.12.4.js'></script>
<script>

</script>
</head>
<body>
<form action='accounts.php' method='post'>
<div class="sup-wid">
	<div><img src="images/TB27.gif" width="100%"/></div>
    <div class="supplie-top">
        <div class="clear">
            <table width="100%" border="0" cellpadding="0" cellspacing="0" class="nav">
                <tr>
                    <td align="center"><a href="#">供应商首页</a></td>
                    <td align="center"><a href="#">全部产品</a></td>
                    <td align="center"><a href="#">企业介绍</a></td>
                    <td align="center"><a href="#">最新产品</a></td>
                    <td align="center"><a href="#">热销产品</a></td>
                    <td align="center"><a href="#">促销产品</a></td>
                </tr>
            </table>
        </div>
</div>
<table border='1' align='center' width='1200'>
<tr>
	<td>名称</td>
	<td>价格</td>
	<td>数量</td>
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
        <td name='name'>{$a[1]}</td>
        <td name='money1'>{$a[2]}</td>
        <td name='num'>{$v[1]}</td>
    </tr> ";
//            蔬果的名称
//            单价
//            取int数量
//        这个地方也可以加索引shanchu.php?sy={$v}
        }
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
	价格:<mark name='money2'>{$aa}元";
?>
<tr>
	<td colspan='3' align='right'>总计:<input type=''><?php echo $aa?>￥<input type='submit' value='结算'></td>
</tr>
</table>
</form>
</body>