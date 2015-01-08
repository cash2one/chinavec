<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>微电影学院-教程</title>
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
<div id="layout">
<?php include "common/table.php";?>

    	<div id="movieTitle">
			<div style="float:left;">
            <p style="color:#FFFFFF; font-size:15px;">微电影教程 M-Tutorials
            &nbsp;&nbsp;
            <span style="color:#AAAAAA;font-size:12px;">ChinaVEC首页 >微电影学院&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            </div>
            <div style="float:right;">
            <!--<form action="searchList.php" method="get">
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
        <div style="float:left; margin-top:10px; margin-left:10px;">
        <img src="img/changji1.jpg" width="130px";/>
        </div><div style="clear:both;"></div>
        
           <div style="width:400px;  margin-top:0px; margin-left:200px;float:left;"> 
                 <?php
            include "lib/connect.php";
	$page_num =12;//每页记录数为12
        if (!isset($_GET['page_no']))//page_no 空
          {
              $page_no = 1;
          }
        else {
            $page_no = $_GET['page_no'];
        }
          $start_num = $page_num * ($page_no - 1);//起始行号
          $sql="SELECT * FROM  `college` where `college_type_id`=1 limit $start_num, 13";
  //$sql = "SELECT * FROM `video`";
          $result = mysql_query($sql);
          $nums = mysql_num_rows($result); 		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="tutorialsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?>
             <br/><br/> <br/><br/><br/><a href="campus.php">返回</a><br/><br/>
                </div>
                 <div style="width:360px;  margin-top:0px; margin-left:0px;float:left;"> 
                 <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where college_type_id=1 limit 13,$page_num";
			$result=mysql_query($sql);		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="tutorialsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?></div>
                </div></div>
            
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
                
