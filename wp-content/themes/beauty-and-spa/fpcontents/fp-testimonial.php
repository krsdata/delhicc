<?php 
/* 	Beauty and Spa Theme's Testiminial Part
	Copyright: 2015-2016, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/

?>

<?php if ( esc_attr(beautyandspa_get_option('tes-cln', '1')) == '1' ): 
$beautyandspa_tes = get_comments(array( 'status' => 'approve', 'number' => '3' ));
if ( $beautyandspa_tes ):
?>

<div class="clear"></div>
<div class="box100 tesback" id="testimonial-box-item">
	<h2 class="boxtoptitle box90"><?php echo wp_kses_post(beautyandspa_get_option('testimonial-text', 'Sweet Words from our <em>Proud Clients</em> Worldwide')); ?></h2><br />
	<div class="box90 testimonialslider scslider"><!--
			--><div id="customers-comment" class="featured-boxs testimoni-slider"><!--
				--><?php foreach($beautyandspa_tes as $beautyandspa_tesm) {
 				echo '<div class="testimoni featured-box"><div class="fpage-quote"><h3>'.date('l F j, Y', strtotime(esc_html($beautyandspa_tesm->comment_date))).'</h3><p class="fboxp">' . esc_html($beautyandspa_tesm->comment_content). '</p></div><div class="arrow-down"> </div>'.get_avatar( esc_html($beautyandspa_tesm->comment_author_email ), 60 ).'<h4 class="quotewriter">'.esc_html($beautyandspa_tesm->comment_author).'</h4></div>';  
				}
				?><!--
		--></div><!--
	--></div>
</div>
<div class="clear"></div>
<?php endif; endif; ?>