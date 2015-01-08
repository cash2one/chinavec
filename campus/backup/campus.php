<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<!--<script type="text/javascript" src="js/campus.js"></script>-->
	<link rel="stylesheet" type="text/css" href="css/campus.css" />	
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
   <!-- <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />-->

    
</head>
<body>

    


	<div id="header" style="width:900px;margin:0 auto;">
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

	<!--
	 <table align="center" bgcolor="#000000" width="970" height="55" style="text-decoration:#FFF; text-align:center; border-radius: 5px;">
      <tr >
			<td><a href="">资讯|</a>
           </td>           
             <td><a href="">剧本|</a>            
           </td>           
             <td><a href="">媒体素材|</a>            
           </td>           
             <td><a href="">微剧场|</a>            
           </td>
             <td><a href="">微电影学院|</a>            
           </td>
             <td><a href="">投资合作|</a>            
           </td>
             <td><a href="index.php">返回首页|</a>
     </tr>
   </table>-->
<!--banner-->
<!--导航栏-->
     
	<?php 
		include "common/table.php";
		
	?>
	<!--end of 导航栏-->
	<div style="width:960px;margin:0 auto; clear:both;">
		
   <!-- <img src="img/xueyuan22.jpg" width="960px"/>-->
    
	<div id="wrapper">
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="img/xueyuan22.jpg" data-thumb="img/xueyuan22.jpg" alt="" title="This is micro movie campus"/>
                <img src="img/xueyuan111.jpg" data-thumb="img/xueyuan111.jpg" alt="" title="" />
                <img src="img/movie.jpg" data-thumb="img/movie.jpgs" alt="" data-transition="slideInLeft"   title="" />
               <!-- <img src="images/nemo.jpg" data-thumb="images/nemo.jpg" alt="" title="#htmlcaption" />-->
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
                <strong>Զ</strong>
            </div>
        </div>
    </div>

	</div>
	<!--center-->
	<!--<div class="change" style=" width:100%;height:auto; margin:0 auto; clear:both;">-->
		<!--right-->
        <div><img src="img/lan1.png" width="970px" style="margin:-5px 0px 0px 0px;" /><div>
            <div style="width:970px; margin-top:-10px; margin-left:0px; float:left;background-color:#fff;">
            <div><a href="http://www.197c.com/dianying-283851-1-1.html">
				<img src="img/laopo.jpg" width="300px" style="margin:20px 10px 0px 20px; float:left"  title="陈思成送给佟丽娅的自导自演微电影《老婆》"/></a>
                </div>
               <div  style="margin-top:225px; margin-left:-315px; float:left">
                    <p style="font-size:17px" align="left"> <a href="http://www.197c.com/forum.php?mod=viewthread&tid=283851&highlight=老婆" target="_blank">陈思成送佟丽娅的自导自演微电影《老婆》</a></p><br/>
                 <div style="height:100px;  width:310px; margin-top:13px; "> <p style="font-size:15px" align="left" class="ex">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;真爱是一种从内心发出的关心和照顾，没有华丽的言语，没有哗众取宠的行动， 只有在点点滴滴一言一行中你能感受到。 </p></div>
                   
              </div>
            <div style="width:300px;margin-top:10px; margin-left:30px;float:left;">  
            <div style="width:300px; margin:auto;">
                <p style="font-size:25px" class="ex"><a href="newsmore.php">今日焦点 &gt&gt;</a></p><br/>
                </div> 
                <HR style="border:1 dashed #5b5b5b" width="90%" color=#5b5b5b SIZE=1>
            <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where `college_type_id`=3";
			$result=mysql_query($sql);		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="newsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?>
             </div>
               <div style="float:left;width:280px; margin:auto; background-color:#fff;">
                    <a href="http://www.197c.com/dianying-163776-1-1.html"></a>
				<img src="img/jiechuan.jpg" width="120px" style="margin:25px auto auto 10px; float:left"  title="人生需要揭穿 超级奶爸王岳伦首部网络剧"/>             
                    <a href="http://www.197c.com/dianying-234306-1-1.html"></a>
                <img src="img/shuoxiangsheng.jpg" width="120px" style="margin:25px auto auto 20px; float:left" title="2014盲童励志微电影《今天 我们来说相声》 三兄弟学艺报恩"/>

                    <a href="http://www.197c.com/dianying-283742-1-1.html"></a>
                <img src="img/zhuimengderizi.jpg" width="120px" style="margin:25px auto auto 10px; float:left" title="大学生活 大学新兵顶撞班长"/>
                    <a href="http://www.197c.com/dianying-283850-1-1.html"></a>
                <img src="img/hongwu.jpg" width="120px" style="margin:25px auto auto 20px; float:left"  title="雾霾催生的科幻微电影《红雾》"/>
                    <a href="http://www.197c.com/dianying-234306-1-1.html"></a>
                 <img src="img/shuoxiangsheng.jpg" width="120px" style="margin:25px auto auto 10px; float:left" title="2014盲童励志微电影《今天 我们来说相声》 三兄弟学艺报恩"/>

                    <a href="http://www.197c.com/dianying-283742-1-1.html"></a>
                <img src="img/zhuimengderizi.jpg" width="120px" style="margin:25px auto auto 20px; float:left" title="大学生活 大学新兵顶撞班长"/>
                </div>
                <div style="clear:both;"></div>
                
              
                <p style="font-size:15px" align="right" class="big"> <a href="newsmore.php">more&gt&gt;</a></p>
				<!--<div><a href="http://www.197c.com/dianying-283851-1-1.html">
				<img src="img/laopo.jpg" width="350px" style="margin:20px 0px 0px 20px; float:left"  title="陈思成送给佟丽娅的自导自演微电影《老婆》" /></a>
				</div>
                				<div style="width:250px; margin-top:20px; margin-left:40px; float:left">
					<p style="font-size:25px" align="left" class="ex"><a>今日焦点 &gt&gt;</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《花盆》创意动画微电影</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《未来的生命形式》</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《东京城市交响曲》</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《绿洲终点站》</a></p>
                    <p style="font-size:14px" align="left" class="big"><a>《未来的生命形式》</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《东京城市交响曲》</></p>
					
				</div>
               
			     
                  <div style="width:290px; margin-top:10px; margin-left:0px; float:left;background-color:#fff;">
                    <a href="http://www.197c.com/dianying-163776-1-1.html"></a>
				<img src="img/jiechuan.jpg" width="120px" style="margin:30px auto auto 0px; float:left"  title="人生需要揭穿 超级奶爸王岳伦首部网络剧"/>             
                    <a href="http://www.197c.com/dianying-234306-1-1.html"></a>
                <img src="img/shuoxiangsheng.jpg" width="120px" style="margin:30px auto auto 20px; float:left" title="2014盲童励志微电影《今天 我们来说相声》 三兄弟学艺报恩"/>
                    <a href="http://www.197c.com/dianying-283742-1-1.html"></a>
                <img src="img/zhuimengderizi.jpg" width="120px" style="margin:30px auto auto 0px; float:left" title="大学生活 大学新兵顶撞班长"/>
                    <a href="http://www.197c.com/dianying-283850-1-1.html"></a>
                <img src="img/hongwu.jpg" width="120px" style="margin:30px auto auto 20px; float:left"  title="雾霾催生的科幻微电影《红雾》"/>
                </div>
                    <div>
                    <p style="font-size:14px" align="left" class="big"><a>《未来的生命形式》</a></p>
					<p style="font-size:14px" align="left" class="big"><a>《东京城市交响曲》</a></p>
                    <p style="font-size:14px" align="right" class="big"><a>more&gt&gt;</a></p>
                    </div>
               </div> -->
             <div><img src="img/lanmu2.png" width="970px" style="margin:0px 0px 0px 0px;" /><div>
			 <div style="width:970px; margin-top:0px; margin-left:0px; float:left; background-color:#fff;">
				
				<img src="img/liucheng.jpg" width="400px" title="微电影拍摄流程图" style="border:1px solid #999;margin:20px; float:left"/>
                <div style="width:200px;  margin-top:40px; margin-left:50px;float:left;"> 
                 <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where college_type_id=1 ";
			$result=mysql_query($sql);		
			while($row=mysql_fetch_array($result)){
             echo <<<TXTE
			 				
					<p style="font-size:16px;" class="big"><a href="tutorialsdetail.php?id={$row['id']}">{$row['title']}</a></p>
TXTE;
			}
             ?>
                </div>
                 <div style="width:200px;  margin-top:40px; margin-left:50px;float:left;"> 
                 <?php
            include "lib/connect.php";
			$sql="SELECT * FROM  `college` where college_type_id=1 ";
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
				
                
                     
                    <div class="photo"><a href="http://www.197c.com/dianying-163776-1-1.html">
                    <img src="img/xiwangshu.jpg" width="200px" style="margin:15px auto auto 55px" /><span style="margin-left:55px">催泪微电影《希望树》</span></a></div>

				
                <a href="http://www.197c.com/dianying-234306-1-1.html"></a>
                 <div class="photo"><a href="#">
                    <img src="img/yingbi.jpg" width="200px" style="margin:15px auto auto 275px" alt=""/><span style="margin-left:275px">陌生人的温暖《硬币》</span></a></div>

                
                <a href="http://www.197c.com/dianying-283782-1-1.html"></a>
                  <div class="photo"><a href="#">
                    <img src="img/babahuijia.jpg" width="200px" style="margin:15px auto auto 495px" alt=""/><span style="margin-left:495px">感人亲情《爸爸回家》</span></a></div>
               
                <a href="http://www.197c.com/dianying-283815-1-1.html"></a>
                <div class="photo"><a href="#">
                    <img src="img/baaisongjintiantang.jpg" width="200px" style="margin:15px auto auto 715px" alt=""/><span style="margin-left:715px">温情世界《把爱送进天堂》</span></a></div>
                
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
    echo <<<TB
        <div style="margin-left:48px;" class="video1">
	  <a href="teachersdetail.php?id={$result_row['id']}" class="font-hui14cu"/>
          <img width="180px" height="250px" src="../../chinavec_cd/campusadmin{$result_row['photo_url']}">
          </img>
	  
          <span style="margin:auto;font-size:16px;" name="svideo" value="{$result_row['id']}" />姓名：{$result_row['name']}<br/>
		  <span style="margin:auto;font-size:16px;" name="svideo" value="{$result_row['id']}" />简介：{$result_row['abstract']}<br/>
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

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/jquery-1.9.0.min.js"></script>
    <script type="text/javascript" src="js/jquery.nivo.slider.js" charset="utf-8"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>



</body>
	    
</html>
