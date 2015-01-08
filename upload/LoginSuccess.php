<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>chinavec</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/login-js.js"></script> <!--add by ligang-->
<script type="text/javascript">


$(document).ready(function(){
	var k=!0;

	$(".loginmask").css("opacity",0.8);
	
	if($.browser.version <= 6){
		$('#reg_setp,.loginmask').height($(document).height());
	}
	
	$(".thirdlogin ul li:odd").css({marginRight:0});	
	
	$(".openlogin").click(function(){
		k&&"0px"!=$("#loginalert").css("top")&& ($("#loginalert").show(),$(".loginmask").fadeIn(500),$("#loginalert").animate({top:0},400,"easeOutQuart"))
	});
	
	$(".loginmask,.closealert").click(function(){
		k&&(k=!1,$("#loginalert").animate({top:-600},400,"easeOutQuart",function(){$("#loginalert").hide();k=!0}),$(".loginmask").fadeOut(500))
	});
	
	
	$("#sigup_now,.reg a").click(function(){
		$("#reg_setp,#setp_quicklogin").show();
		$("#reg_setp").animate({left:0},500,"easeOutQuart")
	});																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																								
	
	$(".back_setp").click(function(){
		"block"==$("#setp_quicklogin").css("display")&&$("#reg_setp").animate({left:"100%"},500,"easeOutQuart",function(){$("#reg_setp,#setp_quicklogin").hide()})
	});
	
}); 
$(document).ready(function(){
	$("#user").mouseover(function(){
		$(".userinfo").show("slow");
	});
	$("#userinfo").mouseover(function(){
		$(this).show();
	});
	$(".userinfo").mouseout(function(){
		$(this).hide();
		/*$("#user").mouseout(function(){
		$(".userinfo").hide();
	});*/
	});
})

</script>
</head>
<body>

<div id="header">
	<ul class="login fr">
		<li class="openlogin"><a href="javascript:void(0);" style="width:80px">欢迎回来：</a></li>
		<li><li class="reg" id="user" ><a href="userInfo.php" style="width:auto;padding-left:10px;padding-right:10px;"><span class="user-name"><?php echo $_SESSION['user_name']?></span>&nbsp<span class="user-arrow"></span></a>
		<div style="position:absolute;margin-top:35px;clear:both;display:none" class="userinfo" id="userinfo">
		<ul>
		<li style="float:none;clear:both"><a href="../userInfo.php?field=perInfo" style="width:auto;padding-left:10px;padding-right:10px;">个人信息</a></li>
		<li style="float:none;clear:both"><a href="../userInfo.php?field=videoInfo" style="width:auto;padding-left:10px;padding-right:10px;">我的视频</a></li>
		<li style="float:none;clear:both"><a href="../userInfo.php?field=activityInfo" style="width:auto;padding-left:10px;padding-right:10px;">活动记录</a></li>
		</ul>
</div>
</li></li>
		<li class="reg"><a href="logout.php">退出</a></li>
	</ul>

</div>

</body>
</html>

