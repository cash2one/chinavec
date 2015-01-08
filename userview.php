<?php
/*
 *在线用户量统计功能
 */

	require('./lib/http_client.class.php');
	require('./lib/db.class.php');
	require('./lib/log.php');
	
	//获取当前时间
	//$strtime = date('Y-m-d');
	//$strtimestamp=time();
	$strtime = date('Y-m-d');		//2014-07-25
	$strtimestamp = date('Ymd');	//20140725
	//print_r($strtime);
	//将时间变量分割年月日
	$timearray = explode("-",$strtime);
	$year = $timearray[0];
	$month = $timearray[1];
	$day = $timearray[2];
	//print_r($day);
	//实例化数据库操作类
	$db = new DB();
	//测试
	//$sql = "select count(*) from `site_visit_record` where `visit_time` >= ".$strtime;//`visit_time`大于等于当天凌晨的时间，即当天的时间

	//从user数据表中的login_time判断当天时间的登录用户数
	$sql = "select count(*) from `user` where FROM_UNIXTIME(`login_time`,'%Y%m%d') >= ".$strtimestamp;
	//$sql = "select count(*) from `user` where `login_time` >= ".$strtime;//`login_time`大于等于当天凌晨的时间，即当天的时间
	//print_r($sql)."<br>";
	$userData = $db->count($sql, $sqlOracle='');
	//print_r($userData);
	//统计当天用户数据存入user_statistics数据表	
	//设置存储数据库中的参数
	$row = array('user_total' => $userData, 'year' => $year, 'month' => $month, 'day' => $day);
	//print_r($row);
	$rowday=array('year' => $year, 'month'=>$month, 'day'=>$day);
	
	$sqldate= "select * from `user_statistics` where `year` = '".$year."' and `month` = '".$month."' and `day`= '".$day."';";
	//print_r($sqldate);
	//print_r(count($db->select($sqldate)));
	if(count($db->select($sqldate)) == 0){
		$db->insert('user_statistics', $row);
	}else{
		$db->update('user_statistics', $row ,$rowday);
	}

	//调用数据库操作类中insert函数实行存储数据操作数，成功返回"OK"信息，失败返回"ERROR"信息
	//if($db->update('user_statistics', $row ,$rowday)){
		//print_r($db->update('user_statistics', $row ,$rowday));
	//	echo "OK";
	//	systemLog('在线用户量统计失败', 1, 5, $db);
	//}else{
	//	echo "ERROR";
		//调用日志函数生成日志
		
	//}
	//关闭数据库
	$db->close();
 ?> 
