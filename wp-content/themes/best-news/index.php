<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_News
 */

get_header();
?>
<!-- News Category -->
<?php if(get_theme_mod('best_news_blog_archive_layout_settings','right') == 'none'):
	get_template_part( 'blog/sidebar-archive', 'none' );

elseif (get_theme_mod('best_news_blog_archive_layout_settings','right') == 'right'):
	get_template_part( 'blog/sidebar-archive', 'right' );

elseif (get_theme_mod('best_news_blog_archive_layout_settings','right') == 'left'):
	get_template_part( 'blog/sidebar-archive', 'left' );

else:
	get_template_part( 'blog/sidebar-archive', 'none' );

endif;
get_footer();
?>