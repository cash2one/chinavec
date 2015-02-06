<?php
include "lib/connect.php";

$wkey = $argv[2];
$wval = $argv[4];
$vg = $argv[6];
$time = $argv[8];

//$argv=array_values($argv);
//print_r($argv);
//exit;

//echo $wkey;
//echo $wval;
//exit;
$sql="UPDATE video_upload SET `status` = '{$wval}' where `video_id` = '{$wkey}'";
$result=mysql_query($sql);

if($wval==1){
$sql=mysql_query("UPDATE video SET `is_on_shelf` = '-1' where `id` = '{$wkey}'");
}

if($wval==2){
$sql="UPDATE video SET `is_on_shelf` = '2',`vg` = '{$vg}',`dur` = '{$time}' where `id` = '{$wkey}'";
$result=mysql_query($sql);
}

unset($argv[0],$argv[1],$argv[2],$argv[3],$argv[4],$argv[5],$argv[6]);
?>
