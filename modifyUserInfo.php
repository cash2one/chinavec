<?php
	session_start();
	header("content-type:text/html;charset=utf-8");
	
	include('lib/connect.php');

		
	//$username =  $_SESSION['username'] ;	//用户名
	$email 	  = $_POST['email'];			//电子邮箱
	$realName = $_POST['realName'];			//真实姓名
	$address  = $_POST['address'];			//联系地址
	$tel      = $_POST['tel'];			//联系电话
	$unit     = $_POST['unit'];				//单位
	$qq       = $_POST['qq'];				//QQ号码
	$wechat   = $_POST['wechat'];			//微信账号
	$idcard_no= $_POST['idcard_no'];			//身份证号
	$mp 	  = $_POST['mp'];			//手机号码
	$mp1  	  = $_POST['mp1'];			//备用手机号码

	/*echo $email;
	echo $realName;
	echo $address;
	echo $contact;
	echo $gender;
	echo $purpose;
	*/
	
	$sql="UPDATE `chinavec`.`user` SET `email` = '$email',
										`real_name` = '$realName',
										`address` = '$address',
										`tel` = '$tel',
										`unit` = '$unit',
										`qq` = '$qq',
										`wechat` = '$wechat',
										`idcard_no` = '$idcard_no',
										`mp` = '$mp',
										`mp1` = '$mp1'
										WHERE `user`.`id` ={$_SESSION['user_id']}";/***************/
	//echo $sql;
	
	if (mysql_query($sql))
	{
		//$row=mysql_fetch_object($result);
		//print_r($row);
		//ECHO "OK1";

		$url = "userInfo.php"; 
		$msg = "修改成功！";
				
	}
	else
	{
		$url = "userInfo.php"; 
		$msg = "修改失败！请稍后尝试重新修改！欢迎将此问题反馈给我们，我们将尽快解决：jiantongyu@cuc.edu.cn";

		
	}
	
	mysql_close($conn);
	
?>

<html>   
<head>   
<meta http-equiv="refresh" content="5; url=<?php echo $url; ?>"> 
<title>修改个人信息结果</title>
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