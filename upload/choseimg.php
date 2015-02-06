<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script src="jquery-1.11.0.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<title>微视频截图选择</title>
<link rel="stylesheet" type="text/css" href="css/upload.css" />
</head>
<?php 
	session_start();
	include "common/checkLog.php";
	include "common/visitRight.php";

?>
<body>
<div id="header" style="width:900px;margin:0 auto;"><img src="img/vec_logo2.jpg" width=800></div>
<div id="layout">
    <?php 
	include "./common/table.php";
        error_reporting( E_ALL&~E_NOTICE );
	
	$id=$_GET['ID'];
	$file  = '/var/www/chvec_auth/video/'.$id.'.mp4';
	$vtime =exec("/root/bin/ffmpeg -i ".$file." 2>&1 | grep 'Duration' | cut -d '' -f 4 | sed s/,//",$out);
  //1和2指的是文件描述符 ">"是重定向符号。“2>&1”的意思：将输出到标准出错处理的信息，发送到标准输出中。
	//echo "$vtime";
	$duration = explode(":",$vtime);
	//print_r ($duration);
	$duration_in_seconds = $duration[1]*3600 + $duration[2]*60+ round($duration[3]);
	//echo "$duration_in_seconds";
     ?>
    <?php
	require('lib/connect.php');
	$sql = mysql_query("UPDATE `chinavec`.`video` SET `dur`='$duration_in_seconds' where `id`='$id'");	

	$sql2=mysql_query("UPDATE `chinavec`.`video_upload` SET `time`='$duration_in_seconds' where `video_id`='$id'");	
	//echo "<script type=\"text/javascript\">alert('视频时长已录入');</script>";
	 mysql_close($conn);
    ?>
    <div style="width:960px; height:630px; margin:0 auto; clear:both;border-radius: 5px;" class="change" align="left"><h2 class="post_left"><br/>&nbsp;微视频截图</h2>
    <br/>
    <p>&nbsp;&nbsp;用户可以从三种方式中选择一种方式获取图片作为视频封面</p>
    <br/>
    <br/>
	<div style="width:960px; margin:0 auto;" class="post_left">
   <div style="width:100px; float:left">&nbsp;</div>
   <div style="width:800px; float:left">
    <div><h2>1.随机截图: <input type="button" value="确定" style="width:90px;background-color:#F90;color:#FFF; border:0 " onClick="location.href='uploadImg.php?ID=<?php echo $id; ?>'"></input></h2>
    <p  style="color:#0C0;font-size:16px;">*系统随机生成视频截图</p>
    </div>
    <br/>
    <br/>
    <form method="post" action="framcapt.php?ID=<?php echo $id; ?>">
    <div><h2>2.指定时间截图: <input type="text" name="frame" id="frame" />
	<input type="submit" value="确定" style="width:90px; color:#FFF;background-color:#F90; border:0" ></h2>
    <p  style="color:#0C0">*指定截图的时间(以秒为单位)，用户指定自己所上传的视频截取时刻。</p>
    </div>
    </form>
    <br/>
    <br/>
    <form method="post" enctype="multipart/form-data" action="upload_img.php?ID=<?php echo $id; ?>">
    <div><h2><label for="file">3.上传视频图片：<input type="file" name="file" id="file" /> 
<input type="submit" name="submit" value="确定" style="width:90px;background-color:#F90;color:#FFF; border:0;"/></label></h2>
    <p style="color:#0C0">*从本地上传图片作为封面(1350*523像素)</p>
    </div></form></div>
    
    </div>  
</div>
</body>
</html>
<?php
	require('common/footer.php');
?>

