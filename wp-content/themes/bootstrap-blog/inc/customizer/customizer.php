<?php
/**
 * bootstrap-blog Theme Customizer
 *
 * @package Bootstrap Blog
 */

$panels   = array( 'general-options', 'theme-options', 'header-options' );

add_action( 'customize_register', 'bootstrap_blog_change_homepage_settings_options' );
function bootstrap_blog_change_homepage_settings_options( $wp_customize)  {
    
	$wp_customize->get_section('title_tagline')->priority = 12;
	$wp_customize->get_section('static_front_page')->priority = 13;

	$wp_customize->remove_control('header_textcolor');

    require get_template_directory() . '/inc/google-fonts.php';    
}

$general_sections = array( 'colors-fonts', 'footer', 'social-media', 'background' );
$header_sections = array( 'header-image', 'theme-header', 'site-identity' );
$theme_sections = array( 'blog-list', 'slider', 'pages', 'featured', 'shop', 'drag-and-drop' );


if( ! empty( $panels ) ) {
	foreach( $panels as $panel ){
	    require get_template_directory() . '/inc/customizer/panels/' . $panel . '.php';
	}
}


if( ! empty( $general_sections ) ) {
	foreach( $general_sections as $section ) {
	    require get_template_directory() . '/inc/customizer/sections/general-options/' . $section . '.php';
	}
}

if( ! empty( $header_sections ) ) {
    foreach( $header_sections as $section ) {
        require get_template_directory() . '/inc/customizer/sections/header-options/' . $section . '.php';
    }
}

if( ! empty( $theme_sections ) ) {
    foreach( $theme_sections as $section ) {
        require get_template_directory() . '/inc/customizer/sections/theme-options/' . $section . '.php';
    }
}


function bootstrap_blog_customize_preview_js() {
 	wp_enqueue_script( 'bootstrap-blog-customizer-preview', get_template_directory_uri() . '/js/customizer.js', array( 'jquery' ), '1.0.0', true );
}
add_action( 'customize_preview_init', 'bootstrap_blog_customize_preview_js' );


/**
 * Sanitization Functions
*/
require get_template_directory() . '/inc/customizer/sanitization-functions.php';