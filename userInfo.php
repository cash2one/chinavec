<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>用户个人信息管理</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/progress.css" />
<link rel="stylesheet" type="text/css" href="css/userInfo.css" />

</head>

<style type="text/css">
body {
	text-align:center;
	background:#333 repeat 0px 1px;
}
</style>

<body>
	<?php 
		session_start();
		require "common/checkLog.php";
		require "common/visitRight.php";
		
		/*获取选项卡的参照字段START****/
		
		$field = "perInfo";
		if (isset($_GET['field'])) {
            $field = $_GET['field'];
        }
		/*获取选项卡的参照字段END*****/
		
		
		require "lib/connect.php";
		require('lib/util.class.php');
		require('lib/db.class.php');//数据库操作类
		require('config/config.php');//系统总配置文件

		
		$sql="select * from user WHERE `id` = $userId";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		$user_role_id = $row->user_role_id;
	?>

    <div id="layout">
		<?php include "common/table1.php";?>
        <div id="userInfo">
        
            <!--选项卡开始-->
            <div class="navList">
                <ul>
                 <?php
		    if($user_role_id == 0){
		    $fieldArr = array(
                        "perInfo" => "个人信息",
                        "videoInfo" => "我的视频",
                        "activityInfo" => "活动记录",
		        );
			}else{
                    $fieldArr = array(
                        "perInfo" => "个人信息",
                        "videoInfo" => "我的视频",
                        "activityInfo" => "活动记录",
		        "oplog"=>"操作日志"   );//---------------新添操作日志
        		}
                 
                    foreach ($fieldArr as $key => $value) {
                        $class = "navTitle";
                        if ($key == $field) {
                            $class = "selected";
                        }
                       else {
                            $class = "navTitle";
                        }
                        echo <<<LI
                        <li><a class="$class" href="userInfo.php?field=$key">$value</a></li>
LI;
                    }
                ?>
                </ul>
            </div>
            <!--选项卡结束-->
            
            <!--选项显示START-->
<?php SWITCH($field){
	case "perInfo":
?>
            
            <!--个人信息页START-->
                <!--个人信息填写版块STASRT-->
             <div style="width:360px; float:left; margin-left:120px;">
               <form  class="black14" method="post" action="modifyUserInfo.php">
                    <fieldset>
                        <img class="userImg" src="img/userImg.jpg" />
                        
                        <label class="name"><?php echo $row->name;?>的账号</label>
                        <!--<span class="font1">性别：</span>
                        <select name="gender" id="gender" title="选择性别">
                            <?php 
                                /**if($row->gender == 0){
                                    echo '<option value="0" selected="selected">女</option>
                                          <option value="1">男</option>';
                                }
                                else{
                                    echo '<option value="0">女</option>
                                          <option value="1" selected="selected">男</option>';
                                }*/
                            ?> 
                        </select>-->
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">电子邮箱：</span>
                    <input type="text" name="email" id="email" value="<?php  echo $row->email; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">真实姓名：</span>
                        <input type="text" name="realName" id="realName" value="<?php echo $row->real_name; ?>" />
                    </fieldset><br/>
                     <fieldset>
                        <span class="font1">密码：</span>
                        <a href="modifyPsw.php" style="color:#518900;">修改</a>
                    </fieldset><br/>
                      <fieldset>
                        <span class="font1">联系电话：</span>
                        <input type="text" name="tel" id="tel" value="<?php echo $row->tel; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">工作单位：</span>
                        <input type="text" name="unit" id="unit" value="<?php echo $row->unit; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">QQ号码&nbsp;：</span>
                        <input type="text" name="qq" id="qq" value="<?php echo $row->qq; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">微信&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：</span>
                        <input type="text" name="wechat" id="wechat" value="<?php echo $row->wechat; ?>" />
                    </fieldset><br/>
                   <fieldset>
                        <span class="font1">身份证号：</span>
                        <input type="text" name="idcard_no" id="idcard_no" value="<?php echo $row->idcard_no; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">手机号码：</span>
                        <input type="text" name="mp" id="mp" value="<?php echo $row->mp; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">备用电话：</span>
                        <input type="text" name="mp1" id="mp1" value="<?php echo $row->mp1; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <span class="font1">联系地址：</span>
                        <input type="text" name="address" id="address" value="<?php echo $row->address; ?>" />
                    </fieldset><br/>
                    <fieldset>
                        <input type="submit" value="更新设置" class="apply"/>
                    </fieldset>
                </form>
            </div>
            <!--个人信息填写版块END-->
            <!--个人信息解疑版块START-->
            <div style="width:360px;height:580px; float:left; margin-top:150px; margin-left:100px; margin-right:20px;">
                <p class="green17">为什么要完善个人信息？</p>
                <p class="black14">中国微视频协作与交易平台是微视频行业内人士交流的平台，为保证注册用户的切身利益，也为了方便各位用户的视频授权申请，
                我们需要真实详细的个人信息来进行验证。还没有及时完善个人信息的用户，请在本页面左侧及时更新完善您的个人信息，以保障您自身的权益！</p>
                <br/>
                <p class="green17">如何修改密码？</p>
                <p class="black14">操作过程如下：<br/>在页面左侧“密码”后点击“修改”。<br/>用户输入旧密码，并设置新密码。<br/>提交信息，修改密码成功，系统提示成功信息。</p>
            </div>
            <!--个人信息解疑版块END-->
        </div>
        <!--个人信息板块END-->
        
        
        
        
       
        
	<?php 
    break;
    case "videoInfo":
	
	
	
	//我的视频版块START
	
	
	//已上传的视频START
	$sql = "SELECT * FROM `video` WHERE `user_id` = $userId ";
	$result=mysql_query($sql);
	$count=mysql_num_rows($result);
	
	echo "	<div class='videoBlock'>
			<div class='orange16' style='margin-top:20px;'><span>&nbsp;&nbsp;&nbsp;&nbsp;已上传的视频</span></div>";
	echo "<div class='videoForm'>";
	
	if($count == 0){
			echo "<span class='warning'>您还没有上传视频!</span><br/>";
		}
	else{
			/*准备分页工作*/	
			$upPage_size=2; //每页显示的条目数
			$upPage_count = ceil($count/$upPage_size); //总显示页数
			if($upPage_count<=0){$upPage_count=1;}
			$init=1; 
			$upPage_len=7;///显示的页码数
			$max_p=$upPage_count;
			$upPages=$upPage_count;
			
			//判断当前页码 
			if (empty($_GET['upPage'])||$_GET['upPage']<1) { 
				$upPage=1; 
			} else { 
				$upPage=$_GET['upPage']; 
			} 
			$offset=$upPage_size*($upPage-1); 
	
			$sql = $sql."limit $offset,$upPage_size";
			$result=mysql_query($sql);
			//echo $sql;
			
		//foreach((array)$result as $key => $row){ 
		while($row = mysql_fetch_object($result)) {
			//print_r($row);
			//echo $row->id;
			?>
            	<div class="posterH">
                    <a href="movieDetail.php?id=<?php echo $row->id; ?>">
		
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
			$video_id=$row->id;
			$sqlm="SELECT * FROM video_upload WHERE video_id ='$video_id'";
			$resultm=mysql_query($sqlm);
			$rowm=mysql_fetch_array($resultm);
			$upstatus=$rowm['id'];
			//$uparray=array();
			//array_push($uparray,$upstatus);
			//print_r($uparray);
			//echo "<script>setInterval('clock()',2000);</script>";
            echo "<script>var int=self.setInterval('clock(".$video_id.")',2000);</script>";
			/*			
			switch($rowm['status'])
                         {
			  case 0:
                            $status= "待转码";
                            break;
                          case 1:
                            $status= "正在转码";
                            break;
                         case 2:
                            $status= "完成";
                            break;
						
                         default:
			
                         }*/
                    ?>
                    <img class="poster" width="150" height="80" src="<?php echo $config['posterH'];echo $poster;?>" />
                    </a>
				</div>
                <div style="margin-left:200px;">
                    <div>
                        <a href="movieDetail.php?id=<?php echo $row->id; ?>"><span class="black14WeightArial"><?php echo $row->title_cn;?></span></a>
                    </div>
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
                            foreach((array)$array as $key => $tag){
                                echo "<a href='searchTagList.php?tag=".$tag."'>".$tag."</a>";
                                echo "&nbsp;&nbsp;&nbsp;";
                            }

                        ?></span><br/>
                    </div>
                    <div class="p_half" style="width:20%;">
                        <span class='black12'>上传状态：</span>
                        <span class='orange13' id="<?php echo $video_id;?>"><?php //echo $status;?></span>
                    </div>
		<div style="float:right;width:20%;margin-right: 5px;">
			<a id="submit" class="filterButton" href="./upload/mod_upload_video.php?id=<?php echo $row->id; ?>" type="submit" style=" float:right;font-size: 18px;font-weight: 300;height: 25px;margin-right: 5px;color:white;width: 82px;">重新上传</a>

            <!--</div>
		<div style="width: 600px;float:left" id="listbox">
		<span class='black12' style="float:left;font-size:13px;">转码进度：</span><div id="ibox" class="progress progress-striped" style="width: 400px;">
		<div id="progressNumber" class="bar"></div>
		</div>-->
		</div>
                </div>
      <div><hr style=" width:890px;margin-top:10px; float:left;border:1px solid #D9D9D9" /></div>
                <div style="clear:both"></div>
		<?php }
		?>

        		<!--已上传的视频分页页码START-->
                    <?php
                    $upPage_len = ($upPage_len%2)?$upPage_len:$upPage_len+1;//页码个数 
                    $upPageoffset = ($upPage_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$upPage/$upPages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($upPage!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?upPage=1&field=".$field."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?upPage=".($upPage-1)."&field=".$field."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
                    }
                    else { 
                        $key.="&nbsp;第一页&nbsp;";//第一页 
                        $key.="&nbsp;上一页&nbsp;"; //上一页 
                    } 
                    if($upPages>$upPage_len){ 
                    //如果当前页小于等于左偏移 
                        if($upPage<=$upPageoffset){ 
                            $init=1; 
                            $max_p = $upPage_len; 
                        }
                        else{//如果当前页大于左偏移 
                            //如果当前页码右偏移超出最大分页数 
                            if($upPage+$upPageoffset>=$upPages+1){ 
                                $init = $upPages-$upPage_len+1; 
                            }
                            else{ 
                                //左右偏移都存在时的计算 
                                $init = $upPage-$upPageoffset; 
                                $max_p = $upPage+$upPageoffset; 
                                } 
                        } 
                    } 
                    for($i=$init;$i<=$max_p;$i++){ 
                        if($i==$upPage){ 
                            $key.=' <span class="currentPage">'.$i.'</span>'; 
                        }
                        else { 
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?upPage=".$i."&field=".$field."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($upPage!=$upPages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?upPage=".($upPage+1)."&field=".$field."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?upPage={$upPages}&field=".$field."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                  <?php echo $key;}?>

                <!--已上传的视频分页页码END-->
        </div>
        </div>
        <!--已上传的视频END-->
        
        
        
        
        
        <!--已申请授权的视频START-->
        <?php 
		$sql = "SELECT * FROM `video` inner join `user_auth` on video.id=user_auth.video_id WHERE user_auth.`user_id` = $userId ";
		$result=mysql_query($sql);
		$count=mysql_num_rows($result);
        echo "
			<div class='videoBlock'>
			<div class='orange16'><span>&nbsp;&nbsp;&nbsp;&nbsp;已申请授权的视频</span></div>";
		echo "<div class='videoForm'>";
		
		if($count == 0){
		echo "<span class='warning'>您还未申购视频，快去采购页面看看吧！</span><br/>";
			}
		else{
			
			/*准备分页工作*/	
	
			$buyPage_size=2; //每页显示的条目数
			$buyPage_count = ceil($count/$buyPage_size); //总显示页数
			if($buyPage_count<=0){$buyPage_count=1;}
			$init=1; 
			$buyPage_len=7;///显示的页码数
			$max_p=$buyPage_count;
			$buyPages=$buyPage_count;
			
			//判断当前页码 
			if (empty($_GET['buyPage'])||$_GET['buyPage']<1) { 
				$buyPage=1; 
			} else { 
				$buyPage=$_GET['buyPage']; 
			} 
			$offset=$buyPage_size*($buyPage-1); 
	
			$sql = $sql."limit $offset,$buyPage_size";
			$result=mysql_query($sql);
			//echo $sql;

			//foreach((array)$result as $key => $row){ 
			while($row = mysql_fetch_object($result)) {
				//print_r($row);
				//echo $row->id;
				?>
					<div class="posterH">
						<a href="movieDetail.php?id=<?php echo $row->video_id; ?>">
						<?php 
							/*是否存在id.jpg的文件
							若存在$poster = $row['id'].".jpg"
							否则 $poster = 0.jpg*/
							$file = $config['posterH'].$row->video_id.".jpg";
							if(file_exists($file)){
								$poster = $row->video_id.".jpg";
								//echo $poster;
								//exit;
							}
							else{
								$poster = "0.jpg";
								//echo $poster;
								//exit;
								}
						?>
						<img class="poster" width="150" height="80" src="<?php echo $config['posterH'];echo $poster;?>" />
						</a>
					</div>
					<div style="margin-left:250px;">
					<div>
					<a href="movieDetail.php?id=<?php echo $row->video_id; ?>"><span class="black14WeightArial"><?php echo $row->title_cn;?></span></a>
					</div>
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
							foreach((array)$array as $key => $tag){
								echo "<a href='searchTagList.php?tag=".$tag."'>".$tag."</a>";
								echo "&nbsp;&nbsp;&nbsp;";
							}?>
                        </span><br/>
					</div>
                    <div class="p_half">
						<span class="black12">授权状态：</span>
						<span class='orange13'>
						<?php 
						switch($row->status){
							case 0: echo "您已申请，请等待管理员联系";break;
							case 1: echo "采购失败";break;
							case 2: echo "采购成功";break;
							}
						?></span><br/>
					</div>
					</div>
					<div><hr style=" width:890px;margin-top:10px; float:left;border:1px solid #D9D9D9" /></div>
					<div style="clear:both"></div>
			<?php 
			 }?>
        	 <!--已申购的视频分页页码START-->
                    <?php
                    $buyPage_len = ($buyPage_len%2)?$buyPage_len:$buyPage_len+1;//页码个数 
                    $buyPageoffset = ($buyPage_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$buyPage/$buyPages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($buyPage!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?buyPage=1&field=".$field."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?buyPage=".($buyPage-1)."&field=".$field."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
                    }
                    else { 
                        $key.="&nbsp;第一页&nbsp;";//第一页 
                        $key.="&nbsp;上一页&nbsp;"; //上一页 
                    } 
                    if($buyPages>$buyPage_len){ 
                    //如果当前页小于等于左偏移 
                        if($buyPage<=$buyPageoffset){ 
                            $init=1; 
                            $max_p = $buyPage_len; 
                        }
                        else{//如果当前页大于左偏移 
                            //如果当前页码右偏移超出最大分页数 
                            if($buyPage+$buyPageoffset>=$buyPages+1){ 
                                $init = $buyPages-$buyPage_len+1; 
                            }
                            else{ 
                                //左右偏移都存在时的计算 
                                $init = $buyPage-$buyPageoffset; 
                                $max_p = $buyPage+$buyPageoffset; 
                                } 
                        } 
                    } 
                    for($i=$init;$i<=$max_p;$i++){ 
                        if($i==$buyPage){ 
                            $key.=' <span class="currentPage">'.$i.'</span>'; 
                        }
                        else { 
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?buyPage=".$i."&field=".$field."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($buyPage!=$buyPages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?buyPage=".($buyPage+1)."&field=".$field."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?buyPage={$buyPages}&field=".$field."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                  <?php echo $key;}?>

                <!--已申购的视频分页页码END-->
			</div>
        </div>
        <!--已申请授权的视频END-->
        <!--我的视频版块END-->
        
        
        
        
	<?php 
    break;
    case "activityInfo":
    ?>
        <!--活动记录版块START-->
         <?php 

		$sql = "SELECT * FROM `task` WHERE `user_id` = $userId ";
        if($result=mysql_query($sql)){
            $warning = '';
        }
        else{
            $warning = '您还没有发起过线下活动!';
        }
        echo "<div class='orange16' style='margin-top:20px;'><span>&nbsp;&nbsp;&nbsp;&nbsp;已发起的线下活动</span></div>";
    	echo "<span class='warning'>".$warning."</span>";
		if($warning!=''){
			echo '';
		}
		else{
			
			/*准备分页工作*/	
			$count=mysql_num_rows($result);
	
			$page_size=10; //每页显示的条目数
			$page_count = ceil($count/$page_size); //总显示页数
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
			$offset=$page_size*($page-1); 
	
			$sql = $sql."limit $offset,$page_size";
			$result=mysql_query($sql);
			//echo $sql;

		?>
    
    <div id="box" style="width:95%">
	<table style="width:100%">
		<thead align="center" >
			<tr>
            	<th width="15%">活动类型</th>
				<th width="45%">活动名称</th>
				<th width="15%">发起时间</th>
				<th width="15%">状态</th>
				<th width="10%">操作</th>
			</tr>
		</thead>
		<tbody align="center" >
		<?php
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
			
			
		while($row = mysql_fetch_object($result)) {
			$sql_taskType="SELECT name FROM task_type WHERE id='{$row->task_type_id}'";
			$result_taskType=mysql_query($sql_taskType);
			$row_taskType=mysql_fetch_object($result_taskType);
			$taskType=$row_taskType->name;
			switch($row->status){
				case 0: $status = '进行中';
				$button="<button class='buttonGreen'><a href='endActivity.php?task_id={$row->id}' onclick='return confirm(&quot您确定要结束活动吗？&quot)' style='color:#fff;'>结束活动</a></button>";
				break;
				case 1: $status = '已结束';
				$button="<button class='buttonGray' disabled>已结束</button>";
				break;
				default: $status = '未知';
				$button="<button class='buttonGray' disabled>已结束</button>";
				break;
				}
			
			$time=$row->create_time;
            $date=date('Y-m-d',$time);

			echo <<<TR
			<tr  onmouseover="style.backgroundColor='#dea'" onmouseout="style.backgroundColor='#FFFFFF'">
				<td>{$taskType}</td>
				<td><a href="ShowInfo.php?task_id={$row->id}&task_type={$taskType}">{$row->title}</a></td>
				<td>{$date}</td>
				<td>{$status}</td>
				<td>
					$button
				</td>
			</tr>
TR;
		}
		}?>
		</tbody>
	</table>
</div>
        <!--活动记录版块END-->
            	 <!--我的活动分页页码START-->
                    <?php
                    $page_len = ($page_len%2)?$page_len:$page_len+1;//页码个数 
                    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$page/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($page!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&field=".$field."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&field=".$field."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
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
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&field=".$field."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($page!=$pages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&field=".$field."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&field=".$field."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                  <?php echo $key?>

                <!--我的活动分页页码END-->



<?php break;                 
  //----------------------------------------------------------------------新添操作日志模块
   case "oplog":
	?>
	<!--操作日志版块START-->
          
               <div class='orange16' style='margin-     	top:30px;'><span>&nbsp;&nbsp;&nbsp;&nbsp;上传视频日志记录</span></div>		
<?php
	$sql = "SELECT * FROM `video` inner join `user` on video.user_id=user.id ORDER BY `user_id` asc";
	$result=mysql_query($sql);
	$count = mysql_num_rows($result);
        $page_size=20; //每页显示的条目数
	$page_count = ceil($count/$page_size); //总显示页数
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
	$offset=$page_size*($page-1); 
	
	$sqlm = "SELECT * FROM `video` inner join `user` on video.user_id=user.id ORDER BY `user_id` asc limit $offset,$page_size";
	$result=mysql_query($sqlm);?>

 <!--显示日志列表List START -->
	<div style="width=95%;height:250px;margin-left:10px;overflow:auto;overflow-x: hidden">
	<table style="width:100%;margin:0 0 0 20px;">
  <tr style="border-right:solid 1px #bfcfda;color:#000;">
	<th>用户</th>
	<th>上传视频</th>
	<th>上传日期</th>
  </tr>
       <?php 
		while ($row=mysql_fetch_array($result)) {  
           	$up_date = date('Y-m-d',$row['uptime']);
		echo "<tr style='border-right:solid 1px #bfcfda;color:#000;'>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['title_cn']}</td>";
		echo "<td>{$up_date}</td>";
		echo "</tr>";
		

            } ?>
	</table>
	</div>
  <!--List END-->   
<!--上传视频的日志分页页码START-->
         <?php
                    $page_len = ($page_len%2)?$page_len:$page_len+1;//页码个数 
                    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$page/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($page!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&field=".$field."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&field=".$field."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
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
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&field=".$field."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($page!=$pages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&field=".$field."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&field=".$field."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                  <?php echo $key?>


                <!--上传视频的日志分页页码END-->

                <!--授权视频的日志start-->
        <div class='orange16' style='margin-top:50px;'><span>&nbsp;&nbsp;&nbsp;&nbsp;授权视频日志记录</span></div>
<?php
$sql = "SELECT user.name,authen.title_cn,authen.valid_dt,authen.type from `authen` inner join `user` on authen.user_id=user.id order by authen.valid_dt desc";
	$result=mysql_query($sql);
	$count = mysql_num_rows($result);
        $authpage_size=20; //每页显示的条目数
	$authpage_count = ceil($count/$authpage_size); //总显示页数
	if($authpage_count<=0){$authpage_count=1;}
	$init=1; 
	$authpage_len=7;///显示的页码数
	$max_p=$authpage_count;
	$pages=$authpage_count;

			
	//判断当前页码 
	if (empty($_GET['authpage'])||$_GET['authpage']<1) { 
		$authpage=1; 
	} else { 
		$authpage=$_GET['authpage']; 
		} 
	$offset=$authpage_size*($authpage-1); 
	
	$sqlm = "SELECT user.name,authen.title_cn,authen.valid_dt,authen.type,authen.authen_date from `authen` inner join `user` on authen.user_id=user.id order by authen.valid_dt desc limit $offset,$page_size";
	$result=mysql_query($sqlm);?>

 <!--显示日志列表List START -->
	<div style="width=95%;height:250px;margin-left:10px;overflow:auto;overflow-x: hidden">
       <table style="width:100%;margin:0 0 0 20px;">
  <tr style="border-right:solid 1px #bfcfda;color:#000;">
	<th>用户</th>
	<th>授权视频</th>
	<th>授权日期</th>
	<th>授权类型</th>
  </tr>
       <?php 
		while ($row=mysql_fetch_array($result)) {  
           	$up_date = date('Y-m-d',$row['authen_date']);
		echo "<tr style='border-right:solid 1px #bfcfda;color:#000;'>";
		echo "<td>{$row['name']}</td>";
		echo "<td>{$row['title_cn']}</td>";
		echo "<td>{$up_date}</td>";
		echo "<td>{$row['type']}</td>";
		echo "</tr>";
		

            } ?>
	</table>
	</div>

  <!--List END-->   
<!--授权视频的日志分页页码START-->
         <?php
                    $authpage_len = ($authpage_len%2)?$authpage_len:$authpage_len+1;//页码个数 
                    $authpageoffset = ($authpage_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$authpage/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($page!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?authpage=1&field=".$field."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?authpage=".($page-1)."&field=".$field."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
                    }
                    else { 
                        $key.="&nbsp;第一页&nbsp;";//第一页 
                        $key.="&nbsp;上一页&nbsp;"; //上一页 
                    } 
                    if($pages>$authpage_len){ 
                    //如果当前页小于等于左偏移 
                        if($authpage<=$authpageoffset){ 
                            $init=1; 
                            $max_p = $authpage_len; 
                        }
                        else{//如果当前页大于左偏移 
                            //如果当前页码右偏移超出最大分页数 
                            if($authpage+$authpageoffset>=$pages+1){ 
                                $init = $pages-$authpage_len+1; 
                            }
                            else{ 
                                //左右偏移都存在时的计算 
                                $init = $authpage-$authpageoffset; 
                                $max_p = $authpage+$authpageoffset; 
                                } 
                        } 
                    } 
                    for($i=$init;$i<=$max_p;$i++){ 
                        if($i==$authpage){ 
                            $key.=' <span class="currentPage">'.$i.'</span>'; 
                        }
                        else { 
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?authpage=".$i."&field=".$field."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($authpage!=$pages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?authpage=".($page+1)."&field=".$field."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?authpage={$pages}&field=".$field."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                  <?php echo $key?>


                <!--授权视频的日志分页页码END-->

<?php break;} ?>

</div>    
     
    
    

<?php
	require('common/footer.php');
?>
<!--
<script>

function clock()
  {
	   $.post("select.php",
	  {
		name:"视频文件",
		status:"状态"
	  },
	  function(data){
		//alert(data.name);
		
		//data=JSON.parse(data);
		//console.log(data[1].status);
		for(var i=0;i<data.length;i++){
			var n=Number(data[<?php //echo $upstatus-1;?>].status);
		switch(n){
				case 0:
				//$("#content").append("<p>待转码</p>");
				$("#<?php //echo $video_id;?>").html("待转码");
				break;
				case 1:
				//$("#content").append("<p>正在转码</p>");
				//$("#content").html("正在转码");
				$("#<?php //echo $video_id;?>").html("正在转码");
				
					  /* var idiv=document.getElementById('progressNumber');
					   var ibox=document.getElementById('ibox');
					   //var timer=null;

					   timer=setInterval(function(){
						   var iWidth=idiv.offsetWidth/ibox.offsetWidth*100;
						   idiv.style.width=idiv.offsetWidth+1+'px';//灰色长度增1px；
							   idiv.innerHTML=Math.round(iWidth)+"%";//数字%；
							   if(idiv.style.width==100){
						      clearInterval(timer);	
						   }
							},"1000")*/
				break;
				case 2:
				
				//$("#content").append("<p>视频已转码</p>");
				//$("#content").html("视频已转码");
				$("#<?php //echo $video_id;?>").html("完成");
				$("#listbox").css({display:"none"});
				//clearInterval();
				break;
			}
		}		
		//for(var i=1;i<=data[0]+1;i++){
		//	console.log(data[i]);
			//$("#content").append("<p>"+data[i].status+"</p>");
		//	$("#content").append("<p>视频已转码</p>");
		//}
		//console.log(data[0]);
		
		//console.log($("#content").html(data));
		//$("#content").append("<p>"+data["name"]+"</p>");
		//$("#content").append("<p>"+data.status+"</p>");
	  },"json"
	  )
	  
  }

</script>
-->
<script>
var sid='';
function clock(sid)
  {
       $.post("selectvideoupload.php",
      {
        name:"视频文件",
        status:"状态",
        id:sid
      },
      function(data){
        //alert(data.name);
        
        //data=JSON.parse(data);
        //console.log(data);
        //console.log(data[1].status);
        //for(var i=0;i<data.length;i++){
            var n=Number(data.status);
        switch(n){
                case 0:
                //$("#content").append("<p>待转码</p>");
                $("#"+sid+"").html("待转码");
                break;
                case 1:
                //$("#content").append("<p>正在转码</p>");
                //$("#content").html("正在转码");
                $("#"+sid+"").html("正在转码");
                break;
                case 2:
                
                //$("#content").append("<p>视频已转码</p>");
                //$("#content").html("视频已转码");
                $("#"+sid+"").html("完成");
		$("#listbox").css({"display":"none"});
                clearInterval(int);
                break;
            }
        //}     
        //for(var i=1;i<=data[0]+1;i++){
        //  console.log(data[i]);
            //$("#content").append("<p>"+data[i].status+"</p>");
        //  $("#content").append("<p>视频已转码</p>");
        //}
        //console.log(data[0]);
        
        //console.log($("#content").html(data));
        //$("#content").append("<p>"+data["name"]+"</p>");
        //$("#content").append("<p>"+data.status+"</p>");
      },"json"
      )

      
  }
  /*
  var aa={
    "fdf":22,
    "ggg":44
  }
  aa=JSON.stringify(aa);
  console.log(aa);
  */
</script>
