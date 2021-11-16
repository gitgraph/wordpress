var sc = 1;
var _cn = 0;
var ibtnc = '#6B6B6B';
var nwid = 0;
var _h1 = 0;
var _w1 = 0;
var imgarrw = [];
var imgarrh = [];
pageimg();
buildimg();
start();

$("#main>ul>li").css({opacity: '0'});
$("#main #top").css({marginTop: '35px', marginBottom: '35px'});
setTimeout(function() {
    $("#main>ul>li").animate({opacity: '1.0'}, {duration: 200, queue: false});
    $("#main #top").animate({marginTop: '15px', marginBottom: '15px'}, {duration: 400, queue: false});
}, 900);


function start() {

    _c = 4;
    var r = setInterval(function() {
        
        var top = $(document).scrollTop();
        if (top > 600) {
            $("#gtop").css('display', 'inline-block');
        } else {
            $("#gtop").css('display', 'none');
        }
        _css = parseInt($("#cssc").css('left'));
        
        if (_css !== _c) {
            _cn = 0;
            scale();
            
            if (_css === 0) {
                nwid = 380;
                buildnews();
                $("#menu").css('display', 'none');
                $("#menu").attr('rel', 'close');
            }
            if (_css === 1) {
                nwid = 70;
                buildnews();
                $("#menu").css('display', 'none');
                $("#menu").attr('rel', 'close');
            }
            if (_css === 2) {
                buildnews();
                $("#menu").css('display', 'none');
                $("#menu").attr('rel', 'close');
            }

        }
        _c = _css;
    }, 1);

}




$("#menubtn").click(function() {
    if ($("#menu .container>div").children().length > 0) {
        if ($("#menu").attr('rel') === 'close') {
            if ($("#search").attr('rel') === 'open') {
                $("#seekbtn")[0].click();
            }
            $("#menu .container>div").animate({marginTop: '0px', opacity: '1.0'}, {duration: 200, queue: false});
            $("#menu ul li ").animate({marginTop: '4px'}, {duration: 400, queue: false});
            $("#menu").css('display', 'inline-block');
            $("#menu").attr('rel', 'open');
        }

        else if ($("#menu").attr('rel') === 'open') {
            $("#menu .container>div").animate({marginTop: '-100px', opacity: '0'}, {duration: 100, queue: false, complete: function() {
                    $("#menu").css('display', 'none');
                    $("#menu").attr('rel', 'close');
                    $("#menu ul li ").css({marginTop: '20px'});
                }});
        }
    }
});



$("#seekbtn").click(function() {
    if ($("#search").attr('rel') === 'close') {
        if ($("#menu").attr('rel') === 'open') {
            $("#menubtn")[0].click();
        }

        $("#search form").animate({marginTop: '10px', opacity: '1.0'}, {duration: 200, queue: false});
        $("#search").css('display', 'inline-block');
        $("#search").attr('rel', 'open');
        $("#search form #s").focus();

    } else if ($("#search").attr('rel') === 'open') {

        $("#search form").animate({marginTop: '-60px', opacity: '0'}, {duration: 100, queue: false, complete: function() {
                $("#search").css('display', 'none');
                $("#search").attr('rel', 'close');
            }
        });
    }
});






$(".featuredc").each(function(index) {
    if ($(this).children().length < 1) {
        $(this).css({height: '0px'});
    }
});


$("iframe").each(function(index) {
    var ttt = $(this);
    var part = $(ttt).closest('li').parent().attr('id');
    if (part === 'newsul') {
        $(this).closest('.text').prepend('<div id="mhold"><div id="vid" class="vidc" > </div></div>');
        $(this).closest('.text').find('#mhold>#vid').append($(this));
        $(ttt).parent().prepend('<img style="z-index:55; image-rendering: auto;" src="' + _tempurl + '/images/iframe.png" width="800" height="500" />');
    } else {
        $(this).closest('.text').prepend('<div id="vid" class="vidc" > </div>');
        $(this).closest('.text').find('#vid').append($(this));
    }
});


$("#commenthead .comment-author").each(function(index) {
    var auth = $(this).find('cite').text();
    $(this).append('<div>' + auth + '</div>');
    $(this).find('cite').detach();
});

$("#commenthead .reply").each(function(index) {
    $(this).closest('li').append($(this).detach());
});


$("#commenthead form p").each(function(index) {
    if ($(this).find('label')) {
        var label = $(this).find('label').attr('for');
        if (label === 'author') {
            $(this).find('input').attr('placeholder', 'Name');
            $(this).find('label').detach();
        }
        if (label === 'email') {
            $(this).find('input').attr('placeholder', 'Email');
            $(this).find('label').detach();
        }
        if (label === 'url') {
            $(this).find('input').attr('placeholder', 'Website');
            $(this).find('label').detach();
        }
    }
});


$("#sidebar .widgettitle").each(function(index) {
    var t = $(this).text();
    $(this).parent().prepend('<h3 class=widgettitle>' + t + '</h3>');
    $(this).detach();
});

$("#sidebar #s").each(function(index) {
    $(this).parent().find('label').detach();
});


$("#wp-calendar a").each(function(index) {
    $(this).parent().css('border', '1px solid #aaa');
});


$("#wp-calendar a").hover(function() {
    $(this).parent().animate({opacity: '0.6'}, {duration: 100, queue: false});
}, function() {
    $(this).parent().animate({opacity: '1.0'}, {duration: 100, queue: false});
});


$(".cattag").each(function(index) {
    var cats = parseInt($(this).find('#catlist').children().length);
    var tags = parseInt($(this).find('#taglist').children().length);
    if (cats > 0) {
        if (tags > 0) {
            $(this).find('#midv').css('display', 'inline-block');
        }
    } else {
        $(this).find('#catlist').text('');
    }
});


$("#sidebar .tagcloud>a").attr('style', '');



$("#gtop").click(function() {
    $('html, body').stop().animate({scrollTop: 0}, 400, 'swing');
});



ml = 0;
var newarr = [];
$("#hdivo").css('display', 'block');

function buildnews() {
    newarr.length = 0;
    $(".hli").css('display', 'inline-block');
    $(".hli").css('position', 'relative');
    $(".hli").css('left', '');
    var h = parseInt($("#newsul").children().length);
    if (h > 0) {
        if (h < 4) {
            h = 4;
        }
        var ww = 100 / h;
        ml = 5 / h;
        _hhb = parseInt($(".hli").css('height'));
        if (_css === 2) { 
            gw = 100; 
        }
        if (_css !== 2) {
            gw = parseInt((ww - 0.5) - 2);
            $(".hli").css('margin-left', parseInt(ml) + '%');
            $(".hli").css('margin-right', parseInt(ml) + '%');
        }
        $(".hli").css('width', gw + '%');
        if (_css === 2) {
            $(".hli").css('width', gw + '%');
        }
        if (_css !== 2) {
            var s = (100 - ((gw + (ml * 2)) * h)) / 2;
            for (var r = 1; r < (h + 1); r++) {
                $("#news #li" + r).css('left', s + '%');
                $("#news #li" + r).css('position', 'absolute');
                newarr.push(s);
                s += (gw + (ml * 2));
            }
        }
        if (_css === 2) {
            $(".hli").css('position', 'absolute');
            $(".hli").css('left', 0 + '%');
            $(".hli").css('margin', '0');
        }
        $("#newsul").css('animation-name', 'floatnew');
        $("#newsul").css('animation-play-state', 'running');
        $("#newsul").css('-webkit-animation-name', 'floatnew');
        $("#newsul").css('-webkit-animation-play-state', 'running');
        $("#newsul").css('-moz-animation-name', 'floatnew');
        $("#newsul").css('-moz-animation-play-state', 'running');

        $("#hdivo").animate({opacity: '0'}, {duration: 1300, queue: false, complete: function() {

                $("#newsul").css('animation-play-state', 'paused');
                $("#newsul").css('animation-name', 'floatnewf');
                $("#newsul").css('-webkit-animation-play-state', 'paused');
                $("#newsul").css('-webkit-animation-name', 'floatnewf');
                $("#newsul").css('-moz-animation-play-state', 'paused');
                $("#newsul").css('-moz-animation-name', 'floatnewf');

                $("#hdivo").css('display', 'none');
        }});

    } else {
        $("#hdivo").css('display', 'none');
    }

    $("#news .text").each(function(index) {
        $(this).find('.imgsc').css('left', ((parseInt($("#mhold").width()) - 160) / 2) + 'px');
        $(this).find('.vidc').css('left', ((parseInt($("#mhold").width()) - 160) / 2) + 'px');
        $(this).find('.imgsc>ul').css({opacity: '0'});
        $(this).find('.imgsc>a').css({opacity: '0'});
        $(this).find('.vidc>iframe').css({opacity: '0', display: 'none'});
    });

}


tp = 50;
i = 0;

$('.nclick').click(function() {
    if (i === 0) {
        i = parseInt($(this).attr('rel'));
        $('html, body').stop().animate({scrollTop: 0}, 400, 'swing');
        $("#news #li" + i + ">#text>#mhold").attr('class', 'run');
        $("#news #li" + i).css({zIndex: '30'});
        _wwb = parseInt($("#news #li" + i).width());
        ntm = 100;
        $("#news #li" + i + ' #tbox' + ",#news #li" + i + ' #tline' + ",#news #li" + i + ' .cattag' + ",#news #li" + i + ' #text'
                + ",#news #li" + i + ' #info').animate({opacity: '0'}, {duration: 350, queue: false});
        
      $("#news #li" + i).animate({top: (tp + 5) + 'px', opacity: '0'}, {
            duration: 350, complete: function() {
                setTimeout(function() {
                    $("#news #li" + i).css({padding: '20px'});
                    $("#news #li" + i + " .cattag").css({left: '0%', width: '100%'});
                    $("#news #li" + i).css('box-sizing', 'border-box');
                    $("#news #li" + i + " .nclick").css('display', 'none');
                    $("#news #li" + i).css('margin-left', '');
                    $("#news #li" + i).css('margin-right', '');
                    $("#news #li" + i + ' #tbox').css('margin', '20px 0px');
                    $("#news #li" + i + ' .imgsc>ul').css({opacity: '0'});
                    $("#news #li" + i + ' .imgsc>a').css({opacity: '0'});
                    $("#news #li" + i + ' .vidc>iframe').css({opacity: '0'});
                    var hw = parseInt($("#newsul").css('width')) - nwid;
                    
                    if ($("#news #li" + i).find('.imgsc').length > 0 || $("#news #li" + i).find('.vidc').length > 0) {
                        var w = hw - 80;
                        var h = 310;
                        iscale(w, h);
                        var left = ((hw - w) / 2) - 20;
                        $("#news #li" + i + ' .imgsc').css({display: 'block'});
                        $("#news #li" + i + ' .vidc').css({display: 'block'});
                        $("#news #li" + i + ' .imgsc').css({left: left + 'px', height: h + 'px', width: w + 'px', marginBottom: '70px'});
                        $("#news #li" + i + ' .vidc').css({left: left + 'px', height: h + 'px', width: w + 'px'});
                        $("#news #li" + i + ' .imgsc>img').css({opacity: '0'});
                        $("#news #li" + i + ' .imgsc>ul').css({opacity: '1'});
                        $("#news #li" + i + ' .imgsc>a').css({opacity: '0.3'});
                        $("#news #li" + i + ' .vidc>img').css({opacity: '0'});
                        $("#news #li" + i + ' .vidc>iframe').css({opacity: '1', display: 'inline-block'});
                    }

                    $("#news #li" + i + " #text").css('overflow-y', 'auto');
                    $("#news #li" + i).animate({
                        left: ((parseInt($("#newsul").css('width')) - hw) / 2) + 'px',
                        width: hw + 'px',
                        height: 500 + 'px',
                        top: '30px'
                    }, {duration: 200, complete: function() {
                            $("#news #li" + i + ' #h3t').css({height: 'auto', lineHeight: '40px', marginTop: '20px'});
                            $("#news #li" + i + " .cattag").css({height: 'auto', display: 'inline-block'});
                            var tbox = parseInt($("#news #li" + i + ' #tbox').css('height'));
                            var cattag = parseInt($("#news #li" + i + ' .cattag').height());
                            $("#news #li" + i + " #text").css('height', (450) + 'px');
                            var hb = (20 + (tbox + 6 + cattag) + 36 + 20) - 7;
                            var ht = 450 + hb;
                            $("#news #li" + i).css({height: ht + 'px'});
                            $("#news #li" + i).animate({opacity: '1', top: '10px'}, {duration: 450, queue: false});
                            $("#news #li" + i + ' #tbox' + ",#news #li" + i + ' #tline' + ",#news #li" + i + ' .cattag' + ",#news #li" + i + ' #text'
                                    + ",#news #li" + i + ' #info').animate({opacity: '1'}, {duration: 350, queue: false});
                            $("#news #li" + i + ' #tbox').animate({marginTop: '0px', marginBottom: '0px'}, {duration: 400, queue: false});
                            $("#news #li" + i + ' .imgsc>a').css({opacity: ''});
                            $("#news #li" + i + ' .imgsc>img').css({display: 'none'});
                            $("#news #li" + i + ' .vidc>img').css({display: 'none'});
                            $("#news #li" + i + " #nx").css('display', 'block');
                            $("#news #li" + i + ' #info').css('display', 'inline-block');
                            $("#news #li" + i + ' .imgsc>#ibtnh').css('display', 'block');
                        }
                    });
                }, 50);
            }
        });
    }
});





$('.nclose').click(function() {


    i = parseInt($(this).attr('rel'));
    $("#news #li" + i).animate({opacity: '0', top: (tp + 30) + 'px'}, {duration: 320, queue: false, complete: function() {

            $("#news #li" + i).css('margin-left', parseInt(ml) + '%');
            $("#news #li" + i).css('margin-right', parseInt(ml) + '%');
            $('html, body').stop().animate({scrollTop: 0}, {queue: false, duration: 300, easing: 'swing'});
            $("#news #li" + i + ' #tbox' + ",#news #li" + i + ' #tline' + ",#news #li" + i + ' .cattag' + ",#news #li" + i + ' #text'
                    + ",#news #li" + i + ' #info').css({opacity: '0'});
            $("#news #li" + i + " .nclick").css('display', '');
            $("#news #li" + i + " #nx").css('display', 'none');
            $("#news #li" + i + ' #info').css('display', 'none');
            $("#news #li" + i + ' .imgsc>#ibtnh').css('display', 'none');
            $("#news #li" + i + ">#text").css('overflow-y', 'hidden');    tmi = 500;
            $("#news #li" + i + ' #h3t').css({height: '65px', lineHeight: '80px', marginTop: ''});
            $("#news #li" + i).css('box-sizing', '');
            $("#news #li" + i).css({padding: '0px'});
            $("#news #li" + i + " .cattag").css({left: '3%', width: '500%'});
            $("#news #li" + i + ' .imgsc>ul').css({opacity: '0'});
            $("#news #li" + i + ' .imgsc>a').css({opacity: '0'});
            $("#news #li" + i + ' .vidc>iframe').css({opacity: '0', display: 'none'});
            $("#news #li" + i + ' .vidc>img').css({opacity: '1', display: 'block'});
            $("#news #li" + i + ' .imgsc>img').css({opacity: '1', display: 'block'});

            if ($("#news #li" + i).find('.imgsc').length > 0 || $("#news #li" + i).find('.vidc').length > 0) {
                var w = 160;
                var h = 100;
                iscale(w, h);
                $("#news #li" + i + ' .imgsc').css({display: 'block'});
                $("#news #li" + i + ' .vidc').css({display: 'block'});
                $("#news #li" + i + ' .imgsc').css({height: '', width: '', marginBottom: ''});
                $("#news #li" + i + ' .vidc').css({height: '', width: ''});
            }
            $("#news #li" + i).animate({
                left: parseFloat(newarr[i - 1]) + '%',
                width: parseInt(_wwb) + 'px',
                height: _hhb + 'px',
                top: (tp + 30) + 'px'
            }, {duration: tmi, complete: function() {
                    $("#news #li" + i + ' .imgsc').css('left', ((parseInt($("#mhold").width()) - 160) / 2) + 'px');
                    $("#news #li" + i + ' .vidc').css('left', ((parseInt($("#mhold").width()) - 160) / 2) + 'px');
                    $("#news #li" + i).animate({opacity: '1', top: tp + 'px'}, {duration: 450, queue: false});
                    $("#news #li" + i + ' #tbox' + ",#news #li" + i + ' #tline' + ",#news #li" + i + ' .cattag' + ",#news #li" + i + ' #text'
                            + ",#news #li" + i + ' #info').animate({opacity: '1'}, {duration: 150, queue: false});
                    $("#news #li" + i).css({width: gw + '%'});
                    $("#news #li" + i + ">#text>#mhold").attr('class', 'off');
                    $("#news #li" + i).css({zIndex: '0'});
                    i = 0;
                }
            });

        }
    });
});







function buildimg() {

    var dd = 1;
    var rec = 0;
    var ce = 0;
    $("#index .text img").each(function(index) {
        var tt = $(this);
        if ($(tt).attr('class').indexOf('wp-image') >= 0) {
            var img = parseInt($(tt).closest('li').attr('rel'));
            var par = "#index ";
            if (rec !== img) {
                dd = 1; ce = 0;
            }
            if (dd === 1) {
                $(par + "#li" + img + " .text").prepend('<div id="imgs' + img + '" rel="1" class="imgsc"> </div>');
                $(par + "#imgs" + img).append('<ul> </ul>');
                if (parseInt($(tt).closest('li').find('img').length) > 1) {
                    $(par + "#imgs" + img).append('<div id="ibtnh"> </div>');
                    $(par + "#imgs" + img).append('<a id="larr" class="clarr" href="#" onclick="return false;"> <img id="laarr" class="imgarr" src="' + _tempurl + '/images/arrow.png"> </a>');
                    $(par + "#imgs" + img).append('<a id="rarr" class="crarr" href="#" onclick="return false;"> <img id="raarr" class="imgarr" src="' + _tempurl + '/images/arrow.png">  </a>');
                }
                dd = 0;
            }
            ce++;
            $(par + "#imgs" + img + '>#ibtnh').append('<a href="#" onclick="return false;"> <div class="ibtnc" rel="' + ce + '" id="ibtn' + ce + '"> </div> </a>');
            $(par + "#imgs" + img + '>ul').append('<li id="c' + ce + '"> </li>');
            $(tt).closest('p').css('display', 'none');
            $(par + "#imgs" + img + '>ul>#c' + ce).append($(tt).detach());
            rec = img;
        }
    });

    var ddn = 1;
    var recn = 0;
    var cen = 0;
    $("#newsul .text img").each(function(index) {
        var tt = $(this);
        if ($(tt).attr('class').indexOf('wp-image') >= 0) {
            var img = parseInt($(tt).closest('li').attr('rel'));
            var par = "#newsul ";
            if (recn !== img) {
                ddn = 1;
                cen = 0;
            }
            if (ddn === 1) {
                $(par + "#li" + img + " .text").prepend('<div id="mhold"><div id="imgs' + img + '" rel="1" class="imgsc"> </div> </div>');
                $(par + "#imgs" + img).append('<ul> </ul>');
                if (parseInt($(tt).closest('.text').find('img').length) > 1) {
                    $(par + "#imgs" + img).append('<div id="ibtnh"> </div>');
                    $(par + "#imgs" + img).append('<a id="larr" class="clarr" href="#" onclick="return false;"> <img id="laarr" class="imgarr" src="' + _tempurl + '/images/arrow.png"> </a>');
                    $(par + "#imgs" + img).append('<a id="rarr" class="crarr" href="#" onclick="return false;"> <img id="raarr" class="imgarr" src="' + _tempurl + '/images/arrow.png">  </a>');
                }
                $(par + "#li" + img + " .text>#mhold>#imgs" + img).prepend('<img rel="isrc" style="z-index:55; image-rendering: auto;" src="' + _tempurl + '/images/image.png" width="800" height="500" />');
                ddn = 0;
            }
            cen++;
            $(par + "#imgs" + img + '>#ibtnh').append('<a href="#" onclick="return false;"> <div class="ibtnc" rel="' + cen + '" id="ibtn' + cen + '"> </div> </a>');
            $(par + "#imgs" + img + '>ul').append('<li id="c' + cen + '"> </li>');
            $(tt).closest('p').css('display', 'none');
            $(par + "#imgs" + img + '>ul>#c' + cen).append($(tt).detach());
            recn = img;
        }
    });

}



_ccn3 = 1;
$(".imgsc>#ibtnh>a>.ibtnc").click(function() {
    var rel = parseInt($(this).attr('rel'));
    if (_ccn3 === 1) { _ccn3 = 0;
        var th = $(this).parent().parent();
        var _hc = parseInt($(th).parent().attr('rel'));
        var _tc = parseInt($(th).parent().find('ul').children().length);
        if (_tc > 1) {
            if (rel !== _hc) {
                $(th).siblings('ul').find('#c' + _hc).animate({opacity: '0'}, {duration: 300, queue: false});
                _hc = rel;
                $(th).siblings('ul').find('#c' + _hc).css('opacity', '1');
                $(th).siblings('ul').find('#c' + _hc).css('z-index', '1');
                $(th).siblings('ul').find('#c' + _hc).animate({opacity: '1'}, {duration: 300,
                    complete: function() {
                        $(th).siblings('ul').children().css('z-index', '0');
                        $(th).siblings('ul').find('#c' + _hc).css('z-index', '2');
                        $(th).parent().find('#ibtnh>a>.ibtnc').css('border', '1px solid ' + ibtnc);
                        $(th).parent().find('#ibtnh>a>#ibtn' + _hc).css('border', '2px solid ' + ibtnc);
                        _ccn3 = 1;
                        $(th).parent().attr('rel', '' + _hc);
                    }
                });
            } else {
                _ccn3 = 1;
            }
        }
    }
});

_ccn1 = 1;
_ccn2 = 1;
$(".imgsc>.clarr").click(function() {
    if (_ccn1 === 1) {
        _ccn1 = 0;
        var th = $(this);
        var _hc = parseInt($(this).parent().attr('rel'));
        var _tc = parseInt($(this).parent().find('ul').children().length);
        if (_tc > 1) {
            $(this).siblings('ul').find('#c' + _hc).animate({opacity: '0'}, {duration: 300, queue: false});
            if (_hc === 1) {
                _hc = _tc;
            } else {
                _hc--;
            }
            $(this).siblings('ul').find('#c' + _hc).css('opacity', '1');
            $(this).siblings('ul').find('#c' + _hc).css('z-index', '1');
            $(this).siblings('ul').find('#c' + _hc).animate({opacity: '1'}, {duration: 300,
                complete: function() {
                    $(th).siblings('ul').children().css('z-index', '0');
                    $(th).siblings('ul').find('#c' + _hc).css('z-index', '2');
                    $(th).parent().find('#ibtnh>a>.ibtnc').css('border', '1px solid ' + ibtnc);
                    $(th).parent().find('#ibtnh>a>#ibtn' + _hc).css('border', '2px solid ' + ibtnc);
                    _ccn1 = 1;
                    $(th).parent().attr('rel', '' + _hc);
                }
            });
        }
    }
});

$(".imgsc>.crarr").click(function() {
    if (_ccn2 === 1) {
        _ccn2 = 0;
        var th = $(this);
        var _hc = parseInt($(this).parent().attr('rel'));
        var _tc = parseInt($(this).parent().find('ul').children().length);
        if (_tc > 1) {
            $(this).siblings('ul').find('#c' + _hc).animate({opacity: '0'}, {duration: 300, queue: false});
            if (_hc === _tc) {
                _hc = 1;
            } else {
                _hc++;
            }
            $(this).siblings('ul').find('#c' + _hc).css('opacity', '1');
            $(this).siblings('ul').find('#c' + _hc).css('z-index', '1');
            $(this).siblings('ul').find('#c' + _hc).animate({opacity: '1'}, {duration: 300,
                complete: function() {
                    $(th).siblings('ul').children().css('z-index', '0');
                    $(th).siblings('ul').find('#c' + _hc).css('z-index', '2');
                    $(th).parent().find('#ibtnh>a>.ibtnc').css('border', '1px solid ' + ibtnc);
                    $(th).parent().find('#ibtnh>a>#ibtn' + _hc).css('border', '2px solid ' + ibtnc);
                    _ccn2 = 1;
                    $(th).parent().attr('rel', '' + _hc);
                }
            });
        }
    }
});


_ccn4 = 1;
_ccn5 = 1;
$("#news .clarrh").click(function() {
    if (_ccn4 === 1) {
        _ccn4 = 0;
        var th = $(this);
        var _hc = parseInt($(this).parent().attr('rel'));
        var _tc = parseInt($(this).parent().find('#newsul').children().length);
        if (_tc > 1) {
            $(this).siblings('ul').find('#li' + _hc).animate({opacity: '0'}, {duration: 300, queue: false});
            if (_hc === 1) {
                _hc = _tc;
            } else {
                _hc--;
            }
            $(this).siblings('ul').find('#li' + _hc).css('opacity', '1');
            $(this).siblings('ul').find('#li' + _hc).css('z-index', '1');
            $(this).siblings('ul').find('#li' + _hc).animate({opacity: '1'}, {duration: 300,
                complete: function() {
                    $(th).siblings('ul').children().css('z-index', '0');
                    $(th).siblings('ul').find('#li' + _hc).css('z-index', '2');_ccn4 = 1;
                    $(th).parent().attr('rel', '' + _hc);
                }
            });
        }
    }
});

$("#news .crarrh").click(function() {
    if (_ccn5 === 1) {
        _ccn5 = 0;
        var th = $(this);
        var _hc = parseInt($(this).parent().attr('rel'));
        var _tc = parseInt($(this).parent().find('#newsul').children().length);
        if (_tc > 1) {
            $(this).siblings('ul').find('#li' + _hc).animate({opacity: '0'}, {duration: 300, queue: false});
            if (_hc === _tc) {
                _hc = 1;
            } else {
                _hc++;
            }
            $(this).siblings('ul').find('#li' + _hc).css('opacity', '1');
            $(this).siblings('ul').find('#li' + _hc).css('z-index', '1');
            $(this).siblings('ul').find('#li' + _hc).animate({opacity: '1'}, {duration: 300,
                complete: function() {
                    $(th).siblings('ul').children().css('z-index', '0');
                    $(th).siblings('ul').find('#li' + _hc).css('z-index', '2');  _ccn5 = 1;
                    $(th).parent().attr('rel', '' + _hc);
                }
            });
        }
    }
});






function pageimg() {

    $(".container img").each(function(index) {
        if ($(this).closest('.main').find('#page').length > 0 && $(this).parent().attr('class') !== 'featuredc') {
            $(this).parent().css({position: 'relative', display: 'inline-block'});
            _h1 = parseInt($(this).css('height'));
            _w1 = parseInt($(this).css('width'));
            var hw = 710;
            if (_w1 > hw) {
                for (var v = 0; v < 1100; v++) {
                    if (_w1 > hw) {
                        _w1 = _w1 * 0.99;
                        _h1 = _h1 * 0.99;
                    }
                }
            }
            imgarrw.push(_w1);
            imgarrh.push(_h1);
        }
    });
}






function scale() {

    $(".container img").each(function(index) {

        if (($(this).parent().attr('class') !== 'comment-author vcard')
                && ($(this).parent().attr('id') !== 'gtop')
                && ($(this).attr('class') !== 'imgarr')
                && ($(this).attr('id') !== 'imgth')) {
            
            var w = parseInt($(this).parent().css('width'));
            var h = parseInt($(this).parent().css('height'));
            var _h = parseInt($(this).css('height'));
            var _w = parseInt($(this).css('width'));

            if ($(this).closest('.main').find('#page').length > 0 && $(this).parent().attr('class') !== 'featuredc') {
                _cn++;
                var i = _cn;
                _w1 = parseInt(imgarrw[i - 1]);
                _h1 = parseInt(imgarrh[i - 1]);
                var _w2 = _w1;
                var _h2 = _h1;
                var hdw = parseInt($("#text").css('width'));
                for (var h = 0; h < 10; h++) {
                    if (_w2 > hdw) {
                        _w2 -= (_w1 / 10);
                        _h2 -= (_h1 / 10);
                    }
                }
                $(this).parent().css('width', _w2 + 'px');
                $(this).parent().css('height', _h2 + 'px');
                w = parseInt($(this).parent().css('width'));
                h = parseInt($(this).parent().css('height'));
            }
            var _scale = 1.0;
            $(this).css({position: 'absolute',
                width: '',
                height: ''
            });
            _h = parseInt($(this).css('height'));
            _w = parseInt($(this).css('width'));
            $(this).css({position: 'absolute',
                width: _w * 0.2,
                height: _h * 0.2
            });
            _h = parseInt($(this).css('height'));
            _w = parseInt($(this).css('width'));
            
            if (_w < w || _h < h) {
                for (var c = 0; c < 1100; c++) {
                    if ($(this).closest('.main').find('#page').length === 1 && $(this).parent().attr('class') !== 'featuredc') {
                        if (_w < w && _h < h) {
                            _scale += 0.005;
                            $(this).css({position: 'absolute',
                                width: _w * _scale,
                                height: _h * _scale
                            });
                            _h = parseInt($(this).css('height'));
                            _w = parseInt($(this).css('width'));
                        }
                    } else {
                        if (_w < w || _h < h) {
                            _scale += 0.01;
                            $(this).css({position: 'absolute',
                                width: _w * _scale,
                                height: _h * _scale
                            });
                            _h = parseInt($(this).css('height'));
                            _w = parseInt($(this).css('width'));
                        }
                    }
                }
            }
            $(this).css({
                position: 'absolute',
                left: ($(this).parent().width() - $(this).outerWidth()) / 2,
                top: ($(this).parent().height() - $(this).outerHeight()) / 2
            });
            if (($(this).parent().attr('class') !== 'featuredc') && ($(this).parent().attr('class') !== 'searchc') && $(this).closest('.main').find('#page').length === 0) {
                $(this).parent().css({zIndex: '0', opacity: '0'});
                $(this).parent().parent().children().first().css({zIndex: '2', opacity: '1'});
                $(this).closest('.imgsc').attr('rel', 1);
                $(this).parent().parent().parent().find('#ibtnh>a>.ibtnc').css('border', '1px solid ' + ibtnc);
                $(this).parent().parent().parent().find('#ibtnh>a>#ibtn1').css('border', '2px solid ' + ibtnc);
            }
        }
    });

    if (_css === 2) {
        $('#newsul').children().css({zIndex: '0', opacity: '0'});
        $('#newsul').children().first().css({zIndex: '2', opacity: '1'});
        $('#news').attr('rel', 1);
    } else {
        $('#newsul').children().css({zIndex: '0', opacity: '1'});
    }

}



function iscale(wg, hg) {

    $(".run img").each(function(index) {

        if (($(this).parent().attr('id') !== 'rarr')
                && ($(this).parent().attr('id') !== 'larr')
                && ($(this).parent().attr('class') !== 'imgarr')
                && ($(this).parent().attr('class') !== 'vidc')
                && $(this).parent().attr('class') !== 'imgsc') {

            var w = wg;
            var h = hg;
            var _h = parseInt($(this).css('height'));
            var _w = parseInt($(this).css('width'));
            var _scale = 1.0;
            $(this).css({position: 'absolute',
                width: '',
                height: ''
            });
            _h = parseInt($(this).css('height'));
            _w = parseInt($(this).css('width'));
            $(this).css({position: 'absolute',
                width: _w * 0.2,
                height: _h * 0.2
            });
            _h = parseInt($(this).css('height'));
            _w = parseInt($(this).css('width'));
            if (_w < w || _h < h) {
                for (var c = 0; c < 1100; c++) {
                    if (_w < w || _h < h) {
                        _scale += 0.001;
                        _w = _w * _scale;
                        _h = _h * _scale;
                        $(this).css({position: 'absolute',
                            width: _w + 'px',
                            height: _h + 'px'
                        });
                        _h = parseInt($(this).css('height'));
                        _w = parseInt($(this).css('width'));
                    }
                }
            }
            $(this).css({
                position: 'absolute',
                left: (wg - $(this).outerWidth()) / 2,
                top: (hg - $(this).outerHeight()) / 2
            });

            $(this).parent().css({zIndex: '0', opacity: '0'});
            $(this).parent().parent().children().first().css({zIndex: '2', opacity: '1'});
            $(this).closest('.imgsc').attr('rel', 1);
            $(this).parent().parent().parent().find('#ibtnh>a>.ibtnc').css('border', '1px solid ' + ibtnc);
            $(this).parent().parent().parent().find('#ibtnh>a>#ibtn1').css('border', '2px solid ' + ibtnc);
        }

    });
}


   