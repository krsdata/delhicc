<?php
	
	/*---------------------------First highlight color-------------------*/

	$vw_photography_first_color = get_theme_mod('vw_photography_first_color');

	$custom_css = '';

	if($vw_photography_first_color != false){
		$custom_css .='#header .main-navigation ul.sub-menu li a:hover, #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .more-btn, .content-bttn, .error-btn, .more-btn:after, .content-bttn:after, .error-btn:after, .scrollup i, .title-btn, .title-btn:after, input[type="submit"], #footer .tagcloud a:hover, #sidebar .custom-social-icons i, #footer .custom-social-icons i, #footer-2, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, nav.woocommerce-MyAccount-navigation ul li, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .pagination span, .pagination a, .cat_body:hover{';
			$custom_css .='background-color: '.esc_html($vw_photography_first_color).';';
		$custom_css .='}';
	}
	if($vw_photography_first_color != false){
		$custom_css .='#comments input[type="submit"].submit{';
			$custom_css .='background-color: '.esc_html($vw_photography_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_photography_first_color != false){
		$custom_css .='a, #footer h3, #footer .custom-social-icons i:hover, .search-box i, .woocommerce-info::before, .woocommerce-message::before, .post-main-box:hover h3 a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title,#footer li a:hover, .entry-content a, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation a:hover{';
			$custom_css .='color: '.esc_html($vw_photography_first_color).';';
		$custom_css .='}';
	}
	if($vw_photography_first_color != false){
		$custom_css .='{';
			$custom_css .='border-color: '.esc_html($vw_photography_first_color).'!important;';
		$custom_css .='}';
	}
	if($vw_photography_first_color != false){
		$custom_css .='.woocommerce-info, .woocommerce-message, .post-info hr{';
			$custom_css .='border-top-color: '.esc_html($vw_photography_first_color).';';
		$custom_css .='}';
	}

	/*---------------------------Second highlight color-------------------*/

	$vw_photography_second_color = get_theme_mod('vw_photography_second_color');

	if($vw_photography_second_color != false){
		$custom_css .='#header, #header .main-navigation ul ul, #footer, #sidebar .custom-social-icons i:hover, .pagination .current, .pagination a:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce span.onsale{';
			$custom_css .='background-color: '.esc_html($vw_photography_second_color).';';
		$custom_css .='}';
	}
	if($vw_photography_second_color != false){
		$custom_css .='a:hover, .page-template-custom-home-page #header .main-navigation ul li a, .page-template-custom-home-page .logo h1 a, .page-template-custom-home-page p.site-description, .cat-page-box h3, .cat-page-box i, .content-vw h1, .post-main-box h3 a, #sidebar h3, h2.woocommerce-loop-product__title, .woocommerce div.product .product_title, .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price, .content-vw h2, .post-info, h2#reply-title, .post-navigation a, h1, h2, h3, h4, h5, h6{';
			$custom_css .='color: '.esc_html($vw_photography_second_color).';';
		$custom_css .='}';
	}
	if($vw_photography_second_color != false){
		$custom_css .='{';
			$custom_css .='border-bottom-color: '.esc_html($vw_photography_second_color).';';
		$custom_css .='}';
	}
	
	/*---------------------------Width Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_photography_width_option','Full Width');
    if($theme_lay == 'Boxed'){
		$custom_css .='body{';
			$custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Wide Width'){
		$custom_css .='body{';
			$custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$custom_css .='}';
	}else if($theme_lay == 'Full Width'){
		$custom_css .='body{';
			$custom_css .='max-width: 100%;';
		$custom_css .='}';
	}

	/*--------------------------- Slider Opacity -------------------*/

	$theme_lay = get_theme_mod( 'vw_photography_slider_opacity_color','0.5');
	if($theme_lay == '0'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0';
		$custom_css .='}';
		}else if($theme_lay == '0.1'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.1';
		$custom_css .='}';
		}else if($theme_lay == '0.2'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.2';
		$custom_css .='}';
		}else if($theme_lay == '0.3'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.3';
		$custom_css .='}';
		}else if($theme_lay == '0.4'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.4';
		$custom_css .='}';
		}else if($theme_lay == '0.5'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.5';
		$custom_css .='}';
		}else if($theme_lay == '0.6'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.6';
		$custom_css .='}';
		}else if($theme_lay == '0.7'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.7';
		$custom_css .='}';
		}else if($theme_lay == '0.8'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.8';
		$custom_css .='}';
		}else if($theme_lay == '0.9'){
		$custom_css .='#slider img{';
			$custom_css .='opacity:0.9';
		$custom_css .='}';
		}

	/*---------------------------Slider Content Layout -------------------*/

	$theme_lay = get_theme_mod( 'vw_photography_slider_content_option','Center');
    if($theme_lay == 'Left'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2, #slider .inner_carousel p{';
			$custom_css .='text-align:left; left:15%; right:45%;';
		$custom_css .='}';
	}else if($theme_lay == 'Center'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2, #slider .inner_carousel p{';
			$custom_css .='text-align:center; left:20%; right:20%;';
		$custom_css .='}';
	}else if($theme_lay == 'Right'){
		$custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h2, #slider .inner_carousel p{';
			$custom_css .='text-align:right; left:45%; right:15%;';
		$custom_css .='}';
	}