<?php
/**
 *Classy Lite About Theme
 *
 * @package Classy Lite
 */

//about theme info
add_action( 'admin_menu', 'classy_lite_abouttheme' );
function classy_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'classy-lite'), __('About Theme Info', 'classy-lite'), 'edit_theme_options', 'classy_lite_guide', 'classy_lite_mostrar_guide');   
} 

//Info of the theme
function classy_lite_mostrar_guide() { 	
?>
<div class="wrap-GT">
	<div class="gt-left">
   		   <div class="heading-gt">
			  <h3><?php esc_html_e('About Theme Info', 'classy-lite'); ?></h3>
		   </div>
          <p><?php esc_html_e('Classy Lite is a modern, magnificent, trendy, creative and elegant free fashion store WordPress theme with all the necessities and advanced features. It provides a fantastic platform for developing a professional and beautiful fashion website. This theme is designed for fashion portfolio, online fashion stores, fashion photography, fashion blog, models websites, clothes magazines, or any other related business. This multipurpose theme can also be used for boutique, beauty parlor, clothing shop, cosmetic, beauty and saloon, massage and spa, yoga, personal trainer, lifestyle blogs, travel and classic websites. Some of the amenities of this theme includes multi-level menu, unlimites color scheme, Google fonts, custom backgrounds, sidebar, footer, custom widgets, full-width page template, blog layout, social buttons and contact information. It has full width image slider to showcase your eye-catching images of fashion style. Boxed or full-width site layout option with sticky header functionality adds advantages to your website.','classy-lite'); ?></p>
<div class="heading-gt"> <?php esc_html_e('Theme Features', 'classy-lite'); ?></div>
 

<div class="col-2">
  <h4><?php esc_html_e('Theme Customizer', 'classy-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'classy-lite'); ?></div>
</div>

<div class="col-2">
  <h4><?php esc_html_e('Responsive Ready', 'classy-lite'); ?></h4>
  <div class="description"><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'classy-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('Cross Browser Compatible', 'classy-lite'); ?></h4>
<div class="description"><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'classy-lite'); ?></div>
</div>

<div class="col-2">
<h4><?php esc_html_e('E-commerce', 'classy-lite'); ?></h4>
<div class="description"><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'classy-lite'); ?></div>
</div>
<hr />  
</div><!-- .gt-left -->
	
<div class="gt-right">			
        <div>				
            <a href="<?php echo esc_url( CLASSY_LITE_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'classy-lite'); ?></a> | 
            <a href="<?php echo esc_url( CLASSY_LITE_PROTHEME_URL ); ?>" target="_blank"><?php esc_html_e('Purchase Pro', 'classy-lite'); ?></a> | 
            <a href="<?php echo esc_url( CLASSY_LITE_THEME_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'classy-lite'); ?></a>
        </div>		
</div><!-- .gt-right-->
<div class="clear"></div>
</div><!-- .wrap-GT -->
<?php } ?>