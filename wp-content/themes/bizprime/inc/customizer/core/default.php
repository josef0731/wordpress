<?php
/**
 * Default theme options.
 *
 * @package bizprime
 */

if ( ! function_exists( 'bizprime_get_default_theme_options' ) ) :

	/**
	 * Get default theme options
	 *
	 * @since 1.0.0
	 *
	 * @return array Default theme options.
	 */
	function bizprime_get_default_theme_options() {

		$defaults = array();

		//headeing section:
		$defaults['top_header_location']				= '';
		$defaults['top_header_telephone']				= '';
		$defaults['top_header_email']					= '';
		
		
		// Slider Section.
		$defaults['show_slider_section']				= 0;
		$defaults['number_of_home_slider']				= 3;
		$defaults['number_of_content_home_slider']		= 30;
		$defaults['select_slider_from']					= 'from-category';
		$defaults['select-page-for-slider']				= 0;
		$defaults['select_category_for_slider']			= 1;
		$defaults['button_text_on_slider']				= esc_html__( 'Browse More', 'bizprime' );
		
		/*Latest Blog Default Value*/
		$defaults['show_blog_section']					= 0;
		$defaults['main_title_blog_section']			= esc_html__( 'Latest Blog', 'bizprime' );
		$defaults['number_of_excerpt_home_blog']		= 40;
		$defaults['select_category_for_blog']			= 0;
		$defaults['blog_button_text']					= esc_html__( 'ALL NEWS ON OUR BLOG', 'bizprime' );
		$defaults['blog_button_link']					= '';


		/*callback section*/
		$defaults['show_our_callback_section']			= 0;
		$defaults['select_callback_page']				= 0;
		$defaults['show_page_link_button']				= 1;
		$defaults['callback_button_text']				= esc_html__( 'Buy Now', 'bizprime' );
		$defaults['callback_button_link']				= '';

		/*portfolio section*/
		$defaults['show_portfolio_section']				= 0;
		$defaults['main_title_portfolio_section']		= esc_html__( 'Portfolio', 'bizprime' );
		$defaults['select_category_for_portfolio']		= 0;
		$defaults['portfolio_button_text']				= esc_html__( 'View More', 'bizprime' );
		$defaults['portfolio_button_link']				= '';


		/*intro section*/
		$defaults['show_our_intro_section']				= 0;
		$defaults['select_intro_main_page']				= 0;
		$defaults['number_of_content_home_intro']		= 30;
		$defaults['number_of_home_intro_icon_1']		= 'ion-android-bulb';
		$defaults['select_page_for_intro_1']			= 0;

		/*layout*/
		$defaults['home_page_content_status']     	= 1;
		$defaults['enable_overlay_option']			= 1;
		$defaults['enable_moving_animation_option']	= 1;
		$defaults['homepage_layout_option']			= 'full-width';
		$defaults['global_layout']					= 'right-sidebar';
		$defaults['excerpt_length_global']			= 50;
		$defaults['archive_layout']					= 'excerpt-only';
		$defaults['archive_layout_image']			= 'right';
		$defaults['single_post_image_layout']		= 'full';
		$defaults['pagination_type']				= 'default';
		$defaults['copyright_text']					= esc_html__( 'Copyright All right reserved', 'bizprime' );
		$defaults['social_icon_style']				= 'square';
		$defaults['number_of_footer_widget']		= 3;
		$defaults['breadcrumb_type']				= 'simple';

		// Pass through filter.
		$defaults = apply_filters( 'bizprime_filter_default_theme_options', $defaults );

		return $defaults;

	}

endif;
