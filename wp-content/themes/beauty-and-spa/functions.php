<?php
/* 	Beauty and Spa Theme's Functions
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/
   
	require_once ( trailingslashit(get_template_directory()) . 'inc/customize.php' );
	
	function beautyandspa_about_page() { 
	add_theme_page( __('Beauty and Spa Options','beauty-and-spa'), __('Beauty and Spa Options','beauty-and-spa'), 'edit_theme_options', 'theme-about', 'beautyandspa_theme_about' ); 
	}
	add_action('admin_menu', 'beautyandspa_about_page');
	function beautyandspa_theme_about() {  require_once ( trailingslashit(get_template_directory()) . 'inc/theme-about.php' ); }
	
	
	function beautyandspa_setup() {
//	Theme TextDomain for the Language File
	load_theme_textdomain( 'beauty-and-spa', get_template_directory() . '/languages' );
	
	register_nav_menus( array( 'main-menu' => __('Main Menu', 'beauty-and-spa' ) ) );

	add_theme_support( "title-tag" );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'html5', array( 'search-form' ) );
	
//	Set the content width based on the theme's design and stylesheet.
	global $content_width; if ( ! isset( $content_width ) ) $content_width = 784;

// 	Tell WordPress for the Feed Link
	add_theme_support( 'automatic-feed-links' );
	
// 	This theme uses Featured Images (also known as post thumbnails) for per-post/per-page Custom Header images
	if ( function_exists( 'add_theme_support' ) ) { 
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)
	add_image_size( 'beautyandspa-fpage-thumb', 1100, 600, array( 'left', 'top' ) ); 
	add_image_size( 'beautyandspa-fcontent', 100, 100, array( 'left', 'top' ) );
	add_image_size( 'beautyandspa-fbox', 400, 400, array( 'left', 'top' ) );
	}
	
		
// 	WordPress Custom Background Support	
	$beautyandspa_custom_background = array( 'default-color' => 'ffffff' );
	add_theme_support( 'custom-background', $beautyandspa_custom_background );
	
	add_theme_support( 'custom-logo', array( 'height'      =>90, 'width'       => 300, 'flex-width' => true, ) );	
	
	}
	add_action( 'after_setup_theme', 'beautyandspa_setup' );
	
// 	Functions for adding script
	function beautyandspa_enqueue_scripts() { 
	wp_enqueue_style('beautyandspa-style', get_stylesheet_uri(), false );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {  wp_enqueue_script( 'comment-reply' ); }
	wp_enqueue_script( 'beautyandspa-menu-style', get_template_directory_uri(). '/js/menu.js', array( 'jquery' ));
	wp_register_style('beautyandspa-gfonts', '//fonts.googleapis.com/css?family=Anaheim|Advent+Pro:400,500,600,700', false );
	wp_enqueue_style('beautyandspa-gfonts');
	wp_enqueue_style('beautyandspa-fawesome', get_template_directory_uri(). '/css/font-awesome.css' );
	wp_enqueue_script( 'beautyandspa-fheader', get_template_directory_uri(). '/js/fixedheader.js', array( 'jquery' ));
	wp_enqueue_script( 'beautyandspa-html5', get_template_directory_uri().'/js/html5.js');
    wp_script_add_data( 'beautyandspa-html5', 'conditional', 'lt IE 9' );
	
	if ( is_front_page() || is_page_template( 'front-page.php' ) ): 
		wp_enqueue_script( 'beautyandspa-skitter-main', get_template_directory_uri() . '/js/jquery.skitter.js' , array( 'jquery', 'jquery-effects-core' ) );
		wp_enqueue_style ('beautyandspa-skitter-style', get_template_directory_uri() . '/css/skitter.styles.css');
	endif; 
	wp_enqueue_style('beautyandspa-responsive', get_template_directory_uri(). '/style-responsive.css' );
	}
	add_action( 'wp_enqueue_scripts', 'beautyandspa_enqueue_scripts' );

// 	Functions for adding script to Admin Area
	function beautyandspa_admin_style($hook) {  
	if ( 'appearance_page_theme-about' != $hook ) { return;  } 
	wp_enqueue_style( 'beautyandspa_admin_css', get_template_directory_uri() . '/inc/admin-style.css', false ); }
	add_action( 'admin_enqueue_scripts', 'beautyandspa_admin_style' );

// 	Functions for adding Style to the Customizer	
	function beautyandspa_customizer_styles() { ?>
	<style>.infohead a { color: #14AAFD; text-decoration: none; }
	.infohead { background:#333333; border-left: 3px solid #14AAFD; color: #EEEEEE; padding: 10px; transition:all .75s; -moz-transition:all .75s; -o-transition:all .75s; -webkit-transition:all .75s; font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif; font-size: 15px;}
.infohead:hover { background:#111111; border-color: #ee510c; }
	</style>
	<?php

}
add_action( 'customize_controls_print_styles', 'beautyandspa_customizer_styles', 999 );


// 	Add Some Sub Functions necessary for the Site
	require_once ( trailingslashit(get_template_directory()) . 'function/imp.php' );
	
	function beautyandspa_excerpt_more( $link ) {
	if ( is_admin() ) { return $link; }

	$link = sprintf( '<a href="%1$s" class="read-more">%2$s</a>',
		esc_url( get_permalink( get_the_ID() ) ),
		/* translators: %s: Name of current post */
		sprintf( __( 'Read More', 'beauty-and-spa' ), get_the_title( get_the_ID() ) )
	);
	return ' &hellip; ' . $link;
	}
	add_filter( 'excerpt_more', 'beautyandspa_excerpt_more' );
	
	
	
	
	// Content Type Showing
	function beautyandspa_content() {
	if (( esc_attr(beautyandspa_get_option('contype', '2')) != '2' ) || is_page() || is_single() ) : the_content('<span class="read-more">' .__('Read More', 'beauty-and-spa') . '</span>');
	else: the_excerpt();
	endif;	
	}

//	Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link
	function beautyandspa_page_menu_args( $beautyandspa_args ) {
	$beautyandspa_args['show_home'] = true;
	return $beautyandspa_args;
	}
	add_filter( 'wp_page_menu_args', 'beautyandspa_page_menu_args' );

//	Registers the Widgets and Sidebars for the site
	function beautyandspa_widgets_init() {

	register_sidebar( array(
		'name' => __('Primary Sidebar', 'beauty-and-spa'),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Footer Area One', 'beauty-and-spa'),
		'id' => 'sidebar-3',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	    
	register_sidebar( array(
		'name' => __('Footer Area Two', 'beauty-and-spa'),
		'id' => 'sidebar-4',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __('Footer Area Three', 'beauty-and-spa'),
		'id' => 'sidebar-5',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	
	register_sidebar( array(
		'name' => __('Footer Area Four', 'beauty-and-spa'),
		'id' => 'sidebar-6',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __('Footer Area Five', 'beauty-and-spa'),
		'id' => 'sidebar-7',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	}
	add_action( 'widgets_init', 'beautyandspa_widgets_init' );
	
	add_filter('the_title', 'beautyandspa_title');
	function beautyandspa_title($beautyandspa_title) { if ( '' == $beautyandspa_title ) { return __('(Untitled)', 'beauty-and-spa'); } else { return $beautyandspa_title; } }

