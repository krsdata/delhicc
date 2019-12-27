<?php
if( !class_exists('Best_News_Popular_News_Comments_Widget')){
	class Best_News_Popular_News_Comments_Widget extends WP_Widget{
	//setup the widget name, description, etc....
		public function __construct(){
			$widget_ops=array(
				'classname'	=>	'best-news-popular-news-comment-widget',
				'description'	=>	__('Tab Popular news & Comments Widget','best-news'),
			);

			parent::__construct( 'best_news_popular_news_comment','Bnews:Popular news & Comments Widget Place it within "Sidebar"', $widget_ops );
		}

		function form( $instance ) {
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 4;
			$comment_no = ! empty( $instance[ 'comment_no' ] ) ? $instance[ 'comment_no' ] : 4;
			?>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'post_no' ) )?>"><strong><?php echo esc_html__( 'Post No: ', 'best-news' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'post_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'post_no' ) ); ?>" value="<?php echo esc_attr( $post_no ); ?>" class="widefat">
			</p>

			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'comment_no' ) )?>"><strong><?php echo esc_html__( 'Comments No: ', 'best-news' )?></strong></label>
				<input type="number" id="<?php echo esc_attr( $this->get_field_id( 'comment_no' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'comment_no' ) ); ?>" value="<?php echo esc_attr( $comment_no ); ?>" class="widefat">
			</p>
			<?php
		}
		function update( $new_instance, $old_instance ) {
			$instance = $old_instance;

			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );
			$instance[ 'comment_no' ] = absint( $new_instance[ 'comment_no' ] );

			return $instance;
		}
		public function widget( $args, $instance){
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 4;
			$comment_no = ! empty( $instance[ 'comment_no' ] ) ? $instance[ 'comment_no' ] : 4;
			?>
			<div class="post-tab mb-4">
				<!-- Tab Nav -->
				<ul class="nav nav-tabs" id="myTab" role="tablist">
					<li class="nav-item popular"><a class="nav-link active" data-toggle="tab" href="#popular" role="tab"><i class="fa fa-trophy"></i><?php esc_html_e( 'Popular News', 'best-news' );?></a></li>
					<li class="nav-item comments"><a class="nav-link" data-toggle="tab" href="#comments" role="tab"><i class="fa fa-comment-o"></i><?php esc_html_e( 'Comments', 'best-news' );?></a></li>
				</ul>
				<!--/ End Tab Nav -->
				<div class="tab-content" id="myTabContent">
					<!-- Recent Posts -->
					<div class="tab-pane active show fade" id="popular" role="tabpanel">
						<!-- Single Post -->
						<?php /*Method to load latest posts*/

						$arguments = array(
							'post_type'			=> 'post',
							'posts_per_page'	=> $post_no,
							'orderby'       => 'comment_count',
							'order'				=> 'DESC'
						); 
						$query = new WP_Query( $arguments );
						if( $query->have_posts() ) :
							while( $query->have_posts() ) :
								$query->the_post();
								?>
								<div class="single-post">
									<div class="post-img">
									<?php 
									if( has_post_thumbnail() ) :
										the_post_thumbnail('best-news-thumbnail-11');
										elseif (! has_post_thumbnail()): ?>
											<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/300_300.png " >
									<?php endif;
									?>
									</div>
									<div class="post-info">
										<h4><a title="<?php the_title(); ?>" href="<?php the_permalink() ?>"><?php the_title(); ?></a></h4>
										<div class="meta"><span class="date"><i class="fa fa-clock-o"></i><?php echo esc_html(get_the_date( 'F j, Y')); ?></span></div>
										
									</div>
								</div>
								<?php
							endwhile;
							wp_reset_postdata();
						endif;
						?>
						<!--/ End Single Post -->
					</div>
					<!--/ End Recent Posts -->
					<!-- Comments -->
					<div class="tab-pane custom-widget-comments" id="comments" role="tabpanel">
						<!-- Single Comments -->
						<?php /*Method to load latest posts*/

						// Arguments for the query
						$args = array(
							'post_type' => 'post',
							'number' => $comment_no
						);

						// The comment query
						$comments_query = new WP_Comment_Query;
						$comments = $comments_query->query( $args );

						// The comment loop
						if ( !empty( $comments ) ) {
							foreach ( $comments as $comment ) {?>
								<div class="single-post">
									<div class="post-img">
									<?php echo get_avatar( get_the_author_meta('ID'), 100); ?>
									</div>
									<div class="post-info">
										<p><?php echo esc_html( $comment->comment_author );?> <?php esc_html_e( 'Says', 'best-news' );?> </p>
										<h4><a href="<?php echo esc_url( $comment->comment_author  );?>"><?php echo $comment->comment_content ;?></a></h4>
									</div>
								</div>
							<?php }
						}
						?>
						<!--/ End Single Comments -->
					</div>
					<!--/ End Comments -->
				</div>
			</div><!--/ End Post Tab -->
		<?php	}

	}
}

