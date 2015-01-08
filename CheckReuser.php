<?php
require('lib/connect.php'); 

$user=$_GET["user"];
$sql_user = "SELECT user.* FROM user WHERE  name = '".$user."'";		
$result_user =mysql_query($sql_user);
$row_num=mysql_num_rows($result_user);  //获取记录条数

if($row_num==0)//0表示没有取到数据,用户名没有被注册
{
	echo "true";
}else
{
	echo "false";
} 
mysql_close($conn);
?>
