<?php
/**
 * Register Latest/Popular.
 *
 * @package mag_news
 */

function mag_news_action_latest_popular() {

  register_widget( 'mag_news_latest_popular' );
  
}
add_action( 'widgets_init', 'mag_news_action_latest_popular' );

class mag_news_latest_popular extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'news-section-small',
		  'description' => esc_html__( 'Add Widget to Display Latest/Popular Post.', 'mag-news' )
		);
		parent::__construct( 'mag_news_latest_popular',esc_html__( 'MN: Latest/Popular', 'mag-news' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
		  'number'           	=> 4, 
		  'show_post_meta'	 	=> true,
		  'show_category'	 	=> true,	
		) );

		$show_category 		= isset( $instance['show_category'] ) ? (bool) $instance['show_category'] : true;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;    
		$show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'number' )); ?>">
	    		<?php echo esc_html__( 'Choose Number', 'mag-news' );?>    		
	    	</label>

	    	<input class="tiny-text" id="<?php echo esc_attr($this->get_field_id( 'number' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number' )); ?>" type="number" step="1" min="1" value="<?php echo esc_attr($number); ?>" max="10" />
	    </p>
		<p><input class="checkbox" type="checkbox"<?php checked( $show_category ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_category' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_category' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_category' )); ?>"><?php echo esc_html__( 'Enable category', 'mag-news' ); ?></label></p> 	    
	    <p><input class="checkbox" type="checkbox"<?php checked( $show_post_meta ); ?> id="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'show_post_meta' )); ?>" />
	    <label for="<?php echo esc_attr($this->get_field_id( 'show_post_meta' )); ?>"><?php echo esc_html__( 'Enable Post Meta', 'mag-news' ); ?></label></p>   	    
    <?php
    }

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_category'] 		= (bool) $new_instance['show_category'];
		$instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta'];  	   

		return $instance;
	}

    function widget( $args, $instance ) {
    	extract( $args ); 
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4; 
        $show_category		= isset( $instance['show_category'] ) ? $instance['show_category'] : true;
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;      

        echo $before_widget; ?>	
            <div class="header-tab-button">
                <span class="tab-link current" data-tab="latest"><?php echo esc_html__( 'Latest', 'mag-news' );?></span>
                <span class="tab-link" data-tab="popular"><?php echo esc_html__( 'Popular', 'mag-news' );?></span>
            </div>         
	        <?php $latest_args = array(
	            'posts_per_page' => absint( $number ),
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'post__not_in' => get_option( 'sticky_posts' ),      
	        );
	        $the_query = new WP_Query( $latest_args ); 


	        if ($the_query->have_posts()) : $count= 0; ?>
                <div id="latest" class="latest tab-content current">
                	<?php while( $the_query->have_posts() ): $the_query->the_post();
                		$imag_class = '';
                		if ( !has_post_thumbnail() ):  
                			$imag_class = 'no-thumbnail';
            			endif; ?>
	                    <article class="featured-post post hentry category-featured <?php echo esc_attr( $imag_class ); ?>">
	                    	<?php if ( has_post_thumbnail() ): ?>
		                        <figure class="featured-post-image">
		                        	<?php the_post_thumbnail( 'mag-news-laste-popular' );?>
		                        </figure>
	                        <?php endif; ?>
	                        <div class="post-content">
	                            <?php if ( true == $show_category ):
	                            	mag_news_entry_categories(); 
	                        	endif; ?>
	                            <header class="entry-header">
	                                <h4 class="entry-title">
	                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
	                                </h4>
	                            </header>
                            <div class="entry-meta">                                
		                        <?php if ( true == $show_post_meta ):
		                        	mag_news_posted_on(); 
			                        mag_news_posted_by();
		                        endif; ?>
                            </div>
	                        </div>
	                    </article>
                    <?php endwhile;
                    wp_reset_postdata();?>
                </div>	            
            <?php endif; ?>

	        <?php $args = array(
	            'posts_per_page' => 2,
	            'post_type' => 'post',
	            'post_status' => 'publish',
	            'orderby'	  => 'comment_count',
	            'post__not_in' => get_option( 'sticky_posts' ),      
	        );

	        $the_query = new WP_Query( $args ); 

	        if ($the_query->have_posts()) : $count= 0; ?>
                <div id="popular" class="popular tab-content">
                	<?php while( $the_query->have_posts() ): $the_query->the_post();
                		$imag_class = '';
                		if ( !has_post_thumbnail() ):  
                			$imag_class = 'no-thumbnail';
            			endif; ?>
	                    <article class="featured-post post hentry category-featured <?php echo esc_attr( $imag_class );?>">
	                    	<?php if ( has_post_thumbnail() ): ?>
		                        <figure class="featured-post-image">
		                        	<?php the_post_thumbnail( 'mag-news-laste-popular' );?>
		                        </figure>
	                        <?php endif; ?>
	                        <div class="post-content">
	                            <?php if ( true == $show_category ):
	                            	mag_news_entry_categories(); 
	                        	endif; ?>
	                            <header class="entry-header">
	                                <h4 class="entry-title">
	                                    <a href="<?php the_permalink();?>"><?php the_title();?></a>
	                                </h4>
	                            </header>
                            <div class="entry-meta">                                
		                        <?php if ( true == $show_post_meta ):
		                        	mag_news_posted_on(); 
			                        mag_news_posted_by();
		                        endif; ?>
                            </div>
	                        </div>
	                    </article>
                    <?php endwhile;
                    wp_reset_postdata();?>
                </div>	            
            <?php endif; ?>
			    
        <?php echo $after_widget;

    } 

}