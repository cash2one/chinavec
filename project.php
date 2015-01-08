<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>主题微视频计划</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/spread.css" />
</head>

<body>
<?php 
session_start();
require "common/checkLog.php";
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "login.php"; 
	//include "siteview.php";
}else{
	include "LoginSuccess.php";
	//include "userview.php";
};
//登录
?>

<div id="log" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
</div>
	<div id="layout">

	<?php 
		include "common/table.php";
	?>
<div>
<div style=" background-color:#000; width:150px; height:40px; margin-top:50px; margin-bottom:0px; flout: left; clear:both;border-radius: 2px;" class="">
<p style="color:#FFFFFF; font-size:20px;margin:0;width:200px;">&nbsp;主题微视频计划</p>
</div>
<div style=" background-color:#FFFFFF; width:970px; height:1500px; margin:0 auto; clear:both; border-radius: 1px;" class="change">
    <div style=" width:800px; margin:0 auto;">
        <br/>
	 <img src="./img/bannar_xin.png" style="width:800px;" />
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“北京美丽乡村微电影计划”将围绕“寻找‘北京最美的乡村’宣传评选活动”同步展开， 以“微电影”形式为载体，以乡村的秀丽风景和淳朴风情为基础，以乡村的生产美、生活美、环境美、人文美为标志，策划、拍摄并传播本年度32个候选村主题微电影，展示村庄最新最美的风采。
        	</P>
        <span class="biaoti1">一、活动简介</span>
        	<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“北京美丽乡村微电影计划”采用“一个微电影团队、一个美丽乡村、一个品牌合作伙伴”的“1+1+1”模式，在坚持公益性原则基础上，由主办方和各村镇提供适当的条件支持，并遴选一批优秀而富有潜力的、能够完整承担微电影的策划、拍摄与制作工作的新锐团队，开展主题微电影创作。在具备条件的候选村镇，还将鼓励村民以说故事、演角色、搭场景等方式参与微电影创作，甚至以村民和农村宣传文艺骨干等为主体搭建微电影团队，促进村镇文化发展与精神文明建设。一部微电影总片长约为15分钟。<br/>
            </p>
        <span class="biaoti1">二、工作安排</span> 
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;“北京美丽乡村微电影计划”由中共北京市委农工委宣传处、宣教中心与中国传媒大学新媒体研究院共同组成“北京美丽乡村微电影计划”组委会。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1、中共北京市委农工委宣传处：负责对32个候选村的协调联络和部署。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2、中共北京市委农工委宣教中心：负责在“美丽乡村•新空间”视频网站上发布微电影计划官方网站。在组委会框架下与新媒体研究院共同负责剧本和成片的审查。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3、中国传媒大学新媒体研究院：负责组织创作团队和品牌合作伙伴，以及其与候选村的对接。负责制作官方网站和其它数字媒体内容，以及联系广播电视、视频网站等作品推广渠道。在组委会框架下与宣教中心共同负责剧本和成片的审查。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4、候选村：负责接洽创作团队的现场拍摄，提供本村文化特色等创作素材，有乡村旅游设施的候选村为创作团队在拍摄期间提供3天6人左右的简单食宿，超出此期限的食宿费用由拍摄团队承担。候选村可提供本色演员出演角色。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;5、创作团队：负责创作剧本、进行主题微电影作品的拍摄、剪辑等工作，向组委会提交成片。创作费用从品牌合作伙伴的赞助金中支付。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;6、品牌合作伙伴：负责针对其所选择的候选村的主题微电影提供赞助金，用于支付创作费用、推广费用等。</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;7、第三方文化机构：负责对主题微电影计划开展过程中所涉及的经济合作提供平台，管理品牌合作伙伴投入的赞助金，并根据创作团队所产生的实际支出，拨付创作费用，透明、公正、高效地完成主题微电影创作收支。同时鼓励、接收以京郊村镇为载体的区域经济品牌投资微电影。</br>
拍摄作品完成后相继传送到“北京美丽乡村网站”及“新空间网络视频平台”进行展示。同时协调有关媒体单位进行宣传推广，在各有关电视频道中进行播放。对承接微电影制作的乡村，将获得这些微电影作品的永久播放权。
            </p>
        <span class="biaoti1">三、组委会具体分工</span>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;拍摄作品完成后相继传送到“北京美丽乡村网站”及“新空间网络视频平台”进行展示。同时协调有关媒体单位进行宣传推广，在各有关电视频道中进行播放。对承接微电影制作的乡村，将获得这些微电影作品的永久播放权。</br><p>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主&nbsp;&nbsp; 任：市委农工委宣传处长 陈立玺，统筹部署；</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;副主任：市委农工委宣传处副处长 顾崇华，协调落实乡村配合工作；</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国传媒大学新媒体研究院副院长 曹三省，协调摄制组及品牌合作方；</br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;市委农工委宣教中心副主任 黄辉，组织协调网络、剧本及制作审查相关工作；
            </p></p>
         <span class="biaoti1">联系我们</span>
            <p>
                <ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;联系人：市委农工委宣传处 王楠</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;中国传媒大学新媒体研究院 张斌</li>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;市委农工委宣教中心 韩鹤 闫卫华</li>
                 
                </ul></p>
<p>
                <ul>
                    <li>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;邮&nbsp;&nbsp;&nbsp;箱：bjmlxcwdy@126.com</li>  
                </ul></p>
            <p style="padding-left:500px">北京美丽乡村微电影计划组委会</p>
<p style="padding-left:570px">2013.9.3</p>
        <br/>
	</div>
</div>
</div>
</div>
<?php
	require('common/footer.php');
?>
