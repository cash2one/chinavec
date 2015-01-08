<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>微电影学院-原创音乐区</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/movieDetail.css" />
<link rel="stylesheet" type="text/css" href="css/campus.css" />	

</head>

<style type="text/css">
body {
	text-align:center;
	background:#333 repeat 0px 1px;
}
</style>

<body>
    <div id="header" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
<?php 
		session_start();
		$id = $_GET['id'];
		
		//检查该页面是否已合法获取视频ID及ID是否为数值型
		if (!(isset($_GET['id']) && ctype_digit($_GET['id']))) {
			header("Location:movie.php?msg=invalid");
			exit;
		}
		
		require "lib/connect.php";
		
		function sec2time($sec){	
			$sec = round($sec/60);
			if ($sec >= 60){
				$hour = floor($sec/60);
				$min = $sec%60;
				$res = $hour.'小时';
				$min != 0  &&  $res .= $min.'分';
			}else{
				$res = $sec.'分钟';
			}
			return $res;
			}
			
		$sql="select * from material WHERE `id` = $id";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$form=explode("/",$row->file_url);
		$name=$form[6];
		//echo $name;
		//print_r($row);
	?>

<div id="layout">
<?php include "common/table.php";?>

    	<div id="movieTitle">
			<div style="float:left;">
            <p style="color:#FFFFFF; font-size:15px;"><?php echo $row->title;?>
            &nbsp;&nbsp;
            <span style="color:#AAAAAA;font-size:12px;">ChinaVEC首页 >微电影学院&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <div style="float:right;">
            <!-- <form action="searchList.php" method="get">
                <input type="text" name="keyWord" placeholder="输入名称查询"  class="searchBlock"/>
               <input type="submit" value="搜索" class="searchButton"/>
            </form>-->
            </div>
        </div>
		
        <div style="margin-left:0;width:100%">
        <!--HTML5的video标签-->

    	</div> 
</div> 
<!--<a href="order.php?id=<?php //echo $id; ?>&name=<?php //echo $row->title_cn; ?> "><button class="xuanze">加入到我的选择</button></a>
<!--movieDetail Start-->        
	<?php 
		//$sec = $row->dur;
		//$min = sec2time($sec);
	?>
    <div class="movieDetail"> 
    	<br/>
		<div class="movieDetail2">
        <div style="float:right; margin-top:10px; margin-right:10px;">
        <img src="img/music.jpg" width="160px";/>
        </div>
            <div style="width:900px;margin:-50px 10px 0px 30px;float:left;">
                <br/>
                <div class="p_half">
                    <div style=" margin-top:30px;"> 
                        <p style="font-size:18px"><?php echo $row->title;?></p><br/> 
                        <HR style="border:1 dashed #5b5b5b" width="90%" color=#5b5b5b SIZE=1><br/>
                        <!--<div style="float:left"> 
                        <img width="180px" height="230px" src="<?php echo $row->file_url;?>">
                        </img><br/></div>-->
                         <div style="float:left; margin:10px auto auto 50px;"> 
                   <embed style="width:650px;height:150px;margin:0px 10px 0px 80px;"src="<?php echo $row->file_url;?>" />
		   <center><a href="musicdown.php?id=<?php echo $name; ?>&name=<?php echo $row->title; ?> "><img src="img/download.png" width="250px" style="margin:0px 0px 0px 0px; "></a></center>
 <br/><br/><br/><br/><br/>
                    <a style="margin-left:15px" href="musicmore.php">返回</a><br/><br/>
            </div></div></div></div></div>
          
    
    

<?php
	//require('common/footer.php');
?>
<div style="width:100%; float:auto; margin-top:50px; margin-bottom:20px;clear:both" >
	<!--<p align="center" style="color:#FFF; padding-top:15px">支持单位与合作媒体</p>-->
		<div style="width:480px; height:180px; margin:0 auto;">
		</br>
        <img src="img/logo_wall.jpg" width="480px" height="140px" style="margin:0 auto;"/>
		<p align="center" style=" color:#FFF; padding-top:1px; font-size:14px;">copyright © 2013-2014 中国微视频协作与交易平台<br/>All Rights Reserved. 中国传媒大学 新媒体研究院</p>
		<!--<img src="img/cuc_logo.jpg" width="130px" height="90px" style="margin:5px auto auto 10px; float:left"  />
		<img src="img/zg_logo.jpg" width="130px" height="90px" style="margin:5px auto auto 35px; float:left"  />
		<img src="img/xhs_logo.jpg" width="130px" height="90px" style="margin:5px auto auto 35px; float:left" />-->
		</div>
	</div>
	<!--logo-->
</body>
	    
</html>
