<?php 
/* 	Travel Theme's E-Commerce Part
	Copyright: 2015-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 3.0
*/
?>
<?php if ( esc_textarea(beautyandspa_get_option('heading_text', __('Welcome to the World of Beauty !','beauty-and-spa'))) != '' ): ?>
<div id="heading-box-item" class="box100 fpheadcon">
	<div class="box90">
    	<h1 id="heading"><?php echo esc_textarea(beautyandspa_get_option('heading_text', __('Welcome to the World of Beauty !','beauty-and-spa'))); ?></h1>
	</div>
</div>
<?php endif; ?>