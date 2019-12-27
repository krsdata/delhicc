<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Mag_News
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section class="error-404 not-found" style="background-image: url(<?php echo esc_url( get_template_directory_uri() );?>/assets/img/404.jpg);">
				<div class="container">
						<h2 class="entry-title">
							<?php esc_html_e( '404', 'mag-news' ); ?>
						</h2>
						<h4>
							<?php esc_html_e( 'page not found', 'mag-news' ); ?>
                        </h4>
						<a class="button" href="<?php echo esc_url(home_url()); ?>">
							<?php echo esc_html__( 'BACK TO HOMEPAGE', 'mag-news' );?>
						</a>
				</div>
			</section><!-- .error-404 -->

		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_footer();
