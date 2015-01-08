<?php
//$_SESSION['user_name']=1;
//$_SESSION['user_id']=1;
//$_SESSION['islogin'] = true;

if(!(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true)){
	echo "<script type='text/javascript'>alert('请先登录')</script>";
	echo "<script type='text/javascript'>window.location.href='../index.php'</script>";
	//echo "不可访问";

}
else{
		//echo "可访问";
		$userId = $_SESSION['user_id'];
		$username=$_SESSION['user_name'];

	}

?>