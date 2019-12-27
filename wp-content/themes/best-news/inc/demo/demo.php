<?php
/**
 * Demo configuration
 *
 * @package Best_News
 */

$config = array(
	'static_page'    => 'home',
	'menu_locations' => array(
		'primary' 	=> 'primary'
	),
	'ocdi'           => array(
		array(
			'import_file_name'             => esc_html__( 'Import Best News Demo', 'best-news' ),
			'import_file_url' 	           => esc_url( 'https://www.postmagthemes.com/download/bestnews/contents.xml'),
			'import_widget_file_url'	     => esc_url( 'https://www.postmagthemes.com/download/bestnews/widgets.wie'),
			'import_customizer_file_url'	 => esc_url( 'https://www.postmagthemes.com/download/bestnews/customizer.dat'),
      		'import_notice'                => __( 'It will overwrite your settings', 'best-news' ),
      		'preview_url'                  => esc_url('https://www.postmagthemes.com/demobestnews/'),
			'import_redux'	           		 => array( ),
		),
		
	),
);

Best_News_Demo::init( apply_filters( 'best_news_demo_filter', $config ) );