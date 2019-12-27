<?php
/**
 * Template Name: Fontpage
 *
 * This is page is used as front page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Magazine_O
 */
get_header();

get_template_part( 'sections/section','hot-news' );
get_template_part( 'sections/section','news-slider' );

if ( is_active_sidebar( 'frontpage-news-layout' ) ) {
	dynamic_sidebar( 'frontpage-news-layout' );
}

the_content();

get_footer();
?>