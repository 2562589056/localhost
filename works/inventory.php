<!DOCTYPE html>
<?php
	require('conn.php');
	require("on_session.php");
	//$sql = "select a.id,a.name,b.lei,a.quantity from library as a left join kind as b on a.l_id = b.id";
	//$sql = "select a.id,a.lei,b.name,b.quantity from kind as a inner join library as b where  b.l_id = a.id ";
	$sql = "select a.id,a.name,b.lei,a.quantity from library as a inner join kind as b where a.l_id = b.id order by a.id ";
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
	$arr = array();
	while($row=mysql_fetch_assoc($res2))
	{
		$arr[] = $row;
	}
	//echo "<pre>";
	//print_r($arr);
	//echo "</pre>";

	$sql2 = "select * from kind";
	$res2 = mysql_query($sql2);
	$rows2 = [];
	while($row2=mysql_fetch_assoc($res2))
	{
		$rows2[] = $row2;
	}
	//echo "<pre>";
	//print_r($rows2);
	//echo "</pre>";
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
				<div class="tabs">
					<div class="hd">
						<ul>
							<li class="on" style="box-sizing: initial;-webkit-box-sizing: initial;">库存管理</li>
							 <li class="" style="box-sizing: initial;-webkit-box-sizing: initial;">添加商品</li>
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
												<th>库存编号</th>
												<th>商品名称</th>
												<th>商品分类</th>
												<th>商品数量</th>
												<th>编辑</th>
												<th>删除</th>
												
											</tr>
										</thead>
										<tbody>
										<?php
											foreach($arr as $v)
											{
										?>
											<tr>
												<td><?php echo $v['id'] ?></td>
												<td><?php echo $v['name'] ?></td>
												<td><?php echo $v['lei'] ?></td>
												<td><?php echo $v['quantity'] ?></td>
												<td class="edit">
												<a href='update3.php?id=<?php echo $v['id']; ?>'>修改</a>
												<!--<button onclick="btn_edit(1)"><i class="icon-edit bigger-120"></i>编辑</button>--></td>
												<td class="delete">
												<a href='delete2.php?id=<?php echo $v['id']; ?>'>删除</a>
												<!--<button onclick="btn_delete(1)"><i class="icon-trash bigger-120"></i>删除</button></td>-->
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
			<!-- content start -->
	<div class="am-cf admin-main" style="padding-top: 0px;">
		<!-- content start -->
		<div class="admin-content">
			<div class="admin-content-body">
				
				<div class="am-g">
					<div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
						
					</div>
					<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4"
						style="padding-top: 30px;">
						<form class="am-form am-form-horizontal"
							action="insert2.php" method="post">
							<div class="am-form-group">
								<label for="name" class="am-u-sm-3 am-form-label">
									商品名称</label>
								<div class="am-u-sm-9">
									<input type="text" id="name" required
										placeholder="商品名称" name="name">
										<small>10字以内...</small>
								</div>
							</div>
							
							<div class="am-form-group">
								<label for="user-email" class="am-u-sm-3 am-form-label">
								分类</label>
								<div class="am-u-sm-9">
									<select name="l_id" required>
										<?php
										foreach($rows2 as $v){
										?>
										<option value="<?php echo $v['id']?>"><?php echo $v['lei']?></option>
										<?php
										}
										?>
									</select> <small>群组</small>
								</div>
							</div>
							<div class="am-form-group">
								<label for="user-intro" class="am-u-sm-3 am-form-label">
									数量</label>
								<div class="am-u-sm-9">
									<input type="text" id="quantity" required
										placeholder="商品数量" name="quantity">
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
		
		</div>
		<!-- content end -->
	</div>
							<!--添加 end-->
						</ul>
					</div>
				</div>
				<!--tab end-->
			</div>
			 <script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
              <script src="js/plugs/Jqueryplugs.js" type="text/javascript"></script>
              <script src="js/_layout.js"></script>
             <script src="js/plugs/jquery.SuperSlide.source.js"></script>
			<script>
				var num = 1;
				$(function() {

				 $(".tabs").slide({ trigger: "click" });

				});

	
				/*var btn_save = function() {
					var pid = $("#RawMaterialsTypePageId  option:selected").val();
					var name = $("#RawMaterialsTypeName").val();
					var desc = $("#RawMaterialsTypeDescription").val();
					var ramark = $("#Ramark").val();
					$.ajax({
						type: "post",
						url: "/RawMaterialsType/AddRawMaterialsType",
						data: { name: name, pid: pid, desc: desc, ramark: ramark },
						success: function(data) {
							if(data > 0) {
								$.jq_Alert({
									message: "添加成功",
									btnOktext: "确认",
									dialogModal: true,
									btnOkClick: function() {
										//$("#RawMaterialsTypeName").val("");
										//$("#RawMaterialsTypeDescription").val("");
										//$("#Ramark").val("");                           
										//page1();
										location.reload();

									}
								});
							}
						}
					});
					alert(t);
				}

				var btn_edit = function(id) {
					$.jq_Panel({
						url: "/RawMaterialsType/EditRawMaterialsType?id=" + id,
						title: "编辑分类",
						dialogModal: true,
						iframeWidth: 500,
						iframeHeight: 400
					});
				}
				var btn_delete = function(id) {
					$.jq_Confirm({
						message: "您确定要删除吗?",
						btnOkClick: function() {
							
						}
					});
				}*/
			</script>

		</div>
	</body>

</html>