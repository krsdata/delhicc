<?php if(get_theme_mod('best_news_hot_news_enable','1')):
	$hot_news_text = get_theme_mod('best_news_hot_news_text',__('Hot news','best-news'));
	?>
	<!-- News ticker -->
	<div class="news-ticker">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="ticker-inner">
						<!-- Ticker title -->
						<div class="ticker-title">
							<h4><i class="fa fa-bolt"></i><?php echo esc_html($hot_news_text);?></h4>
						</div>	
						<!-- End Ticker title -->
						<div class="ticker-news">
							<div class="ticker-slider">
								<?php
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => absint(get_theme_mod('best_news_slider_sidebar_number','4')),
									'category_name' => esc_attr(get_theme_mod('best_news_hot_news_category_name','')),
									'author'	   => esc_attr(get_theme_mod ('best_news_hot_news_authorlist','')),
									'orderby' => array( esc_attr(get_theme_mod('best_news_hot_news_order', 'date')) => 'DSC', 'date' => 'DSC'),
									'order'     => 'DSC',
								);

								$newsloop = new WP_Query($args);

								while ($newsloop->have_posts()) : 
									$newsloop->the_post(); 
									?>
									<div class="single-ticker">
										<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
									</div>
								<?php endwhile;
								wp_reset_postdata();
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End News ticker -->
	<?php endif;?>