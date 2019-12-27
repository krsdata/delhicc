<?php

/**
 * Footer Settings panel at Theme Customizer
 *
 * @package  * @since 1.0.0
 */
add_action( 'customize_register', 'best_news_footer_settings_register' );

function best_news_footer_settings_register( $wp_customize ) {

/**
 * Add footer Settings Panel
 *
 * @since 1.0.0
 */
$wp_customize->add_panel(
    'best_news_footer_settings_panel',
    array(
        'priority'       => 15,
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Footer settings', "best-news" ),
    )
);

$wp_customize->add_section(
    'best_news_location_section',
    array(
        'priority'       => 2,
        'panel'          => 'best_news_footer_settings_panel',
        'capability'     => 'edit_theme_options',
        'theme_supports' => '',
        'title'          => __( 'Location and social link setting', "best-news" ),
        'description'    => __( 'Choose this option to display location at footer', "best-news" ),
    )
);

$wp_customize->add_section(
  'best_news_footer_slider_section',
  array(
      'priority'       => 1,
      'panel'          => 'best_news_footer_settings_panel',
      'capability'     => 'edit_theme_options',
      'title'          => __( 'Footer slider setting', "best-news" ),
      'description'    => __( 'Display most recent post', "best-news" ),
  )
);
// Setting - footer slider enable

$wp_customize->add_setting( 'best_news_footer_slider_enable',
    array(
    'default'           => 1,
    'sanitize_callback' => 'best_news_sanitize_checkbox',
    )
);

$wp_customize->add_control( 'best_news_footer_slider_enable',
    array(
    'label'         => esc_html__( 'Enable/Disable to display footer slider', 'best-news' ),
    'section'       => 'best_news_footer_slider_section',
    'type'          => 'checkbox',
    )
);

// Setting - title Text
$wp_customize->add_setting( 'best_news_footer_slider_heading',
    array(
    'default'           => __('May be missed','best-news'),
    'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control( 'best_news_footer_slider_heading',
    array(
    'label'         => esc_html__( 'May be missed', 'best-news' ),
    'section'       => 'best_news_footer_slider_section',
    'type'          => 'text',
    'settings' => 'best_news_footer_slider_heading',
    )
);


// Setting - location title

$wp_customize->add_setting( 'best_news_location_setting_text',
    array(
    'default'           => 0,
    'sanitize_callback' => 'best_news_sanitize_checkbox',
    )
);

$wp_customize->add_control( 'best_news_location_setting_text',
    array(
    'label'         => esc_html__( 'Enable/Disable to display location and social link', 'best-news' ),
    'section'       => 'best_news_location_section',
    'type'          => 'checkbox',
    )
);


$wp_customize->add_setting( 'best_news_location_title_text',
    array(
    'default'           => __('Get in touch', 'best-news'),
    'sanitize_callback' => 'sanitize_text_field',
    )
);

$wp_customize->add_control( 'best_news_location_title_text',
    array(
    'label'         => esc_html__( 'Location title', 'best-news' ),
    'section'       => 'best_news_location_section',
    'type'          => 'text',
    'settings' => 'best_news_location_title_text',
    )
);

/** Footer Contact info */
$wp_customize->add_setting( 
    new Best_News_Repeater_Setting( 
      $wp_customize, 
      'footer_contact_info_items', 
      array(
        'default' => array(
          array(
            'icon' => 'fa fa-map-pin',
            'title' => __('Bnews24, New York','best-news'),
          ),
          
        ),
        'sanitize_callback' => array( 'Best_News_Repeater_Setting', 'sanitize_repeater_setting' ),
      ) 
    ) 
  );

  $wp_customize->add_control(
    new Best_News_Control_Repeater(
      $wp_customize,
      'footer_contact_info_items',
      array(
        'section' => 'best_news_location_section',              
        'label'   => __( 'Bottom header contact items', 'best-news' ),
        'fields'  => array(
          'icon' => array(
            'type'        => 'font',
            'label'       => __( 'Font Awesome icon', 'best-news' ),
          ),
          'title' => array(
            'type'        => 'text',
            'label'       => __( 'Location title', 'best-news' ),
          )
        ),
        'row_label' => array(
          'type' => 'field',
          'value' => __( 'contact', 'best-news' ),
          'field' => 'title'
        )                        
      )
    )
  );

/** Social Links */
$wp_customize->add_setting( 
    new Best_News_Repeater_Setting( 
      $wp_customize, 
      'footer_social_links_items', 
      array(
        'default' => array(
         array(
          'font' => 'fa fa-facebook',
          'link' => '#',                        
        ),
         array(
          'font' => 'fa fa-twitter',
          'link' => '#',
        )
       ),
        'sanitize_callback' => array( 'Best_News_Repeater_Setting', 'sanitize_repeater_setting' ),
      ) 
    ) 
  );

  $wp_customize->add_control(
    new Best_News_Control_Repeater(
      $wp_customize,
      'footer_social_links_items',
      array(
        'section' => 'best_news_location_section',              
        'label'   => __( 'Social Links', 'best-news' ),
        'fields'  => array(
          'font' => array(
            'type'        => 'font',
            'label'       => __( 'Font Awesome Icon', 'best-news' ),
            'description' => __( 'Example: fa-facebook', 'best-news' ),
          ),
          'link' => array(
            'type'        => 'url',
            'label'       => __( 'Link', 'best-news' ),
            'description' => __( 'Example: http://facebook.com', 'best-news' ),
          )
        ),
        'row_label' => array(
          'type' => 'field',
          'value' => __( 'social', 'best-news' ),
          'field' => 'link'
        )                        
      )
    )
  );

}
