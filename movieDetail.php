<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit" />
<title>微视频采购</title>
<?php 
		session_start();
		$id = $_GET['id'];
		$typeId = $_GET['typeId'];
		//检查该页面是否已合法获取视频ID及ID是否为数值型
		if (!(isset($_GET['id']) && ctype_digit($_GET['id']))) {
			header("Location:movie.php?msg=invalid");
			exit;
		}
header("Content-Type:text/html;charset=UTF-8");
		require "lib/connect.php";
		include "config/config.php";
	//<!--登录-->
	if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
	{
		include "login.php"; 
		//include "siteview.php";
	}else{
		include "LoginSuccess.php";
		//include "userview.php";
	};

	//<!--登录-->
//*************以下为静态化页面代码********************
	//$file = "static/movie/movieDetail_{$id}_{$typeId}.html";
	//if(file_exists($file) && time() - filemtime($file) < 600){
	//	header("Location: static/movie/movieDetail_{$id}_{$typeId}.html");
	//	exit();
	//}
	//ob_start();
//**************************************************
?>


<!--访问量统计-->
<?php
        require('./lib/http_client.class.php');
	require('./lib/db.class.php');
	require('./lib/log.php');
	
	//统计网站访问数据
	//实例化数据库操作类
	$db = new DB();
	//统计不重复IP
	//$sql = "select count(distinct(`user_ip`)) from `site_visit_record`";
	//调用数据库操作类中count函数实行对数据库中数据计数操作
	//$visitData = $db->count($sql, $sqlOracle='');
	
	//统计数据存入数据库
	//获取当前时间
	$s_time = time();
	$strtime = date('Y-m-d');
	//将时间变量分割年月日
	$timearray = explode("-",$strtime);
	$year = $timearray[0];
	$month = $timearray[1];
	$day = $timearray[2];
	//设置所需要存储的参数
	$row = array('video_id' => $id, 'type_id' => $typeId, 'year' => $year, 'month' => $month, 'day' => $day, 's_time' => $s_time);
	//调用数据库操作类中的insert函数，成功返回"OK"信息，失败返回"ERROR"信息
	if($db->insert('video_view_statistics', $row)){
		//echo 'OK';
	}else{
		//echo 'ERROR';
	}
 ?>
<!--访问量统计结束-->
<?php date_default_timezone_set("Asia/Shanghai");?>
<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> <!--delete by ligang>-->
<link rel="stylesheet" type="text/css" href="<?php echo $config['root']; ?>css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['root']; ?>css/movieDetail.css" />

<!--add by ligang-->
<link rel="stylesheet" type="text/css" href="<?php echo $config['root']; ?>css/jplayer.blue.monday.css" />	
<!--<script src="<?php echo $config['root']; ?>js/jquery.min.js" type="text/javascript"></script>
<!--<script src="js/html5media.min.js"></script>-->
<script src="<?php echo $config['root']; ?>js/jquery.jplayer.min.js" type="text/javascript"></script>
<script src="<?php echo $config['root']; ?>js/jplayer.js"  type="text/javascript"></script>
<!--add  end-->
</head>
<script type="text/javascript">
	$(document).ready(function(){
	
		$('#jp_video_0').bind('contextmenu',function() { 
						return false; 
			}); 
		
	});
	$(document).ready(function(){
	$("#shadow").css("height", $(document).height()).hide();
	$(".lightSwitcher").click(function(){
	$("#shadow").toggle();
	if ($("#shadow").is(":hidden"))
	$(this).html("关灯").removeClass("turnedOff");
	else
	$(this).html("开灯").addClass("turnedOff");
	});
	$(".jp-full-screen").click(function(){
		$(".closelight").css("display","none");
		});
	$(".jp-restore-screen").click(function(){
		$(".closelight").css("display","block");
		});
	});

</script>

<style type="text/css">
body {
	text-align:center;
	background:#333 repeat 0px 1px;
}
#jpmovie{
z-index:1000;
position:relative;
}
.lightSwitcher, .turnedOff {
position:absolute;
z-index:1002;
background:url(./img/light_bulb.png) no-repeat 0 0;
padding:0;
text-indent:20px;
outline:none;
text-decoration:none;
zoom:1;
}
.lightSwitcher:hover {
text-decoration:underline;
}
#shadow {
background:#000;
position:absolute;
left:0;
top:0;
width:100%;
z-index:100;
opacity:0.80;
filter: alpha(opacity = 80);
zoom:1;
}
.turnedOff {
color:#ff0;
background-position:0 -50px;
}
</style>

<body>
<?php		include "common/checkLog.php";?>
<?php 
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
			
		$sql="select * from video WHERE `id` = $id";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$shelf=$row->is_on_shelf;
		//print_r($row);
		if (isset($_SESSION['user_name'])) {
           	 $username = $_SESSION['user_name'];
		 $sqlm="select * from user WHERE `name` = '$username'";
		 $resultm=mysql_query($sqlm);
		 $rowm=mysql_fetch_array($resultm);
		 $right=$rowm['user_role_id'];
        		}else{
	         $right='-1';
		}
	?>

<br/><br/>
<div id="layout">
<?php include "common/table1.php";?>
    	<div id="movieTitle">
			<div style="float:left;">
            <p style="color:#FFFFFF; font-size:15px;"><?php echo $row->title_cn;?>
            &nbsp;&nbsp;<span style="color:#AAAAAA;font-size:12px;"><?php echo $row->title_en;?></span></p>
            <span style="color:#AAAAAA;font-size:12px;">ChinaVEC首页 >微院线&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $row->tags;?></span>
            </div>
           
            </div>
            <div style="float:right;">
            <form action="searchList.php" method="get">
                <input type="text" name="keyWord" placeholder="输入名称查询"  class="searchBlock"/>
                <input type="submit" value="搜索" class="searchButton"/>
            </form>
            </div>
        </div>
		<?php 
						/*是否存在id.jpg的文件
						若存在$poster = $row['id'].".jpg"
						否则 $poster = 0.jpg*/
						$file = $config['videoRoot'].$config['video'].$row->id.".mp4";
						$videoUrl = $file;
						$picture= $config['root'].$config['posterH'].$row->id.".jpg";
						$pictureUrl = $picture;
						//echo $row->video_url;
						//echo $file;
						//exit;
						/*if(file_exists($file)){
							$videoUrl = $file;
							//echo $videoUrl."存在";
							//exit;
						}
						else{
							$videoUrl = $config['videoRoot'].$config['video']."0.mp4";
							//echo $videoUrl;
							//exit;
							}*/
		?>
		<!--jplayer div-->       
	   <!--<div style="margin:0 auto; text-align:center; width:100%">-->
		<p class="closelight">	
			<a class="lightSwitcher" href="#" style="font-size:15px;margin-top:40px;margin-left\0:180px;color:#ffffff">关灯</a>
		</p>
<!--
				<div class="jp-video jp-video-270p" style="margin:0 auto;padding-top:60px;padding-bottom:10px">
					<div class="jp-type-single" id="jpmovie">
						<div id="jquery_jplayer_2" class="jp-jplayer"></div> <!--播放器主界面
						<!--播放器操作界面
						<div id="jp_interface_2" class="jp-interface"> 
							<div class="jp-video-play"></div> <!--中心播放图标
							<div class="jp-video-preload" style="z-index:999;display:none;"><!--<img src="img/loading1.gif" width="30px" height="30px"/></div> <!--yujiazai
							<ul class="jp-controls">
								<li><a href="#" class="jp-play" tabindex="1">play</a></li>
								<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
								<li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
								<li><a href="#" class="jp-mute" tabindex="1">mute</a></li> <!--喇叭图标
								<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
							</ul>
							<div class="jp-progress">
								<div class="jp-seek-bar"> <!--进度条
									<div class="jp-play-bar"></div>
								</div>
							</div>
							<div class="jp-volume-bar"> <!--音量条
								<div class="jp-volume-bar-value"></div>
							</div>
							<div class="jp-current-time" style="text-align:left"></div>
							<div class="jp-duration"></div>
						</div>
						<!--播放器操作界面 end-->
						<!--播放器显示界面
						<div id="jp_playlist_2" class="jp-playlist" style="visibility:hidden;">
							<p>
								<span id="videoUrl" ><?php //echo $videoUrl;?></span>
							</p>
						</div>
						播放器显示界面 end
					</div>
					本视频为亚播出级新媒体视频，仅适合各类新媒体投放渠道
					本视频为下线视频
				</div>
			</div>
		<!--end jplayer div-->
	<div id="jp_container_1" class="jp-video " style="width:960px;background:transparent;border:0px;margin:0 auto;padding-top:60px;padding-bottom:10px;back">
    <div class="jp-type-single" id="jpmovie">
      <div id="jquery_jplayer_1" class="jp-jplayer" style="border: 0px;"></div>
      <div class="jp-gui" style="border: 0px; border-color:#cccccc;">
        <div class="jp-video-play" style="margin:-420px auto 150px auto;position:relative;">
          <a href="javascript:;" class="jp-video-play-icon" tabindex="1" style="position:absolute;left:50%;">play</a>
        </div>
	<!--
	<div class="jp-video-play jp-video-preload" style="margin:-420px auto 150px auto;position:relative;display:none;">
          <a href="javascript:;" class="jp-video-preload-icon" tabindex="1" style="position:absolute;left:50%;display:none;">play</a>
        </div>
	-->
	<div class="jp-video-preload" style="z-index:999;display:none;width:50px;height:50px;"></div>
        <div class="jp-interface" style="border-color:#cccccc;height:60px;">
          <div class="jp-progress">
            <div class="jp-seek-bar">
              <div class="jp-play-bar"></div>
            </div>
          </div>
          <div class="jp-current-time"></div>
          <div class="jp-duration"></div>
          <div class="jp-controls-holder" style="top:-14px;">
            <ul class="jp-controls">
              <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
              <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>
              <li><a href="javascript:;" class="jp-stop" tabindex="1">stop</a></li>
              <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
              <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
              <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
            </ul>
            <div class="jp-volume-bar">
              <div class="jp-volume-bar-value"></div>
            </div>
            <ul class="jp-toggles">
              <li><a href="javascript:;" class="jp-full-screen" tabindex="1" title="full screen">full screen</a></li>
              <li><a href="javascript:;" class="jp-restore-screen" tabindex="1" title="restore screen">restore screen</a></li>
              <li><a href="javascript:;" class="jp-repeat" tabindex="1" title="repeat">repeat</a></li>
              <li><a href="javascript:;" class="jp-repeat-off" tabindex="1" title="repeat off">repeat off</a></li>
            </ul>
          </div>
          <!--
          <div class="jp-details">
            <ul>
              <li><span class="jp-title"></span></li>
            </ul>
          </div>
          -->
        </div>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>


</div> 
<a href="<?php echo $config['root']; ?>order.php?id=<?php echo $id; ?>&name=<?php echo $row->title_cn; ?> "><button class="xuanze">选择该视频</button></a>
<br/><span id="videoUrl"  style="visibility:hidden;"><?php echo $videoUrl;?></span>
<span id="pictureUrl"  style="visibility:hidden;"><?php echo $pictureUrl;?></span>

<!--movieDetail Start-->        
	<?php 
		$sec = $row->dur;
		$min = sec2time($sec);
	?>
	<?php
	if($shelf==1){
		echo "<div class='shelfmedia' style='color:#fff;font-size:16px'>注意：本视频为亚播出级新媒体视频，仅适合各类新媒体投放渠道</div>";
		}else if($shelf==0){
		echo "<div class='shelfmedia' style='color:#fff;font-size:16px'>注意：本视频为下线视频，仅供内部参考</div>";
		}
	?>
    <div class="movieDetail"> 
    	<br/>
		<div class="movieDetail2">
            <div style="width:600px;margin:25px 10px 0px 30px;float:left;">
                <br/>
                <p class="jieshaoT">视频信息</p>
                <br/><br/>
                <!--<p>名称：<span><?php echo $row->title_cn;?></span></p>
                <p>制片人：<span><?php echo $row->producer;?></span></p>
                <p>导演：<span><?php echo $row->director;?></span></p>
                <p>演员：<span><?php echo $row->stars;?></span></p>
                <p>片长：<span><?php echo $min;?></span></p>
                <p>标签：<span><?php echo $row->tags;?></span></p>
                <br/><br/>
                <p>简介：<span class="greySmall"><?php echo $row->dscrp;?></span></p>-->
                <div style="float:left;">
                    <?php 
						/*是否存在id.jpg的文件
						若存在$poster = $row['id'].".jpg"
						否则 $poster = 0.jpg*/
						$file = $config['posterH'].$row->id.".jpg";
						if(file_exists($file)){
							$poster = $row->id.".jpg";
							//echo $poster;
							//exit;
						}
						else{
							$poster = "0.jpg";
							//echo $poster;
							//exit;
							}
					?>
                <img src="<?php echo $config['root'].$config['posterH'];echo $poster;?>" width="170px" height="110px" float="left"/>
                </div>
               <div style="width:215px; float:left; margin-left:28px;margin-top:-5px;">
               <div class="p_half1">
                    <span class='gray14'>导演：</span>
                    <span class='black14'><?php echo $row->director;?></span>
               </div>
                <div class="p_half1">
                    <span class='gray14'>主演：</span>
                    <span class='black14'><?php echo $row->stars;?></span><br/>

                </div>
                <div class="p_half1">
                    <span class='gray14'>标签：</span>	
                    <span class='black14'><?php 
                        $tags = $row->tags;
                        $array = explode('；',$tags);
                        //print_r($array);
                        foreach((array)$array as $key => $tag){
                            echo "<a href='".$config['root']."searchTagList.php?tag=".$tag."'>".$tag."</a>";
                            echo " ";
                        }
                    ?></span><br/>
                </div>
                <div class="p_half1">
                    <span class='gray14'>制片人：</span>	
                    <span class='black14'><?php echo $row->producer;?></span><br/>
                </div>
                <div class="p_half1">
                    <span class='gray14'>年份：</span>	
                    <span class='black14'><?php echo $row->year;?></span><br/>
                </div>
		
                </div>
		<div style="width:180px; float:left;margin-top:-5px;">
                <div class="p_half1">
                <?php 
                    $sec = $row->dur;

                    $min = sec2time($sec);
                ?>
                    <span class='gray14'>时长：</span>	
                    <span class='black14'><?php echo $min;?></span><br/>
                </div>
		<?php
		if($_SESSION['user_name']){
		$sqlm="SELECT * FROM `user` WHERE `name`='{$_SESSION['user_name']}'";
		$resultm=mysql_query($sqlm);
		$rowm=mysql_fetch_array($resultm);
			if($rowm['user_role_id']==1){             
			echo "<div class='p_half1'>
	                    <span class='gray14'>联系：</span>	
	                    <span class='black14'>QQ:$row->contact_qq</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <span class='black14'>电话:$row->contact_tel</span><br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			    <span class='black14'>微信:$row->contact_wechat</span><br/>
		                </div>";
			}
		}
		?>
		</div>
                <div style=" margin-top:10px; width:500px; float:left;">   
                    <span class='gray14'>简介：</span>
                    <span class='gray14'><?php echo $row->dscrp;?></span><br/>
                </div>
                
            </div>
            
            <div style="margin:25px 0px 0px 0px;float:left; width:300px;">
            	<br/>
                <p class="jieshaoT">本周采购榜</p><br/><br/>
                <table width='300px' style='float:left;	border-collapse:collapse;'>
                <?php 
					/*$sql_rank = "SELECT * FROM video  LEFT JOIN video_view_statistics 
									ON video.id = video_view_statistics.video_id
									ORDER BY video_view_statistics.view_total DESC
									limit 0,10";*/
					$sql_rank="SELECT `authen`.`title_cn`,`authen`.`video_id`,count(`authen`.`video_id`) 
						   AS `num`,`video`.* from `authen`,`video` where `video`.`id`=`authen`.`video_id`
								group by `authen`.`video_id` ORDER BY count(`authen`.`video_id`) DESC
								limit 0,10";
					$result_rank = mysql_query($sql_rank);
					
					$num = 0;
					while ($row_rank = mysql_fetch_array($result_rank)) {
						$num = $num +1;
						if(mb_strlen($row_rank['director'],'utf8')>8){
							$director=mb_substr($row_rank['director'],0,3,'utf-8')."...";
										}else{$director=$row_rank['director'];}
						//print_r($row_rank);
					?>
                            <tr style="border-bottom:1px dashed #ddd; line-height:30px;" onmouseover="style.backgroundColor='#F0FAD9'" onmouseout="style.backgroundColor='#FFFFFF'">
                                <td class="rankNum" width="10px"><?php echo $num;?></td>
                                <td class="black12" style="font-family:微软雅黑; padding-left:15px;" width="190px"><a href="<?php echo $config['root']; ?>movieDetail.php?id=<?php echo $row_rank['video_id'];?>&typeId=<?php echo $row_rank['type_id'];?>"><?php echo $row_rank['4'];?></a></td>
                                <td class="gray12" width="100px" align="center"><?php echo $director;?></td>
                            </tr>
                            <div style="clear:both"></div>

				<?php }
				?>
                </table>
          </div>
        </div>
        
        <!--同类推荐START-->
        <div class="similar">
            <h2>您可能感兴趣的微视频</h2>
            <?php 
				//echo $task_type_id;
				//echo $row->type_id;
				$sql_similar="SELECT video.* FROM video WHERE `type_id` ={$row->type_id} ORDER BY `id` DESC LIMIT 0,5";
				//echo $sql_activity;
				$result_similar=mysql_query($sql_similar);
				while($row_similar=mysql_fetch_object($result_similar)) {
					$file_similar = $config['posterH'].$row_similar->id.".jpg";
					if(file_exists($file_similar)){
						$photo_similar = $row_similar->id.".jpg";
						//echo $poster;
						//exit;
					}
					else{
						$photo_similar = "0.jpg";
						//echo $poster;
						//exit;
						}

				?>
				<div class="similarList">
                    <a href="<?php echo $config['root']; ?>movieDetail.php?id=<?php echo $row_similar->id;?>&typeId=<?php echo $row_similar->type_id?>"><span><img src="<?php echo  $config['root'].$config['posterH'].$photo_similar;?>" width="160" height="110"/></span>
                	<p class="black14"><?php echo $row_similar->title_cn; ?></p></a>
                    <span class='gray12'><?php 
                        $tags = $row_similar->tags;
                        $array = explode('；',$tags);
                        //print_r($array);
                        foreach((array)$array as $key => $tag){
                            echo "$tag";
                            echo " ";
                        }
                    ?></span><br/>

                </div>
				<?php }
            ?>
        </div>
        <!--同类推荐END-->
    </div>

<!--movieDetail END-->       
 <div style="clear:both"></div>
 <div id="shadow"></div>
	
<script type="text/javascript">
	//上线输出
	var is_on_shelf=<?php echo $shelf;?>;
	var right=<?php echo $right; ?>
	//console.log(right);
	if(is_on_shelf==0 && right!=1){
	$("#jpmovie").css({display:"none"});
	$(".xuanze").css({display:"none"});
	//$("#jp_container_1").css({"height":"600px"});
	$("#jp_container_1").append("<img style='' src='./img/noshelf.jpg'>");
	$(".shelfmedia").css({display:"none"});
		//$("#jp_container_1").css({"display":"none"});
			
	}else if(is_on_shelf == -1){
	$("#jpmovie").css({display:"none"});
	$(".xuanze").css({display:"none"});
	//$("#jp_container_1").css({"height":"600px"});
	$("#jp_container_1").append("<img style='' src='./img/convert.jpg'>");
	$(".shelfmedia").css({display:"none"});
	}
</script>
<?php
	
	require('common/footer.php');
//***********静态化页面底部代码******************
	//$out = ob_get_contents();
	//ob_end_clean();
	//echo $out;

	
	//$fp = fopen("static/movie/movieDetail_{$id}_{$typeId}.html","w");  
	//if($fp){ 
	//	fwrite($fp,$out);  
	//	fclose($fp);  
	//}
//**********************************************

?>
