<?php 
/* 	Beauty and Spa Theme's part for showing blog or page in the front page
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Awesome 1.0
*/

?>
<?php if ( 'posts' == get_option( 'show_on_front' )): 
if ( esc_attr(beautyandspa_get_option ( 'dsfp' , '')) != '1' ): ?>
<div class="clear"></div>
<div id="container" class="f-blog-page">
<?php get_template_part( 'post-content' );  get_sidebar(); ?>
</div>
<?php endif; 
else: ?>
<div class="clear"></div>
<div id="container" class="f-blog-page">
<?php get_template_part( 'post-content' );  get_sidebar(); ?>
</div>

<?php endif; ?>

