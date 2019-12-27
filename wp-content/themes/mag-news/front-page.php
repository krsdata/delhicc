<?php
/**
 * The front page template file.
 *
 * If the user has selected a static page for their homepage, this is what will
 * appear.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package mag_news
 * 
 */
get_header();
if ( 'posts' == get_option( 'show_on_front' ) ){ ?>
<div class="container">
	<div id="primary" class="content-area custom-col-8">
		<main id="main" class="site-main">
		<?php $archive_layout = mag_news_get_option( 'archive_layout' ); ?>	
			<div class="archieve-content <?php echo esc_attr( $archive_layout );?>">	
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						 * Include the Post-Type-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_type() );

					endwhile;

					do_action( 'mag_news_action_navigation' );

				else :

					get_template_part( 'template-parts/content', 'none' );

				endif;
				?>
			</div>	
		</main><!-- #main -->
	</div><!-- #primary -->
	<?php get_sidebar();?>
</div>
<?php }	else{ 
	$enable_home_content = mag_news_get_option( 'enable_home_content' ); 
	if ( true == $enable_home_content ): ?>
		<div class="container">
			<div id="primary" class="content-area custom-col-12 ">
				<main id="main" class="site-main">

				<?php
				while ( have_posts() ) :
					the_post();

					the_content();

				endwhile; // End of the loop.
				?>

				</main><!-- #main -->
			</div><!-- #primary -->		
		</div>
	<?php endif; ?>
<?php }
get_footer();