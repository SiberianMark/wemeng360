function indexHref(e, t) {
    window.location.href = t
} ! new
function() {
    var e = this;
    e.width = 750,
    e.fontSize = 46,
    e.widthProportion = function() {
        var t = (document.body && document.body.clientWidth || document.getElementsByTagName("html")[0].offsetWidth) / e.width;
        return t > 1 ? 1 : .5 > t ? .5 : t
    },
    e.changePage = function() {
        document.getElementsByTagName("html")[0].setAttribute("style", "font-size:" + e.widthProportion() * e.fontSize + "px !important")
    },
    e.changePage(),
    window.addEventListener("resize",
    function() {
        e.changePage()
    },
    !1)
},
new
function() {
    var e = '<div id="loadingDiv" class="loading"><div class="m-load"><div class="loader"><i class="load-before"></i>Loading...<i class="load-after"></i></div></div></div>';
    document.write(e)
},
$(function() {
    function e(e, t) {
        o.addClass("active"),
        t.children(a).css("left", e.width() / 2),
        t.show()
    }
    function t() {
        o.removeClass("active"),
        $(d).hide()
    }
    var i = document.getElementById("loadingDiv");
    if (i.parentNode.removeChild(i), "undefined" != typeof $) {
        var n = $("a[data-menu]"),
        o = $("#overlay"),
        a = ".i-triangle",
        d = ".nav-menu",
        s = ".m-nav";
        $(s).show(),
        // n.on("click",
        // function() {
        //     o.hasClass("active") ? t() : e($(this), $("#" + $(this).attr("data-menu")))
        // }),
        o.on("click", t);
        var c = window.navigator.userAgent.toLowerCase();
        "micromessenger" == c.match(/MicroMessenger/i) && $(".js-taste").show()
    }
    $('#weimeng-2oI6-qq').on('click',function(){
        if($('.img-wmqrcode').css('display')=='none'){
            $('.img-wmqrcode').show();
        }else{
            $('.img-wmqrcode').hide();
        }
    });
     $('.nav-item').on('click',function(){
        if($('#navmenu').css('display')=='none'){
            $('#navmenu').show();
        }else{
            $('#navmenu').hide();
        }
    });

});