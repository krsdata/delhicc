<?php 
function best_news_color_font_css(){?>
	<style type="text/css">
	<?php if(get_theme_mod('best_news_theme_color_setting')):?>
		.template-preloader-rapper {
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.meta span i{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.meta span a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.meta .date i {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.fa-tags:before {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?> !important;
		}

		.breadcrumbs ul li.active a {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.breadcrumbs ul li a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.newsletter {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.cat-title {
			border-bottom: 2px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.cat-title span{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		#scrollUp {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.slicknav_btn {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.date-time li i {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.header-social li:hover a{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.logo .text-logo span {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.main-menu {
			border-top: 3px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.main-menu .nav .dropdown {
			border-top: 2px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.main-menu .nav li.active a, 
		.main-menu .nav li:hover a,
		.main-menu .nav li .dropdown li a:hover,
		.main-menu .nav .dropdown li .dropdown li:hover,
		.main-menu .nav li.active a{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;

		}


		.main-menu .mega-menu .content h2:hover a {
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.main-menu .nav li.mega-menu .author a:hover,
		.main-menu .nav li.mega-menu .content .title-small a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.header .search-form .icon {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.header .search-form .form a{
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-ticker .ticker-title h4 {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-ticker .owl-controls .owl-nav div:hover{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.main-slider .slider-content .category,
		.main-slider .slider-content .post-categories li a {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.main-slider .slider-text h2:hover a{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.main-slider .owl-controls .owl-nav div:hover{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.special-news .title:before{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.special-news .title span{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.special-news .single-news a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-style1 .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-tabs .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-tabs .content .button a{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-tabs .tab-others .title-small a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.video-news .news-head .play{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.video-news .news-head .play:hover{
			background:#fff;
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.video-news .content .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.video-news .single-carousel .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.video-news .owl-dots .owl-dot:hover span,
		.video-news .owl-dots .owl-dot.active span{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-grid .content h2:hover a{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-column .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-column .small-post .title-small:hover a{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-carousel .news-head .play{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-carousel .news-head .play:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-carousel .single-carousel .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-carousel .owl-controls .owl-nav div:hover{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-big .single-news.main .title-medium:hover a{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-column .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-big .small-post .title-small:hover a{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.all-news-tabs .nav-main .nav-tabs {
			border-bottom: 2px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.all-news-tabs .nav-main .nav-tabs li a.active, 
		.all-news-tabs .nav-main .nav-tabs li a:hover {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.all-news-tabs .title-medium a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.all-news-tabs .content .button a{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.single-column .title:before{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.single-column .title span{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.single-column .single-news a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-style1.category .button .btn {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-style1.category .pagination li.active a,
		.news-style1.category .pagination li:hover a {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.meta-share .author img {
			border: 2px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.news-single .news-content blockquote {
			border-left: 5px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.news-single .news-content blockquote::before {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.single-news .content .button a {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.comments-form h2::before {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.comments-form .form .form-group input:hover,
		.comments-form .form .form-group textarea:hover{
			border-bottom-color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.comments-form .form-group .btn {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.blog-sidebar .single-sidebar h2 i {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.blog-sidebar .single-sidebar ul li a i{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.blog-sidebar .post-tab .nav li a.active,
		.blog-sidebar .post-tab .nav li a:hover {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.blog-sidebar .post-tab .post-info a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.blog-sidebar .category ul li a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.blog-sidebar .tags ul li a:hover{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.error-page {
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.error-page .btn:hover,
		.nav-links .page-numbers {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .single-footer h3:before{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .f-link ul li a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .single-news h4 a:hover{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .single-news .date i {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .single-contact i {
			color: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.footer .f-contact p a:hover,
		.footer ul li a:hover {
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .social li a:hover {
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
			border-color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.footer .copyright-content p a,
		.footer .copyright-content p{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}


		#author,#email,#url{
			border: 1px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.form-submit input {
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.form-submit input:hover{
			background:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
		.blog-sidebar .single-sidebar ul li a:before,
		#commentform p a{
			color:<?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}

		.search-submit{
			background: <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
			border: 1px solid <?php echo esc_attr( get_theme_mod( 'best_news_theme_color_setting' ));?>;
		}
	<?php endif;?>

	/*Google Font family */
	<?php if(get_theme_mod('google_fontfamily_setting')):?>
		body,
		.blog-sidebar .single-sidebar h2,
		.blog-sidebar .single-sidebar ul li a,
		.widget_tag_cloud .tagcloud a {
			font-family:<?php echo esc_attr( get_theme_mod('google_fontfamily_setting'));?>;
		}
	<?php endif;?>

	<?php if(get_theme_mod('section_title_google_fontfamily_setting')):?>
		section h1,section h2,section h3,section h4,section h5,section h6{
			font-family:<?php echo esc_attr( get_theme_mod('section_title_google_fontfamily_setting'));?>;
		}
	<?php endif;?>

	<?php if(get_theme_mod('section_description_google_fontfamily_setting')):?>
		section p{
			font-family:<?php echo esc_attr( get_theme_mod('section_description_google_fontfamily_setting'));?>;
		}
	<?php endif;?>
	
</style>
<?php
}
add_action('wp_head','best_news_color_font_css');