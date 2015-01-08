<?PHP
session_start();
//echo $_COOKIE['username'];
//echo $_COOKIE['password'];
//exit;
require "common/visitRight.php";
?>
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>申请授权</title>
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

</style>
<script type="text/javascript">
function disp_confirm(form1) {
	if(confirm('申请授权需要5个积分，您确定要申请吗？')){
		         //alert("确定");
		         return true;
		      }else{
		         //alert("取消");
		         return false;
		     }
}

</script>
<body>
<?php 	include "common/checkLog.php";?>
<div id="layout">
<?php 
		//session_start();
		$id = $_GET['id'];
		$videoName = $_GET['name'];
		
		//检查该页面是否已合法获取视频ID及ID是否为数值型
		if (!(isset($_GET['id']) && ctype_digit($_GET['id']))) {
			header("Location:movie.php?msg=invalid");
			exit;
		}
		
		include "common/table1.php";
		require "lib/connect.php";
		
		$sql="select * from user WHERE `id` = '$userId'";
		$result=mysql_query($sql);
		$row=mysql_fetch_object($result);
		//print_r($row);
	?>
<!--<span style="float:right; color:#FFFFFF; font-size:14px; margin-right:10px;">您好，请登录</span>
-->
<!---->

<div style="width:970px; margin:0 auto; clear:both; border-radius: 1px;" class="change">
    <div style="width:600px;height:580px; line-height:30px;float:left; margin:10px 10px 10px 20px;"> 
        <br/>
        <p style="margin-left:30px;">您正在申请获得以下微视频的授权拷贝：<br/><span class="orange14">《<?php echo $videoName;?>》</span><br/>注意：请认真核准右侧信息，<br/>点击“申请授权”确认或点击“取消”放弃<p>
		<br/>
        <img src="img/beiyong.jpg" width="500"/>
    </div>
    
    <div style="width:300px;height:580px; float:left;">
    	<br/><br/>
       <form  class="black14" method="post" action="orderProcess.php?id=<?php echo $id; ?>" onSubmit="return disp_confirm(this)">
        <fieldset>
            <label for="name">用户名：</label>
			<?php //echo $row->name; ?>
			<?php echo $_SESSION['user_name']; ?>
            <!--<span class="font1">性别：</span>
			<select name="gender" id="gender" title="选择性别">
				<?php 
					/**if($row->gender == 0){
						echo '<option value="0" selected="selected">女</option>
                			  <option value="1">男</option>';
					}
					else{
						echo '<option value="0">女</option>
                			  <option value="1" selected="selected">男</option>';
					}*/
                ?> 
			</select>-->
        </fieldset><br/>
        <fieldset>
            <span class="font1">电子邮件：</span>
		<input type="text" name="email" id="email" value="<?php  echo $row->email; ?>" />
        </fieldset><br/>
        <fieldset>
            <span class="font1">真实姓名：</span>
			<input type="text" name="realName" id="realName" value="<?php echo $row->real_name; ?>" />
        </fieldset><br/>
          <fieldset>
            <span class="font1">联系电话：</span>
			<input type="text" name="tel" id="tel" value="<?php echo $row->tel; ?>" />
        </fieldset><br/>
        <fieldset>
            <span class="font1">邮政地址：</span>
			<input type="text" name="address" id="address" value="<?php echo $row->address; ?>" />
        </fieldset><br/>
        <fieldset>
            <span class="font1">工作单位：</span>
			<input type="text" name="unit" id="unit" value="<?php echo $row->unit; ?>" />
        </fieldset><br/>
        <fieldset>
            <span class="font1">QQ号码&nbsp;：</span>
			<input type="text" name="qq" id="qq" value="<?php echo $row->qq; ?>" />
        </fieldset><br/>
        <fieldset>
            <span class="font1">微信&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;：</span>
			<input type="text" name="wechat" id="wechat" value="<?php echo $row->wechat; ?>" />
        </fieldset><br/>
        <fieldset>
            <span class="font1">授权目的：</span>
			<input type="text" name="purpose" id="purpose" />
        </fieldset><br/>
        <fieldset>
            <input type="submit" value="申请授权" class="apply"/>
            <a href="movie.php"><input type="button" value="取消" class="cancel"/></a>
        </fieldset>
    </form>
    </div>
</div>
</div>   
    
    

<?php
	require('common/footer.php');
?>
