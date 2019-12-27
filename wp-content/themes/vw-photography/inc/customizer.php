<?php
/**
 * VW Photography Theme Customizer
 *
 * @package VW Photography
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_photography_custom_controls() {

    load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'vw_photography_custom_controls' );

function vw_photography_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/customize-homepage/class-customize-homepage.php' );

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_photography_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-photography' ),
	    'description' => __( 'Description of what this panel does.', 'vw-photography' ),
	) );

	$wp_customize->add_section( 'vw_photography_left_right', array(
    	'title'      => __( 'General Settings', 'vw-photography' ),
		'priority'   => 30,
		'panel' => 'vw_photography_panel_id'
	) );

	$wp_customize->add_setting('vw_photography_width_option',array(
        'default' => __('Full Width','vw-photography'),
        'sanitize_callback' => 'vw_photography_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Photography_Image_Radio_Control($wp_customize, 'vw_photography_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','vw-photography'),
        'description' => __('Here you can change the width layout of Website.','vw-photography'),
        'section' => 'vw_photography_left_right',
        'choices' => array(
            'Full Width' => get_template_directory_uri().'/images/full-width.png',
            'Wide Width' => get_template_directory_uri().'/images/wide-width.png',
            'Boxed' => get_template_directory_uri().'/images/boxed-width.png',
    ))));

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_photography_theme_options',array(
        'default' => __('Right Sidebar','vw-photography'),
        'sanitize_callback' => 'vw_photography_sanitize_choices'	        
	) );
	$wp_customize->add_control('vw_photography_theme_options', array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','vw-photography'),
        'description' => __('Here you can change the sidebar layout for posts. ','vw-photography'),
        'section' => 'vw_photography_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-photography'),
            'Right Sidebar' => __('Right Sidebar','vw-photography'),
            'One Column' => __('One Column','vw-photography'),
            'Three Columns' => __('Three Columns','vw-photography'),
            'Four Columns' => __('Four Columns','vw-photography'),
            'Grid Layout' => __('Grid Layout','vw-photography')
        ),
	));

	$wp_customize->add_setting('vw_photography_page_layout',array(
        'default' => __('One Column','vw-photography'),
        'sanitize_callback' => 'vw_photography_sanitize_choices'
	));
	$wp_customize->add_control('vw_photography_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','vw-photography'),
        'description' => __('Here you can change the sidebar layout for pages. ','vw-photography'),
        'section' => 'vw_photography_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-photography'),
            'Right Sidebar' => __('Right Sidebar','vw-photography'),
            'One Column' => __('One Column','vw-photography')
        ),
	) );

	//Slider
	$wp_customize->add_section( 'vw_photography_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-photography' ),
		'priority'   => null,
		'panel' => 'vw_photography_panel_id'
	) );

	$wp_customize->add_setting( 'vw_photography_slider_hide_show',
       array(
          'default' => 1,
          'transport' => 'refresh',
          'sanitize_callback' => 'vw_photography_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Photography_Toggle_Switch_Custom_Control( $wp_customize, 'vw_photography_slider_hide_show',
       array(
          'label' => esc_html__( 'Show / Hide Slider','vw-photography' ),
          'section' => 'vw_photography_slidersettings'
    )));

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_photography_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_photography_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'vw_photography_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-photography' ),
			'description' => __('Slider image size (1500 x 600)','vw-photography'),
			'section'  => 'vw_photography_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//content layout
	$wp_customize->add_setting('vw_photography_slider_content_option',array(
        'default' => __('Center','vw-photography'),
        'sanitize_callback' => 'vw_photography_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Photography_Image_Radio_Control($wp_customize, 'vw_photography_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','vw-photography'),
        'section' => 'vw_photography_slidersettings',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/slider-content1.png',
            'Center' => get_template_directory_uri().'/images/slider-content2.png',
            'Right' => get_template_directory_uri().'/images/slider-content3.png',
    ))));

    //Slider excerpt
	$wp_customize->add_setting( 'vw_photography_slider_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_photography_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','vw-photography' ),
		'section'     => 'vw_photography_slidersettings',
		'type'        => 'range',
		'settings'    => 'vw_photography_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Opacity
	$wp_customize->add_setting('vw_photography_slider_opacity_color',array(
		'default'              => 0.5,
		'sanitize_callback' => 'vw_photography_sanitize_choices'
	));

	$wp_customize->add_control( 'vw_photography_slider_opacity_color', array(
		'label'       => esc_html__( 'Slider Image Opacity','vw-photography' ),
		'section'     => 'vw_photography_slidersettings',
		'type'        => 'select',
		'settings'    => 'vw_photography_slider_opacity_color',
		'choices' => array(
			'0' =>  esc_attr('0','vw-photography'),
			'0.1' =>  esc_attr('0.1','vw-photography'),
			'0.2' =>  esc_attr('0.2','vw-photography'),
			'0.3' =>  esc_attr('0.3','vw-photography'),
			'0.4' =>  esc_attr('0.4','vw-photography'),
			'0.5' =>  esc_attr('0.5','vw-photography'),
			'0.6' =>  esc_attr('0.6','vw-photography'),
			'0.7' =>  esc_attr('0.7','vw-photography'),
			'0.8' =>  esc_attr('0.8','vw-photography'),
			'0.9' =>  esc_attr('0.9','vw-photography')
		),
	));

	$wp_customize->add_setting( 'vw_photography_search_hide_show', array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_photography_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Photography_Toggle_Switch_Custom_Control( $wp_customize, 'vw_photography_search_hide_show',
       array(
		'label' => esc_html__( 'Show / Hide Search','vw-photography' ),
		'section' => 'vw_photography_slidersettings'
    )));

	//Photography Category
	$wp_customize->add_section( 'vw_photography_category_section' , array(
    	'title'      => __( 'Photography Category', 'vw-photography' ),
		'priority'   => null,
		'panel' => 'vw_photography_panel_id'
	) );

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'vw_photography_category_page', array(
		'default'           => '',
		'sanitize_callback' => 'vw_photography_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'vw_photography_category_page', array(
		'label'    => __( 'Category Page', 'vw-photography' ),
		'section'  => 'vw_photography_category_section',
		'type'     => 'dropdown-pages'
	) );

	$args = array('numberposts' => -1);
	$post_list = get_posts($args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	for ( $m = 1; $m <= 3; $m++ ) {

		$wp_customize->add_setting('vw_photography_post_category' .$m,array(
			'sanitize_callback' => 'vw_photography_sanitize_choices',
		));
		$wp_customize->add_control('vw_photography_post_category' .$m,array(
			'type'    => 'select',
			'choices' => $pst,
			'label' => __('Select post','vw-photography'),
			'description' => __('Image Size (290 x 440)','vw-photography'),
			'section' => 'vw_photography_category_section',
		));
	}

	//Category excerpt
	$wp_customize->add_setting( 'vw_photography_category_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_photography_category_excerpt_number', array(
		'label'       => esc_html__( 'Category Excerpt length','vw-photography' ),
		'section'     => 'vw_photography_category_section',
		'type'        => 'range',
		'settings'    => 'vw_photography_category_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//Blog Post
	$wp_customize->add_section('vw_photography_blog_post',array(
		'title'	=> __('Blog Post Settings','vw-photography'),
		'panel' => 'vw_photography_panel_id',
	));	

	$wp_customize->add_setting( 'vw_photography_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'vw_photography_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Photography_Toggle_Switch_Custom_Control( $wp_customize, 'vw_photography_toggle_postdate',array(
        'label' => esc_html__( 'Post Date','vw-photography' ),
        'section' => 'vw_photography_blog_post'
    )));

    $wp_customize->add_setting( 'vw_photography_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_photography_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Photography_Toggle_Switch_Custom_Control( $wp_customize, 'vw_photography_toggle_author',array(
		'label' => esc_html__( 'Author','vw-photography' ),
		'section' => 'vw_photography_blog_post'
    )));

    $wp_customize->add_setting( 'vw_photography_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'vw_photography_switch_sanitization'
    ) );
    $wp_customize->add_control( new VW_Photography_Toggle_Switch_Custom_Control( $wp_customize, 'vw_photography_toggle_comments',array(
		'label' => esc_html__( 'Comments','vw-photography' ),
		'section' => 'vw_photography_blog_post'
    )));

    $wp_customize->add_setting( 'vw_photography_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'vw_photography_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','vw-photography' ),
		'section'     => 'vw_photography_blog_post',
		'type'        => 'range',
		'settings'    => 'vw_photography_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	
	//Content Craetion
	$wp_customize->add_section( 'vw_photography_content_section' , array(
    	'title' => __( 'Customize Home Page', 'vw-photography' ),
		'priority' => null,
		'panel' => 'vw_photography_panel_id'
	) );

	$wp_customize->add_setting('vw_photography_content_creation_main_control', array(
		'sanitize_callback' => 'esc_html',
	) );

	$homepage= get_option( 'page_on_front' );

	$wp_customize->add_control(	new VW_Photography_Content_Creation( $wp_customize, 'vw_photography_content_creation_main_control', array(
		'options' => array(
			esc_html__( 'First select static page in homepage setting for front page.Below given edit button is to customize Home Page. Just click on the edit option, add whatever elements you want to include in the homepage, save the changes and you are good to go.','vw-photography' ),
		),
		'section' => 'vw_photography_content_section',
		'button_url'  => admin_url( 'post.php?post='.$homepage.'&action=edit'),
		'button_text' => esc_html__( 'Edit', 'vw-photography' ),
	) ) );

	//Footer Text
	$wp_customize->add_section('vw_photography_footer',array(
		'title'	=> __('Footer','vw-photography'),
		'description'=> __('This section will appear in the footer','vw-photography'),
		'panel' => 'vw_photography_panel_id',
	));	
	
	$wp_customize->add_setting('vw_photography_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_photography_footer_text',array(
		'label'	=> __('Copyright Text','vw-photography'),
		'section'=> 'vw_photography_footer',
		'setting'=> 'vw_photography_footer_text',
		'type'=> 'text'
	));	

	$wp_customize->add_setting( 'vw_photography_hide_show_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'vw_photography_switch_sanitization'
    ));  
    $wp_customize->add_control( new VW_Photography_Toggle_Switch_Custom_Control( $wp_customize, 'vw_photography_hide_show_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll To Top','vw-photography' ),
      	'section' => 'vw_photography_footer'
    )));

	$wp_customize->add_setting('vw_photography_scroll_top_alignment',array(
        'default' => __('Right','vw-photography'),
        'sanitize_callback' => 'vw_photography_sanitize_choices'
	));
	$wp_customize->add_control(new VW_Photography_Image_Radio_Control($wp_customize, 'vw_photography_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','vw-photography'),
        'section' => 'vw_photography_footer',
        'settings' => 'vw_photography_scroll_top_alignment',
        'choices' => array(
            'Left' => get_template_directory_uri().'/images/layout1.png',
            'Center' => get_template_directory_uri().'/images/layout2.png',
            'Right' => get_template_directory_uri().'/images/layout3.png'
    ))));
}

add_action( 'customize_register', 'vw_photography_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Photography_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Photography_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(new VW_Photography_Customize_Section_Pro($manager,'example_1',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Photography Pro', 'vw-photography' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'vw-photography' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/wordpress-photography-themes/'),
		)));

		$manager->add_section(new VW_Photography_Customize_Section_Pro($manager,'example_2',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'vw-photography' ),
			'pro_text' => esc_html__( 'DOCS', 'vw-photography' ),
			'pro_url'  => admin_url('themes.php?page=vw_photography_guide'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-photography-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-photography-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Photography_Customize::get_instance();