//确定提交按钮的使能，只有完全满足条件才能提交
var vtitle,vcontent,vcontact,vtaskType,vcost;
function checkInput()
{
	if((vtitle=="yes")&&(vcontent=="yes")&&(vcontact=="yes")&&(vtaskType=="yes")&&(vcost=="yes"))
	{
		$('#submitActivity').attr('disabled',false); 
	}
	else
	{
		$('#submitActivity').attr('disabled',true); 
	} 
	
}
function checkActivityInput(string)
{	
	switch(string){
	case 'taskType':
	if(!$("#taskType").val()){
			$("#taskType-info").html("<font color=red size=0.7em>类型为空<font>");
			vtaskType="";
			checkInput();
		}else{
			$("#taskType-info").html(""); 
			$("#title").focus();
			vtaskType="yes";
			checkInput();
		}
	break;
	case 'title':
		if(!$("#title").val()){
			$("#title-info").html("<font color=red size=0.7em>标题为空<font>");
			vtitle="";
			checkInput();
		}else{
			$("#title-info").html(""); 
			$("#content").focus();
			vtitle="yes";
			checkInput();
		}
	break;
	case 'content':
		if(!$("#content").val()){
			$("#content-info").html("<font color=red size=0.7em>内容为空<font>");
			vcontent="";
			checkInput();
		}else{
			$("#content-info").html(""); 
			$("#contact").focus();
			vcontent="yes";
			checkInput();
		}
	break;
	case 'contact':
		var contactInput=$("#contact").val();
		//验证输入是否为空值
		if(!contactInput){
			$("#contact-info").html("<font color=red size=0.7em>电话为空<font>");
			vcontact="";
			checkInput();
		}else{ 
		//验证号码输入格式，满足条件的号码有：3位或者4位区号，7位或者8位号码，中间横杠或者空格隔开，区号用括号或者不用括号
			if(contactInput.match(/^0\d{2}[- ]\d{8}$/)==null 
				&& contactInput.match(/^0\d{3}[- ]\d{7}$/)==null
				&& contactInput.match(/^1\d{10}$/)==null){	
				$("#contact-info").html("<font color=red size=0.7em>电话格式不对<font>"); 
				vcontact="";
				checkInput();
			}else{
				$("#contact-info").html(""); 
				$("#cost").focus();
				vcontact="yes";
				checkInput();
			}	
		}
		//另一种正则表达式验证方法
		//var patt=new RegExp('[0]\d{2}');
		//patt.test(contactInput))
	break;
	case 'cost':
		if(!$("#cost").val()){
			$("#cost-info").html("<font color=red size=0.7em>商品价格为空<font>");
			vcost="";
			checkInput();
		}else{
			$("#cost-info").html(""); 
			vcost="yes";
			checkInput();
		}
	break;
	default:
		alert("代码错误");
	}
}
//文件选中之后，事件（失焦）的同时，提取出文件信息，保存成全局变量，供后面的js函数使用。因为当文件上传完成之后，就不能再通过这种方式获得任何关于文件的信息了。
var file;
var prefixName;
var extenName;
function getFileName(){
//定义了全局变量后，不能再函数中再用var定义该变量，否则该变量名就是局部变量了，不能再其他函数中使用，切记！
	var file=document.getElementById("fileToUpload").files;
	var fileName=file[0].name;
	var pos=fileName.lastIndexOf(".");
	//var prefixName=fileName.substring(0,pos); //错误的变量赋值方式！
	prefixName=fileName.substring(0,pos); //前缀名
	//alert(prefixName);
	extenName=fileName.substring(pos+1); //后缀名
	//alert(extenName);
}
	
function SubmitActivityInfo()
{
	//局部变量覆盖了全局变量，因此要定义局部变量，来存放全局变量的值
	var LprefixName=prefixName;
	var LextenName=extenName;
	xmlHttp=GetXmlHttpObject(); //获得一个xmlHttpObject对象，调用函数GetXmlHttpObject() 
	if (xmlHttp==null) //获取对象失败，则表示浏览器不支持Ajax技术
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 
	var url="SubmitActivityInfo.php"//url指向服务器后台代码
	var taskType=document.getElementById("taskType").value;
	var title=document.forms[0].title.value;//获得提交表单的name为recruitedtitle的值
	var content=document.forms[0].content.value;//同上
	var contact=document.forms[0].contact.value;//同上	
	var cost=document.forms[0].cost.value
	url=url+"?title="+ title; //将表单值提交给后台代码，这里提交了三个值
	url=url+"&content="+ content;
	url=url+"&contact="+ contact;
	url=url+"&taskType="+ taskType;
	url=url+"&cost="+cost;
	url=url=url+"&prefixName="+ LprefixName;
	url=url=url+"&extenName="+ LextenName;
	url=url+"&sid="+Math.random(); //加上随机数，防止js调用缓存文件
	xmlHttp.onreadystatechange=stateChanged_SubmitActivityInfo; //当状态改变时调用stateChanged_check函数
	xmlHttp.open("GET",url,true); //采用GET的方法传递参数
	//document.write(title,content,contact,taskType);
	xmlHttp.send(null);
}
function stateChanged_SubmitActivityInfo() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") //后台代码准备就绪
	{
		xmlDoc=xmlHttp.responseXML; //提取从后台传回来的xml文件
		if(xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue=="提交成功") //DOM方式读取xml文件，getElementsByTagName以标签名提取
		{
			document.getElementById("returnInfo").innerHTML=xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue;
			window.location.href="activityPublishStep3.php"; 
		}
		if(xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue=="提交失败") //DOM方式读取xml文件，getElementsByTagName以标签名提取
		{
			document.getElementById("returnInfo").innerHTML=xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue;
		}
	} 
}
//获得XmlHttpObject的对象，多次调用
function GetXmlHttpObject()
{
	var xmlHttp=null;//定义xmlHttp变量，初始化为null，对不同的浏览器采用不同的获取对象方法，返回得到的对象
	try{// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e){// Internet Explorer
		try{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e){
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}