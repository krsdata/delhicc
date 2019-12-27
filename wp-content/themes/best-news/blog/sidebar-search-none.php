<section class="news-style1 category section off-white">
		<div class="container">
			<div class="row">

				<?php if ( have_posts() ) : 

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
					<?php
                    the_posts_pagination( array(
                        'pre_text' => __('Previous', 'best-news'),
                        'next_text' => __('Next', 'best-news'),
                    )); 
                    ?>
				</ul>
			</div>
			<!--/ End Pagination -->
		</div>
	</div>	
</div>
</section>