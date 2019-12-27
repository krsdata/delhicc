<?php

/**
 * Best_News General Settings panel at Theme Customizer
 *
 * @package Best_News
 * @since 1.0.0
 */
add_action( 'customize_register', 'best_news_general_settings_register' );

function best_news_general_settings_register( $wp_customize ) {

    $wp_customize->get_section( 'title_tagline' )->panel = 'best_news_general_settings_panel';
    $wp_customize->get_section( 'title_tagline' )->priority = '5';
    
    $wp_customize->get_section( 'background_image' )->panel = 'best_news_general_settings_panel';
    $wp_customize->get_section( 'background_image' )->priority = '15';

    /**
     * Add General Settings Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
        'best_news_general_settings_panel',
        array(
            'priority'       => 5,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'          => __( 'General Settings', 'best-news' ),
        )
    );
    /**
     * Add Typography Panel
     *
     * @since 1.0.0
     */
    $wp_customize->add_panel(
      'best_news_document_panel',
      array(
          'priority'       => 2,
          'capability'     => 'edit_theme_options',
          'theme_supports' => '',
          'title'          => __( 'Documents', 'best-news' ),
      )
  );

}