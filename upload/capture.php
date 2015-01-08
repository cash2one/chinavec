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
	?>
    <?php 
	include "config/config.php";
	$id=$_GET['ID'];
	$img=$_POST['img'];
	//echo $img.".jpg";
	//echo "<br/>";
	//echo "img/".$id.".jpg";
	//exit;
	copy("imgtmp/".$img.".jpg","../data-storage/video/poster/h/".$id.".jpg");


	for($i=1;$i<=8;$i++){
		//echo $id."-".$i.".jpg";
		//echo "<br/>";
		//$dir = opendir('imgtmp');
		//echo $dir.$id."-".$i.".jpg";
		//echo "<br/>";
		if(file_exists('imgtmp/'.$id."-".$i.".jpg")){
			unlink('imgtmp/'.$id."-".$i.".jpg");
		}
	}
	echo "<script>alert('成功,你可以点击用户查看视频');</script>";
	echo "<script>window.location.href='upload_video.php'</script>";
	?>
</body>
</html>
<?php
	echo require('common/footer.php');
?>

