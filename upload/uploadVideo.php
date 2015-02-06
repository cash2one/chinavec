<?php 
/*	创建时间：		2013年8月6日
	编写人：			于鉴桐
	版本号：			v1.0
	
	修改记录：		原始版本v1.0
							
					
	已实现主要功能点：
	
	待实现主要功能点：	1. 计算视频时长的脚本文件及文件的说明文档
					2. 整合本文件的css文件
					3. 对已上传视频的帧截图功能
					4. 上传方式可否使用ftp协议，在网页形式上上传		
*/
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<title>微电影上传</title>
<link rel="stylesheet" type="text/css" href="css/upload.css" />
<style>
 .notice{
	color:red;
}
</style>
</head>
<?php 
	session_start();
	include "common/checkLog.php";
	include "common/visitRight.php";
	include "config/config.php";
	include "lib/connect.php";

?>

<body>
<div id="header" style="width:900px;margin:0 auto;">
	<img src="img/vec_logo2.jpg" width=800>
</div>
<div id="layout">
	<?php 
		include "common/table.php";
		$id=$_GET['ID'];
		$username = $_SESSION['user_name'];
		$sql = mysql_query("select * from `user` where `name`='$username'");
		$row = mysql_fetch_array($sql);
		$user_id = $row['id'];
		$sql = mysql_query("select user_id from video where id = '$id'");
		$row = mysql_fetch_array($sql);
		if($row['user_id']!=$user_id){
		echo "<script>alert('非法访问');</script>";
		echo "<script>history.back(-1);</script>;";		
		}
	?>


    <div style="width:760px; height:900px; margin:0 auto; clear:both;border-radius: 5px;" class="change">
        <h2 class="post_title">上传微视频</h2>
        <div style=" width:600px; margin:0 auto;" class="post">
	<div class="well" style="width:500px;margin:auto">
    	<form id="fileForm" enctype="multipart/form-data" method="post" action="upload.php">
		<label for="videoUpload" class="span1">选择文件</label>
		<input type="file" id="fileToUpload" multiple onchange="fileSelected();" />
		<!-- type="file"这个不是由一个text和一个button组合成的，它是一个控件-->
		<p />
		<div class="well">
			<div id="fileName"></div>
			<div id="fileSize"></div>
			<div id="fileType"></div>
			<div id="Type"></div>
		</div>
		<p>
		选择视频片头：<input type="radio" name="radio" value="header1"  onclick="GetSelectedVal();">新媒体研究院</input>
			   <input style="margin-left:120px;" type="radio" name="radio" value="header2"  onclick="GetSelectedVal();">金鹏奖</input></br>
		<img style="width:50%;height:50%;margin-left:5px;" src="<?php echo $config['videoRoot']; ?>/img/header1.png" />
		<img style="width:47%;height:50%" src="<?php echo $config['videoRoot']; ?>/img/header2.png" />
		</p>		
		<input class="btn btn-primary" type="button" onclick="getToken()" value="上传" />          <!--btn btn-primary:提供额外的视觉感, 可在一系列的按钮中指出主要操作-->
		<?php
		$path=$config['auth'].$config['video'].$id.'.mp4';
		//exit;
		if(file_exists($path))
		 {
		  echo "<input class='btn' type='button' onclick='javascript:history.go(-1);' value='取消返回' />";
 		  echo "<span class = 'notice'>(注：若您的视频未做修改，请关闭此页)</span>";
		 }
		 else
		 {
		  echo "<input class='btn' type='button' onclick='uploadCanceled()' value='取消上传' />";  //文件不存在
		 
		 }		
		?>
		<!--<input class="btn" type="button" onclick="uploadCanceled()" value="取消上传" />-->
		<p />
		<div class="progress progress-striped" style="width: 500px;">
		<div id="progressNumber" class="bar"></div>
		</div>		
		</form>
	</div>
        <br/><br/>  
	 <div><p></div>
         <div class="tips">
                <table cellpadding="0" cellspacing="0" border="0">
                  <tbody>
			<!--<tr>
                    <th nowrap="nowrap" width="72">·限定大小：</th><td width="338">上传文件不能超过500MB</td>
                  </tr>-->
                  <tr>
                    <th>·支持格式：</th>
                    <td>微软视频：.wmv .avi .dat .asf</td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>Real Player：.rm .rmvb .ram</td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>MPEG视频：.mpg .mpeg</td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>手机视频：.3gp</td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>Apple视频：.mov</td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>
                    
                       
                          Sony视频：.mp4 .m4v
                        
                     
                    </td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>DV视频：.dvix .dv</td>
                  </tr>
                  <tr>
                    <th>&nbsp;</th>
                    <td>其他：.mkv .flv .vob  .ram .qt .divx .cpk .fli .flc </td>
                  </tr>
                  <tr>
                    <th>·时长要求：</th>
                    <td>时长无限制，但5分钟以内的视频，可以达到最流畅的上传及观赏效果</td>
                  </tr>
                  <tr>
                    <th nowrap="nowrap">·最佳分辨率：</th>
                    <td>1080P</td>
                  </tr>
                  <tr>
                    <th>·码率要求：</th>
                    <td>无码率要求，但视频整体码率大于500K将会被二次转码</td>
                  </tr>
                  <tr>
                    <th>·特别提示：</th>
                    <td>禁止上传任何含有政治敏感、色情等违法内容，以及侵犯他人版权的视频</td>
                  </tr>
                  <tr>
                    <th>·友情提示：</th>
                    <td>请不要上传您不拥有版权或者未经版权人允许的视频。
                    根据国际奥委会对视频版权的规定，请您不要上传内容为奥运比赛的视频。 对此给您带来的不便，请您理解。</td>
                  </tr>
                  <tr>
                    <th colspan="2">·上传视频表示您完全接受<a href="" target="_blank">中国微视频协作与交易平台的原则条款</a> </th>
                  </tr>
                </tbody></table>
              </div>
        </div>
    </div>
</div>
<script type="text/javascript">

	if(!(window.File && window.FileReader && window.FileList && window.Blob)){
	alert('buzhichi');
	
	}
	$(window).bind('beforeunload',function(){
	return '确定放弃上传么';
	});
        //var id='';windows.location.search.split('=')[1];
	//var type = '';
	var rdVal='';
	function GetSelectedVal()
	{
	   var rds=document.getElementsByName("radio");
	   for(var i=0;i<rds.length;i++)
	   {
	     if(rds.item(i).checked){
		 rdVal=rds.item(i).getAttribute("value"); 
		 break;
	      }
	     else{
	      continue;
	      }
	   }
	}
	//选择文件响应函数
	var id = '';
    	if ( this.frameElement )
    			{
        		var id = this.frameElement.contentWindow.location.search;
    			}
    			else
    				{
        			var id = location.search.substring(4);
    			}  
	

 
</script> 
<script type="text/javascript">
	function fileSelected() {
		var file = document.getElementById('fileToUpload').files[0];
		 
		if (file) {
			var fileSize = 0;
			if(file.size > 1024*1024) //文件小于1M
				fileSize = (Math.round(file.size * 100 / (1024 * 1024)) / 100).toString() + 'MB';
			else
				fileSize = (Math.round(file.size * 100 / 1024) / 100).toString() + 'KB';	

				document.getElementById('fileName').innerHTML = "Name:" + file.name;
				document.getElementById('fileSize').innerHTML = 'Size:' + fileSize;
				var name = file.name.split(".");
				document.getElementById('fileType').innerHTML = 'Type:' + name[name.length-1];
				type = name[name.length-1];
				
				//document.getElementById('Type').innerHTML = name[name.length-1];file.type;
		} else {
			alert("请选择文件！");
		}
	}
	
	//document.write(location.search);
	//var id = file.name.split(".");
	var range;
	function uploadFile(start, end, token){
		var _eof = 0;
			xhr = new XMLHttpRequest(),
			fd = new FormData(),
			file = document.getElementById('fileToUpload').files[0];

		var part;
		if(end < file.size) {
			part = blobSlice(file, start, end);
			start = start+range;
			end = end+range;
		} else {
			part = blobSlice(file, start, file.size);
			start = start+range;
			end = file.size;
			_eof = 1;
		}
		
		fd.append("part", part);
		fd.append("partnum", start/range);
		fd.append("token", token);
		fd.append("eof", _eof);
	      //fd.append("Type",type);
		fd.append("ID",id);
		fd.append("rdVal",rdVal);
		
		/* 事件监听 */
		xhr.upload.addEventListener("progress", function(event) {
			if (event.lengthComputable) {
				var precentComputable;
				if (end < file.size) {

					precentComputable = Math.round((start+event.loaded) * 100 / file.size);
				} else{
					precentComputable = Math.round(file.size * 100 / file.size);
				}				
				document.getElementById('progressNumber').innerHTML = precentComputable + "%";
				$(".bar").css("width", precentComputable+'%');
			} else{
				document.getElementById('progressNumber').innerHTML = "Unable to compute.";
			}
		}, false);

		xhr.addEventListener("load", function() {
			if(start < file.size) {
				uploadFile(start, end, token);	
			} else {
				var id='<?php echo $_GET['ID'];?>';
				alert("上传完成！请选择视频截图");
				window.location.href="choseimg.php?ID="+id;
			}
		}, false);
		xhr.addEventListener("error", uploadFailed, false);
		xhr.addEventListener("abort", uploadCanceled, false);
		xhr.open("POST", "upload.php");
		xhr.send(fd);
	}

	//上传失败事件
	function uploadFailed(event) {
		alert("上传失败！");
	}

	//上传中止事件
	function uploadCanceled(event) {
		var id='<?php echo $_GET['ID'];?>';
		alert("取消上传！");
		window.location.href="uploadcancle.php?ID="+id;
	}

	//实现读取文件部分内容的函数
	function blobSlice(blob, startByte , length){/*blobSlice(blob对象，起始字节，读取的字节数)*/
        if (blob.slice){
            return blob.slice(startByte, length);
        }
        else {
            return null;
        }
    }
	  
	function getToken(){
		$.get(
			"token.php", 
			function(data) {
				range = data.range;
				uploadFile(0, data.range, data.token)
			},
			"json"
			)
	}
	</script>
<?php
	require('common/footer.php');
?>
