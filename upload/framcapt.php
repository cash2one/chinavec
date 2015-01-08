<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<!--<script src="jquery-1.11.0.min.js"></script>-->
<script>
$(document).ready(function(){
	setTimeout("timedMsg()",3000);
})

function timedMsg()
{
	$("#zhuanquan").css({"display":"none"});
	$("#jietu").css({"display":"block"});
	//console.log($("#img3").attr("src"));
	if($("#img1").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}
}

function myrefresh()   
{   
      window.location.reload();   
}   
function myrecapture()   
{   
      var id='<?php echo $_GET['ID'];?>';
      window.location.href="framcapt.php?ID="+id;   
} 
</script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<title>微视频截图选择</title>
<link rel="stylesheet" type="text/css" href="css/upload.css" />
</head>
<?php 
	//session_start();
	//include "common/checkLog.php";
	//include "common/visitRight.php";
	include "lib/connect.php";
	$id=$_GET['ID'];
	$frame=$_POST['frame'];
	$sql="select * from `video_upload` where `video_id`='$id'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);	
	$token = $row['token'];
	//print_r($argv);
	//echo $id;
	//echo $frame;
	//exit;
	exec("/var/www/chinavec/upload/framcapt.sh '$token' '$id' '$frame' > /dev/null & ");
	sleep(2);
?>

<body>
<div id="header" style="width:900px;margin:0 auto;"><img src="img/vec_logo2.jpg" width=800></div>
<div id="layout">
    <?php 
		include "./common/table.php";
	?>
    <div style="width:960px; height:700px; margin:0 auto; clear:both;border-radius: 5px;" class="change"><h2 class="post"><br/>&nbsp;微视频截图选择</h2>
	<div style="width:960px; margin:0 auto;" class="post_left"></div>
    <div  id="zhuanquan" align="center" style="padding:200px"><img src="./img/loading1.gif"><h2>正在截图,请稍后...</h2></div>
    <table id="jietu" cellspacing="50px"  style="display:none">
<form action="framupload.php?ID=<?php echo $_GET['ID']; ?>" name="uploadImg" id="Img" method="post">
    <tr>
      <td align="center" width="860px"><img src="./imgtmp/<?php echo $id;?>.jpg" width="300" height="200" id="img1" onerror="this.src='error.png'"></td>
      
      </tr>
      <tr align="center" id="tijiao">
	<td width="840px">
      <input type="radio" checked="checked" name="img" value="<?php echo $id;?>"/>

<tr>
<td width="800px">
    <input class="button" type="submit" style="width:100px;margin-left:290px" value="提交">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<input class="button" type="button" style="width:100px;" value="取消返回" id="recapture" onclick="javascript:history.go(-1)" >
	</td>
	</tr>
	</form>	
      </table>
    </div>
</div>
</body>
</html>
<?php
	require('./common/footer.php');
?>
