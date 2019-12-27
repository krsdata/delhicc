<?php
/* 	Beauty and Spa Theme's Sub Functions
	Copyright: 2014-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 3.0
*/
// 	Social Links
function beautyandspa_social_links( $beautyandspa_sval = '1' ) { 
	 If ( $beautyandspa_sval == '1' ): ?>
	 <div class="social social-link"><?php foreach (range(1, 7 ) as $beautyandspa_numslinksn) { if ( esc_url(beautyandspa_get_option('sl' . $beautyandspa_numslinksn, '')) != '' ): echo '<a href="'. esc_url(beautyandspa_get_option('sl' . $beautyandspa_numslinksn, '')) .'" target="_blank"> </a>'; endif; } ?></div>
	<?php endif; 
	}

// 	Post Meta design
	function beautyandspa_post_meta() { ?>
	<div class="post-meta"> <span class="post-edit"> <?php edit_post_link(__('Edit','beauty-and-spa'),'<span class="fa-edit">','</span>' ); ?></span> <span class="post-author fa-user-md"> <?php the_author_posts_link(); ?> </span> <span class="post-date fa-clock"><?php the_time('F j, Y'); ?></span>	<span class="post-tag fa-tags"> <?php the_tags('' , ', '); ?> </span> <span class="post-category fa-archive"> <?php the_category(', '); ?> </span> <span class="post-comments fa-comments"> <?php comments_popup_link(__('No Comments','beauty-and-spa') . ' &#187;', __('One Comment','beauty-and-spa') . ' &#187;', '% ' . __('Comments','beauty-and-spa') . ' &#187;'); ?> </span>
	</div> 
	
	<?php
	}
	
//	Page Navigation
	function beautyandspa_page_nav() {
		echo '<div class="page-nav">';
			echo paginate_links(array(
				'mid_size'		=> 3,
				'type' 			=> 'list',
				'prev_text'		=> '<span class="fa-arrow-left"></span>  ' . __('Newer', 'beauty-and-spa'),
				'next_text'		=> __('Older', 'beauty-and-spa') .' <span class="fa-arrow-right"></span>',
			 ) );
		echo '</div>';
	}
	
	function beautyandspa_creditline () {
	echo '&copy; ' . date_i18n(__('Y','beauty-and-spa')). ': ' . get_bloginfo( 'name' ). '<span class="credit"> | Beauty and Spa ' . __('Theme by:', 'beauty-and-spa') . ' <a href="'. 		esc_url('https://d5creation.com') .'" target="_blank"> D5 Creation</a> | ' . __('Powered by:', 'beauty-and-spa') . ' <a href="http://wordpress.org" target="_blank">WordPress</a>';
    }


//	Not Found 
	function beautyandspa_not_found() { ?>
		<br /><br />
        <div class="searchinfo">
        <h1 class="page-title fa-times-circle"><?php _e('SORRY, NOT FOUND ANYTHING','beauty-and-spa'); ?></h1>
		<h3 class="arc-src"><span><?php _e('You Can Try Another Search...','beauty-and-spa'); ?></span></h3>
		<?php get_search_form(); ?>
		<p class="backhome"><a href="<?php echo home_url(); ?>" >&laquo; <?php _e('Or Return to the Home Page','beauty-and-spa'); ?></a></p>
        </div>
        <br />
    <?php }		


//	Page Navigation
	function beautyandspa_author_bio( ) { 
	
 	if ( get_the_author_meta('description') != '' ): ?>
            <?php $beautyandspa_authorbio = 
            '<div class="clear"></div>
            <div class="autbio">
             <div class="author-image">
			'. get_avatar( get_the_author_meta('user_email') , 110 ). '
            </div>
            <div class="author-description">
            <h3 class="author-name">'.__('Author : ','beauty-and-spa').' ' . get_the_author() .'</h3>
            
			' . get_the_author_meta('description'). '
            </div>
            </div>';  
			
	if ( is_single() ): echo  $beautyandspa_authorbio; endif; 
	endif;  
	} 
	