<?php
/**
 * Theme functions related to structure.
 *
 * This file contains structural hook functions.
 *
 * @package Mag_News
 */

if ( ! function_exists( 'mag_news_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since 1.0.0
	 */
	function mag_news_doctype() {
	?><!DOCTYPE html> <html <?php language_attributes(); ?>><?php
	}
endif;

add_action( 'mag_news_action_doctype', 'mag_news_doctype', 10 );

if ( !function_exists( 'mag_news_head' ) ) :
	/**
	 * Header Codes.
	 *
	 * @since 1.0.0
	 */
	function mag_news_head() {
	?>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"> 
	<?php
	}
endif;

add_action( 'mag_news_action_head', 'mag_news_head', 10 );

if ( ! function_exists( 'mag_news_page_start' ) ) :
	/**
	 * Page Start.
	 *
	 * @since 1.0.0
	 */
	function mag_news_page_start() {
	$enable_preloader = mag_news_get_option( 'enable_preloader' ); 
	?>
	<?php if ( true == $enable_preloader ): ?>
		<div class="preloader"></div>
	<?php endif; ?>
    <div id="page" class="hfeed site">
    	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'mag-news' ); ?></a>
    <?php
	}
endif;
add_action( 'mag_news_action_before', 'mag_news_page_start' );

if ( ! function_exists( 'mag_news_page_end' ) ) :
	/**
	 * Page End.
	 *
	 * @since 1.0.0
	 */
	function mag_news_page_end() {
	?></div><!-- #page --><?php
	}
endif;
add_action( 'mag_news_action_after', 'mag_news_page_end' );

if ( ! function_exists( 'mag_news_content_start' ) ) :
	/**
	 * Content Start.
	 *
	 * @since 1.0.0
	 */
	function mag_news_content_start() {
	?><div id="content" class="site-content"><?php
	}
endif;
add_action( 'mag_news_action_before_content', 'mag_news_content_start' );


if ( ! function_exists( 'mag_news_content_end' ) ) :
	/**
	 * Content End.
	 *
	 * @since 1.0.0
	 */
	function mag_news_content_end() {
	?></div><!-- #content --><?php
	}
endif;
add_action( 'mag_news_action_after_content', 'mag_news_content_end' );


if ( ! function_exists( 'mag_news_header_start' ) ) :
	/**
	 * Header Start
	 *
	 * @since 1.0.0
	 */
	function mag_news_header_start() {
	?>
	<header id="masthead" class="site-header"> <!-- header starting from here --><?php	
	}
endif;

add_action( 'mag_news_action_before_header', 'mag_news_header_start', 10 );


if ( ! function_exists( 'mag_news_header_end' ) ) :
	/**
	 * Header End
	 *
	 * @since 1.0.0
	 */
	function mag_news_header_end() {
	?></header><!-- header ends here --><?php	
	}
endif;
add_action( 'mag_news_action_after_header', 'mag_news_header_end', 10 );

if ( ! function_exists( 'mag_news_footer_start' ) ) :
	/**
	 * Footer Start.
	 *
	 * @since 1.0.0
	 */
	function mag_news_footer_start() {
	?>
	<footer id="colophon" class="site-footer"> <!-- footer starting from here --> 
	<?php
	}
endif;
add_action( 'mag_news_action_before_footer', 'mag_news_footer_start' );


if ( ! function_exists( 'mag_news_footer_end' ) ) :
	/**
	 * Footer End.
	 *
	 * @since 1.0.0
	 */
	function mag_news_footer_end() {
	?></footer><!-- #colophon --><?php
	}
endif;
add_action( 'mag_news_action_after_footer', 'mag_news_footer_end' );
