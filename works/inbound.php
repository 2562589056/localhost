<!DOCTYPE html>
<?php
	require("on_session.php");
	require("conn.php");
	$sql = " select a.id,a.name,b.lei,a.num,a.date from enter as a inner join kind as b where a.e_id = b.id";
	$res = mysql_query($sql);
	$rows = mysql_num_rows($res);
	$size = 6;
	$maxpage = ceil($rows/$size);
	$page = isset($_GET['page'])?$_GET['page']:'';
	if($page=="" or $page==null or $page<1)
	{
		$page =1;
	}
	if($page>$maxpage)
	{
		$page =$maxpage;
	}
	$sql.=" limit ".(($page-1)*$size).",".$size;
	$res2 = mysql_query($sql);
	$rows = array();
	while($row=mysql_fetch_assoc($res2))
	{
		$rows[] = $row;
	}
	
	/*echo "<pre>";
	print_r($rows);
	echo "</pre>";*/
	$sql2 = "select * from kind";
	$res2 = mysql_query($sql2);
	$rows2 = array();
	while($row2 = mysql_fetch_assoc($res2))
	{
		$rows2[] = $row2;
	}
	//print_r($rows2);
	$sql3 = "select * from library ";
	$res3 = mysql_query($sql3);
	$rows3 = array();
	while($row3 = mysql_fetch_assoc($res3))
	{
		$rows3[] = $row3;
	}
	//print_r($rows3);
?>
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
	</head>
	<body>
		<div class="dvcontent">
			<div>
				<!--tab start-->
				<div class="tabs" style="margin: 30px;">
					<div class="hd">
						<ul>
							<li class="on" style="box-sizing: initial;-webkit-box-sizing: initial;">入库记录</li>
							 <li class="" style="box-sizing: initial;-webkit-box-sizing: initial;">商品入库</li>
						</ul>
					</div>
					<div class="bd">
						<ul style="display: block;padding: 20px;">
							<li>
								<!--分页显示角色信息 start-->
								<div id="dv1">
									<table class="table" id="tbRecord">
										<thead>
											<tr>
												<th>编号</th>
												<th>商品名称</th>
												<th>商品分类</th>
												<th>入库数量 </th>
												<th>入库日期</th>
												<th>编辑</th>
												<th>删除</th>
											</tr>
										</thead>
										<tbody>
										<?php
											foreach($rows as $v){
										?>
											<tr>
												<td><?php echo $v['id']?></td>
												<td><?php echo $v['name']?></td>
												<td><?php echo $v['lei']?></td>
												<td><?php echo $v['num']?></td>
												<td><?php echo $v['date']?></td>
												<td class="edit"><a href='update5.php?id=<?php echo $v['id']?>'>修改</a><!--<button onclick="btn_edit(1)"><i class="icon-edit bigger-120"></i>编辑</button>--></td>
												<td class="delete"><a href='delete3.php?id=<?php echo $v['id']?>'>删除</a><!--<button onclick="btn_delete(1)"><i class="icon-trash bigger-120"></i>删除</button>--></td>
											</tr>
											<?php
											}
											?>
											</tr>
												<tr align='center'>
													<td colspan='6'  align='center'>
															<a href='inventory.php?page=1'>首页</a>&nbsp;&nbsp;
															<a href='inventory.php?page'=<?php echo $page-1?>>上一页</a>&nbsp;&nbsp;
															<a href='inventory.php?page=<?php echo $page+1?>'>下一页</a>&nbsp;&nbsp;
															<a href='inventory.php?page=<?php echo $maxpage?>'>末页</a>&nbsp;&nbsp;
													</td>
											</tr>
										</tbody>
									</table>
								</div>
								<!--分页显示角色信息 end-->
							</li>
						</ul>
						<ul class="theme-popbod dform" style="display: none;">
								<div class="am-cf admin-main" style="padding-top: 0px;">
	<div class="am-cf admin-main" style="padding-top: 0px;">
		<div class="admin-content">
			<div class="admin-content-body">
				<div class="am-g">
					<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
					</div>
					<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4"
						style="padding-top: 30px;">
						<form class="am-form am-form-horizontal"
							action="insert3.php" method="post">
							<div class="am-form-group">
								<label for="user-email" class="am-u-sm-3 am-form-label">
								分类</label>
								<div class="am-u-sm-9">
									<select name="e_id" id="lei" required>
										<option value="">请选择分类</option>
										<?php
											foreach($rows2 as $v){
										?>
										<option value='<?php echo $v['id']?>'><?php echo $v['lei']?></option>
										<?php
										}
										?>
									</select> <small>分类</small>
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-email" class="am-u-sm-3 am-form-label">
							商品名称</label>
								<div class="am-u-sm-9">
									<select name="name" id='l_name' required>
										<option value="请选择分类">请选择分类</option>
									</select><small>商品</small>
								</div>
							</div>
							<div class="am-form-group">
								<label for="name" class="am-u-sm-3 am-form-label">
									数量</label>
								<div class="am-u-sm-9">
									<input type="text" id="name" required
										placeholder="数量" name="num">
										<small>数量</small>
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-intro" class="am-u-sm-3 am-form-label">
									备注</label>
								<div class="am-u-sm-9">
									<textarea class="" rows="5" id="user-intro" name="notes"
										placeholder="输入备注(可以为空)"></textarea>
									<small>250字以内...</small>
								</div>
							</div>
							<div class="am-form-group">
								<div class="am-u-sm-9 am-u-sm-push-3">
									<input type="submit" class="am-btn am-btn-success" value="添加分类" />
								</div>
							</div>
						</form>
					</div>
				</div>
			
		</div>
		<!-- content end -->
	</div>
							<!--添加 end-->
							<!--end-->
						</ul>
					</div>
				</div>
				<!--tab end-->
			</div>
			 <script src='js/jquery-1.12.4.js'></script>
			  <script src='test.js'></script>
			 <script>
			$(function()
			{	
				$("#lei").change(function()
				{
					var lei = $("#lei").val();
					switch(lei)
					{
						case "1":
							var learn = "";
							$.each(rou,function(a)
							{
								learn+="<option value='"+rou[a]+"'>"+rou[a]+"</option>";
							})
							$("#l_name").html("");
							$("#l_name").html(learn);
							break;
						case "2":
							var learn = "";
							$.each(cai,function(a)
							{
								learn+="<option value='"+cai[a]+"'>"+cai[a]+"</option>";
							})
							$("#l_name").html("");
							$("#l_name").html(learn);
							break;
						case "5":
							var learn = "";
							$.each(hai,function(a)
							{
								learn+="<option value='"+hai[a]+"'>"+hai[a]+"</option>";
							})
							$("#l_name").html("");
							$("#l_name").html(learn);
							break;
						case "6":
							var learn = "";
							$.each(tiao,function(a)
							{
								learn+="<option value='"+tiao[a]+"'>"+tiao[a]+"</option>";
							})
							$("#l_name").html("");
							$("#l_name").html(learn);
							break;
						case "7":
							var learn = "";
							$.each(tian,function(a)
							{
								learn+="<option value='"+tian[a]+"'>"+tian[a]+"</option>";
							})
							$("#l_name").html("");
							$("#l_name").html(learn);
							break;
						case "8":
							var learn = "";
							$.each(yin,function(a)
							{
								learn+="<option value='"+yin[a]+"'>"+yin[a]+"</option>";
							})
							$("#l_name").html("");
							$("#l_name").html(learn);
							break;
						case "请选择":
							$("#l_name").html("");
							$("#l_name").append("<option value='请选择'>请选择</option>");
					}
				})
	})
</script>
			  <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
              <script src="js/plugs/Jqueryplugs.js" type="text/javascript"></script>
              <script src="js/_layout.js"></script>
             <script src="js/plugs/jquery.SuperSlide.source.js"></script>
			<script>
				var num = 1;
				$(function() {

				 $(".tabs").slide({ trigger: "click" });

				});
			</script>
		</div>
	</body>
</html>