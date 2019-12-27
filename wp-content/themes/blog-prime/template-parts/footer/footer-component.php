<?php
/**
 * Template for Footer Components
 * @since blog-prime 1.0.0
 */
?>

<?php
$default = blog_prime_get_default_theme_options();
$ed_mid_header_search = absint( get_theme_mod( 'ed_mid_header_search',$default['ed_mid_header_search'] ) );

if( $ed_mid_header_search ){ ?>

    <div class="popup-search">
        <div class="popup-search-wrapper">
            <div class="popup-search-form">
                <?php get_search_form(); ?>
            </div>
        </div>
        <div class="close-popup"></div>
    </div>
    
<?php } ?>

<?php if ( is_active_sidebar('blog-prime-offcanvas-widget') ): ?>
    <div id="sidr-nav">
        <a class="sidr-offcanvas-close" href="#sidr-nav">
           <span>
               <?php echo esc_html__('Close','blog-prime'); ?>
            </span>
        </a>
        <div class="sidr-area">
            <?php dynamic_sidebar('blog-prime-offcanvas-widget'); ?>
        </div>
    </div>
<?php endif; ?>

<?php if( is_front_page() ):
    // Home Recommended Post.
    blog_prime_recommended_posts();
endif; ?>

<?php if( is_singular('post') ):
    // Single Posts Related Posts.
    blog_prime_related_posts();
endif; ?>

<div class="scroll-up">
    <i class="ion ion-md-arrow-dropup"></i>
</div>
