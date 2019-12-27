<?php
/* 	Beauty and Spa Theme's Header
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

  
      <div id ="header">
      <div id ="header-content">
		<!-- Site Titele and Description Goes Here -->
        <?php get_template_part( 'searchlogin' ); ?>
        
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php if ( has_custom_logo()): the_custom_logo(); else: ?><h1 class="site-title"><?php echo esc_html(bloginfo( 'name' )); ?></h1><?php endif; ?></a>
		<h2 class="site-title-hidden"><?php esc_html(bloginfo( 'description' )); ?></h2>
         
        <!-- Site Main Menu Goes Here -->
        <div class="mobile-menu genericon-menu"><?php _e('Main Menu','beauty-and-spa'); ?></div>
        <nav id="main-menu-con">
		<?php if ( has_nav_menu( 'main-menu' ) ) :  wp_nav_menu( array( 'theme_location' => 'main-menu' )); else: wp_page_menu(); endif; ?>
        </nav>
      
      </div><!-- header-content -->
      </div><!-- header -->