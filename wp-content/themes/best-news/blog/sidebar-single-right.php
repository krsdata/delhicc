<section class="news-single section news-style1 category off-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-9 col-12">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'single' );
					get_template_part( 'inc/related-post' );
					get_template_part( 'inc/author-section' );
					the_post_navigation();?>
					<div class="row">
						<div class="col-12">
							<div class="comments-form">
								<?php 
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
							endif;?>
						</div>
					</div>
				</div>
				

				<?php endwhile; // End of the loop.
				?>
			</div>
			<div class="col-lg-3 col-12">
				<?php get_sidebar();?>
			</div>
		</div>
	</div>
</section>