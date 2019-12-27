<?php
/**
 * beautiplus About Theme
 *
 * @package Beautiplus
 */

//about theme info
add_action( 'admin_menu', 'beautiplus_abouttheme' );
function beautiplus_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'beautiplus'), __('About Theme Info', 'beautiplus'), 'edit_theme_options', 'beautiplus_guide', 'beautiplus_mostrar_guide');   
} 

//guidline for about theme
function beautiplus_mostrar_guide() { 
?>

<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php _e('About Theme Info', 'beautiplus'); ?></h3>
		   </div>
          <p><?php _e('BeautiPlus is a beautiful, responsive, colorful, stylish and free modern WordPress theme. BeautiPlus is an easy to use and highly intuitive multipurpose WordPress website theme. BeautiPlus has been designed with the main objective to provide website building platform for fashion and blogging website webmasters that are looking for professional quality and creativity.','beautiplus'); ?></p>
 
<div class="gt-right">		
<hr /> 	
<a href="<?php echo BEAUTIPLUS_LIVE_DEMO; ?>" target="_blank"><?php _e('Live Demo', 'beautiplus'); ?></a> | 
<a href="<?php echo BEAUTIPLUS_PROTHEME_URL; ?>" target="_blank"><?php _e('Purchase Pro', 'beautiplus'); ?></a> | 
<a href="<?php echo BEAUTIPLUS_THEME_DOC; ?>" target="_blank"><?php _e('Documentation', 'beautiplus'); ?></a>               
<hr />  
</div><!-- .gt-right--> 

<div class="heading-gt"><h3><?php _e('Theme Features', 'beautiplus'); ?><h3></div>

<div class="col-2">
  <h4><?php _e('Theme Customizer', 'beautiplus'); ?></h4>
  <div class="description"><?php _e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'beautiplus'); ?></div>
</div>

<div class="col-2">
  <h4><?php _e('Responsive Ready', 'beautiplus'); ?></h4>
  <div class="description"><?php _e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'beautiplus'); ?></div>
</div>

<div class="col-2">
<h4><?php _e('Cross Browser Compatible', 'beautiplus'); ?></h4>
<div class="description"><?php _e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'beautiplus'); ?></div>
</div>

<div class="col-2">
<h4><?php _e('E-commerce', 'beautiplus'); ?></h4>
<div class="description"><?php _e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'beautiplus'); ?></div>
</div>

</div><!-- .gt-left -->
	
	
    <div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>