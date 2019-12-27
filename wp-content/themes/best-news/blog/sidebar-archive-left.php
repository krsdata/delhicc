	<section class="news-style1 category section off-white">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-12">
					<!-- Blog Sidebar -->
					<?php get_sidebar();?>
					<!--/ End Blog Sidebar -->
				</div>
				<div class="col-lg-9 col-12 ">
					<div class="row blog-head">
						<?php
						if ( have_posts() ) :

						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
								get_template_part( 'template-parts/content' );
						

						endwhile;


					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
				</div>
				
					<div class="row">
						<div class="col-12">
							<!-- Start Pagination -->
							<div class="pagination-main">
								<ul class="pagination">
									<?php best_news_pagination();?>
								</ul>
							</div>
							<!--/ End Pagination -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>