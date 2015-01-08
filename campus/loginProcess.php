<?php
	header('Content-Type: text/xml');
	header("Cache-Control: no-cache, must-revalidate");
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	//包含数据库连接文件
	require('lib/connect.php'); //delete by ligang
	//require('lib/db.class.php');//数据库操作类 delete by ligang
	require('config/config.php');//系统总配置文件
	
	$sqluser = "SELECT * FROM  `user` ORDER BY `id` ASC";
	$resultuser = mysql_query($sqluser);
	
	$username = $_GET['username'];
	$password = md5($_GET['password']);
	$chkcode = $_GET['chkcode'];
	$login_time=time();
	session_start();
	echo '<?xml version="1.0" encoding="utf-8"?>';
	echo '<HINT>';
	//echo "<LOGININFO>" .$_SESSION['randcode']. "</LOGININFO>"; 
	if($resultuser)
	{
		if (isset($_GET['chkcode']) && isset($_SESSION['randcode'])&&md5($_GET['chkcode'])==$_SESSION['randcode'])
			{	
				while($rowuser=mysql_fetch_object($resultuser)) 
				{
					if ( isset($_GET['username']) && isset($_GET['password']) && $_GET['username']==$rowuser->name && md5($_GET['password'])==$rowuser->password )
					{	
						//设置用户登录状态
						$sql_login = "UPDATE user SET log_off='0' WHERE name='$username'";
						$result_login=mysql_query($sql_login);
						//更新用户最后登录时间
						$sql_login_time = "UPDATE user SET login_time='$login_time' WHERE name='$username'";
						$result_login_time=mysql_query($sql_login_time);
						
						$_SESSION['user_id']=$rowuser->id;
						$_SESSION['user_name']=$rowuser->name;
						$_SESSION['islogin'] = true;
						setcookie("username", $rowuser->name,time()+30*24*60*60);
						setcookie("password", $rowuser->password,time()+30*24*60*60);

						echo "<LOGININFO>" . "登录成功"  . "</LOGININFO>"; 
					}
				}
				echo "<LOGININFO>" . "用户名或密码错误"  . "</LOGININFO>"; 
		}
		else
		{	
			echo "<LOGININFO>" . "验证码错误"  . "</LOGININFO>"; 
		}
	}
	else
	{
		echo "<LOGININFO>" . "数据库连接错误"  . "</LOGININFO>"; 
	}
	echo "</HINT>";
	mysql_close($conn);
?>