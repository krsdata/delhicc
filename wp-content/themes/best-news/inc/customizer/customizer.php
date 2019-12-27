<?php
/**
 * Best_News Theme Customizer
 *
 * @package Best_News
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function best_news_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'best_news_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'best_news_customize_partial_blogdescription',
		) );
	}

	//Upgrade to Pro
	// Register custom section types.
	$wp_customize->register_section_type( 'Best_News_Customize_Section_Upsell' );

	// Register sections.
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell',
			array(
				'title'    => esc_html__( 'Go Pro', 'best-news' ),
				'pro_text' => esc_html__( 'Buy Pro Best News', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/downloads/pro-best-news-newspaper-wordpress-theme/'),
				'priority' => 1,
			)
		)
	);
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell2',
			array(
				'title'    => esc_html__( 'View', 'best-news' ),
				'pro_text' => esc_html__( 'All documents', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/'),
				'priority' => 2,
				'panel'          => 'best_news_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell3',
			array(
				'title'    => esc_html__( 'Video', 'best-news' ),
				'pro_text' => esc_html__( 'Setup as newspaper page', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/quick-setup-guide-as-per-demo/video-guide-for-best-news-free-version/'),
				'priority' => 3,
				'panel'          => 'best_news_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell4',
			array(
				'title'    => esc_html__( 'Text', 'best-news' ),
				'pro_text' => esc_html__( 'Setup as blog page', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/quick-setup-guide-for-setting-your-homepage-as-blog-page/'),
				'priority' => 4,
				'panel'          => 'best_news_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell5',
			array(
				'title'    => esc_html__( 'Video', 'best-news' ),
				'pro_text' => esc_html__( 'One click demo installation', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/video-guide-for-one-click-demo-import-for-setting-theme/'),
				'priority' => 5,
				'panel'          => 'best_news_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell6',
			array(
				'title'    => esc_html__( 'Video', 'best-news' ),
				'pro_text' => esc_html__( 'How to buy Pro theme', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/how-to-buy-premium-theme-from-postmagthemes-com/'),
				'priority' => 6,
				'panel'          => 'best_news_document_panel',
			)
		)
	);
	$wp_customize->add_section(
		new Best_News_Customize_Section_Upsell(
			$wp_customize,
			'theme_upsell7',
			array(
				'title'    => esc_html__( 'Text', 'best-news' ),
				'pro_text' => esc_html__( 'Brief introduction', 'best-news' ),
				'pro_url'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/brief-introduction-of-layout-including-widget/'),
				'priority' => 7,
				'panel'          => 'best_news_document_panel',
			)
		)
	);
	
}
add_action( 'customize_register', 'best_news_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function best_news_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function best_news_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function best_news_customize_preview_js() {
	wp_enqueue_script( 'best-news-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'best_news_customize_preview_js' );

/**
 * Enqueue required scripts/styles for customizer panel
 *
 * @since 1.0.0
 */
function best_news_customize_backend_scripts() {
	wp_enqueue_script( 'best_news-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.js', array( 'customize-controls' ) );
	wp_enqueue_style( 'best_news-customize-controls', get_template_directory_uri() . '/inc/upgrade-to-pro/pro.css' );
}
add_action( 'customize_controls_enqueue_scripts', 'best_news_customize_backend_scripts', 10 );


/*----------------------------------------------------------------------------------------------------------------------------------------*/
/**
 * Load customizer required panels.
 */
require_once trailingslashit( get_template_directory() ) . '/inc/upgrade-to-pro/control.php';
require get_template_directory() . '/inc/customizer/general-panel.php';
require get_template_directory() . '/inc/customizer/header-panel.php';
require get_template_directory() . '/inc/customizer/footer-panel.php';
require get_template_directory() . '/inc/customizer/blog-panel.php';
require get_template_directory() . '/inc/customizer/other-panel.php';

require get_template_directory() . '/inc/customizer/customizer-sanitize.php';
require get_template_directory() . '/inc/customizer/customizer-css.php';

/**
* color setting
*/
require_once get_template_directory() . '/inc/customizer/customizer-color.php';