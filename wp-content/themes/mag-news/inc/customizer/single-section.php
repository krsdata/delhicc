<?php
/**
 * Theme Single Customizer
 *
 * @package Mag_News
 */

/****************  Single Setting Section starts ************/
$wp_customize->add_section('section_single', 
	array(    
	'title'       => esc_html__('Single Page/Post Setting', 'mag-news'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Enable Author  ****************************/
$wp_customize->add_setting( 'theme_options[enable_single_author]',
	array(
		'default'           => $default['enable_single_author'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_single_author]',
	array(
		'label'    => esc_html__( 'Enable Author Info', 'mag-news' ),
		'section'  => 'section_single',
		'type'     => 'checkbox',		
	)
);
/********************* Enable Featured Image  ****************************/
$wp_customize->add_setting( 'theme_options[enable_single_image]',
	array(
		'default'           => $default['enable_single_image'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_single_image]',
	array(
		'label'    => esc_html__( 'Enable Featured Image', 'mag-news' ),
		'section'  => 'section_single',
		'type'     => 'checkbox',		
	)
);
/********************* Enable Title  ****************************/
$wp_customize->add_setting( 'theme_options[enable_single_title]',
	array(
		'default'           => $default['enable_single_title'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_single_title]',
	array(
		'label'    => esc_html__( 'Enable Single Title', 'mag-news' ),
		'section'  => 'section_single',
		'type'     => 'checkbox',		
	)
);