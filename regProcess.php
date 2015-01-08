<?php
	session_start();
	header("Content-type: text/html; charset=utf-8");
	
	//包含数据库连接文件
	require('lib/connect.php');
	require('lib/db.class.php');//数据库操作类
	require('config/config.php');//系统总配置文件
	require('lib/util.class.php');

	if(!isset($_POST['username1'])){
		exit('非法访问!');
	}
	
	$u = new Util();
	$userName = isset($_POST['username1']) ? $u->inputSecurity($_POST['username1']) : '';
	$password1 = isset($_POST['password1']) ? $u->inputSecurity($_POST['password1']) : '';
	$password2 = isset($_POST['password2']) ? $u->inputSecurity($_POST['password2']) : '';
	$email = isset($_POST['email']) ? $u->inputSecurity($_POST['email']) : '';
		
	if($userName !== ''&&$password1 !== ''&&$password2 !== ''&&$email !== ''){
		$db = new DB();
		if(!$userName) {
			$msg = '缺少用户名';
			exit;
		}
		if(strlen($userName) < 3) {
			$msg = '用户名长度必须大于等于3';
			exit;
		}
		if(!$password1) {
			$msg = '请填写密码';
			exit;
		}
		if(!$password2) {
			$msg = '请填写确认密码';
			exit;
		}
		if($password1 != $password2) {
			$msg = '两次密码不一致';
			exit;
		}
		//类似的其余参数判断

		$insertData = array(
			'name' => $userName,
			'user_role_id' => 0,
			'password'  => md5($password1), //加密措施，此处md5加密，注意登录时的密码也需要先加密
			'email'     => $email,
			'create_time' => time()
			//其余参数拼接
		);
		
		$insert=$db->insert('user', $insertData);
		//$userId = $db->last_insert_id();
		if($insert) {
			//成功
			header("Location:index.php");
			exit;
		}
		else {
			echo '输入参数有误，<a href="index.php">重新注册</a>';
		}

	}
?>
