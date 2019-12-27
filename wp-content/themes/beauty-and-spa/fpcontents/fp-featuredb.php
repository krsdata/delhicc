<?php
/* 	Beauty and Spa Theme's Featured Box to show the Featured Items of Front Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/
?>
<?php

$beautyandspa_fb = array();
foreach (range(1, 4) as $beautyandspa_fbxp )  {	
if ( esc_html(beautyandspa_get_option('fbxpage'.$beautyandspa_fbxp, '')) != '' ): array_push($beautyandspa_fb, esc_html(beautyandspa_get_option('fbxpage'.$beautyandspa_fbxp, '')) ); endif;
}
if ( $beautyandspa_fb ):
?>
<div id="fbox-item">
<div class="box90">
<div class="featured-boxs">
<?php
$beautyandspa_fbquery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $beautyandspa_fb ) );
if (have_posts()) : $beautyandspa_pcount = 0; while ( $beautyandspa_fbquery->have_posts()) : $beautyandspa_fbquery->the_post(); $beautyandspa_pcount++; ?>
<span class="featured-box featured-bx" >
<a href="<?php the_permalink(); ?>" target="_blank" >
<?php if ( has_post_thumbnail() ): echo '<div class="feaimage">'; the_post_thumbnail('beautyandspa-fbox'); echo '<div class="fiover"><div class="fiotext">+</div></div></div>'; else: 
echo 
'<div class="feaimage"><img class="box-image" src="'.get_template_directory_uri() . '/images/featured-image'. $beautyandspa_pcount .'.jpg" /><div class="fiover"><div class="fiotext">+</div></div></div>'; endif; ?>
<h3 class="fboxtitle"><?php the_title(); ?></h3>
</a>
<?php global $beautyandspa_excerpt_length; $beautyandspa_excerpt_length = 30; the_excerpt(); ?>
</span><!--
--><?php endwhile; endif; wp_reset_postdata(); ?>
</div> 
</div>
</div>
<div class="lsep"></div>
<?php  endif; ?>








