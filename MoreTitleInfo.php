<?php 
session_start();
$task_type_id=$_GET['task_type_id'];

//登录
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	//include "siteview.php";
}else{
	include "LoginSuccess.php";
	//include "userview.php";
};

//登录
require('lib/connect.php'); 
header("Content-Type:text/html;charset=UTF-8");

		//提取活动信息
		$sql_activity="SELECT task.* FROM task WHERE task_type_id=$task_type_id ORDER BY `id` DESC";
		//echo $sql_activity;
		$result_activity=mysql_query($sql_activity);
		
		$count=mysql_num_rows($result_activity);

        $Page_size=6; //每页显示的条目数
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

		$sql_activity="SELECT task.* FROM task WHERE task_type_id=$task_type_id 
					ORDER BY `id` DESC limit $offset,$Page_size";
		$result_activity=mysql_query($sql_activity);
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/moreTitleInfo.css" />	
    <link rel="stylesheet" type="text/css" href="css/base.css" />
</head>
<body>
<!--header-->
<div id="layout">
    <div id="logo" style="width:900px;margin:0 auto;">
        <center><img src="img/vec_logo2.jpg" width=800></center>
    </div>
    <?php 
        include "common/table.php";
    ?>
    <div class="activityBack">
        <!--选项卡开始-->
        <div class="navList">
            <ul>
             <?php
                $fieldArr = array(
                    "1" => "剧本出售",
                    "2" => "团队招募",
                    "3" => "剧本征集",
                    "4" => "寻求投资"
                );
    
                foreach ($fieldArr as $key => $value) {
                    $class = "navTitle";
                    if ($key == $task_type_id) {
                        $class = "selected";
                    }
                   else {
                        $class = "navTitle";
                    }
                    echo <<<LI
                    <li><a class="$class" href="MoreTitleInfo.php?task_type_id=$key">$value</a></li>
LI;
                }
            ?>
            </ul>
        </div>
        <!--选项卡结束-->
        <!--左侧列表START-->
        <div class="tableList" >
        <?php
            echo "<table>
            <tbody>
                <tr>
					<th></th>
                    <th>标题</th>
                    <th>发布者</th>
                    <th>活动状态</th>
                </tr>";
            for($j=0;$j<$count;$j++)
            {
                if($row_activity=mysql_fetch_object($result_activity))
                { 
                    $time=$row_activity->create_time;
                    $date=date('Y-m-d H:i:s',$time);
                    //获取用户名
                    $sql_user="SELECT user.name FROM user WHERE id='{$row_activity->user_id}'";
                    $result_user=mysql_query($sql_user);
                    $row_user=mysql_fetch_object($result_user);
                    $username=$row_user->name;
                    
                    $title=$row_activity->title;
                    $content=$row_activity->content;
                    $contact=$row_activity->contact;
                    switch($row_activity->task_type_id){
                                    case 1: $typeName = "剧本出售";break;
                                    case 2: $typeName = "团队招募";break;
                                    case 3: $typeName = "剧本征集";break;
                                    case 4: $typeName = "寻求投资";break;
                                    default: $typeName = "剧本出售";break;
                                    }
                    
                    if($row_activity->status){
                        $status='已完成';
                    }else{
                        $status='进行中';
                    }	


					$file = $config['activityPhoto'].$row_activity->id.".jpg";
					if(file_exists($file)){
						$photo = $row_activity->id.".jpg";
						//echo $poster;
						//exit;
					}
					else{
						$photo = "0.jpg";
						//echo $poster;
						//exit;
						}
                    echo <<<TR
                    <tr onmouseover="style.backgroundColor='#F0FAD9'" onmouseout="style.backgroundColor='#FFFFFF'">
						<td><a href='ShowInfo.php?task_id={$row_activity->id}'><img src="{$config['activityPhoto']}{$photo}" width="58" height="58" /></a></td>
                        <td>
                            <a class='black14Weight' href='ShowInfo.php?task_id={$row_activity->id}'>{$title}</a><br/>
                            <span class='gray12'>活动种类：</span><span class='green12'>$typeName</span>
                            <span class='gray12'>&nbsp;&nbsp;&nbsp;发布时间：$date</span>
                        </td>
                        <td class='black14' align='center'>{$username}</td> 
                        <td class='black14' align='center'>{$status}</td>
                    </tr>
TR;
                }
            }/*<td><a href='ShowInfo.php?task_id={$row_activity->id}'>{$date}</a></td>*/
            echo "</tbody></table>";
        ?>		
            
                <?php
                    $page_len = ($page_len%2)?$page_len:$page_len+1;//页码个数 
                    $pageoffset = ($page_len-1)/2;//页码个数左右偏移量 
                    
                    $key='</br><div class="page">'; 
                    $key.="<span>$page/$pages&nbsp;&nbsp;</span> "; //第几页,共几页 
                    if($page!=1){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=1&task_type_id=".$task_type_id."\"><span>&nbsp;第一页&nbsp;</span></a> "; //第一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page-1)."&task_type_id=".$task_type_id."\"><span>&nbsp;上一页&nbsp;</span></a>"; //上一页 
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
                            $key.=" <a href=\"".$_SERVER['PHP_SELF']."?page=".$i."&task_type_id=".$task_type_id."\"><span class='notCurPage'>".$i."</span></a>"; 
                        } 
                    } 
                    if($page!=$pages){ 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page=".($page+1)."&task_type_id=".$task_type_id."\">&nbsp;下一页&nbsp;</a> ";//下一页 
                        $key.="<a href=\"".$_SERVER['PHP_SELF']."?page={$pages}&task_type_id=".$task_type_id."\">&nbsp;最后一页&nbsp;</a>"; //最后一页 
                    }else { 
                        $key.="&nbsp;下一页&nbsp; ";//下一页 
                        $key.="&nbsp;最后一页&nbsp;"; //最后一页 
                    } 
                    $key.='</div>'; 
                    ?>
            
                    <div class="page"><?php echo $key?></div>
                    </div>
            <!--左侧列表END-->
		<!--右侧列表START-->
        <div class="recommendList">
        <a href="activityPublish.php"><button class="xuanze">发布活动信息</button></a>
        <p class="black15Weight">最新发布</p>
        <?php 		
		$sql_activity="SELECT task.* FROM task ORDER BY `id` DESC LIMIT 0,5";
		//echo $sql_activity;
		$result_activity=mysql_query($sql_activity);
		while($row_activity=mysql_fetch_object($result_activity)) {
			$time=$row_activity->create_time;
            $date=date('Y-m-d H:i:s',$time);
			switch($row_activity->task_type_id){
				case 1: $typeName = "剧本出售";break;
				case 2: $typeName = "团队招募";break;
				case 3: $typeName = "剧本征集";break;
				case 4: $typeName = "寻求投资";break;
				default: $typeName = "剧本出售";break;
				}

			$sql_user="SELECT user.name FROM user WHERE id='{$row_activity->user_id}'";
			$result_user=mysql_query($sql_user);
			$row_user=mysql_fetch_object($result_user);
			$username=$row_user->name;

			
echo <<<UL
			<ul>
				<li class='black14Weight'><a href='ShowInfo.php?task_id={$row_activity->id}'>{$row_activity->title}</a></li>
				<li class='black12'>$username</li>
				<li><span class='gray12'>活动种类：</span><a href="MoreTitleInfo.php?task_type_id=$row_activity->task_type_id"><span class='green12'>$typeName</span></a></li>
				<li class='gray12'>发布于$date</li>
				<li><hr style=" width:260px; margin-left:2px; margin-top:10px; float:left;border:1px solid #D9D9D9" /></li>
			</ul>
UL;
		
		}
		
		 ?>
        <ul>
        <li></li>
        </ul>
        </div>
        <!--右侧列表END-->

        </div>

</div>
</body>
<?php
	require('common/footer.php');
?>
</html>
