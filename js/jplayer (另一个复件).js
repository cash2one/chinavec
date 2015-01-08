$(document).ready(function(){
var path=document.getElementById("videoUrl").innerHTML;
var picturepath=document.getElementById("pictureUrl").innerHTML;
	$(".jp-video-play").click(function(){
		$(".jp-video-preload").css({display:"block"});
		
	})
	$(".jp-play").click(function(){
		//alert(666);
		//$(".jp-video-preload").css({display:"block"});
		$(".jp-video-preload").css({display:"block"});
    	})
    $("#jquery_jplayer_2").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                m4v: path,
                ogv: "media/tokyo.ogv",
                poster: picturepath
            });
        },
	play:function(event){
		//alert(11);
		$(".jp-video-preload").css({display:"none"});
	}
	,
        ended: function (event) {
            $("#jquery_jplayer_2").jPlayer("play", 0);
        },
        swfPath: "js",
	//solution: "flash,html", 
        supplied: "m4v, ogv",
        cssSelectorAncestor: "#jp_interface_2",
	size: {
		width: "960px", height: "550px"
	}
    })
    .bind($.jPlayer.event.play, function() { // pause other instances of player when current one play
            $(this).jPlayer("pauseOthers");
	
    });

});
