<?php
/**
 * Best News functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Best_News
 */

if ( ! function_exists( 'best_news_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function best_news_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Best News, use a find and replace
		 * to change 'best-news' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'best-news');

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
		// Thumbnail sizes 
		// News Layout 1,News Layout 3, News Layout 5 first one  image size, News Layout 6 image size
		add_image_size( 'best-news-thumbnail-1', 350, 233, true );
		// News Layout 2
		add_image_size( 'best-news-thumbnail-2', 477, 318, true );
		add_image_size( 'best-news-thumbnail-3', 60, 55, true );

		// News Layout 4
		add_image_size( 'best-news-thumbnail-5', 445, 466, true );
		add_image_size( 'best-news-thumbnail-6', 302, 201, true );

		// News Layout 5, News Layout 7 small image size
		add_image_size( 'best-news-thumbnail-7', 100, 66, true );

		// News Layout 7
		add_image_size( 'best-news-thumbnail-8', 730, 487, true );

		// News Layout 8
		add_image_size( 'best-news-thumbnail-10', 332, 221, true );

		// News Layout 9
		add_image_size( 'best-news-thumbnail-11', 300, 300, true );

		// News slider sidebar 
		add_image_size( 'best-news-thumbnail-12', 80, 80, true );
		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'best-news' ),
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
		add_theme_support( 'custom-background', apply_filters( 'best_news_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

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
add_action( 'after_setup_theme', 'best_news_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function best_news_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'best_news_content_width', 640 );
}
add_action( 'after_setup_theme', 'best_news_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function best_news_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'best-news' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'best-news' ),
		'before_widget' => '<div id="%1$s" class="single-sidebar %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><i class="fa fa-pencil"> </i><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Frontpage News Layouts Area', 'best-news' ),
		'id'            => 'frontpage-news-layout',
		'description'   => esc_html__( 'Add widgets here.', 'best-news' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h2 class="cat-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Frontpage News Layout 2 Sidebar', 'best-news' ),
		'id'            => 'news-layout-2-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'best-news' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer widget', 'best-news' ),
		'id'            => 'footer-1',
		'description'   => esc_html__( 'Add widgets here.', 'best-news' ),
		'before_widget' => '<div <div id="%1$s" class="widget %2$s col-lg-3 col-md-6 col-12"><div class="single-footer">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h3>',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'best_news_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
require get_template_directory() . '/inc/enqueue.php';

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';


/**
 * Bootstrap Navwalker
 */
require get_template_directory() . '/inc/wp-bootstrap-navwalker.php';


/**
* Breadcrumbs
*/
require_once get_template_directory() . '/inc/breadcrumbs.php';

/**
* widgets
*/
require_once get_template_directory() . '/inc/widgets/widget.php';


/**
* filters
*/
require_once get_template_directory() . '/inc/filters.php';


/*Bootstrap Pagination Function*/
function best_news_pagination($pages = '', $range = 4)
{  
	$showitems = ($range * 2) + 1;  
	$paged = get_query_var( 'paged');

	if(empty($paged)) $paged = 1;
	if($pages == '')
	{
		global $wp_query; 
		$pages = $wp_query->max_num_pages;
		if(!$pages)
		{
			$pages = 1;
		}
	}   

	if(1 != $pages)
	{
		echo '<ul class="pagination">';
		if($paged > 1 ) echo "<li class='prev'><a href='".esc_url(get_pagenum_link($paged - 1))."'><i class='fa fa-angle-double-left'></i></a></li>";
		for ($i=1; $i <= $pages; $i++)
		{
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
			{
				echo ($paged == $i)? "<li class=\"active\"><a href='".esc_url(get_pagenum_link($i))."'>".esc_html($i)."</a></li>":"<li><a href='".esc_url(get_pagenum_link($i))."'>".esc_html($i)."</a></li>";
			}
		}

		if ($paged < $pages ) echo "<li class='next'><a href=\"".esc_url(get_pagenum_link($paged + 1))."\"><i class='fa fa-angle-double-right'></i></a></li>";  
		echo "</ul>";
	}
}

if ( ! function_exists( 'best_news_simple_breadcrumb' ) ) :
    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     */
    function best_news_simple_breadcrumb() {
    	$breadcrumb_args = array(
    		'container'   => 'div',
    		'show_browse' => false,
    	);
    	breadcrumb_trail( $breadcrumb_args );
    }
endif;
add_action( 'best_news_breadcrumb', 'best_news_simple_breadcrumb', 10 );

if ( is_admin() ) {
	// Load about.
	
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/class-about.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/theme-info/about.php';

	// Load demo.
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/class-demo.php';
	require_once trailingslashit( get_template_directory() ) . 'inc/demo/demo.php';
}

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}
function best_news_add_class_to_excerpt( $excerpt ) {
    return str_replace('<p', '<p class="text-justify"', $excerpt);
}
add_filter( "the_excerpt", "best_news_add_class_to_excerpt" );

function best_news_modal() {
	if(get_theme_mod('best_blog_popup_enable','1')==1): ?>
		<div class="button">
		<a class=" btn " data-toggle="modal" data-target="#post-content-<?php the_ID(); ?>"><?php echo esc_html(get_theme_mod('best_blog_read_more_title',__('Read more','best-news'))); ?></a>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="post-content-<?php the_ID(); ?>" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header">
					<a class=" btn" href="<?php the_permalink(); ?>"><?php echo esc_html(get_theme_mod('best_blog_detail_here_title',__('Full view here','best-news'))); ?></a>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body text-justify">
						<?php the_content();?>
					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo esc_html(get_theme_mod('best_blog_close_title',__('Close', 'best-news'))); ?></button>
					</div>
				</div>
			</div>
		</div>
	<?php else : ?>
	<div class="button">
			<a href="<?php the_permalink();?>" class="btn"><?php echo esc_html(get_theme_mod('best_blog_read_more_title',__('Read more', 'best-news'))); ?></a>
	</div>
	<?php endif; 
}