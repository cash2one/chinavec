<!DOCTYPE HTML>
<html>
<head runat="server">
<meta charset="utf-8">
<!--<meta name="renderer" content="ie-stand">-->
<title>微院线</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/movie.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/movie.css" />
</head>

<style type="text/css">
body {
	text-align:center;
	background:#333 repeat 0px 1px;
}
.zzsc:hover img{ opacity:0.9;filter:alpha(opacity=50);-webkit-transition:all 0.2s linear;-moz-transition:all 0.2s linear;-ms-transition:all 0.2s linear;-o-transition:all 0.2s linear;transition:all 0.2s linear;}
.zzsc li:hover img{ opacity:1;-webkit-transition:all 0.2s linear;-moz-transition:all 0.2s linear;-ms-transition:all 0.2s linear;-o-transition:all 0.2s linear;transition:all 0.2s linear;}
</style>

<body>
<?php 
	session_start();
	include "common/checkLog.php";
?>
<!--登录-->
<?php 
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	include "siteview.php";
}else{
	include "LoginSuccess.php";
	include "userview.php";
};
?> 
<!--登录-->  
<div id="layout">
	<?php   
		echo "<br/>";
		echo "<br/>";
		include "common/table1.php"; //索引标题栏
		include('lib/connect.php'); //数据库连接文件

        /*获取视频排序的参照字段START****/
		//$field = "id";
		$field = "is_on_shelf";
		if (isset($_GET['field'])) {
            $field = $_GET['field'];
        }
		/*获取视频排序的参照字段END*****/
		
		
		/**获取筛选时所需要的参数START**/
		$arr = array(
			"type_id" => 0,
			"dur" => 0,
			"year" => 0
		);
		
		if (isset($_POST['videotype']) OR isset($_POST['videotype']) OR isset($_POST['videotype'])){
			if (isset($_POST['videotype'])) {
				$arr["type_id"] = $_POST['videotype'];
			}
			if (isset($_POST['dur'])) {
				$arr["dur"] = $_POST['dur'];
			}
			if (isset($_POST['year'])) {
				$arr["year"] = $_POST['year'];
			}
		}
		else{
			if (isset($_GET['videotype'])) {
            	$arr["type_id"] = $_GET['videotype'];
			}
			if (isset($_GET['dur'])) {
				$arr["dur"] = $_GET['dur'];
			}
			if (isset($_GET['year'])) {
				$arr["year"] = $_GET['year'];
			}
		}
		
		
        /**if (isset($_GET['videotype'])) {
            $arr["type_id"] = $_GET['videotype'];
        }
        if (isset($_GET['dur'])) {
            $arr["dur"] = $_GET['dur'];
        }
        if (isset($_GET['year'])) {
            $arr["year"] = $_GET['year'];
        }
		
		$arr = array(
            "type_id" => 0,
            "dur" => 0,
            "year" => 0
        );
        if (isset($_POST['videotype'])) {
            $arr["type_id"] = $_POST['videotype'];
        }
        if (isset($_POST['dur'])) {
            $arr["dur"] = $_POST['dur'];
        }
        if (isset($_POST['year'])) {
            $arr["year"] = $_POST['year'];
        }**/
		/**获取筛选时所需要的参数END**/
	?>
   
<div>
    <div style=" width:800px; height:80px; margin:0 auto; clear:both;border-radius: 2px;" class="search">
        <br/>
        <form action="searchList.php" method="get">
            <input style="width:730px" type="text" name="keyWord" placeholder="输入名称查询" class="searchBlock"/>
            <input type="submit" value="搜索" class="searchButton"/>
        </form>
    </div>
    
    <div style="background-color:#FFFFFF; width:970px; height:260px; margin:0 auto; clear:both; border-radius: 2px;" >
        <div style=" width:970px; height:230px; margin:0 auto;">
         <br/>
		<form id="form1" method="post" action="movie.php" runat="server"> 
        <ul class="select">
            <li class="select-list">
                <dl id="select1">
                    <dt>视频类型：</dt>
                    <?php
                        $videotype = array('全部','微电影','微纪录','微栏目','微动漫','创意视频','信息视频');
                        foreach ($videotype as $key => $value) {
                            $class = array();
                            if ($key == 0) {
                                $class[] = "select-all";
                            }
                            if ($key == intval($arr['type_id'])) {
                                $class[] = "selected";
                            }
                            $class = implode(" ", $class);
                            echo <<<DD
                            <dd class="$class"><span tag="$key">$value</span></dd>
DD;
                        }
                    ?>
                    <!--dd class="select-all selected"><span tag="0">全部</span></dd>
                    <dd><span tag="1">微电影</span></dd>
                    <dd><span tag="2">微纪录</span></dd>
                    <dd><span tag="3">微栏目</span></dd>
                    <dd><span tag="4">微动漫</span></dd>
                    <dd><span tag="5">创意视频</span></dd>
                    <dd><span tag="6">信息视频</span></dd-->
                </dl>
            </li>
            <li class="select-list">
                <dl id="select2">
                    <dt>视频时长：</dt>
                    <?php
                        $videodur = array(
                            "0" => "全部",
                            "300" => "5分钟内",
                            "900" => "5-15",
                            "1800" => "15-30",
                            "1801" => "30分钟以上"
                        );

                        foreach ($videodur as $key => $value) {
                            $class = array();
                            if ($key == 0) {
                                $class[] = "select-all";
                            }
                            if ($key == $arr['dur']) {
                                $class[] = "selected";
                            }
                            $class = implode(" ", $class);
                            echo <<<DD
                            <dd class="$class"><span tag="$key">$value</span></dd>
DD;
                        }
                    ?>

                    <!--dd class="select-all selected"><span tag="0">全部</span></dd>
                    <dd><span tag="300">5分钟内</span></dd>
                    <dd><span tag="900">5-15</span></dd>
                    <dd><span tag="1800">15-30</span></dd>
                    <dd><span tag="1801">30分钟以上</span></dd-->
                </dl>
            </li>
            <li class="select-list">
                <dl id="select3">
                    <dt>上映时间：</dt>
                    <?php
                        $videoyear = array(
                            "0" => "全部",
                            "2014" => "2014",
                            "2013" => "2013",
                            "2012" => "2012",
                            "2011" => "其他"
                        );

                        foreach ($videoyear as $key => $value) {
                            $class = array();
                            if ($key == 0) {
                                $class[] = "select-all";
                            }
                            if ($key == $arr['year']) {
                                $class[] = "selected";
                            }
                            $class = implode(" ", $class);
                            echo <<<DD
                            <dd class="$class"><span tag="$key">$value</span></dd>
DD;
                        }
                    ?>
                    <!--dd class="select-all selected"><span tag="0">全部</span></dd>
                    <dd><span tag="2014">2014</span></dd>
                    <dd><span tag="2013">2013</span></dd>
                    <dd><span tag="2012">2012</span></dd>
                    <dd><span tag="2011">其他</span></dd-->
                </dl>
            </li>
            <li class="select-result">
                <dl>
                    <dt>已选条件：</dt>
                    <?php
                        $isset = 0;
                        foreach ($arr as $key => $value) {
                            if ($value != 0) {
                                switch ($key) {
                                    case 'type_id':
                                        echo <<<DD
                                        <dd class="selected" id="selectA"><span tag="$value">{$videotype[$value]}</span></dd>
DD;
                                        break;
                                    case 'dur':
                                        echo <<<DD
                                        <dd class="selected" id="selectB"><span tag="$value">{$videodur[$value]}</span></dd>
DD;
                                        break;
                                    case 'year':
                                        echo <<<DD
                                        <dd class="selected" id="selectC"><span tag="$value">{$videoyear[$value]}</span></dd>
DD;
                                        break;
                                }
                            } else {
                                if ((++$isset) == 3) {
                                    echo <<<DD
                                <dd class="select-no">暂时没有选择过滤条件</dd>
DD;
                                }
                                
                            }
                        }
                    ?>
                    <!--dd class="selected" id="selectB"><span tag="300">5分钟内</span></dd>
                    <dd class="select-no">暂时没有选择过滤条件</dd-->
                </dl>
       		</li>
       </ul> 
       <div><input type="submit" id="submit"  style=" float:right" class="filterButton" value="提交筛选" /></div>
	   <?php
            echo <<<HIDDEN
    		<input type="hidden" id="type" name="videotype" value="{$arr['type_id']}" />
            <input type="hidden" id="dur" name="dur" value="{$arr['dur']}" />
            <input type="hidden" id="year" name="year" value="{$arr['year']}" />
HIDDEN;
        ?>
	</form> 
	</div>
</div>
    
    <div style="height:15px;"></div>
    
	<div style=" background-color:#FFFFFF; width:970px; height:1150px; margin:0 auto; clear:both; border-radius: 2px;" >       
    <!--选项卡开始-->
    <div class="navList">
        <ul>
         <?php
                        $fieldArr = array(
                            "is_on_shelf" => "最近更新",
			    //"id" => "最近更新",
                            "playNum" => "观看排行",
                            "year" => "最新上映"
                        );

                        foreach ($fieldArr as $key => $value) {
                            $class = "navTitle";
                            if ($key == $field) {
                                $class = "selected";
                            }
                           else {
                                $class = "navTitle";
                            }
                            echo <<<LI
							<li><a class="$class" href="movie.php?field=$key">$value</a></li>
LI;
                        }
                    ?>
        </ul>
    </div>
	<!--选项卡结束-->
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
	/**根据筛选选项值，生成MySQL操作的condition**/
        $tmp = array();
        /*foreach ($arr as $key => $value) {
            if ($value != 0) {
                $tmp[] = "video.$key=$value";
            }
        }*/
	if($arr["type_id"]!=0){
		$tmp[0] ="video.type_id =".$arr["type_id"];
	}
	if($arr["dur"]!=0){
		switch ($arr["dur"]) {
			case '300':		$tmp[1] ="video.dur < 300";                
						break;
			case '900':		$tmp[1] ="video.dur between 301 AND 900";
					        break;
			case '1800':	$tmp[1] ="video.dur between 901 AND 1800";
					        break;
			case '1801':	$tmp[1] ="video.dur >1800";
					        break;
			default:		$tmp[1] ="";
					        break;}
	}
	if($arr["year"]!=0){
		switch ($arr["year"]) {
			case '2014':	$tmp[2] ="video.year = 2014";
							break;
			case '2013':	$tmp[2] ="video.year = 2013";
					        break;
			case '2012':	$tmp[2] ="video.year = 2012";
					        break;
			case '2011':	$tmp[2] ="video.year <= 2011 or video.year is NULL";
					        break;
			default:		$tmp[2] ="";
					        break;	}	
		//$tmp[2] ="year =".$arr[year];
	}
        $condition = implode(' and ', $tmp);
        if (!$condition) {
            $condition = "is_on_shelf>-2";
        }

        $Page_size=20; //每页显示的条目数
		$sql="select * from video where $condition";
        // print_r($sql);

        $result=mysql_query($sql);
		//$row=mysql_fetch_array($result);
		//print_r($row);
		
        $count = mysql_num_rows($result); 
        $page_count = ceil($count/$Page_size); //总显示页数
        if($page_count<=0){$page_count=1;}
        $init=1; 
        $page_len=7; 
        $max_p=$page_count;
        $pages=$page_count;
        
        //判断当前页码 
        if (empty($_GET['page'])||$_GET['page']<1) { 
            $page=1; 
        } else { 
            $page=$_GET['page']; 
        } 
        $offset=$Page_size*($page-1); 


		if($field == "playNum"){
			/*$sql="SELECT * FROM video  LEFT JOIN video_view_statistics 
				ON video.id = video_view_statistics.video_id
				where $condition
				ORDER BY video_view_statistics.view_total DESC
				limit $offset,$Page_size";*/
			$sql="SELECT `video_view_statistics`.`video_id`,`video_view_statistics`.`type_id`,count(`video_view_statistics`.`video_id`) 
				AS `view_total`,`video`.* from `video_view_statistics`,`video` where `video`.`id`=`video_view_statistics`.`video_id`
				group by `video_view_statistics`.`video_id` ORDER BY count(`video_view_statistics`.`video_id`) DESC,`video`.`id` DESC
				limit $offset,$Page_size";
			}
		else{
    		$sql="select * from video where $condition
				group by title_cn 
				ORDER BY `$field` DESC,`id` DESC
				limit $offset,$Page_size";
		}
    	$result=mysql_query($sql);
			
	
 //显示视频图片及名称列表List START           
            while ($row=mysql_fetch_array($result)) { ?>
           <div style="width:200px; height:160px; margin:40px 20px 5px 22px; float:left; border-radius: 5px;" class="zzsc">    
                <div style="margin:0px auto;">
                    <a href="movieDetail.php?id=<?php echo $row['id']?>&typeId=<?php echo $row['type_id']?>">
                    <?php 

			$sec = $row['dur'];
			$min = sec2time($sec);
			/*是否存在id.jpg的文件
			若存在$poster = $row['id'].".jpg"
			否则 $poster = 0.jpg*/
			$file = $config['posterH'].$row['id'].".jpg";
			if(file_exists($file)){
				$poster = $row['id'].".jpg";
				//echo $poster;
				//exit;
			}
			else{
				$poster = "0.jpg";
				//echo $poster;
				//exit;
				}
		?>
                    <center><img src="<?php echo $config['posterH'];echo $poster;?>" width="170px" height="120px" /></center>
                	</a>
                </div>
                <div style="width:200px; margin:0px auto;">
                    <a href="movieDetail.php?id=<?php echo $row['id']?>&typeId=<?php echo $row['type_id']?>">
                    <p align="center" class="black14"><?php echo $row['title_cn']?></p></a>
		    <a href="movieDetail.php?id=<?php echo $row['id']?>&typeId=<?php echo $row['type_id']?>">
 		    <p align="center" class="stars">时长：<?php echo $min; ?></p></a>
                    <a href="movieDetail.php?id=<?php echo $row['id']?>&typeId=<?php echo $row['type_id']?>">
                    <p align="center" class="stars">主演：<?php echo mb_substr($row['stars'],0,10,'utf-8')."..."?></p></a>
                    <p align="center" class="black12"><?php echo $row['tags']?></p>

                </div>
            </div>
            <?php } ?>

  <!--List END-->                
			<?php
                $page_len = ($page_len%2)?$page_len:$pagelen+1;//页码个数 
                $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
                
                $key='</br><div class="page">'; 
                $key.="<span>$page/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                if($page!=1){ 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&field=".$field."&videotype=".$arr["type_id"]."&dur=".$arr["dur"]."&year=".$arr["year"]."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&field=".$field."&videotype=".$arr["type_id"]."&dur=".$arr["dur"]."&year=".$arr["year"]."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
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
						$key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&field=".$field."&videotype=".$arr["type_id"]."&dur=".$arr["dur"]."&year=".$arr["year"]."\"><span class='notCurPage'>".$i."</span></a>"; 
					} 
                } 
                if($page!=$pages){ 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&field=".$field."&videotype=".$arr["type_id"]."&dur=".$arr["dur"]."&year=".$arr["year"]."\">&nbsp;下一页&nbsp;</a> ";//下一页 
					$key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&field=".$field."&videotype=".$arr["type_id"]."&dur=".$arr["dur"]."&year=".$arr["year"]."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                }else { 
					$key.="&nbsp;下一页&nbsp; ";//下一页 
					$key.="&nbsp;最后一页&nbsp;"; //最后一页 
                } 
                $key.='</div>'; 
                ?>
		
                <div class="page"><?php echo $key?></div>
	</div>
</div>
<?php
	require('common/footer.php');
?>
