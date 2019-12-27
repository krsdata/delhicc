<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Classy Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
$classy_lite_show_site_slider_area 	  		= get_theme_mod('classy_lite_show_site_slider_area', false);
$classy_lite_show_services_3_box_section 	= get_theme_mod('classy_lite_show_services_3_box_section', false);
$classy_lite_show_aboutus_pagearea	        = get_theme_mod('classy_lite_show_aboutus_pagearea', false);
?>
<div id="site_layout" <?php if( get_theme_mod( 'classy_lite_boxlayout' ) ) { echo 'class="boxlayout"'; } ?>>
<?php
if ( is_front_page() && !is_home() ) {
	if( !empty($classy_lite_show_site_slider_area)) {
	 	$inner_cls = '';
	}
	else {
		$inner_cls = 'siteinner';
	}
}
else {
$inner_cls = 'siteinner';
}
?>

<div class="site-header <?php echo esc_attr($inner_cls); ?>"> 
  <div class="container"> 
     <div class="logo">
        <?php classy_lite_the_custom_logo(); ?>
           <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
                <p><?php echo esc_html($description); ?></p>
            <?php endif; ?>
      </div><!-- logo -->
        
      <div class="site_hdr_right">
       <div class="toggle">
         <a class="toggleMenu" href="#"><?php esc_html_e('Menu','classy-lite'); ?></a>
       </div><!-- toggle --> 
         <div class="site_navigation">                   
            <?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
         </div><!--.site_navigation -->
        </div><!--.site_hdr_right -->
      <div class="clear"></div>  
  </div><!-- .container -->   
  </div><!--.site-header --> 
  
<?php 
if ( is_front_page() && !is_home() ) {
if($classy_lite_show_site_slider_area != '') {
	for($i=1; $i<=3; $i++) {
	  if( get_theme_mod('classy_lite_site_slider_pgearea'.$i,false)) {
		$slider_Arr[] = absint( get_theme_mod('classy_lite_site_slider_pgearea'.$i,true));
	  }
	}
?> 
<div class="top_slider_area">                
<?php if(!empty($slider_Arr)){ ?>
<div id="slider" class="nivoSlider">
<?php 
$i=1;
$slidequery = new WP_Query( array( 'post_type' => 'page', 'post__in' => $slider_Arr, 'orderby' => 'post__in' ) );
while( $slidequery->have_posts() ) : $slidequery->the_post();
$image = wp_get_attachment_url( get_post_thumbnail_id($post->ID)); 
$thumbnail_id = get_post_thumbnail_id( $post->ID );
$alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true); 
?>
<?php if(!empty($image)){ ?>
<img src="<?php echo esc_url( $image ); ?>" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php }else{ ?>
<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/slides/slider-default.jpg" title="#slidecaption<?php echo esc_attr( $i ); ?>" alt="<?php echo esc_attr($alt); ?>" />
<?php } ?>
<?php $i++; endwhile; ?>
</div>   

<?php 
$j=1;
$slidequery->rewind_posts();
while( $slidequery->have_posts() ) : $slidequery->the_post(); ?>                 
    <div id="slidecaption<?php echo esc_attr( $j ); ?>" class="nivo-html-caption">     
      <div class="custominfo">       
    	<h2><?php the_title(); ?></h2>
    	<?php the_excerpt(); ?>
		<?php
        $classy_lite_site_slider_readmore_btntext = get_theme_mod('classy_lite_site_slider_readmore_btntext');
        if( !empty($classy_lite_site_slider_readmore_btntext) ){ ?>
            <a class="slide_morebtn" href="<?php the_permalink(); ?>"><?php echo esc_html($classy_lite_site_slider_readmore_btntext); ?></a>
        <?php } ?>
       </div><!-- .custominfo -->                    
    </div>   
<?php $j++; 
endwhile;
wp_reset_postdata(); ?>  
<div class="clear"></div>  
</div><!--end .top_slider_area -->     
<?php } ?>
<?php } } ?>
       
        
<?php if ( is_front_page() && ! is_home() ) {
 if( $classy_lite_show_services_3_box_section != ''){ ?>  
  <div id="services_wrapper">
     <div class="container">        
       <?php 
        for($n=1; $n<=3; $n++) {    
        if( get_theme_mod('classy_lite_our_services_page_box'.$n,false)) {      
            $queryvar = new WP_Query('page_id='.absint(get_theme_mod('classy_lite_our_services_page_box'.$n,true)) );		
            while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
            <div class="services_3_column <?php if($n % 3 == 0) { echo "last_column"; } ?>">                                       
                <?php if(has_post_thumbnail() ) { ?>
                <div class="services_imgcol"><a class="hvr-float" href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>        
                <?php } ?>              	
                  <h3 class="titlebx<?php echo esc_attr( $n ); ?>"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>                       
            </div>
            <?php endwhile;
            wp_reset_postdata();                                  
        } } ?>                                 
    <div class="clear"></div>  
   </div><!-- .container -->
</div><!-- #services_wrapper -->               
                	      
<?php } ?>



<?php if( $classy_lite_show_aboutus_pagearea != ''){ ?>  
<section id="about_wrapper">
<div class="container">                               
<?php 
if( get_theme_mod('classy_lite_site_aboutus_pagearea',false)) {     
$queryvar = new WP_Query('page_id='.absint(get_theme_mod('classy_lite_site_aboutus_pagearea',true)) );			
    while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>     
     <div class="welcome_imagebx"><a class="hvr-trim" href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a></div>    
     <div class="welcome_content_column">   
     <h3><?php the_title(); ?></h3>   
     <?php the_excerpt(); ?>
     <a class="btnstyle1" href="<?php the_permalink(); ?>"><?php esc_html_e('Read more','classy-lite'); ?></a>  	
    </div>                                          
    <?php endwhile;
     wp_reset_postdata(); ?>                                    
    <?php } ?>                                 
<div class="clear"></div>                       
</div><!-- container -->
</section><!-- #about_wrapper-->
<?php } ?>

<?php } ?>