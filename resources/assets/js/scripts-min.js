!function(e){"use strict";function o(){e(".js-grid-items").each(function(){var o=e(this).width(),i=Math.floor(o/390),t=Math.floor(o/i);e(this).find(".js-grid-item").css({width:o}),e(this).find(".js-grid-item").css({width:t})})}function i(){var o=e(window).height(),i=e("header").outerHeight(),t=e(".gallery_horizontal");e("footer").outerHeight();d.find(".owl-stage-outer").length&&(d.trigger("destroy.owl.carousel").removeClass("owl-carousel owl-theme"),d.find(".owl-stage-outer").children().unwrap()),c.width()>768?(d.addClass("gallery_horizontal"),t.find("img").css({height:o-i-o/3})):d.removeClass("gallery_horizontal"),d.addClass("owl-carousel owl-theme"),d.owlCarousel({dots:!1,margin:10,items:1,smartSpeed:250,loop:!0,center:!0,nav:!0,video:!0,navText:["",""],onInitialized:function(){c.width()>768&&d.find(".owl-stage").css({height:o-i-o/3,overflow:"hidden"})},responsive:{0:{items:1,autoHeight:!0},768:{items:2,autoHeight:!0},1024:{items:3,autoWidth:!0},1200:{items:3,autoWidth:!0},1600:{items:4,autoWidth:!0}}})}var t=!0;/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)?(e("html").addClass("mobile"),t=!0):(e("html").addClass("no-mobile"),t=!1);var s=e(".js-navbar");t||s.affix({offset:{top:1}}),e('.nav-mobile-list li a[href="#"]').on("click",function(){return e(this).closest("li").toggleClass("current"),e(this).closest("li").children("ul").slideToggle(200),!1}),s.hasClass("home")||(t?s.removeClass("navbar-fixed-top"):e("body").addClass("affix-body")),e(".navbar-toggle").on("click",function(){e("body").removeClass("menu-is-closed").addClass("menu-is-opened"),e(".navbar").stop().animate({"margin-top":"-7rem"},500),e(".navbar").hasClass("home")||t||e("body").removeClass("affix-body",1e3)}),e(".close-menu, .click-capture").on("click",function(){e("body").removeClass("menu-is-opened").addClass("menu-is-closed"),e(".menu-list ul").slideUp(300),e(".navbar").stop().animate({"margin-top":"0"},500),e(".navbar").hasClass("home")||t||e("body").addClass("affix-body",1e3)});var a=e(".menu-list > li").has("ul").children("a");a.on("click",function(){return a.not(this).closest("li").find("ul").slideUp(200),e(this).closest("li").children("ul").slideToggle(200),!1});var l=e(".menu-list > li ul li").has("ul").children("a");if(l.on("click",function(){return l.not(this).closest("li").find("ul").slideUp(200),e(this).closest("li").children("ul").slideToggle(200),!1}),o(),e(window).resize(function(){o()}),e(".project-detail-control").on("click",function(){e(this).toggleClass("active"),e(".project-detail-content").slideToggle(200)}),e(".owl-carousel").length>0){var r=e(".project-carousel").owlCarousel({dots:!1,margin:30,smartSpeed:250,responsiveRefreshRate:0,nav:!0,navText:["",""],responsive:{0:{items:1},768:{items:2},1200:{items:3},1600:{items:4}}});e(".section-projects .owl-next").click(function(){r.trigger("next.owl.carousel")}),e(".section-projects .owl-prev").click(function(){r.trigger("prev.owl.carousel")}),e(".partner-carousel").owlCarousel({margin:30,dots:!1,responsiveRefreshRate:0,nav:!1,navText:["",""],autoplay:!0,center:!1,autoplayHoverPause:!0,loop:!0,responsive:{0:{items:1,center:!0},500:{items:3,autoWidth:!0},750:{items:4,autoWidth:!0},992:{items:5,autoWidth:!0,margin:40},1200:{items:6,autoWidth:!0,margin:50,loop:!0},1600:{items:7,autoWidth:!0,loop:!0,margin:60}}}),e(".news-carousel").owlCarousel({margin:30,smartSpeed:250,dots:!1,responsiveRefreshRate:0,nav:!0,navText:["",""],lazyLoad:!0,responsive:{0:{items:1},768:{items:2},1200:{items:3},1600:{items:4}}})}e(".js-isotope").each(function(){var o=e(this);o.isotope({itemSelector:".js-isotope-item",percentPosition:!0,layoutMode:"masonry",masonry:{columnWidth:".js-isotope-item"}}),o.imagesLoaded().progress(function(){o.isotope("layout")})});e(window).scroll(function(){e(window).scrollTop()>=100?e(".bt-top").addClass("visible"):e(".bt-top").removeClass("visible")}),e(".bt-top").on("click",function(o){o.preventDefault(),e("html, body").animate({scrollTop:"0px"},800)}),function(){var e=jQuery.fn.addClass,o=jQuery.fn.removeClass;jQuery.fn.addClass=function(){var o=e.apply(this,arguments);return jQuery(this).trigger("classChanged"),o},jQuery.fn.removeClass=function(){var e=o.apply(this,arguments);return jQuery(this).trigger("classChanged"),e}}();var n=!1;e(".navbar.home").on("classChanged",function(){e("#navbar").hasClass("affix")?(e(".navbar.affix .brand img").attr("src","/themes/architect/images/logo/logo-dark.svg"),e(".navbar .icon-bar").attr("style","background-color:#404040;"),n=!0):(e(".navbar .brand img").attr("src","/themes/architect/images/logo/logo-light.svg"),e(".navbar .icon-bar").attr("style","background-color:#fff;"),n=!0)}),!1===n&&e(".navbar.home").hasClass("affix")&&(e(".navbar.affix .brand img").attr("src","/themes/architect/images/logo/logo-dark.svg"),e(".navbar .icon-bar").attr("style","background-color:#404040;"));var d=e("#gallery_horizontal"),c=e(window);d.length&&(i(),c.on("resize.destroyhorizontal",function(){setTimeout(i,500)}),d.imagesLoaded().progress(function(){d.trigger("refresh.owl.carousel")})),e(".lightgallery").length>0&&e(".lightgallery").lightGallery({selector:".lightgallery, a.popup-image",cssEasing:"cubic-bezier(0.25, 0, 0.25, 1)",download:!1,counter:!1}),e("#rev_slider").length>0&&(void 0!==e.fn.revolution&&e("#rev_slider").revolution({sliderType:"standard",sliderLayout:"fullscreen",dottedOverlay:"",delay:7e3,autoHeight:"on",minHeight:380,navigation:{arrows:{style:"uranus",enable:!0},keyboardNavigation:"off",keyboard_direction:"horizontal",onHoverStop:"off",touch:{touchenabled:"on",swipe_threshold:75,swipe_min_touches:1,swipe_direction:"horizontal",drag_block_vertical:!1},bullets:{enable:!1,hide_onmobile:!0,direction:"horizontal",container:"layergrid",h_align:"right",v_align:"bottom",h_offset:0,v_offset:0,space:5}},parallax:{type:"scroll",origo:"slidercenter",speed:300,levels:[5,10,15,20,25,30,35,40,45,50,47,48,49,50,51,55],disable_onmobile:"on"},responsiveLevels:[2048,1600,1260,992],gridwidth:[1370,1100,900,700],gridheight:[800,800,500,300],lazyType:"smart",shadow:0,spinner:"spinner4",stopLoop:"on",stopAfterLoops:0,shuffle:"off",fullScreenAlignForce:"on",fullScreenOffset:"",disableProgressBar:"on",hideThumbsOnMobile:"off",hideSliderAtLimit:0,hideCaptionAtLimit:0,hideAllCaptionAtLilmit:0,debugMode:!1,fallbacks:{simplifyAll:"off",nextSlideOnWindowFocus:"off",disableFocusListener:!1}}),e(".slider-prev").on("click",function(){e(".rev_slider").revprev()}),e(".slider-next").on("click",function(){e(".rev_slider").revnext()}))}(jQuery);