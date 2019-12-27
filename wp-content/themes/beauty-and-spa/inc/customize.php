<?php

function beautyandspa_customize_register($wp_customize){

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //    
    $wp_customize->add_section('beautyandspa_options', array(
        'priority' 		=> 10,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('BEAUTY AND SPA OPTIONS', 'beauty-and-spa'),
		'description'   => ' <div class="infohead">' . __('We appreciate an','beauty-and-spa') . ' <a href="https://wordpress.org/support/theme/beauty-and-spa/reviews" target="_blank">' . __('Honest Review','beauty-and-spa') . '</a> ' . __('of this Theme if you Love our Work','beauty-and-spa') . '<br /> <br />

' . __('You can learn more on This Theme from the ','beauty-and-spa') . '<a href="' . esc_url(admin_url( 'themes.php?page=theme-about' )) .'
" target="_blank"><strong>' . __('Theme Page','beauty-and-spa') . '</strong></a> in this Dashboard. 
		'
    ));
	
// Demo Style Front Page
    $wp_customize->add_setting('beautyandspa[dsfp]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_attr',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_dsfp' , array(
        'label'      	=> __('Set Demo Style Front Page ignoring the WordPress Reading Setting', 'beauty-and-spa'),
        'section'    	=> 'beautyandspa_options',
        'settings'   	=> 'beautyandspa[dsfp]',
		'type'     		=> 'checkbox',
    ));
	
	
// Content or Excerpt
    $wp_customize->add_setting('beautyandspa[contype]', array(
        'default'        	=> '2',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_attr',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_contype' , array(
        'label'      	=> __('Select the Post Content Type', 'beauty-and-spa'),
        'section'    	=> 'beautyandspa_options',
        'settings'   	=> 'beautyandspa[contype]',
		'type'       	=> 'radio',
        'choices'    	=> array(
            '1' 		=> __('Full Content in Blog Page. Also Support Read More Button if inserted during Editing', 'beauty-and-spa'), 
			'2' 		=> __('Some Words and Read More Button in the Blog Page', 'beauty-and-spa'),
         ),
    ));
	
//  Contact Number
    $wp_customize->add_setting('beautyandspa[phone-num]', array(
        'default'        	=> '',
    	'sanitize_callback' => 'sanitize_text_field',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_phone-num', array(
        'label'      => __('Contact Number', 'beauty-and-spa'),
        'section'    => 'beautyandspa_options',
        'settings'   => 'beautyandspa[phone-num]',
		'description' => __('Input your Contact Number','beauty-and-spa')
    ));
	
//  Default Featured Image
    $wp_customize->add_setting('beautyandspa[dfimage]', array(
        'default'           => get_template_directory_uri() . '/images/fimage.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'dfimage', array(
        'label'    			=> __('Default Featured Image for Posts', 'beauty-and-spa'),
        'section'  			=> 'beautyandspa_options',
        'settings' 			=> 'beautyandspa[dfimage]',
		'description'   	=> __('Upload an image for the Default Featured Image for Posts. 1100px X 600px image is recommended','beauty-and-spa')
    )));
	
// 404 Error Image
    $wp_customize->add_setting('beautyandspa[nfi404]', array(
        'default'           => get_template_directory_uri() . '/images/404.png',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'nfi404', array(
        'label'    			=> __('404 Error Image', 'beauty-and-spa'),
        'section'  			=> 'beautyandspa_options',
        'settings' 			=> 'beautyandspa[nfi404]',
		'description'   	=> __('Upload an image for 404 Error Page. 500px X 300px image is recommended','beauty-and-spa')
    )));
	
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('beautyandspa_heading', array(
        'priority' 			=> 11,
		'capability'     	=> 'edit_theme_options',
		'title'    			=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Heading', 'beauty-and-spa'),
        'description'  		=> ''
    ));
	
	
// Front Page Heading
    $wp_customize->add_setting('beautyandspa[heading_text]', array(
        'default'        	=> __('Welcome to the World of Creativity!','beauty-and-spa'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_heading_text' , array(
        'label'      => __('Front Page Heading', 'beauty-and-spa'),
        'section'    => 'beautyandspa_heading',
        'settings'   => 'beautyandspa[heading_text]'
    ));
	


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //
 
 $wp_customize->add_section('beautyandspa_slide', array(
        'priority' 		=> 12,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Slide', 'beauty-and-spa'),
        'description'   => ''
    ));
	
	$wp_customize->add_setting('beautyandspa[sfpsld]', array(
        'default'        	=> '',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_attr',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_sfpsld' , array(
        'label'      	=> __('Show the Slider', 'beauty-and-spa'),
        'section'    	=> 'beautyandspa_slide',
        'settings'   	=> 'beautyandspa[sfpsld]',
		'type'     		=> 'checkbox',
    ));

  
 foreach (range(1, 3) as $beautyandspa_sinumber )  {	  
//  Banner Image/ Slide Image
    $wp_customize->add_setting('beautyandspa[slide-image'.$beautyandspa_sinumber.']', array(
        'default'           => get_template_directory_uri() . '/images/slide-image/slide-image'.$beautyandspa_sinumber.'.jpg',
        'capability'        => 'edit_theme_options',
    	'sanitize_callback' => 'esc_url_raw',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'slide-image'.$beautyandspa_sinumber, array(
        'label'    			=> __('Banner Image/ Slide Image', 'beauty-and-spa'),
        'section'  			=> 'beautyandspa_slide',
        'settings' 			=> 'beautyandspa[slide-image'.$beautyandspa_sinumber.']',
		'description'   	=> __('Upload an image for the Front Page Banner. 930px X 350px image is recommended','beauty-and-spa')
    )));
 }
	
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('beautyandspa_fct', array(
        'priority' 		=> 13,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Featured Contents', 'beauty-and-spa'),
        'description'   => __('You can set your Featured Contents selecting Specific Pages. This Function/Feature/Option is different in Extended Version', 'beauty-and-spa')
    ));
	
foreach (range(1, 4) as $beautyandspa_fctp )  {	
//	Featured Contents
    $wp_customize->add_setting('beautyandspa[fctpage'.$beautyandspa_fctp.']', array(
        'capability'     	=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_html',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control('beautyandspa_fctpage'.$beautyandspa_fctp, array(
        'label'      => __('Featured Content Source', 'beauty-and-spa'). ' ' . $beautyandspa_fctp,
        'section'    => 'beautyandspa_fct',
        'type'    => 'dropdown-pages',
        'settings'   => 'beautyandspa[fctpage'.$beautyandspa_fctp.']',
    ));
}


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('beautyandspa_fbx', array(
        'priority' 		=> 14,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Featured Boxes', 'beauty-and-spa'),
        'description'   => __('You can set your Featured Boxes selecting Specific Pages. This Function/Feature/Option is different in Extended Version', 'beauty-and-spa')
    ));
	
foreach (range(1, 4) as $beautyandspa_fbxp )  {	
//	Featured Contents
    $wp_customize->add_setting('beautyandspa[fbxpage'.$beautyandspa_fbxp.']', array(
        'capability'     	=> 'edit_theme_options',
		'sanitize_callback'	=> 'esc_html',
        'type'           	=> 'option',
 
    ));
 
    $wp_customize->add_control('beautyandspa_fbxpage'.$beautyandspa_fbxp, array(
        'label'      => __('Featured Box Source', 'beauty-and-spa'). ' ' . $beautyandspa_fbxp,
        'section'    => 'beautyandspa_fbx',
        'type'    => 'dropdown-pages',
        'settings'   => 'beautyandspa[fbxpage'.$beautyandspa_fbxp.']',
    ));
}


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('beautyandspa_fubx', array(
        'priority' 		=> 15,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Staff Box', 'beauty-and-spa'),
        'description'   => __('You can set the Front Page Staffs. Your Users will be displayed here. This Function/Feature/Option is different in Extended Version', 'beauty-and-spa')
    ));
	
// Staff Show/Hide
    $wp_customize->add_setting('beautyandspa[staffbox]', array(
        'default'        	=> '1',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_attr',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_staffbox' , array(
        'label'      	=> __('Show/Hide the Staff Box', 'beauty-and-spa'),
        'section'    	=> 'beautyandspa_fubx',
        'settings'   	=> 'beautyandspa[staffbox]',
		'type'     		=> 'checkbox',
    ));
	
// Staff Box Heading
    $wp_customize->add_setting('beautyandspa[staffboxes-heading]', array(
        'default'        	=> __('WE ARE INSIDE','beauty-and-spa'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'sanitize_text_field',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_staffboxes-heading' , array(
        'label'      => __('Staff Box Heading', 'beauty-and-spa'),
        'section'    => 'beautyandspa_fubx',
        'settings'   => 'beautyandspa[staffboxes-heading]'
    ));
	

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('beautyandspa_ftes', array(
        'priority' 		=> 15,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Front Page Testimonials', 'beauty-and-spa'),
        'description'   => __('You can set the Front Page Testimonials. The Comments will be displayed here. This Function/Feature/Option is different in Extended Version', 'beauty-and-spa')
    ));
	
// Testimonial Show/Hide
    $wp_customize->add_setting('beautyandspa[tes-cln]', array(
        'default'        	=> '1',
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'esc_attr',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_tes-cln' , array(
        'label'      	=> __('Show/Hide the Testimonial Box', 'beauty-and-spa'),
        'section'    	=> 'beautyandspa_ftes',
        'settings'   	=> 'beautyandspa[tes-cln]',
		'type'     		=> 'checkbox',
    ));
	
// Testimonial Box Heading
    $wp_customize->add_setting('beautyandspa[testimonial-text]', array(
        'default'        	=> __('Sweet Words from our <em>Proud Clients</em> Worldwide','beauty-and-spa'),
        'capability'     	=> 'edit_theme_options',
    	'sanitize_callback' => 'wp_kses_post',
        'type'           	=> 'option'

    ));

    $wp_customize->add_control('beautyandspa_testimonial-text' , array(
        'label'      => __('Testimonial Box Heading', 'beauty-and-spa'),
        'section'    => 'beautyandspa_ftes',
        'settings'   => 'beautyandspa[testimonial-text]'
    ));
	

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++ //

 $wp_customize->add_section('beautyandspa_sl', array(
        'priority' 		=> 17,
		'capability'     => 'edit_theme_options',
		'title'    		=> __('&nbsp;&nbsp;&nbsp;&nbsp; - Social Links', 'beauty-and-spa'),
        'description'   => ''
    ));
	
foreach (range(1, 7) as $beautyandspa_sl )  {	
//  Social Link
    $wp_customize->add_setting('beautyandspa[sl'.$beautyandspa_sl.']', array(
        'default'        	=> '',
    	'sanitize_callback' => 'esc_url_raw',
        'capability'     	=> 'edit_theme_options',
        'type'           	=> 'option'
    ));

    $wp_customize->add_control('beautyandspa_sl'.$beautyandspa_sl, array(
        'label'      => __('Social Link', 'beauty-and-spa') . ' - ' . $beautyandspa_sl,
        'section'    => 'beautyandspa_sl',
        'settings'   => 'beautyandspa[sl'.$beautyandspa_sl.']'
    ));
	
} 

	
}


add_action('customize_register', 'beautyandspa_customize_register');


	if ( ! function_exists( 'beautyandspa_get_option' ) ) :
	function beautyandspa_get_option( $beautyandspa_name, $beautyandspa_default = false ) {
	$beautyandspa_config = get_option( 'beautyandspa' );

	if ( ! isset( $beautyandspa_config ) ) : return $beautyandspa_default; else: $beautyandspa_options = $beautyandspa_config; endif;
	if ( isset( $beautyandspa_options[$beautyandspa_name] ) ):  return $beautyandspa_options[$beautyandspa_name]; else: return $beautyandspa_default; endif;
	}
	endif;
	
	
	
