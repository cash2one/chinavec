<?php
session_start();
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
require('lib/connect.php'); 

function getnameP($pictureExname,$pictureName){ 
	$dir = $config['activityPhoto']; 
	$i = mysql_insert_id (); //
	//判断是否存在该目录，若不存在，创建指定目录并赋予最大可能的访问权
	if(!is_dir($dir)){ 
		mkdir($dir,0777); 
	} 
	while(true){ 
		if(!is_file($dir.$i.".".$pictureExname)){
			$name = $i.".".$pictureExname;
			break;
		 }
		 //如果以此id命名的文件已存在（此情况不应发生），暂用一下机制处理，待改进。
		 else{
			if(!is_file($dir.$pictureName."_".$i.".".$pictureExname)){
				$name=$pictureName."_".$i.".".$pictureExname;
				break;
				 }
			 }		
			$i++; 
	} 
	return $name; 
	break;
}

$title = $_GET['title'];
$content = $_GET['content'];
$contact = $_GET['contact'];
$taskType =$_GET['taskType'];
$cost=$_GET['cost'];
$create_time=time();
$pictureName=strtolower($_GET['prefixName']);//图片名前缀
$pictureExname=strtolower($_GET['extenName']);//图片名后缀
$oldPath="./img/task-photo/".$pictureName.".".$pictureExname;

$user_id=$_SESSION['user_id']; //必须登录才能有user_id,否则默认插入id=0的话，插入的记录会造成活动页面因无法通过id获取到用户名而发生错误。
$insertInfo="INSERT INTO task (task_type_id,title,content,create_time,picture,user_id,contact,cost,status)
						 VALUE ('$taskType','$title','$content','$create_time','none','$user_id','$contact','$cost','0')";

echo '<?xml version="1.0" encoding="utf-8"?>';
echo '<HINT>';
if(mysql_query($insertInfo)){
				//生成新的文件名
				$uploadPicture = getnameP($pictureExname,$pictureName);
				$id=mysql_insert_id ();
				$updateFileName="UPDATE task SET picture='$uploadPicture' where id='$id'";
				$newPath="./img/task-photo/".$uploadPicture;
				if(mysql_query($updateFileName) && rename($oldPath,$newPath)){
					echo "<LOGININFO>" ."提交成功". "</LOGININFO>";
					//echo "true"; 
				}else{
					echo"<LOGININFO>"."提交失败"."<LOGININFO>";
					//echo "false";
					}
 }
 else{
	 echo "<LOGININFO>" . "提交失败". "</LOGININFO>";
	//echo "true";
	 unlink($oldPath);
 }
echo '</HINT>';
?>
