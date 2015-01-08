<!DOCTYPE HTML>
<html>
<head>
<title>项目</title>
	<meta charset="UTF-8">
    <?php date_default_timezone_set("Asia/Shanghai");?>
	<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/item.css" />	
    <link rel="stylesheet" type="text/css" href="css/base.css" />
</head>
<body>
<?php 
session_start();
if(isset($_GET['item'])){
	$item=$_GET['item'];
	}
else{
	$item = '1';}

require "common/checkLog.php";
require('lib/connect.php'); 
header("Content-Type:text/html;charset=UTF-8");
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
?>
<div id="layout">
    <div id="log" style="width:900px;margin:0 auto;">
        <center><img src="img/vec_logo2.jpg" width=800></center>
    </div>
    <?php 
        include "common/table.php";
    ?>
    <div class="activityBack">
        <!--选项卡开始-->
        <div class="navList">
            <ul>
            <li class="navTitleHead">在营项目>>></li>
             <?php
                $fieldArr = array(
                    "1" => "微视频营销项目",
                    "2" => "导演培育计划",
                    "3" => "大型微电影活动",
                );
    
                foreach ($fieldArr as $key => $value) {
                    $class = "navTitle";
                    if ($key == $item) {
                        $class = "selected";
                    }
                   else {
                        $class = "navTitle";
                    }
                    echo <<<LI
                    <li><a class="$class" href="item.php?item=$key">$value</a></li>
LI;
                }
            ?>
            </ul>
        <div class="navFooter"></div>
        </div>
        <!--选项卡结束-->
		<!--右侧列表START-->
		<div class="rightList">
        <h2 align="center">微视频营销项目启动！</h2>
        <img src="img/weiyingxiao.jpg" width="600px" style="margin-top:20px; margin-left:30px;"/>
        <div class="dpbox">
        	<div class="TBox"><span class="black15Weight">什么是微视频营销？</span></div>
            <div class="CBox">
                <p>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微视频营销是一种即不同于商业化的影视大片，也不同于大众言论的视频短片，而是介于两者之间的一种新媒体网络化的营销手段。微电影
                营销就是以微视频的内容为广告载体，借助定制或广告植入微微视频这种新媒体作为推广手段、以互联网和移动互联网作为营销平台的新媒体营销
                策略。相对与传统媒体营销而言，微视频营销更具亲和力和表现力。对于企业而言，企业微视频定制或植入广告的宣传方式更为柔和。在故事叙
                述的同时，使观众在潜移默化中接受企业品牌。而且微视频主要以情节刻画为主，所以相对于商业大片，企业更容易将品牌信息融入故事情节中，
                通过故事的演绎表达企业品牌内涵，引起观众的共鸣。微视频营销对于企业而言无论从难度还是从宣传效果来说，均占有先天优势。
                </p>
            </div>
        </div>
             
            <div class="dpbox">
                <div class="TBox"><span class="black15Weight">微视频营销案例赏析</span></div>
                <div class="CBox">
                    <p>
                    <span class="orange14">《I&nbsp;&nbsp; Know&nbsp;&nbsp; YOU》</span><br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="black12" style="font-weight:600">出品方</span>：三星手机 　　<span class="black12" style="font-weight:600">上映：</span>2012年7月 　　<span class="black12" style="font-weight:600">导演：</span>夏永康 　　<span class="black12" style="font-weight:600">演员：</span>周迅 井柏然<br/>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微电影是三星电子为宣传galaxy的品牌概念，携手周迅、井柏然及鬼才导演彭浩翔，推出了这部具有现实主义色彩的科幻文艺微电影，以全新的角度阐释简单纯粹的
                    爱情主题。    影片中周迅所饰演的外星人来到地球与井柏然饰演的小厨师之间产生爱情的火花。而片中三星手机成为了剧情承接的重要工具。两人在相处中的每一个时
                    段都有手机的参与。并且片中也在不同场合展现三星新款手机的特写镜头。</p>
                    <p> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;此部微电影作品是定制类微电影的典型代表，借助明星效应，和娴熟精致的拍摄手法。将产品理念与微电影相融合，并结合新颖的剧情，使的商业性广告和电影艺术的完美结合。并通过电影艺术的表现将广告所宣传理念推广给观众。</p>
                    </p>
                </div>
            </div>
            
             <div class="dpbox">
                <div class="TBox"><span class="black15Weight">联系我们</span></div>
                <div class="CBox" style="height:100px;">
                    <div class="leftB">
                        <p class="black12" style="font-weight:600;">您需要在微视频中植入您的产品广告吗？</p>
                        <p class="black12" style="font-weight:600;">您需要为您的品牌定制微视频吗？</p>
                        <p class="black12" style="font-weight:600;">您需要推广您的微视频吗？</p>
                    </div>
                    <div class="rightB">
                        <p class="black12" style="font-weight:600;">请联系我们：</p>
                        <p class="gray12">地址：北京市朝阳区中国传媒大学综合实验楼1601</p>
                        <p class="gray12">联系电话：010-65783635</p>
                    </div>
                    <p>
                    </p>
            	</div>
            </div>

        </div>

        </div>
        <!--右侧列表END-->
   </div>

</div>
</body>
<?php
	require('common/footer.php');
?>
</html>
