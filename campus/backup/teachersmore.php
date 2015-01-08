<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>微院线播放</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<!-- <script type="text/javascript" src="js/campus.js"></script>-->
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
<div id="layout">
<?php include "common/table.php";?>

    	<div id="movieTitle">
			<div style="float:left;">
            <p style="color:#FFFFFF; font-size:15px;">明星导师 Star mentors
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
            <div style="width:900px;margin:25px 10px 25px 30px;float:left;">
                <br/>
                
 <div class="p_half">
                    <div style=" margin-top:30px;">  
                    </div> 
                <?php
  date_default_timezone_set('PRC');
  include "./lib/connect.php"; 
  $page_num =8;//每页记录数为12
        if (!isset($_GET['page_no']))//page_no 空
          {
              $page_no = 1;
          }
        else {
            $page_no = $_GET['page_no'];
        }
          $start_num = $page_num * ($page_no - 1);//起始行号
          $sql = "SELECT * from `photo_wall` limit $start_num, $page_num";
  //$sql = "SELECT * FROM `video`";
          $result = mysql_query($sql);
     	 $nums = mysql_num_rows($result); 
  //$nm = mysql_num_rows($result);
 
  while ($result_row = mysql_fetch_assoc($result)) {
    echo <<<TB
        <div style="margin-left:30px; margin-top:35px;" class="video1">
	  <a href="teachersdetail.php?id={$result_row['id']}" class="font-hui14cu"/>
          <img width="180px" height="250px" src="../chinavec/data-storage/video/poster/h/{$result_row['id']}.jpg">
          </img>
	  </br>
          <span style="margin:auto" name="svideo" value="{$result_row['id']}" />姓名：{$result_row['name']}<br/>
		  <span style="margin:auto" name="svideo" value="{$result_row['id']}" />简介：{$result_row['abstract']}<br/>
		  
          
        </div>
TB;
        }
      ?>
       
                <div class="section">
	            <div class="aside"></div>
	            <div class="aside"></div>
	            <div class="aside"></div>
	            <div class="aside"></div>		
                </div>
                	
                    <br/>
                  
            </div>
            </div><div style="clear:both;"></div><br/><br/><br/>
            <a style="margin-left:40px" href="campus.php">返回</a><br/><br/>
            </div>
            
            </div>
            
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
                
