<!-- News Slider -->
<?php if(get_theme_mod('best_news_slider_enable','1')):?>
	<section class="news-slider section">
		<div class="container">
			<div class="row">
				<div class="col-lg-9 col-12">
						<!-- News Slider -->
						<div class="main-slider">
							<div class="slider-active">
								<?php
								$args = array(
									'post_type' => 'post',
									'posts_per_page' => absint(get_theme_mod('best_news_slider_number','3')),
									'category_name' => esc_attr(get_theme_mod('best_news_slider_category_name','')),
									'author'	   => esc_attr(get_theme_mod ('best_news_news_slider_authorlist','')),
									'orderby' => array( esc_attr(get_theme_mod('best_news_news_slider_order', 'date')) => 'DSC', 'date' => 'DSC'),
									'order'     => 'DSC',
								);

								$sliderloop = new WP_Query($args);

								while ($sliderloop->have_posts()) : 
									$sliderloop->the_post(); 
									$slider_img_url = get_the_post_thumbnail_url( get_the_ID() );
									?>
									<!-- Single Slider -->
									<div class="single-slider shadow" style="background-image:url(<?php echo esc_url($slider_img_url);?>)">
										<div class="slider-content">
											<div class="slider-text">
												<?php the_category() ?>

												<div class="meta">
													<span class="author">
														<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
														<?php best_news_posted_by();?>
													</span>
													<span class="date">
														<i class="fa fa-clock-o"></i>
														<?php best_news_posted_on();?>
													</span>
												</div>
												<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
												<?php the_excerpt();?>
											</div>
										</div>	
									</div>
									<!--/ End Single Slider -->
								<?php endwhile;
								wp_reset_postdata();
								?>
							</div>
							<!-- Slider Pager -->
						</div>
						<!--/ End Tstimonial Slider -->
					
				</div>
				<div class="col-lg-3 col-12">
					<div class="special-news">
						<h4 class="title"><span><?php echo esc_html(get_theme_mod('best_news_slider_sidebar_heading',__('News special','best-news')));?></span></h4>
						<!-- Special News -->
						<?php
		
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => absint(get_theme_mod('best_news_slider_sidebar_number','5')),
							'category_name' => esc_attr(get_theme_mod('best_news_slider_sidebar_category_name','')),
							'author'	   => esc_attr(get_theme_mod ('best_news_news_slider_sidebar_authorlist','')),
							'orderby' => array( esc_attr(get_theme_mod('best_news_news_slider_sidebar_order', 'date')) => 'DSC', 'date' => 'DSC'),
							'order'     => 'DSC',
						);

						$sliderloop = new WP_Query($args);

						while ($sliderloop->have_posts()) : 
							$sliderloop->the_post(); 
							$slider_img_url = get_the_post_thumbnail_url( get_the_ID() );
							?>
							<div class="single-news">
								<?php 
								if(has_post_thumbnail()):
									the_post_thumbnail('best-news-thumbnail-12');
								
								elseif (! has_post_thumbnail()): ?>
									<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/80_80.png " >
								<?php endif; ?>
								<div class="news-content">
									<h4 class="small-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
									<div class="meta">
										<span class="date">
											<i class="fa fa-clock-o"></i>
											<?php best_news_posted_on();?>
										</span>
									</div>
								</div>
							</div>
						<?php endwhile;
						wp_reset_postdata();
						?>
					</div>
					<!--/ End Special News -->
				</div>
				
			</div>
		</div>
	</section>
<?php endif;?>
<!--/ End News Slider -->