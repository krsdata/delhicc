<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Everest_News
 */

get_header();

$wrapper_class = everest_news_get_main_column_wapper_class();
$sticky_class = everest_news_get_sticky_class();
$sidebar_position = everest_news_sidebar_position();
?>
<div class="en-inner-pages-main-wrapper <?php echo esc_attr( $wrapper_class ); ?>">
    <div class="en-container">
        <?php
        /**
        * Hook - everest_news_breadcrumb_action.
        *
        * @hooked everest_news_breadcrumb_action - 10
        */
        do_action( 'everest_news_breadcrumb' );
        ?>
        <div class="row">
            <?php
            if( $sidebar_position == 'left' && is_active_sidebar( 'sidebar' ) ) {
                get_sidebar();
            }
            ?>
            <div class="en-col main-content-area-outer <?php echo esc_attr( $sticky_class ); ?>">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">
                    	<?php
                    	while( have_posts() ) {
                            the_post();

                            get_template_part( 'template-parts/content', 'single' );

                            everest_news_post_tags_meta();

                            /**
					        * Hook - everest_news_post_navigation.
					        *
					        * @hooked everest_news_post_navigation_action - 10
					        */
					        do_action( 'everest_news_post_navigation' );

                            get_template_part( 'template-parts/content', 'author' );

                            get_template_part( 'template-parts/content', 'related' );

                            // If comments are open or we have at least one comment, load up the comment template.
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        }
                    	?>
                    </main><!-- #main.site-main -->
                </div><!-- #primary.content-area -->
            </div><!-- .en-col main-content-area-outer -->
            <?php
            if( $sidebar_position == 'right' && is_active_sidebar( 'sidebar' ) ) {
                get_sidebar();
            }
            ?>
        </div><!-- .row -->
    </div><!-- .en-container -->
</div><!-- .en-inner-pages-main-wrapper -->
<?php
get_footer();
