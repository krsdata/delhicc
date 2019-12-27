<?php
/* 	Beauty and Spa Theme's Featured Content to show the Featured Items of Front Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/
?>
<?php  

$beautyandspa_fc = array();
foreach (range(1, 4) as $beautyandspa_fctp )  {	
if ( esc_html(beautyandspa_get_option('fctpage'.$beautyandspa_fctp, '')) != '' ): array_push($beautyandspa_fc, esc_html(beautyandspa_get_option('fctpage'.$beautyandspa_fctp, '')) ); endif;
}

if ( $beautyandspa_fc ):
?>
<div id="fcontent-item">
<div class="box90">
<div class="featured-boxs">
<?php
$beautyandspa_fcquery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $beautyandspa_fc ) );
if (have_posts()) : $beautyandspa_pcount = 0; while ( $beautyandspa_fcquery->have_posts()) : $beautyandspa_fcquery->the_post(); $beautyandspa_pcount++; ?>
<span class="featured-box featured-con <?php if ( $beautyandspa_pcount == 2 || $beautyandspa_pcount == 4 ): echo ' featured-cons'; endif;  ?>" >
<a href="<?php the_permalink(); ?>" target="_blank" >
<?php if ( has_post_thumbnail() ): the_post_thumbnail('beautyandspa-fcontent'); else: 
echo '<img class="box-icon" src="'.get_template_directory_uri() . '/images/featured-image'. $beautyandspa_pcount .'.png" />'; endif; ?>
<h3 class="featured-box2 fboxtitle"><?php the_title(); ?></h3>
</a>
<?php global $beautyandspa_excerpt_length; $beautyandspa_excerpt_length = 10; the_excerpt(); ?>
</span><!--
--><?php endwhile; endif; wp_reset_postdata(); ?>
</div> 
</div>
</div>
<br />
<div class="clear"></div>
<?php  endif; ?>