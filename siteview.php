<!--访问量统计-->
<?php
    require('./lib/http_client.class.php');
	require('./lib/db.class.php');
	require('./lib/log.php');
	
	//统计网站访问数据
	//实例化数据库操作类
	$db = new DB();
	//统计不重复IP
	$sql = "select count(distinct(`user_ip`)) from `site_visit_record`";
	//调用数据库操作类中count函数实行对数据库中数据计数操作
	$visitData = $db->count($sql, $sqlOracle='');
	//print_r($visitData);
	//统计数据存入数据库
	//获取当前时间
	$strtime = date('Y-m-d');
	//将时间变量分割年月日
	$timearray = explode("-",$strtime);
	$year = $timearray[0];
	$month = $timearray[1];
	$day = $timearray[2];
	//print_r($timearray);
	//设置所需要存储的参数
	$row = array('visit_total' => $visitData, 'terminal' => 1, 'year' => $year, 'month' => $month, 'day' => $day);
	//调用数据库操作类中的insert函数，成功返回"OK"信息，失败返回"ERROR"信息
	//print_r($row);
	$rowday=array('year' => $year, 'month'=>$month, 'day'=>$day);
	
	$sqldate= "select * from `site_visit_statistics` where `year` = '".$year."' and `month` = '".$month."' and `day`= '".$day."';";
	//print_r($sqldate);
	//print_r(count($db->select($sqldate)));
	if(count($db->select($sqldate)) == 0){
		$db->insert('site_visit_statistics', $row);
	}else{
		$db->update('site_visit_statistics', $row ,$rowday);
	}
	//if($db->insert('site_visit_statistics', $row)){
		//echo 'OK';
	//}else{
		//echo 'ERROR';
	//}
 ?>
<!--访问量统计结束-->
