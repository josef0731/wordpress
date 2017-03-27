<?php
/**
 * Content Blocks Widget
 *
 * @package    Hoot
 * @subpackage Divogue
 */

/**
* Class Hoot_Content_Blocks_Widget
*/
class Hoot_Content_Blocks_Widget extends HybridExtend_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-content-blocks-widget';
		$settings['name'] = __( 'Hoot > Content Blocks', 'divogue' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Styled Content Blocks.', 'divogue'),
			'class'			=> 'hoot-content-blocks-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( "Title (optional)", 'divogue' ),
				'id'		=> 'title',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Blocks Style', 'divogue' ),
				'id'		=> 'style',
				'type'		=> 'images',
				'std'		=> 'style1',
				'options'	=> array(
					'style1'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-1.png',
					'style2'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-2.png',
					'style3'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-3.png',
					'style4'	=> HYBRIDEXTEND_INCURI . 'admin/images/content-block-style-4.png',
				),
			),
			array(
				'name'		=> __( 'No. Of Columns', 'divogue' ),
				'id'		=> 'columns',
				'type'		=> 'select',
				'std'		=> '3',
				'options'	=> array(
					'1'	=> __( '1', 'divogue' ),
					'2'	=> __( '2', 'divogue' ),
					'3'	=> __( '3', 'divogue' ),
					'4'	=> __( '4', 'divogue' ),
					'5'	=> __( '5', 'divogue' ),
				),
			),
			array(
				'name'		=> __( 'Border', 'divogue' ),
				'desc'		=> __( 'Top and bottom borders.', 'divogue' ),
				'id'		=> 'border',
				'type'		=> 'select',
				'std'		=> 'none none',
				'options'	=> array(
					'line line'		=> __( 'Top - Line || Bottom - Line', 'divogue' ),
					'line shadow'	=> __( 'Top - Line || Bottom - StrongLine', 'divogue' ),
					'line none'		=> __( 'Top - Line || Bottom - None', 'divogue' ),
					'shadow line'	=> __( 'Top - StrongLine || Bottom - Line', 'divogue' ),
					'shadow shadow'	=> __( 'Top - StrongLine || Bottom - StrongLine', 'divogue' ),
					'shadow none'	=> __( 'Top - StrongLine || Bottom - None', 'divogue' ),
					'none line'		=> __( 'Top - None || Bottom - Line', 'divogue' ),
					'none shadow'	=> __( 'Top - None || Bottom - StrongLine', 'divogue' ),
					'none none'		=> __( 'Top - None || Bottom - None', 'divogue' ),
				),
			),
			array(
				'name'		=> __( 'Content Boxes', 'divogue' ),
				'id'		=> 'boxes',
				'type'		=> 'group',
				'options'	=> array(
					'item_name'	=> __( 'Content Box', 'divogue' ),
				),
				'fields'	=> array(
					array(
						'name'		=> __( 'Title/Content/Image', 'divogue' ),
						'desc'		=> __( 'Page Title, Content and Featured Image will be used.', 'divogue' ),
						'id'		=> 'page',
						'type'		=> 'select',
						'options'	=> Hybridextend_WP_Widget::get_wp_list('page'),
					),
					array(
						'name'		=> __('Display excerpt instead of full content', 'divogue'),
						'desc'		=> __( 'In excerpts, "Read More" link will be automatically inserted if no custom link is provided below.', 'divogue' ),
						'id'		=> 'excerpt',
						'type'		=> 'checkbox'),
					array(
						'name'		=> __('Link Text (optional)', 'divogue'),
						'id'		=> 'link',
						'type'		=> 'text'),
					array(
						'name'		=> __('Link URL', 'divogue'),
						'id'		=> 'url',
						'std'		=> 'http://',
						'type'		=> 'text',
						'sanitize'	=> 'url'),
					array(
						'name'		=> __('Icon', 'divogue'),
						'desc'		=> __( 'Use an icon instead of featured image of the page selected above.', 'divogue' ),
						'id'		=> 'icon',
						'type'		=> 'icon',
					),
					array(
						'name'		=> __( 'Icon Style', 'divogue' ),
						'id'		=> 'icon_style',
						'type'		=> 'select',
						'std'		=> 'circle',
						'options'	=> array(
							'none'		=> __( 'None', 'divogue' ),
							'circle'	=> __( 'Circle', 'divogue' ),
							'square'	=> __( 'Square', 'divogue' ),
						),
					),
				),
			),
		);

		$settings = apply_filters( 'hoot_content_blocks_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hybridextend_locate_widget( 'content-blocks' ) ); // Loads the widget/content-blocks or template-parts/widget-content-blocks.php template.
	}

}

/**
 * Register Widget
 */
function hoot_content_blocks_widget_register(){
	register_widget('Hoot_Content_Blocks_Widget');
}
add_action('widgets_init', 'hoot_content_blocks_widget_register');