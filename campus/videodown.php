<?php
session_start();
include"./lib/connect.php";
//include "common/checkLog.php";
//include "common/visitRight.php";
//if((@!$_COOKIE['username'])or(@!$_COOKIE['password'])){
//			echo "<script type=\"text/javascript\">alert('请先登录');</script>";
//			echo "<script type=\"text/javascript\">window.location.href=\"../index.php\";</script>";
//			exit;
//			}
?>
<?php

	$id = $_GET['id'];
	/*积分*/
	$sql1="select * from `material` where `id` =$id";
	$result1=mysql_query($sql1);
	$row1=mysql_fetch_array($result1);
	$sql="select * from `user` where `id` ={$_SESSION['user_id']}";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);
	//echo $row['points'];
	//echo $row1['points'];
	//exit;
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


	$name=$_GET['name'];
$file_name="../../chinavec_campus/material/video/".$name;//需要下载的文件
$fp=fopen($file_name,"r+");//下载文件必须先要将文件打开，写入内存
if(!file_exists($file_name)){//判断文件是否存在
    echo "文件不存在";
    exit();
}
$file_size=filesize($file_name);//判断文件大小
//返回的文件
Header("Content-type: application/octet-stream");
//按照字节格式返回
Header("Accept-Ranges: bytes");
//返回文件大小
Header("Accept-Length: ".$file_size);
//弹出客户端对话框，对应的文件名
Header("Content-Disposition: attachment; filename=".$name);
//防止服务器瞬时压力增大，分段读取
$buffer=1024;
while(!feof($fp)){
    $file_data=fread($fp,$buffer);
    echo $file_data;
}
//关闭文件
fclose($fp);
