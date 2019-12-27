<?php

/**
 * Filters For Excerpt 
 *
 */
if( !function_exists( 'best_news_excerpt_more' ) ) :
	/*
	 * Excerpt More
	 */
	function best_news_excerpt_more( $more ) {
		if ( is_admin() ) {

		return $more ;
		}

	return ' &hellip; ' ;
		
	}
endif;
add_filter( 'excerpt_more', 'best_news_excerpt_more' );


function best_news_excerpt_length( $length ) {
	if ( is_admin() ) {
		return $length;
	}
	return 31;
}
add_filter( 'excerpt_length', 'best_news_excerpt_length', 999 );