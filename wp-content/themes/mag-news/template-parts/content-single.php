<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Mag_News
 */

?>
<?php $enable_single_image  = mag_news_get_option( 'enable_single_image' );
$enable_single_title  = mag_news_get_option( 'enable_single_title' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( true == $enable_single_image ): 
		mag_news_post_thumbnail(); 
	endif; ?>
	<div class="post-content">
		<?php if ( true == $enable_single_title ): ?>
			<header class="entry-header">
				<h4 class="entry-title">
					<?php the_title();?>
				</h4>
			</header>
		<?php endif; ?>		
        <div class="entry-content">
            <?php the_content();?>
        </div> 
	</div>	
</article><!-- #post-<?php the_ID(); ?> -->