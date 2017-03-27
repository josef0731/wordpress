<?php
/**
 * Call To Action Widget
 *
 * @package    Hoot
 * @subpackage Divogue
 */

/**
* Class Hoot_CTA_Widget
*/
class Hoot_CTA_Widget extends HybridExtend_WP_Widget {

	function __construct() {

		$settings['id'] = 'hoot-cta-widget';
		$settings['name'] = __( 'Hoot > Call To Action', 'divogue' );
		$settings['widget_options'] = array(
			'description'	=> __('Display Call To Action block.', 'divogue'),
			'class'			=> 'hoot-cta-widget', // CSS class applied to frontend widget container via 'before_widget' arg
		);
		$settings['control_options'] = array();
		$settings['form_options'] = array(
			//'name' => can be empty or false to hide the name
			array(
				'name'		=> __( 'Headline', 'divogue' ),
				'desc'		=> __( 'To emphasise on certain words, add them like this: &lt;span&gt;highlight text&lt;/span&gt;', 'divogue' ),
				'id'		=> 'headline',
				'type'		=> 'text',
			),
			array(
				'name'		=> __( 'Description', 'divogue' ),
				'id'		=> 'description',
				'type'		=> 'textarea',
			),
			array(
				'name'		=> __( 'Button Text', 'divogue' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'divogue' ),
				'id'		=> 'button_text',
				'type'		=> 'text',
				'std'		=> __( 'KNOW MORE', 'divogue' ),
			),
			array(
				'name'		=> __( 'URL', 'divogue' ),
				'desc'		=> __( 'Leave empty if you dont want to show button', 'divogue' ),
				'id'		=> 'url',
				'type'		=> 'text',
				'sanitize'	=> 'url',
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
		);

		$settings = apply_filters( 'hoot_cta_widget_settings', $settings );

		parent::__construct( $settings['id'], $settings['name'], $settings['widget_options'], $settings['control_options'], $settings['form_options'] );

	}

	/**
	 * Echo the widget content
	 */
	function display_widget( $instance, $before_title = '', $title='', $after_title = '' ) {
		extract( $instance, EXTR_SKIP );
		include( hybridextend_locate_widget( 'cta' ) ); // Loads the widget/cta or template-parts/widget-cta.php template.
	}

}

/**
 * Register Widget
 */
function hoot_cta_widget_register(){
	register_widget('Hoot_CTA_Widget');
}
add_action('widgets_init', 'hoot_cta_widget_register');