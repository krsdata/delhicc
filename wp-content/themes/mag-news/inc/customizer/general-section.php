<?php
/**
 * Theme Archive Customizer
 *
 * @package Mag_News
 */

/****************  Single Setting Section starts ************/
$wp_customize->add_section('section_general', 
	array(    
	'title'       => esc_html__('General Setting', 'mag-news'),
	'panel'       => 'theme_option_panel'    
	)
);

/********************* Enable Preloader  ****************************/
$wp_customize->add_setting( 'theme_options[enable_preloader]',
	array(
		'default'           => $default['enable_preloader'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_preloader]',
	array(
		'label'    => esc_html__( 'Enable Pre Loader', 'mag-news' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);


/********************* Enable Home Content ***********************/
$wp_customize->add_setting( 'theme_options[enable_home_content]',
	array(
		'default'           => $default['enable_home_content'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'mag_news_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'theme_options[enable_home_content]',
	array(
		'label'    => esc_html__( 'Enable Home Content', 'mag-news' ),
		'section'  => 'section_general',
		'type'     => 'checkbox',		
	)
);
