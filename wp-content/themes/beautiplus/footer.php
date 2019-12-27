<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Beautiplus
 */
?>
<div id="footer-wrapper">
    	<div class="container">
             <?php if ( ! dynamic_sidebar( 'footer-1' ) ) : ?>             
               <?php endif; // end footer widget area ?>    
                        
               <?php if ( ! dynamic_sidebar( 'footer-2' ) ) : ?>                                  	
               <?php endif; // end footer widget area ?>   
            
               <?php if ( ! dynamic_sidebar( 'footer-3' ) ) : ?>                
               <?php endif; // end footer widget area ?> 
               
               <?php if ( ! dynamic_sidebar( 'footer-4' ) ) : ?>                
               <?php endif; // end footer widget area ?>  
                
            <div class="clear"></div>
        </div><!--end .container-->
        
        <div class="copyright-wrapper">
        	<div class="container">
            	<div class="copyright-txt">
				  <?php bloginfo('name'); ?> <?php _e('All Rights Reserved', 'beautiplus');?>              
                </div>
                <div class="design-by">
                    <a href="<?php echo esc_url( __( 'https://gracethemes.com/themes/free-modern-wordpress-theme/', 'beautiplus' ) ); ?>" target="_blank">
                      <?php printf( __( 'Designed by %s', 'beautiplus' ), 'Grace Themes' ); ?>
                    </a>
                </div>
                <div class="clear"></div>
            </div><!--.container-->            
        </div><!--.copyright-wrapper-->
    </div><!--.#footer-wrapper-->
</div><!--#end #pageholder-->
<?php wp_footer(); ?>

</body>
</html>