<?php

/* 	Beauty and Spa Theme's Slide Part of Front Page
	Copyright: 2012-2017, D5 Creation, www.d5creation.com
	Based on the Simplest D5 Framework for WordPress
	Since Beauty and Spa 1.0
*/

?>
<?php if ( esc_attr(beautyandspa_get_option ( 'sfpsld' , '') == '1' ) || esc_attr(beautyandspa_get_option ( 'dsfp' , '')) == '1' ): ?>
<div class="box100">
<div id="mslideback"> </div>
<div class="clear"></div>
	<div class="box90">
		<div id="slide-container"><div class="scontainer"><div class="box_skitter box_skitter_large">
        	<ul>
				<?php foreach (range(1, 3) as $beautyandspa_sinumberr)  { if ( esc_url(beautyandspa_get_option('slide-image' . $beautyandspa_sinumberr,  get_template_directory_uri() . '/images/slide-image/slide-image' . $beautyandspa_sinumberr . '.jpg')) != '' ): ?>
					<li><img src="<?php echo esc_url(beautyandspa_get_option('slide-image' . $beautyandspa_sinumberr,  get_template_directory_uri() . '/images/slide-image/slide-image' . $beautyandspa_sinumberr . '.jpg')); ?>" /></li>
				<?php endif; }  ?>
			</ul>

		</div ></div></div> <!-- slide-container -->
	</div>
</div>
<div class="clear"></div>
<?php endif; ?>

