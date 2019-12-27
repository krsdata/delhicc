<?php
/**
 * Customizer Control Classes files.
 *
 * @package Mag_News
 */

if ( ! class_exists( 'WP_Customize_Control' ) )
  return NULL;

/**
 * Class Mag_News_Dropdown_Taxonomies_Control
 */
class Mag_News_Dropdown_Taxonomies_Control extends WP_Customize_Control {

    /**
     * Render the control's content.
     *
     * @since 3.4.0
     */
    public function render_content() {
        $dropdown = wp_dropdown_categories(
            array(
                'name'              => 'mag-news-dropdown-categories-' . $this->id,
                'echo'              => 0,
                'show_option_none'  => esc_html__( '&mdash; Select &mdash;', 'mag-news' ),
                'option_none_value' => '0',
                'selected'          => $this->value(),
                'hide_empty'        => 0,                   

            )
        ); 
        
        $dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );

        printf(
            '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s <span class="description customize-control-description"></span>%s </label>',
            esc_html($this->label),
            esc_html($this->description),
            $dropdown

        );
    }

}