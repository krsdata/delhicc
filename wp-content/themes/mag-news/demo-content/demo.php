<?php
/**
 * Functions to provide support for the One Click Demo Import plugin (wordpress.org/plugins/one-click-demo-import)
 *
 * @package Mag_News
 */

/**
* Remove branding
*/
add_filter( 'pt-ocdi/disable_pt_branding', '__return_true' );

/*Import demo data*/
if ( ! function_exists( 'mag_news_demo_import_files' ) ) :
    function mag_news_demo_import_files() {
        return array(
            array(
                'import_file_name'             => 'Mag News',                
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-content/magnews.wordpress.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-content/mag-news-default-widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/mag-news-export.dat', 
                'preview_url'                => 'https://preview.rigorousthemes.com/mag-news/default',              
            ), 
            array(
                'import_file_name'             => 'City News',                
                'local_import_file'            => trailingslashit( get_template_directory() ) . 'demo-content/city-news/citynews.wordpress.xml',
                'local_import_widget_file'     => trailingslashit( get_template_directory() ) . 'demo-content/city-news/mag-news-city-news-widgets.wie',
                'local_import_customizer_file' => trailingslashit( get_template_directory() ) . 'demo-content/city-news/mag-news-export.dat', 
                'preview_url'                => 'https://preview.rigorousthemes.com/mag-news/city-news',               
            ),                 
        ); 
    }

    add_filter( 'pt-ocdi/import_files', 'mag_news_demo_import_files' );

endif;

/**
 * Action that happen after import
 */
if ( ! function_exists( 'mag_news_after_demo_import' ) ) :
    function mag_news_after_demo_import( $selected_import ) {
            //Set Menu
            $primary_menu = get_term_by('name', 'Main Menu', 'nav_menu'); 

            $social_menu = get_term_by('name', 'Social Menu', 'nav_menu'); 

            $footer_menu = get_term_by('name', 'Footer menu', 'nav_menu'); 

            set_theme_mod( 'nav_menu_locations' , array( 

                'menu-1' => $primary_menu->term_id,
                'social-icon' => $social_menu->term_id, 
                'footer-menu' => $footer_menu->term_id, 

                ) 

            );
            //Set Front page
            $page = get_page_by_title( 'Home');
            if ( isset( $page->ID ) ) {
                update_option( 'page_on_front', $page->ID );
                update_option( 'show_on_front', 'page' );
            }    

            $blog_page  = get_page_by_title( 'Blog' );  
            if ( isset( $page->ID ) ) {    
                update_option( 'page_for_posts', $blog_page -> ID );
            }
    }

    add_action( 'pt-ocdi/after_import', 'mag_news_after_demo_import' );

endif;