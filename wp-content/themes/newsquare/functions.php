<?php
/*This file is part of NewsQuare child theme.

All functions of this file will be loaded before of parent theme functions.
Learn more at https://codex.wordpress.org/Child_Themes.

Note: this function loads the parent stylesheet before, then child theme stylesheet
(leave it in place unless you know what you are doing.)
*/

function newsquare_enqueue_child_styles() {
    $min = defined('SCRIPT_DEBUG') && SCRIPT_DEBUG ? '' : '.min';
    $parent_style = 'covernews-style';

    $fonts_url = 'https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700';
    wp_enqueue_style('newsport-google-fonts', $fonts_url, array(), null);
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/assets/bootstrap/css/bootstrap' . $min . '.css');
    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style(
        'newsquare',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'bootstrap', $parent_style ),
        wp_get_theme()->get('Version') );


}
add_action( 'wp_enqueue_scripts', 'newsquare_enqueue_child_styles' );


/**
 * slider additions.
 */
require get_stylesheet_directory().'/inc/hooks/hook-front-page-main-banner-section-3.php';



/**
 * Front-page main banner section layout
 */
if(!function_exists('newsquare_front_page_main_section_selection')){

    function newsquare_front_page_main_section_selection(){

        $hide_on_blog = covernews_get_option('disable_main_banner_on_blog_archive');

            if ($hide_on_blog) {
                if (is_front_page()) {
                    do_action('magazined_action_front_page_main_section_3');
                }

            } else {
                if (is_front_page() || is_home()) {
                    do_action('magazined_action_front_page_main_section_3');
                }

        }
    }
}
add_action('newsquare_action_front_page_main_section', 'newsquare_front_page_main_section_selection');


/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newsquare_customize_register($wp_customize) {
     $wp_customize->remove_control('editors_picks_title');
     $wp_customize->remove_control('select_editors_picks_category');     
}
add_action('customize_register', 'newsquare_customize_register', 99999 );


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function newsquare_widgets_init()
{
    
    register_sidebar(array(
        'name'          => esc_html__('Front-page Banner Ad Section', 'newsquare'),
        'id'            => 'home-advertisement-widgets',
        'description'   => esc_html__('Add widgets for frontpage banner section advertisement.', 'newsquare'),
        'before_widget' => '<div id="%1$s" class="widget covernews-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h2 class="widget-title widget-title-1"><span>',
        'after_title' => '</span></h2>',
    ));  


}

add_action('widgets_init', 'newsquare_widgets_init');


function newsquare_override_banner_advertisment_function(){
    remove_action('covernews_action_banner_advertisement', 'covernews_banner_advertisement', 10);
    remove_action('covernews_action_banner_trending_posts', 'covernews_banner_trending_posts', 10);

}

add_action('wp_loaded', 'newsquare_override_banner_advertisment_function');

/**
 * Overriding Parent theme Advertisment section
 *
 * @since NewsQuare 1.0.0
 *
 */
function newsquare_banner_advertisement()
{

    if (('' != covernews_get_option('banner_advertisement_section')) ) { ?>
        <div class="banner-promotions-wrapper">
            <?php if (('' != covernews_get_option('banner_advertisement_section'))):

                $covernews_banner_advertisement = covernews_get_option('banner_advertisement_section');
                $covernews_banner_advertisement = absint($covernews_banner_advertisement);
                $covernews_banner_advertisement = wp_get_attachment_image($covernews_banner_advertisement, 'full');
                $covernews_banner_advertisement_url = covernews_get_option('banner_advertisement_section_url');
                $covernews_banner_advertisement_url = isset($covernews_banner_advertisement_url) ? esc_url($covernews_banner_advertisement_url) : '#';
                $covernews_open_on_new_tab = covernews_get_option('banner_advertisement_open_on_new_tab');
                $covernews_open_on_new_tab = ('' != $covernews_open_on_new_tab) ? '_blank' : '';

                ?>
                <div class="promotion-section">
                    <a href="<?php echo esc_url($covernews_banner_advertisement_url); ?>" target="<?php echo esc_attr($covernews_open_on_new_tab); ?>">
                        <?php echo $covernews_banner_advertisement; ?>
                    </a>
                </div>
            <?php endif; ?>                

        </div>
        <!-- Trending line END -->
        <?php
    }

     if (is_active_sidebar('home-advertisement-widgets')): ?>
                 <div class="banner-promotions-wrapper">
                <div class="promotion-section">
                    <?php dynamic_sidebar('home-advertisement-widgets'); ?>
                </div>
            </div>
            <?php endif; 
}
add_action('covernews_action_banner_advertisement', 'newsquare_banner_advertisement', 10);


/**
     * Ticker Slider
     *
     * @since CoverNews 1.0.0
     *
     */
    function magazined_banner_trending_posts()
    {

        ?>
            <div class="banner-trending-posts-wrapper clearfix">

                <?php
                
                $covernews_trending_slider_title = covernews_get_option('trending_slider_title');
                $covernews_nav_control_class = empty($covernews_trending_slider_title) ? 'no-section-title' : '';
                $category = covernews_get_option('select_trending_news_category');                
                $all_posts = covernews_get_posts(7, $category);
                $count = 1;
                ?>
                <div class="trending-posts-carousel">
                    <?php
                    if ($all_posts->have_posts()) :
                        while ($all_posts->have_posts()) : $all_posts->the_post();
                            if (has_post_thumbnail()) {
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()));
                                $url = $thumb['0'];
                            } else {
                                $url = '';
                            }

                            global $post;
                            ?>
                            <div class="slick-item">
                                <!-- <span style="margin: 0 0 10px 0; display: block;"> -->
                                <figure class="carousel-image">
                                    <div class="no-gutter-col">
                                        <figure class="featured-article">
                                            <div class="featured-article-wrapper">
                                                <div class="data-bg data-bg-hover data-bg-hover data-bg-featured" data-background="<?php echo esc_url($url); ?>">
                                                    <a href="<?php the_permalink(); ?>"></a>
                                                </div>
                                            </div>
                                            <span class="trending-no">
                                                <?php echo sprintf( __( '%s', 'newsquare' ), $count); ?>
                                            </span>
                                            <?php //echo covernews_post_format($post->ID); ?>
                                        </figure>

                                        <figcaption>
                                            <div class="figure-categories figure-categories-bg">
                                                <?php covernews_post_categories(); ?>
                                            </div>
                                            <div class="title-heading">
                                                <h3 class="article-title">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                        </figcaption>
                                    </div>
                                    </figcaption>
                                </figure>
                                <!-- </span> -->
                            </div>
                        <?php
                        $count++;
                        endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="af-trending-navcontrols <?php echo esc_attr($covernews_nav_control_class); ?>"></div>

            </div>
            <!-- Trending line END -->
            <?php

    }
add_action('covernews_action_banner_trending_posts', 'magazined_banner_trending_posts', 10);