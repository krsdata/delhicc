<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Mag_News
 */
?>

	<?php 
		/**
		 * Hook - mag_news_action_after_content
		 *
		 * @hooked mag_news_content_end -10
		 *
		 */
		do_action( 'mag_news_action_after_content' );
	?>
	<?php 
		/**
		 * Hook - mag_news_action_before_footer
		 *
		 * @hooked mag_news_footer_start -10
		 *
		 */
		do_action( 'mag_news_action_before_footer' );
	?>

	<?php 
		/**
		 * Hook - mag_news_action_footer
		 *
		 * @hooked mag_news_footer_copyright -10
		 *
		 */
		do_action( 'mag_news_action_footer' );
	?>	
	
	<?php 
		/**
		 * Hook - mag_news_action_after_footer
		 *
		 * @hooked mag_news_footer_end -10
		 *
		 */
		do_action( 'mag_news_action_after_footer' );
	?>

	<?php 
		/**
		 * Hook - mag_news_action_footer_content
		 *
		 * @hooked mag_news_footer_social_media -10
		 *
		 */
		do_action( 'mag_news_action_footer_content' );
	?>		

	<?php 
		/**
		 * Hook - mag_news_action_after
		 *
		 * @hooked mag_news_page_end -10
		 *
		 */
		do_action( 'mag_news_action_after' );
	?>

<?php wp_footer(); ?>

</body>
</html>
