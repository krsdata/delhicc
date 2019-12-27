<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage nikhar-spa-salon
 * @since 1.0
 * @version 0.1
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'nikhar-spa-salon' ) ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	
<div id="spa-header">
	<div id="top-header">
		<div class="container">
			<div class="contact-details">
				<div class="row">
					<div class="col-lg-7 col-md-7">
						<span class="mail">
							<?php if( get_theme_mod( 'nikhar_spa_salon_mail','' ) != '') { ?>
						    <i class="far fa-envelope"></i><span class="col-org"><?php echo esc_html( get_theme_mod('nikhar_spa_salon_mail','' ) ); ?></span>
							<?php } ?>
						</span>
						<span class="timing">
							<?php if( get_theme_mod( 'nikhar_spa_salon_timing','' ) != '') { ?>
						    <i class="fas fa-clock"></i><span class="col-org"><?php echo esc_html( get_theme_mod('nikhar_spa_salon_timing','') ); ?></span>
							<?php } ?>
						</span>  	
					</div>
					<div class="col-lg-5 col-md-5">
						<div class="search-icon">
				            <?php get_search_form(); ?>
				        </div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="top">
				<div class="row">
					<div class="col-lg-4 col-md-4">
						<div class="logo">
					        <?php if( has_custom_logo() ){ nikhar_spa_salon_the_custom_logo();
					           }else{ ?>
					          <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					          <?php $description = get_bloginfo( 'description', 'display' );
					          if ( $description || is_customize_preview() ) : ?> 
					            <p class="site-description"><?php echo esc_html($description); ?></p>
					        <?php endif; }?>
					    </div>
					</div>
					<div class="col-lg-6 col-md-5">
						<div class="social-icons">
							<?php if( get_theme_mod( 'nikhar_spa_salon_facebook_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'nikhar_spa_salon_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f" aria-hidden="true"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'nikhar_spa_salon_twitter_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'nikhar_spa_salon_twitter_url','' ) ); ?>"><i class="fab fa-twitter"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'nikhar_spa_salon_linkedin_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'nikhar_spa_salon_linkedin_url','' ) ); ?>"><i class="fab fa-linkedin-in"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'nikhar_spa_salon_pinterest_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'nikhar_spa_salon_pinterest_url','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
						    <?php } ?>
						    <?php if( get_theme_mod( 'nikhar_spa_salon_insta_url') != '') { ?>
						      <a href="<?php echo esc_url( get_theme_mod( 'nikhar_spa_salon_insta_url','' ) ); ?>"><i class="fab fa-instagram"></i></a>
						    <?php } ?>		            
						</div>	
					</div>
					<div class="col-lg-2 col-md-3">
						<div class="call">
							<?php if( get_theme_mod('nikhar_spa_salon_phone') != ''){ ?>
			                    <p class="phone"><?php echo esc_html( get_theme_mod('nikhar_spa_salon_phone','')); ?></p>
			                <?php } ?>
			                <?php if( get_theme_mod('nikhar_spa_salon_phone1') != ''){ ?>
			                    <p><?php echo esc_html( get_theme_mod('nikhar_spa_salon_phone1','')); ?></p>
			                <?php } ?>
		            	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="header">
		<div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','nikhar-spa-salon'); ?></a></div>
		<div class="menu-section">
			<div class="container">
				<div class="main-top">
					<div class="nav">
						<?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
					</div>
				</div>	
			</div>		
		</div>
	</div>
</div>