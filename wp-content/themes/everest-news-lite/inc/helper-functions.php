<?php
/**
 * Helper functions for this theme.
 *
 * @package everest-news-lite
 */

/**
 * Funtion To Get Google Fonts
 */
if ( !function_exists( 'everest_news_lite_fonts_url' ) ) :

    /**
     * Return Font's URL.
     *
     * @since 1.0.0
     * @return string Fonts URL.
     */
    function everest_news_lite_fonts_url() {

        $fonts_url = '';
        $fonts     = array();
        $subsets   = 'latin,latin-ext';

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
        if ('off' !== _x('on', 'Poppins font: on or off', 'everest-news-lite')) {

            $fonts[] = 'Poppins:400,400i,500,500i,600,600i,700,700i';
        }

        /* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */

        if ('off' !== _x('on', 'Montserrat font: on or off', 'everest-news-lite')) {

            $fonts[] = 'Montserrat:400,400i,500,500i,600,600i,700,700i,800,800i';
        }

        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
                'subset' => urlencode( $subsets ),
            ), '//fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }

endif;

