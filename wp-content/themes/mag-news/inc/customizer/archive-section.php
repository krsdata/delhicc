<?php
/**
 * Theme Archive Customizer
 *
 * @package Mag_News
 */

/****************  Archive Setting Section starts ************/
$wp_customize->add_section('section_archive', 
	array(    
	'title'       => esc_html__('Blog Setting', 'mag-news'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Sidebar Layout  ****************************/
$wp_customize->add_setting('theme_options[sidebar_layout]', 
	array(
	'default' 			=> $default['sidebar_layout'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[sidebar_layout]', 
	array(		
	'label' 	=> esc_html__('Sidebar Layout Options', 'mag-news'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[sidebar_layout]',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'right-sidebar' 	=> esc_html__('Right Sidebar', 'mag-news'),							
		'left-sidebar' 		=> esc_html__('Left Sidebar', 'mag-news'),
		'no-sidebar' 		=> esc_html__('No Sidebar', 'mag-news'),		
		),	
	)
);

/********************* Enable Author  ****************************/
$wp_customize->add_setting( 'theme_options[enable_author]',
	array(
		'default'           => $default['enable_author'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_author]',
	array(
		'label'    => esc_html__( 'Enable Author', 'mag-news' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);


/********************* Enable Posted On  ****************************/
$wp_customize->add_setting( 'theme_options[enable_posted_on]',
	array(
		'default'           => $default['enable_posted_on'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_posted_on]',
	array(
		'label'    => esc_html__( 'Enable Posted Date', 'mag-news' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);

/********************* Enable Coment Count  ****************************/
$wp_customize->add_setting( 'theme_options[enable_coment_count]',
	array(
		'default'           => $default['enable_coment_count'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_coment_count]',
	array(
		'label'    => esc_html__( 'Enable Comment Count', 'mag-news' ),
		'section'  => 'section_archive',
		'type'     => 'checkbox',		
	)
);

/************************  Archive Layout  ******************/
$wp_customize->add_setting('theme_options[archive_layout]', 
	array(
	'default' 			=> $default['archive_layout'],
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[archive_layout]',
	array(		
	'label' 	=> esc_html__('Blog Layout', 'mag-news'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[archive_layout]',
	'type' 		=> 'radio',
	'choices' 	=>  array(
			'full-width' 	=> esc_html__('Full Width', 'mag-news'),
			'alternate' 	=> esc_html__('List Alternate', 'mag-news'),
		),
	)
);

/********************************** Pagaination Option *********************************/
$wp_customize->add_setting('theme_options[pagination_option]', 
	array(
	'default' 			=> $default['pagination_option'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mag_news_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[pagination_option]', 
	array(		
	'label' 	=> esc_html__('Pagination Options', 'mag-news'),
	'section' 	=> 'section_archive',
	'settings'  => 'theme_options[pagination_option]',
	'type' 		=> 'radio',
	'choices' 	=> array(		
		'default' 		=> esc_html__('Default', 'mag-news'),							
		'numeric' 		=> esc_html__('Numeric', 'mag-news'),		
		),	
	)
);