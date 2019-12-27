<?php
/**
*
* Latest Product Category Section
*/

if( ! function_exists('zigcy_lite_lat_prod_cat')){
	function zigcy_lite_lat_prod_cat(){
        $lat_prod_cat_enable =  get_theme_mod('zigcy_lite_latest_cat_prod_enable','off');
        if($lat_prod_cat_enable == 'on'){ ?>
          <section id="plx_lat_prod_cat_section" class="plx_lat_prod_cat_section">
                <?php  zigcy_lite_lat_prod_cat_setting(); ?>
        </section>
        <?php }
       
	}
} add_action( 'zigcy_lite_lat_prod_cat_section', 'zigcy_lite_lat_prod_cat');

/**
* Zigcy Lite Product Category Section
*/ 
if ( ! function_exists( 'zigcy_lite_lat_prod_cat_setting' ) ) { 
    function zigcy_lite_lat_prod_cat_setting() {
        $lat_product_title = get_theme_mod('zigcy_lite_latest_cat_prod_title');
        $lat_product_subtitle = get_theme_mod('zigcy_lite_latest_cat_prod_subtitle');
        $lat_product_rate = get_theme_mod('zigcy_lite_sml_lat_pro_show_rating');
        $lat_pro_to_show = get_theme_mod('zigcy_lite_sml_lat_pro_per_page');
        $zigcy_lite_latest_product_categories = get_theme_mod( 'zigcy_lite_latest_product_categories','0' );

        $lat_product_title_popular = get_theme_mod('zigcy_lite_latest_cat_prod_title_popular');
        $lat_product_subtitle_popular = get_theme_mod('zigcy_lite_latest_cat_prod_subtitle_popular');
        $lat_product_rate_popular = get_theme_mod('zigcy_lite_sml_lat_pro_show_rating_popular');
        $lat_pro_to_show_popular = get_theme_mod('zigcy_lite_sml_lat_pro_per_page_popular');
        $zigcy_lite_latest_product_categories_popular = get_theme_mod( 'zigcy_lite_latest_product_categories_popular','0' );
        $zc_class = 'zc-half';
        if( empty($zigcy_lite_latest_product_categories) || empty( $zigcy_lite_latest_product_categories_popular ) ){
            $zc_class = 'zc-fullwidth';
        }
        ?>
    <div class="container">
        <div class="zc-lat-pop-wrapper">
            <?php if( !empty($zigcy_lite_latest_product_categories) ):?>
                <div class="zc-lat-wrapper <?php echo esc_attr($zc_class);?>">                
                    <?php if($lat_product_title || $lat_product_subtitle){ ?>
                        <div class="store-mart-lite-lat-pro-title-wrap">
                            <?php if($lat_product_title){ ?>
                                <h5 class="lat-pro-title"><?php echo esc_html($lat_product_title); ?></h5>
                            <?php } ?>
                            <?php if($lat_product_subtitle){ ?>
                              <h3 class = "lat-pro-subtitle"><?php echo esc_html($lat_product_subtitle); ?></h3>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="store-mart-lite-lat-prod-cat-wrap">
                        <?php
                        
                        $woo_cat = zigcy_lite_prod_get_woo_cat_id();
                        
                        if(empty($zigcy_lite_latest_product_categories) || !in_array($zigcy_lite_latest_product_categories,$woo_cat) ){
                           $category_p = max(array_keys($woo_cat)); //gets index which has maximum products
                           $zigcy_lite_latest_product_categories = $woo_cat[$category_p];
                          
                        } 
                        
                        if(($zigcy_lite_latest_product_categories) ){
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $lat_pro_to_show,
                                'tax_query' => array(
                                    array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $zigcy_lite_latest_product_categories
                                     )
                                  )
                                );

                        $feat_prod_cats_query = new WP_Query( $args );

                        if( $feat_prod_cats_query->have_posts() ) { ?>
                            <div class="woocommerce">
                                    <ul class="products columns-2">
                               <?php 
                                $i = 0;
                                while( $feat_prod_cats_query->have_posts() ) { 
                                    $i++;
                                    $feat_prod_cats_query->the_post();
                                    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id() );
                                    $image_path = $image_src[0]; ?>
                                    <li class="product">
                                        <div class="sml-lat-prod-detail-wrap">
                                            <div class="latest-product-image">
                                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                                            </div>
                                            <div class="lat-prod-cat-info">
                                                <?php //woocommerce_product_category();?>
                                                <h2 class="prod-title">                    
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <?php if( $lat_product_rate ){ ?>
                                                    <?php woocommerce_template_loop_rating(); 
                                                } ?>
                                                <div class="product-price">
                                                    <?php woocommerce_template_loop_price(); ?> 
                                                    <div class="sml-latest-prod-add-to-cart">
                                                    <?php woocommerce_template_loop_add_to_cart(); ?>    
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                  </li>
                                <?php  }?>
                                    
                                <?php  } wp_reset_postdata();   ?> 
                            </ul>
                        </div>
                        <?php 
                        }?>
                    </div>
                </div>
            <?php endif;?>  

            <?php if( !empty($zigcy_lite_latest_product_categories_popular) ):?>
                <div class="zc-pop-wrapper <?php echo esc_attr($zc_class);?>">                
                    <?php if($lat_product_title_popular || $lat_product_subtitle_popular){ ?>
                        <div class="store-mart-lite-lat-pro-title-wrap">
                            <?php if($lat_product_title_popular){ ?>
                                <h5 class="lat-pro-title"><?php echo esc_html($lat_product_title_popular); ?></h5>
                            <?php } ?>
                            <?php if($lat_product_subtitle_popular){ ?>
                              <h3 class = "lat-pro-subtitle"><?php echo esc_html($lat_product_subtitle_popular); ?></h3>
                            <?php } ?>
                        </div>
                    <?php } ?>
                    <div class="store-mart-lite-lat-prod-cat-wrap">
                        <?php
                        
                        $woo_cat = zigcy_lite_prod_get_woo_cat_id();
                        
                        if(empty($zigcy_lite_latest_product_categories) || !in_array($zigcy_lite_latest_product_categories,$woo_cat) ){
                           $category_p = max(array_keys($woo_cat)); //gets index which has maximum products
                           $zigcy_lite_latest_product_categories = $woo_cat[$category_p];
                          
                        } 
                        
                        if(($zigcy_lite_latest_product_categories_popular) ){
                            $args = array(
                                'post_type' => 'product',
                                'posts_per_page' => $lat_pro_to_show_popular,
                                'tax_query' => array(
                                    array(
                                    'taxonomy' => 'product_cat',
                                    'field' => 'term_id',
                                    'terms' => $zigcy_lite_latest_product_categories_popular
                                     )
                                  )
                                );

                        $feat_prod_cats_query_popular = new WP_Query( $args );

                        if( $feat_prod_cats_query_popular->have_posts() ) { ?>
                            <div class="woocommerce">
                                    <ul class="products columns-2">
                               <?php 
                                $i = 0;
                                while( $feat_prod_cats_query_popular->have_posts() ) { 
                                    $i++;
                                    $feat_prod_cats_query_popular->the_post();
                                    $image_src = wp_get_attachment_image_src( get_post_thumbnail_id() );
                                    $image_path = $image_src[0]; ?>
                                    <li class="product">
                                        <div class="sml-lat-prod-detail-wrap">
                                            <div class="latest-product-image">
                                                <?php woocommerce_template_loop_product_thumbnail(); ?>
                                            </div>
                                            <div class="lat-prod-cat-info">
                                                <?php //woocommerce_product_category();?>
                                                <h2 class="prod-title">                    
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h2>
                                                <?php if( $lat_product_rate ){ ?>
                                                    <?php woocommerce_template_loop_rating(); 
                                                } ?>
                                                <div class="product-price">
                                                    <?php woocommerce_template_loop_price(); ?> 
                                                    <div class="sml-latest-prod-add-to-cart">
                                                    <?php woocommerce_template_loop_add_to_cart(); ?>    
                                                    </div>  
                                                </div>
                                            </div>
                                        </div>
                                  </li>
                                <?php  }?>
                                    
                                <?php  } wp_reset_postdata();   ?> 
                            </ul>
                        </div>
                        <?php 
                        }?>
                    </div>
                </div>
            <?php endif;?>              
        </div>
    </div>
         <?php     
    }
}