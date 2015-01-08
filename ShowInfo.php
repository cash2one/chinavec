<?php
$task_id=$_GET['task_id'];
//$task_type=$_GET['task_type'];
session_start();
require('lib/connect.php'); 

//提取活动信息
$sql_activity="SELECT task.* FROM task WHERE id='{$task_id}'";
$result_activity=mysql_query($sql_activity);
?>

<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/base.css" />
    <link rel="stylesheet" type="text/css" href="css/moreTitleInfo.css" />
</head>
<body>
<!--登录-->
<?php 
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	//include "siteview.php";
}else{
	include "LoginSuccess.php";
	//include "userview.php";
};
?>
<!--登录-->
	<div id="logo" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
	<div id="layout">

	<?php
	include("common/table.php");	
	?>
	<div class="showBack">
		<?php
        if($row_activity=mysql_fetch_object($result_activity)){
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
			$task_type_id=$row_activity->task_type_id;
			switch($row_activity->task_type_id){
				case 1: $typeName = "剧本出售";break;
				case 2: $typeName = "团队招募";break;
				case 3: $typeName = "剧本征集";break;
				case 4: $typeName = "寻求投资";break;
				default: $typeName = "剧本出售";break;
				}

			if($row_activity->status){
				$status='本活动已结束';
				$statusClass='statusOver';
			}else{
				$status='进行中';
				$statusClass='statusOn';

			}
			if($row_activity->cost){
				$cost='￥'.$row_activity->cost.'元';
			}else{
				$cost='暂无';
			}

			?>
            <!--页面标题START-->
            <div class="showInfoTitle">
            	<h2><?php echo $title; ?></h2>
                <span class="darkGray13">发布时间：<?php echo $date; ?></span>
                <span class="darkGray13">&nbsp;|&nbsp;</span>
                <span class="darkGray13">类别：<?php echo $typeName; ?></span>
                <span class="darkGray13">&nbsp;|&nbsp;</span>
                <span class="darkGray13">编号：#<?php echo $task_id; ?></span>
            </div>
            <!--页面标题END-->
            <!--左侧区域START-->
				<div class='leftList' >
					<!--图片显示START-->
                    <div class="photoArea">
                    <?php 
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
					?>
                    <span><img src="<?php echo $config['activityPhoto'].$photo;?>" style="max-width:300px; max-height:280px;" /></span>
                    </div>
                    <!--图片显示END-->
                    <!--简介区域START-->
                    <div class="leftAbstract">
                    <p class="black14"><span class="black15Weight">发布者：</span><?php echo $username; ?></p>
                    <p class="black14"><span class="black15Weight">参考价格：</span><?php echo $cost; ?></p>
                    <p class="black14"><span class="black15Weight">交付方式：</span>站外交付</p>
                    <p class="black14"><span class="black15Weight">联系方式：</span><?php echo $contact; ?></p>
                    <button class="<?php echo $statusClass; ?>" disabled><?php echo $status; ?></button>
                    <!--友情提示START-->
                    <p class="warn">免责声明：本网所展示的商品与服务信息由买卖双方自行提供，其真实性、准确性和合法性由信息发布人负责。本网不提供任何保证，并不承担法律责任。</p>
                    <!--友情提示END-->
                    </div>
                    <!--简介区域END-->
                    <!--活动具体内容描述START-->
                    <div class="content">
                    <h2>内容描述</h2>
                    <p><?php echo $content; ?></p>
                    </div>
                    <!--活动具体内容描述END-->

				</div>
                <!--左侧区域END-->
		<?php	} ?>
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
		<!--同类推荐START-->
        <div class="similar">
            <h2>您可能感兴趣的同类活动</h2>
            <?php 
				//echo $task_type_id;
				$sql_similar="SELECT task.* FROM task WHERE `task_type_id` ={$task_type_id} ORDER BY `id` DESC LIMIT 0,5";
				//echo $sql_activity;
				$result_similar=mysql_query($sql_similar);
				while($row_similar=mysql_fetch_object($result_similar)) {
					$file_similar = $config['activityPhoto'].$row_similar->id.".jpg";
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
                    <a href="ShowInfo.php?task_id=<?php echo $row_similar->id;?>"><span><img src="<?php echo $config['activityPhoto'].$photo_similar;?>" width="150" height="110"/></span>
                	<p class="black14"><?php echo $row_similar->title; ?></p></a>
                </div>
				<?php }
            ?>
        </div>
        <!--同类推荐END-->
    </div>
	</div>
<?php 
	include("common/footer.php");
?>
