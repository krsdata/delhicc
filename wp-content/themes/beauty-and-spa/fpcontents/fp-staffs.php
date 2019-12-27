<?php 
/* 	Beauty and Spa Theme's Staff Part
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/

?>
<?php if ( esc_attr(beautyandspa_get_option('staffbox', '1')) == '1' ): ?>
<?php
$beautyandspa_users = new WP_User_Query('blog_id='.get_current_blog_id());
if ( ! empty( $beautyandspa_users->results ) ) :

?>

<div class="clear"></div>
<div id="staff-box-item" class="staffbox-item">
	<h2 class="boxtoptitle" ><?php echo esc_textarea(beautyandspa_get_option('staffboxes-heading', __('WE ARE INSIDE','beauty-and-spa'))); ?></h2>

			<div class="staff-box">
				<?php foreach ( $beautyandspa_users->results as $beautyandspa_userx ) { ?><!--
				--><div class="view-staff">
                		<div class="feaimage"><div class="fpthumb"><?php echo get_avatar( esc_html($beautyandspa_userx->user_email), 300 ); ?></div><div class="fiover"><div class="fiotext">+</div></div></div>
                	<div class="staff-name-box socialnormal">
                    <h4><?php echo esc_html($beautyandspa_userx->display_name); ?></h4>
                    <p><?php echo esc_html($beautyandspa_userx->role); ?></p>                                   
					</div>
				
                </div><!--
       			--><?php } ?>
			</div>
</div>
<div class="clear"></div>
<?php endif; ?>

<?php endif; ?>
