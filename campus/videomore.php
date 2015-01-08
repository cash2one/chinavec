<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>微电影学院-视频素材</title>
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
            <p style="color:#FFFFFF; font-size:15px;">&nbsp;视觉素材区 Video
            &nbsp;&nbsp;
            <span style="color:#AAAAAA;font-size:12px;">ChinaVEC首页 >微电影学院 >微元素 M-elements&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
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
	
    <div class="movieDetail" style="height:750px;"> 
    	<br/>
		<div class="movieDetail2" style="height:700px;">
            <div style="width:970px;margin:0px 10px 50px 0px;float:left;">
                
                
 <div class="p_half">
 <?php 
		include "common/tablewei.php";
		
	?>
                    <div style=" margin-top:30px;">  
                    </div> 
	
                    
             <!-- 读取视频图片排列-->       
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
          $sql = "SELECT * from `material` where `material_type_id`=1 limit $start_num, $page_num";
  //$sql = "SELECT * FROM `video`";
          $result = mysql_query($sql);
          $nums = mysql_num_rows($result); 
			?>		
			 <?php  while ($row=mysql_fetch_array($result)) { ?>
           <div style="width:200px; height:160px; margin:10px 20px 5px 22px; float:left; border-radius: 5px;">    
                <div style="margin:0px auto;">
                    <a href="videoDetail.php?id=<?php echo $row['id']?>">
                    <?php 
			/*是否存在id.jpg的文件
			若存在$poster = $row['id'].".jpg"
			否则 $poster = 0.jpg*/
			$file =$row['photo_url'];
			//echo $file;
			//exit;
			if(file_exists($file)){
				$poster = $row['photo_url'];
				//echo $poster;
				//exit;
			}
			else{
				$poster = "0.jpg";
				//echo $poster;
				//exit;
				}
		?>
                    <center><img src="<?php echo $poster;?>" width="170px" height="100px" /></center>
                	</a>
                </div>
                <div style="width:200px; margin:0px auto;">
                    <a href="videoDetail.php?id=<?php echo $row['id']?>">
                    <p align="center" class="black14"><?php echo $row['title']?></p></a>
                    <a href="videoDetail.php?id=<?php echo $row['id']?>">
                    <p align="center" class="stars">简介：<?php echo mb_substr($row['abstract'],0,10,'utf-8')."..."?></p></a>
                    <!--<p align="center" class="black12"><?php echo $row['tags']?></p></a>-->

                </div>
            </div>
            <?php } ?>
                	 <br/>
                    
            </div>
            </div>
            
            <a style="margin-left:40px;" href="campus.php">返回</a><br/><br/>
            </div>
              <!--页码显示-->
          <?php
		$sql1 = "SELECT * from `material` where `material_type_id`=1";
		$result1 = mysql_query($sql1);
		$numss = mysql_num_rows($result1);
		$page = ceil($numss/$page_num);
            if ($page_no >= 1) {
		    echo "&nbsp;&nbsp;<a href ='videomore.php?page_no= 1'>首页&nbsp;&nbsp;</a>";}
		if($page_no > 1){
                    echo "&nbsp;&nbsp;<a href ='videomore.php?page_no=".($page_no-1)."'>上一页</a>&nbsp;&nbsp;&nbsp;";
                }else{
                    echo '<span>上一页</span>&nbsp;&nbsp;&nbsp;';
                }
                echo '<strong>第'.$page_no.'页/共'.$page.'页</strong>';
                if ($nums == $page_num) {
	            
                    echo "&nbsp;&nbsp;&nbsp;<a href ='videomore.php?page_no=".($page_no+1)."' >下一页</a>";
		    echo "&nbsp;&nbsp;<a href ='videomore.php?page_no= ".$page."'>尾页</a>";
                }else{
                    echo '&nbsp;&nbsp;&nbsp;<span>下一页</span>';
		    
                }

        ?>
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
                
