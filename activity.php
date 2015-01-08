<?php 
session_start();
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
//没有用户登录时该如何操作
}
	require('lib/connect.php'); 

//提取剧本发布信息
$sql_ScriptRelease="SELECT task.* FROM task WHERE task_type_id='1'";
$result_ScriptRelease=mysql_query($sql_ScriptRelease);
//提取团队招募信息
$sql_TeamRecruited="SELECT task.* FROM task WHERE task_type_id='2'";
$result_TeamRecruited=mysql_query($sql_TeamRecruited);
//提取剧本征集信息
$sql_ScriptCollection="SELECT task.* FROM task WHERE task_type_id='3'";
$result_ScriptCollection=mysql_query($sql_ScriptCollection);
//提取寻求投资信息
$sql_SeekInvestment="SELECT task.* FROM task WHERE task_type_id='4'";
$result_SeekInvestment=mysql_query($sql_SeekInvestment);
?>


<!DOCTYPE HTML>
<html>
<head>
<title>线下活动</title>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/base.css" />
</head>
<body>
<?php 
	include "common/checkLog.php";
//登录--> 
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	//include "siteview.php";
}else{
	include "LoginSuccess.php";
	//include "userview.php";
};

//登录-->
?>

	<div id="log" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
<div id="layout">
<style>
	#layout{ margin:0 auto;text-decoration:none; font-family:"微软雅黑"; font-size:18px; text-align:left !important; text-align:center; }
	body{text-align:center}
	a:link {color:#black;text-decoration:none;magin-left=10px;}
	a:visited  {color:#purple;text-decoration:none;}
	a:hover {color:#purple;text-decoration:none;}
	a:active {color:#red; text-decoration:none;}
	.activityBiaoTi{
		font-family:Arial, Helvetica, sans-serif;
		font-size:20px;
		color:#518900;
		font-weight:900;
		line-height:30px;
		}
	.more{font-size:14px; color:#518900; font-weight:800; float:right;}
	.taskTitle{
		 font-size:12px; font-weight:600;}	
</style>
<!--导航栏-->
	<?php 
		include "common/table.php";
	?>
<!--end of 导航栏-->

	<!--center-->
	<div class="" style="height:1100px; width:100%; margin:0 auto;  clear:both;">
		<!--right-->
		<div style="height:500px; width:970px; margin:0 auto; clear:both;" align="center">
            <div style="height:420px; width:350px;  background-color:#fff; margin-top:30px; margin-left:60px; float:left; border-radius: 5px;">
				<div>
				<img src="img/jubenfabu.jpg" width="350px" style="margin:0 autol;border-radius: 5px;"  />
				</div>
				<div style="width:250px; margin-left:40px; float:left">
                	<a href="MoreTitleInfo.php?task_type_id=1"><span class="activityBiaoTi">剧本发布</span></a><br />
					<?php 
						for($j=0;$j<5;$j++){
							if($row_ScriptRelease=mysql_fetch_object($result_ScriptRelease)){
								echo "<a  href='ShowInfo.php?task_id={$row_ScriptRelease->id}&task_type=剧本发布'><span class='taskTitle'>{$row_ScriptRelease->title}</span></a><br/>";	
							}
						}
					?>
					<a align="right" href="MoreTitleInfo.php?task_type_id=1"><span class="more">MORE...</span></a>
				</div>
			</div>
			<div style="height:420px; width:350px;  background-color:#fff; margin-top:30px; margin-left:150px; float:left; border-radius: 5px;">
				<div>
				<img src="img/tuanduizhaomu.jpg" width="350px" style="margin:0 autol;border-radius: 5px;"  />
				</div>
				<div style="width:250px; margin-left:40px; float:left">
                	<a href="MoreTitleInfo.php?task_type_id=2"><span class="activityBiaoTi">团队招募</span></a><br/>
					<!--for 循环 列出数据库中的前五条最新信息标题-->
					<?php 
						for($j=0;$j<5;$j++){
							if($row_TeamRecruited=mysql_fetch_object($result_TeamRecruited)){
								echo "<a href='ShowInfo.php?task_id={$row_TeamRecruited->id}&task_type=团队招募'><span class='taskTitle'>{$row_TeamRecruited->title}</span></a><br/>";	
								//echo "<a style='font-size:14px'  href='#'>".$row_TeamRecruited->title."</a><br/>"; //等价于上一句
							}
						}
					?>
					<a align="right" href="MoreTitleInfo.php?task_type_id=2"><span class="more">MORE...</span></a>
				</div>
			</div>
		</div>
		<div style="height:500px; width:970px; margin:0 auto; clear:both;" align="center">
			<div style="height:420px; width:350px;  background-color:#fff; margin-top:0px; margin-left:60px; float:left; border-radius: 5px;">
				<div>
				<img src="img/jubenzhengji.jpg" width="350px" style="margin:0 autol;border-radius: 5px;"  />
				</div>
				<div style="width:250px; margin-left:40px; float:left">
                	<a href="MoreTitleInfo.php?task_type_id=3"><span class="activityBiaoTi">剧本征集</span></a><br />
					<?php 
						for($j=0;$j<5;$j++){
							if($row_ScriptCollection=mysql_fetch_object($result_ScriptCollection)){
								echo "<a href='ShowInfo.php?task_id={$row_ScriptCollection->id}&task_type=剧本征集'><span class='taskTitle'>{$row_ScriptCollection->title}</span></a><br/>";	
							}
						}
					?>
					<a align="right" href="MoreTitleInfo.php?task_type_id=3"><span class="more">MORE...</span></a>
				</div>
			</div>
            <div style="height:420px; width:350px;  background-color:#fff; margin-top:0px; margin-left:150px; float:left; border-radius: 5px;">
				<div>
				<img src="img/xunqiutouzi.jpg" width="350px" style="margin:0 autol;border-radius: 5px;"  />
				</div>
				<div style="width:250px; margin-left:40px; float:left">
                	<a href="MoreTitleInfo.php?task_type_id=3"><span class="activityBiaoTi">寻求投资</span></a><br />
					<?php 
						for($j=0;$j<5;$j++){
							if($row_SeekInvestment=mysql_fetch_object($result_SeekInvestment)){
								echo "<a  href='ShowInfo.php?task_id={$row_SeekInvestment->id}&task_type=寻求投资'><span class='taskTitle'>{$row_SeekInvestment->title}</span></a><br/>";	
							}
						}
					?>
					<a align="right" href="MoreTitleInfo.php?task_type_id=4"><span class="more">MORE...</span></a>
				</div>
			</div>
		</div>
	</div>
     <!--end of right-->	
</div>
<!--end of center-->
		
<?php
	require('common/footer.php');
?>
