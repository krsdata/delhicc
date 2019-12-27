<?php
/**
 * Template part for displaying posts
 * @package WordPress
 * @subpackage nikhar-spa-salon
 * @since 1.0
 * @version 1.4
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('inner-service'); ?>>
  <div class="article_content">   
    <div class="article-text">
      <h4><?php the_title();?></h4>       
      <img src="<?php the_post_thumbnail_url('full'); ?>"/>   
      <div class="metabox1"> 
        <span class="entry-date"><?php the_time( get_option( 'date_format' ) ); ?></span><span>|</span>
        <span class="entry-author"><?php the_author(); ?></span><span>|</span>
        <span class="entry-comments"><?php comments_number( __('0 Comments','nikhar-spa-salon'), __('0 Comments','nikhar-spa-salon'), __('% Comments','nikhar-spa-salon') ); ?></span>
      </div>
      <p><?php the_content(); ?></p>      
    </div>
    <div class="clearfix"></div> 
  </div>
</div>