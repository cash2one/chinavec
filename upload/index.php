<?php
session_start();
if((@!$_SESSION['user'])or(@!$_SESSION['password'])){
//echo "<script type=\"text/javascript\">alert('请先登录');</script>";
			 header("refresh:0;url=login.php");//跳转页面
			//echo "<script type=\"text/javascript\">window.location.href=\"login.php\";</script>";
}
?>
<?php include 'lib/header.php';
	//include"lib/connect.php"; ?>
<style type="text/css">
	#authForm {
		margin-top: 50px;
	}
	#authForm p {
		font-family:Microsoft Hei;

	}
	#ui-datepicker-div .ui-datepicker-title select {
		width: 42%;
	}
/*
	.authcontent{
		text-align:center;
		position:relative;
		margin:40px auto 0px auto;
	}
	.selauthvideo{
		margin:0px 0px 0px 315px;
		height:40px;
	}
	.row{
		
		height:40px;
	}
	.column1{
		width:150px;
		padding:2px;
	}
*/
</style>



<script>
$(function() {
$( "#tabs" ).tabs();
});

$(document).ready(function(){
	$("#outdated_copy").click(function(){
		$("#tabs-2").load("pre_delete.php",{out:"",id:""});
	});

	$("#tab4").click(function(){
		window.location.href='http://222.31.64.143/chvec_auth/index.php?page_no=1#tabs-4';
	});
	$("#tab3").click(function(){
		window.location.href='http://222.31.64.143/chvec_auth/index.php?page_no=1#tabs-3';
	});
	$("#tab1").click(function(){
		window.location.href='http://222.31.64.143/chvec_auth/index.php';
	});
});
</script>



<div align="center">
	<img src="img/vec_logo1.jpg" />
</div>

<!-- jquery插件 -->
<div id="tabs" style="width:955px;margin:0 auto;height:450px;">
<ul>
<li><a href="#tabs-1" id="tab1">微视频授权</a></li>
<li><a href="#tabs-2" id="outdated_copy">过期拷贝清除</a></li>
<li><a href="#tabs-3" id="tab3">未过期拷贝浏览</a></li>
<li><a href="#tabs-4" id="tab4">已过期拷贝存根</a></li>
<li style="float:right"><input type="button" value="返回首页" onclick="window.location.href='http://222.31.64.143/chinavec/index.php'"/></li>
</ul>
<div id="tabs-1">

<!--<div class="authBody" style="margin-left:-25px;margin-top:-23px;*margin-left:-25px;*margin-top:-23px;">-->
<div class="authBody">
	<h1 style="margin-top:0px;margin-bottom:0px;">微视频授权系统</h1>
	<!--
	<div class="authcontent">
		<form id="authForm" action="do.php" method="post" enctype="multipart/form-data">

		<div class="row row1 selauthvideo">
			<div class="row column1 left">
			选择授权视频：
			</div>
			<div class="row column2 left">
		    <a name="choose" type="button" class="btn btn-primary" style="color:#fff;" href='play.php' target='_self'>点击选择视频</a>
			</div>
		</div>
		<input type="hidden" name="titlecn" value="" id="titlecn"/><!--勿删
		<div class="row row2">
			<div class="row column1">
			选择授权类型：
			</div>
			<div class="row column2">
			<select type="text" name="authtype">
				<option value="F">公益授权</option>
				<option value="P">付费授权</option>
			</select>
			</div>
		</div>
		<div class="row row3">
			<div class="row column1">
			请输入有效期:
			</div>
			<div class="row column2">
			<input style="margin-left:5px;margin-right:-2px;margin-top:4px" type="text" name="valid_dt" id="datepicker" placeholder="请输入有效期" />
			</div>
		</div>
		<div class="row row4">
			<div class="row column1">
			选择视频格式：
			</div>
			<div class="row column2">
				<select type="text" name="format" style="width:86px">
					<option value="mpg">mpg</option>
					<option value="avi">avi</option>
				</select>
			</div>
		</div>
		<div class="row row5">
			<div class="row column1">
			请输入授权目的：
			</div>
			<div class="row column2">
				<input type="text" name="purpose" id="purpicker" placeholder="请输入授权目的" />
			</div>
		</div>
		
		<div class="row row6">
			<div class="row column1">
			<button name="submit" type="submit" class="btn btn-primary" style="">点击授权</button>	
			</div>
			<div class="row column2">
				<a name="logout" type="button" class="btn" style="" href='loginout.php'>退出</a>
			</div>
		</div>
		
	</form>
	
	</div>
	-->
	
		<form id="authForm" action="do.php" method="post" enctype="multipart/form-data">

		<p style="margin-left:-222px;margin-top:10px">
			选择授权视频：
		</p>
		    <a name="choose" type="button" class="btn btn-primary" style="margin-left:27px;margin-top:-62px;*margin-top:-45px;color:#fff;" href='play.php' target='_self'>点击选择视频</a>
		<input type="hidden" name="titlecn" value="" id="titlecn"/>
		<p style="margin-left:9px;margin-right:-3px;margin-top:0px">选择授权类型：
			<select type="text" name="authtype" style="margin-left:9px;">
				<option value="F">公益授权</option>
				<option value="P">付费授权</option>
			</select>
		</p>
		<p style="margin-left:12px;margin-top:-2px">
			请输入有效期:
			<input style="margin-left:17px;margin-right:-2px;margin-top:4px" type="text" name="valid_dt" id="datepicker" placeholder="请输入有效期" />
		</p>
		
		<p style="margin-left:-121px;margin-top:0px">选择视频格式：
			<select type="text" name="format" style="width:86px;margin-left:8px;">
				<option value="mpg">mpg</option>
				<option value="avi">avi</option>
			</select>
		</p>
		<p style="margin-left:14px;margin-top:-2px">
			请输入授权目的：<input type="text" name="purpose" id="purpicker" placeholder="请输入授权目的" />
		</p>
		<button name="submit" type="submit" class="btn btn-primary" style="margin-left:-156px;margin-top:6px">点击授权</button>	
	</form>
	<a name="logout" type="button" class="btn" style="margin-left:226px;margin-top:-93px;*margin-top:-60px;" href='loginout.php'>退出</a>
	
	
</div>

</div>

<div id="tabs-2">
<p>



</p>
</div>
<div id="tabs-3" style="padding:0px 0px 0px 0px;">

	<?php include "listdownload.php";?>
	<!--<span>id</span>title_cn<span></span><span></span><span></span><span></span><span></span>-->
</div>
<!--<a href="#tabs-3" onclick="document.location.href='index.php'">ssss</a>-->

<div id="tabs-4" style="padding:0px 0px 0px 0px;">

	<?php include "listbackup.php";?>
	<!--<span>id</span>title_cn<span></span><span></span><span></span><span></span><span></span>-->
</div>
</div>
<!-- jquery插件结束 -->

<!--授权判断开始-->
<script type="text/javascript">
				$(function() {
					
					$("#authForm").submit(function() {
						if ($("#titlecn").val()) {
							return true;
						}
						else {
							alert("请选择视频！");
							return false;
						}
					});
				});
</script>
<!--授权判断结束-->

<!--
<script type="text/javascript" src="js/jquery-1.9.1.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.10.3.custom.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
-->
<script type="text/javascript">
jQuery(function($){
	$("#datepicker").datepicker({//添加日期选择功能
		numberOfMonths:1,//显示几个月  
		showButtonPanel:true,//是否显示按钮面板 
		showWeek: true,// 显示星期
		dateFormat: 'yy-mm-dd',//日期格式   
		closeText:"关闭",//关闭选择框的按钮名称  
		yearSuffix: '年', //年
		weekHeader: '周', 
		currentText: '今天',
		changeMonth: true,
		changeYear: true,
		showMonthAfterYear:true,//是否把月放在年的后面
		//'一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月'
		monthNamesShort: ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月'],  
		dayNames: ['星期日','星期一','星期二','星期三','星期四','星期五','星期六'],  
		dayNamesShort: ['周日','周一','周二','周三','周四','周五','周六'],  
		dayNamesMin: ['日','一','二','三','四','五','六'],
		onClose: function () {
			if (!$(this).val()) {
				var date = new Date();
				var year = date.getFullYear();
				var month = date.getMonth() + 1;
				month = (month.toString().length < 2) ? ('0' + month) : month;
				var day = date.getDate();
				day = (day.toString().length < 2) ? ('0' + day) : day;
				$(this).val(year+'-'+month+'-'+day);
			};
		}
	});
});
</script>
<?php include "lib/footer.php"; ?>
