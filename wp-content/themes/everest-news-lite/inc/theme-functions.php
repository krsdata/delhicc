<?php
/**
 * Custom functions for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Everest_News
 */

/*
 * Function to get header social links
 */
if( ! function_exists( 'everest_news_lite_get_header_social_links' ) ) {

	function everest_news_lite_get_header_social_links() {
		
		$facebook_link = everest_news_get_option( 'everest_news_facebook_link' );
		$twitter_link = everest_news_get_option( 'everest_news_twitter_link' );
		$instagram_link = everest_news_get_option( 'everest_news_instagram_link' );
		$vk_link = everest_news_get_option( 'everest_news_vk_link' );
		$linkedin_link = everest_news_get_option( 'everest_news_linkedin_link' );
		$pinterest_link = everest_news_get_option( 'everest_news_pinterest_link' );
		$reddit_link = everest_news_get_option( 'everest_news_reddit_link' );
		$quora_link = everest_news_get_option( 'everest_news_quora_link' );
		$whatsapp_link = get_theme_mod( 'everest_news_lite_whatsapp_link', '' );
		$youtube_link = get_theme_mod( 'everest_news_lite_youtube_link', '' );
		?>
		<ul class="social-icons-list">
			<?php
			if( !empty( $facebook_link ) ) {
				?>
				<li class="facebook"><a href="<?php echo esc_url( $facebook_link ); ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
				<?php
			}
			if( !empty( $twitter_link ) ) {
				?>
				<li class="twitter"><a href="<?php echo esc_url( $twitter_link ); ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
				<?php
			}
			if( !empty( $instagram_link ) ) {
				?>
				<li class="instagram"><a href="<?php echo esc_url( $instagram_link ); ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
				<?php
			}if( !empty( $vk_link ) ) {
				?>
				<li class="vk"><a href="<?php echo esc_url( $vk_link ); ?>" target="_blank"><i class="fab fa-vk"></i></a></li>
				<?php
			}
			if( !empty( $linkedin_link ) ) {
				?>
				<li class="linkedin"><a href="<?php echo esc_url( $linkedin_link ); ?>" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
				<?php
			}
			if( !empty( $pinterest_link ) ) {
				?>
				<li class="pinterest"><a href="<?php echo esc_url( $pinterest_link ); ?>" target="_blank"><i class="fab fa-pinterest-p"></i></a></li>
				<?php
			}if( !empty( $reddit_link ) ) {
				?>
				<li class="reddit"><a href="<?php echo esc_url( $reddit_link ); ?>" target="_blank"><i class="fab fa-reddit-alien"></i></a></li>
				<?php
			}
			if( !empty( $quora_link ) ) {
				?>
				<li class="quora"><a href="<?php echo esc_url( $quora_link ); ?>" target="_blank"><i class="fab fa-quora"></i></a></li>
				<?php
			}
            if( !empty( $whatsapp_link ) ) {
				?>
				<li class="whatsapp"><a href="<?php echo esc_url( $whatsapp_link ); ?>" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
				<?php
			}
            if( !empty( $youtube_link ) ) {
				?>
				<li class="youtube"><a href="<?php echo esc_url( $youtube_link ); ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
				<?php
			}

			
        	?>
        </ul><!-- .social-icons-list -->
		<?php
	}
}