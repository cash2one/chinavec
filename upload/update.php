<?php date_default_timezone_set("Asia/Shanghai");?>
<?php
//require "lib/connect.php";

$wkey = $argv[2];
$wval = $argv[4];


//$argv=array_values($argv);
//print_r($argv);
//exit;

//echo $wkey;
//echo $wval;
//exit;
//require "lib/connect.php";
$pdo=new PDO("mysql:host=localhost;dbname=chinavec","root","123456");
//$sql="UPDATE video_upload SET `status` = '{$wval}' where `video_id` = '{$wkey}'";
//$result=mysql_query($sql);
$result=$pdo -> query("UPDATE video_upload SET `status` = '{$wval}' where `video_id` = '{$wkey}'");


if($wval==2){
//$sqlm="UPDATE video SET `is_on_shelf` = '2' where `id` = '{$wkey}'";
//$resultm=mysql_query($sqlm);
$resultm=$pdo -> query("UPDATE video SET `is_on_shelf` = '2' where `id` = '{$wkey}'");
}

unset($argv[0],$argv[1],$argv[2],$argv[3],$argv[4]);
?>
