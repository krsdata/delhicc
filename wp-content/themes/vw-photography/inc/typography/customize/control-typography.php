<?php
/**
 * Typography control class.
 *
 * @since  1.0.0
 * @access public
 */

class VW_Photography_Control_Typography extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'typography';

	/**
	 * Array 
	 *
	 * @since  1.0.0
	 * @access public
	 * @var    string
	 */
	public $l10n = array();

	/**
	 * Set up our control.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @param  string  $id
	 * @param  array   $args
	 * @return void
	 */
	public function __construct( $manager, $id, $args = array() ) {

		// Let the parent class do its thing.
		parent::__construct( $manager, $id, $args );

		// Make sure we have labels.
		$this->l10n = wp_parse_args(
			$this->l10n,
			array(
				'color'       => esc_html__( 'Font Color', 'vw-photography' ),
				'family'      => esc_html__( 'Font Family', 'vw-photography' ),
				'size'        => esc_html__( 'Font Size',   'vw-photography' ),
				'weight'      => esc_html__( 'Font Weight', 'vw-photography' ),
				'style'       => esc_html__( 'Font Style',  'vw-photography' ),
				'line_height' => esc_html__( 'Line Height', 'vw-photography' ),
				'letter_spacing' => esc_html__( 'Letter Spacing', 'vw-photography' ),
			)
		);
	}

	/**
	 * Enqueue scripts/styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue() {
		wp_enqueue_script( 'vw-photography-ctypo-customize-controls' );
		wp_enqueue_style(  'vw-photography-ctypo-customize-controls' );
	}

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// Loop through each of the settings and set up the data for it.
		foreach ( $this->settings as $setting_key => $setting_id ) {

			$this->json[ $setting_key ] = array(
				'link'  => $this->get_link( $setting_key ),
				'value' => $this->value( $setting_key ),
				'label' => isset( $this->l10n[ $setting_key ] ) ? $this->l10n[ $setting_key ] : ''
			);

			if ( 'family' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_families();

			elseif ( 'weight' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_weight_choices();

			elseif ( 'style' === $setting_key )
				$this->json[ $setting_key ]['choices'] = $this->get_font_style_choices();
		}
	}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<ul>

		<# if ( data.family && data.family.choices ) { #>

			<li class="typography-font-family">

				<# if ( data.family.label ) { #>
					<span class="customize-control-title">{{ data.family.label }}</span>
				<# } #>

				<select {{{ data.family.link }}}>

					<# _.each( data.family.choices, function( label, choice ) { #>
						<option value="{{ choice }}" <# if ( choice === data.family.value ) { #> selected="selected" <# } #>>{{ label }}</option>
					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.weight && data.weight.choices ) { #>

			<li class="typography-font-weight">

				<# if ( data.weight.label ) { #>
					<span class="customize-control-title">{{ data.weight.label }}</span>
				<# } #>

				<select {{{ data.weight.link }}}>

					<# _.each( data.weight.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.weight.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.style && data.style.choices ) { #>

			<li class="typography-font-style">

				<# if ( data.style.label ) { #>
					<span class="customize-control-title">{{ data.style.label }}</span>
				<# } #>

				<select {{{ data.style.link }}}>

					<# _.each( data.style.choices, function( label, choice ) { #>

						<option value="{{ choice }}" <# if ( choice === data.style.value ) { #> selected="selected" <# } #>>{{ label }}</option>

					<# } ) #>

				</select>
			</li>
		<# } #>

		<# if ( data.size ) { #>

			<li class="typography-font-size">

				<# if ( data.size.label ) { #>
					<span class="customize-control-title">{{ data.size.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.size.link }}} value="{{ data.size.value }}" />

			</li>
		<# } #>

		<# if ( data.line_height ) { #>

			<li class="typography-line-height">

				<# if ( data.line_height.label ) { #>
					<span class="customize-control-title">{{ data.line_height.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.line_height.link }}} value="{{ data.line_height.value }}" />

			</li>
		<# } #>

		<# if ( data.letter_spacing ) { #>

			<li class="typography-letter-spacing">

				<# if ( data.letter_spacing.label ) { #>
					<span class="customize-control-title">{{ data.letter_spacing.label }} (px)</span>
				<# } #>

				<input type="number" min="1" {{{ data.letter_spacing.link }}} value="{{ data.letter_spacing.value }}" />

			</li>
		<# } #>

		</ul>
	<?php }

	/**
	 * Returns the available fonts.  Fonts should have available weights, styles, and subsets.
	 *
	 * @todo Integrate with Google fonts.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_fonts() { return array(); }

	/**
	 * Returns the available font families.
	 *
	 * @todo Pull families from `get_fonts()`.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	function get_font_families() {

		return array(
			'' => __( 'No Fonts', 'vw-photography' ),
        'Abril Fatface' => __( 'Abril Fatface', 'vw-photography' ),
        'Acme' => __( 'Acme', 'vw-photography' ),
        'Anton' => __( 'Anton', 'vw-photography' ),
        'Architects Daughter' => __( 'Architects Daughter', 'vw-photography' ),
        'Arimo' => __( 'Arimo', 'vw-photography' ),
        'Arsenal' => __( 'Arsenal', 'vw-photography' ),
        'Arvo' => __( 'Arvo', 'vw-photography' ),
        'Alegreya' => __( 'Alegreya', 'vw-photography' ),
        'Alfa Slab One' => __( 'Alfa Slab One', 'vw-photography' ),
        'Averia Serif Libre' => __( 'Averia Serif Libre', 'vw-photography' ),
        'Bangers' => __( 'Bangers', 'vw-photography' ),
        'Boogaloo' => __( 'Boogaloo', 'vw-photography' ),
        'Bad Script' => __( 'Bad Script', 'vw-photography' ),
        'Bitter' => __( 'Bitter', 'vw-photography' ),
        'Bree Serif' => __( 'Bree Serif', 'vw-photography' ),
        'BenchNine' => __( 'BenchNine', 'vw-photography' ),
        'Cabin' => __( 'Cabin', 'vw-photography' ),
        'Cardo' => __( 'Cardo', 'vw-photography' ),
        'Courgette' => __( 'Courgette', 'vw-photography' ),
        'Cherry Swash' => __( 'Cherry Swash', 'vw-photography' ),
        'Cormorant Garamond' => __( 'Cormorant Garamond', 'vw-photography' ),
        'Crimson Text' => __( 'Crimson Text', 'vw-photography' ),
        'Cuprum' => __( 'Cuprum', 'vw-photography' ),
        'Cookie' => __( 'Cookie', 'vw-photography' ),
        'Chewy' => __( 'Chewy', 'vw-photography' ),
        'Days One' => __( 'Days One', 'vw-photography' ),
        'Dosis' => __( 'Dosis', 'vw-photography' ),
        'Droid Sans' => __( 'Droid Sans', 'vw-photography' ),
        'Economica' => __( 'Economica', 'vw-photography' ),
        'Fredoka One' => __( 'Fredoka One', 'vw-photography' ),
        'Fjalla One' => __( 'Fjalla One', 'vw-photography' ),
        'Francois One' => __( 'Francois One', 'vw-photography' ),
        'Frank Ruhl Libre' => __( 'Frank Ruhl Libre', 'vw-photography' ),
        'Gloria Hallelujah' => __( 'Gloria Hallelujah', 'vw-photography' ),
        'Great Vibes' => __( 'Great Vibes', 'vw-photography' ),
        'Handlee' => __( 'Handlee', 'vw-photography' ),
        'Hammersmith One' => __( 'Hammersmith One', 'vw-photography' ),
        'Inconsolata' => __( 'Inconsolata', 'vw-photography' ),
        'Indie Flower' => __( 'Indie Flower', 'vw-photography' ),
        'IM Fell English SC' => __( 'IM Fell English SC', 'vw-photography' ),
        'Julius Sans One' => __( 'Julius Sans One', 'vw-photography' ),
        'Josefin Slab' => __( 'Josefin Slab', 'vw-photography' ),
        'Josefin Sans' => __( 'Josefin Sans', 'vw-photography' ),
        'Kanit' => __( 'Kanit', 'vw-photography' ),
        'Lobster' => __( 'Lobster', 'vw-photography' ),
        'Lato' => __( 'Lato', 'vw-photography' ),
        'Lora' => __( 'Lora', 'vw-photography' ),
        'Libre Baskerville' => __( 'Libre Baskerville', 'vw-photography' ),
        'Lobster Two' => __( 'Lobster Two', 'vw-photography' ),
        'Merriweather' => __( 'Merriweather', 'vw-photography' ),
        'Monda' => __( 'Monda', 'vw-photography' ),
        'Montserrat' => __( 'Montserrat', 'vw-photography' ),
        'Muli' => __( 'Muli', 'vw-photography' ),
        'Marck Script' => __( 'Marck Script', 'vw-photography' ),
        'Noto Serif' => __( 'Noto Serif', 'vw-photography' ),
        'Open Sans' => __( 'Open Sans', 'vw-photography' ),
        'Overpass' => __( 'Overpass', 'vw-photography' ),
        'Overpass Mono' => __( 'Overpass Mono', 'vw-photography' ),
        'Oxygen' => __( 'Oxygen', 'vw-photography' ),
        'Orbitron' => __( 'Orbitron', 'vw-photography' ),
        'Patua One' => __( 'Patua One', 'vw-photography' ),
        'Pacifico' => __( 'Pacifico', 'vw-photography' ),
        'Padauk' => __( 'Padauk', 'vw-photography' ),
        'Playball' => __( 'Playball', 'vw-photography' ),
        'Playfair Display' => __( 'Playfair Display', 'vw-photography' ),
        'PT Sans' => __( 'PT Sans', 'vw-photography' ),
        'Philosopher' => __( 'Philosopher', 'vw-photography' ),
        'Permanent Marker' => __( 'Permanent Marker', 'vw-photography' ),
        'Poiret One' => __( 'Poiret One', 'vw-photography' ),
        'Quicksand' => __( 'Quicksand', 'vw-photography' ),
        'Quattrocento Sans' => __( 'Quattrocento Sans', 'vw-photography' ),
        'Raleway' => __( 'Raleway', 'vw-photography' ),
        'Rubik' => __( 'Rubik', 'vw-photography' ),
        'Rokkitt' => __( 'Rokkitt', 'vw-photography' ),
        'Russo One' => __( 'Russo One', 'vw-photography' ),
        'Righteous' => __( 'Righteous', 'vw-photography' ),
        'Slabo' => __( 'Slabo', 'vw-photography' ),
        'Source Sans Pro' => __( 'Source Sans Pro', 'vw-photography' ),
        'Shadows Into Light Two' => __( 'Shadows Into Light Two', 'vw-photography'),
        'Shadows Into Light' => __( 'Shadows Into Light', 'vw-photography' ),
        'Sacramento' => __( 'Sacramento', 'vw-photography' ),
        'Shrikhand' => __( 'Shrikhand', 'vw-photography' ),
        'Tangerine' => __( 'Tangerine', 'vw-photography' ),
        'Ubuntu' => __( 'Ubuntu', 'vw-photography' ),
        'VT323' => __( 'VT323', 'vw-photography' ),
        'Varela Round' => __( 'Varela Round', 'vw-photography' ),
        'Vampiro One' => __( 'Vampiro One', 'vw-photography' ),
        'Vollkorn' => __( 'Vollkorn', 'vw-photography' ),
        'Volkhov' => __( 'Volkhov', 'vw-photography' ),
        'Yanone Kaffeesatz' => __( 'Yanone Kaffeesatz', 'vw-photography' )
		);
	}

	/**
	 * Returns the available font weights.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_weight_choices() {

		return array(
			'' => esc_html__( 'No Fonts weight', 'vw-photography' ),
			'100' => esc_html__( 'Thin',       'vw-photography' ),
			'300' => esc_html__( 'Light',      'vw-photography' ),
			'400' => esc_html__( 'Normal',     'vw-photography' ),
			'500' => esc_html__( 'Medium',     'vw-photography' ),
			'700' => esc_html__( 'Bold',       'vw-photography' ),
			'900' => esc_html__( 'Ultra Bold', 'vw-photography' ),
		);
	}

	/**
	 * Returns the available font styles.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return array
	 */
	public function get_font_style_choices() {

		return array(
			'normal'  => esc_html__( 'Normal', 'vw-photography' ),
			'italic'  => esc_html__( 'Italic', 'vw-photography' ),
			'oblique' => esc_html__( 'Oblique', 'vw-photography' )
		);
	}
}
