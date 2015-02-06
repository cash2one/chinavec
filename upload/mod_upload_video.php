<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
-->
<title>微电影上传</title>
<link rel="stylesheet" type="text/css" href="css/upload.css" />
</head>
<?php 
	session_start();
	include "../common/checkLog.php";
	include "common/visitRight.php";
	require('lib/connect.php');

?>
<!--登录-->
<?php 
if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true))
{
	include "../login.php"; 
	//include "siteview.php";
}else{
	include "../LoginSuccess.php";
	//include "userview.php";
};

	   if (isset($_GET['id'])) {
            $id = $_GET['id'];
		}
$sql="select * from `video` where `id`='$id'";
$result=mysql_query($sql);
$row=mysql_fetch_array($result);
switch ($row['type_id']){
	case 1:
	  $type="微电影";
	  break;
	case 2:
	  $type="微纪录";
	  break;
	case 3:
          $type="微栏目";
	  break;
	case 4:
	  $type="微动漫";
	  break;
	case 5:
	  $type="创意视频";
	  break;
	case 6:
	  $type="信息视频";
	  break;
}
?>
<!--登录-->
<body>
<div id="log" style="width:900px;margin:0 auto;">
	<img src="../img/vec_logo2.jpg" width=800>
</div>
<div id="layout">
	<?php 
		include "./common/table.php";
	?>
<!--<div class="well" style="width:500px;margin:auto">-->
<div style="width:960px; margin:0 auto; clear:both;border-radius: 5px;" class="change">
	<h2 class="post_title">微视频基本信息</h2>
	<div style=" width:960px; margin:0 auto;" class="post_left">
		<form id="form" method="post" action="uploadVideoPro.php?id=<?=$id?>" enctype="multipart/form-data">
            <table>
                <tbody>
                    <tr>
                        <td class="label">视频名称（中文）：</td>
                        <td><input name="titleCn" id="titleCn" title="视频中文名称" type="text" value="<?=$row['title_cn']?>" /></td>
                        
                    </tr>
                    <tr>
                        <td class="label">视频名称（英文）：</td>
                        <td><input name="titleEn" id="titleEn" title="视频英文名称" type="text" value="<?=$row['title_en']?>" /></td>
                    </tr>
                    <tr>
                        <td class="label">导演：</td>
                        <td><input type="text" id="director" name="director" title="导演"  value="<?=$row['director']?>" /></td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="tips">*多个导演用“,”隔开</p></td>
                    </tr>
                    <tr>
                        <td class="label">制作：</td>
                        <td><input type="text" id="producer" name="producer" title="制作"  value="<?=$row['producer']?>" /></td> 
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="tips">*多个制作用“,”隔开</p></td>
                    </tr>
                    <tr>
                        <td class="label">主演：</td>
                        <td><input name="stars" id="stars" title="主演" type="text" value="<?=$row['stars']?>" /></td>
                    </tr>
                     <tr>
                        <td></td>
                        <td><p class="tips">*多个主演用“,”隔开</p></td>
                    </tr>
                    <tr>
                        <td class="label">时长：</td>
                        <td><input name="dur" id="dur" title="时长" type="text" value="<?=$row['dur']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="tips">*请填写秒数，格式为：200</p></td>
                    </tr>
                    <tr>
                        <td class="label">标签：</td>
                        <td><input name="tags" id="tags" title="标签" type="text" value="<?=$row['tags']?>" />
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="tips">*请填写标签，多个标签请用全角分号“；”隔开</p></td>
                    </tr>
                    <tr>
                        <td class="label">联系电话：</td>
                        <td><input name="tel" id="tel" title="联系电话" type="text" value="<?=$row['contact_tel']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">微信：</td>
                        <td><input name="wechat" id="wechat" title="微信" type="text" value="<?=$row['contact_wechat']?>"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="label">QQ：</td>
                        <td><input name="qq" id="qq" title="QQ" type="text" value="<?=$row['contact_qq']?>"/>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">视频类型：</td>
                         <td>
                            <select name="videoType" id="videoType" title="视频分类">
                                <option value="<?=$type?>" selected="selected"><?=$type?></option>
                                <option value="1">微电影</option>
                                <option value="2">微纪录</option>
                                <option value="3">微栏目</option>
                                <option value="4">微动漫</option>
                                <option value="5">创意视频</option>
                                <option value="6">信息视频</option>
                            </select>
                        </td>
                    </tr>
                    <!--<tr>
                        <td class="label">视频封面图：</td>
                        <td><input type="file" name="poster" id="poster" title="海报" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="tips">没有海报请上传一张精彩的视频截图。大小建议不小于120*170</p></td>
                    </tr>
                    <tr>
                        <td class="label">视频地址：</td>
                        <td><input type="file" id="fileToUpload" multiple="multiple" onchange="fileSelected();" />
                        </td>
			<!--<div class="well">
			<div id="fileName"></div>
			<div id="fileSize"></div>
			<div id="fileType"></div>
			<div id="Type"></div>
		</div>	
	<td><div class="progress progress-striped" style="width: 600px;" margin="0 auto;">
			<div id="progressNumber" class="bar" margin="0 100px auto;"></div>
		</div>
                    </tr>

                    <tr>
                        <td></td>
                        <td><p class="tips">请上传作品文件</p></td>
                    </tr>
<!--<p><div class="progress progress-striped" style="width: 600px;" margin="0 auto;">
			<div id="progressNumber" class="bar" margin="0 100px auto;"></div>
		</div></td></p>-->
                    <tr class="label">
                        <td>剧情简介：</td>
                        <td><textarea name="dscrp" id="dscrp" title="剧情简介" rows="8" cols="40"><?=$row['dscrp']?></textarea></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><p class="tips">*内容不能少于20个字</p></td>
                    </tr>
                    <tr>
                        <td></td>
                        
		<td><input class="button" type="submit" value="提交信息"  style="width:100px;" />
		<!--<td class="button"><input id="submit" type="submit" name="submit" value="确定" /></td>
		<input class="btn" type="button" onclick="uploadCanceled()" value="取消上传" />-->                        

		<input class="button" id="reset" type="reset" name="reset" value="重置" style="width:100px;" /></td>
                    </tr>
                </tbody>
            </table>
		</form>
	</div>
	</div>
</div>


<script type="text/javascript">
    $(function() {
        $("#titleCn").focus();
        
        $("form").submit(function() {
            if ($("#titleCn").val() && $("#director").val()&& $("#videoType").val()&& $("#dur").val()&& $("#dscrp").val()) {
                return true;
            }
            else {
                alert("请输入完整信息！");
                return false;
            }
        });
    })



	</script>
</body>
</html>
<?php
	echo require('common/footer.php');
?>

