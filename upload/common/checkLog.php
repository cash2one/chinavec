<div style="float:right;margin-top:5px; margin-right:5px; ">
<style type="text/css">
.fr{float:right;}
.login{position:relative;height:32px;line-height:32px;margin:5px 10px 0 0;display:inline;}
.login li{float:left;display:block; font-family:微软雅黑;}
.login li a{text-align:center;font-size:14px;float:left;display:block;width:90px;height:32px;line-height:32px;background:#505050;color:#acacac;}
.login .logout a{background:#6BC30D;color:#fff;}
.login .user a{background:##f60;color:#fff;}

</style>
	<?php
    if(isset($_SESSION['user_name']) && $_SESSION['user_name'] !== ''){
		$username =$_SESSION['user_name'];
		include "../lib/connect.php";
		$sql = "select `user_role_id` from user where `name` = '$username'";
		$result = mysql_query($sql);
		$row = mysql_fetch_array($result);
		//echo $sql;
		//echo $row['user_role_id'];
		//exit;
		if($row['user_role_id'] == 0){
		echo "<script>window.alert('你没有权限进入此页面,请联系管理员');</script>";
		echo "<script language=JavaScript>history.go(-1);</script>";
	}
	?>
            <ul class="login fr">
                <li class="user" style="margin:0 auto;"><a href="../userInfo.php"><?php echo $_SESSION['user_name'];?></a></li>
                <li class="logout" style="margin:0 auto;"><a href="../logout.php">退出</a></li>
            </ul>

		<!--<a href='userInfo.php' style='width:auto;padding:0 20px 0 20px;color:rgb(255, 114, 0);font-size:14px;'>$username 欢迎您</a>
        <a href='logout.php' style='background-color:#6BC30D; margin:5px,0,5px,0; color:#fff;font-size:14px;'>&nbsp;退出&nbsp;</a>";
   -->

    <?php
    }
	else{ 
		
		//echo "<a href='index.php' style='color:rgb(255, 114, 0); font-size:14px;'>请登录</a>";
	?>
            <ul class="login fr">
                <li class="logout" style="margin:0 auto;"><a href="../index.php">请登录</a></li>
            </ul>

	<?php  }
    ?>
</div>
