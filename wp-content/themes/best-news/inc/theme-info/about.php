<?php
/**
 * About configuration
 *
 * @package Best_News
 */

$config = array(
	'menu_name' => esc_html__( 'Best News Setup', 'best-news' ),
	'page_name' => esc_html__( 'Best News Setup', 'best-news' ),

	/* translators: theme version */
	'welcome_title' => sprintf( esc_html__( 'Welcome to %s - ', 'best-news' ), 'Best News' ),

	/* translators: 1: theme name */
	'welcome_content' => sprintf( esc_html__( 'We hope this page will help you to setup %1$s with few clicks. We believe you will find it easy to use and perfect for your website development.', 'best-news' ), 'Best News' ),

	// Quick links.
	'quick_links' => array(
		'theme_url' => array(
			'text' => esc_html__( 'Theme Details','best-news' ),
			'url'  => esc_url('https://www.postmagthemes.com/downloads/best-news-free-newspaper-wordpress-theme/'),
		),
		'demo_url' => array(
			'text' => esc_html__( 'View Demo','best-news' ),
			'url'  => esc_url('https://www.postmagthemes.com/demobestnews/'),
		),
		'documentation_url' => array(
			'text'   => esc_html__( 'Documentation','best-news' ),
			'url'    => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/'),
		)
	),

	// Tabs.
	'tabs' => array(
		'getting_started'     => esc_html__( 'Getting Started', 'best-news' ),
		'recommended_actions' => esc_html__( 'Recommended Actions', 'best-news' ),
		'support'             => esc_html__( 'Support', 'best-news' ),
	),

	// Getting started.
	'getting_started' => array(
		array(
			'title'               => esc_html__( 'Theme Documentation', 'best-news' ),
			'text'                => esc_html__( 'Find step by step instructions to setup theme easily.', 'best-news' ),
			'button_label'        => esc_html__( 'View documentation', 'best-news' ),
			'button_link'         => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/'),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => true,
		),
		array(
			'title'               => esc_html__( 'Recommended Actions', 'best-news' ),
			'text'                => esc_html__( 'We recommend few steps to take so that you can get complete site like shown in demo.', 'best-news' ),
			'button_label'        => esc_html__( 'Check recommended actions', 'best-news' ),
			'button_link'         => esc_url( admin_url( 'themes.php?page=best-news-about&tab=recommended_actions' ) ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
		array(
			'title'               => esc_html__( 'Customize Everything', 'best-news' ),
			'text'                => esc_html__( 'Start customizing every aspect of the website with customizer.', 'best-news' ),
			'button_label'        => esc_html__( 'Go to Customizer', 'best-news' ),
			'button_link'         => esc_url( wp_customize_url() ),
			'is_button'           => true,
			'recommended_actions' => false,
			'is_new_tab'          => false,
		),
	),

	// Recommended actions.
	'recommended_actions' => array(
		'content' => array(
			'one-click-demo-import' => array(
				'title'       => esc_html__( 'One Click Demo Import', 'best-news' ),
				'description' => esc_html__( 'Please install the One Click Demo Import plugin to import the demo content. After activation go to Appearance >> Import Demo Data and import it.', 'best-news' ),
				'check'       => class_exists( 'OCDI_Plugin' ),
				'plugin_slug' => 'one-click-demo-import',
				'id'          => 'one-click-demo-import',
			),

		),
	),

	// Support.
	'support_content' => array(
		'first' => array(
			'title'        => esc_html__( 'Contact Support', 'best-news' ),
			'icon'         => 'dashicons dashicons-sos',
			'text'         => esc_html__( 'If you have any problem, feel free to create ticket on our dedicated support forum.', 'best-news' ),
			'button_label' => esc_html__( 'Contact Support', 'best-news' ),
			'button_link'  => esc_url('https://www.postmagthemes.com/contact'),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'second' => array(
			'title'        => esc_html__( 'Theme Documentation', 'best-news' ),
			'icon'         => 'dashicons dashicons-book-alt',
			'text'         => esc_html__( 'Kindly check our theme documentation for detailed information and video instructions.', 'best-news' ),
			'button_label' => esc_html__( 'View Documentation', 'best-news' ),
			'button_link'  => esc_url('https://www.postmagthemes.com/docs/documentation-of-best-news-and-pro/'),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
		'third' => array(
			'title'        => esc_html__( 'Customization Request', 'best-news' ),
			'icon'         => 'dashicons dashicons-admin-tools',
			'text'         => esc_html__( 'This is 100% free theme and has premium version. Upgrade to pro for extra freatures and feel free to contact us any time if you need any customization service.', 'best-news' ),
			'button_label' => esc_html__( 'Upgrade to Pro', 'best-news' ),
			'button_link'  => esc_url('https://www.postmagthemes.com/downloads/pro-best-news-newspaper-wordpress-theme/'),
			'is_button'    => true,
			'is_new_tab'   => true,
		),
	),


);
Best_News_About::init( apply_filters( 'best_news_about_filter', $config ) );