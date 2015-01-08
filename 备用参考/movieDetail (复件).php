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
		include "common/checkLog.php";
		include "config/config.php";
//*************以下为静态化页面代码********************
	$file = "static/movie/movieDetail_{$id}_{$typeId}.html";
	if(file_exists($file) && time() - filemtime($file) < 600){
		header("Location: static/movie/movieDetail_{$id}_{$typeId}.html");
		exit();
	}
	ob_start();
//**************************************************
?>

<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>微院线播放</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<!--<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> <!--delete by ligang>-->
<link rel="stylesheet" type="text/css" href="<?php echo $config['root']; ?>css/base.css" />
<link rel="stylesheet" type="text/css" href="<?php echo $config['root']; ?>css/movieDetail.css" />

<!--add by ligang-->
<link rel="stylesheet" type="text/css" href="<?php echo $config['root']; ?>css/jplayer.blue.monday.css" />	
<script src="<?php echo $config['root']; ?>js/jquery.min.js" type="text/javascript"></script>
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
</script>
<style type="text/css">
body {
	text-align:center;
	background:#333 repeat 0px 1px;
}
</style>

<body>
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
		//print_r($row);
	?>

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
	   <div style="margin:0 auto; text-align:center; width:100%">	
			
				<div class="jp-video jp-video-270p" style="margin:0 auto;padding-top:60px;padding-bottom:10px">
					<div class="jp-type-single">
						<div id="jquery_jplayer_2" class="jp-jplayer"></div> <!--播放器主界面-->
						<!--播放器操作界面-->
						<div id="jp_interface_2" class="jp-interface"> 
							<div class="jp-video-play"></div> <!--中心播放图标-->
							<ul class="jp-controls">
								<li><a href="#" class="jp-play" tabindex="1">play</a></li>
								<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
								<li><a href="#" class="jp-stop" tabindex="1">stop</a></li>
								<li><a href="#" class="jp-mute" tabindex="1">mute</a></li> <!--喇叭图标-->
								<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
							</ul>
							<div class="jp-progress">
								<div class="jp-seek-bar"> <!--进度条-->
									<div class="jp-play-bar"></div>
								</div>
							</div>
							<div class="jp-volume-bar"> <!--音量条-->
								<div class="jp-volume-bar-value"></div>
							</div>
							<div class="jp-current-time"></div>
							<div class="jp-duration"></div>
						</div>
						<!--播放器操作界面 end-->
						<!--播放器显示界面
						<div id="jp_playlist_2" class="jp-playlist" style="visibility:hidden;">
							<p>
								<span id="videoUrl" ><?php //echo $videoUrl;?></span>
							</p>
						</div>
						播放器显示界面 end-->
					</div>
				</div>
			</div>
		<!--end jplayer div-->
</div> 
<a href="<?php echo $config['root']; ?>order.php?id=<?php echo $id; ?>&name=<?php echo $row->title_cn; ?> "><button class="xuanze">选择该视频</button></a>
<br/><span id="videoUrl"  style="visibility:hidden;"><?php echo $videoUrl;?></span>

<!--movieDetail Start-->        
	<?php 
		$sec = $row->dur;
		$min = sec2time($sec);
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
               <div style="width:300px; float:left; margin-left:100px;">
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
                <div class="p_half1">
                <?php 
                    $sec = $row->dur;
                    $min = sec2time($sec);
                ?>
                    <span class='gray14'>时长：</span>	
                    <span class='black14'><?php echo $min;?></span><br/>
                </div>
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
					$sql_rank = "SELECT * FROM video  LEFT JOIN video_view_statistics 
									ON video.id = video_view_statistics.video_id
									ORDER BY video_view_statistics.view_total DESC
									limit 0,10";
					$result_rank = mysql_query($sql_rank);
					
					$num = 0;
					while ($row_rank = mysql_fetch_array($result_rank)) {
						$num = $num +1;
						//print_r($row_rank);
					?>
                            <tr style="border-bottom:1px dashed #ddd; line-height:30px;" onmouseover="style.backgroundColor='#F0FAD9'" onmouseout="style.backgroundColor='#FFFFFF'">
                                <td class="rankNum" width="10px"><?php echo $num;?></td>
                                <td class="black12" style="font-family:微软雅黑; padding-left:15px;" width="190px"><a href="<?php echo $config['root']; ?>movieDetail.php?id=<?php echo $row_rank['video_id'];?>&typeId=<?php echo $row_rank['type_id'];?>"><?php echo $row_rank['title_cn'];?></a></td>
                                <td class="gray12" width="100px" align="center"><?php echo $row_rank['director'];?></td>
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
<?php
	
	require('common/footer.php');
//***********静态化页面底部代码******************
	$out = ob_get_contents();
	ob_end_clean();
	echo $out;

	
	$fp = fopen("static/movie/movieDetail_{$id}_{$typeId}.html","w");  
	if($fp){ 
		fwrite($fp,$out);  
		fclose($fp);  
	}
//**********************************************

?>
