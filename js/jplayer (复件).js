
$(document).ready(function(){
var path=document.getElementById("videoUrl").innerHTML;
    $('#jquery_jplayer_1').jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                mp3: "music/a.mp3",
            }).jPlayer("play"); // auto play
        },
        ended: function (event) {
            $(this).jPlayer("play");
        },
        swfPath: "js",
        supplied: "mp3",

    })
    .bind($.jPlayer.event.play, function() { // pause other instances of player when current one play
            $(this).jPlayer("pauseOthers");
    });

    $("#jquery_jplayer_2").jPlayer({
        ready: function () {
            $(this).jPlayer("setMedia", {
                m4v: path,
                ogv: "media/tokyo.ogv",
                poster: ""
            });
        },
        ended: function (event) {
            $("#jquery_jplayer_2").jPlayer("play", 0);
        },
        swfPath: "js",
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