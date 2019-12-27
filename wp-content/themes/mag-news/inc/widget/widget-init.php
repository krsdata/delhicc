<?php
/**
 * Load Widget files
 *
 * @package Mag_News
 */

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function mag_news_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'mag-news' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Featured Post', 'mag-news' ),
		'id'            => 'featured-post',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'After Featured Post', 'mag-news' ),
		'id'            => 'after-featured-post',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Beside Featured Post', 'mag-news' ),
		'id'            => 'beside-featured-post',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Top Content Area', 'mag-news' ),
		'id'            => 'top-content-area',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	
	register_sidebar( array(
		'name'          => esc_html__( 'Middle Content Area', 'mag-news' ),
		'id'            => 'middle-content-area',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Aside Middle Content Area', 'mag-news' ),
		'id'            => 'aside-content-area',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Bottom Content Area', 'mag-news' ),
		'id'            => 'bottom-content-area',
		'description'   => esc_html__( 'Widget Below Header Section.', 'mag-news' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );	

	for ($i=1; $i < 4; $i++) { 
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer %d', 'mag-news' ), $i ),
			'id'            => 'footer-'.$i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</h2></span>',
		) );
	}

}
add_action( 'widgets_init', 'mag_news_widgets_init' );

/**
 * Register Featured Post Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/featured-section.php';

/**
 * Register Featured Post Slider Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/featured-slider.php';

/**
 * Register Trending Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/trending-section.php';

/**
 * Register Single Column Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/single-column-section.php';

/**
 * Register Latest/Popular Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/latest-popular.php';

/**
 * Register List Column Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/list-column.php';

/**
 * Register List Opposite Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/list-opp.php';

/**
 * Register Tab Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/isotope-section.php';

/**
 * Register Recent Post Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/recent-post.php';

/**
 * Register Social Media Widget.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/widget/social-media.php';
