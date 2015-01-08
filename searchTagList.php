<!--
    创建时间：		2014年1月13日
    编写人：			于鉴桐
    版本号：			v1.0
    
    修改记录：		原始版本v1.0				
                    
    主要功能点：		该页面用于用户搜索视频及结果处理。
    
    全局配置变量：	
                              
            
-->
<?php
session_start();

	include "lib/connect.php";
	require('lib/util.class.php');
	require('lib/db.class.php');//数据库操作类
	require('config/config.php');//系统总配置文件
	
	$db = new DB();
	$u = new Util();
	$tag = isset($_GET['tag']) ? $u->inputSecurity($_GET['tag']) : '';
	
	if($tag != ''){
		$sql = "SELECT * FROM `video` WHERE `tags` LIKE '%$tag%'";
		$result = mysql_query($sql);
		$count=mysql_num_rows($result);

		//echo '0'.$sql;
		/**搜索到标题包含关键字的内容**/
		if($count !== 0){
				//echo "1".$sql;
				$warning = '';
		}
		else{
			//echo "2".$sql;
			/**未搜索到标题包含关键字的内容**/
				$warning = '没有找到您要查询的内容!';
				$sql = "SELECT * FROM `video` GROUP  BY  title_cn ORDER BY `id` DESC ";
				$result=mysql_query($sql);
			}
	}
	else{
		//echo "3".$sql;
		/**未进行搜索时，执行以下操作**/
		$warning = '请输入您要查询的关键字！';
		$sql = "SELECT * FROM `video` GROUP  BY  title_cn ORDER BY `id` DESC ";
		$result=mysql_query($sql);
	}
	
	/**将数据库中时长的秒数转换为分钟**/
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
			
		/*准备分页工作*/	
		$count=mysql_num_rows($result);

        $Page_size=10; //每页显示的条目数
        $page_count = ceil($count/$Page_size); //总显示页数
        if($page_count<=0){$page_count=1;}
        $init=1; 
        $page_len=7;///显示的页码数
        $max_p=$page_count;
        $pages=$page_count;
        
		//判断当前页码 
        if (empty($_GET['page'])||$_GET['page']<1) { 
            $page=1; 
        } else { 
            $page=$_GET['page']; 
        } 
        $offset=$Page_size*($page-1); 

		$sql = $sql."limit $offset,$Page_size";
		$result=mysql_query($sql);
		//echo $sql;
		//print_r($result);

?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>标签检索</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/searchList.css" />
</head>

<style type="text/css">
body {
	text-align:center;
	background:#333 repeat 0px 1px;
}
</style>

<body>
	<?php require "common/checkLog.php";?>
    <div id="layout">
		<?php 
            include "common/table1.php"; //索引标题栏
        ?>   
	<div>
      
    <div style=" width:400px; height:80px; margin:0 auto; clear:both;border-radius: 2px;" class="search">
        <br/>
        <form action="searchTagList.php" method="get">
            <input type="text"  name="tag" placeholder="<?php echo $tag;?>"  value="<?php echo $tag;?>" class="searchBlock"/>
            <input type="submit" style="width:70px" value="搜索标签" class="searchButton"/>
        </form>
    </div>
    <!--<div style=" background-color:#FFFFFF; width:370px; height:100px; text-align:center; margin:10px 10px 10px 0px; clear:both; border-radius: 2px;" >
        <span class="black14">热门检索标签：
        	<a href="searchTagList.php?tag=情感">情感</a>
            <a href="searchTagList.php?tag=家庭">家庭</a>
            <a href="searchTagList.php?tag=艺术">艺术</a>
        </span>
    </div>
    <div style=" background-color:#FFFFFF; width:370px; height:100px; text-align:center; margin:10px 10px 10px 0px; clear:both; border-radius: 2px;" >
        <span class="black14">热门检索标签：
        	<a href="searchTagList.php?tag=情感">情感</a>
            <a href="searchTagList.php?tag=家庭">家庭</a>
            <a href="searchTagList.php?tag=艺术">艺术</a>
        </span>
    </div>   -->
<div style=" background-color:#FFFFFF; width:970px; margin:0 auto; clear:both; border-radius: 2px;" >
 		
		<?php 
		//$row = mysql_fetch_array($result);
		//print_r($row);
		echo "<span class='warning'>".$warning.'</span><br/>';
		echo "<ul>";
		if($warning!=''){
			echo "<div class='orange16'><span>&nbsp;&nbsp;&nbsp;&nbsp;热门推荐</span></div>";
			}
		else{
			}
		//foreach((array)$result as $key => $row){ 
		while($row = mysql_fetch_object($result)) {
			//print_r($row);
			//echo $row->id;
		?>
        
            <li class="mediaList">
                <div class="posterV"><a href="movieDetail.php?id=<?php echo $row->id; ?>&typeId=<?php echo $row->type_id; ?>">
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
                    <img class="poster" src="<?php echo $config['posterH'];echo $poster;?>" /></a>
                <div><a href="movieDetail.php?id=<?php echo $row->id;?>&typeId=<?php echo $row->type_id; ?>"><button class="buttonGreen">立即观看</button></a></div>
                </div>
                <div class="mediaInfo">
                    <h3 class="mediaTitle">
                    	<?php echo "<span class='gray14'>[微电影]</span>" ?>
                        <a href="movieDetail.php?id=<?php echo $row->id; ?>&typeId=<?php echo $row->type_id; ?>"><span style="color:#EB6100"><?php echo $row->title_cn;?></span></a>
                    	<?php echo "<span class='gray14'>&nbsp;--".$row->title_en."</span>" ?>
                    </h3>
                    <br/>
                    
                   <div class="p_half">
						<span class='gray12'>导演：</span>
                        <span class='black12'><?php echo $row->director;?></span>
                   </div>
					<div class="p_half">
                    	<span class='gray12'>主演：</span>
                        <span class='black12'><?php echo $row->stars;?></span><br/>
                    </div>
                    <div class="p_half">
                        <span class='gray12'>标签：</span>	
                        <span class='black12'><?php 
							$tags = $row->tags;
							$array = explode('；',$tags);
							//print_r($array);
							foreach((array)$array as $key => $tagi){
								echo "<a href='searchTagList.php?tag=".$tagi."'>".$tagi."</a>";
								echo "&nbsp;&nbsp;&nbsp;";
							}
						?></span><br/>
                    </div>
                    <div class="p_half">
                        <span class='gray12'>制片人：</span>	
                        <span class='black12'><?php echo $row->producer;?></span><br/>
                    </div>
                    <div class="p_half">
                        <span class='gray12'>年份：</span>	
                        <span class='black12'><?php echo $row->year;?></span><br/>
                    </div>
                    <div class="p_half">
                    <?php 
						$sec = $row->dur;
						$min = sec2time($sec);
					?>
                        <span class='gray12'>时长：</span>	
                        <span class='black12'><?php echo $min;?></span><br/>
                    </div>
                    <div style="height:55px;">   
                        <span class='gray12'>简介：</span>
                        <span class='gray12'><?php echo $row->dscrp;?></span><br/>
                	</div>
                </div>
                <div><hr style=" width:925px; margin-left:15px; float:left;border:1px solid #D9D9D9" /></div>
                <div style="clear:both"></div>
            </li>
			
		<?php }
		?>
        </ul>
        <?php
                    $page_len = ($page_len%2)?$page_len:$page_len+1;//页码个数 
                    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$page/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($page!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&tag=".$tag."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&tag=".$tag."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
                    }
                    else { 
                        $key.="&nbsp;第一页&nbsp;";//第一页 
                        $key.="&nbsp;上一页&nbsp;"; //上一页 
                    } 
                    if($pages>$page_len){ 
                    //如果当前页小于等于左偏移 
                        if($page<=$pageoffset){ 
                            $init=1; 
                            $max_p = $page_len; 
                        }
                        else{//如果当前页大于左偏移 
                            //如果当前页码右偏移超出最大分页数 
                            if($page+$pageoffset>=$pages+1){ 
                                $init = $pages-$page_len+1; 
                            }
                            else{ 
                                //左右偏移都存在时的计算 
                                $init = $page-$pageoffset; 
                                $max_p = $page+$pageoffset; 
                                } 
                        } 
                    } 
                    for($i=$init;$i<=$max_p;$i++){ 
                        if($i==$page){ 
                            $key.=' <span class="currentPage">'.$i.'</span>'; 
                        }
                        else { 
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&tag=".$tag."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($page!=$pages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&tag=".$tag."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&tag=".$tag."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                  <?php echo $key?>
        <div></br></div>
        </div>
        </div>
<?php
	require('common/footer.php');
?>
		
