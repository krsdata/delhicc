<?php 

    function zigcy_cosmetics_header_type_acb( $control ) {
        $choose = get_theme_mod( 'zigcy_lite_header_type', 'layout1' );
        if( $choose == 'layout3' ){
            return true;
        }else{
            return false;
        }
    }