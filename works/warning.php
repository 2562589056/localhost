<!DOCTYPE html>
<?php
	require("on_session.php");
	require("conn.php");
	$sql = "select * from library where quantity < 200";
	$res = mysql_query($sql);
	$row = mysql_num_rows($res);
	$arr = array();
	while($rows = mysql_fetch_assoc($res))
	{
		$arr[] = $rows;
	}
	//print_r($arr);
	if($row > 0)
	{
		$sql9 = "select name from library where quantity < 200";
		$res9 = mysql_query($sql9);
		$row9 = mysql_num_rows($res9);
		$arr9 = array();
		while($rows9 = mysql_fetch_assoc($res9))
		{
			foreach($rows9 as $v)
			{
				$arr9[] = $v;
			}
		}
		//print_r($arr9);
	
		//echo "<hr color='red'>";
		$sql8 = "select w_name from warning";
		$res8 = mysql_query($sql8);
		$arr8 = array();
		while($rows8 = mysql_fetch_assoc($res8))
		{
			foreach($rows8 as $v)
			{
				$arr8[] = $v;
			}
		}
		//print_r($arr8);
		
		//声明不存在物品的数组
		$arr_no_exists = null;
		foreach($arr9 as $k=>$v)
		{
			if(in_array($v,$arr8)==false)
			{	
				/*
				 * in_array('',array) 找到返回ture(boolen 布尔型 ) 找不到返回false
				 */
				$sql = "select * from library where name = '".$v."'";
				//echo $sql;
				$res = mysql_query($sql);
				$row = mysql_num_rows($res);
				$arr = array();
				while($rows = mysql_fetch_assoc($res))
				{
					$arr[] = $rows;
				}
				//print_r($arr);
				for($a=0;$a<$row;$a++)
				{
						$sql2 ="insert into warning (w_id,w_name,w_idd,w_notes,w_quantity) values(null,'".$arr[$a]['name']."','".$arr[$a]['l_id']."',null,'".$arr[$a]['quantity']."')";
						$res2 = mysql_query($sql2);
				}
			}
		}
		//echo "<hr color='red'>";
		//print_r($arr_no_exists);
		//echo "<hr color='red'>";
		//for($a=0;$a<$row;$a++)
		//{
			/*$arr10 = array_intersect($arr8,$arr9);
			if($arr10)
			{
				echo "存在";
			}
			else
			{
				$sql2 ="insert into warning (w_id,w_name,w_idd,w_notes,w_quantity) values(null,'".$arr[$a]['name']."','".$arr[$a]['l_id']."',null,'".$arr[$a]['quantity']."')";
				$res2 = mysql_query($sql2);
			}*/
		//}
		$sql3 = "select a.w_id,a.w_name,b.lei,a.w_notes,a.w_quantity from warning as a inner join kind as b where a.w_idd = b.id order by a.w_idd";
		$arr3 = array();
		$res3 = mysql_query($sql3);
		while($rows3 = mysql_fetch_assoc($res3))
		{
			$arr3[] = $rows3;
		}
		//print_r($arr3);
		//echo "<hr color='red' size='5'>";
		$sql4 = "select name from library where quantity > 200";
		$res4 = mysql_query($sql4);
		$row4 = mysql_num_rows($res4);
		$arr4 = array( );
		while($rows4 = mysql_fetch_assoc($res4))
		{
			foreach($rows4 as $v)
			{
				$arr4[] = $v;
			}
		}
		//print_r($arr4);
		//echo "<hr color='red' size='5'>";
		$sql5 = "select w_name from warning";
		$res5 = mysql_query($sql5);
		$row5 = mysql_num_rows($res5);
		$arr5 = array();
		while($rows5 = mysql_fetch_assoc($res5))
		{
			foreach($rows5 as $v)
			{
				$arr5[] = $v;
			}
		}
		//print_r($arr5);
		//echo "<hr color='red' size='5'>";
		$arr6 = array_intersect($arr4,$arr5);
		//$arr7 = count(array_intersect($arr4,$arr5));
		//echo $arr7;
		//print_r($arr6);
		foreach($arr6 as $v)
		{
			$sql6 = "delete from warning where w_name = '".$v."'";
			$res6 = mysql_query($sql6);
		}
		//echo $row5;
		//print_r($arr5);
		
		/*$a1 = [1,2,3,4,5,6,7,8,9,10,11,12];
		$a2 = [1,2];
		$a3 = array_intersect($a1,$a2);
		//print_r($a3);
		if(array_intersect($a1,$a2))
		{
			/*$b = count(array_intersect($a1,$a2));
			echo $b;
			$b = array_intersect($a1,$a2);
			print_r($b);
			foreach($b as $v)
			{
				echo $v."<br>";
			}
		}
		else
		{
			print_r(array_intersect($a1,$a2));
		}*/
	}
	else
	{
		$sql = "select w_name from warning";
		$res = mysql_query($sql);
		$row = mysql_num_rows($res);
		$arr = array();
		while($rows = mysql_fetch_assoc($res))
		{
			$arr[] = $rows;
		}
		//print_r($arr);
		foreach($arr as $v)
		{
			foreach($v as $k2=>$v2)
			{
				$sql6 = "delete from warning where w_name = '".$v2."'";
				$res6 = mysql_query($sql6);
			}
		}
		$sql3 = "select a.w_id,a.w_name,b.lei,a.w_notes,a.w_quantity from warning as a inner join kind as b where a.w_idd = b.id order by a.w_idd";
		$arr3 = array();
		$res3 = mysql_query($sql3);
		while($rows3 = mysql_fetch_assoc($res3))
		{
			$arr3[] = $rows3;
		}
		//print_r($arr3);
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
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
							<li class="on" style="box-sizing: initial;-webkit-box-sizing: initial;">预警管理</li>
							<li class="" style="box-sizing: initial;-webkit-box-sizing: initial;">添加预警</li>
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
												<th>备注</th>
												<th>预警数量</th>
												<th>编辑</th>
												<th>删除</th>
											</tr>
										</thead>
										<tbody>
										<?php
											foreach($arr3 as $v){
										?>
											<tr>
												<td><?php echo $v['w_id']?></td>
												<td><?php echo $v['w_name']?></td>
												<td><?php echo $v['lei']?></td>
												<td><?php echo $v['w_notes']?></td>
												<td><font color='red'><?php echo $v['w_quantity']?></font></td>
												<td class="edit">
												<a href='update7.php?w_id=<?php echo $v['w_id']?>'>修改</a><!--<button onclick="btn_edit(1)"><i class="icon-edit bigger-120"></i>编辑</button>--></td>
												<td class="delete"><a href='delete4.php?w_id=<?php echo $v['w_id']?>'>删除</a><!--<button onclick="btn_delete(1)"><i class="icon-trash bigger-120"></i>删除</button>--></td>
											</tr>
										<?php
										}	
										?>
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
												<div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4" style="padding-top: 30px;">
													<form class="am-form am-form-horizontal" action="user/addUser1Submit.action" method="post">

														<div class="am-form-group">
															<label for="user-email" class="am-u-sm-3 am-form-label">
								分类</label>
															<div class="am-u-sm-9">
																<select name="groupId" required>
																	<option value="">请选择分类</option>

																</select> <small>分类</small>
															</div>
														</div>
														<div class="am-form-group">
															<label for="user-email" class="am-u-sm-3 am-form-label">
																商品名称</label>
																<div class="am-u-sm-9">
																	<select name="groupId" required>
																		<option value="">请选择商品</option>

																	</select> <small>商品</small>
																</div>
														</div>

														<div class="am-form-group">
															<label for="name" class="am-u-sm-3 am-form-label">
									数量</label>
															<div class="am-u-sm-9">
																<input type="text" id="name" required placeholder="预警数量" name="name">
																<small>预警数量</small>
															</div>
														</div>
														<div class="am-form-group">
															<label for="user-intro" class="am-u-sm-3 am-form-label">
									备注</label>
															<div class="am-u-sm-9">
																<textarea class="" rows="5" id="user-intro" name="remark" placeholder="输入备注"></textarea>
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
										<footer class="admin-content-footer">
											<hr>
											<p class="am-padding-left"></p>
										</footer>
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

					var btn_save = function() {
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
					}
				</script>

			</div>
	</body>
</html>