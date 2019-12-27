<?php
/**
 * The template for displaying single pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_News
 */

get_header();
?>
<!-- News Category -->
<?php if(get_theme_mod('best_news_blog_single_layout_settings','right') == 'none'):
	get_template_part( 'blog/sidebar-single', 'none' );

elseif (get_theme_mod('best_news_blog_single_layout_settings','right') == 'right'):
	get_template_part( 'blog/sidebar-single', 'right' );

elseif (get_theme_mod('best_news_blog_single_layout_settings','right') == 'left'):
	get_template_part( 'blog/sidebar-single', 'left' );

else:
	get_template_part( 'blog/sidebar-single', 'none' );

endif;

get_footer();
?>