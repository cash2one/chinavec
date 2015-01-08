<!DOCTYPE HTML>
<html>
<head>
<TITLE>微电影学院</TITLE>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<!--<script type="text/javascript" src="js/campus.js"></script>-->
	<link rel="stylesheet" type="text/css" href="css/campus.css" />	
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
   <!-- <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />-->

    
</head>
<body>
<!--登录-->
<?php 
session_start();
require "../common/checkLog.php";
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	//include "siteview.php";
}else{
	include "../LoginSuccess.php";
	//include "userview.php";
};
?>
<!--登录-->
    


	<div id="log" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
	<div id="layout">

	<style>
	#layout{ margin:0 auto;text-decoration:none; font-family:"微软雅黑"; font-size:18px; text-align:left !important; text-align:center; }
	body{text-align:center}
	/*a:visited  {color:#FFF;text-decoration:none;}
    a:link {color:#FFF;text-decoration:none;}
	a:active {color:#0FF; text-decoration:none;}*/
</style>

<!--banner-->
<!--导航栏-->
     
	<?php 
		include "common/table.php";
		
	?>
	<!--end of 导航栏-->
	<div style="width:960px;margin:0 auto; clear:both;">
		
   <!-- <img src="img/xueyuan22.jpg" width="960px"/>-->
    
        <div class="wyy">
            <div id="slider" class="nivoSlider">
                <img src="img/xueyuan22.jpg" data-thumb="img/xueyuan22.jpg" alt="" title="Welcome to the Micro-film Academy"/>
                <img src="img/xueyuan111.jpg" data-thumb="img/xueyuan111.jpg" alt="" title="Welcome to the Micro-film Academy" />
                <img src="img/movie.jpg" data-thumb="img/movie.jpgs" alt="" data-transition="slideInLeft"   title="Welcome to the Micro-film Academy" />
               <!-- <img src="images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" title="#htmlcaption" />-->
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>Զ</strong>
            </div>
        </div>

	</div>
	<!--center-->
	<!--<div class="change" style=" width:100%;height:auto; margin:0 auto; clear:both;">-->
		<!--right-->
        <div><img src="img/lan1.png" width="970px" style="margin:0px 0px 0px 0px;" /><div>
            <div style="width:970px; margin-top:-10px; margin-left:0px; float:left;background-color:#fff;">
            <div><a href="newsdetail.php?id=15">
				<img src="img/laopo.jpg" width="300px" style="margin:20px 10px 0px 20px; float:left"  title="陈思成送给佟丽娅的自导自演微电影《老婆》"/></a>
                </div>
               <div  style="margin-top:225px; margin-left:-315px; float:left">
                    <p style="font-size:17px" align="left"> <a href="newsdetail.php?id=15" target="_blank">陈思成送佟丽娅的自导自演微电影《老婆》</a></p><br/>
                 <div style="height:100px;  width:310px; margin-top:13px; "> <p style="font-size:15px" align="left" class="ex"><a href="newsdetail.php?id=15" target="_blank">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真爱是一种从内心发出的关心和照顾，没有华丽的言语，没有哗众取宠的行动， 只有在点点滴滴一言一行中你能感受到。 </a></p></div>
                   
              </div>
            <div style="width:300px;margin-top:10px; margin-left:30px;float:left;">  
            <div style="width:300px; margin:auto;">
                <p style="font-size:25px" class="ex"><a href="newsmore.php">今日焦点 &gt&gt;</a></p><br/>
                </div> 
                <HR style="border:1 dashed #5b5b5b" width="90%" color=#5b5b5b SIZE=1>
            <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where `college_type_id`=3 LIMIT 7";
			$result=mysql_query($sql);		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="newsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?>
            </div>
               <div style="float:left;width:280px; margin:auto; background-color:#fff;">
                    <a href="newsmore.php">
				<img src="img/jiechuan.jpg" width="120px" style="margin:25px auto auto 10px; float:left"  title="人生需要揭穿 超级奶爸王岳伦首部网络剧"/> </a>            
                    <a href="newsmore.php">
                <img src="img/shuoxiangsheng.jpg" width="120px" style="margin:25px auto auto 20px; float:left" title="2014盲童励志微电影《今天 我们来说相声》 三兄弟学艺报恩"/></a>

                    <a href="newsmore.php">
                <img src="img/zhuimengderizi.jpg" width="120px" style="margin:25px auto auto 10px; float:left" title="大学生活 大学新兵顶撞班长"/></a>
                    <a href="newsmore.php">
                <img src="img/hongwu.jpg" width="120px" style="margin:25px auto auto 20px; float:left"  title="雾霾催生的科幻微电影《红雾》"/></a>
                    <a href="newsmore.php">
                 <img src="img/yingbi.jpg" width="120px" height="90px"style="margin:25px auto auto 10px; float:left" title="陌生人的温情《硬币》"/></a>

                    <a href="newsmore.php">
                <img src="img/babahuijia.jpg" width="120px" height="90px" style="margin:25px auto auto 20px; float:left" title="感人亲情《爸爸回家》"/></a>
                </div>
                <div style="clear:both;"></div>
                
              
                <p style="font-size:15px" align="right" class="big"> <a href="newsmore.php">more&gt&gt;</a></p>

             <div><img src="img/lanmu2.png" width="970px" style="margin:0px 0px 0px 0px;" /><div>
			 <div style="width:970px; margin-top:0px; margin-left:0px; float:left; background-color:#fff;">
				
				<img src="img/liucheng.jpg" width="400px" title="微电影拍摄流程图" style="border:1px solid #999;margin:20px; float:left"/>
                <div style="width:200px;  margin-top:40px; margin-left:50px;float:left;"> 
                 <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where college_type_id=1 limit 5";
			$result=mysql_query($sql);		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="tutorialsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?>
                </div>
                 <div style="width:210px;  margin-top:40px; margin-left:50px;float:left;"> 
                 <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where college_type_id=1 limit 5,5";
			$result=mysql_query($sql);		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="tutorialsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?>
                </div>
                <div style="clear:both;"></div>
                <p style="font-size:16px" align="right" class="big"> <a href="tutorialsmore.php">more&gt&gt;</a></p>
				<!--<div style="width:250px; margin-left:45px; float:left">
					<a href="http://jingyan.baidu.com/article/d621e8daeccc232865913f90.html"><p style="font-size:14px" align="left" class="big">&nbsp;&nbsp;微电影拍摄实记</p></a>
					<p style="font-size:14px" align="left" class="big"><a>《花盆》创意动画微电影</a></p>
                   
					<p style="font-size:14px" align="left" class="big"><a>《未来的生命形式》</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《东京城市交响曲》</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《绿洲终点站》</a></p>
					<p style="font-size:14px" align="right"><a>more&gt&gt;</a></p>
				</div>-->
			</div></div></div>
              <div><img src="img/lanmu3.png" width="970px" style="margin:0px 0px 0px 0px;" /><div>
			  <div style="width:970px; margin-top:0px; margin-left:0px; float:left;background-color:#fff;clear:both;">
                  <div style="width:40px; margin-top:5px; margin-left:10px; float:left;clear:both;">
                      <a href="videomore.php">
                    <img src="img/shijuesucai.png" width="40px" style="margin:auto" />
                    </a></div>
				
                
                     <!--<a href="videoDetail.php?id=13"></a>
                    <div class="photo" style="width:200px;float:left;"><a href="videoDetail.php?id=13">
                    <img src="../data-storage/video/poster/h/7.jpg" width="200px" height="120px" style="margin:15px auto auto 20px" /><span style="margin-left:20px">催泪微电影《爱的画工》</span></a></div>

				
                <a href="videoDetail.php?id=1"></a>
                 <div class="photo" style="width:200px;float:left;"><a href="videoDetail.php?id=1">
                    <img src="../data-storage/video/poster/h/1.jpg" width="200px" height="120px" style="margin:15px auto auto 30px" alt=""/><span style="margin-left:30px">如何面对《27岁》</span></a></div>

                
                <a href="videoDetail.php?id=12"></a>
                  <div class="photo" style="width:200px;float:left;"><a href="videoDetail.php?id=12">
                    <img src="../data-storage/video/poster/h/6.jpg" width="200px" height="120px" style="margin:15px auto auto 40px" alt=""/><span style="margin-left:40px">小故事《阿根达斯》</span></a></div>
               
                <a href="videoDetail.php?id=15"></a>
                <div class="photo" style="width:200px;float:left;"><a href="videoDetail.php?id=15">
                    <img src="../data-storage/video/poster/h/9.jpg" width="200px" height="120px" style="margin:15px auto auto 50px" alt=""/><span style="margin-left:50px">温情爱情《爱情的样子》</span></a></div>-->
                <?php
		     include "lib/connect.php";
          $sql = "SELECT * from `material` where `material_type_id`=1 limit 4";
  //$sql = "SELECT * FROM `video`";
          $result = mysql_query($sql);
          $nums = mysql_num_rows($result); 
			while($row=mysql_fetch_array($result)){
			//$title = mb_substr($row['title'],0,18,'utf-8')."...";
             echo <<<TXTE

		    <a href="videoDetail.php?id={$row['id']}"></a>
                    <div class="photo" style="width:200px;float:left;margin-right:10px"><a href="videoDetail.php?id={$row['id']}">

                    <img src="{$row['photo_url']}" width="200px" height="120px" style="margin:15px auto auto 20px" /><span style="margin-left:20px">{$row['title']}</span></a></div>		
TXTE;
			}
             ?>
</br/>
<div style="width:970px; margin-top:0px; margin-left:0px; float:left;background-color:#fff;clear:both;">
         <div style="width:40px; margin-top:5px; margin-left:10px; float:left;clear:both;">
                      <a href="musicmore.php">
                    <img src="img/yuanchuangpeiyue.png" width="40px" style="margin:auto" />
                    </a></div>
				
                <?php
		     include "lib/connect.php";
          $sql = "SELECT * from `material` where `material_type_id`=2 limit 4";
  //$sql = "SELECT * FROM `video`";
          $result = mysql_query($sql);
          $nums = mysql_num_rows($result); 
			while($row=mysql_fetch_array($result)){
			//$title = mb_substr($row['title'],0,18,'utf-8')."...";
             echo <<<TXTE
		    <a href="musicdetail.php?id={$row['id']}"></a>
                    <div class="photo" style="width:200px;float:left;margin-right:10px"><a href="musicdetail.php?id={$row['id']}">
                    <img src="{$row['photo_url']}" width="200px" height="120px" style="margin:15px auto auto 20px" /><span style="margin-left:20px">{$row['title']}</span></a></div>		
TXTE;
			}
             ?>
		
                
				<div style="margin-top:150px;float:right">
					<p style="font-size:16px" align="right"><a href="videomore.php">more&gt&gt;</a></p>
				</div>
			</div>
              <div><img src="img/lanmu4.png" width="970px" style="margin:0px 0px 0px 0px;" /><a href="#"></a><div>
			  <div style="width:970px; margin-top:0px; margin-left:0px; float:left;background-color:#fff;clear:both;">
				<!--<img src="img/4.jpg" width="100px" style="margin:5px auto auto 10px; float:left"  />
				<div style="width:250px; margin-left:40px; float:left">
					<p style="font-size:14px" align="left">《致河流》经典剧本演绎</p>
					<p style="font-size:14px" align="left">《花盆》创意动画微电影</p>
					<p style="font-size:14px" align="left">《未来的生命形式》</p>
					<p style="font-size:14px" align="left">《东京城市交响曲》</p>
					<p style="font-size:14px" align="left">《绿洲终点站》</p>
					<p style="font-size:14px" align="right">more&gt&gt;</p>
               
				</div>-->
                <?php
  date_default_timezone_set('PRC'); 
  $page_num =4;//每页记录数为12
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
	switch($result_row['photo_type_id'])
                         {
			  case 1:
                            $Type= "新锐导演";
                            break;
                          case 2:
                            $Type= "演员";
                            break;
                         case 3:
                            $Type= "名导师";
                            break;
						case 4:
                            $Type= "制作人";
                            break;
                         default:
                         }
    echo <<<TB
        <div style="margin-left:48px;" class="video1">
	  <a href="teachersdetail.php?id={$result_row['id']}" class="font-hui14cu"/>
          <img width="180px" height="250px" src="../../chinavec_campus{$result_row['photo_url']}">
          </img>
	  
          
		  <span style="margin:auto;font-size:16px;" name="svideo"; value="{$result_row['id']}">{$result_row['name']} 
		  <span style="margin:auto;font-size:16px;float:right;" name="svideo"; float="right"; value="{$result_row['id']}" /> $Type<br/>
			</span>
        </div>
TB;
        }
      ?>
                <div class="section" style="margin-left:30px;">
	            <div class="aside"></div>
	            <div class="aside"></div>
	            <div class="aside"></div>
	            <div class="aside"></div>		
                </div>
			</div>
		</div>
        <!--end of right-->
		<div style="clear:both"></div><br/>
        <p style="font-size:16px" align="right" class="big"> <a href="teachersmore.php">more&gt&gt;</a></p>

	</div></div></div></div></div></div></div>
    <div style="clear:both"></div>

    </div>
	<!--end of center-->
	
	
	<!--logo-->
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

</div>

<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>-->
    <script type="text/javascript" src="js/jquery.nivo.slider.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>



</body>
	    
</html>
