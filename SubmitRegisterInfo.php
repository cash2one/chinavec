<?php
require('lib/connect.php'); 

$user=$_GET["user"];
$password=md5($_GET["password"]);
$email=$_GET["email"];
$create_time=time();
$sql_register = "INSERT INTO user 
				(name,sex,birth_dt,idcard_no,tel,mp,mp1,weibo,wechat,qq,password,email,real_name,address,unit,create_time,log_off,login_time)
				VALUES('$user','1','null','null','null','null','null','null','null','null','$password','$email','null','null','null','$create_time','1','1');";		
$result_register =mysql_query($sql_register);

if($result_register)
{
	echo "true";
}else
{
	echo "false";
} 
mysql_close($conn);
?>
