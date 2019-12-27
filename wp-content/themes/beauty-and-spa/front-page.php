<?php
/*
	Template Name: Front Page
	Beauty and Spa Theme's Front Page to Display the Home Page if Selected
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/
get_header();
if ( 'posts' != get_option( 'show_on_front' ) || esc_attr(beautyandspa_get_option ( 'dsfp' , '')) == '1' ):
$beautyandspa_fpartorder = array( 'heading', 'slide', 'featuredc', 'featuredb', 'wpblog', 'staffs', 'blog', 'testimonial' );
foreach ( $beautyandspa_fpartorder as $key ) { get_template_part( 'fpcontents/fp', $key ); }
else: ?>
<div id="container">
<?php get_template_part( 'post-content' );  get_sidebar(); ?>
</div>
<?php endif;
get_footer(); ?>