<?php
/**
 * Everest News Lite theme functions.
 *
 * Functions file for child theme, enqueues parent and child stylesheets by default.
 *
 * @since	1.0.0
 * @package everest-news-lite
 */

// Exit if accessed directly.


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'everest_news_lite_enqueue_styles' ) ) {
	/**
	 * Enqueue Styles.
	 *
	 * Enqueue parent style and child styles where parent are the dependency
	 * for child styles so that parent styles always get enqueued first.
	 *
	 * @since 1.0.0
	 */

	function everest_news_lite_enqueue_styles() {

		// Enqueue Parent theme's stylesheet.

        wp_enqueue_style( 'everest-news-lite-parent-style', get_template_directory_uri() . '/style.css' );

        wp_enqueue_style( 'everest-news-lite-parent-main', get_template_directory_uri() . '/assets/dist/css/main.css' );

        wp_enqueue_style( 'everest-news-lite-child-style', get_stylesheet_directory_uri() . '/style.css' );
        
        wp_enqueue_style( 'everest-news-child-lite-fonts', everest_news_lite_fonts_url() );

		wp_enqueue_style( 'everest-news-lite-child-main', get_stylesheet_directory_uri() . '/assets/dist/css/main.css', array( 'everest-news-lite-parent-style' ) );

	}
}

// Add enqueue function to the desired action.

add_action( 'wp_enqueue_scripts', 'everest_news_lite_enqueue_styles', 100 );


if( ! function_exists( 'everest_news_lite_language' ) ) {

    function everest_news_lite_language() {

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on Everest News, use a find and replace
         * to change 'everest-news-lite' to the name of your theme in all the template files.
         */

        load_child_theme_textdomain( 'everest-news-lite', get_stylesheet_directory() . '/languages' );

    }
}

add_action( 'after_setup_theme', 'everest_news_lite_language' );


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function everest_news_lite_customize_register( $wp_customize ) {
    
    // Social Link - Whatsapp
    $wp_customize->add_setting( 
        'everest_news_lite_whatsapp_link', 
        array(
            'sanitize_callback'		=> 'esc_url_raw',
            'default'				=> '', 
        ) 
    );

    // Social Link - Youtube
    $wp_customize->add_setting( 
        'everest_news_lite_youtube_link', 
        array(
            'sanitize_callback'		=> 'esc_url_raw',
            'default'				=> '', 
        ) 
    );

    // Social Links - Whatsapp
    $wp_customize->add_control( 
        'everest_news_lite_whatsapp_link', 
        array(
            'label' => esc_html__( 'Whatsapp Link', 'everest-news-lite' ),
            'section' => 'everest_news_social_links_options',
            'type' => 'url',
        ) 
    );

    // Social Links - YouTube
    $wp_customize->add_control( 
        'everest_news_lite_youtube_link', 
        array(
            'label' => esc_html__( 'YouTube Link', 'everest-news-lite' ),
            'section' => 'everest_news_social_links_options',
            'type' => 'url',
        ) 
    );
    
}
add_action( 'customize_register', 'everest_news_lite_customize_register' );


/**
 * Load Fullwidth Widget Category 3 Column
 */
require get_stylesheet_directory() . '/inc/widgets/fullwidth-news-widgets/fullwidth-widget-cat-three.php';


/**
 * Load Banner Widget 3
 */
require get_stylesheet_directory() . '/inc/widgets/banner-widgets/banner-widget-three.php';


/**
 * Load Theme functions
 */
require get_stylesheet_directory() . '/inc/theme-functions.php';


/**
 * Load Helper functions
 */
require get_stylesheet_directory() . '/inc/helper-functions.php';