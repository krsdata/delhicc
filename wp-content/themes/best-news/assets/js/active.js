/*==================================
Template Name: Bnews 
Description: Bnews is a Multipurpose News Magazine Template.
Version: 1.0
====================================*/    
(function($) {
    "use strict";
     $(document).on('ready', function() {	
		
		/*==============================
			Mobile Nav
		================================*/ 	
		$('.menu').slicknav({
			prependTo:".mobile-nav",
			label: '',
			duration: 500,
			easingOpen: "easeOutBounce",
		});
	 
		/*====================================
			Search Form JS
		======================================*/ 	
		$('.search-form .icon').on( "click", function(){
			$('.search-form').toggleClass('active');
		});	
		
		/*===============================
			Ticker Slider
		=================================*/ 
		$(".ticker-slider").owlCarousel({
			loop: $(".ticker-slider > .single-ticker").length <= 1 ? false : true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:2500,
			autoplayHoverPause:true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			center:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
			items:1,
		});
		
		/*===============================
		04. Home Slider One
		=================================*/ 
		$(".main-slider .slider-active").owlCarousel({
			loop:$(".main-slider .slider-active .single-slider").length <= 1 ? false : true,
			autoplay:true,
			smartSpeed: 600,
			autoplayTimeout:3500,
			autoplayHoverPause:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
			items:1,
		});
			
		/*===============================
		04. Home Slider One
		=================================*/ 
		$(".video-slider").owlCarousel({
			loop:true,
			autoplay:true,
			smartSpeed: 500,
			autoplayTimeout:3500,
			autoplayHoverPause:true,
			center:false,
			margin:30,
			nav:false,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:true,
			items:3,	
			responsive:{
				300: {
					items:1,
				},
				480: {
					items:1,
				},
				768: {
					items:2,
				},
				1170: {
					items:3,
				},
			}
		});
		
		/*===============================
		04. Home Slider One
		=================================*/ 
		$(".carousel-slider").owlCarousel({
			loop:true,
			autoplay:false,
			smartSpeed: 500,
			autoplayTimeout:3500,
			autoplayHoverPause:true,
			center:false,
			margin:30,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
			items:3,
			responsive:{
				300: {
					items:1,
					nav:false,
				},
				480: {
					items:1,
					nav:false,
				},
				768: {
					items:2,
					nav:false,
				},
				1170: {
					items:3,
				},
			}
		});
		
		/*=====================================
		20. Video Popup
		======================================*/ 
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
		
		/*====================================
			Scrool Up
		======================================*/ 	
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			scrollText: ["<i class='fa fa-long-arrow-up'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647           // Z-Index for the overlay
		});
		
	});	
		/*====================================
			Extra JS
		======================================*/ 
		$('.a').on("click", function (e) {
			var anchor = $(this);
				$('html, body').stop().animate({
					scrollTop: $(anchor.attr('href')).offset().top - 70
				}, 1000);
			e.preventDefault();
		});
		
		/*====================================
			Preloader JS
		======================================*/
		$(window).on('load', function() {
				$('.template-preloader-rapper').fadeOut('slow', function(){
				$(this).remove();
			});
		});
		
		$(".popular").click(function(){
			 $(".custom-widget-comments").removeClass("active");
			 $("#popular").addClass("active");
		});

		$(".comments").click(function(){
			 $("#popular").removeClass("active");
			 $(".custom-widget-comments").addClass("active");
		});		 

		/** make sub menu focus with keyboard */ 
		
        $(".nav li a").focus(function () {
            $(this).parent('li').children('ul.dropdown').css({"opacity": "1", "visibility": "visible", "transform": "translateY(0px)"});
            $(this).parent('li.menu-item-has-children').children('ul.dropdown').children('li.menu-item-has-children').children('ul').children('li:last-child').focusout(function(){
                $(this).parent('ul').css('visibility', 'hidden');
                $(this).parent('ul').css('opacity', '0');
            });
            $(this).parent('li').children('ul.dropdown').children('li:last-child').not('.menu-item-has-children').focusout(function(){
				$(this).parent('ul').css('visibility', 'hidden');
                $(this).parent('ul').css('opacity', '0');
            });
            $(this).parent('li.menu-item-has-children').children('ul.dropdown').children('li.menu-item-has-children:last-child').children('ul.dropdown').children('li:last-child').focusout(function(){
				$(".dropdown").css('visibility', 'hidden');
                $(".dropdown").css('opacity', '0');
            });
        }); 
})(jQuery);