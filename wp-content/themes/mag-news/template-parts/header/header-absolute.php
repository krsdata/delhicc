<?php
/**
 * Header Template file
 *
 * @package Mag_News
 */
?>

<div class="hgroup-wrap">

    <div class="container">
        <div class="row">
            <div class="custom-col-3">
                <section class="site-branding">
                    <?php $site_identity  = mag_news_get_option( 'site_identity' );
                    if ( in_array( $site_identity, array( 'logo-only', 'logo-text','logo-title' ) )  ) { ?>
                        <div class="site-logo">
                            <?php the_custom_logo(); ?> 
                        </div>
                    <?php } ?>

                    <?php if ( in_array( $site_identity, array( 'title-text', 'title-only', 'logo-text','logo-title' ) ) ) : ?>
                        <?php
                        if( in_array( $site_identity, array( 'title-text', 'title-only','logo-title' ) )  ) {
                            if ( is_front_page() && is_home() ) : ?>
                                <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                            <?php else : ?>
                                <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                            <?php
                            endif;
                        } 
                        if ( in_array( $site_identity, array( 'title-text', 'logo-text' ) ) ) {
                            $description = get_bloginfo( 'description', 'display' );
                            if ( $description || is_customize_preview() ) : ?>
                                <p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                            <?php
                            endif; 
                        }?>
                    <?php endif; ?>
                </section><!-- .site-branding --> 
            </div>
            <div class="custom-col-9">
                <div id="navbar" class="navbar">
                    <nav id="site-navigation" class="navigation main-navigation">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'menu-1',
                            'container_class'        => 'main-nav',
                            'fallback_cb' => 'mag_news_primary_navigation_fallback' ,
                        ) );
                        ?>
                    </nav><!-- main-navigation ends here -->
                    <div class="search-section">
                        <?php get_search_form();?>
                    </div><!-- .search-section -->
                </div><!-- navbar ends here -->
            </div>
        </div>
    </div><!--.container-->  
</div><!-- .hgroup-wrap ends here -->
<?php mag_news_header_image(); ?>

