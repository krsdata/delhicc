<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mag_News
 */

?><?php
	/**
	 * Hook - mag_news_action_doctype.
	 *
	 * @hooked mag_news_doctype -  10
	 */
	do_action( 'mag_news_action_doctype' );
?>

<head>
	<?php
	/**
	 * Hook - mag_news_action_head.
	 *
	 * @hooked mag_news_head -  10
	 */
	do_action( 'mag_news_action_head' );
	?>

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php
		/**
		 * Hook - mag_news_action_before.
		 *
		 * @hooked mag_news_page_start - 10
		 * 
		 */
		do_action( 'mag_news_action_before' );	?>

	<?php 
		/**
		 * Hook - mag_news_action_before_header
		 *
		 * @hooked mag_news_header_start -10
		 *
		 */
		do_action( 'mag_news_action_before_header' );
	?>
	<?php 
		/**
		 * Hook - mag_news_action_header
		 *
		 * @hooked mag_news_site_branding -10
		 *
		 */
		do_action( 'mag_news_action_header' );
	?>
	<?php 
		/**
		 * Hook - mag_news_action_after_header
		 *
		 * @hooked mag_news_header_end -10
		 *
		 */
		do_action( 'mag_news_action_after_header' );
	?>

	<?php 
		/**
		 * Hook - mag_news_action_before_content
		 *
		 * @hooked mag_news_content_start -10
		 *
		 */
		do_action( 'mag_news_action_before_content' );
	?>
