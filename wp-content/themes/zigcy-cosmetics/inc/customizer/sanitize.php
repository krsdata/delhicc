<?php 
    //Header Layout
    function zigcy_cosmetics_header_sanitize( $input ) {
        $valid_keys = array(
              'layout1'     => esc_html__('Layout One', 'zigcy-cosmetics'),
              'layout2'     => esc_html__('Layout Two', 'zigcy-cosmetics'),
              'layout3'     => esc_html__('Layout Three', 'zigcy-cosmetics'),
            );
        if ( array_key_exists( $input, $valid_keys ) ) {
            return $input;
        } else {
            return '';
        }
    }

    function zigcy_cosmetics_sanitize_integer($input){
        return intval($input);
    }