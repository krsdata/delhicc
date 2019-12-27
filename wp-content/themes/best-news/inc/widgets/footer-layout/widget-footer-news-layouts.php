<?php
/**
 * Widget - Footer Latest News
 *
 * @package Best_News
 */


/*-----------------------------------------------------
		Footer Latest News Widgets
-----------------------------------------------------*/

		if ( ! class_exists( 'Best_News_Footer_Latest_News' ) ) :
	/**
	* NFooter Latest News Widgets
	*/
	class Best_News_Footer_Latest_News extends WP_Widget
	{

		function __construct()
		{
			$opts = array(
				'classname' => 'block-layout-a',
				'description'	=> esc_html__( 'Footer Latest News widgets. Place it within "Footer widget"', 'best-news' )
			);

			parent::__construct( 'footer-latest-news', esc_html__( 'Bnews: Footer Latest News', 'best-news' ), $opts );
		}
		function form( $instance ) {

			$title = ! empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Latest News';
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 3;
			$date_enable = ! empty( $instance[ 'date_enable' ] ) ? $instance[ 'date_enable' ] : 'off';
			?>
			<p>
				<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><strong><?php echo esc_html__( 'Title: ', 'best-news' ); ?></strong></label>
				<input type="text" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
				<br/>
				<input class="checkbox" type="checkbox" <?php checked( $date_enable, 'on' ); ?> id="<?php echo esc_attr($this->get_field_id( 'date_enable' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'date_enable' ) ); ?>" /> 
				<label for="<?php echo esc_attr($this->get_field_id( 'date_enable' )); ?>"><?php esc_html_e('Enable/Disable date to show', 'best-news'); ?></label>
				<br/>
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
			$instance[ 'post_no' ] = absint( $new_instance[ 'post_no' ] );
			$instance[ 'date_enable' ] = $new_instance[ 'date_enable' ];

			return $instance;
		}
		function widget( $args, $instance ) {
			
			$title = apply_filters( 'widget_title', ! empty( $instance['title'] ) ? $instance['title'] : '', $instance, $this->id_base );
			$post_no = ! empty( $instance[ 'post_no' ] ) ? $instance[ 'post_no' ] : 3;
			$date_enable_check = isset( $instance['date_enable'] ) ? esc_attr( $instance['date_enable'] ) : '';
			$date_enable = $date_enable_check ? 'true' : 'false';

			echo $args[ 'before_widget' ];
			?>

			<div class="single-footer latest-news">
				<?php
				echo $args[ 'before_title' ];
				?>
				<?php 

				echo esc_html( $title ); ?>
				<?php
				echo $args[ 'after_title' ];
				$the_query = new WP_Query('showposts='.$post_no.'&orderby=post_date&order=desc');

				while ($the_query->have_posts()) : $the_query->the_post(); 
					?>
					<div class="single-news">
						<?php 
						if( has_post_thumbnail() ) :
							the_post_thumbnail('best-news-thumbnail-11');
						elseif (! has_post_thumbnail()): ?>
							<img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/300_300.png " >
						<?php endif;
						?>
						<h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
						<span class="date">
							<?php if($date_enable =='true'): ?>
									<i class="far fa-clock"></i>
									<?php best_news_posted_on();?>
								<?php endif;
							?>
						</span>
					</div>
					<?php
				endwhile; ?>
			</div>
			<?php
			echo $args[ 'after_widget' ];
		}




	}
endif;