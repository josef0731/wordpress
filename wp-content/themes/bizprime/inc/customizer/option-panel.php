<?php 

/**
 * Theme Options Panel.
 *
 * @package bizprime
 */

$default = bizprime_get_default_theme_options();

// Add Theme Options Panel.
$wp_customize->add_panel( 'theme_front_page_section',
	array(
		'title'      => __( 'Home/Front Page Settings', 'bizprime' ),
		'priority'   => 200,
		'capability' => 'edit_theme_options',
	)
);

//Top Header section
require get_template_directory() . '/inc/customizer/header-section.php';

	/*slider and its property section*/
	require get_template_directory() . '/inc/customizer/slider.php';

	/*service section*/
	require get_template_directory() . '/inc/customizer/intro.php';

	/*portfolio*/
	require get_template_directory() . '/inc/customizer/portfolio.php';

	/*callback section*/
	require get_template_directory() . '/inc/customizer/callback.php';

	/*latest-blog section*/
	require get_template_directory() . '/inc/customizer/latest-blog.php';
?>