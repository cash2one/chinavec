<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="refresh" content="5; url='activity.php'"> 
<title>剧本征集</title>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="js/SubmitActivityInfo.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/moreTitleInfo.css" />
<link rel="stylesheet" type="text/css" href="css/activityPublish.css" />
</head>
<body>
	<?php 
		session_start();
		require "common/visitRight.php";
		require "common/checkLog.php";
	?>

	<div id="header" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
	<div id="layout">
    <?php
        include("common/table.php");
    ?>
        <div class="publishBackShort">
            <!--页面标题START-->
            <div class="showInfoTitle">
            	<h2>发布活动信息</h2>
                <div class="step_progress">
                <div class="titleCenter" align="center">
                    <div class="stepNormal">
                        <span>1</span>
                        <strong>协议阅读</strong><p>阅读并同意活动协议</p>
                    </div>
                    <div class="stepNormal">
                        <span>2</span>
                        <strong>填写活动内容</strong><p>请详细正确地填写相关信息</p>
                    </div>
                    <div class="stepCurrent">
                        <span>3</span>
                        <strong>发布成功</strong><p>完成发布，活动开始</p>
                    </div>
                    </div>
                </div>
            </div>
            <!--页面标题END-->
			<h2 align="center" style="margin-top:80px;">提交成功，活动正在进行中</h2>
            <p align="center" style="width:960px; font-size:16px; margin-top:50px; text-align:center;">感谢您的参与，5秒后将跳转到活动页面，如未跳转，<a href="activity.php">请点击此处</a></p>
            <p id="returnInfo"></p>
        </div>
    </div>
</body>
<?php 
include("common/footer.php");
?>
</html>