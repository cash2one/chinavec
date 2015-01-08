<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>微电影学院-视频素材</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script src="js/html5media.min.js"></script>
</head>
<video width="100%" height="550px" controls id="video">
			 	<source src="<?php echo $videoUrl;?>" type="video/mp4">
				<!--<p>抱歉，您的浏览器不支持视频video标签</p>-->       
             	<object id="fp_23397117_api" width="100%" height="100%" type="application/x-shockwave-flash" data="js/flowplayer.commercial-3.2.6-dev.swf">
		<param value="true" name="allowfullscreen">
		<param value="always" name="allowscriptaccess">
		<param value="high" name="quality">
		<param value="false" name="cachebusting">
		<param value="#000000" name="bgcolor">
		<param name="flashvars" value='config={"clip":{"url":"http://222.31.88.66/chvec_auth/video/1.mp4","autoPlay":false,"autoBuffering":true}}' />
		</object>
				
			</video>

</body>
</html>
