<?php
/**
*
* Slider Section
*/
if( ! function_exists('zigcy_lite_pro_cat')){
	function zigcy_lite_pro_cat(){
        $slider_enable =  get_theme_mod('zigcy_lite_pro_cat_enable','off');
        if($slider_enable == 'on'){ ?>
          	<section id="plx_prod_cat_section" class="plx_prod_cat_section">
          		<div class="container">
          			<?php  zigcy_lite_pro_cat_setting(); ?>          			
          		</div>
        	</section>
        <?php }
       
	}
} add_action( 'zigcy_lite_pro_cat_section', 'zigcy_lite_pro_cat');

/**
 * Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_pro_cat_setting' ) ) { 
    function zigcy_lite_pro_cat_setting() { 
    	if(! class_exists('Woocommerce')) {
    		return;
    	}      
		  	$zigcy_lite_product_categories_one = get_theme_mod( 'zigcy_lite_product_categories_one','0' );
		  	$zigcy_lite_product_categories_two = get_theme_mod( 'zigcy_lite_product_categories_two','0' );

			$term_one = get_term_by( 'id', $zigcy_lite_product_categories_one, 'product_cat' );
			$thumbnail_id_one = get_term_meta( $zigcy_lite_product_categories_one, 'thumbnail_id',true );
			$thumbnail_id_one     = wp_get_attachment_image_src($thumbnail_id_one, 'zigcy-cosmetics-wide');
			$image_one = $thumbnail_id_one[0];
            $category_link_one = get_category_link( $zigcy_lite_product_categories_one );

			$term_two = get_term_by( 'id', $zigcy_lite_product_categories_two, 'product_cat' );
			$thumbnail_id_two = get_term_meta( $zigcy_lite_product_categories_two, 'thumbnail_id',true);
			$thumbnail_id_two     = wp_get_attachment_image_src($thumbnail_id_two, 'zigcy-cosmetics-wide');
			$image_two = $thumbnail_id_two[0];
            $category_link_two = get_category_link( $zigcy_lite_product_categories_two );


			?>
				<div class="store-mart-lite-cat-pro-wrap">
					<?php if($term_one): ?>
						<div class = "store-mart-lite-prod-cat-wrapper-one">
							<div class="store-mart-lite-cat-prod-content">
								<div class="store-mart-lite-cat-prod-title">
								 	<?php echo esc_html($term_one->name); ?>
								</div>
								<div class="store-mart-lite-cat-prod-description">
									 <?php echo esc_html($term_one->description); ?>
								</div>
								<div class="store-mart-lite-cat-prod-btn">
									<a class="store-mart-cat-prod-btn" href="<?php echo esc_url( $category_link_one ); ?>">
										<?php echo esc_html('View All Products','zigcy-cosmetics'); ?>
									</a>
			                    </div>
							</div>
							<div class="store-mart-lite-cat-prod-image">
			                    <a href="<?php the_permalink() ?>">
			                        <img src="<?php echo esc_url($image_one); ?>" title="<?php the_title_attribute() ?>" alt="<?php the_title_attribute() ?>" />
			                    </a>
			                </div>
						</div>
					<?php endif; ?>
					<?php if($term_two): ?>
						<div class = "store-mart-lite-prod-cat-wrapper-two">
							<div class="store-mart-lite-cat-prod-content">
								<div class="store-mart-lite-cat-prod-title">
									 <?php echo esc_html($term_two->name); ?>
								</div>
								<div class="store-mart-lite-cat-prod-description">
									 <?php echo esc_html($term_two->description); ?>
								</div>
								<div class="store-mart-lite-cat-prod-btn">
									<a class="store-mart-cat-prod-btn" href="<?php echo esc_url( $category_link_two ); ?>">
										<?php echo esc_html('View All Products','zigcy-cosmetics'); ?>
									</a>
			                    </div>
							</div>
							<div class="store-mart-lite-cat-prod-image">
			                    <a href="<?php the_permalink() ?>">
			                        <img src="<?php echo esc_url($image_two); ?>" title="<?php the_title_attribute() ?>" alt="<?php the_title_attribute() ?>" />
			                    </a>
			                </div>
						</div>
	                <?php endif; ?>
				</div>
<?php 
			

    }
}