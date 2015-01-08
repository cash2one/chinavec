<?PHP
session_start();
include"./lib/connect.php";
if((@!$_COOKIE['username'])or(@!$_COOKIE['password'])){
echo "<script type=\"text/javascript\">alert('请先登录');</script>";
			echo "<script type=\"text/javascript\">window.location.href=\"../index.php\";</script>
?>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
</head>
<body>
<?php
include'./lib/connect.php';
	$id = $_GET['id'];
	/*积分*/
	$sql1="select * from `material` where `id` =$id";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	$sql="select * from `user` where `id` ={$_SESSION['username']}";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	echo $row['points'];
	echo $row1['points'];
	if($row['points'] < $row1['points']){
		echo "<script type=\"text/javascript\">alert('您的积分余额不足，不能申请该视频，请充值后再申请！谢谢!');</script>";
		echo "<script type=\"text/javascript\">window.location.href=\"videoDetail.php\";</script>";		
		}else{
		$point =  $row['points'] - $row1['points'];
		mysql_query($sql="UPDATE `chinavec`.`user` SET `points` = '$point' where `id` ={$_SESSION['user_id']}");
		}
	//echo $point;
	//exit;

	/*积分结束*/


$file_name=$_GET['id'];
//echo $file_name;
$file_dir="../../chinavec_cd/chinavec_campus/material/audio/";
//$FileId=$_GET['FileId'];
//$file_dir = $file_dir."/";
//echo $file_dir.$file_name;
//exit;
if(!file_exists($file_dir.$file_name))   {   //检查文件是否存在  
  echo   "文件找不到";  
  exit;    
  }else{  
$file = fopen($file_dir . $file_name,"r"); // 打开文件
// 输入文件标签
Header("Content-type: application/octet-stream");
Header("Accept-Ranges: bytes");
Header("Accept-Length: ".filesize($file_dir . $file_name));
Header("Content-Disposition: attachment; filename=" . $file_name);
// 输出文件内容
echo fread($file,filesize($file_dir . $file_name));
fclose($file);
exit();
}
?>
</body>
</html>
