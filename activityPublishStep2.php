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

<script type="text/javascript" src="js/jquery.js"></script>	
<script type="text/javascript" src="js/ajaxfileupload.js"></script>
<script type="text/javascript">
function ajaxFileUpload()
	{
		$("#loading")
		.ajaxStart(function(){
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
		});

		$.ajaxFileUpload
		(
			{
				url:'doajaxfileupload.php',
				secureuri:false,
				fileElementId:'fileToUpload',
				dataType: 'json',
				data:{name:'logan', id:'id'},
				success: function (data, status)
				{
					if(typeof(data.error) != 'undefined')
					{
						if(data.error != '')
						{
							document.getElementById('info').innerHTML=data.error;
						}else
						{
							document.getElementById('info').innerHTML=data.msg;
							//alert(data.msg);//提示信息的地方
						}
					}
				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;
	}
	</script>	
	 
</head>
<body>
	<?php 
		session_start();
		require "common/visitRight.php";
		require "common/checkLog.php";
	?>

	<div id="header" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
	</div>
	<div id="layout">
    <?php
        include("common/table.php");
    ?>
        <div  class="publishBackShort">
            <!--页面标题START-->
            <div class="showInfoTitle">
            	<h2>发布活动信息</h2>
                <div class="step_progress">
                <div class="titleCenter" align="center">
                    <div class="stepNormal">
                        <span>1</span>
                        <strong>协议阅读</strong><p>阅读并同意活动协议</p>
                    </div>
                    <div class="stepCurrent">
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
			<!--内容填写START-->
            <div class="form">
                <form>
					<table>
						<tbody>
								<tr>
									<td class="black14WeightArial" width="150px">活动类型：</td>
									<td width="500px">
										<select name="taskType" id="taskType" title="活动类型" onblur="checkActivityInput('taskType')">
											<option value="" selected="selected">请选择分类</option>
											<option value="1">剧本出售</option>
											<option value="2">团队招募</option>
											<option value="3">剧本征集</option>
											<option value="4">寻求投资</option>
										</select>
									<span id="taskType-info"></span></td>
								</tr>
								<tr>
									<td class="black14WeightArial">活动标题：</td>
									<td><input name="title" id="title" title="活动标题" type="text" autocomplete="off" onblur="checkActivityInput('title')"/>
                                    <span id="title-info"></span></td>
									
								</tr>
								<tr>
									<td class="black14WeightArial">内容描述：</td>
									<td><input type="textarea" rows="10" cols="30" id="content" name="content" title="内容描述"  onblur="checkActivityInput('content')"/>
									<span id="content-info"></span></td>
								</tr>
								<tr>
									<td class="black14WeightArial">联系方式：</td>
									<td><input name="contact" id="contact" title="联系方式" type="text" onblur="checkActivityInput('contact')"/>
									<span id="contact-info"></span></td>
								</tr>
                                <tr>
                                <td colspan="3"><font color=green size=0.5em>*请输入11位手机号码、3位区号+8位号码、4位区号+7位号码，区号和号码之间用"-"或者空格隔开，手机号码以1开头，区号以0开头</font></td>
								</tr>
								<tr>
									<td class="black14WeightArial">参考价格：</td>
									<td><input name="cost" id="cost" title="商品价格" type="text" onblur="checkActivityInput('cost')"/>
									<span id="cost-info"></span></td>
								</tr>
                                <tr>
                                <td></td>
								<td colspan="3"><font color=green size=0.5em>*可自定义商品价格，免费请填“0”，单位为人民币</font></td>
								</tr>
								<tr>
								<td class="black14WeightArial">上传图片：</td>
								<td><input id="fileToUpload" type="file" size="20" name="fileToUpload" class="input" onchange="getFileName()" /></td>
								</tr>
                                <tr>
                                <td></td>
                                <td>
								<span><button class="button" id="buttonUpload" onclick="return ajaxFileUpload();">点击上传</button></span>
								<span><img id="loading" src="img/loading.gif" style="display:none;"></span> 
								<span id="info" class="black14"></span>
								</td>
								</tr>
                                <tr>
                                <td></td>
								<td colspan="3"><font color=green size=0.5em>*请上传*.jpg类型的图片</font></td>
								</tr>
								<tr>
                                	<td></td>
									<td><button type="button" id="submitActivity" class="submit" disabled="disabled" onclick="SubmitActivityInfo()">提交</button></td>
									<td><p id="returnInfo"></p></td>
								</tr>
							
						</tbody>
					</table>
                </form>
            </div>
			<!--内容填写END-->
        </div>
    </div>
</body>
<?php 
include("common/footer.php");
?>
</html>