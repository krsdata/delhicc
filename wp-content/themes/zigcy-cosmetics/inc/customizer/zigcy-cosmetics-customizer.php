<?php
/**
 * Zigcy Lite Customizer
 *
 * @package Zigcy Lite
*/


    /** header Type **/

    $wp_customize->remove_setting( 'zigcy_lite_product_categories_three');
    $wp_customize->remove_control( 'zigcy_lite_product_categories_three');

    $wp_customize->get_setting( 'zigcy_lite_header_type')->sanitize_callback = 'zigcy_cosmetics_header_sanitize';
    $wp_customize->get_control( 'zigcy_lite_header_type')->choices   = array(
            'layout1'     => esc_html__('Layout One', 'zigcy-cosmetics'),
            'layout2'     => esc_html__('Layout Two', 'zigcy-cosmetics'),
            'layout3'     => esc_html__('Layout Three', 'zigcy-cosmetics'),
          );




  $wp_customize->add_setting( 'zigcy_lite_latest_cat_prod_title_popular', array(
    'sanitize_callback'   => 'sanitize_text_field'
  ));

  $wp_customize->add_control('zigcy_lite_latest_cat_prod_title_popular', array(
    'label'     => esc_html__('Popular Category Product Title','zigcy-cosmetics'),
    'type'      => 'text',
    'section'   => 'zigcy_lite_lat_prod_cat_setting',
  ));

  $wp_customize->add_setting( 'zigcy_lite_latest_cat_prod_subtitle_popular', array(
    'sanitize_callback'   => 'sanitize_text_field'
  ));

  $wp_customize->add_control( 'zigcy_lite_latest_cat_prod_subtitle_popular', array(
    'label'     => esc_html__('Popular Category Product SubTitle','zigcy-cosmetics'),
    'type'      => 'text',
    'section'   => 'zigcy_lite_lat_prod_cat_setting',
  ));

  if(class_exists('WooCommerce')){

    $zigcy_lite_prod_cats = zigcy_lite_product_cats();
    /** drop down categories for latest product **/
    $wp_customize->add_setting( 'zigcy_lite_latest_product_categories_popular',array(
      'sanitize_callback' => 'absint',
      'default'           => 0,
    ));
    $wp_customize->add_control( 'zigcy_lite_latest_product_categories_popular', array(
      'label'       => esc_html__('Popular Product Category', 'zigcy-cosmetics'),
      'description' => esc_html__(' Select Category to display popular products', 'zigcy-cosmetics'),
      'section'     => 'zigcy_lite_lat_prod_cat_setting',
      'type'        => 'select',
      'choices'     => $zigcy_lite_prod_cats,
    ));

    // show rating 
    $wp_customize->add_setting( 'zigcy_lite_sml_lat_pro_show_rating_popular', array(
     'sanitize_callback' => 'zigcy_lite_sanitize_checkbox'
   ));
    $wp_customize->add_control( 'zigcy_lite_sml_lat_pro_show_rating_popular', array(
      'section'      => 'zigcy_lite_lat_prod_cat_setting',
      'label'        => esc_html__( 'Show Product Rating', 'zigcy-cosmetics' ),
      'description'   => esc_html__('Check the box to show product ratings','zigcy-cosmetics'),
      'type'         => 'checkbox'    
    ));

    // No of Products To Show
    $wp_customize->add_setting( 'zigcy_lite_sml_lat_pro_per_page_popular', array(
      'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control('zigcy_lite_sml_lat_pro_per_page_popular', array(
      'label'         => esc_html__('Total Products To Show','zigcy-cosmetics'),
      'description'   => esc_html__('Display number of products as your need','zigcy-cosmetics'),
      'type'          => 'number',
      'section'       => 'zigcy_lite_lat_prod_cat_setting',
    ));
  }