<?php

 /**
    * Primary Theme Color
    */
function best_news_customize_color( $wp_customize ) {

    $wp_customize->add_section( 'best_news_background_color',
		array(
			'title'      => __( 'Background Color', 'best-news' ),
			'priority'   => 50,
		) );

   
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'background_color', array(
		'label'     => __( 'Main background color', 'best-news' ),
		'section'   => 'best_news_background_color',
		'settings'  => 'background_color',
		'type'		=> 'color',
		) 
    ) );
    

    $wp_customize->add_setting( 'best_news_theme_color_setting', array(
        'capability'        => 'edit_theme_options',
        'default'           => '#4DB2EC',
        'sanitize_callback' => 'sanitize_hex_color'
    ) );
  
       $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'best_news_theme_color_setting',array(
        'label'                 =>  __( 'Theme Color', 'best-news' ),
        'section'               => 'colors',
        'type'                  => 'color',
        'priority'              => 0,
        'settings' => 'best_news_theme_color_setting',
    ) )
   );

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'best_news_description_overimage_color_setting',array(
    'label'                 =>  __( 'Description over the image Color', 'best-news' ),
    'section'               => 'colors',
    'type'                  => 'color',
    'priority'              => 20,
    'settings' => 'best_news_description_overimage_color_setting',
    ) )
    );
    

}
add_action( 'customize_register', 'best_news_customize_color' );