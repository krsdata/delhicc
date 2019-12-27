<?php
/* 	Beauty and Spa Theme's Seearch and Login Part
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 3.0
*/
?>
<div class="search-login socialnormal"><span class="searchlibef"></span>
<?php 
beautyandspa_social_links();
if ( esc_textarea(beautyandspa_get_option('phone-num', '')) != '' ): echo '<div class="phonenumber">'.esc_textarea(beautyandspa_get_option('phone-num', '')).'</div>'; endif;
get_search_form();
?>
<span class="searchliaft"></span></div>
