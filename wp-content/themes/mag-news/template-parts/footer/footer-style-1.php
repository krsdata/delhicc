<?php
/**
 * Footer Template file
 *
 * @package Mag_News
 */
?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) ) : ?>

	<div class="footer-widget-holder"> <!-- widget area starting from here -->
		<div class="container">
			<div class="row">
				<?php
				$column_count = 0;
				$class_coloumn =12;
				for ( $i = 1; $i < 4; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) {
						$column_count++;
						$class_coloumn = 12/$column_count;
					}
				} ?>

				<?php $column_class = 'custom-col-' . absint( $class_coloumn );
				for ( $i = 1; $i <= 4 ; $i++ ) {
					if ( is_active_sidebar( 'footer-' . $i ) ) { ?>
						<div class="<?php echo esc_attr( $column_class ); ?>">
							<?php dynamic_sidebar( 'footer-' . $i ); ?>
						</div>
					<?php }
				} ?>
			</div>
		</div>

	</div> <!-- widget area starting from here -->
<?php endif;?> 	