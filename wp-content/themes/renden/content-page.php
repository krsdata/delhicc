<?php
/**
 * The Page content template file.
 *
 * @package ThinkUpThemes
 */
?>

		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'renden' ), 'after'  => '</div>', ) ); ?>

		</article>