<?php
/**
 * @package Best_News
	=========================
			WIDGET CLASS
	=========================
 */

// Widget News Layouts
    
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/news-layout/widget-news-layouts-1.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/news-layout/widget-news-layouts-2.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/news-layout/widget-news-layouts-4.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/news-layout/widget-news-layouts-6.php';
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/news-layout/widget-news-layouts-10.php';

    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/popular-news-comments-tab.php';

 // widget Footer Layouts
    require_once trailingslashit( get_template_directory() ) . '/inc/widgets/footer-layout/widget-footer-news-layouts.php';

// Register Widget
    if ( ! function_exists( 'best_news_register_widget' ) ) {
    /**
     * Load widget.
     *
     * @since 1.0.0
     */
    function best_news_register_widget() {

        // News Block Layout One
        register_widget( 'Best_News_Block_Layout_One' );

        // News Block Layout Two
        register_widget( 'Best_News_Block_Layout_Two' );

        // News Block Layout Four
        register_widget( 'Best_News_Block_Layout_Four' );

        // News Block Layout Six
        register_widget( 'Best_News_Block_Layout_Six' );
        
        // News Block Layout Ten
        register_widget( 'Best_News_Block_Layout_Ten' );

        // Sidebar Popular News and comment widget
        register_widget( 'Best_News_Popular_News_Comments_Widget' );


        // Footer Latest News
        register_widget( 'Best_News_Footer_Latest_News' );

    }
}

add_action( 'widgets_init', 'best_news_register_widget' );