<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Best_News
 */

get_header();
?>
<?php if(get_theme_mod('best_news_blog_archive_layout_settings','right') == 'none'):
	get_template_part( 'blog/sidebar-search', 'none' );

elseif (get_theme_mod('best_news_blog_archive_layout_settings','right') == 'right'):
	get_template_part( 'blog/sidebar-archive', 'right' );

elseif (get_theme_mod('best_news_blog_archive_layout_settings','right') == 'left'):
	get_template_part( 'blog/sidebar-archive', 'left' );

else:
	get_template_part( 'blog/sidebar-archive', 'none' );

endif;

get_footer();
?>