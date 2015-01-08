<?php
	//$array=array($_POST['status'],$_POST['name']);
	//$array=json_encode(array("status"=>1,"name"=>2));
	$id=$_POST['id'];
	$db=mysql_connect("localhost","root","123456");
	mysql_select_db("chinavec",$db);
	mysql_query("set names utf8");
	//$sql="select * from `video_upload` where `id`=".$id.";";
	$sql="select * from `video_upload` where `video_id`=".$id.";";
	$result=mysql_query($sql);
	//$nums=mysql_num_rows($result);
	//echo $nums;
	
	//$array=array();
	
	//array_push($array,$nums);//状态为2的个数
	//array_push($array,$id);
	//while($row=mysql_fetch_array($result)){
	//	array_push($array,$row);
		
	//}
	
	$row=mysql_fetch_array($result);
	$row=json_encode($row);
	print_r($row);
	//$array=json_encode($array);
	//print_r($array);
	//echo $id;
	//$array=json_encode(array("name"=>$_POST['name'],"status"=>$_POST['status']));
	//echo $array;
	//print_r($array);
?>