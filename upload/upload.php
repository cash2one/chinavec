<?php
	//ob_start();	
 	//print_r($_FILES);
 	//print_r($_POST);
	include "config/config.php";
	$radio    = $_POST['rdVal'];
	$partNum  = $_POST['partnum'];
	$token    = $_POST['token'];
	$ID       = $_POST['ID'];
	$eof	  = $_POST['eof'];
	//$size     = $_FILES['part']['size'];
	$num   	  = 30;
	//echo $size;
	//$type = $_POST['Type'];
	//echo $partNum;
	//echo $num;  
	//print_r($radio);
	//$data= ob_get_contents();
	//file_put_contents('./a.txt',$data);
	//echo '2';
	//print_r($_POST);
	//exit;  
	// .".".$type
	//$sj=time();
	//mkdir("./upload/$sj/",0700);
	$path=$config['auth'].$config['video'].$ID.'.mp4';
	if(file_exists($path))
		 {
		  $check=1;
		 }
		 else
		 {
		  $check=0; //文件不存在
		 }
	$filePath = dirname(__FILE__) . '/upload/tmp/'. $token;
	//$filePath = "./upload/$sj/".rand(0,999).$_FILES['myfile']['name'];
if ($_FILES['part']['error'] == 0) {
	move_uploaded_file($_FILES["part"]["tmp_name"], $filePath . "-" . $partNum);
	//print_r($partNum);
	//exit; 


	
//if($type == "mp4"||$type == "MP4"){
	 //exec("/var/www/chinavec/upload/cat1.sh '$partNum' '$token' '$ID'  > /dev/null & ");
//}
//else if($partNum>= $num){
//	 exec("/var/www/chinavec/upload/cat2.sh '$partNum' '$token' '$ID'  > /dev/null & ");
//}else{
//	 exec("/var/www/chinavec/upload/cat.sh '$partNum' '$token' '$ID'  > /dev/null & ");
//}
	  /*if($_POST['eof'] == 1) {
		$fp = fopen($filePath, "ab");

		for ($part = 1; $part <= $partNum; $part++) { 
         	
			 $handle = fopen($filePath . "_" . $part,"rb");
			 fwrite($fp,fread($handle, filesize($filePath . "_" . $part)));
			 fclose($handle);			
			 unlink($filePath. "_" . $part);
			   unlink($filePath);
		}		
		fclose($fp);
	}*/
}
	if($eof==1&&$check==0){
		exec("/var/www/chinavec/upload/cat.sh '$partNum' '$token' '$ID' '$radio'  > /dev/null & ");
	}elseif($eof==1&&$check==1){
		exec("/var/www/chinavec/upload/modcat.sh '$partNum' '$token' '$ID' '$radio'  > /dev/null & ");
	}
		
?>
