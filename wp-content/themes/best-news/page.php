<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Best_News
 */

get_header();
if( is_home() || ( is_front_page())):
get_template_part( 'sections/section','news-slider' ); 
endif ; ?>

<section class="news-single section">
	<div class="container">
		<div class="row">
				<?php if(get_theme_mod('best_news_blog_archive_layout_settings','right') == 'none'): ?>
				<div class="col-lg-12 col-12 text-justify">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

							endwhile; // End of the loop.
							?>
						</div>
				<?php elseif (get_theme_mod('best_news_blog_archive_layout_settings','right') == 'right'): ?>
					
					<div class="col-lg-9 col-12  text-justify">
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					</div>
					<div class="col-lg-3 col-12">
						<?php get_sidebar();?>
					</div>		
					
				<?php elseif (get_theme_mod('best_news_blog_archive_layout_settings','right') == 'left'): ?>
						<div class="col-lg-3 col-12">
							<?php get_sidebar();?>
						</div>
						<div class="col-lg-9 col-12 text-justify">
						<?php
						while ( have_posts() ) :
							the_post();

							get_template_part( 'template-parts/content', 'page' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
						endif;

							endwhile; // End of the loop.
							?>
						</div>
						
				<?php endif; ?>		
		</div>
	</div>
</section>
<?php
get_footer();
?>