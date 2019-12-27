<?php
/**
* Dynamic style file for the theme 
*/
function zigcy_cosmetics_dynamic_style(){
    
    $custom_css = "";

    /**
    * Theme color
    *
    */
    $zigcy_cosmetics_skin_color = get_theme_mod('zigcy_lite_skin_color','#ec8582');


        if( !empty( $zigcy_cosmetics_skin_color ) ){
            $custom_css .="
            .header-two.header-three .search-form-wrap form.search-form:after,
            .woocommerce li.product .sml-add-to-quickview-wrap a.add_to_cart_button:hover, 
            .woocommerce li.product .sml-add-to-quickview-wrap .yith-wcqv-button:hover
            {
                background-color: " . sanitize_hex_color($zigcy_cosmetics_skin_color) . " !important;

            }";

        }

    wp_add_inline_style( 'zigcy-cosmetics', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'zigcy_cosmetics_dynamic_style' );