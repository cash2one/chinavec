
var json=[
	{"text":"姓名：<br/>职称：<br/>简介: ","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"},
	{"text":"姓名：<br/>职称：<br/>简介：","src":"img/zhengjian.jpg","height":"205"}
]
function getSmallDiv(wrap,oD){
	var len=oD.length;
	var h=Infinity;
	var getD;
	for(var i=0;i<len;i++){						
		if(oD.eq(i).height()<h){
			h=oD.eq(i).height();
			getD=oD.eq(i);
		}
	}		
	return getD;
}		
$(document).ready(function(){
	for(var i=0;i<json.length;i++){
		var str;
		str="<div class=\"content\">";
		str+="<img src="+json[i].src+" height="+json[i].height+" alt=\"\" />";
		str+="<div class=\"imgcaption\">"+json[i].text+"</div>";
		str+="</div>";
		getSmallDiv($(".section"),$(".aside")).append(str);
	}
});
