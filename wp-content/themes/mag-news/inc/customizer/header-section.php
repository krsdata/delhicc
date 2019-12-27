<?php
/**
 * Theme Header Customizer
 *
 * @package Mag_News
 */

/****************  Header Setting Section starts ************/
$wp_customize->add_section('section_header', 
	array(    
	'title'       => esc_html__('Header Setting', 'mag-news'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Enable Top Header ****************************/
$wp_customize->add_setting( 'theme_options[enable_top_header]',
	array(
		'default'           => $default['enable_top_header'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_top_header]',
	array(
		'label'    => esc_html__( 'Enable Top Header', 'mag-news' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Header Image ****************************/
$wp_customize->add_setting( 'theme_options[enable_top_header_image]',
	array(
		'default'           => $default['enable_top_header_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_top_header_image]',
	array(
		'label'    => esc_html__( 'Enable Top Header Image', 'mag-news' ),
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Header Absolute ****************************/
$wp_customize->add_setting( 'theme_options[enable_header_absolute]',
	array(
		'default'           => $default['enable_header_absolute'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_header_absolute]',
	array(
		'label'    => esc_html__( 'Enable Header Absolute', 'mag-news' ),
		'description' => esc_html__( 'Apply on whole site except home page', 'mag-news' ),	
		'section'  => 'section_header',
		'type'     => 'checkbox',		
	)
);

/************************  Top Header Left Part  ******************/
$wp_customize->add_setting('theme_options[top_header_left]', 
	array(
	'default' 			=> $default['top_header_left'],
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_header_left]', 
	array(		
	'label' 	=> esc_html__('Top Left Header Option', 'mag-news'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[top_header_left]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'select' 		=> esc_html__('&mdash; Select &mdash;', 'mag-news'),
			'menu' 			=> esc_html__('Menu', 'mag-news'),
			'news-ticker' 	=> esc_html__('News Ticker', 'mag-news'),
			'address' 		=> esc_html__('Address + Date', 'mag-news'),
			'social-icon' 	=> esc_html__('Social Icon', 'mag-news'),
		)
	)
);
/************************  Top Header Right Part  ******************/
$wp_customize->add_setting('theme_options[top_header_right]', 
	array(
	'default' 			=> $default['top_header_right'],
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[top_header_right]', 
	array(		
	'label' 	=> esc_html__('Top Right Header Option', 'mag-news'),
	'section' 	=> 'section_header',
	'settings'  => 'theme_options[top_header_right]',
	'type' 		=> 'select',
	'choices' 	=>  array(
			'select' 		=> esc_html__('&mdash; Select &mdash;', 'mag-news'),
			'menu' 			=> esc_html__('Menu', 'mag-news'),
			'news-ticker' 	=> esc_html__('News Ticker', 'mag-news'),
			'address' 		=> esc_html__('Address + Date', 'mag-news'),
			'social-icon' 	=> esc_html__('Social Icon', 'mag-news'),		
		)
	)
);

// Address
$wp_customize->add_setting('theme_options[header_address]', 
	array(
	'default'           => $default['header_address'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[header_address]', 
	array(
	'label'       => esc_html__('Address', 'mag-news'),
	'section'     => 'section_header',   
	'settings'    => 'theme_options[header_address]',		
	'type'        => 'text',

	)
);

// News Ticker title
$wp_customize->add_setting('theme_options[news_ticker_title]', 
	array(
	'default'           => $default['news_ticker_title'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'sanitize_text_field'
	)
);

$wp_customize->add_control('theme_options[news_ticker_title]', 
	array(
	'label'       => esc_html__('News Ticker Title', 'mag-news'),
	'section'     => 'section_header',   
	'settings'    => 'theme_options[news_ticker_title]',		
	'type'        => 'text',
	'active_callback' => 'mag_news_ticker',
	)
);

// News Ticker Category.
$wp_customize->add_setting( 'theme_options[news_ticker_category]',
	array(
	'default'           => $default['news_ticker_category'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'absint',
	)
);
$wp_customize->add_control(
	new Mag_News_Dropdown_Taxonomies_Control( $wp_customize, 'theme_options[news_ticker_category]',
		array(
		'label'    => esc_html__( 'Select Category', 'mag-news' ),
		'section'  => 'section_header',
		'settings' => 'theme_options[news_ticker_category]',
		'active_callback' => 'mag_news_ticker',
		)
	)
);

/**************** Header Advertisement Image **********************************************/
$wp_customize->add_setting('theme_options[advertisement_image]', 
	array(
	'default'           => $default['advertisement_image'],	
	'sanitize_callback' => 'esc_url_raw'
	)
);
$wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'theme_options[advertisement_image]',
       array(
           'label'      =>esc_html__( 'Upload a Advertisement Image', 'mag-news' ),
           'section'    => 'section_header',
           'settings'   => 'theme_options[advertisement_image]', 
       )
   )
);
/**************** Header Advertisement Image Url **********************************************/
$wp_customize->add_setting('theme_options[advertisement_image_url]', 
	array(
	'default'           => $default['advertisement_image_url'],	
	'sanitize_callback' => 'esc_url_raw'
	)
);
$wp_customize->add_control('theme_options[advertisement_image_url]', 
	array(
	'label'       => esc_html__('Advertise Image Link', 'mag-news'),
	'section'     => 'section_header',   
	'settings'    => 'theme_options[advertisement_image_url]',		
	'type'        => 'text',  
	)
);