$(document).ready(function(){
var path=document.getElementById("videoUrl").innerHTML;
var picturepath=document.getElementById("pictureUrl").innerHTML;
	$(".jp-video-play").click(function(){
		//alert(1);
		$(".jp-video-preload").css({display:"block"});
		//$(".jp-video-preload-icon").css({display:"block"});
		
	})
	$(".jp-play").click(function(){
		//alert(666);
		
		$(".jp-video-preload").css({display:"block"});
    	})
	$("#jquery_jplayer_1").jPlayer({
		ready: function () {
			$(this).jPlayer("setMedia", {
			title: "Big Buck Bunny Trailer",
			m4v: path,
			ogv: "media/tokyo.ogv",
			poster: picturepath
			});
		},
		play:function(event){
		//alert(11);
		$(".jp-video-preload").css({display:"none"});
		},
		swfPath: "js/",
		supplied: "m4v, ogv",
		size: {
			width: "960px",
			height: "540px"
		}
	});
    

});
