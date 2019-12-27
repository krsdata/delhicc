<?php

/* 	Beauty and Spa Theme's Post Content
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/
?>

<div class="content">

<?php if (is_archive()) : $post = $posts[0]; ?>
		<h1 class="page-title"><?php the_archive_title(); ?></h1>
		<div class="description"><?php echo the_archive_description(); ?></div>
		<div class="clear">&nbsp;</div>
<?php endif; ?>

<?php if (is_search()) : global $wp_query; $beautyandspa_numposts = $wp_query->found_posts; ?>
		<div class="searchinfo">
        <h1 class="page-title fa-search-plus"><?php  _e('SEARCH RESULTS','beauty-and-spa'); ?></h1>
		<h3 class="arc-src"><span><?php  _e('Search Term', 'beauty-and-spa'); ?>: </span><?php the_search_query(); ?></h3>
		<h3 class="arc-src"><span><?php _e('Number of Results', 'beauty-and-spa'); ?>: </span><?php echo $beautyandspa_numposts; ?></h3><br />
        </div>
        <div class="clear">&nbsp;</div>
<?php endif; ?>

          
	<?php if ( have_posts() ): while ( have_posts() ) : the_post(); ?>
    
	<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    
    	<div class="post-container">
        
			<?php if ( is_single() || is_page() ): ?><div class="fpthumb"><?php the_post_thumbnail('beautyandspa-fpage-thumb'); ?></div> <?php else: ?> <a href="<?php the_permalink(); ?>"><div class="feaimage"><div class="fpthumb"><?php if ( has_post_thumbnail() ): the_post_thumbnail('beautyandspa-fpage-thumb'); else: echo '<img src="'.esc_url(beautyandspa_get_option('dfimage', get_template_directory_uri() . '/images/fimage.jpg' )).'" width="100%" />'; endif; ?></div><div class="fiover"><div class="fiotext">+</div></div></div></a> <?php endif; ?>
        	<div class="entrytext">
            	<?php if ( is_single() || is_page() ): ?><h1 class="page-title"><?php the_title(); ?></h1><?php else: ?><a href="<?php the_permalink(); ?>"><h2 class="post-title"><?php the_title(); ?></h2></a><?php endif; ?>
        		<div class="clear"> </div>
				<?php beautyandspa_content(); ?>
        	
            <?php beautyandspa_author_bio(); ?>
            </div>
            
            
            
        	<div class="clear"> </div>
            	<?php if ( !is_page() ): ?>
        		<div class="up-bottom-border">
            	<?php  wp_link_pages( array( 'before' => '<div class="page-link fa-arrow-circle-right"><span>' . '' . '</span>', 'after' => '</div><br/>' ) ); 
            	beautyandspa_post_meta();
				if ( is_single() ): ?>
            	<div class="content-ver-sep"> </div>
            	<div class="floatleft postnav"><?php next_post_link('<span class="fa-arrow-left"></span> %link'); ?></div>
 				<div class="floatright postnav"><?php previous_post_link('%link <span class="fa-arrow-right"></span>'); ?></div><br /><br />
             	<?php if ( is_attachment() ): ?>
            	<div class="floatleft postnav"><?php previous_image_link( false, '<span class="fa-arrow-left"></span> ' . __('Previous','beauty-and-spa') ); ?></div>
				<div class="floatright postnav"><?php next_image_link( false,  __('Next','beauty-and-spa') . ' <span class="fa-arrow-right"></span>' ); ?></div> 
           		<?php endif; endif; ?>
			</div>
            <?php endif; ?>
            
		</div>
    </div>
	<?php endwhile; ?>
	<!-- End the Loop. -->          
        	
		<?php 
		if ( is_page() ): echo '<span class="post-edit"> '.edit_post_link(__(' Edit','beauty-and-spa'),' <span class="fa fa-edit">','</span>' ) .'</span>';  comments_template('', true); endif;
		if ( is_single() ): comments_template('', true); endif;
		
		beautyandspa_page_nav(); ?>
        
 	<?php else: ?>
 
 		<?php beautyandspa_not_found(); ?>
 
	<?php endif; ?>
          	            
            
</div>		
