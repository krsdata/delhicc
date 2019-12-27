<?php
/**
 * Mag News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Mag_News
 */

if ( ! function_exists( 'mag_news_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function mag_news_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Mag News, use a find and replace
		 * to change 'mag-news' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'mag-news', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'mag-news-featured-post', 770, 566, true);
		add_image_size( 'mag-news-featured-post-thumb', 370, 202, true);
		add_image_size( 'mag-news-trending-thumb', 185, 187, true);
		add_image_size( 'mag-news-single-column', 768, 400, true);
		add_image_size( 'mag-news-laste-popular', 370, 163, true);
		add_image_size( 'mag-news-list-column', 385, 289, true);
		add_image_size( 'mag-news-recent-column', 176, 139, true);
		add_image_size( 'mag-news-isotope', 370, 593, true);
		add_image_size( 'mag-news-isotope-thumb', 368, 249, true);
		add_image_size( 'mag-news-cat', 370, 73, true);

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'mag-news' ),
			'top-menu' => esc_html__( 'Top Menu', 'mag-news' ),
			'social-icon' => esc_html__( 'Social Icon', 'mag-news' ),
			'footer-menu' => esc_html__( 'Footer Menu', 'mag-news' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'mag_news_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		/**
		 * Add support for core header image.
		 *
		 * @link https://codex.wordpress.org/Custom_Headers
		 */
		add_theme_support( 'custom-header', array(
			'height'      => 320,
			'width'       => 1440,
			'flex-width'  => true,
			'flex-height' => true,
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		
		// Add support for Block Styles.
		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );


		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'mag_news_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function mag_news_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'mag_news_content_width', 640 );
}
add_action( 'after_setup_theme', 'mag_news_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function mag_news_scripts() {

	wp_enqueue_style( 'mag-news-google-fonts', mag_news_fonts_url(), array(), null );

	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css');

	wp_enqueue_style( 'meanmenu', get_template_directory_uri().'/assets/css/meanmenu.css');

	wp_enqueue_style( 'fontawesome', get_template_directory_uri().'/assets/css/font-awesome.min.css');

	wp_enqueue_style( 'owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.css');

	wp_enqueue_style( 'owl.theme', get_template_directory_uri() . '/assets/css/owl.theme.css' );

	wp_enqueue_style( 'priority-nav-core', get_template_directory_uri() . '/assets/css/priority-nav-core.css' );

	wp_enqueue_style( 'mag-news-style', get_stylesheet_uri() );

	wp_enqueue_style( 'mag-news-responsive', get_template_directory_uri().'/assets/css/responsive.css');
	
	wp_enqueue_script( 'priority-nav-js', get_template_directory_uri() . '/assets/js/priority-nav.min.js', array(), 'v1.0.13', true );

	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), 'v1.7.0', true );

	wp_enqueue_script( 'ResizeSensor', get_template_directory_uri() . '/assets/js/ResizeSensor.js', array(), 'v1.7.0', true );	

	wp_enqueue_script( 'meanmenu', get_template_directory_uri() . '/assets/js/jquery.meanmenu.js', array(), 'v2.0.8', true );

	wp_enqueue_script( 'jquery-owl-js', get_template_directory_uri() . '/assets/js/owl.carousel.js', array( 'jquery'), 'v2.3.4', true );

	wp_enqueue_script( 'jquery-isotope-js', get_template_directory_uri() . '/assets/js/isotope.min.js', array('jquery'), 'v3.0.6', true );

	wp_enqueue_script( 'imageloaded', get_template_directory_uri() . '/assets/js/imagesloaded.js', array(), 'v4.1.4', true );	

	wp_enqueue_script( 'jquery-marquee-js', get_template_directory_uri() . '/assets/js/jquery.marquee.min.js', array(), '0.1.0', true );

	wp_enqueue_script( 'mag-news-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'mag-news-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'mag-news-custom', get_template_directory_uri() . '/assets/js/custom.js', array(), '1.0.0', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'mag_news_scripts' );

/**
 * Load init.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';

/**
 * Widget init.
 */
require_once trailingslashit( get_template_directory() ) . 'inc/widget/widget-init.php';
