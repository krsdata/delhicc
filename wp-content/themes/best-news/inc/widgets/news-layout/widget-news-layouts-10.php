<?php
/**
 * Widget - News Block Layouts
 *
 * @package Best_News
 */


/*-----------------------------------------------------
		Front Page News Layout Ten Widgets
		-----------------------------------------------------*/

		if ( ! class_exists( 'Best_News_Block_Layout_Ten' ) ) :
	/**
	* News Block Layout Ten
	*/
	class Best_News_Block_Layout_Ten extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'block-layout-a',
				'description'	=> esc_html__( 'News Block Layout Ten. Place it within "Frontpage News Layouts Area"', 'best-news' )
			);

			parent::__construct( 'news-block-layout-ten', esc_html__( 'Bnews: News Block Layout 10', 'best-news' ), $opts );
		}

		function form( $instance ) {
			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : __('Layout 10','best-news');
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 3;
			$layout_enable = ! empty( $instance[ 'layout_enable' ] ) ? $instance[ 'layout_enable' ] : 'off';
			$author_1 = ! empty( $instance[ 'author_1' ] ) ? $instance[ 'author_1' ] : 0;
			$orderby = ! empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'date';
			?>

			<p>
				<input class="checkbox" type="checkbox" <?php checked( $layout_enable, 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'layout_enable' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'layout_enable' ) ); ?>" /> 
				<label for="<?php echo esc_attr($this->get_field_id( 'layout_enable' )); ?>"><?php esc_html_e('Enable/Disable News Block Layout 10', 'best-news'); ?></label>
				<br/>
				
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'best-news' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
				<br/>	
			</p>

			<p>
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
					<?php esc_html_e('Random date','best-news'); ?>
					</option> 
				</select>
			<br>
				<label for="<?php echo esc_attr( $this->get_field_id( 'cat' ) )?>"><strong><?php echo esc_html__( 'Select Category: ', 'best-news' ); ?></strong></label>
				<?php
				$cat_args = array(
					'orderby'	=> 'name',
					'hide_empty'	=> 1,
					'show_count'    => 1,
					'hierarchical'  => 1,
					'id'	=> absint($this->get_field_id( 'cat' )),
					'name'	=> esc_html($this->get_field_name( 'cat' )),
					'class'	=> 'widefat',
					'taxonomy'	=> 'category',
					'selected'	=> absint( $cat ),
					'show_option_all'	=> esc_html__( 'All category', 'best-news' )
				);
				wp_dropdown_categories( $cat_args );
				?>
				<label for="<?php echo esc_attr( $this->get_field_id( 'author_1' ) )?>"><strong><?php echo esc_html__( 'Select author', 'best-news' ); ?></strong></label>
				<br>
				<?php
		
				$author_args_1 = array(
					'show_option_all'         => __('All author ','best-news'),
					'hide_if_only_Ten_author' => null, // string
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
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'best-news' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>
			<?php
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;
			$instance[ 'title' ] = sanitize_text_field( $new_instance[ 'title' ] );
			$instance[ 'cat' ] = absint( $new_instance[ 'cat' ] );
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );
			$instance[ 'layout_enable' ] = $new_instance[ 'layout_enable' ];
			$instance[ 'orderby' ] = sanitize_text_field( $new_instance['orderby'] );
			$instance[ 'author_1' ] = absint( $new_instance[ 'author_1' ] );

			return $instance;
		}

		
		function widget( $args, $instance ) {
			$cat = ! empty( $instance[ 'cat' ] ) ? $instance[ 'cat' ] : 0;
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 3;
			$author_1 = ! empty( $instance[ 'author_1' ] ) ? $instance[ 'author_1' ] : 0;
			$orderby = ! empty( $instance[ 'orderby' ] ) ? $instance[ 'orderby' ] : 'date';
			
			$layout_enable_check = isset( $instance['layout_enable'] ) ? esc_attr( $instance['layout_enable'] ) : '';
			$layout_enable = $layout_enable_check ? 'true' : 'false';
			echo $args[ 'before_widget' ];
			if($layout_enable =='true'):
				?>
				<section class="news-style1 layout10 section off-white">
					<?php
					$arguments = array(
						'cat'	=> absint( $cat ),
						'posts_per_page' => absint( $post_no ),
						'author'	   => esc_attr( $author_1 ),
						'orderby' => array( esc_attr( $orderby ) => 'DSC', 'date' => 'DSC'),

					);
					$query = new WP_Query( $arguments );
					if( $query->have_posts() ) :
						?>
						<div class="container">
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
							<div class="row">
								<?php
									while( $query->have_posts() ) :
										$query->the_post();
										?>
                                        <!-- Single News -->
                                        <div class = "col-lg-12 mb-3">
											<div class="single-news media">
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
												<div class="content media-body">
													<div class="meta">
														<?php if(get_theme_mod('best_news_author_enable','1')==1): ?>
															<span class="author">
																<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
																<?php best_news_posted_by();?>
															</span>
														<?php endif ?>
														<?php if(get_theme_mod('best_news_postdate_enable','1')==1): ?>
															<span class="date pl-1"><i class="fa fa-clock-o"></i><?php best_news_posted_on();?></span>
														<?php endif ?>
													</div>
													<h3 class="title-medium"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
													<?php the_excerpt();?>
													<?php if(get_theme_mod('best_news_readmore_enable','1')==1): ?>
														<div class = "pt-4" >
															<?php best_news_modal(); ?>
														</div>
													<?php endif ?>
												</div>
												
											</div>
                                        </div>
										<?php endwhile ;
										wp_reset_postdata();
								
									?>
							</div>
						</div>
						<?php
					endif;?>
				</section>
				<?php
			endif;
			echo $args[ 'after_widget' ];
		}

		
	}
endif;