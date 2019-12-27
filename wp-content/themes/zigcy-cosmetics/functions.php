<?php
/**
 * Zigcy Cosmetics functions and definitions
 *
 * @package Zigcy Cosmetics
 */

    
    add_image_size( 'zigcy-cosmetics-wide', 600, 300, true );
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on Zigcy Lite, use a find and replace
     * to change 'zigcy-cosmetics' to the name of your theme in all the template files.
     */
    load_theme_textdomain( 'zigcy-cosmetics', get_template_directory() . '/languages' );
    add_action( 'wp_footer', 'zigcy_cosmetics_register', 11 );
    function zigcy_cosmetics_register() { 
        wp_enqueue_script( 'zigcy-cosmetics', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ) );  
    }

    add_action( 'wp_loaded', 'zigcy_cosmetics_remove_hook' );
    function zigcy_cosmetics_remove_hook() { 
        remove_action( 'woocommerce_before_shop_loop_item', 'zigcy_lite_product_main_wrap', 8 );
        remove_action('woocommerce_after_shop_loop_item','zigcy_lite_product_title_wrap',25);
        remove_action('zigcy_lite_footer_copyright_fn','zigcy_lite_footer_copyright_fn');
    }
    add_action('woocommerce_before_shop_loop_item','zigcy_cosmetics_product_image_wrap',10);
    if( ! function_exists('zigcy_cosmetics_product_image_wrap') ){
        function zigcy_cosmetics_product_image_wrap(){
            echo '<div class="sml-product-image-wrapp">';?>
                <div class = "sml-add-to-wishlist-wrap">
                <?php
                    zigcy_lite_wishlist_products();
                    echo zigcy_lite_compare_url(); ?>
                </div>
                <?php
                zigcy_lite_prod_img_wrap();?>

                <div class = "sml-add-to-quickview-wrap">
                <?php
                    woocommerce_template_loop_add_to_cart();
                    zigcy_cosmetics_quickview();?>
                </div>
            </div>
            <?php
        }
    }
    add_action('woocommerce_after_shop_loop_item','zigcy_cosmetics_product_title_wrap',25);

    if( ! function_exists('zigcy_cosmetics_quickview') ){

        function zigcy_cosmetics_quickview(){
            if( ! defined( 'YITH_WCQV' ) )
                return;

            global $product;
            $quick_view = YITH_WCQV_Frontend();
            remove_action( 'woocommerce_after_shop_loop_item', array( $quick_view, 'yith_add_quick_view_button' ), 15 );
            $label = esc_html( get_option( 'yith-wcqv-button-label' ) );
            echo '<a href="#" class="link-quickview yith-wcqv-button" data-product_id="' . get_the_ID() . '">' . esc_html($label) . '</a>';
        }
    }
    //product title 
    if( ! function_exists('zigcy_cosmetics_product_title_wrap') ){
        function zigcy_cosmetics_product_title_wrap(){
            echo '<div class="sml-product-title-wrapp">';
            zigcy_lite_product_title();
            echo '<div class="sml-price-wrap">';
            woocommerce_template_loop_price();
            woocommerce_template_loop_rating();
            echo '</div>';
            echo '</div>';
        }
    }


    function zigcy_cosmetics_enqueue_styles() {

        $parent_style = 'parent-style';

        wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array(   ) );
        wp_enqueue_style( 'zigcy-cosmetics',
            get_stylesheet_directory_uri() . '/style.css',
            array( $parent_style, 'zigcy-lite-responsive' )
        );
    }
    add_action( 'wp_enqueue_scripts', 'zigcy_cosmetics_enqueue_styles', 10 );

    
    /**
     * Register widget area.
     *
     * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
     */
    function zigcy_cosmetics_widgets() {
        register_sidebar( array(
            'name'          => esc_html__( 'Homepage Sidebar', 'zigcy-cosmetics' ),
            'id'            => 'zigcy-cosmetics-sidebar',
            'description'   => esc_html__( 'Add widgets here to show on homepage.', 'zigcy-cosmetics' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );
    }
    add_action( 'widgets_init', 'zigcy_cosmetics_widgets' );

    /**
     * zigcy-cosmetics customizer
     */

    function zigcy_cosmetics_customize_register( $wp_customize ) {
        /**
        * zigcy-cosmetics-customizer
        */
        require zigcy_lite_file_directory('/inc/customizer/sanitize.php');
        require zigcy_lite_file_directory('/inc/customizer/active-callbacks.php');
        require zigcy_lite_file_directory('/inc/customizer/zigcy-cosmetics-customizer.php');
    }
    add_action( 'customize_register', 'zigcy_cosmetics_customize_register', 100 );


    require get_stylesheet_directory() . '/inc/zigcy-cosmetics-functions.php';

    //dynamic css
    require get_stylesheet_directory() . '/inc/zc-dynamic-css.php';