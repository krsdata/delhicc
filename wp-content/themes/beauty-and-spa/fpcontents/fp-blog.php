<?php 
/* 	Beauty and Spa Theme's Blog Part
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/

?>
<div class="clear"></div>
<div id="fpblog-box-item" class="box100 bqpcontainer" >
	
	<div class="box90">
    	<div class="boxtoptitle tesheading">
    	<h2><?php _e('Latest <em>Blog</em> Posts' , 'beauty-and-spa') ?></h2>
        </div>
        <div class="featured-boxs">

			<?php  $beautyandspa_fpbp_args = array( 'post_type'=> 'post', 'orderby' => 'date', 'order' => 'DESC', 'ignore_sticky_posts' => 1, 'posts_per_page'  => 6 );

			$beautyandspa_fpbp_query = new WP_Query($beautyandspa_fpbp_args);
			if (have_posts()) : while ( $beautyandspa_fpbp_query->have_posts()) :  $beautyandspa_fpbp_query->the_post(); ?><!--
			--><div class="featured-box"><a href="<?php the_permalink(); ?>" ><div class="feaimage"><div class="fpthumb"><?php if ( has_post_thumbnail() ): the_post_thumbnail('beautyandspa-fpage-thumb'); else: echo '<img src="'.esc_url(beautyandspa_get_option('dfimage', get_template_directory_uri() . '/images/fimage.jpg' )).'" width="100%" />'; endif; ?></div><div class="fiover"><div class="fiotext">+</div></div></div><h3 class="ftitle"><?php the_title(); ?></h3></a><div class="fppost-content"><?php global $beautyandspa_excerpt_length; $beautyandspa_excerpt_length=20; the_excerpt(); ?></div></div><!--

			--><?php endwhile; endif; wp_reset_postdata(); ?>
			
		</div>
	</div>
</div>
