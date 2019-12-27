<?php
/**
 * Custom header implementation
 */

function nikhar_spa_salon_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'nikhar_spa_salon_custom_header_args', array(

		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'wp-head-callback'       => 'nikhar_spa_salon_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'nikhar_spa_salon_custom_header_setup' );

if ( ! function_exists( 'nikhar_spa_salon_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see nikhar_spa_salon_custom_header_setup().
 */
add_action( 'wp_enqueue_scripts', 'nikhar_spa_salon_header_style' );
function nikhar_spa_salon_header_style() {
	//Check if user has defined any header image.
	if ( get_header_image() ) :
	$custom_css = "
       #top-header .top{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
		}";
	   	wp_add_inline_style( 'nikhar-spa-salon-basic-style', $custom_css );
	endif;
}
endif; // nikhar_spa_salon_header_style