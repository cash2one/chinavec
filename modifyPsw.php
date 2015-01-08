<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>密码修改</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/userInfo.css" />
</head>


<body>
	<?php 
		session_start();
		include "common/visitRight.php";//限制访问权限，未登录不可访问
		require "lib/connect.php";		//连接数据库
		include "common/checkLog.php";//按照登录状态显示登录区域

	?>

<div id="layout">
	<?php include "common/table1.php";?>
	<div id="modifyPsw">
    	 <div style="width:360px; float:left; margin-left:120px;">
			<br/><br/>
           <form  id="modifyPswFrom" class="black14" method="post" action="modifyPswProcess.php">
                <fieldset>
                    <img class="userImg" src="img/userImg.jpg" />
                    
                    <label class="name"><?php echo $username;?>的账号</label>
                    
                </fieldset><br/>
                <fieldset>
                    <span class="font1">原密码：</span><br/>
                    <input type="password" name="password" id="password"/>
                </fieldset><br/>
				<fieldset>
                    <span class="font1">新密码：</span><br/>
                    <input type="password" name="newPassword" id="newPassword"/>
                </fieldset><br/>
                <fieldset>
                    <span class="font1">确认新密码：</span><br/>
                    <input type="password" name="rePassword" id="rePassword"/>
                </fieldset><br/>

                <fieldset>
                    <input type="submit" value="确认修改" class="apply"/>
                </fieldset>
                
        	</form>
        </div>
        <div style="width:360px;height:380px; float:left; margin-top:150px; margin-left:120px;">
        <p class="green17">如何使密码更安全？</p>
        <p class="black14">
            使用标点符号、数字和大小写字母的组合作为密码。<br/>
            密码中勿包含个人信息（如姓名、生日等）。<br/>
            不使用和其他网站相同的密码。<br/>
            定期修改密码。<br/>
        </p>
        </div>
    </div>

		

</div>    
<script language=JavaScript>    
 //jquery事件中的submit()方法，当运行submit事件时运行该函数
$('#modifyPswFrom').submit(function()
{
	if($('#password').val() == '')
	{
		alert('请填写密码');
		return false;
	}
	if($('#newPassword').val() == '')
	{
		alert('请填写新密码');
		return false;
	}
	if($('#rePassword').val() == '')
	{
		alert('请确认新密码');
		return false;
	}
	if($('#newPassword').val() != $('#rePassword').val() )
	{
		alert('密码不一致');
		return false;
	}	
});
</script>  

<?php
	require('common/footer.php');
?>
