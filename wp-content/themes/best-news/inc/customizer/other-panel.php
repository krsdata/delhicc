<?php
/**
 * Best_News Other Settings panel at Theme Customizer
 *
 * @package Best_News
 * @since 1.0.0
 */

add_action( 'customize_register', 'best_news_other_settings_register' );

function best_news_other_settings_register( $wp_customize ) {


 /*----------------------------------------------------------------------------------------------------------------------------------------*/
  /**
     * Other Section
     *
     * @since 1.0.0
     */
  $wp_customize->add_section(
    'best_news_other_section',
    array(
      'priority'       => 40,
      'capability'     => 'edit_theme_options',
      'theme_supports' => '',
      'title'          => __( 'Other Settings', 'best-news' )
    )
  );

   // Enable/Disable Preloader
  $wp_customize->add_setting(
    'best_news_preloader_enable',
    array(
      'default'           => 0,
      'sanitize_callback' => 'best_news_sanitize_checkbox',
    )
  );

  $wp_customize->add_control(
    'best_news_preloader_enable',
    array(
      'section'     => 'best_news_other_section',
      'label'       => __( 'Enable/Disable for Preloader', 'best-news' ),
      'type'        => 'checkbox'
    )       
  );

     // Enable/Disable Modal
     $wp_customize->add_setting(
      'best_blog_popup_enable',
      array(
        'default'           => 1,
        'sanitize_callback' => 'best_news_sanitize_checkbox',
      )
    );
  
    $wp_customize->add_control(
      'best_blog_popup_enable',
      array(
        'section'     => 'best_news_other_section',
        'label'       => __( 'Enable/Disable for read more popup', 'best-news' ),
        'type'        => 'checkbox'
      )       
    );

       // Write readmore
       $wp_customize->add_setting(
        'best_blog_read_more_title',
        array(
          'default'           => __('Read more','best-news'),
          'sanitize_callback' => 'sanitize_text_field',
        )
      );
    
      $wp_customize->add_control(
        'best_blog_read_more_title',
        array(
          'section'     => 'best_news_other_section',
          'label'       => __( 'Text for read more button', 'best-news' ),
          'type'        => 'text'
        )       
      );
    
   // Wrire Full view here in modal
   $wp_customize->add_setting(
    'best_blog_detail_here_title',
    array(
      'default'           => __('Full view here','best-news'),
      'sanitize_callback' => 'sanitize_text_field',
    )
  );

  $wp_customize->add_control(
    'best_blog_detail_here_title',
    array(
      'section'     => 'best_news_other_section',
      'label'       => __( 'Text for full view here button', 'best-news' ),
      'type'        => 'text'
    )       
  );
     // Wrire Full view here in modal
     $wp_customize->add_setting(
      'best_blog_related_post_title',
      array(
        'default'           => __('More Stories','best-news'),
        'sanitize_callback' => 'sanitize_text_field',
      )
    );
  
    $wp_customize->add_control(
      'best_blog_related_post_title',
      array(
        'section'     => 'best_news_other_section',
        'label'       => __( 'Related post by category title', 'best-news' ),
        'type'        => 'text'
      )       
    );

 
}