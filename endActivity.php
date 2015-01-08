<?php //接收数据
	session_start();
	include "common/checkLog.php";
	require('lib/connect.php');
	require('common/visitRight.php');
	
	if(isset($_GET["task_id"])){
		$taskId = $_GET["task_id"];
	}
	else{
		echo "ERROR";
		break;
		}
	
	$sql ="UPDATE `chinavec`.`task` SET  `status` =  '1' WHERE  `task`.`id` ={$taskId};";
	if (mysql_query($sql,$conn))
	{			
		/*echo "<script type=\"text/javascript\">alert('操作成功');</script>";*/
		echo "<script type=\"text/javascript\">window.location.href=\"userInfo.php?field=activityInfo\";</script>";

		}
	else   
	{	
		/*echo "<script type=\"text/javascript\">alert('结束操作失败');</script>";*/
		echo "<script type=\"text/javascript\">window.location.href=\"userInfo.php?field=activityInfo\";</script>";
		
	}

		mysql_close($conn);
	?>