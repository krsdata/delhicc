<?php
/**
 * The template part for displaying Audio Post
 *
 * @package VW Photography 
 * @subpackage vw_photography
 * @since VW Photography 1.0
 */
?>
<?php 
  $archive_year  = get_the_time('Y'); 
  $archive_month = get_the_time('m'); 
  $archive_day   = get_the_time('d'); 
?>
<?php
  $content = apply_filters( 'the_content', get_the_content() );
  $audio = false;

  // Only get audio from the content if a playlist isn't present.
  if ( false === strpos( $content, 'wp-playlist-script' ) ) {
    $audio = get_media_embedded_in_content( $content, array( 'audio' ) );
  }
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="post-main-box">
    <?php
      if ( ! is_single() ) {
      // If not a single post, highlight the audio file.
      if ( ! empty( $audio ) ) {
        foreach ( $audio as $audio_html ) {
          echo '<div class="entry-audio">';
            echo $audio_html;
          echo '</div><!-- .entry-audio -->';
        }
      };
      };
    ?>
    <div class="new-text">
      <h3 class="section-title"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?><span class="screen-reader-text"><?php the_title(); ?></span></a></h3>
      <div class="post-info">
        <?php if(get_theme_mod('vw_photography_toggle_postdate',true)==1){ ?>
          <i class="fas fa-calendar-alt"></i><span class="entry-date"><a href="<?php echo esc_url( get_day_link( $archive_year, $archive_month, $archive_day)); ?>"><?php echo esc_html( get_the_date() ); ?><span class="screen-reader-text"><?php echo esc_html( get_the_date() ); ?></span></a></span><span>|</span>
        <?php } ?>

        <?php if(get_theme_mod('vw_photography_toggle_author',true)==1){ ?>
          <i class="far fa-user"></i><span class="entry-author"><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?><span class="screen-reader-text"><?php the_author(); ?></span></a></span><span>|</span>
        <?php } ?>

        <?php if(get_theme_mod('vw_photography_toggle_comments',true)==1){ ?>
          <i class="fa fa-comments" aria-hidden="true"></i><span class="entry-comments"><?php comments_number( __('0 Comment', 'vw-photography'), __('0 Comments', 'vw-photography'), __('% Comments', 'vw-photography') ); ?> </span>
        <?php } ?>
        <hr>
      </div>
      <div class="entry-content"><p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_photography_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_photography_excerpt_number','30')))); ?></p></div>
       <a class="content-bttn" href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More','vw-photography' ); ?>"><?php esc_html_e('READ MORE','vw-photography'); ?><span class="screen-reader-text"><?php esc_html_e( 'READ MORE','vw-photography' );?></span></a>
    </div>
  </div>
</article>