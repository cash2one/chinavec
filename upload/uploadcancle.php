<?php
$url = "./upload_video.php"?>
<html>   
<head>   
<meta http-equiv="refresh" content="3; url=<?php echo $url; ?>">
<title>取消上传</title>
<?php date_default_timezone_set("Asia/Shanghai");?>
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/base.css" />
<link rel="stylesheet" type="text/css" href="css/movieDetail.css" />
</head>

<style type="text/css">
	body {
		text-align:center;
		background:#333 repeat 0px 1px;
	}
	.change{
		width:970px;
		margin:190px 200px 0 70px;
		
		}
</style>
<body>  
<img src="img/vec_logo_left.jpg" width="1150px" height="200" align="left">
	<?php
		
		include "lib/connect.php";
		$ID    = $_GET['ID'];
		//echo $ID;
		//exit;
		//$query = "SELECT * FROM video order by ID desc limit 0,1";
		//查询
		//$result = mysql_query($query);
		//$row    = mysql_fetch_row($result);
 		//echo $ID;
		//exit;
		$sql    = mysql_query("Delete from video where id ='$ID'");
		$result1 = mysql_fetch_array($sql);
		//exit;
		
?>

	<?php 
		//include "common/table.php"; 
		
		echo "<div class='change'><br/><br/><br/><br/><br/>"."取消上传"."<br/><br/>3秒后将跳转....若未跳转，请<a href=".$url.">点击此处</a></div>";
	?>
    </br>
</body>
</html>
<?php
	require('common/footer.php');
?>
