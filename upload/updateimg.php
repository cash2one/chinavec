<?php
//include "lib/connect.php";

$wkey = $argv[2];
$wval = $argv[4];


//$argv=array_values($argv);
//print_r($argv);
//exit;

//echo $wkey;
//echo $wval;
//exit;
$pdo=new PDO("mysql:host=localhost;dbname=chinavec","root","123456");
//$sql="UPDATE video_upload SET `status` = '{$wval}' where `video_id` = '{$wkey}'";
//$result=mysql_query($sql);
$result=$pdo -> query("UPDATE video_upload SET `token`='{$wval}' where `video_id` = '{$wkey}'");
//$sql="UPDATE video_upload SET `token`='{$wval}' where `video_id` = '{$wkey}'";
//$result=mysql_query($sql);

unset($argv[0],$argv[1],$argv[2],$argv[3],$argv[4]);
?>
