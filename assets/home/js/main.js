"use strict";
var rangeSlider = document.getElementById("income-model-range")
  , rangeBullet = document.getElementById("income-model-range-output")
  , rangeCount = document.getElementById("income-model-count");
function showSliderValue() {
    rangeBullet.innerHTML = rangeSlider.value;
    var e = rangeSlider.value / rangeSlider.max;
    window.innerWidth >= 600 ? rangeBullet.style.left = 375 * e + "px" : window.innerWidth >= 468 ? rangeBullet.style.left = 235 * e + "px" : window.innerWidth >= 414 ? rangeBullet.style.left = 245 * e + "px" : window.innerWidth >= 375 ? rangeBullet.style.left = 220 * e + "px" : window.innerWidth >= 320 && (rangeBullet.style.left = 165 * e + "px")
}
function countRangeSlider() {
    rangeSlider.value >= 1 && rangeSlider.value <= 49 ? rangeCount.innerHTML = "<span>$</span>" + (100 * rangeSlider.value * 0 + .05 * (100 * rangeSlider.value - 0)) : rangeSlider.value >= 50 && rangeSlider.value <= 99 ? rangeCount.innerHTML = "<span>$</span>" + Math.round(100 * rangeSlider.value * .24 + .15 * (100 * rangeSlider.value - .24)) : rangeSlider.value >= 100 && rangeSlider.value <= 199 ? rangeCount.innerHTML = "<span>$</span>" + Math.round(100 * rangeSlider.value * .3 + .15 * (100 * rangeSlider.value - .3)) : rangeSlider.value >= 200 && rangeSlider.value <= 250 && (rangeCount.innerHTML = "<span>$</span>" + Math.round(100 * rangeSlider.value * .35 + .15 * (100 * rangeSlider.value - .35)))
}
rangeSlider.addEventListener("input", showSliderValue, !1),
rangeSlider.addEventListener("input", countRangeSlider, !1);
var refRangeSlider = document.getElementById("ref-income-model-range")
  , refRangeBullet = document.getElementById("ref-income-model-range-output")
  , refRangeCount = document.getElementById("ref-income-model-count");
function refShowSliderValue() {
    refRangeBullet.innerHTML = refRangeSlider.value;
    var e = refRangeSlider.value / refRangeSlider.max;
    window.innerWidth >= 600 ? refRangeBullet.style.left = 375 * e + "px" : window.innerWidth >= 468 ? refRangeBullet.style.left = 235 * e + "px" : window.innerWidth >= 414 ? refRangeBullet.style.left = 245 * e + "px" : window.innerWidth >= 375 ? refRangeBullet.style.left = 220 * e + "px" : window.innerWidth >= 320 && (refRangeBullet.style.left = 165 * e + "px")
}
function refCountRangeSlider() {
    refRangeSlider.value >= 1 && refRangeSlider.value <= 9 ? refRangeCount.innerHTML = "<span>$</span>" + 60 * refRangeSlider.value : refRangeSlider.value >= 10 && refRangeSlider.value <= 29 ? refRangeCount.innerHTML = "<span>$</span>" + 70 * refRangeSlider.value : refRangeSlider.value >= 30 && refRangeSlider.value <= 49 ? refRangeCount.innerHTML = "<span>$</span>" + 80 * refRangeSlider.value : refRangeSlider.value >= 50 && refRangeSlider.value <= 100 && (refRangeCount.innerHTML = "<span>$</span>" + 90 * refRangeSlider.value)
}
function rangeIncome() {
    var e = 100 * $(".income-model__range-slider_range").val() / 250;
    $(".income-model__range-slider_range").css({
        background: "-webkit-linear-gradient(left ,#6832c2 0%,#6832c2 " + e + "%,#d4d4d4 " + e + "%, #d4d4d4 100%)"
    })
}
function refRangeIncome() {
    var e = 100 * $(".ref-income-model__range-slider_range").val() / 100;
    $(".ref-income-model__range-slider_range").css({
        background: "-webkit-linear-gradient(left ,#6832c2 0%,#6832c2 " + e + "%,#d4d4d4 " + e + "%, #d4d4d4 100%)"
    })
}
refRangeSlider.addEventListener("input", refShowSliderValue, !1),
refRangeSlider.addEventListener("input", refCountRangeSlider, !1);
var swiper = new Swiper(".swiper-container",{
    navigation: {
        nextEl: ".testimonials__button_next",
        prevEl: ".testimonials__button_prev"
    },
    autoplay: {
        delay: 4e3,
        disableOnInteraction: !1
    },
    loop: !0
});
swiper = new Swiper(".how-does-it-work__swiper-container",{
    autoplay: {
        delay: 7e3,
        disableOnInteraction: !1
    },
    pagination: {
        el: ".how-does-it-work__swiper-pagination",
        clickable: !0
    },
    loop: !0
}),
swiper = new Swiper(".it-for-you__swiper-container",{
    navigation: {
        nextEl: ".it-for-you__button_next",
        prevEl: ".it-for-you__button_prev"
    },
    loop: !0,
    breakpoints: {
        1024: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        420: {
            slidesPerView: 3,
            spaceBetween: 10
        }
    }
});
if ($(document).ready(function() {
    $("a[href*=\\#]").on("click", function(e) {
        var n = $(this);
        return $("html, body").stop().animate({
            scrollTop: $(n.attr("href")).position().top - 70
        }, 777),
        e.preventDefault(),
        !1
    })
}),
$(document).ready(function(e) {
    function n(e) {
        var n = String.fromCharCode(e.which);
        return new RegExp(/[a-zåäö ]/i).test(n)
    }
    e("#testimonials-form").submit(function() {
        var n = e(this).serialize()
          , i = e("#formEmail").val();
        return 0 == !e(".checkbox:checkbox:checked").length ? (e("input[type='checkbox']").removeClass("invalid"),
        i.match(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/) ? e.ajax({
            type: "POST",
            url: "/wp-content/special/mail.php",
            data: n,
            success: function(n, i) {
                if (window.innerWidth <= 1024) {
                    var r = e("#join-now-scroll-success");
                    e("html, body").stop().animate({
                        scrollTop: e(r).position().top - 70
                    }, 777)
                }
                if ("OK" == n) {
                    if (i = '<div class="ok">Thank you for sign up! Will get back to you shortly with more details!</div>',
                    window.innerWidth <= 1024) {
                        r = e("#join-now-scroll-success");
                        e("html, body").stop().animate({
                            scrollTop: e(r).position().top - 70
                        }, 777)
                    }
                    1 == e("#formOrderBased:checkbox:checked").length && 0 == e("#formReferral:checkbox:checked").length && gtag("event", "order", {
                        event_category: "Sing_up",
                        value: "order"
                    }),
                    1 == e("#formReferral:checkbox:checked").length && 0 == e("#formOrderBased:checkbox:checked").length && gtag("event", "referral", {
                        event_category: "Sing_up",
                        value: "referral"
                    }),
                    1 == e("#formReferral:checkbox:checked").length && 1 == e("#formOrderBased:checkbox:checked").length && gtag("event", "order+referral", {
                        event_category: "Sing_up",
                        value: "order+referral"
                    }),
                    fbq("track", "LeadCash")
                } else
                    i = n,
                    e("#note").html(i),
                    e("#join-now").css("display", "none"),
                    e("#success-email").css("display", "flex");
                e("#note").html(i),
                e("#join-now").css("display", "none"),
                e("#success-email").css("display", "flex")
            }
        }) : e("#formEmail").css("border-bottom-color", "#ff0600")) : e("input[type='checkbox']").addClass("invalid"),
        !1
    }),
    e("#formName").bind("keypress", n),
    e("#formLastName").bind("keypress", n)
}),
window.innerWidth <= 1024) {
    !function(e) {
        e.fn.sidenav = function(r) {
            var a = e(this);
            "open" == r ? (n(a),
            e(".overlay").fadeIn(500),
            e("svg.ham").addClass("active")) : "close" == r && (i(a),
            e(".overlay").fadeOut(500),
            e("svg.ham").removeClass("active"))
        }
        ;
        var n = function(n) {
            n.addClass("open"),
            e("#openNavMains").addClass("button-open")
        }
          , i = function(n) {
            n.removeClass("open"),
            n.removeClass("second"),
            e("#openNavMains").removeClass(" button-open")
        }
    }(jQuery);
    var sidenavMain = $("#sidenavMains");
    $('#openNavMains, #sidenavMains a, .overlay, a[href="#join-now-scroll"]').on("click", function() {
        sidenavMain.hasClass("open") ? sidenavMain.sidenav("close") : sidenavMain.sidenav("open")
    }),
    $('#closeNavMains, #sidenavMains a, .overlay, a[href="#join-now-scroll"]').on("click", function() {
        sidenavMain.sidenav("close")
    })
}
window.innerWidth <= 468 && $(function() {
    $(".testimonials__contact-form_left >").unwrap(),
    $(".testimonials__contact-form_right >").unwrap()
}),
$(document).ready(function() {
    $(".income-model__ribbons-el").hover(function() {
        $(this).stop(!0).addClass("income-model__ribbons-el-animate", 100),
        $(".income-model__ribbons-el:first").stop(!0).removeClass("income-model__ribbons-el-animate", 100)
    }, function() {
        $(this).stop(!0).removeClass("income-model__ribbons-el-animate", 100),
        $(".income-model__ribbons-el:first").stop(!0).addClass("income-model__ribbons-el-animate", 100)
    }),
    $(".income-model__ribbons-el:first").hover(function() {
        $(this).stop(!0).addClass("income-model__ribbons-el-animate", 100)
    }),
    $(".ref-income-model__ribbons-el").hover(function() {
        $(this).addClass("ref-income-model__ribbons-el-animate", 100),
        $(".ref-income-model__ribbons-el:first").removeClass("ref-income-model__ribbons-el-animate", 100)
    }, function() {
        $(this).removeClass("ref-income-model__ribbons-el-animate", 100),
        $(".ref-income-model__ribbons-el:first").addClass("ref-income-model__ribbons-el-animate", 100)
    }),
    $(".ref-income-model__ribbons-el:first").hover(function() {
        $(this).addClass("ref-income-model__ribbons-el-animate", 100)
    })
});
var width = $(window).width();
if ($(window).resize(function() {
    width = $(window).width()
}),
function(e) {
    if (e > 992) {
        var n = function() {
            var n = $("#header")
              , i = $(window).scrollTop();
            e < 1200 || (i > 0 ? n.addClass("scroll") : 0 === i && n.removeClass("scroll"))
        };
        $(window).on("scroll", n),
        $(window).on("load", n)
    }
}(width),
$(document).ready(function() {
    $("body").append('<a href="#up" id="go-top" title="Up"></a>')
}),
window.innerWidth <= 768 && ($(function() {
    $.fn.scrollToTop = function() {
        $(this).hide().removeAttr("href"),
        $(window).scrollTop() >= "250" && $(this).fadeIn("slow");
        var e = $(this);
        $(window).scroll(function() {
            $(window).scrollTop() <= "250" ? $(e).fadeOut("slow") : $(e).fadeIn("slow")
        }),
        $(this).click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, "slow")
        })
    }
}),
$(function() {
    $("#go-top").scrollToTop()
})),
window.innerWidth <= 468) {
    var listItem = "<span class='income-model__ribbons-el_cash-desc'>per month</span>";
    $(".income-model__ribbons-el_cash").append(listItem);
    var refListItem = "<span class='ref-income-model__ribbons-el_cash-desc'>per month</span>";
    $(".ref-income-model__ribbons-el_cash").append(refListItem)
}
