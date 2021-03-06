<?php
/**
 * Information about theme
 *
 * @link https://jetpack.com/
 *
 * @package freenews
 */

/*
** Notice after Theme Activation and Update.
*/
function freenews_activation_notice() {
  global $current_user;
    $current_user_id   = $current_user->ID;
  $theme_data  = wp_get_theme();
  if ( !get_user_meta( $current_user_id, esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore' ) ) {

    echo '<div class="notice freenews-dismiss">';
    
      echo '<h1>';
        /* translators: %s theme name */
        printf( esc_html__( 'Welcome to %s', 'freenews' ), esc_html( $theme_data->Name ) );
      echo '</h1>';
      echo '<p>';
        printf( __( 'Thank you for choosing %1$s! To fully take advantage of our best theme, make sure you visit Welcome page', 'freenews' ), esc_html( $theme_data->Name ), esc_url( admin_url( 'themes.php?page=freenews-about' ) ) );
        printf( '<a href="%1$s" class="notice-dismiss dashicons dashicons-dismiss dashicons-dismiss-icon"></a>', '?' . esc_html( $theme_data->get( 'TextDomain' ) ) . '_notice_ignore=0' );
      echo '</p>';
      echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=freenews-about' ) ) .'" class="button button-primary">';
        printf( esc_html__( 'Get started with %s', 'freenews' ), esc_html( $theme_data->Name ) );
      echo '</a></p>';

    echo '</div>';
  }
}