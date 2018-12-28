<meta charset='utf-8'>
<style type="Text/CSS">
	body
	{
		text-align:center;
	}
	#aa
	{
		border:0px solid red;
		width:600px;
		height:600px;
		color:blue;
		font-size:30px;
	}
	#bb
	{
		border:0px solid red;
		width:550px;
		height:580px;
		color:blue;
		margin:10px 0px 0px 10px;
		font-size:30px;
		float:left;
	}
	#cc
	{
		border:0px solid red;
		width:190px;
		height:580px;
		color:blue;
		font-size:30px;
		margin:10px 0px 0px 590px;
	}
	#dd
	{
		border:0px solid red;
		width:610px;
		height:50px;
		color:blue;
		font-size:30px;
		text-align:center;
		letter-spacing:50px;
		padding:8px;
		float:left;
		margin:10px 0  2px 0px 0px;
	}
	.red
	{
		border:2px solid red;
		color:red;
	}
	img
	{
		width:550px;
		height:550px;
	}
</style>
<script src='js/jquery.1.7.1.js'></script>
<script>
<!--
	$(function()
	{
		var inta = 0;
		$("span:eq("+inta+")").addClass("red"); 

		function aaa()
		{
			inta++;
			if(inta==1)
			{
				$("img").attr({"src":"img/20.jpg"});
				$("span").removeClass();
				$("span:eq("+inta+")").addClass("red");
			}
			if(inta==2)
			{
				$("img").attr({"src":"img/21.jpg"});
				$("span").removeClass();
				$("span:eq("+inta+")").addClass("red");
			}
			if(inta==3)
			{
				$("img").attr({"src":"img/22.jpg"});
				$("span").removeClass();
				$("span:eq("+inta+")").addClass("red");
			}
			if(inta==4)
			{
				$("img").attr({"src":"img/23.jpg"});
				$("span").removeClass();
				$("span:eq("+inta+")").addClass("red");
			}
			if(inta>5)
			{
				inta=0;
				$("img").attr({"src":"img/19.jpg"});
				$("span").removeClass();
				$("span:eq("+inta+")").addClass("red");
			}
		}
		id = window.setInterval(aaa, 2500);
		$('span:first').click(function()
		{
				$("img").attr({"src":"img/7.jpg"});
				$("span").removeClass();
				$("span:eq(0)").addClass("red");
		})
		$('#one').click(function()
		{
				$("img").attr({"src":"img/19.jpg"});
				$("span").removeClass();
				$("#one").addClass("red");
		})
		$('#two').click(function()
		{
				$("img").attr({"src":"img/20.jpg"});
				$("span").removeClass();
				$("#two").addClass("red");
		})
		$('#three').click(function()
		{
				$("img").attr({"src":"img/21.jpg"});
				$("span").removeClass();
				$("#three").addClass("red");
		})
		$('#four').click(function()
		{
				$("img").attr({"src":"img/22.jpg"});
				$("span").removeClass();
				$("#four").addClass("red");
		})
		$('#five').click(function()
		{
				$("img").attr({"src":"img/23.jpg"});
				$("span").removeClass();
				$("#five").addClass("red");
		})
	})
-->
</script>
<body>
<div id='aa'>
	<div id='bb'>
		<img src="img/19.jpg" width="550px" height="580px">
	</div>
	<div id='dd'>
		<span id="one">1</span>
		<span id="two">2</span>
		<span id="three">3</span>
		<span id="four">4</span>
		<span id="five">5</span>
	</div>
</div>
</body>