<?php
/**
 * Custom theme functions.
 *
 * This file contains hook functions attached to theme hooks.
 *
 * @package Mag_News
 */

if ( ! function_exists( 'mag_news_header' ) ) :
	/**
	 * Header Section
 	 *
	 * @since 1.0.0
	 */
	function mag_news_header() {
		$enable_header_absolute = mag_news_get_option( 'enable_header_absolute' ); 	    
	    if ( true == $enable_header_absolute ){
	        if ( ! is_front_page() ){
	            get_template_part( 'template-parts/header/header', 'absolute' );
	        } else{
	        	get_template_part( 'template-parts/header/header', 'style-1' );
	        }
	    } else{
	    	get_template_part( 'template-parts/header/header', 'style-1' );
	    }
    }
endif;
add_action( 'mag_news_action_header', 'mag_news_header', 10 );

if ( ! function_exists( 'mag_news_featured_slider' ) ) :
	/**
	 * Featured Post
 	 *
	 * @since 1.0.0
	 */
function mag_news_featured_slider() {
	?>
	<?php if ( is_front_page() && ! is_home() ) { ?>
		<div class="container home-page-content-wrapper">
			<?php 	 
			dynamic_sidebar( 'featured-post' );
			?>
	        <div class="row">
	            <div class="custom-col-8 home-content">
	               <?php dynamic_sidebar( 'after-featured-post' ); ?>
	            </div>
	            <div class="custom-col-4 home-sidebar">
	                <?php dynamic_sidebar( 'beside-featured-post' ); ?>
	            </div>
            </div>	
            <?php dynamic_sidebar( 'top-content-area' );?>
            <div class="row">
                <div class="custom-col-4 home-sidebar">
                	<?php dynamic_sidebar( 'aside-content-area' ); ?>
                </div>
                <div class="custom-col-8 home-content">
                	<?php dynamic_sidebar( 'middle-content-area' ); ?>
                </div>
            </div>
            <?php dynamic_sidebar( 'bottom-content-area' ); ?>
		</div> 
	<?php } ?>
<?php }
endif;
add_action( 'mag_news_action_header', 'mag_news_featured_slider', 15 );

if ( ! function_exists( 'mag_news_footer_widgets' ) ) :
	/**
	 * Footer Widget
 	 *
	 * @since 1.0.0
	 */
function mag_news_footer_widgets() {	
	get_template_part( 'template-parts/footer/footer', 'style-1' );	
}
endif;
add_action( 'mag_news_action_footer', 'mag_news_footer_widgets', 10 );

if ( ! function_exists( 'mag_news_copyright' ) ) :
	/**
	 * Copy Right
 	 *
	 * @since 1.0.0
	 */
function mag_news_copyright() {
	?>
    <div class="site-generator">
        <div class="container">
            <div class="row">
            	<?php $copyright_footer = mag_news_get_option( 'copyright_text' );
            	// Powered by content.
				$powered_by_text = sprintf( __( 'Theme of %s', 'mag-news' ), '<a target="_blank" rel="designer" href="https://rigorousthemes.com/">Rigorous Themes</a>' );  
            	if ( !empty( $copyright_footer ) || !empty( $powered_by_text ) ) : ?>
	                <div class="custom-col-6">
	                    <div class="copy-right">
	                        <?php echo wp_kses_post($powered_by_text);?> <?php echo wp_kses_data( $copyright_footer ); ?>
	                    </div>
	                </div>
                <?php endif; ?>
                <div class="custom-col-6">
                    <div class="footer-menu">
	                    <?php 
						wp_nav_menu( array(
							'theme_location' => 'footer-menu',
							'depth'          => 1,
							'fallback_cb'    => false,
						) );
						?>  
                    </div>
                </div>
            </div>
        </div>
    </div>	
	<?php 
}
endif;
add_action( 'mag_news_action_footer', 'mag_news_copyright', 15 );

if ( ! function_exists( 'mag_news_news_ticker' ) ) :
	/**
	 * Header News Ticker
 	 *
	 * @since 1.0.0
	 */
	function mag_news_news_ticker() {	
	$news_ticker_title 		= mag_news_get_option( 'news_ticker_title' ); 
	$news_ticker_category 	= mag_news_get_option( 'news_ticker_category' );	
	?>	
    <div class="notification-bar">    	
    	<?php if ( !empty( $news_ticker_title ) ): ?>
        	<span class="notice-info-title">
		    	<?php if ( !empty( $news_ticker_icon ) ): ?>
		    		<span class="notice-info-icon">
		    			<i class="<?php echo esc_attr( $news_ticker_icon );?>"></i>
		    		</span>
				<?php endif;?>
        		<?php echo esc_html( $news_ticker_title );?>        			
    		</span>
    	<?php endif; ?>
    	<?php $args = array(
    		'post_status' =>'publish',
    		'post_type' => 'post',
    		'posts_per_page' => 4,
		); 

		if ( absint( $news_ticker_category ) > 0 ) {
			$args[ 'cat'] = absint( $news_ticker_category );
		}    	

    	$the_loop = new WP_Query( $args);
    	
    	if ( $the_loop->have_posts() ): ?>
	        <ul class="notice-info">
	        	<?php while( $the_loop->have_posts() ): $the_loop->the_post();?>
		            <li class="info-item"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>		           
	            <?php endwhile;
	            wp_reset_postdata();?>
	        </ul>
        <?php endif;?>
    </div><!--.notification-bar-->
	<?php 
	}
endif;
add_action( 'mag_news_action_news_ticker', 'mag_news_news_ticker' );

if ( ! function_exists( 'mag_news_address' ) ) :
	/**
	 * Header Address
 	 *
	 * @since 1.0.0
	 */
	function mag_news_address() {
	$header_address  		= mag_news_get_option( 'header_address' ); 
	?>	
    <div class="basic-info">
        <div class="location"><?php echo esc_attr( $header_address );?></div>
        <div class="time"><?php echo date_i18n( get_option( 'date_format' ) );?></div>        
    </div>
	<?php 
	}
endif;
add_action( 'mag_news_action_address', 'mag_news_address' );

if ( ! function_exists( 'mag_news_top_menu' ) ) :
	/**
	 * Header Top Menu
 	 *
	 * @since 1.0.0
	 */
	function mag_news_top_menu() {
	?>
		<div class="top-header-menu">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'top-menu',
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
			?>
		</div>
	<?php 		
	}
endif;
add_action( 'mag_news_action_top_menu', 'mag_news_top_menu' );

if ( ! function_exists( 'mag_news_social_icon' ) ) :
	/**
	 * Header Top Menu
 	 *
	 * @since 1.0.0
	 */
	function mag_news_social_icon() {
	?>
		<div class="social-links">
			<?php
			wp_nav_menu( array(
				'theme_location' => 'social-icon',
				'depth'          => 1,
				'fallback_cb'    => false,
			) );
			?>
		</div>
	<?php }
endif;
add_action( 'mag_news_action_social_icon', 'mag_news_social_icon' );