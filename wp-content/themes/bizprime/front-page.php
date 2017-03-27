<?php
/**
 * The template for displaying home page.
 * @package Bizprime
 */

get_header();
if ( 'posts' == get_option( 'show_on_front' ) ) {
    include( get_home_template() );
    }
else{
	if ((bizprime_get_option('show_slider_section') != 1) && (bizprime_get_option('show_blog_section') != 1) &&  (bizprime_get_option('show-our-service-section') != 1)) {
		if ( current_user_can( 'edit_theme_options' ) ) { ?>
			<section class="wrapper display-info">
				<div class="container">
				<?php echo sprintf(
					__( 'All Section are based on page and post. Enable each Section from customizer </br> eg: for slider section : Home/Front Page Settings -> Slider Section -> Enable Slider. </br>likewise to other sections %s', 'bizprime' ),
					'<a class="btn twp-btn twp-btn-primary" href="' . esc_url( admin_url( 'customize.php' ) ) . '">' . __( 'click here', 'bizprime' ) . '</a>'
					); ?>
				</div>
			</section>
		<?php }
	}
	else{
	/**
	 * bizprime_action_front_page hook
	 * @since Bizprime 0.0.2
	 *
	 * @hooked bizprime_action_front_page -  10
	 * @sub_hooked bizprime_action_front_page -  10
	 */
	do_action( 'bizprime_action_front_page' );
		if (bizprime_get_option('home_page_content_status') == 1) {
			?>
			<section class="section-block recent-blog">
					<div id="primary" class="content-area">
					<?php
					while ( have_posts() ) : the_post();
						the_title('<h2 class="entry-title section-title">', '</h2>');
						get_template_part( 'template-parts/content', 'page' );

					endwhile; // End of the loop.
					?>
					</div><!-- #primary -->
					<aside id="secondary" class="widget-area" role="complementary">
						<div class="sidebar-full-width">
						<?php get_sidebar(); ?>
						</div>
					</aside>
			</section>
		<?php }
	}
}
get_footer();