<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mag_News
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php mag_news_post_thumbnail(); ?>
	<div class="post-content">
		<header class="entry-header">
			<h4 class="entry-title">
				<a href="<?php the_permalink();?>"><?php the_title();?></a>
			</h4>
		</header>
        <?php $excerpt = mag_news_the_excerpt( 30 );                        	
		if ( !empty( $excerpt) ): ?>
            <div class="entry-content">
                <?php echo wp_kses_post( wpautop( $excerpt ) ); ?>
            </div>  
        <?php endif;?> 
		<div class="entry-meta">
			<?php $enable_author 	= mag_news_get_option( 'enable_author' );
			$enable_posted_on 		= mag_news_get_option( 'enable_posted_on' );			
			$enable_coment_count 	= mag_news_get_option( 'enable_coment_count' );
			if ( true == $enable_posted_on ){
				mag_news_posted_on();
			}
			if ( true == $enable_author ){
				mag_news_posted_by();
			}
			?>			
			
			<?php $archive_layout = mag_news_get_option( 'archive_layout' );
			if ( 'list' == $archive_layout ){
				if ( true == $enable_coment_count ) {
					mag_news_entry_footer();
				}
			} ?>
		</div>
	</div>	
</article><!-- #post-<?php the_ID(); ?> -->
