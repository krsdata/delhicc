<?php    
/**
 *Classy Lite Theme Customizer
 *
 * @package Classy Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function classy_lite_customize_register( $wp_customize ) {	
	
	function classy_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );
	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function classy_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}  
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	 //Panel for section & control
	$wp_customize->add_panel( 'classy_lite_panel_area', array(
		'priority' => null,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Theme Options Panel', 'classy-lite' ),		
	) );
	
	//Layout Options
	$wp_customize->add_section('classy_lite_layout_option',array(
		'title' => __('Site Layout','classy-lite'),			
		'priority' => 1,
		'panel' => 	'classy_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('classy_lite_boxlayout',array(
		'sanitize_callback' => 'classy_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'classy_lite_boxlayout', array(
    	'section'   => 'classy_lite_layout_option',    	 
		'label' => __('Check to Box Layout','classy-lite'),
		'description' => __('If you want to box layout please check the Box Layout Option.','classy-lite'),
    	'type'      => 'checkbox'
     )); //Layout Section 
	
	$wp_customize->add_setting('classy_lite_color_scheme',array(
		'default' => '#e73072',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'classy_lite_color_scheme',array(
			'label' => __('Color Scheme','classy-lite'),			
			'description' => __('More color options in PRO Version','classy-lite'),
			'section' => 'colors',
			'settings' => 'classy_lite_color_scheme'
		))
	);	
		
	
	// main Slider Section		
	$wp_customize->add_section( 'classy_lite_site_slider_area', array(
		'title' => __('Slider Section', 'classy-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 766 pixel.','classy-lite'), 
		'panel' => 	'classy_lite_panel_area',           			
    ));
	
	$wp_customize->add_setting('classy_lite_site_slider_pgearea1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('classy_lite_site_slider_pgearea1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide one:','classy-lite'),
		'section' => 'classy_lite_site_slider_area'
	));	
	
	$wp_customize->add_setting('classy_lite_site_slider_pgearea2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('classy_lite_site_slider_pgearea2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide two:','classy-lite'),
		'section' => 'classy_lite_site_slider_area'
	));	
	
	$wp_customize->add_setting('classy_lite_site_slider_pgearea3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('classy_lite_site_slider_pgearea3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slide three:','classy-lite'),
		'section' => 'classy_lite_site_slider_area'
	));	// Slider Section	
	
	$wp_customize->add_setting('classy_lite_site_slider_readmore_btntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('classy_lite_site_slider_readmore_btntext',array(	
		'type' => 'text',
		'label' => __('Add slider Read more button name here','classy-lite'),
		'section' => 'classy_lite_site_slider_area',
		'setting' => 'classy_lite_site_slider_readmore_btntext'
	)); // Slider Read More Button Text
	
	$wp_customize->add_setting('classy_lite_show_site_slider_area',array(
		'default' => false,
		'sanitize_callback' => 'classy_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'classy_lite_show_site_slider_area', array(
	    'settings' => 'classy_lite_show_site_slider_area',
	    'section'   => 'classy_lite_site_slider_area',
	     'label'     => __('Check To Show This Section','classy-lite'),
	   'type'      => 'checkbox'
	 ));//Show Slider Section	
	 
	 
	 // Our Services section
	$wp_customize->add_section('classy_lite_services_3_box_section', array(
		'title' => __('Our Services Section','classy-lite'),
		'description' => __('Select pages from the dropdown for services section','classy-lite'),
		'priority' => null,
		'panel' => 	'classy_lite_panel_area',          
	));	
	
	$wp_customize->add_setting('classy_lite_our_services_page_box1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'classy_lite_our_services_page_box1',array(
		'type' => 'dropdown-pages',			
		'section' => 'classy_lite_services_3_box_section',
	));		
	
	$wp_customize->add_setting('classy_lite_our_services_page_box2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'classy_lite_our_services_page_box2',array(
		'type' => 'dropdown-pages',			
		'section' => 'classy_lite_services_3_box_section',
	));
	
	$wp_customize->add_setting('classy_lite_our_services_page_box3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'classy_lite_our_services_page_box3',array(
		'type' => 'dropdown-pages',			
		'section' => 'classy_lite_services_3_box_section',
	));
	
	
	$wp_customize->add_setting('classy_lite_show_services_3_box_section',array(
		'default' => false,
		'sanitize_callback' => 'classy_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'classy_lite_show_services_3_box_section', array(
	   'settings' => 'classy_lite_show_services_3_box_section',
	   'section'   => 'classy_lite_services_3_box_section',
	   'label'     => __('Check To Show This Section','classy-lite'),
	   'type'      => 'checkbox'
	 ));//Show Services Section	 
	 
	 
	 // About Section 
	$wp_customize->add_section('classy_lite_aboutus_section', array(
		'title' => __('About Us Section','classy-lite'),
		'description' => __('Select Pages from the dropdown for about section','classy-lite'),
		'priority' => null,
		'panel' => 	'classy_lite_panel_area',          
	));		
	
	$wp_customize->add_setting('classy_lite_site_aboutus_pagearea',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'classy_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'classy_lite_site_aboutus_pagearea',array(
		'type' => 'dropdown-pages',			
		'section' => 'classy_lite_aboutus_section',
	));		
	
	$wp_customize->add_setting('classy_lite_show_aboutus_pagearea',array(
		'default' => false,
		'sanitize_callback' => 'classy_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'classy_lite_show_aboutus_pagearea', array(
	    'settings' => 'classy_lite_show_aboutus_pagearea',
	    'section'   => 'classy_lite_aboutus_section',
	    'label'     => __('Check To Show This Section','classy-lite'),
	    'type'      => 'checkbox'
	));//Show Aboutus Section 
	
	 //Footer Social icons
	$wp_customize->add_section('classy_lite_footer_social_section',array(
		'title' => __('Footer social icons','classy-lite'),
		'description' => __( 'Add social icons link here to display icons in header.', 'classy-lite' ),			
		'priority' => null,
		'panel' => 	'classy_lite_panel_area', 
	));
	
	$wp_customize->add_setting('classy_lite_fb_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'	
	));
	
	$wp_customize->add_control('classy_lite_fb_link',array(
		'label' => __('Add facebook link here','classy-lite'),
		'section' => 'classy_lite_footer_social_section',
		'setting' => 'classy_lite_fb_link'
	));	
	
	$wp_customize->add_setting('classy_lite_twitt_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('classy_lite_twitt_link',array(
		'label' => __('Add twitter link here','classy-lite'),
		'section' => 'classy_lite_footer_social_section',
		'setting' => 'classy_lite_twitt_link'
	));
	
	$wp_customize->add_setting('classy_lite_gplus_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('classy_lite_gplus_link',array(
		'label' => __('Add google plus link here','classy-lite'),
		'section' => 'classy_lite_footer_social_section',
		'setting' => 'classy_lite_gplus_link'
	));
	
	$wp_customize->add_setting('classy_lite_linked_link',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('classy_lite_linked_link',array(
		'label' => __('Add linkedin link here','classy-lite'),
		'section' => 'classy_lite_footer_social_section',
		'setting' => 'classy_lite_linked_link'
	));
	
	$wp_customize->add_setting('classy_lite_show_footer_social_part',array(
		'default' => false,
		'sanitize_callback' => 'classy_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'classy_lite_show_footer_social_part', array(
	   'settings' => 'classy_lite_show_footer_social_part',
	   'section'   => 'classy_lite_footer_social_section',
	   'label'     => __('Check To show This Section','classy-lite'),
	   'type'      => 'checkbox'
	 ));//Show Footer Social icons Section 			 
	 
		 
}
add_action( 'customize_register', 'classy_lite_customize_register' );

function classy_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a, .recentpost_listing h2 a:hover,
        #sidebar ul li a:hover,	
		.site_navigation ul li a:hover, 
	    .site_navigation ul li.current-menu-item a,
	    .site_navigation ul li.current-menu-parent a.parent,
	    .site_navigation ul li.current-menu-item ul.sub-menu li a:hover,				
        .recentpost_listing h3 a:hover,       
		.footer_socialicons a:hover,       						
        .postmeta a:hover,		
        .button:hover,			
		.services_3_column:hover h3 a,
		.welcome_content_column h3 span       				
            { color:<?php echo esc_html( get_theme_mod('classy_lite_color_scheme','#e73072')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,		
        .nivo-controlNav a.active,				
        .learnmore,
		a.blogreadmore,
		.welcome_content_column .btnstyle1,		
		.nivo-caption .slide_morebtn,													
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,
        .toggle a	
            { background-color:<?php echo esc_html( get_theme_mod('classy_lite_color_scheme','#e73072')); ?>;}
			
		.nivo-caption .slide_morebtn:hover,		
		.tagcloud a:hover,
		.footer_socialicons a:hover,
		.welcome_content_column p,		
		blockquote	        
            { border-color:<?php echo esc_html( get_theme_mod('classy_lite_color_scheme','#e73072')); ?>;}	
			
         	
    </style> 
<?php         
}
         
add_action('wp_head','classy_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function classy_lite_customize_preview_js() {
	wp_enqueue_script( 'classy_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20191002', true );
}
add_action( 'customize_preview_init', 'classy_lite_customize_preview_js' );