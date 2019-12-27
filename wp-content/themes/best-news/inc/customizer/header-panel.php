<?php
/**
 * Best_News Header Settings panel at Theme Customizer
 *
 * @package Best_News
 * @since 1.0.0
 */

add_action( 'customize_register', 'best_news_header_settings_register' );

function best_news_header_settings_register( $wp_customize ) {
  require get_template_directory() .'/inc/repeater/best_new-class-repeater-settings.php';
  require get_template_directory() .'/inc/repeater/best_new-class-control-repeater.php';
  $wp_customize->get_section( 'header_image' )->priority = '20';
  $wp_customize->get_section( 'header_image' )->title    = __( 'Header Image', 'best-news' );
  $wp_customize->get_section( 'header_image' )->panel    = 'best_news_header_settings_panel';

	/**
     * Add Header Settings Panel
     *
     * @since 1.0.0
     */
  $wp_customize->add_panel(
   'best_news_header_settings_panel',
   array(
     'priority'       => 10,
     'capability'     => 'edit_theme_options',
     'theme_supports' => '',
     'title'          => __( 'Header Settings', 'best-news' ),
   )
 );

  /*----------------------------------------------------------------------------------------------------------------------------------------*/
	/**
     * Top Header section
     *
     * @since 1.0.0
     */
  $wp_customize->add_section(
    'best_news_top_header_section',
    array(
     'priority'       => 5,
     'panel'          => 'best_news_header_settings_panel',
     'capability'     => 'edit_theme_options',
     'theme_supports' => '',
     'title'          => __( 'Top Header Section', 'best-news' ),
     'description'    => __( 'Managed the content display at top header section.', 'best-news' ),
   )
  );

  /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
     *Enable/Disable Top Header section
     *
     * @since 1.0.0
     */
    $wp_customize->add_setting(
      'best_news_top_header_enable',
      array(
        'default'           => 0,
        'sanitize_callback' => 'best_news_sanitize_checkbox',
      )
    );
    
    $wp_customize->add_control(
      'best_news_top_header_enable',
      array(
        'section'     => 'best_news_top_header_section',
        'label'       => __( 'Enable/Disable top header', 'best-news' ),
        'type'        => 'checkbox'
      )       
    );
/**
     *Enable/Disable Top Header date
     *
     * @since 1.0.0
     */

    $wp_customize->add_setting(
      'best_news_top_header_date_enable',
      array(
        'default'           => 0,
        'sanitize_callback' => 'best_news_sanitize_checkbox',
      )
    );
    
    $wp_customize->add_control(
      'best_news_top_header_date_enable',
      array(
        'section'     => 'best_news_top_header_section',
        'label'       => __( 'Enable/Disable Top Header Date', 'best-news' ),
        'type'        => 'checkbox'
      )       
    );

    /**
     *Enable/Disable Top Header section
     *
     * @since 1.0.0
     */

    $wp_customize->add_setting(
      'best_news_top_header_social_enable',
      array(
        'default'           => 0,
        'sanitize_callback' => 'best_news_sanitize_checkbox',
      )
    );
    
    $wp_customize->add_control(
      'best_news_top_header_social_enable',
      array(
        'section'     => 'best_news_top_header_section',
        'label'       => __( 'Enable/Disable Social Links', 'best-news' ),
        'type'        => 'checkbox'
      )       
    );

    /**
     *Enable/Disable Top Header section
     *
     * @since 1.0.0
     */

    $wp_customize->add_setting(
      'best_news_top_header_left_side_enable',
      array(
        'default'           => 0,
        'sanitize_callback' => 'best_news_sanitize_checkbox',
      )
    );
    
    $wp_customize->add_control(
      'best_news_top_header_left_side_enable',
      array(
        'section'     => 'best_news_top_header_section',
        'label'       => __( 'Enable/Disable Top Header left Side item', 'best-news' ),
        'type'        => 'checkbox'
      )       
    );

    
    /** Top Header Contact info */
    $wp_customize->add_setting( 
      new Best_News_Repeater_Setting( 
        $wp_customize, 
        'top_header_contact_info_items', 
        array(
          'default' => array(
            array(
              'icon' => 'fa fa-map-pin',
              'title' => __('Bnews24, New York','best-news'),
            )
 
          ),
          'sanitize_callback' => array( 'Best_News_Repeater_Setting', 'sanitize_repeater_setting' ),
        ) 
      ) 
    );

    $wp_customize->add_control(
      new Best_News_Control_Repeater(
        $wp_customize,
        'top_header_contact_info_items',
        array(
          'section' => 'best_news_top_header_section',              
          'label'   => __( 'Top Header Contact items', 'best-news' ),
          'fields'  => array(
            'icon' => array(
              'type'        => 'font',
              'label'       => __( 'Font Awesome Icon', 'best-news' ),
            ),
            'title' => array(
              'type'        => 'text',
              'label'       => __( 'Location Title', 'best-news' ),
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
        'top_header_social_links_items', 
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
        'top_header_social_links_items',
        array(
          'section' => 'best_news_top_header_section',              
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



    /*----------------------------------------------------------------------------------------------------------------------------------------*/
    /**
       * Advertisement section
       *
       * @since 1.0.0
       */
    $wp_customize->add_section(
      'best_news_top_header_ads_section',
      array(
       'priority'       => 6,
       'panel'          => 'best_news_header_settings_panel',
       'capability'     => 'edit_theme_options',
       'theme_supports' => '',
       'title'          => __( 'Advertisement Section', 'best-news' ),
       'description'    => __( 'Managed the content display at Advertisement section.', 'best-news' ),
     )
    );

    /*----------------------------------------------------------------------------------------------------------------------------------------*/
      /**
       *Enable/Disable Advertisement section
       *
       * @since 1.0.0
       */
      $wp_customize->add_setting(
        'best_news_top_header_ads_enable',
        array(
          'default'           => 0,
          'sanitize_callback' => 'best_news_sanitize_checkbox',
        )
      );
      
      $wp_customize->add_control(
        'best_news_top_header_ads_enable',
        array(
          'section'     => 'best_news_top_header_ads_section',
          'label'       => __( 'Enable/Disable Advertisement Section', 'best-news' ),
          'type'        => 'checkbox'
        )       
      );

      $wp_customize->add_setting('best_news_top_header_ads_image', array(
        'transport'         => 'refresh',
        'sanitize_callback'     => 'esc_url_raw'
      ));

      $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'best_news_top_header_ads_image', array(
        'label'             => __('Advertisement Image', 'best-news'),
        'description'       => __('Image size (728px X 90px)', 'best-news'),
        'height'            => 90,
        'section'           => 'best_news_top_header_ads_section',
        'settings'          => 'best_news_top_header_ads_image',
      )));

      /*banner_advertisement_section_url*/
      $wp_customize->add_setting('best_news_top_header_ads_image_url',
      array(
          
          'capability' => 'edit_theme_options',
          'sanitize_callback' => 'esc_url_raw',
      )
      );
      $wp_customize->add_control('best_news_top_header_ads_image_url',
      array(
          'label' => esc_html__('URL Link', 'best-news'),
          'section' => 'best_news_top_header_ads_section',
          'type' => 'text',
          'priority' => 90,
      )
      );  
      /*----------------------------------------------------------------------------------------------------------------------------------------*/
      /**
       * Hot News section
       *
       * @since 1.0.0
       */
      $wp_customize->add_section(
        'best_news_top_header_hot_news_section',
        array(
         'priority'       => 7,
         'panel'          => 'best_news_header_settings_panel',
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'Hot News Section', 'best-news' ),
         'description'    => __( 'Managed the content display at Hot News section.', 'best-news' ),
       )
      );

      /*----------------------------------------------------------------------------------------------------------------------------------------*/
      /**
       *Enable/Disable Hot News section
       *
       * @since 1.0.0
       */
      $wp_customize->add_setting(
        'best_news_hot_news_enable',
        array(
          'default'           => 0,
          'sanitize_callback' => 'best_news_sanitize_checkbox',
        )
      );
      
      $wp_customize->add_control(
        'best_news_hot_news_enable',
        array(
          'section'     => 'best_news_top_header_hot_news_section',
          'label'       => __( 'Enable/Disable Hot News Section', 'best-news' ),
          'type'        => 'checkbox',
        )       
      );

      /**Hot News Text */
      $wp_customize->add_setting( 'best_news_hot_news_text', array(
        'capability'            => 'edit_theme_options',
        'default'               => __('Hotnews','best-news'),
        'sanitize_callback'     => 'sanitize_text_field'
      ) );

      $wp_customize->add_control( 'best_news_hot_news_text', array(
        'label'                 =>  __( 'Hotnews label', 'best-news' ),
        'description'           =>__('Eg:-  Hot News','best-news'),
        'section'               => 'best_news_top_header_hot_news_section',
        'type'                  => 'text',
        'settings'              => 'best_news_hot_news_text',
      ) );

      /** select order by for News Slider */

      $wp_customize->add_setting( 'best_news_hot_news_order', array(
        
        'default'     => 'date',
        'sanitize_callback' => 'best_news_sanitize_select'
      ) );

      $wp_customize->add_control( 'best_news_hot_news_order', 
        array(
          'label' 	=> __( 'Select chronological order', 'best-news' ),
          'section'	=> 'best_news_top_header_hot_news_section',
          'settings' 	=> 'best_news_hot_news_order',
          'type'      => 'select',
          'choices'	=> array (
            'date'	=> __( 'Recent publish date', 'best-news' ),
            'comment_count' => __( 'Comment count ', 'best-news' ),
            'rand'	=> __( 'Random', 'best-news' ),
          )

        ) 
      );

      /** select category for hot news */

      require_once( trailingslashit( get_template_directory() ) . 'inc/dropdown-category.php' );
      $wp_customize->add_setting( 'best_news_hot_news_category_name', 
      array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new best_news_My_Dropdown_Category_Control( $wp_customize, 'best_news_hot_news_category_name', array(
        
          'label' 	=> __( 'Select post among category', 'best-news' ),
          'section'	=> 'best_news_top_header_hot_news_section',
          
      ) 	)	
      );
      /** select author for hot news */

      require_once( trailingslashit( get_template_directory() ) . 'inc/dropdown-author.php' );
      $wp_customize->add_setting( 'best_news_hot_news_authorlist', 
      array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new best_news_My_Dropdown_Author_Control( $wp_customize, 'best_news_hot_news_authorlist', array(
        
          'label' 	=> __( 'Select post author', 'best-news' ),
          'section'	=> 'best_news_top_header_hot_news_section',
          
      ) 	)	
      );

      $wp_customize->add_setting( 'best_news_hot_news_number', array(
        'capability'            => 'edit_theme_options',
        'default'               => '3',
        'sanitize_callback'     => 'absint'
      ));

      $wp_customize->add_control( 'best_news_hot_news_number', array(
        'label'                 =>  __( 'Number of Hot News to Show in Pages', 'best-news' ),
        'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'best-news' ),
        'section'               => 'best_news_top_header_hot_news_section',
        'type'                  => 'number',
        'settings' => 'best_news_hot_news_number',
      ) );
 /*----------------------------------------------------------------------------------------------------------------------------------------*/
      /**
       * News Slider section
       *
       * @since 1.0.0
       */
      $wp_customize->add_section(
        'best_news_slider_section',
        array(
         'priority'       => 8,
         'panel'          => 'best_news_header_settings_panel',
         'capability'     => 'edit_theme_options',
         'theme_supports' => '',
         'title'          => __( 'News Slider section', 'best-news' ),
         'description'    => __( 'Managed the content display at News Slider section.', 'best-news' ),
       )
      );
      /**
       *Enable/Disable News Slider section
      *
      * @since 1.0.0
      */
      $wp_customize->add_setting(
        'best_news_slider_enable',
        array(
          'default'           => 1,
          'sanitize_callback' => 'best_news_sanitize_checkbox',
        )
      );

      $wp_customize->add_control(
        'best_news_slider_enable',
        array(
          'section'     => 'best_news_slider_section',
          'label'       => __( 'Enable/Disable Main news slider Section', 'best-news' ),
          'type'        => 'checkbox'
        )       
      );

      /** select order by for News Slider */

      $wp_customize->add_setting( 'best_news_news_slider_order', array(
        
        'default'     => 'date',
        'sanitize_callback' => 'best_news_sanitize_select'
      ) );

      $wp_customize->add_control( 'best_news_news_slider_order', 
        array(
          'label' 	=> __( 'Select chronological order', 'best-news' ),
          'section'	=> 'best_news_slider_section',
          'settings' 	=> 'best_news_news_slider_order',
          'type'      => 'select',
          'choices'	=> array (
            'date'	=> __( 'Recent publish date', 'best-news' ),
            'comment_count' => __( 'Comment count ', 'best-news' ),
            'rand'	=> __( 'Random', 'best-news' ),
          )

        ) 
      );

      /** select category for News Slider */

      require_once( trailingslashit( get_template_directory() ) . 'inc/dropdown-category.php' );
      $wp_customize->add_setting( 'best_news_slider_category_name', 
      array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new best_news_My_Dropdown_Category_Control( $wp_customize, 'best_news_slider_category_name', array(
        
          'label' 	=> __( 'Select post among category', 'best-news' ),
          'section'	=> 'best_news_slider_section',
          
      ) 	)	
      );

      /** select author for News Slider */

      require_once( trailingslashit( get_template_directory() ) . 'inc/dropdown-author.php' );
      $wp_customize->add_setting( 'best_news_news_slider_authorlist', 
      array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new best_news_My_Dropdown_Author_Control( $wp_customize, 'best_news_news_slider_authorlist', array(
        
          'label' 	=> __( 'Select post author', 'best-news' ),
          'section'	=> 'best_news_slider_section',
          
      ) 	)	
      );
      

      $wp_customize->add_setting( 'best_news_slider_number', array(
        'capability'            => 'edit_theme_options',
        'default'               => '3',
        'sanitize_callback'     => 'absint'
      ));
      
      $wp_customize->add_control( 'best_news_slider_number', array(
        'label'                 =>  __( 'Number of News Slider to Show in Frontpage', 'best-news' ),
        'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'best-news' ),
        'section'               => 'best_news_slider_section',
        'type'                  => 'number',
        'settings' => 'best_news_slider_number',
      ) );
      
      /**News Slider sidebar Heading */
      $wp_customize->add_setting( 'best_news_slider_sidebar_heading', array(
        'capability'            => 'edit_theme_options',
        'default'               => __('News special','best-news'),
        'sanitize_callback'     => 'sanitize_text_field'
      ) );
      
      $wp_customize->add_control( 'best_news_slider_sidebar_heading', array(
        'label'                 =>  __( 'Slider Sidebar Heading', 'best-news' ),
        'description'           =>__('Eg:-  News special','best-news'),
        'section'               => 'best_news_slider_section',
        'type'                  => 'text',
        'settings'              => 'best_news_slider_sidebar_heading',
      ) );
      
      /** select order by for News Slider */

      $wp_customize->add_setting( 'best_news_news_slider_sidebar_order', array(
        
        'default'     => 'date',
        'sanitize_callback' => 'best_news_sanitize_select'
      ) );

      $wp_customize->add_control( 'best_news_news_slider_sidebar_order', 
        array(
          'label' 	=> __( 'Select chronological order', 'best-news' ),
          'section'	=> 'best_news_slider_section',
          'settings' 	=> 'best_news_news_slider_sidebar_order',
          'type'      => 'select',
          'choices'	=> array (
            'date'	=> __( 'Recent publish date', 'best-news' ),
            'comment_count' => __( 'Comment count ', 'best-news' ),
            'rand'	=> __( 'Random', 'best-news' ),
          )

        ) 
      );

      /** select category for News Slider sidebar */
      
      require_once( trailingslashit( get_template_directory() ) . 'inc/dropdown-category.php' );
      $wp_customize->add_setting( 'best_news_slider_sidebar_category_name', 
      array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new best_news_My_Dropdown_Category_Control( $wp_customize, 'best_news_slider_sidebar_category_name', array(
        
          'label' 	=> __( 'Select Category for News Slider Sidebar', 'best-news' ),
          'section'	=> 'best_news_slider_section',
          
      ) 	)	
      );

      /** select author for News Slider */

      require_once( trailingslashit( get_template_directory() ) . 'inc/dropdown-author.php' );
      $wp_customize->add_setting( 'best_news_news_slider_sidebar_authorlist', 
      array(
        'default'     =>  0,
        'sanitize_callback' => 'sanitize_text_field',
      ) );

      $wp_customize->add_control( new best_news_My_Dropdown_Author_Control( $wp_customize, 'best_news_news_slider_sidebar_authorlist', array(
        
          'label' 	=> __( 'Select post author', 'best-news' ),
          'section'	=> 'best_news_slider_section',
          
      ) 	)	
      );
      
      $wp_customize->add_setting( 'best_news_slider_sidebar_number', array(
        'capability'            => 'edit_theme_options',
        'default'               => '5',
        'sanitize_callback'     => 'absint'
      ));
      
      $wp_customize->add_control( 'best_news_slider_sidebar_number', array(
        'label'                 =>  __( 'Number of News Slider Sidebar to Show in Frontpage', 'best-news' ),
        'description'           =>  __( 'input 3,4,5,6,7,8,9,10', 'best-news' ),
        'section'               => 'best_news_slider_section',
        'type'                  => 'number',
        'settings' => 'best_news_slider_sidebar_number',
      ) );
    }