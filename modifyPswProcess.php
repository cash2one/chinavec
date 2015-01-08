<?php
	session_start();
	header("content-type:text/html;charset=utf-8");
	
	include('lib/connect.php');

		
	//$username =  $_SESSION['username'] ;	//用户名
	$password 	  = md5($_POST['password']);		//原密码
	$newPassword = md5($_POST['newPassword']);	//新密码
	$rePassword  = md5($_POST['rePassword']);	//确认新密码

	$sql = "SELECT `password` FROM `chinavec`.`user` WHERE `user`.`id` ={$_SESSION['user_id']}";
	$result = mysql_query($sql);
	$row=mysql_fetch_object($result);
	$psw = $row->password;
	
	$sql1="UPDATE `chinavec`.`user` SET `password` = '$newPassword' WHERE `user`.`id` ={$_SESSION['user_id']}";/***************/
	//echo $sql;
	
	if($password == $psw&& $newPassword == $rePassword){
		if (mysql_query($sql1)){
			//$row=mysql_fetch_object($result);
			//print_r($row);
			//ECHO "OK1";
			$url = "userInfo.php"; 
			$msg = "修改成功！";
		}
		else{
			$url = "userInfo.php"; 
			$msg = "修改失败！请稍后尝试重新修改！欢迎将此问题反馈给我们，我们将尽快解决：jiantongyu@cuc.edu.cn";
		}
	}
	else{
		if($password !== $psw){
			$url = "modifyPsw.php";
			//echo $password;
			//echo $psw;
			$msg = "输入的原密码有误，请重新输入！";
			}
		else{
			$url = "modifyPsw.php";
			$msg = "两次新密码输入不相同，请重新输入！";
			}
		}
	
	
	mysql_close($conn);
	
?>

<html>   
<head>   
<meta http-equiv="refresh" content="5; url=<?php echo $url; ?>"> 
<title>修改密码结果</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/movieDetail.css" />
</head>

<style type="text/css">
	body {
		text-align:center;
		background:#333 repeat 0px 1px;
	}
	.change{
		width:970px;
		margin:0px 200px 0 250px;
		}
</style>  
  
<body>  
<img src="img/vec_logo_left.jpg" width="240px" height="55" align="left">

	<?php 
		include "common/table.php"; 
		
		echo "<div class='change'><br/><br/><br/><br/><br/>".$msg."<br/><br/>5秒后将跳转....若未跳转，请<a href=".$url.">点击此处</a></div>";
	?>
    </br>
<?php
	require('common/footer.php');
?>
