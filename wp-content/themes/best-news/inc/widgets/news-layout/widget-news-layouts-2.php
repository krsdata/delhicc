<?php
/**
 * Widget - News Block Layouts
 *
 * @package Best_News
 */


/*-----------------------------------------------------
		Front Page News Layout Two Widgets
		-----------------------------------------------------*/

		if ( ! class_exists( 'Best_News_Block_Layout_Two' ) ) :
	/**
	* News Block Layout Two
	*/
	class Best_News_Block_Layout_Two extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'block-layout-a',
				'description'	=> esc_html__( 'News Block Layout Two. Place it within "Frontpage News Layouts Area"', 'best-news' )
			);

			parent::__construct( 'news-block-layout-two', esc_html__( 'Bnews: News Block Layout 2', 'best-news' ), $opts );
		}
		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : __('Layout 2','best-news');
			$cat_1 = ! empty( $instance[ 'cat_1' ] ) ? $instance[ 'cat_1' ] : 0;
			$cat_2 = ! empty( $instance[ 'cat_2' ] ) ? $instance[ 'cat_2' ] : 0;
			$cat_3 = ! empty( $instance[ 'cat_3' ] ) ? $instance[ 'cat_3' ] : 0;
			$cat_4 = ! empty( $instance[ 'cat_4' ] ) ? $instance[ 'cat_4' ] : 0;
			$author_1 = ! empty( $instance[ 'author_1' ] ) ? $instance[ 'author_1' ] : 0;
			$orderby = ! empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'date';
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
			$layout_enable = ! empty( $instance[ 'layout_enable' ] ) ? $instance[ 'layout_enable' ] : 'off';
			$button_enable = ! empty( $instance[ 'button_enable' ] ) ? $instance[ 'button_enable' ] : 'off';
			?>
			<p>
				<input class="checkbox" type="checkbox" <?php checked( $layout_enable, 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'layout_enable' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'layout_enable' ) ); ?>" /> 
				<label for="<?php echo esc_attr($this->get_field_id( 'layout_enable' )); ?>"><?php esc_html_e('Enable/Disable News Block Layout 2', 'best-news'); ?></label>
				<br/>
				
				<input class="checkbox" type="checkbox" <?php checked( $button_enable, 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'button_enable' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'button_enable' ) ); ?>" /> 
				<label for="<?php echo esc_attr($this->get_field_id( 'button_enable' )); ?>"><?php esc_html_e('Enable/Disable read more button to show', 'best-news'); ?></label>
				<br/>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'best-news' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
				<!-- CODE FOR ORDER BY IN LAYOUT -->
				<label><strong><?php esc_html_e( 'Select chronological order', 'best-news' ); ?></strong></label>
					<select class='widefat' id="<?php echo $this->get_field_id('orderby'); ?>"
						name="<?php echo $this->get_field_name('orderby'); ?>" type="text">
						<option value='date'<?php echo ($orderby=='date')?'selected':''; ?>>
						<?php esc_html_e('Date','best-news'); ?>
						</option>
						<option value='comment_count'<?php echo ($orderby=='comment_count')?'selected':''; ?>>
						<?php esc_html_e('Comment count','best-news'); ?>
						</option> 
						<option value='rand'<?php echo ($orderby=='rand')?'selected':''; ?>>
						<?php esc_html_e('Rand','best-news'); ?>
						</option> 
					</select>
				<br>
				<label for="<?php echo esc_attr( $this->get_field_id( 'author_1' ) )?>"><strong><?php echo esc_html__( 'Select author', 'best-news' ); ?></strong></label>
				<br>
				<?php
				$author_args_1 = array(
					'show_option_all'         => __('All author ','best-news'),
					'hide_if_only_one_author' => null, // string
					'orderby'                 => 'display_name',
					'order'                   => 'ASC',
					'include'                 => null, // string
					'exclude'                 => null, // string
					'multi'                   => false,
					'show'                    => 'display_name',
					'echo'                    => true,
					'selected'                => $author_1,
					'include_selected'        => false,
					'name'               => esc_html( $this->get_field_name('author_1') ),
					'id'                 => absint( $this->get_field_id('author_1') ),
					'class'                   => null, // string 
					'blog_id'                 => $GLOBALS['blog_id'],
					'who'                     => null, // string,
					'role'                    => null, // string|array,
					'role__in'                => null, // array    
					'role__not_in'            => null, // array 
				);
				wp_dropdown_users($author_args_1);
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_1' ) )?>"><strong><?php echo esc_html__( 'Category tabs-1:', 'best-news' ); ?></strong></label>
				<br>
				<?php
				$cat_args_1 = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 1,
					'show_count'    => 1,
					'hierarchical'  => 1,
					'id'	=> $this->get_field_id( 'cat_1' ),
					'name'	=> $this->get_field_name( 'cat_1' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $cat_1 ),
				);
				wp_dropdown_categories( $cat_args_1 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_2' ) )?>"><strong><?php echo esc_html__( 'Category tabs-2:', 'best-news' ); ?></strong></label>
				<?php
				$cat_args_2 = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 1,
					'show_count'    => 1,
					'hierarchical'  => 1,
					'id'	=> $this->get_field_id( 'cat_2' ),
					'name'	=> $this->get_field_name( 'cat_2' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $cat_2 ),
				);
				wp_dropdown_categories( $cat_args_2 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_3' ) )?>"><strong><?php echo esc_html__( 'Category tabs-3:', 'best-news' ); ?></strong></label>
				<br>
				<?php
				$cat_args_3 = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 1,
					'show_count'    => 1,
					'hierarchical'  => 1,
					'id'	=> $this->get_field_id( 'cat_3' ),
					'name'	=> $this->get_field_name( 'cat_3' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $cat_3 ),
				);
				wp_dropdown_categories( $cat_args_3 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat_4' ) )?>"><strong><?php echo esc_html__( 'Category tabs-4', 'best-news' ); ?></strong></label>
				<br>
				<?php
				$cat_args_4 = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 1,
					'show_count'    => 1,
					'hierarchical'  => 1,
					'id'	=> $this->get_field_id( 'cat_4' ),
					'name'	=> $this->get_field_name( 'cat_4' ),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $cat_4 ),
				);
				wp_dropdown_categories( $cat_args_4 );
				?>
			</p>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'best-news' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php
		}
		
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat_1' ] = absint( $new_instance[ 'cat_1' ] );
			$instance[ 'cat_2' ] = absint( $new_instance[ 'cat_2' ] );
			$instance[ 'cat_3' ] = absint( $new_instance[ 'cat_3' ] );
			$instance[ 'cat_4' ] = absint( $new_instance[ 'cat_4' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );
			$instance[ 'layout_enable' ] = $new_instance[ 'layout_enable' ];
			$instance[ 'button_enable' ] = $new_instance[ 'button_enable' ];
			$instance[ 'orderby' ] = sanitize_text_field( $new_instance['orderby'] );
			$instance[ 'author_1' ] = absint( $new_instance[ 'author_1' ] );


			return $instance;
		}

		function widget( $args, $instance ) {
			$cat_1 = ! empty( $instance[ 'cat_1' ] ) ? $instance[ 'cat_1' ] : 0;
			$cat_2 = ! empty( $instance[ 'cat_2' ] ) ? $instance[ 'cat_2' ] : 0;
			$cat_3 = ! empty( $instance[ 'cat_3' ] ) ? $instance[ 'cat_3' ] : 0;
			$cat_4 = ! empty( $instance[ 'cat_4' ] ) ? $instance[ 'cat_4' ] : 0;
			$author_1 = ! empty( $instance[ 'author_1' ] ) ? $instance[ 'author_1' ] : 0;
			$orderby = ! empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'date';
			
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 5;
			$layout_enable_check = isset( $instance['layout_enable'] ) ? esc_attr( $instance['layout_enable'] ) : '';
			$layout_enable = $layout_enable_check ? 'true' : 'false';
			$button_enable_check = isset( $instance['button_enable'] ) ? esc_attr( $instance['button_enable'] ) : '';
			$button_enable = $button_enable_check ? 'true' : 'false';
			echo $args[ 'before_widget' ];
			if($layout_enable =='true'):
			?>
			<section class="news-tabs section">
				<div class="container">
					<div class="row">
						<div class="col-lg-8">
							<div class="row">
								<div class="col-12">
									<?php
									echo $args[ 'before_title' ];
									?>
									<?php 

									echo esc_html( $title ); ?>
									<?php
									echo $args[ 'after_title' ];
									?>
								</div>
							</div>
							
							<div class="tab-main">
								<div class="nav-main">
									<!-- Tab Menu -->
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_1 ) ) ) );?>" role="tab"><i class="icofont-crown"></i><?php echo esc_html(get_cat_name( $cat_1 ));?></a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_2 ) ) ) );?>" role="tab" ><i class="icofont-dashboard-web"></i><?php echo esc_html(get_cat_name( $cat_2 ));?></a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_3 ) ) ) );?>" role="tab" ><i class="icofont-tracking"></i><?php echo esc_html(get_cat_name( $cat_3 ));?></a></li>
										<li class="nav-item"><a class="nav-link" data-toggle="tab" href="#<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_4 ) ) ) );?>" role="tab" ><i class="icofont-ui-edit"></i><?php echo esc_html(get_cat_name( $cat_4 ));?></a></li>
									</ul>
									<!--/ End Tab Menu -->
								</div>
								<div class="tab-content" id="myTabContent">
									<!-- Single Tab1 -->
									<?php
									$arg_1 = array(
										'cat'	=> absint( $cat_1 ),
										'posts_per_page' => absint( $post_no ),
										'author'	   => esc_attr( $author_1 ),
										'orderby' => array( esc_attr( $orderby ) => 'DSC', 'date' => 'DSC'),				

									);
									$query1 = new WP_Query( $arg_1 );
									if( $query1->have_posts() ) :
										?>
										<div class="tab-pane fade show active" id="<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_1 ) ) ) );?>" role="tabpanel">
											<div class="row">
												<div class="col-lg-7 col-12">
													<!-- Single News -->
													<?php
													$count = 0;
													while( $query1->have_posts() ) :
														$query1->the_post();
														if( $count == 0 ) :
															?>
															<div class="single-news main">
																<!-- News Head -->
																<?php 
																if(has_post_thumbnail()):?>
																	<div class="news-head">
																		<?php the_post_thumbnail('best-news-thumbnail-2');?>
																	</div>
																<?php elseif (! has_post_thumbnail()): ?>
																	<div class="news-head">
																		<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/477_318.png " >
																	</div>
																<?php endif;
																?>
																<h2 class="title-medium"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
																<div class="content">
																	<div class="meta">
																		<span class="author">
																			<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
																			<?php best_news_posted_by();?>																			
																		</span>
																		<span class="date"><i class="fa fa-clock-o"></i>
																			<?php best_news_posted_on();?>
																		</span>
																	</div>
																	<?php the_excerpt();?>
																	<?php if($button_enable =='true'): ?>
																		<?php best_news_modal(); ?>
																	<?php endif; ?>
																</div>
															</div>
															<!--/ End Single News -->
															<?php
														endif;
														$count = $count + 1;
													endwhile;
													wp_reset_postdata();
													?>
												</div>
												<div class="col-lg-5 col-12">
													<!-- Tab other news -->
													<div class="tab-others">
														<?php
														$count = 0;
														while( $query1->have_posts() ) :
															$query1->the_post();
															if( $count > 0 ) :?>
																<!-- Single News -->
																<div class="single-news">
																	<!-- News Head -->
																	<?php 
																	if(has_post_thumbnail()):?>
																		<div class="news-head">
																			<?php the_post_thumbnail('best-news-thumbnail-12');?>
																		</div>
																	<?php elseif (! has_post_thumbnail()): ?>
																		<div class="news-head">
																			<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/80_80.png " >
																		</div>
																	<?php endif;
																	?>
																	<!-- Content -->
																	<div class="content">
																		<h4 class="title-small"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
																		<div class="meta">
																			<span class="date">
																				<i class="fa fa-clock-o"></i><?php best_news_posted_on();?>
																			</span>
																		</div>
																	</div>
																</div>
																<!--/ End Single News -->
																<?php
															endif;
															$count = $count + 1;
														endwhile;
														wp_reset_postdata();
														?>
													</div>
													<!--/ End tab other news -->
												</div>
											</div>
										</div>
									<?php endif;?>
									<!--/ End Single Tab 1 -->
									
									<!-- Single Tab 2 -->
									<?php
									$arg_2 = array(
										'cat'	=> absint( $cat_2 ),
										'posts_per_page' => absint( $post_no ),
										'author'	   => esc_attr( $author_1 ),
										'orderby' => array( esc_attr( $orderby ) => 'DSC', 'date' => 'DSC'),

									);
									$query2 = new WP_Query( $arg_2 );
									if( $query2->have_posts() ) :
										?>
										<div class="tab-pane fade" id="<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_2 ) ) ) );?>" role="tabpanel">
											<div class="row">
												<div class="col-lg-7 col-12">
													<!-- Single News -->
													<?php
													$count = 0;
													while( $query2->have_posts() ) :
														$query2->the_post();
														if( $count == 0 ) :
															?>
															<div class="single-news main">
																<!-- News Head -->
																<?php 
																if(has_post_thumbnail()):?>
																	<div class="news-head">
																		<?php the_post_thumbnail('best-news-thumbnail-2');?>
																	</div>
																<?php elseif (! has_post_thumbnail()): ?>
																	<div class="news-head">
																		<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/477_318.png " >
																	</div>
																<?php endif;
																?>
																<h2 class="title-medium"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
																<div class="content">
																	<div class="meta">
																		<span class="author">
																			<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
																			<?php best_news_posted_by();?>																				
																		</span>
																		<span class="date"><i class="fa fa-clock-o"></i><?php best_news_posted_on();?></span>
																	</div>
																	<?php the_excerpt();?>
																	<?php if($button_enable =='true'): ?>
																		<?php best_news_modal(); ?>
																	<?php endif; ?>
																</div>
															</div>
															<!--/ End Single News -->
															<?php
														endif;
														$count = $count + 1;
													endwhile;
													wp_reset_postdata();
													?>
												</div>
												<div class="col-lg-5 col-12">
													<!-- Tab other news -->
													<div class="tab-others">
														<?php
														$count = 0;
														while( $query2->have_posts() ) :
															$query2->the_post();
															if( $count > 0 ) :?>
																<!-- Single News -->
																<div class="single-news">
																	<!-- News Head -->
																	<?php 
																	if(has_post_thumbnail()):?>
																		<div class="news-head">
																			<?php the_post_thumbnail('best-news-thumbnail-12');?>
																		</div>
																	<?php elseif (! has_post_thumbnail()): ?>
																		<div class="news-head">
																			<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/80_80.png " >
																		</div>
																	<?php endif;
																	?>
																	<!-- Content -->
																	<div class="content">
																		<h4 class="title-small"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
																		<div class="meta">
																			<span class="date">
																				<i class="fa fa-clock-o"></i><?php best_news_posted_on();?>
																			</span>
																		</div>
																	</div>
																</div>
																<!--/ End Single News -->
																<?php
															endif;
															$count = $count + 1;
														endwhile;
														wp_reset_postdata();
														?>
													</div>
													<!--/ End tab other news -->
												</div>
											</div>
										</div>
									<?php endif;?>
									<!--/ End Single Tab 2-->


									<!-- Single Tab 3 -->
									<?php
									$arg_3 = array(
										'cat'	=> absint( $cat_3 ),
										'posts_per_page' => absint( $post_no ),
										'author'	   => esc_attr( $author_1 ),
										'orderby' => array( esc_attr( $orderby ) => 'DSC', 'date' => 'DSC'),

									);
									$query3 = new WP_Query( $arg_3 );
									if( $query3->have_posts() ) :
										?>
										<div class="tab-pane fade" id="<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_3 ) ) ) );?>" role="tabpanel">
											<div class="row">
												<div class="col-lg-7 col-12">
													<!-- Single News -->
													<?php
													$count = 0;
													while( $query3->have_posts() ) :
														$query3->the_post();
														if( $count == 0 ) :
															?>
															<div class="single-news main">
																<!-- News Head -->
																<?php 
																if(has_post_thumbnail()):?>
																	<div class="news-head">
																		<?php the_post_thumbnail('best-news-thumbnail-2');?>
																	</div>
																<?php elseif (! has_post_thumbnail()): ?>
																	<div class="news-head">
																		<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/477_318.png " >
																	</div>
																<?php endif;
																?>
																<h2 class="title-medium"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
																<div class="content">
																	<div class="meta">
																		<span class="author">
																			<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
																			<?php best_news_posted_by();?>																				
																		</span>
																		<span class="date"><i class="fa fa-clock-o"></i><?php best_news_posted_on();?></span>

																	</div>
																	<?php the_excerpt();?>
																	<?php if($button_enable =='true'): ?>
																		<?php best_news_modal(); ?>
																	<?php endif; ?>
																</div>
															</div>
															<!--/ End Single News -->
															<?php
														endif;
														$count = $count + 1;
													endwhile;
													wp_reset_postdata();
													?>
												</div>
												<div class="col-lg-5 col-12">
													<!-- Tab other news -->
													<div class="tab-others">
														<?php
														$count = 0;
														while( $query3->have_posts() ) :
															$query3->the_post();
															if( $count > 0 ) :?>
																<!-- Single News -->
																<div class="single-news">
																	<!-- News Head -->
																	<?php 
																	if(has_post_thumbnail()):?>
																		<div class="news-head">
																			<?php the_post_thumbnail('best-news-thumbnail-12');?>
																		</div>
																	<?php elseif (! has_post_thumbnail()): ?>
																		<div class="news-head">
																			<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/80_80.png " >
																		</div>
																	<?php endif;
																	?>
																	<!-- Content -->
																	<div class="content">
																		<h4 class="title-small"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
																		<div class="meta">
																			<span class="date">
																				<i class="fa fa-clock-o"></i><?php best_news_posted_on();?>
																			</span>
																		</div>
																	</div>
																</div>
																<!--/ End Single News -->
																<?php
															endif;
															$count = $count + 1;
														endwhile;
														wp_reset_postdata();
														?>
													</div>
													<!--/ End tab other news -->
												</div>
											</div>
										</div>
									<?php endif;?>
									<!--/ End Single Tab 3-->

									<!-- Single Tab 4 -->
									<?php
									$arg_4 = array(
										'cat'	=> absint( $cat_4 ),
										'posts_per_page' => absint( $post_no ),
										'author'	   => esc_attr( $author_1 ),
										'orderby' => array( esc_attr( $orderby ) => 'DSC', 'date' => 'DSC'),

									);
									$query4 = new WP_Query( $arg_4 );
									if( $query4->have_posts() ) :
										?>
										<div class="tab-pane fade" id="<?php echo esc_attr( str_replace( ' ', '-', strtolower( get_cat_name( $cat_4 ) ) ) );?>" role="tabpanel">
											<div class="row">
												<div class="col-lg-7 col-12">
													<!-- Single News -->
													<?php
													$count = 0;
													while( $query4->have_posts() ) :
														$query4->the_post();
														if( $count == 0 ) :
															?>
															<div class="single-news main">
																<!-- News Head -->
																<?php 
																if(has_post_thumbnail()):?>
																	<div class="news-head">
																		<?php the_post_thumbnail('best-news-thumbnail-2');?>
																	</div>
																<?php elseif (! has_post_thumbnail()): ?>
																		<div class="news-head">
																			<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/477_318.png " >
																	</div>
																<?php endif; ?>
																
																<h2 class="title-medium"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
																<div class="content">
																	<div class="meta">
																		<span class="author">
																			<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
																			<?php best_news_posted_by();?>																				
																		</span>
																		<span class="date"><i class="fa fa-clock-o"></i><?php best_news_posted_on();?></span>

																	</div>
																	<?php the_excerpt();?>
																	<?php if($button_enable =='true'): ?>
																		<?php best_news_modal(); ?>
																	<?php endif; ?>
																</div>
															</div>
															<!--/ End Single News -->
															<?php
														endif;
														$count = $count + 1;
													endwhile;
													wp_reset_postdata();
													?>
												</div>
												<div class="col-lg-5 col-12">
													<!-- Tab other news -->
													<div class="tab-others">
														<?php
														$count = 0;
														while( $query4->have_posts() ) :
															$query4->the_post();
															if( $count > 0 ) :?>
																<!-- Single News -->
																<div class="single-news">
																	<!-- News Head -->
																	<?php 
																	if(has_post_thumbnail()):?>
																		<div class="news-head">
																			<?php the_post_thumbnail('best-news-thumbnail-12');?>
																		</div>
																	<?php elseif (! has_post_thumbnail()): ?>
																		<div class="news-head">
																			<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/80_80.png " >
																		</div>
																	<?php endif;
																	?>
																	<!-- Content -->
																	<div class="content">
																		<h4 class="title-small"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
																		<div class="meta">
																			<span class="date">
																			
																			<i class="fa fa-clock-o"></i><?php best_news_posted_on();?>
																			
																			</span>
																		</div>
																	</div>
																</div>
																<!--/ End Single News -->
																<?php
															endif;
															$count = $count + 1;
														endwhile;
														wp_reset_postdata();
														?>
													</div>
													<!--/ End tab other news -->
												</div>
											</div>
										</div>
									<?php endif;?>
									<!--/ End Single Tab 4-->

								</div>
							</div>
						</div>
						<div class="col-lg-4">
							<div class="row">
								<div class="col-12 sidebar-image pt-4">
									<?php if ( is_active_sidebar( 'news-layout-2-sidebar' ) ) { ?>
										<?php dynamic_sidebar( 'news-layout-2-sidebar' );?>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<?php
			endif;
			echo $args[ 'after_widget' ];
		}

		
	}
endif;