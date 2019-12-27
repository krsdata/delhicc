<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package Mag_News
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses mag_news_header_style()
 */
function mag_news_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'mag_news_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'd2b177',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'mag_news_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'mag_news_custom_header_setup' );

if ( ! function_exists( 'mag_news_header_style' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see mag_news_custom_header_setup().
	 */
	function mag_news_header_style() {
		$header_text_color = get_header_textcolor();

		wp_enqueue_style( 'mag-news-style', get_stylesheet_uri() );
		
		$position = "absolute";
		$custom_css = '';
		$clip ="rect(1px, 1px, 1px, 1px)";
		if ( ! display_header_text() ) {
			$custom_css .= '.site-title, .site-description{
				position: '.$position.';
				clip: '.$clip.'; 
			}';
		} else{

			$custom_css .= '.site-title a, .site-description {
				color: #' . esc_attr($header_text_color) . ';			
			}';
		}
        $get_categories = get_terms( 'category', array( 'hide_empty' => false ) );

        foreach ( $get_categories as $category ) {

            $cat_color       = mag_news_get_option( 'mag_news_category_color_'.esc_html( strtolower($category->name) ).'' );

            $cat_hover_color = esc_attr( mag_news_hover_color( $cat_color, '-50' ) );
            $cat_id          = absint( $category->term_id );

            if ( ! empty( $cat_color ) ) {
                $custom_css .= '.cat-links.mag-news-cat-' . $cat_id . ' a {
					background: ' . esc_attr($cat_color) . ';			
				}';  
				$custom_css .= '.cat-links.mag-news-cat-' . $cat_id . ' a:hover {
					background: ' . esc_attr($cat_hover_color) . ';			
				}';				    
            }
             
        }		

		wp_add_inline_style( 'mag-news-style', $custom_css );	
	}
endif;
add_action( 'wp_enqueue_scripts', 'mag_news_header_style' );
