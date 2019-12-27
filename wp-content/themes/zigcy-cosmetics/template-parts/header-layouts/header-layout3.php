<?php 
	$class = ' ';
	if(!class_exists('WooCommerce')) {
		$class = 'no-wocommerce';
	}
	?>
	<header id="masthead" class="site-header header-three header-two">
		<div class="container">			
			<div class ="store-mart-lite-logos">
				<?php do_action('zigcy_lite_header_logo'); ?>
				<div class="store-mart-lite-menu">
					<?php do_action('zigcy_lite_main_navigation'); ?>
				</div>
				<div class="store-mart-lite-login-wrap">
					<?php echo zigcy_lite_header_search_icon(); // WPCS: XSS OK. ?>
					<?php echo zigcy_lite_login_signup(); // WPCS: XSS OK. ?>
					<?php echo zigcy_lite_woo_cart_icon(); // WPCS: XSS OK. ?>
				</div>
				
			</div>
			
		</div>	
	</header><!-- #masthead -->