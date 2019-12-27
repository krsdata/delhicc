<?php
/**
 * Register Social Media Widgets.
 *
 * @package Mag_News
 */

function mag_news_social_action_media() {

  register_widget( 'mag_news_social_media' );
  
}
add_action( 'widgets_init', 'mag_news_social_action_media' );



/**
 * Social widget class.
 *
 * @since 1.0.0
 */
class mag_news_social_media extends WP_Widget {

    /**
     * Constructor.
     *
     * @since 1.0.0
     */
    function __construct() {
        $opts = array(
            'classname'   => 'widget_social_share',
            'description' => esc_html__( 'Social Link Widget', 'mag-news' ),
        );
        parent::__construct( 'mag_news_social_media', esc_html__( 'MN: Social Media', 'mag-news' ), $opts );
    }

    /**
     * Echo the widget content.
     *
     * @since 1.0.0
     *
     * @param array $args     Display arguments including before_title, after_title,
     *                        before_widget, and after_widget.
     * @param array $instance The settings for the particular instance of the widget.
     */
    function widget( $args, $instance ) {

        $title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

        echo $args['before_widget'];

        echo '<div class="social-links">';

        if ( ! empty( $title ) ) { ?>
            <h4 class="widget-title"><?php echo esc_html( $title );?></h4>
        <?php }        

        if ( has_nav_menu( 'social-icon' ) ) {
			wp_nav_menu( array(
				'theme_location'  => 'social-icon',
				'container'       => false,							
				'depth'           => 1,
				'fallback_cb'     => false,

			) );
			
        }

        echo '</div>';

        echo $args['after_widget'];

    }

    /**
     * Update widget instance.
     *
     * @since 1.0.0
     *
     * @param array $new_instance New settings for this instance as input by the user via
     *                            {@see WP_Widget::form()}.
     * @param array $old_instance Old settings for this instance.
     * @return array Settings to save or bool false to cancel saving.
     */
    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );

        return $instance;
    }

    /**
     * Output the settings update form.
     *
     * @since 1.0.0
     *
     * @param array $instance Current settings.
     * @return void
     */
    function form( $instance ) {

        $instance = wp_parse_args( (array) $instance, array(
            'title' => '',
        ) );
        ?>
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'mag-news' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
        </p>

        <?php if ( ! has_nav_menu( 'social-icon' ) ) : ?>
        <p>
            <?php esc_html_e( 'Social menu is not set. Please create menu and assign it to Social Media.', 'mag-news' ); ?>
        </p>
        <?php endif; ?>
        <?php
    }
}

