//Javascript表单验证登陆信息是否为空
function checkuser()
{
	if (!$("#username").val()) //获得id为name的内容是否为空，不为空返回true，为空返回flase
		{	
			//目的：如果已经显示“用户名不能为空”这个字符串，就不再在其后添加提示字符串
			x=$("#hint_user").get(0); //获得id为user的第一个对象
			console.log($("#hint_user").get(0).innerHTML);
			if(!(x.innerHTML=="用户名为空!")) 
				{
					$("#hint_user").append("用户名为空!");//在id为user的元素内容的基础上添加字符串
				}
			return false;
		}
	else 
		{	
			$("#hint_user").replaceWith(""); //将“用户名不能为空”替换成“”
			$("#password").focus();//聚焦到密码输入框
		}
}

function checkpassword()
{
	if(!$("#password").val())//获得id为password的内容是否为空，不为空返回true，为空返回flase
		{	
			//目的：如果已经显示“密码不能为空”这个字符串，就不再在其后添加提示字符串
			x=$("#hint_password").get(0);//获得id为pword的第一个对象
			if(!(x.innerHTML=="密码为空!"))
				{
					$("#hint_password").append("密码为空!");//在id为pword的元素内容的基础上添加字符串
				}
			return false;
		}
	else
		{
			$("#hint_password").replaceWith("");//将“密码不能为空”替换成“”
			$("#chkcode").focus();//聚焦到验证码输入框
		}
}
function checkchkcode()
{
	if(!$("#chkcode").val())//获得id为chkcode的内容是否为空，不为空返回true，为空返回flase
		{	
			//目的：如果已经显示“验证码不能为空”这个字符串，就不再在其后添加提示字符串
			x=$("#hint_chkcode").get(0);
			if(!(x.innerHTML=="验证码为空!"))
				{
					$("#hint_chkcode").append("验证码为空!");//在id为chk的元素内容的基础上添加字符串
				}
			return false;
		}
	else
		{
			$("#hint_chkcode").replaceWith("");//将“验证码不能为空”替换成“”
			return true;
		}
}

//重置输入框
function refresh()
{
	document.forms[0].username.value="";
	document.forms[0].password.value="";
	document.forms[0].chkcode.value="";
}

//更换看不清的验证码
function reloadcode_login() 
{ 
	document.getElementById('chkimg').src = 'code.php?' + Math.random(); //将id为img的元素资源加上随机数，更换验证码
	document.forms[0].chkcode.value=""; //更换验证码的同时将验证码输入框清空
}

//基于AJAX验证密码用户名正确性，返回提示
function checkme()
{
	xmlHttp=GetXmlHttpObject(); //获得一个xmlHttpObject对象，调用函数GetXmlHttpObject() 
	if (xmlHttp==null) //获取对象失败，则表示浏览器不支持Ajax技术
	{
		alert ("Browser does not support HTTP Request");
		return;
	} 
	var url="loginProcess.php"//url指向服务器后台代码
	var username=document.forms[0].username.value;//获得提交表单的name为name的值
	var password=document.forms[0].password.value;//同上
	var chkcode=document.forms[0].chkcode.value;//同上
	//document.write(name," ",password," ",chkcode);
	url=url+"?username="+ username; //将表单值提交给后台代码，这里提交了三个值
	url=url+"&password="+ password;
	url=url+"&chkcode="+ chkcode;	
	url=url+"&sid="+Math.random(); //加上随机数，防止js调用缓存文件
	xmlHttp.onreadystatechange=stateChanged_check; //当状态改变时调用stateChanged_check函数
	xmlHttp.open("GET",url,true); //采用GET的方法传递参数
	xmlHttp.send(null);
	//document.write(username,password,chkcode);
}
function stateChanged_check() 
{ 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") //后台代码准备就绪
	{
		xmlDoc=xmlHttp.responseXML; //提取从后台传回来的xml文件
		if(xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue=="登录成功") //DOM方式读取xml文件，getElementsByTagName以标签名提取
		{
			document.getElementById("login_info").innerHTML="success";
			location.href="index.php"; 
		}
		if(xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue=="验证码错误")
		{
			document.getElementById('chkimg').src = 'code.php?' + Math.random(); //更换验证码
			document.forms[0].chkcode.value=""; //输入错误，保存用户名密码，更换验证码，清空验证码输入框
		}
		if(xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue=="用户名或密码错误")
		{
			document.getElementById('chkimg').src = 'code.php?' + Math.random(); //更换验证码
			document.forms[0].chkcode.value=""; //输入错误，保存用户名密码，更换验证码，清空验证码输入框
		}
		var info=xmlDoc.getElementsByTagName("LOGININFO")[0].childNodes[0].nodeValue; //将返回内容回显到指定位置
		document.getElementById("login_info").innerHTML=info;  //getElementById以id名提取元素或元素属性
	} 
}

//获得XmlHttpObject的对象，多次调用
function GetXmlHttpObject()
{
	//document.write("调用XML对象");
	var xmlHttp=null;//定义xmlHttp变量，初始化为null，对不同的浏览器采用不同的获取对象方法，返回得到的对象
	try
	{// Firefox, Opera 8.0+, Safari
		xmlHttp=new XMLHttpRequest();
	}
	catch (e)
	{// Internet Explorer
		try
		{
			xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
		}
		catch (e)
		{
			xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return xmlHttp;
}