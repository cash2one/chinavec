var cuser,cpweq,cpw1,cpw2,cemail,cchkcode//表单填写正确标志变量
//当表单基本元素填写正确后激活注册按钮
function checkreg()
{
	if((cuser=="yes")&&(cpweq=="yes")&&(cpw1=="yes")&&(cpw2=="yes")&&(cemail=="yes")&&(cchkcode=="yes"))
	{
		$('#regbtn').attr('disabled',false); 
	}
	else
	{
		$('#regbtn').attr('disabled',true); 
	} 
	
}

//检测输入是否符合规定，事件 onkeyup
function checkinput(str)
{
	if(str=="user")
	{
		var user=document.getElementById("user").value;
 		var regexp=/^[a-zA-Z_]*/; //只看开头！
		if(user.match(regexp)=="")
		{
			$("#info-1").html("<font color=red size=0.7em>用户名必须以字母开头！</font>");
			cuser="";
		}else if(user.length<=3)
		{
			$("#info-1").html("<font color=red size=0.7em>用户名长度必须大于三位！</font>");
			cuser="";
		}else
		{
			$("#info-1").html("");
			cuser="yes"
		}
		checkreg();
	} 
	else if(str=="pw1")
	{
		
		var pw1=document.getElementById("pw1").value;
 		if(pw1.length<6) //不接受小于6位的密码
		{
			$("#info-3").html("<font color=red size=0.7em>密码长度必须大于六位！</font>");
			cpw1="";
		}else if(pw1.length>=6 && pw1.length<12) //大于6位小于12位的密码强度：弱
		{
			$("#info-3").html("<font color=green size=0.7em>弱<font>");
			cpw1="yes";
		}else if((pw1.match(/^[0-9]*$/)!=null) || (pw1.match(/^[a-zA-Z]*$/)!=null)) //大于12位纯数字或者纯字母的密码强度：中
		{
			$("#info-3").html("<font color=green size=0.7em>中</font>");
			cpw1="yes";
		}else //大于12位的非纯数字或字母的密码强度：强
		{
			$("#info-3").html("<font color=green size=0.7em>强</font>");
			cpw1="yes";
		}
		checkreg();
	}
	else if(str=="pw2")
	{
		var pw1=document.getElementById("pw1").value;
		var pw2=document.getElementById("pw2").value;
		if(pw1==pw2)
		{
			$("#info-4").html("");
			cpweq="yes";
			cpw2="yes";
		}else
		{
			$("#info-4").html("<font color=red size=0.7em>两次密码不一致！</font>");
			cpweq="";
			cpw2="";
		}
		checkreg();
	}
	else if(str=="email")
	{
		var email=document.getElementById("email").value;
		var emailreg=/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w)*$/;
		if(email.match(emailreg)==null)
		{
			$("#info-2").html("<font color=red size=0.7em>邮箱格式不正确!</font>");
			cemail="";
		}else
		{
			$("#info-2").html("");
			cemail="yes";
		}
		checkreg();
	}
	else if(str=="chkcode")
	{
		var chkcode=document.getElementById("reg_chkcode").value;
		if(chkcode!=""&&chkcode.length==4)
		{
			cchkcode="yes";
		}
		else
		{
			cchkcode="";
		}
		
		checkreg();
	}
}

//检测输入是否为空，事件 onblur
function checknull(str)
{
	if (str=="pw1")
	{
		var pw1=document.getElementById("pw1").value;
		if(pw1=="") //输入框不能看成null ，而应该看成“ ”
		{
			$("#info-3").html("<font color=red size=0.7em>密码为空</font>");
		}
	}
	else if(str=="pw2")
	{
		var pw2=document.getElementById("pw2").value;
		if(pw2=="") //输入框不能看成null ，而应该看成“ ”
		{
			$("#info-4").html("<font color=red size=0.7em>密码为空！</font>");
		}
	}
	else if(str=="email")
	{
		var email=document.getElementById("email").value;
		if(email=="") //输入框不能看成null ，而应该看成“ ”
		{
			$("#info-2").html("<font color=red size=0.7em>邮箱为空</font>");
		}
	}
}

//重置输入框
function reg_refresh()
{
	document.forms[1].user.value="";
	document.forms[1].email.value="";
	document.forms[1].pw1.value="";
	document.forms[1].pw2.value="";
	document.forms[1].reg_chkcode.value="";
	$("#info-1").html("");
	$("#info-2").html("");
	$("#info-3").html("");
	$("#info-4").html("");
}

//用户名输入完成，检测该用户名是否已经被注册，事件，onblur
function checkreuser(str)
{
	var user=document.getElementById("user").value;
	if(user=="") //输入框不能看成null ，而应该看成“ ”
	{
		$("#info-1").html("<font color=red size=0.7em>用户名为空！</font>");
		return;
	}
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request");
		return;
		}
	var url="CheckReuser.php";
	url=url+"?user="+str.value;    //将input对象的值传递给后台文件
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged_checkrename;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function stateChanged_checkrename()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var msg=xmlHttp.responseText;
		//alert(msg)
		if((msg=="true")&&(cuser=="yes"))
		{
			$("#info-1").html("");
		}else if((msg=="false")&&(cuser=="yes"))
		{
			$("#info-1").html("<font color='red' size=0.7em>该用户名已被注册！</font>");
		}
		else if((msg=="true")&&(cuser==""))
		{
			$("#info-1").html("<font color='red' size=0.7em>用户名必须以字母开头</font>");
		}
	}
}

//获得XmlHttpObject的对象，多次调用
function GetXmlHttpObject()
{
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

//更换看不清的验证码
function reloadcode() 
{ 
	document.getElementById('reg_chkimg').src = 'code.php?' + Math.random(); //将id为img的元素资源加上随机数，更换验证码
	document.forms[1].chkcode.value=""; //更换验证码的同时将验证码输入框清空
}
//注册信息提交
function register()
{
	//alert("恭喜，信息填写正确");
	var user=document.getElementById("user").value;
	var password=document.getElementById("pw1").value;
	var email=document.getElementById("email").value;
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null)
		{
		alert ("Browser does not support HTTP Request");
		return;
		}
	var url="SubmitRegisterInfo.php";
	url=url+"?user="+user+"&password="+password+"&email="+email;
	url=url+"&sid="+Math.random();
	xmlHttp.onreadystatechange=stateChanged_submitreg;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}
function stateChanged_submitreg()
{
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		var msg=xmlHttp.responseText;
		//alert(msg)
		if(msg=="true")
		{
			alert("注册成功");
			location.href="index.php";
		}else
		{
			alert("注册失败，请稍后再试");
		}
	}
}
