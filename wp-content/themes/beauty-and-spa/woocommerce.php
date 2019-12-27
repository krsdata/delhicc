<?php
/* 	Beauty and Spa Theme's General Page to display WooCommerce Pages
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/

get_header(); ?>
<div id="container">
	<div class="content"><?php woocommerce_content(); ?></div>
	<?php get_sidebar();  ?>
</div>
<?php get_footer(); ?>