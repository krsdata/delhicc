<?php
/**
 * Load basic function.
 *
 * @package Mag_News
 */

if( ! function_exists( 'mag_news_primary_navigation_fallback' ) ) :

    /**
     * Fallback for primary navigation.
     */
    function mag_news_primary_navigation_fallback() {
        echo '<ul>';
        echo '<li><a href="' . esc_url( home_url( '/' ) ) . '">' . esc_html__( 'Home', 'mag-news' ). '</a></li>';
        wp_list_pages( array(
            'title_li' => '',
            'depth'    => 1,
            'number'   => 5,
        ) );
        echo '</ul>';

    }

endif;

/*------------------------------------------------------------------------------------------------*/
/**
 * Generate darker color
 * Source: http://stackoverflow.com/questions/3512311/how-to-generate-lighter-darker-color-with-php
 */
if ( ! function_exists( 'mag_news_hover_color' ) ) :
    function mag_news_hover_color( $hex, $steps ) {
        // Steps should be between -255 and 255. Negative = darker, positive = lighter
        $steps = max( - 255, min( 255, $steps ) );

        // Normalize into a six character long hex string
        $hex = str_replace( '#', '', $hex );
        if ( strlen( $hex ) == 3 ) {
            $hex = str_repeat( substr( $hex, 0, 1 ), 2 ) . str_repeat( substr( $hex, 1, 1 ), 2 ) . str_repeat( substr( $hex, 2, 1 ), 2 );
        }

        // Split into three parts: R, G and B
        $color_parts = str_split( $hex, 2 );
        $return      = '#';

        foreach ( $color_parts as $color ) {
            $color = hexdec( $color ); // Convert to decimal
            $color = max( 0, min( 255, $color + $steps ) ); // Adjust color
            $return .= str_pad( dechex( $color ), 2, '0', STR_PAD_LEFT ); // Make two char hex code
        }

        return $return;
    }
endif;

if ( ! function_exists( 'mag_news_fonts_url' ) ) :

    /**
     * Return fonts URL.
     *
     * @since 1.0.0
     * @return string Font URL.
     */
    function mag_news_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Roboto, translate this to 'off'. Do not translate into your own language. */
        if ( 'off' !== _x( 'on', 'Montserrat: on or off', 'mag-news' ) ) {
            $fonts[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), 'https://fonts.googleapis.com/css' );
        }

        return $fonts_url;

    }

endif;

/**
 *  Mag News Breadcrumb
 *
 */
if ( ! function_exists( 'mag_news_breadcrumb' ) ) :

    /**
     * Simple breadcrumb.
     *
     * @since 1.0.0
     *
     * @link: https://gist.github.com/melissacabral/4032941
     *
     * @param  array $args Arguments
     */
    function mag_news_breadcrumb( $args = array() ) {

        if ( ! function_exists( 'breadcrumb_trail' ) ) {
            require_once get_template_directory() . '/inc/breadcrumbs.php';
        }

/*        $enable_breadcrumb = mag_news_get_option('enable_breadcrumb');

        if( false == $enable_breadcrumb ){
            return;
        }*/

        $breadcrumb_args = array(
            'container'   => 'div',
            'show_browse' => false,
        );
        breadcrumb_trail( $breadcrumb_args );
       
    }

endif;

if ( ! function_exists( 'mag_news_header_image' ) ) :
    /**
     * Header Image codes
     *
     * @since mag_news 1.0.0
     *
     */
    function mag_news_header_image() {

        $header_image = mag_news_get_option( 'header_image' );     

        $image = get_header_image();
        if ( 'post-thumbnail' == $header_image  ){
            if ( is_singular() ) :               
                $image = ( has_post_thumbnail() ) ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : $image;
            endif;
        } else{
            
            $image = ! empty( $image ) ? get_header_image() : '';
        }
        
        if ( 'none' == $header_image ){ ?>
            <div class="page-title-wrap"></div>
        <?php } else { ?>
            <div class="page-title-wrap" style="background-image:url( <?php echo esc_attr( $image );?> );">
                <div class="container">
                    <?php mag_news_custom_header_banner_title();?>
                </div>
            </div>
        <?php } 
    }
endif;

/**
 * Display custom header title in frontpage and blog
 */
function mag_news_custom_header_banner_title() {
    $enable_header_title    = mag_news_get_option( 'enable_header_title' );  
    $enable_header_meta = mag_news_get_option( 'enable_header_meta' ); 
    if ( false == $enable_header_title ){
        return;
    } 
    if ( is_front_page() && is_home() ) : 
        if ( 'posts' == get_option( 'show_on_front' ) ){
            $title = esc_html_e( 'Blog', 'mag-news' ); ?>
            <h2 class="page-title"><?php echo esc_html( $title ); ?></h2>
        <?php } ?>
    <?php elseif ( (! is_front_page() && is_home() ) || is_singular() ): ?>
        <h2 class="page-title"><?php single_post_title(); ?></h2>
        <?php if ( true == $enable_header_meta ):?>
            <div class="entry-meta">
                <?php mag_news_posted_on();
                    mag_news_posted_by();                
                ?>
            </div>
        <?php endif; ?>
    <?php elseif ( is_archive() ) : 
        the_archive_title( '<h2 class="page-title">', '</h2>' );
    elseif ( is_search() ) : ?>
        <h2 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'mag-news' ), get_search_query() ); ?></h2>
    <?php elseif ( is_404() ) :
        echo '<h2 class="page-title">' . esc_html__( 'Oops! That page can&#39;t be found.', 'mag-news' ) . '</h2>';
    endif;
}

if ( ! function_exists( 'mag_news_navigation' ) ) :

    /**
     * Posts navigation.
     *
     * @since 1.0.0
     */
    function mag_news_navigation() {

        $pagination_option = mag_news_get_option( 'pagination_option' );        

        if ( 'default' == $pagination_option) {

            the_posts_navigation(); 

        } else{

            the_posts_pagination( array(
                'mid_size' => 5,
                'prev_text' => esc_html__( ' ', 'mag-news' ),
                'next_text' => esc_html__( ' ', 'mag-news' ),
            ) );
        }

    }
endif;

add_action( 'mag_news_action_navigation', 'mag_news_navigation' );

if ( ! function_exists( 'mag_news_posted_description' ) ) :
    /**
     *  Author Desc
     */
    function mag_news_posted_description() {
        $enable_single_author = mag_news_get_option('enable_single_author');
        if ( false == $enable_single_author)  {
            return;
        }

        $byline = sprintf(
            /* translators: %s: post author. */
            esc_html_x( 'VIEW ALL POSTS BY %s', 'post author', 'mag-news' ),
            '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
        );      

    ?>

        <aside class="widget widget-post-author">
            <figure class="avatar"><?php echo wp_kses_post( get_avatar(get_the_author_meta( 'ID' ) ) )?></figure>
            <div class="author-details">
                <h3><?php echo esc_html( get_the_author() ) ?></h3>
                <p><?php echo wp_kses_post(get_the_author_meta( 'description', get_the_author_meta( 'ID' ) ) )?></p>
                <div class="author-info-wrap">
                    <div class="author-info">
                        <?php echo wp_kses_post( $byline ); ?>
                    </div>
                </div>
            </div>
        </aside> 
    <?php }
endif;