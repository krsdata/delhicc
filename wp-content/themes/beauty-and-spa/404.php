<?php

/* 	Beauty and Spa Theme's 404 Error Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/

get_header(); ?>
<div id="container">
<?php if (esc_url(beautyandspa_get_option('nfi404', get_template_directory_uri() . '/images/404.png' )) ): echo '<img class="nf404" src="'.esc_url(beautyandspa_get_option('nfi404', get_template_directory_uri() . '/images/404.png' )).'" />'; endif; ?>
<?php beautyandspa_not_found(); ?>
</div> 
<?php get_footer(); ?>