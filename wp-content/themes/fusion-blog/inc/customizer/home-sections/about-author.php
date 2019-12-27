<?php
/**
 * About Author options.
 *
 * @package Fusion Blog
 */

$default = fusion_blog_get_default_theme_options();

// About Author Section
$wp_customize->add_section( 'section_home_about_author',
	array(
		'title'      => __( 'Featured Posts', 'fusion-blog' ),
		'priority'   => 100,
		'capability' => 'edit_theme_options',
		'panel'      => 'home_page_panel',
		)
);
// Disable About Author Section
$wp_customize->add_setting('theme_options[disable_about_author_section]', 
	array(
	'default' 			=> $default['disable_about_author_section'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'fusion_blog_sanitize_checkbox'
	)
);

$wp_customize->add_control('theme_options[disable_about_author_section]', 
	array(		
	'label' 	=> __('Disable Feautured Courses Section', 'fusion-blog'),
	'section' 	=> 'section_home_about_author',
	'settings'  => 'theme_options[disable_about_author_section]',
	'type' 		=> 'checkbox',	
	)
);

// Number of items
$wp_customize->add_setting('theme_options[number_of_ss_items]', 
	array(
	'default' 			=> $default['number_of_ss_items'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'fusion_blog_sanitize_number_range'
	)
);

$wp_customize->add_control('theme_options[number_of_ss_items]', 
	array(
	'label'       => __('Number of Items', 'fusion-blog'),
	'description' => __('Save & Refresh the customizer to see its effect. Maximum is 3.', 'fusion-blog'),
	'section'     => 'section_home_about_author',   
	'settings'    => 'theme_options[number_of_ss_items]',		
	'type'        => 'number',
	'active_callback' => 'fusion_blog_about_author_active',
	'input_attrs' => array(
			'min'	=> 1,
			'max'	=> 3,
			'step'	=> 1,
		),
	)
);

$wp_customize->add_setting('theme_options[ss_content_type]', 
	array(
	'default' 			=> $default['ss_content_type'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',	
	'sanitize_callback' => 'fusion_blog_sanitize_select'
	)
);

$wp_customize->add_control('theme_options[ss_content_type]', 
	array(
	'label'       => __('Content Type', 'fusion-blog'),
	'section'     => 'section_home_about_author',   
	'settings'    => 'theme_options[ss_content_type]',		
	'type'        => 'select',
	'active_callback' => 'fusion_blog_about_author_active',
	'choices'	  => array(
			'ss_page'	  => __('Page','fusion-blog'),
			'ss_post'	  => __('Post','fusion-blog'),
		),
	)
);

$number_of_ss_items = fusion_blog_get_option( 'number_of_ss_items' );

for( $i=1; $i<=$number_of_ss_items; $i++ ){

	// Additional Information First Page
	$wp_customize->add_setting('theme_options[about_author_page_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'fusion_blog_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_author_page_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Page #%1$s', 'fusion-blog'), $i),
		'section'     => 'section_home_about_author',   
		'settings'    => 'theme_options[about_author_page_'.$i.']',		
		'type'        => 'dropdown-pages',
		'active_callback' => 'fusion_blog_about_author_page',
		)
	);

	// Posts
	$wp_customize->add_setting('theme_options[about_author_post_'.$i.']', 
		array(
		'type'              => 'theme_mod',
		'capability'        => 'edit_theme_options',	
		'sanitize_callback' => 'fusion_blog_dropdown_pages'
		)
	);

	$wp_customize->add_control('theme_options[about_author_post_'.$i.']', 
		array(
		'label'       => sprintf( __('Select Post #%1$s', 'fusion-blog'), $i),
		'section'     => 'section_home_about_author',   
		'settings'    => 'theme_options[about_author_post_'.$i.']',		
		'type'        => 'select',
		'choices'	  => fusion_blog_dropdown_posts(),
		'active_callback' => 'fusion_blog_about_author_post',
		)
	);
}