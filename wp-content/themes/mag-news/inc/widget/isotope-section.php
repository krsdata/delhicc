<?php
/**
 * Register Feaured Post Section.
 *
 * @package mag_news
 */

function mag_news_action_editor_choice() {

  register_widget( 'mag_news_editor_choice' );
  
}
add_action( 'widgets_init', 'mag_news_action_editor_choice' );

class mag_news_editor_choice extends WP_Widget{ 

	function __construct() {
		global $control_ops;
		$widget_ops = array(
		  'classname'   => 'editor-choice',
		  'description' => esc_html__( 'Add Widget to Display Tab Widget Post.', 'mag-news' )
		);
		parent::__construct( 'mag_news_editor_choice',esc_html__( 'MN: Editor Choice', 'mag-news' ), $widget_ops, $control_ops );
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 
		  'title'				=> esc_html__( 'EDITORS CHOICE', 'mag-news' ),	
		  'category'         	=> '',   
		  'latest_category'     => '', 
		  'trending_category'   => '',   
		  'number'           	=> 4, 
		  'show_post_meta'	 	=> true,	
		) );
		$title     = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : esc_html__( 'EDITOR\nS CHOICE', 'mag-news' );
		$category 			= isset( $instance['category'] ) ? absint( $instance['category'] ) : 0;
		$latest_category 	= isset( $instance['latest_category'] ) ? absint( $instance['latest_category'] ) : 0;
		$number    			= isset( $instance['number'] ) ? absint( $instance['number'] ) : 4;    
		$show_post_meta 	= isset( $instance['show_post_meta'] ) ? (bool) $instance['show_post_meta'] : true;
	?>
	    <p>
	    	<label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php echo esc_html__( 'Title:', 'mag-news' ); ?></label>
	    <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
		</p>	
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'category' ) ); ?>">
				<?php esc_html_e( 'Choose Category:', 'mag-news' ); ?>			
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
			<label for="<?php echo esc_attr( $this->get_field_id( 'latest_category' ) ); ?>">
				<?php esc_html_e( 'Latest Category:', 'mag-news' ); ?>			
			</label>

			<?php
				wp_dropdown_categories(array(
					'show_option_none' => '',
					'class' 		  => 'widefat',
					'show_option_all'  => esc_html__('From Recent Post','mag-news'),
					'name'             => esc_attr($this->get_field_name( 'latest_category' )),
					'selected'         => absint( $latest_category ),          
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
		$instance['title'] 	= sanitize_text_field( $new_instance['title'] );
		$instance['category'] 			= absint( $new_instance['category'] );
		$instance['latest_category'] 	= absint( $new_instance['latest_category'] );
		$instance['number'] 			= (int) $new_instance['number'];
		$instance['show_post_meta'] 	= (bool) $new_instance['show_post_meta'];  	   

		return $instance;
	}

    function widget( $args, $instance ) {

    	extract( $args );
    	$title = ( ! empty( $instance['title'] ) ) ? esc_html($instance['title']) : esc_html__( 'EDITOR\nS CHOICE','mag-news' ); 
    	$categories 			= array();   	
        $categories[]  		= isset( $instance[ 'category' ] ) ? $instance[ 'category' ] : 0;
        $categories[]  		= isset( $instance[ 'latest_category' ] ) ? $instance[ 'latest_category' ] : 0;
        $number 			= ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 4; 
        $show_post_meta		= isset( $instance['show_post_meta'] ) ? $instance['show_post_meta'] : true;   

        echo $before_widget; ?>		    
            <div class="header-wrapper">
	        	<?php if ( !empty( $title ) ): ?>
	                <div class="heading">
	                    <header class="entry-header">
	                        <h2 class="entry-title"><?php echo esc_html( $title );?></h2>
	                    </header>
	                </div>
                <?php endif; ?>	
                     
	            <ul class="button-group filters-button-group ">
	                <li class="active" data-filter="*"><?php echo esc_html__( 'All','mag-news');?></li>
					<?php
					if ( ! empty( $categories ) ) :
						foreach ( $categories as $category ) :
							if ( $category > 0 ){
								$term = get_term( (int) $category );						
								?>
									<li data-filter=".<?php echo esc_attr($term->slug);?>"><?php echo esc_attr( $term->name ); ?></li>
								<?php 
							} 
						endforeach;
					endif;?>   
	            </ul>
            </div>
            <div class="grid">
		        <?php $args = array(
		            'posts_per_page'=> absint( $number ),
		            'post_type' 	=> 'post',
		            'post_status' 	=> 'publish',
		            'orderby '		=> 'rand',	
		            'cat'			=> $categories,
		        );
		        $the_query = new WP_Query( $args ); 
		        if ($the_query->have_posts()) : $count= 0; 
		        	while ( $the_query->have_posts() ) : $the_query->the_post(); 
			        	$retreat_cat = get_the_terms( get_the_ID(), 'category' );			        	 
			        	    $retreat_cat_list = array();
			        	    foreach ( $retreat_cat as $term ) {
			        	        $retreat_cat_list[] = $term->slug;
			        	    }
			        	    $category_list = join( " ", $retreat_cat_list );

			        	    $image_class = '';
			        	    if ( !has_post_thumbnail() ):  
		                		$image_class = 'no-thumbnail';
	            			endif;	        	    
			        								
						?>
		                <div class="element-item <?php echo esc_attr($category_list );?>">
                            <article class="post hentry <?php echo esc_attr( $image_class );?>">
                            	<?php $image_size = 'mag-news-isotope-thumb';
                            	if ( $count % 2 == 0 ){
                            		$image_size = 'mag-news-isotope';
                            	}

                            	?>
                            	<?php if ( has_post_thumbnail() ): ?>
	                                <figure class="featured-post-image ">
	                                    <?php the_post_thumbnail( esc_attr( $image_size ) );?>
	                                </figure>
                                <?php endif; ?>
                                <div class="post-content">
                                    <?php mag_news_entry_categories();?>
                                    <header class="entry-header">
                                        <h4 class="entry-title">
                                            <a href="<?php the_permalink();?>"><?php the_title();?></a>
                                        </h4>
                                    </header>
		                            <div class="entry-meta">                                
				                        <?php if ( true == $show_post_meta ): 
					                        mag_news_posted_by();
					                        mag_news_entry_footer();
				                        endif; ?>
		                            </div>
                                </div>
                            	<?php $count++; ?>
                            </article>
		                </div>
	                <?php endwhile;
	                wp_reset_postdata();
                endif; ?>
            </div>		    
        <?php echo $after_widget;

    } 

}