<?php
/**
 * Theme Customizer
 *
 * @package Mag_News
 */
$default = mag_news_get_default_theme_options();

/****************  Add Pannel   ***********************/
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => esc_html__( 'Theme Options', 'mag-news' ),
	'priority'   => 100,
	'capability' => 'edit_theme_options',
	)
);
/************************  Site Identity  ******************/
$wp_customize->add_setting('theme_options[site_identity]', 
	array(
	'default' 			=> $default['site_identity'],
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[site_identity]', 
	array(		
	'label' 	=> esc_html__('Choose Option', 'mag-news'),
	'section' 	=> 'title_tagline',
	'settings'  => 'theme_options[site_identity]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'logo-only' 	=> esc_html__('Logo Only', 'mag-news'),
			'logo-title' 	=> esc_html__('Logo + Title', 'mag-news'),
			'logo-text' 	=> esc_html__('Logo + Tagline', 'mag-news'),
			'title-only' 	=> esc_html__('Title Only', 'mag-news'),
			'title-text' 	=> esc_html__('Title + Tagline', 'mag-news'),
		)
	)
);

/************************  Header Image ******************/
$wp_customize->add_setting('theme_options[header_image]', 
	array(
	'default' 			=> $default['header_image'],
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);
$wp_customize->add_control('theme_options[header_image]', 
	array(		
	'label' 	=> esc_html__('Choose Option', 'mag-news'),
	'description'=> esc_html__( 'Apply other than home page.', 'mag-news'),
	'section' 	=> 'header_image',
	'settings'  => 'theme_options[header_image]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'none' 	=> esc_html__('None', 'mag-news'),
			'header-image' 	=> esc_html__('Header Image', 'mag-news'),
			'post-thumbnail' 	=> esc_html__('Featured Image', 'mag-news'),
		)
	)
);

/********************* Enable Header Title  ****************************/
$wp_customize->add_setting( 'theme_options[enable_header_title]',
	array(
		'default'           => $default['enable_header_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_header_title]',
	array(
		'label'    => esc_html__( 'Enable Header Title', 'mag-news' ),
		'section'  => 'header_image',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Post meta ****************************/
$wp_customize->add_setting( 'theme_options[enable_header_meta]',
	array(
		'default'           => $default['enable_header_meta'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_header_meta]',
	array(
		'label'    => esc_html__( 'Enable Post Meta', 'mag-news' ),
		'section'  => 'header_image',
		'type'     => 'checkbox',		
	)
);

/****************  Categories Color ************/
$wp_customize->add_section('section_categories_color', 
	array(    
	'title'       => esc_html__('Categories Color Setting', 'mag-news'),
	'panel'       => 'theme_option_panel'    
	)
);

	$priority = 3;
	$categories = get_terms( 'category' ); // Get all Categories
	$wp_category_list = array();

	foreach ( $categories as $category_list ) {

		$wp_customize->add_setting('theme_options[mag_news_category_color_'.esc_html( strtolower($category_list->name) ).']',
			array(
				'default'              => $default['mag_news_category_color_'.esc_html( strtolower($category_list->name) ).''],
				'capability'           => 'edit_theme_options',
				'sanitize_callback'    => 'sanitize_hex_color'
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control($wp_customize,'theme_options[mag_news_category_color_'.esc_html( strtolower($category_list->name) ).']',
				array(
					/* translators: %s: category namet */
					'label'    => sprintf( esc_html__( ' %s', 'mag-news' ), esc_html( $category_list->name ) ),
					'section'  => 'section_categories_color',
					'priority' => absint($priority)
				)
			)
		);
		$priority++;
	}


require  trailingslashit( get_template_directory() ) . '/inc/customizer/header-section.php';
require  trailingslashit( get_template_directory() ) . '/inc/customizer/archive-section.php';
require  trailingslashit( get_template_directory() ) . '/inc/customizer/single-section.php';
require  trailingslashit( get_template_directory() ) . '/inc/customizer/general-section.php';
require  trailingslashit( get_template_directory() ) . '/inc/customizer/footer-section.php';