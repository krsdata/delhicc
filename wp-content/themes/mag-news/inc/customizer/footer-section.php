<?php
/**
 * Theme Footer Customizer
 *
 * @package Mag_News
 */

/****************  Footer Setting Section starts ************/
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => esc_html__('Footer Setting', 'mag-news'),
	'panel'       => 'theme_option_panel'    
	)
);

/*************** Setting copyright text. *****************************/
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'mag_news_sanitize_textarea_content',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => esc_html__( 'Copyright Text', 'mag-news' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	)
);