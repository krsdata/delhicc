<?php
/**
 * Fired during plugin activation
 *
 * @link       https://everestthemes.com
 * @since      1.0.0
 *
 * @package    everest-news-lite
 * @subpackage Everest_news_lite/inc/widgets
 */
if( ! class_exists( 'Everest_News_Lite_Banner_Widget_Three' ) ) {
    
    class Everest_News_Lite_Banner_Widget_Three extends WP_Widget {

        function __construct() { 

            parent::__construct(
                'everest-news-lite-banner-widget-three',  // Base ID
                esc_html__( 'EN: Banner Widget Two', 'everest-news-lite' ),   // Name
                array(
                    'description' => esc_html__( 'Second Banner Layout.', 'everest-news-lite' ), 
                )
            ); 
        }

        public function widget( $args, $instance ) {

            $categories = !empty( $instance[ 'categories' ] ) ? $instance[ 'categories' ] : '';

            $banner_args = array(
                'post_type' => 'post',
                'posts_per_page' => 4,
            );

            if( !empty( $categories ) ) {
                $categories = implode(',', $categories);
                $banner_args['category_name'] = $categories;
            }

            $banner_query = new WP_Query( $banner_args );

            if( $banner_query->have_posts() ) {
                ?>
                <div class="en-general-banner en-banner-lay-3 en-standard-section-spacing">
                    <div class="banner-inner">
                        <div class="en-row">
                            <div class="en-col common-col left-col">
                                <?php
                                $count = 1;
                                while( $banner_query->have_posts() ) {
                                    $banner_query->the_post();
                                    if( $count == 1 ) {
                                        if( has_post_thumbnail() ) {
                                            $banner_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                            ?>
                                            <article class="card thumb lazyload" data-bg="<?php echo esc_url( $banner_image ); ?>">
                                                <?php everest_news_post_meta( 'clr-white', false, false, true, true, true ); ?>
                                                <div class="post-overlay absolute">
                                                    <?php everest_news_post_categories_meta(); ?>
                                                    <div class="entry-title">
                                                        <h2 class="post-title f-size-m clr-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    </div>
                                                    <?php everest_news_post_meta( 'clr-white', true, true, false, false, false ); ?>
                                                </div><!-- .post-overlay.absolute -->
                                                <div class="mask"></div>
                                            </article><!-- .card.thumb.lazyload -->
                                            <?php
                                        }
                                    }
                                    $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div><!-- .en-col.commom-col-left-col -->
                            <div class="en-col common-col center-col">
                                <?php
                                $count = 1;
                                while( $banner_query->have_posts() ) {
                                    $banner_query->the_post();
                                    if( $count == 2 ) {
                                        if( has_post_thumbnail() ) {
                                            $banner_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                            ?>
                                            <article class="card thumb lazyload" data-bg="<?php echo esc_url( $banner_image ); ?>">
                                                <?php everest_news_post_meta( 'clr-white', false, false, true, true, true ); ?>
                                                <div class="post-overlay absolute">
                                                    <?php everest_news_post_categories_meta(); ?>
                                                    <div class="entry-title">
                                                        <h2 class="post-title f-size-m clr-white"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                                                    </div>
                                                    <?php everest_news_post_meta( 'clr-white', true, true, false, false, false ); ?>
                                                </div><!-- .post-overlay.absolute -->
                                                <div class="mask"></div>
                                            </article><!-- .card.thumb.lazyload -->
                                            <?php
                                        }
                                    }
                                    $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div><!-- .en-col.common-col.center-col -->
                            <div class="en-col right-col">
                                <?php
                                $count = 1;
                                while( $banner_query->have_posts() ) {
                                    $banner_query->the_post();
                                    if( $count > 2 && $count <= 4 ) {
                                        if( has_post_thumbnail() ) {
                                            $banner_image = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                                            ?>
                                            <article class="card thumb lazyload" data-bg="<?php echo esc_url( $banner_image ); ?>">
                                                <div class="post-overlay absolute">
                                                    <?php everest_news_post_categories_meta(); ?>
                                                    <div class="entry-title">
                                                        <h2 class="post-title f-size-m clr-white">
                                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                                        </h2><!-- .post-title.f-size-m.clr-white -->
                                                    </div>
                                                    <?php everest_news_post_meta( 'clr-white', true, true, false, false, false ); ?>
                                                </div><!-- .post-overlay.absolute -->
                                                <div class="mask"></div><!-- .mask -->
                                            </article><!-- .card.thumb.lazyload -->
                                            <?php
                                        }
                                    }
                                    $count++;
                                }
                                wp_reset_postdata();
                                ?>
                            </div><!-- .en-col.right-col -->
                        </div><!-- .en-row -->
                    </div><!-- .banner-inner -->
                </div><!-- .en-general-banner.en-banner-lay-3.en-standard-section-spacing -->
                <?php
            }

        }

        public function form( $instance ) {
            $defaults = array(
                'categories'   => '',
            );

            $instance = wp_parse_args( (array) $instance, $defaults );
            ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id( 'product_cat' ) )?>"><strong><?php echo esc_html__( 'Select Category:', 'everest-news-lite' ); ?></strong></label>
                <span class="widget_multicheck">
                <br>
                <?php
                    $categories = get_terms( 
                        array( 
                            'taxonomy' => 'category', 
                        )
                    );
                    if( !empty( $categories ) ) {
                        foreach($categories as $cat) {
                        ?>
                        <input id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ) . $cat->term_id; ?>" name="<?php echo esc_attr( $this->get_field_name('categories') ); ?>[]" type="checkbox" value="<?php echo esc_attr( $cat->slug ); ?>" <?php if(!empty($instance['categories'])) { ?><?php foreach ( $instance['categories'] as $checked ) { checked( $checked, $cat->slug, true ); } ?><?php } ?>><?php echo esc_html( $cat->name ); ?>
                        <br>
                        <?php
                        }
                    } else {
                        ?>
                        <input id="<?php echo esc_attr( $this->get_field_id( 'categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name('categories') ); ?>" type="hidden" value="" checked>
                        <small><?php echo esc_html__( 'No categories to select.', 'everest-news-lite' ); ?></small>
                        <?php
                    }
                ?>
                </span>
            </p>
            <?php
        }

        public function update( $new_instance, $old_instance ) {

            $instance = $old_instance;

            $instance['categories']    = $new_instance['categories'];

            return $instance;
        } 
    }

    add_action( 'widgets_init' , function() {
        
        register_widget( 'Everest_News_Lite_Banner_Widget_Three' );
        
    });
}