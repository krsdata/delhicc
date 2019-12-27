<?php 

/**
*Template Name: Zigcy Cosmetics
*
**/
	get_header();
	$home_sections =   zigcy_lite_get_parallax_sections();
	$i = 0;
	foreach( $home_sections as $home_section){
    	$i++;
		$sections =  $home_section['function'];        
	 	do_action($sections); 
    }

get_footer();