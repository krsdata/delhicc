<?php
/**
 * Header Template file
 *
 * @package Mag_News
 */
?>
<?php $header_image = get_header_image();
$enable_top_header_image = mag_news_get_option( 'enable_top_header_image' ); 
if ( !empty( $header_image )  && true == $enable_top_header_image ): ?>
	<!-- header starting from here -->
	<div class="header-advert-banner">
	    <img src="<?php echo esc_url( $header_image );?>" alt="<?php echo esc_attr__( 'Header Image', 'mag-news' );?>">
	</div><!--.header-advert-banner-->
<?php endif; ?>
<div class="hgroup-wrap">
    <?php $enable_top_header = mag_news_get_option( 'enable_top_header' ); 
    if ( true == $enable_top_header ) { ?>
        <div class="header-info-bar">
            <div class="container">
                <div class="row">
                    <div class="custom-col-7">
                        <?php $top_header_left = mag_news_get_option( 'top_header_left' ); 
                        if ( 'news-ticker' == $top_header_left ) {
                            do_action( 'mag_news_action_news_ticker' );
                        } elseif ( 'address' == $top_header_left ) {
                            do_action( 'mag_news_action_address' );
                        } elseif ( 'menu' == $top_header_left ) {
                            do_action( 'mag_news_action_top_menu' );
                        } elseif (  'social-icon' == $top_header_left ) {
                            do_action( 'mag_news_action_social_icon' );
                        }                      
                        ?>
                    </div>
                    <div class="custom-col-5">
                        <div class="basic-info-wrap">
                            <?php $top_header_right = mag_news_get_option( 'top_header_right' ); 
                            if ( 'news-ticker' == $top_header_right ) {
                                do_action( 'mag_news_action_news_ticker' );
                            } elseif ( 'address' == $top_header_right ) {
                                do_action( 'mag_news_action_address' );
                            } elseif ( 'menu' == $top_header_right ) {
                                do_action( 'mag_news_action_top_menu' );
                            } elseif (  'social-icon' == $top_header_right ) {
                                do_action( 'mag_news_action_social_icon' );
                            }                      
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>       

    <div class="site-header-middle">
        <div class="container ">
            <div class="row ">
                <div class="custom-col-5">
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
                <?php $advertisement_image = mag_news_get_option( 'advertisement_image' ); 
                $advertisement_image_url = mag_news_get_option( 'advertisement_image_url' ); 
                if ( !empty( $advertisement_image ) ): ?>
                    <div class="custom-col-7">
                        <div class="header-advertisement">
                            <figure>
                                <a href="<?php echo esc_url( $advertisement_image_url );?>"><img src="<?php echo esc_url( $advertisement_image );?>" alt="<?php the_title_attribute();?>"></a>
                            </figure>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="navbar" class="navbar">
        <div class="container">
            <nav id="site-navigation" class="navigation main-navigation">
                <?php
                wp_nav_menu( array(
                    'theme_location'    => 'menu-1',
                    'container_class'   => 'main-nav',
                    'fallback_cb'       => 'mag_news_primary_navigation_fallback' ,
                ) );
                ?>
            </nav><!-- main-navigation ends here -->
            <div class="search-section">
                <?php get_search_form();?>
            </div><!-- .search-section -->
        </div>
    </div><!-- navbar ends here -->
</div><!-- .hgroup-wrap ends here -->
