(function ($) {
    'use strict';
    $(function(){

        /* js-news trickle fot top-notification-bar*/
        var $ticker = $('.notice-info');

        if ( $ticker.length ) {
            $('.notice-info').marquee({
                //gap in pixels between the tickers
                gap: 0,
                //time in milliseconds before the marquee will start animating
                delayBeforeStart: 0,
                //'left' or 'right'
                direction: 'left',/*'left' / 'right' / 'up' / 'down'*/
                //true or false - should the marquee be duplicated to show an effect of continues flow
                duplicated: true,
                pauseOnHover: true,
                startVisible: true,
                duration: 40000,
            });   
        }
    
        /*meanmenu js for responsive menu for header-layout-1*/
        $('.main-navigation').meanmenu({
            meanMenuContainer: '.site-branding',
            meanScreenWidth: "768",
            meanRevealPosition: "right",
        });

        /* back-to-top button */
        $('.back-to-top').hide();
        $('.back-to-top').on("click", function (e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, 'slow');
        });

        $(window).scroll(function () {
            var scrollheight = 400;
            if ($(window).scrollTop() > scrollheight) {
                $('.back-to-top').fadeIn();

            } else {
                $('.back-to-top').fadeOut();
            }
        });

        jQuery('.home-content, .home-sidebar, .content-area, .widget-area').theiaStickySidebar({
          // Settings
          additionalMarginTop: 30
        });    

        /*featured banner slider*/
        $('.featured-post-slider').owlCarousel({
            dots: false,
            margin: 0,
            nav: true,
            items: 1,
            autoHeight:false
        });

        /**/
        $('#secondary .featured-post-slider-2, .site-footer .featured-post-slider-2, .row .featured-post-slider-2').owlCarousel({
            dots: false,
            margin: 0,
            nav: true,
            items: 1,
            autoHeight:false
        });
        
        $('.featured-post-slider-2').owlCarousel({
            stagePadding: 200,
            loop:true,
            margin:10,
            autoHeight:true,
            items:1,
            dots:false,
            lazyLoad: true,
            nav:true,
            autoplay: true,
            center: true,
            responsive:{
                0:{
                    items:1,
                    stagePadding: 0
                },
                600:{
                    items:1,
                    margin:10,
                    stagePadding:30
                },
                1000:{
                    items:1,
                    margin:10,
                    stagePadding: 200
                }
            }
        });
        /**/
        
        $('.related-post-section .trending').owlCarousel({
            loop: true,
            dots: false,
            margin: 30,
            autoHeight:false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                840: {
                    items: 2,
                    nav: true
                }
            }
        });

        $('#secondary .trending , .site-footer .trending').owlCarousel({
            loop: true,
            items: 1,
            dots: false,
            nav: true,
            autoHeight:false,
            margin:0
        });

        /*Trending Carousel*/
        $('.trending').owlCarousel({
            loop: true,
            dots: false,
            autoHeight:false,
            margin: 30,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true
                },
                640: {
                    items: 2,
                    nav: true
                },
                1000: {
                    items: 3,
                    nav: true,
                    loop: false
                }
            }
        });

        $('.insta-gallery').owlCarousel({
            loop:true,
            nav:true,
            margin:0,
            dots:false,
            autoHeight:false,
            responsiveClass:true,
            responsive:{
                0:{
                    items:1,
                },
                600:{
                    items:3,
                },
                800:{
                    items:4,
                },
                1000:{
                    items:5,
                    loop:false
                }
            }
        })

        //tab js
        $('.header-tab-button .tab-link').on("click", function () {
            var tab_id = $(this).attr('data-tab');
            $('.header-tab-button .tab-link').removeClass('current');
            $('.tab-content').removeClass('current');
            $(this).addClass('current');
            $("." + tab_id).addClass('current');
        });
        $('.world-news-option li .entry-title a').on("click", function () {
            var tab_id = $(this).attr('data-tab');
            $('.world-news-option li').removeClass('current');
            $('.world-news-item').removeClass('current');
            $(this).parents('.post-content ').addClass('current');
            $("." + tab_id).addClass('current');
        });

        /*isotope*/
        /*active class adding and removing */
        $(".filters-button-group li ").click(function() {
            $(".filters-button-group  li.active").removeClass("active"), $(this).addClass("active")
        })

    });

    $(window).on( 'load', function() {

        $('.preloader').fadeOut('slow');

        if (window.innerWidth > 768){
            var wrapper = document.querySelector(".main-nav");
            var nav = priorityNav.init({
                mainNavWrapper: ".main-nav", // mainnav wrapper selector (must be direct parent from mainNav)
                mainNav: "ul", // mainnav selector. (must be inline-block)
                navDropdownLabel: 'More',            
                navDropdownClassName: "nav__dropdown", // class used for the dropdown.
                navDropdownToggleClassName: "nav__dropdown-toggle", // class used for the dropdown toggle.
            });
        }           

        var $container = $('.editor-choice .grid');   
        if ( $container.length ) {     
            $container.isotope({                        
                itemSelector : '.element-item', 
                layoutMode : 'masonry',
                percentPosition: true,
                columnWidth: '.element-item',
                isFitWidth: true,
                filter: '*'
            });
            // filter items on button click
            $('.filters-button-group').on( 'click', 'li', function() {
                var filterValue = $(this).attr('data-filter');
                $container.isotope({ 
                    filter: filterValue 
                });
            });

            //image loaded
            $container.imagesLoaded().progress( function() {
                $container.isotope('layout');
            });
        }      
    });

})(jQuery);


