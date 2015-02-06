<?php
	echo json_encode(array("range"=>1048576, "token"=>uniqid()));
//json_encode() 内置函数可以使用得 php 中数据可以与其它语言很好的传递并且使用它。这个函数的功能是将数值转换成json数据存储格式。uniqid() 函数基于以微秒计的当前时间，生成一个唯一的 ID

?>
