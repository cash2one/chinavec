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
	setTimeout("timedMsg()",5000);
})

function timedMsg()
{
	$("#zhuanquan").css({"display":"none"});
	$("#jietu").css({"display":"block"});
	//console.log($("#img3").attr("src"));
	if($("#img1").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img2").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img3").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img4").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img5").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img6").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img7").attr("src")=="error.png"){
		setTimeout('myrefresh()',100); //指定3秒刷新一次  
	}else if($("#img8").attr("src")=="error.png"){
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
      window.location.href="uploadImg.php?ID="+id;   
} 
</script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<title>微视频截图选择</title>
<link rel="stylesheet" type="text/css" href="css/upload.css" />
</head>
<?php 
	session_start();
	include "common/checkLog.php";
	include "common/visitRight.php";
	include "lib/connect.php";
	$id=$_GET['ID'];
	$sql="select * from `video_upload` where `video_id`='$id'";
	$result=mysql_query($sql);
	$row=mysql_fetch_array($result);	
	$wkey = $row['token'];
	//print_r($argv);
	//exit;
?>

<body>
<div id="header" style="width:900px;margin:0 auto;"><img src="img/vec_logo2.jpg" width=800></div>
<div id="layout">
    <?php 
		include "./common/table.php";
	?>
    <div style="width:960px; height:700px; margin:0 auto; clear:both;border-radius: 5px;" class="change"><h2 class="post"><br/>&nbsp;微视频截图选择</h2>
	<div style="width:960px; margin:0 auto;" class="post_left"></div>
    <div  id="zhuanquan" align="center" style="padding:200px"><img src="img/loading1.gif"><h2>正在截图,请稍后...</h2></div>
    <table id="jietu" cellspacing="20px"  style="display:none">
<form action="capture.php?ID=<?php echo $_GET['ID']; ?>" name="uploadImg" onsubmit="return chenggong()" id="Img" method="post">
<tr></tr>
<tr></tr>
    <tr>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-1.jpg" width="200" height="130" id="img1" onerror="this.src='error.png'"></td>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-2.jpg" width="200" height="130" id="img2" onerror="this.src='error.png'"></td>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-3.jpg" width="200" height="130" id="img3" onerror="this.src='error.png'"></td>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-4.jpg" width="200" height="130" id="img4" onerror="this.src='error.png'"></td>

      </tr>
      <tr align="center">
      <td><input type="radio" checked="checked" name="img" value="<?php echo $id;?>-1"/></td>
      <td><input type="radio" name="img" value="<?php echo $id;?>-2"/></td>
      <td><input type="radio" name="img" value="<?php echo $id;?>-3"/></td>
      <td><input type="radio" name="img" value="<?php echo $id;?>-4"/></td>
      </tr>
      <tr></tr>
    <tr>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-5.jpg" width="200" height="130" id="img5" onerror="this.src='error.png'"></td>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-6.jpg" width="200" height="130" id="img6" onerror="this.src='error.png'"></td>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-7.jpg" width="200" height="130" id="img7" onerror="this.src='error.png'"></td>
      <td align="center" width="240px"><img src="imgtmp/<?php echo $id;?>-8.jpg" width="200" height="130" id="img8" onerror="this.src='error.png'"></td>

      </tr>
      <tr align="center">
      <td><input type="radio" name="img" value="<?php echo $id;?>-5"/></td>
      <td><input type="radio" name="img" value="<?php echo $id;?>-6"/></td>
      <td><input type="radio" name="img" value="<?php echo $id;?>-7"/></td>
      <td><input type="radio" name="img" value="<?php echo $id;?>-8"/></td>
      </tr>
<tr></tr><tr></tr>

      <tr>
<td></td>
      <td width="240px"><input class="button" type="submit" style="width:100px;margin-left:30px" value="提交" align="middle"></td>
      <td width="240px"><input class="button" type="button" style="width:100px;" value="重新截图" id="recapture"  align="middle"></td> 
      <td width="100px"><input class="button"  type="button" style="width:50px;color:#000;border:1px solid #fff;background:#fff" value="返回" id="back"  align="middle" onclick="javascript:history.go(-1)" ></td>

	</tr>
      	<!--<tr><td width="500px"><span>若重新截图后未更改，按F5或重新刷新即可</span></td></tr>-->
	</form>	
      </table>
    </div>
</div>
</body>
</html>
<script>
//$(document).ready(function(){
	//$("#recapture").click(function (){
	//var id='<?php echo $_GET['ID'];?>';
	//console.log(id);
	<?php //exec("/var/www/chinavec/upload/recapture.sh '$wkey' '$id' > /dev/null & "); ?>;
	//console.log(a);
	//window.location.href="uploadImg.php?ID="+id;	
//});
//})
//var sid='';
$(document).ready(function(){
  $("#recapture").click(function (){
       $.post("recapture.php",
      {
        name:"视频文件",
        status:"状态",
        id:'<?php echo $_GET['ID'];?>',
	token:'<?php echo $wkey; ?>'
      },
      function(data){
        //alert(data.name);
        //var id='<?php echo $_GET['ID'];?>';
        //data=JSON.parse(data);
        //console.log(data);

	setTimeout("myrecapture()",3000);
        //console.log(data[1].status);
        //for(var i=0;i<data.length;i++){
        },"html"
      )
	});

})
/*
function recapture(){
	var id='<?php echo $_GET['ID'];?>';
	//var wkey='<?php echo $wkey;?>';
	//console.log(wkey);
	<?php //exec("/var/www/chinavec/upload/recapture.sh '$wkey' '$id' > /dev/null & "); ?>
	window.location.href="uploadImg.php?ID="+id;
}
*/
</script>
<?php
	require('common/footer.php');
?>

