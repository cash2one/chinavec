<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>剧本征集</title>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script> 
<script type="text/javascript" src="js/SubmitActivityInfo.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/moreTitleInfo.css" />
<link rel="stylesheet" type="text/css" href="css/activityPublish.css" />
</head>
<body>
	<?php 
		session_start();
		require "common/checkLog.php";
	?>

	<div id="header" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
	<div id="layout">
    <?php
        include("common/table.php");
    ?>
        <div  class="publishBack">
            <!--页面标题START-->
            <div class="showInfoTitle">
            	<h2>发布活动信息</h2>
                <div class="step_progress">
                  <div class="titleCenter" align="center">
                    <div class="stepCurrent">
                        <span>1</span>
                        <strong>协议阅读</strong><p>阅读并同意活动协议</p>
                    </div>
                    <div class="stepNormal">
                        <span>2</span>
                        <strong>填写活动内容</strong><p>请详细正确地填写相关信息</p>
                    </div>
                    <div class="stepNormal">
                        <span>3</span>
                        <strong>发布成功</strong><p>完成发布，活动开始</p>
                    </div>
                    </div>
                </div>
            </div>
            <!--页面标题END-->
            <!--协议START-->
            <div class="xieyi">
                <p align="center" class="black15Weight">活动发布协议</p><p><strong>本着公开、公平、公正、诚实、守信的原则，请您在发布活动前仔细阅读活动发布规则：</strong> </p>
                <p><strong>一、总则：</strong><br />
                1、用户应当遵守国家法律、法规、行政规章的规定。对任何涉嫌违反法律、法规、行政规章的行为，本协议已有规定的，适用本协议；本协议尚无规定的，中国微视频协作与交易平台有权酌情处理。但中国微视频协作与交易平台对用户的处理不免除其应当承担的法律责任。 <br/>
                2、用户在中国微视频协作与交易平台上的全部行为仅代表其个人或法人，中国微视频协作与交易平台不负任何法律责任，基于该行为的全部责任应当由用户自行承担。<br />
                3、用户在中国微视频协作与交易平台注册成为会员时起，应当接受并同意本协议，否则不能使用中国微视频协作与交易平台交易平台的各项活动。中国微视频协作与交易平台有权随时修改本协议并在网站上予以公告。自公告之日起，若会员不同意相关修改的，可以停止使用中国微视频协作与交易平台的相关活动或产品；若继续使用的，则视为接受修改后的规则。<br /></p><p><strong>
                二、活动发布规则：</strong> <br />
                1、活动发布者自由定价，自由选择发布活动模式、提供活动所需时间。<br />
                2、活动发布者发布活动前，请填写实名和真实联系方式，保证中国微视频协作与交易平台随时可以与您取得联系。<br />
                3、活动发布者所提供的活动一旦达成交易，所发布的活动信息将自动转为成功案例并在网站上公示。<br />
                <strong>三、违反法律规定，禁止发布的活动类型：</strong><br/>
                1、软件破解、程序破解等侵犯第三方知识产权类活动；<br />
                2、游戏外挂、程序外挂类活动；<br />
                3、盗取网银账号、游戏账号等侵犯第三方隐私类活动；<br />
                4、侵犯第三方知识产权的活动；<br />
                5、侵犯第三方权利的活动；<br />
                6、木马、黑客程序等危害网络安全的活动；<br />
                7、涉黄、赌博等国家命令禁止类活动；<br />
                8、其他违反法律、法规、行政规章等相关规定的活动。<br /><strong>
                四、带有欺诈性质，禁止发布的活动类型：</strong>
                1、需要银行账号验证或者付费才能参与的活动；<br />
                2、以招兼职为名进行的欺诈类活动；<br />
                3、可能套取任务参与方身份证、邮箱、手机号、银行账号、支付宝账号等个人或者机构隐私信息的活动；<br />
                4、刷钻、刷信用、账号买卖等活动；<br />
                5、要求任务参与者发布虚假信息的活动；<br />
                6、活动描述通过链接等方式逃避中国微视频协作与交易平台审核的；<br />
                7、可能给他人或者其他机构带来损害的活动；<br />
                8、其他违背社会伦理或社会主流价值观的活动。<br /><strong>
                五、附加条款：</strong> <br />凡是发布活动的会员即视为同意本协议。&nbsp;</p>
            </div>
            <!--协议END-->
            <!--右侧流程START-->
            <div class="introduction">
            <p><strong>线下活动的一般流程：</strong><br/>
            1、已注册并登录的会员在线下活动页面发布信息，务必填写真实资料。<br/>
            2、后台管理员审核后，进行活动发布，活动信息将显示在线下活动页面中。<br/>
            3、参与活动的用户根据联系方式自行联系活动发布者，进行相应的站外交付。<br/>
            4、活动结束后，活动发布者可以点击登录后页面右上角的用户名，进入个人信息页面，进入“活动记录页面”，结束活动。
            </p>
            </div>
            <!--右侧流程END-->
       
            <!--下一步按钮START-->
            <div class="nextStep">
                <a href="activityPublishStep2.php">同意，下一步</a>
            </div>
            <!--下一步按钮END-->
        </div>
    </div>
</body>
<?php 
include("common/footer.php");
?>
</html>