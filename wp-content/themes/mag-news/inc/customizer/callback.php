<?php 
/**
 * Callback Function
 *
 * @package Mag_News
 */

/**
 * Active callback News Ticker 
 */
if ( ! function_exists( 'mag_news_ticker' ) ) :

	function mag_news_ticker( $control ) { 

		if( 'news-ticker' == $control->manager->get_setting('theme_options[top_header_right]')->value() || 'news-ticker' == $control->manager->get_setting('theme_options[top_header_left]')->value()){
		
			return true;
		
		} else {
		
			return false;
		
		}
	}

endif;
