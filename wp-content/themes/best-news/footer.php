<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Best_News
 */

?>
    <?php if(absint(get_theme_mod('best_news_footer_slider_enable','1'))==1): ?>
	<section>	
	<div class ="container footer-slider">
			<div class="mt-5 mb-5">
			<h2 class="cat-title"><span><?php echo esc_html(get_theme_mod('best_news_footer_slider_heading',__('May be missed','best-news')));?></span></h2>

				<div class="row">

					<?php $args = array( 
					'post_type' => 'post',
					'posts_per_page' => 6,
					);
					$listings = new WP_Query( $args );
					if ( $listings->have_posts() ) :

					/* Start the Loop */
					while ( $listings->have_posts() ) :
						$listings->the_post();	
					?> <div class="col-md-2 col-lg-2 col-6 mb-2 mt-1">
						<?php
						if ( has_post_thumbnail() ) {
							best_news_thumbnail_8();
						} else if ( ! has_post_thumbnail() ) { ?>
							<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/730_487.png " >
						<?php } ?>
						</div>
					<?php endwhile;
					wp_reset_postdata();
					else :
						get_template_part( 'template-parts/content', 'none' );
					endif; ?>
			
				</div>
			</div>
		</div>
	</section>
	<?php endif; ?>
<!-- Footer Area -->
</div> <!-- skip link-->
<footer class="footer">
	<!-- Footer Top -->
	<div class="footer-top ">
		<div class="container">
			<div class="row">
				<?php if ( get_theme_mod('best_news_location_setting_text','0') == 1) { ?>
				<div class ="col-lg-3 col-md-6 col-12">
					<div class="single-footer f-contact ">
						<div class ="contact-main">
							<h3><?php echo esc_html(get_theme_mod('best_news_about_text',__('Get in touch','best-news') )) ?></p> </h3>
							
							<?php best_news_footer_contact_info_items();?>
							
							<!-- Social -->
							<ul class="social float-none mt-5">
								<?php best_news_top_footer_social_links_items();?>
							</ul>
							<!-- End Social -->
						</div>
						
					</div>
				</div>
				<?php } ?>
				<?php if ( is_active_sidebar( 'footer-1' ) ) { ?>
					<?php dynamic_sidebar( 'footer-1' );?>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- End Footer Top -->
	<!-- Copyright -->
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-12">
						<div class="copyright-content text-center">
							<p><i class="fa fa-copyright"></i>
								<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'best-news' ) ); ?>">
								<?php
								/* translators: %s: CMS name, i.e. WordPress. */
								printf( esc_html__( 'Proudly powered by %s', 'best-news' ), 'WordPress' );
								?>
								</a>
								<span class="sep "> | </span>
									<?php
									/* translators: 1: Theme name, 2: Theme author. */
									printf( esc_html__( 'Theme: %2$s by  %1$s', 'best-news' ), '<a href="https://www.postmagthemes.com" target="_blank" >Postmagthemes</a>' , '<a href="https://www.postmagthemes.com/downloads/best-news-free-newspaper-wordpress-theme/" target="_blank">Best News Free Newspaper WordPress Theme</a>' );?>
								</div>
							<p>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Copyright -->
</footer>
<!-- End Footer Area -->

<?php wp_footer(); ?>

</body>
</html>