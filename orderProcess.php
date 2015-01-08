<?php
	session_start();
	header("content-type:text/html;charset=utf-8");
	
	include('lib/connect.php');

	$id = $_GET['id'];
		
		//检查该页面是否已合法获取视频ID及ID是否为数值型
		if (!(isset($_GET['id']) && ctype_digit($_GET['id']))) {
			header("Location:movie.php?msg=invalid");
			exit;
		}
	$sql ="SELECT * FROM `user_auth` WHERE `user_id` = {$_SESSION['user_id']} and `video_id` = {$id}";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	if($count!==0){
		
		$msg ="<span class='orange14'>您已申请过该视频</span>，请耐心等待管理员与您联系！谢谢！";
		$url = "movie.php";
		}
	else{
		
	//$username =  $_SESSION['username'] ;	//用户名
	$email 	  = $_POST['email'];			//电子邮箱
	$realName = $_POST['realName'];			//真实姓名
	$address  = $_POST['address'];			//联系地址
	$tel  	  = $_POST['tel'];			//联系电话
	$unit     = $_POST['unit'];				//单位
	$qq       = $_POST['qq'];				//QQ号码
	$wechat   = $_POST['wechat'];			//微信账号
	$purpose  = $_POST['purpose'];			//授权目的

	/*echo $email;
	echo $realName;
	echo $address;
	echo $contact;
	echo $gender;
	echo $purpose;
	*/

	/*积分*/
	$sql1="select * from `video` where `id` ={$id}";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	$sql="select * from `user` where `id` ={$_SESSION['user_id']}";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	//echo $row['points'];
	//echo $row1['points'];
	if($row['points'] < $row1['points']){
		$msg ="<span class='orange14'>您的积分余额不足，不能申请该视频，请充值后再申请！谢谢!";
		$url = "movie.php";		
		}else{
		$point =  $row['points'] - $row1['points'];
		mysql_query($sql="UPDATE `chinavec`.`user` SET `points` = '$point' where `id` ={$_SESSION['user_id']}");
		}
	//echo $point;
	//exit;

	/*积分结束*/
	
	$sql="UPDATE `chinavec`.`user` SET `email` = '$email',
										`real_name` = '$realName',
										`address` = '$address',
										`unit` = '$unit',
										`tel`='$tel',
										`qq` = '$qq',
										`wechat` = '$wechat'										
										WHERE `user`.`id` ={$_SESSION['user_id']}";/***************/
	//echo $sql;
	
	if (mysql_query($sql))
	{
		//$row=mysql_fetch_object($result);
		//print_r($row);
		//ECHO "OK1";
		$sql1="INSERT INTO `user_auth` (`user_id`, `video_id`, `mail_address`, `purpose`) 
							VALUES ({$_SESSION['user_id']}, '$id','$address', '$purpose')";
		if (mysql_query($sql1)){
				//echo "授权表ok";
				$url = "movie.php"; 
				$msg = "申请成功！请耐心等待工作人员与您联系！";
				
			}
		else{
				$url = "movie.php"; 
				$msg = "申请失败！请稍后尝试重新申请！欢迎将此问题反馈给我们，我们将尽快解决：jiantongyu@cuc.edu.cn";

				//echo "授权表error";
				
			}
	}
	else
	{
		$url = "movie.php"; 
		$msg = "申请失败！请稍后尝试重新申请！欢迎将此问题反馈给我们，我们将尽快解决：jiantongyu@cuc.edu.cn";

		
	}
	}
	mysql_close($conn);
	
?>

<html>   
<head>   
<meta http-equiv="refresh" content="5; url=<?php echo $url; ?>"> 
<title>申请授权结果</title>
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
