<?php
/**
 * Register Feaured Post Section.
 *
 * @package mag_news
 */

function mag_news_action_featured_section() {

  register_widget( 'mag_news_featured_section' );
  
}
add_action( 'widgets_init', 'mag_news_action_featured_section' );

class mag_news_featured_section extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'featured-posts',
		  'description' => esc_html__( 'Add Widget to Display Featured Post.', 'mag-news' )
		);
		parent::__construct( 'mag_news_home_slider',esc_html__( 'MN: Featured Section', 'mag-news' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
		  'category'         	=> '',   
		  'featured_category'   => '',   
		  'number'           	=> 4, 
		  'show_post_meta'	 	=> true,	
		) );

		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$featured_category 	= isset( $instance['featured_category'] ) ? absint( $instance['featured_category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;    
		$show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
	?>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'mag-news' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('From Recent Post','mag-news'),
					'name'             => esc_attr($this->get_field_name( 'category' )),
					'selected'         => absint( $category ),          
				) );
			?>
		</p>

		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'featured_category' ) ); ?>">
				<?php esc_html_e( 'Select Category:', 'mag-news' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('From Recent Post','mag-news'),
					'name'             => esc_attr($this->get_field_name( 'featured_category' )),
					'selected'         => absint( $featured_category ),          
				) );
			?>
		</p>

	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number', 'mag-news' );?>    		
	    	</label>

	    	<input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="10" />
	    </p>
	    <p><input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'mag-news' ); ?></label></p>   	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['category'] 			= absint( $new_instance['category'] );
		$instance['featured_category'] 	= absint( $new_instance['featured_category'] );
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta'];  	   

		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );    	
        $category  			= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $featured_category  = isset( $instance[ 'featured_category' ] ) ? $instance[ 'featured_category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4; 
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;      

        echo $before_widget; ?>		    
	        <div class="row">
		        <?php $slider_args = array(
		            'posts_per_page' => absint( $number ),
		            'post_type' => 'post',
		            'post_status' => 'publish',
		            'post__not_in' => get_option( 'sticky_posts' ),      
		        );

		        if ( absint( $category ) > 0 ) {
		          $slider_args['cat'] = absint( $category );
		        }
		        $the_query = new WP_Query( $slider_args ); 

		        if ($the_query->have_posts()) : $count= 0; ?>
		            <div class="custom-col-8">
		                <div class="featured-post-slider single-slider owl-carousel owl-theme">
		                	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); 
		                		$imag_class = '';
		                		if ( !has_post_thumbnail() ):  
		                			$imag_class = 'no-thumbnail';
	                			endif; ?>
			                    <article class="featured-post post hentry category-featured <?php echo esc_attr( $imag_class );?>">
			                    	<?php if ( has_post_thumbnail() ): ?>
				                        <figure class="featured-post-image">
				                            <?php the_post_thumbnail( 'mag-news-featured-post' );?>
				                        </figure>
			                        <?php endif; ?>
			                        <div class="post-content">
			                            <?php mag_news_entry_categories(); ?>
			                            <header class="entry-header">
			                                <h4 class="entry-title">
			                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
			                                </h4>
			                            </header>
			                            <?php if ( true == $show_post_meta ): ?>
					                        <div class="entry-meta">
						                        <?php mag_news_posted_on();
						                        mag_news_posted_by();
						                        mag_news_entry_footer();
						                        ?>
						                    </div>
					                    <?php endif; ?>
			                    	</div>
			                    </article>
		                    <?php endwhile;
		                    wp_reset_postdata(); ?>
		                </div>
		            </div>
		        <?php endif;?>

		        <?php $args = array(
		            'posts_per_page' => 2,
		            'post_type' => 'post',
		            'post_status' => 'publish',
		            'post__not_in' => get_option( 'sticky_posts' ),      
		        );

		        if ( absint( $featured_category ) > 0 ) {
		          $args['cat'] = absint( $featured_category );
		        }
		        $the_query = new WP_Query( $args ); 

		        if ($the_query->have_posts()) : $count= 0; ?>			        
		            <div class="custom-col-4">
		                <div class="featured-post-vertical">
		                	<?php while( $the_query->have_posts() ): $the_query->the_post();?>
			                    <article class="featured-post post has-post-thumbnail hentry category-featured">
			                        <figure class="featured-post-image">
			                        	<?php the_post_thumbnail( 'mag-news-featured-post-thumb' );?>
			                        </figure>
			                        <div class="post-content">
			                        	<?php mag_news_entry_categories(); ?>
			                            <header class="entry-header">
			                                <h4 class="entry-title">
			                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
			                                </h4>
			                            </header>
			                            <?php if ( true == $show_post_meta ): ?>
					                        <div class="entry-meta">
						                        <?php mag_news_posted_on();
						                        mag_news_posted_by();      
						                        ?>
						                    </div>
					                    <?php endif; ?>
			                        </div>
			                    </article>
		                    <?php endwhile;
		                    wp_reset_postdata();?>
		                </div>
		            </div>
	            <?php endif; ?>
	        </div>		    
        <?php echo $after_widget;

    } 

}