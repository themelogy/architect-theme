( function($) {
	'use strict';
	/*-------------------------------------------------------------------------------
	 Detect mobile device
	 -------------------------------------------------------------------------------*/
	var mobileDevice = true;
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
		$('html').addClass('mobile');
		mobileDevice = true;
	}
	else{
		$('html').addClass('no-mobile');
		mobileDevice = false;
	}

	/*-------------------------------------------------------------------------------
	 Window load
	 -------------------------------------------------------------------------------*/
	// $(window).on('load', function(){
	// 	var wow = new WOW({
	// 	    offset: 150,
	// 	    mobile: false
	// 	  }
	// 	);
	// 	wow.init();
	// });
	var navbar=$('.js-navbar');

	/*-------------------------------------------------------------------------------
	 Navbar
	 -------------------------------------------------------------------------------*/
	if(!mobileDevice) {
		navbar.affix({
			offset: {
				top: 1
			}
		});
	}

	// navbar.on('affix.bs.affix', function() {
	// 	if (!navbar.hasClass('affix') && !navbar.hasClass('home')){
	// 		navbar.addClass('animated slideInDown');
	// 	}
	// });
    //
	// navbar.on('affixed-top.bs.affix', function() {
	// 	navbar.removeClass('animated slideInDown');
	// });

	$('.nav-mobile-list li a[href="#"]').on('click',function(){
		$(this).closest('li').toggleClass('current');
		$(this).closest('li').children('ul').slideToggle(200);
		return false;
	});

	/*-------------------------------------------------------------------------------
	 Menu
	 -------------------------------------------------------------------------------*/
	if(!navbar.hasClass('home')) {
		if(!mobileDevice) {
			$('body').addClass('affix-body');
		} else {
			navbar.removeClass('navbar-fixed-top');
		}
	}

	$('.navbar-toggle').on('click',function(){
		$('body').removeClass('menu-is-closed').addClass('menu-is-opened');
		$('.navbar').stop().animate({'margin-top':'-7rem'}, 500);
		if(!$('.navbar').hasClass('home') && !mobileDevice) {
			$('body').removeClass('affix-body', 1000);
		}
	});

	$('.close-menu, .click-capture').on('click', function(){
		$('body').removeClass('menu-is-opened').addClass('menu-is-closed');
		$('.menu-list ul').slideUp(300);
		$('.navbar').stop().animate({'margin-top':'0'}, 500);
		if(!$('.navbar').hasClass('home') && !mobileDevice) {
			$('body').addClass('affix-body', 1000);
		}
	});
	var dropToggle =$('.menu-list > li').has('ul').children('a');

	dropToggle.on('click',function(){
		dropToggle.not(this).closest('li').find('ul').slideUp(200);
		$(this).closest('li').children('ul').slideToggle(200);
		return false;
	});

	var subDropToggle =$('.menu-list > li ul li').has('ul').children('a');
	subDropToggle.on('click',function(){
		subDropToggle.not(this).closest('li').find('ul').slideUp(200);
		$(this).closest('li').children('ul').slideToggle(200);
		return false;
	});

	/*-------------------------------------------------------------------------------
	 Parallax
	 -------------------------------------------------------------------------------*/
	// $(window).stellar({
	//   	responsive: true,
	//   	horizontalScrolling: false,
	//   	hideDistantElements: false,
	//   	horizontalOffset: 0,
	//   	verticalOffset: 0
	// });

	/*-------------------------------------------------------------------------------
	 Projects grid
	 -------------------------------------------------------------------------------*/
	function columnGrid(){
		$('.js-grid-items').each(function(){
			var colWrap =$(this).width();
			var colItem = Math.floor(colWrap / 390);
			var colFixedItem = Math.floor(colWrap / colItem);
			$(this).find('.js-grid-item').css({ 'width' : colWrap});
			$(this).find('.js-grid-item').css({ 'width' : colFixedItem});
		});
	}

	columnGrid();

	$(window).resize(function(){
		columnGrid();
	});

	/*-------------------------------------------------------------------------------
	 Hide project info
	 -------------------------------------------------------------------------------*/
	$('.project-detail-control').on('click', function(){
		$(this).toggleClass('active');
		$('.project-detail-content').slideToggle(200);
	});

	/*-------------------------------------------------------------------------------
	 Owl Carousel
	 -------------------------------------------------------------------------------*/
	if ($('.owl-carousel').length > 0){
		/*-------------------------------------------------------------------------------
		 Project Carousel
		 -------------------------------------------------------------------------------*/
		var owl_pc = $('.project-carousel').owlCarousel({
			dots:false,
			margin:30,
			smartSpeed:250,
			responsiveRefreshRate:0,
			nav: true,
			navText: ['',''],
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				1200:{
					items:3
				},
				1600:{
					items:4
				}
			}
		});

		$('.section-projects .owl-next').click(function () {
			owl_pc.trigger('next.owl.carousel');
		});

		$('.section-projects .owl-prev').click(function () {
			owl_pc.trigger('prev.owl.carousel');
		});

		/*-------------------------------------------------------------------------------
		 Partner Carousel
		 -------------------------------------------------------------------------------*/
		$('.partner-carousel').owlCarousel({
			margin:30,
			dots:false,
			responsiveRefreshRate:0,
			nav: false,
			navText: ['',''],
			autoplay:true,
			center: false,
			autoplayHoverPause:true,
			loop: true,
			responsive:{
				0:{
					items:1,
					center: true
				},
				500:{
					items:3,
					autoWidth: true
				},
				750:{
					items:4,
					autoWidth: true
				},
				992:{
					items:5,
					autoWidth: true,
					margin:40
				},
				1200:{
					items:6,
					autoWidth: true,
					margin:50,
					loop: true
				},
				1600: {
					items:7,
					autoWidth: true,
					loop: true,
					margin:60
				}
			}
		});
		/*-------------------------------------------------------------------------------
		 News Carousel
		 -------------------------------------------------------------------------------*/
		$('.news-carousel').owlCarousel({
			margin:30,
			smartSpeed:250,
			dots:false,
			responsiveRefreshRate:0,
			nav: true,
			navText: ['',''],
			lazyLoad: true,
			responsive:{
				0:{
					items:1
				},
				768:{
					items:2
				},
				1200:{
					items:3
				},
				1600:{
					items:4
				}
			}
		});
	}
	/*-------------------------------------------------------------------------------
	 Projects masonry
	 -------------------------------------------------------------------------------*/
	var $container=$('.js-isotope').each(function() {
		var $container = $(this);
		$container.isotope({
			itemSelector: '.js-isotope-item',
			percentPosition: true,
			layoutMode: 'masonry',
			masonry: {
				columnWidth: '.js-isotope-item'
			}
		});
		$container.imagesLoaded().progress( function(){
			$container.isotope('layout');
		});
	});

	/*-------------------------------------------------------------------------------
	 Scroll
	 -------------------------------------------------------------------------------*/
	// if(!mobileDevice) {
	// 	$("body").niceScroll({
	// 		cursorcolor: "#969696",
	// 		cursorborder: "#909090",
	// 		scrollspeed: 120,
	// 		mousescrollstep: 90,
	// 		autohidemode: false,
	// 		horizrailenabled: true,
	// 		preservenativescrolling: true,
	// 		cursordragontouch: false,
	// 		zindex:5
	// 	});
	// }

	$(window).scroll(function () {
		if ($(window).scrollTop() >= 100) {
			$('.bt-top').addClass('visible');
		} else {
			$('.bt-top').removeClass('visible');
		}
	});

	$('.bt-top').on('click', function (e) {
		e.preventDefault();
		$('html, body').animate({scrollTop: '0px'}, 800);
	});

	/*-------------------------------------------------------------------------------
	 Navbar Logo Changed
	 -------------------------------------------------------------------------------*/

	(function(){
		var originalAddClassMethod = jQuery.fn.addClass;
		var originalRemoveClassMethod = jQuery.fn.removeClass;
		jQuery.fn.addClass = function(){
			var result = originalAddClassMethod.apply( this, arguments );
			jQuery(this).trigger('classChanged');
			return result;
		}
		jQuery.fn.removeClass = function(){
			var result = originalRemoveClassMethod.apply( this, arguments );
			jQuery(this).trigger('classChanged');
			return result;
		}
	})();

	var classChanged = false;
	$('.navbar.home').on('classChanged', function () {
		if($('#navbar').hasClass('affix')) {
			$('.navbar.affix .brand img').attr('src', '/themes/architect/images/logo/logo-dark.svg');
			$('.navbar .icon-bar').attr('style', 'background-color:#404040;');
			classChanged = true;
		} else {
			$('.navbar .brand img').attr('src', '/themes/architect/images/logo/logo-light.svg');
			$('.navbar .icon-bar').attr('style', 'background-color:#fff;');
			classChanged = true;
		}
	});
	if(classChanged === false) {
		if($('.navbar.home').hasClass('affix')) {
			$('.navbar.affix .brand img').attr('src', '/themes/architect/images/logo/logo-dark.svg');
			$('.navbar .icon-bar').attr('style', 'background-color:#404040;');
		}
	}

	/*-------------------------------------------------------------------------------
	 Project detail gallery
	 -------------------------------------------------------------------------------*/
	var gR = $("#gallery_horizontal"), w = $(window);

	function initGalleryhorizontal() {
		var a = $(window).height(),
			b = $("header").outerHeight(),
			c = $(".gallery_horizontal"),
			d = $("footer").outerHeight();

		if (gR.find(".owl-stage-outer").length) {
			gR.trigger("destroy.owl.carousel").removeClass('owl-carousel owl-theme');
			gR.find('.owl-stage-outer').children().unwrap();
		}

		if (w.width() > 768) {
			gR.addClass('gallery_horizontal');
			c.find("img").css({
				height: a - b - (a/3)
			});
		} else {
			gR.removeClass('gallery_horizontal');
		}

		gR.addClass('owl-carousel owl-theme');
		gR.owlCarousel({
			dots: false,
			margin: 10,
			items: 1,
			smartSpeed: 1300,
			loop: true,
			// autoplay: true,
			// autoplayTimeout: 3000,
			center: true,
			nav: true,
			video:true,
			lazyLoad: true,
			navText: ["", ""],
			onInitialized: function () {
				if (w.width() > 768) {
					gR.find(".owl-stage").css({
						height: a - b - (a/3),
						overflow: "hidden"
					});
				}
			},
			responsive: {
				0: {
					items: 1,
					autoHeight: true
				},
				768: {
					items: 2,
					autoHeight: true
				},
				1024: {
					items: 3,
					autoWidth: true
				},
				1200: {
					items: 3,
					autoWidth: true
				},
				1600: {
					items: 4,
					autoWidth: true
				}
			}
		});
	}

	if (gR.length) {
		initGalleryhorizontal();
		w.on("resize.destroyhorizontal", function () {
			setTimeout(initGalleryhorizontal, 500);
		});
		gR.on('loaded.owl.lazy', function(event) {
			var totitem = event.item.count + 2;
			var nextitem = event.item.index + 1;
			if (nextitem <= totitem) {
				var imgsrc = $(event.target).find('.item').eq(nextitem).find('img').data('src');
				$(event.target).find('.item').eq(nextitem).find('img').attr("src", imgsrc).css("opacity", "1");
			}
			$(this).find('.owl-item.active img').one('load', function () {
				gR.trigger('refresh.owl.carousel');
			});
		});
	}

	if($('.lightgallery').length>0) {
		$(".lightgallery").lightGallery({
			selector: ".lightgallery, a.popup-image",
			cssEasing: "cubic-bezier(0.25, 0, 0.25, 1)",
			download: false,
			counter: false
		});

		// $(".lightgallery").on("onBeforeNextSlide.lg", function (a) {
		// 	gR.trigger("next.owl.carousel");
		// });
        //
		// $(".lightgallery").on("onBeforePrevSlide.lg", function (a) {
		// 	gR.trigger("prev.owl.carousel");
		// });
	}

	if($('#rev_slider').length>0) {
		if (typeof $.fn.revolution !== 'undefined') {
			$("#rev_slider").revolution({
				sliderType: "standard",
				sliderLayout: "fullscreen",
				dottedOverlay:"",
				delay: 7000,
				autoHeight: 'on',
				minHeight: 380,
				navigation: {
					arrows: {
						style: "uranus",
						enable: true
					},
					keyboardNavigation: "off",
					keyboard_direction: "horizontal",
					onHoverStop: "off",
					touch: {
						touchenabled: "on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					},
					bullets: {
						enable: false,
						hide_onmobile: true,
						direction: "horizontal",
						container: 'layergrid',
						h_align: "right",
						v_align: "bottom",
						h_offset: 0,
						v_offset: 0,
						space: 5
					}
				},
				parallax: {
					type: "scroll",
					origo: "slidercenter",
					speed: 300,
					levels: [5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 47, 48, 49, 50, 51, 55],
					disable_onmobile: 'on'
				},
				responsiveLevels: [2048, 1600, 1260, 992],
				gridwidth: [1370, 1100, 900, 700],
				gridheight: [800, 800, 500, 300],
				lazyType: "smart",
				shadow: 0,
				spinner: "spinner4",
				stopLoop: "on",
				stopAfterLoops: 0,
				shuffle: "off",
				fullScreenAlignForce: "on",
				fullScreenOffset: "",
				disableProgressBar: "on",
				hideThumbsOnMobile: "off",
				hideSliderAtLimit: 0,
				hideCaptionAtLimit: 0,
				hideAllCaptionAtLilmit: 0,
				debugMode: false,
				fallbacks: {
					simplifyAll: "off",
					nextSlideOnWindowFocus: "off",
					disableFocusListener: false
				}
			});
		}

		$('.slider-prev').on('click', function () {
			$(".rev_slider").revprev();
		});

		$('.slider-next').on('click', function () {
			$(".rev_slider").revnext();
		});
	}
})(jQuery);