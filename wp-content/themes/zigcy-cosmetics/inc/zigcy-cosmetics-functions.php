<?php
    if( !function_exists('woocommerce_product_category')){
        function woocommerce_product_category( $args = array() ) {
            global $post;
            $terms = get_the_terms($post->ID, 'product_cat');
            if ( $terms ) : 
                $i = 0;
                ?>
                <div class="woocommerce-categories">
                <?php
                foreach ( $terms as $term ) {
                    $i++;
                    echo '<span>';
                    echo '<a href="' .  esc_url( get_term_link( $term ) ) . '" class="' . esc_attr($term->slug) . '">';
                    echo esc_html($term->name);
                    echo '</a>';
                    echo '</span>';
                    if( $i < count( $terms) ){
                        echo ', ';
                    }
                } ?>
                </div>
                <?php
            endif;
        }
    }
    /*
    * zigcy_woo_tab_ajax Functions to overwrite functions from parent theme
    */
    function zigcy_woo_tab_ajax(){

        $cat_id     = $_POST['category_id'];
        $cat_slug   = $_POST['category_slug'];
        ob_start();
        ?>

        <?php
        $category_object = get_term( $cat_id, 'product_cat' );
        if ( $category_object ) {
            $args = array(
                'post_type' => 'product',
                'posts_per_page' => 8,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $category_object->term_id
                    )
                )
            );
            $query = new WP_Query( $args );
            ?>
            <?php if ( $query->have_posts() ) : ?>
                <ul class="pwtb-inner-catposts-wrapper products columns-4 cat-posts-<?php echo esc_attr( $category_object->term_id ); ?> sm-woo-tab-cat-wrapper <?php echo esc_attr($cat_slug);?>">
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>

                        <?php wc_get_template_part( 'content', 'product' ); ?>

                    <?php endwhile; ?>
                </ul>
            <?php endif; ?>
            <?php
        }
        
        
        wp_reset_postdata();
        
        $sv_html = ob_get_contents();
        ob_get_clean();
        echo $sv_html;
        die();
}



function zigcy_cosmetics_footer_copyright_fn()
{
    $zigcy_lite_footer_copyright = get_theme_mod('zigcy_lite_footer_copyright');
    $zigcy_lite_footer_image = get_theme_mod('zigcy_lite_footer_image');

    
    $attachment_id = zigcy_lite_get_attachment_id_from_url($zigcy_lite_footer_image);
    $image_alt = get_post_meta( $attachment_id, '_wp_attachment_image_alt', true);
    ?>
    <div class = "store-mart-lite-footer-wrap ">
        <div class="store-mart-lite-container clearfix">
            <div class = "store-mart-lite-footer-copyright">
                <?php
                if($zigcy_lite_footer_copyright && $zigcy_lite_footer_copyright!=""){
                    echo wp_kses_post($zigcy_lite_footer_copyright)." ";
                }?>
                <?php esc_html_e( 'WordPress Theme : ', 'zigcy-cosmetics' );  ?><a href="<?php echo esc_url( __( 'https://accesspressthemes.com/wordpress-themes/zigcy-cosmetics', 'zigcy-cosmetics' ) ); ?>"><?php esc_html_e( 'Zigcy Cosmetics', 'zigcy-cosmetics' ); ?> </a>
            </div>
            <?php if($zigcy_lite_footer_image){ ?>
            <div class = "store-mart-lite-footer-image-control"> 
            <img src="<?php echo esc_url($zigcy_lite_footer_image); ?>" alt="<?php echo esc_attr($image_alt); ?>" title="<?php the_title_attribute(); ?>" />
            </div>
            <?php } ?>
        </div>
    </div>
    <?php 

}
add_action('zigcy_lite_footer_copyright_fn','zigcy_cosmetics_footer_copyright_fn');