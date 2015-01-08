<?php date_default_timezone_set("Asia/Shanghai");?>
<?php
/*
$conn = mysql_connect("localhost","root","123456");
if (!$conn) {
  die('Could not connect: ' . mysql_error());
}
mysql_query("set names utf8");
mysql_query("set global time_zone= '+08:00'");
mysql_select_db("chinavec", $conn);
*/
$pdo=new PDO("mysql:host=localhost;dbname=chinavec","root","123456");

$sql="SELECT status,count(*) as num from video_upload where status=1";
$result=$pdo -> query("SELECT status,count(*) as num from video_upload where status=1");
$row=$result -> fetch();

//$result=mysql_query($sql);
//$row=mysql_fetch_array($result);
$covernum=$row['num'];
echo $covernum;
/*if($covernum<2){
	echo $covernum;
}else{
	echo 0;
}*/
//exec("/var/www/chinavec/upload/getnum.sh $covernum > /dev/null & ");
?>
