<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>chinavec</title>
<link rel="stylesheet" type="text/css" href="css/login.css" />
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.easing.min.js"></script>
<script type="text/javascript" src="js/login-js.js"></script> <!--add by ligang-->
<script type="text/javascript" src="js/register-js.js"></script><!--add by ligang-->
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
</script>

</head>
<body>

<div id="header">
	<ul class="login fr">
		<li class="openlogin"><a href="javascript:void(0);" style="width:100px">登录</a></li>
		<li class="reg"><a href="javascript:void(0);" style="width:100px">注册</a></li>
	</ul>
</div>

<div class="loginmask"></div>

<div id="loginalert" style="height:370px">
	
	<div class="pd20 loginpd">
		<h3><i class="closealert fr"></i><div class="clear"></div></h3>
		<div class="loginwrap">
			<div class="loginh">
				<div class="fl">会员登录</div>
				<div class="fr">还没有账号<a id="sigup_now" href="javascript:void(0);">立即注册</a></div>
			</div>
			<!--<h3><span class="login_warning">注意：测试阶段可使用（用户名：admin 密码：123456）</span><div class="clear"></div></h3>-->
			<!--<form action="loginProcess.php" method="post" id="login_form">-->
				<form>
				<div class="logininput">
					<table><tr><td><input style="width:250px;margin-top:10px;"type="text" name="username" id="username" class="loginusername" value="" placeholder="用户名" onBlur="checkuser()"/></td><td id="hint_user" style="color:red;"></td></tr></table>
					<table><tr><td><input style="width:250px;margin-top:10px;"type="password" name="password" id="password" class="" value="" placeholder="密码" onBlur="checkpassword()"/></td><td id="hint_password" style="color:red;"></td></tr></table>
					<table><tr><td><input  style="width:180px;margin-top:10px;" type="text" name="chkcode" id="chkcode" class="" value="" placeholder="验证码" onBlur="checkchkcode()"/></td>
					<td><a href="javascript:reloadcode_login();"><img src="code.php" id="chkimg"></a></td><td id="hint_chkcode" style="color:red;"></td></tr></table>
				</div>
				
				<div class="loginbtn">
					<!--<input type="button" value="登录" onclick="checkme()" /> <!--add by ligang-->
					<!--<input type="button" value="清空" onclick="refresh()" /> <!--add by ligang-->
					<div class="loginsubmit fl"><input type="button" id="loginButton" value="登录" class="btn" onclick="checkme()" /></div>
					<div class="loginsubmit fl" ><input type="button" style="background:#f60" value="清空" class="btn" onclick="refresh()" /></div>
			
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
					&nbsp&nbsp&nbsp&nbsp&nbsp
					<span id="login_info" style="color:red;"></span>
				</div>
			</form>
		</div>
	</div>
	
	<!--<div class="thirdlogin">
		<div class="pd50">
			<h4>用第三方帐号直接登录</h4>
			<ul>
				<li id="sinal"><a href="#">微博账号登录</a></li>
				<li id="qql"><a href="#">QQ账号登录</a></li>
			</ul>
			<div class="clear"></div>
		</div>
	</div>
	-->
</div><!--loginalert end-->


<div id="reg_setp">
	<br/><br/>
	<div class="back_setp" style="margin-top:30px;">返回</div>
	<div class="blogo"></div>
	<div id="setp_quicklogin">
	<br/><br/>
    	<form action="regProcess.php" method="post" id="reg_form">
            <div class="logininput">
                <table><tr><td><input style="width:310px;" type="text" name="user" id="user" class="loginusername" value="" placeholder="用户名" onkeyup="checkinput('user')" onblur="checkreuser(this)"/></td><td id="info-1" style="color:red;"></td></tr></table>
				<table><tr><td><input style="width:310px;" type="text" name="email" id="email" class="loginusername" value="" placeholder="邮箱" onkeyup="checkinput('email')" onblur="checknull('email')"/></td><td id="info-2" style="color:red;"></td></tr></table>
				<table><tr><td><input style="width:310px;" type="password" name="pw1" id="pw1" class="loginusername" value="" placeholder="密码" onkeyup="checkinput('pw1')" onblur="checknull('pw1')"/></td><td id="info-3" style="color:red;"></td></tr></table>
                <table><tr><td><input style="width:310px;" type="password" name="pw2" id="pw2" class="loginusername" value="" placeholder="确认密码" onkeyup="checkinput('pw2')" onblur="checknull('pw2')"/></td><td id="info-4" style="color:red;"></td></tr></table>
				<table><tr><td><input style="width:310px;" type="text" name="reg_chkcode" id="reg_chkcode" class="loginusername" value="" placeholder="验证码" onkeyup="checkinput('chkcode')" onblur="checknull('chkcode')"/></td><td><a href="javascript:reloadcode();"><img src="code.php" id="reg_chkimg"></a></td></tr></table>
            </div>
            <div class="loginbtn">
		<div class="loginsubmit fl">
			<input type="button" class="btn" name="regbtn" id="regbtn" value="注册" disabled="disabled" onclick="register()" /> 
		</div>
		<div class="loginsubmit fl"><!--add by ligang-->
			<input type="button" class="btn" style="background:#f60" name="refresh" class="refresh" value="重置" onclick="reg_refresh()"  /> 
		</div><!--add by ligang-->	
            </div>
        </form>
	<!--
		<h3>您可以选择以下第三方帐号直接登录，一分钟完成注册</h3>
		<ul class="quicklogin_socical">
			<li class="quicklogin_socical_weibo"><a href="#">微博帐号注册</a></li>
			<li class="quicklogin_socical_qq" style="margin:0;"><a href="#">QQ帐号注册</a></li>
		</ul>
	-->
	</div>
</div><!--reg_setp end-->

</body>
</html>

