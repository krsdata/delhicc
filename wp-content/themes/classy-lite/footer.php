<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Classy Lite
 */
 
 $classy_lite_show_footer_social_part 	  			    = get_theme_mod('classy_lite_show_footer_social_part', false);
?>

<div class="footer-wrapper"> 
        <div class="footer-copyright"> 
            <div class="container">
                <div class="powerby">
				  <?php bloginfo('name'); ?> - <?php esc_html_e('Proudly Powered by WordPress','classy-lite'); ?>               
                </div>
                
              <?php if( $classy_lite_show_footer_social_part != ''){ ?> 
                 <div class="footer_socialicons">                                                
                   <?php $classy_lite_fb_link = get_theme_mod('classy_lite_fb_link');
                    if( !empty($classy_lite_fb_link) ){ ?>
                    <a title="facebook" class="fab fa-facebook-f" target="_blank" href="<?php echo esc_url($classy_lite_fb_link); ?>"></a>
                   <?php } ?>
                
                   <?php $classy_lite_twitt_link = get_theme_mod('classy_lite_twitt_link');
                    if( !empty($classy_lite_twitt_link) ){ ?>
                    <a title="twitter" class="fab fa-twitter" target="_blank" href="<?php echo esc_url($classy_lite_twitt_link); ?>"></a>
                   <?php } ?>
            
                  <?php $classy_lite_gplus_link = get_theme_mod('classy_lite_gplus_link');
                    if( !empty($classy_lite_gplus_link) ){ ?>
                    <a title="google-plus" class="fab fa-google-plus" target="_blank" href="<?php echo esc_url($classy_lite_gplus_link); ?>"></a>
                  <?php }?>
            
                  <?php $classy_lite_linked_link = get_theme_mod('classy_lite_linked_link');
                    if( !empty($classy_lite_linked_link) ){ ?>
                    <a title="linkedin" class="fab fa-linkedin" target="_blank" href="<?php echo esc_url($classy_lite_linked_link); ?>"></a>
                  <?php } ?>                  
               </div><!--end .footer_socialicons--> 
            <?php } ?> 
                        	
                <div class="design-by"><?php esc_html_e('Theme by Grace Themes','classy-lite'); ?></div>
                <div class="clear"></div>
                
                
               
                
                
             </div><!--end .container-->             
        </div><!--end .footer-copyright-->  
                     
     </div><!--end #footer-wrapper-->
</div><!--#end site_layout-->

<?php wp_footer(); ?>
</body>
</html>