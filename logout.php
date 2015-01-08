<?php
session_start();
require('lib/connect.php'); 

//$user_id=$_SESSION['user_id'];
//$sql_logout = "UPDATE user SET log_off='1' WHERE id='$user_id'";
//$result_logout=mysql_query($sql_logout);

if(isset($_SESSION['islogin']) && $_SESSION['islogin'] = true)
{
	unset($_SESSION['islogin']);
	unset($_SESSION['user_id']);
	unset($_SESSION['user_name']);
	session_unset();
	session_destroy();
        echo "<script language=JavaScript>history.go(-1);</script>";
        echo "<script language=JavaScript>location=location;</script>";
	//header("Location:index.php");
	exit;
}

?>
