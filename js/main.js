// JQ版本
{/* <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> */}
//================== nev =========================================

//=====================header-scroll
var last = 0;
$(window).scroll(function () {
    let scroll = $(this).scrollTop();
    // if (scroll < 100) {
    //     $(".header").addClass("scroll")
    // }
    if (last < scroll) {
        $(".header").addClass("scroll")
    } else {
        $(".header").removeClass("scroll")
    }
    last = scroll;
    // console.log(last)
})
// ===================== login-hover
$('.icon-group--center').find('.icon-user-o').parent().on({
    'mouseover': function () {
        $('.login-addmenu').addClass('hover');
    },
    'mouseout': function () { $('.login-addmenu').removeClass('hover'); },
})
$('.login-addmenu').on({
    'mouseover': function () {
        $('.login-addmenu').addClass('hover');
    },
    'mouseout': function () { $('.login-addmenu').removeClass('hover'); },
})
// ===================== member-hover
$('.icon-group--center').find('.icon-user').parent().on({
    'mouseover': function () {
        $('.member-addmenu').addClass('hover');
    },
    'mouseout': function () { $('.member-addmenu').removeClass('hover'); },
})
$('.member-addmenu').on({
    'mouseover': function () {
        $('.member-addmenu').addClass('hover');
    },
    'mouseout': function () { $('.member-addmenu').removeClass('hover'); },
})
//==============================手機menu
$('.menu-bar').click(function () {
    $(this).toggleClass('visible')
    $('.popup-menu').toggleClass('visible')
})
$('.popup-menu').find('.icon-user').parent().click(function () {
    $('.popup-menu').find('.popup-nav').toggleClass('hover')
})
$('.popup-menu').find('.icon-user-o').parent().click(function () {
    $('.popup-menu').find('.popup-nav').toggleClass('o-hover')
})

// =====================news-slider==============================
// 更換slider的js
$('.slide-back .d-flex').click(
    function () {
        x = $(this).find('.situation img').attr("src")
        $('.situ-news').attr("src", x)
        // console.log(x)
    }
)
// ====================lightbox==================================

$('.fake').click(function () {
    $('body').removeClass('turnLight');
    $(this).parent().addClass('none');
}
)
$('.Lightbox').find('.icon-cancel').click(function () {
    $('body').removeClass('turnLight');
    $(this).parent().parent().addClass('none');
}
)
//==========================login
$('.header').find('.icon-user-o').parent().click(function () {
    $('body').addClass('turnLight');
    $('.login').removeClass('none');
})
$('.header').find('.tologin').click(function () {
    $('body').addClass('turnLight');
    $('.login').removeClass('none');
})
$('.header').find('.tosignin').click(function () {
    $('body').addClass('turnLight');
    $('.signin').removeClass('none');
})
$('.toterm').find('label').click(function () {
    $('body').addClass('turnLight');
    $('.term').removeClass('none');
})
$('.term').find('.btn').click(function () {
    $('body').removeClass('turnLight');
    $('.term').addClass('none');
    $(".toterm").find('input').attr("checked", true);
})
//==========================news
$('.news-preview').children().click(function () {
    $('body').addClass('turnLight');
    $('.newsLightbox').removeClass('none');
})
//=========================shsre
$('.share').find('.imgBox_inner').click(function () {
    $('body').addClass('turnLight');
    $('.shareLightbox').removeClass('none');
})


//=======================Q&A====================================================
// 今天寫的都動不了QQ
//忘了麼寫
var formwidth = $('.ask-form').width();
$('.ask-form').css("left", -formwidth);
//=============================
$('.QA').find('.d-flex').click(function () {
    $(this).parent().toggleClass('open').siblings().removeClass('open');
})
var num = 1
$('.ask-icon').click(function () {
    if (num == 1) {
        $(".ask-form").css("left", 0);
        num = 2;
    } else {
        $('.ask-form').css("left", -formwidth);
        num = 1;
    }
})
//======================ToTop=======================================
//fadeIn顯示,fadeOut不顯示=>display: none; opacity: 1;
$(window).scroll(function () {

    if ($(this).scrollTop() > 300) {
        $('.totop').fadeIn("fast");
    } else {
        $('.totop').stop().fadeOut('fast');
    }
}).scroll();
//====================================
$.extend($.easing, {
    easeOutExpo: function (x, t, b, c, d) {
        return (t == d) ? b + c : c * (-Math.pow(2, -10 * t / d) + 1) + b;
    }
});

$(".totop").click(function () {
    $("html, body").animate({ scrollTop: 0 }, 100, "easeOutExpo");
    $('.totop').addClass('move');
    setTimeout(() => {
        $('.totop').removeClass('move');
    }, 200);
});
//======================footer======================================

$('.footer').find('i').click(function () {
    $(this).toggleClass('icon-down-open').toggleClass('icon-up-open')
    $('.popup-footer').toggleClass('visible')
})
//=====================================================================



//================index-bg============================================================
// 要放最下面!!!!會因找不到bg-svg而影響其他元素



// // console.log(stop);
$(window).scroll(function () {
    var bartop = $(".bg-svg").offset().top
    // var bartop = $(".bg-svg").offset().top;
    let scrollTop = $(window).scrollTop();
    if (scrollTop > bartop) {
        $(".bg-svg").addClass("go")
    } else { $(".bg-svg").removeClass("go") };

})
