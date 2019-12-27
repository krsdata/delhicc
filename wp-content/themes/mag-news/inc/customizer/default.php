<?php
/**
 * Default theme options.
 *
 * @package Mag_News
 */

if ( ! function_exists( 'mag_news_get_default_theme_options' ) ) :

	/**
	 * Get default theme options.
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
function mag_news_get_default_theme_options() {

	$defaults = array();

	$defaults['site_identity']						= 'title-text';

	$defaults['advertisement_image_url']			= '';
	$defaults['header_image']					    = 'header-image';
	$defaults['enable_header_title']				= true;
	$defaults['enable_header_meta']				    = true;
	$defaults['enable_top_header_image']			= true;

	$defaults['enable_header_absolute']				= true;
	$defaults['enable_top_header']					= true;
	$defaults['top_header_left']					= 'news-ticker';
	$defaults['top_header_right']					= 'address';
	$defaults['header_address']						= '';
	$defaults['news_ticker_title']					= esc_html__( 'Flash News', 'mag-news');
	$defaults['news_ticker_category']				= 0;
	$defaults['news_ticker_number']					= 4;
	$defaults['advertisement_image']				= '';

	$defaults['archive_layout']						= 'list';
	$defaults['pagination_option']					= 'default';

	$defaults['enable_preloader']					= true;
	$defaults['enable_author']						= true;
	$defaults['enable_posted_on']					= true;
	$defaults['enable_coment_count']				= true;

	$defaults['enable_single_image']				= true;
	$defaults['enable_single_title']				= true;	
	
	$defaults['sidebar_layout']						= 'right-sidebar';

	$defaults['single_sidebar_layout']				= 'right-sidebar';
	$defaults['enable_single_author']				= true;
	$defaults['enable_home_content']				= true;



	/*********************** Categories Color Setting *****************************************/
	$categories = get_terms( 'category' ); // Get all Categories
	$wp_category_list = array();

	foreach ( $categories as $category_list ) {
	$defaults['mag_news_category_color_'.esc_html( strtolower($category_list->name) ).''] = '#d9bd8b';

	}

	$defaults['copyright_text']						= '';

	// Pass through filter.
	$defaults = apply_filters( 'mag_news_filter_default_theme_options', $defaults );
	return $defaults;
}

endif;

/**
*  Get theme options
*/
if ( ! function_exists( 'mag_news_get_option' ) ) :

	/**
	 * Get theme option
	 *
	 * @since 1.0.0
	 *
	 * @param string $key Option key.
	 * @return mixed Option value.
	 */
	function mag_news_get_option( $key ) {

		$default_options = mag_news_get_default_theme_options();

		if ( empty( $key ) ) {
			return;
		}

		$theme_options = (array)get_theme_mod( 'theme_options' );
		$theme_options = wp_parse_args( $theme_options, $default_options );

		$value = null;

		if ( isset( $theme_options[ $key ] ) ) {
			$value = $theme_options[ $key ];
		}

		return $value;

	}

endif;