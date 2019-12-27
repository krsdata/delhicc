<section>
    <?php $orig_post = $post;
    $categories = get_the_category($post->ID);
    if ($categories) {
    $category_ids = array();
    foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
    $args=array(
    'category__in' => $category_ids,
    'orderby' => 'date',
    'post__not_in' => array($post->ID),
    'posts_per_page'=> 3,
    'ignore_sticky_posts'=>1
    );

    $my_query = new wp_query( $args );
    if( $my_query->have_posts() ) { ?> 
    <div class="related-posts">
        <div class="title-holder mb-4 cat-title">
            <h4><span><?php echo esc_html(get_theme_mod('best_blog_related_post_title',__('More Stories','best-news'))); ?></span></h4>
        </div>
       
        <div class="row">
            <?php while( $my_query->have_posts() ) {
                $my_query->the_post();?>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <div class="card">
                            <?php if ( has_post_thumbnail() ) {
                                best_news_thumbnail_8();
                            } else if ( ! has_post_thumbnail() ) { ?>
                                <img src = "<?php echo esc_url( get_template_directory_uri() ); ?>/inc/images/730_487.png " >
                            <?php } ?>
                        </div>
                    </article>
                </div>
            <?php } 
            wp_reset_postdata(); ?>
        </div>
        
    </div>
    <?php }
    }
    $post = $orig_post;
    ?></section>