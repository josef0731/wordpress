<?php
/**
 * portfolio section
 *
 * @package bizprime
 */

$default = bizprime_get_default_theme_options();

// Portfolio Section.
$wp_customize->add_section( 'portfolio-section-settings',
	array(
		'title'      => __( 'Portfolio Section', 'bizprime' ),
		'priority'   => 180,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show_portfolio_section.
$wp_customize->add_setting( 'show_portfolio_section',
	array(
		'default'           => $default['show_portfolio_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'bizprime_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_portfolio_section',
	array(
		'label'    => __( 'Enable portfolio', 'bizprime' ),
		'section'  => 'portfolio-section-settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - main_title_portfolio_section.
$wp_customize->add_setting( 'main_title_portfolio_section',
	array(
		'default'           => $default['main_title_portfolio_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'main_title_portfolio_section',
	array(
		'label'    => __( 'Section Title', 'bizprime' ),
		'section'  => 'portfolio-section-settings',
		'type'     => 'text',
		'priority' => 100,

	)
);
for ( $i=1; $i <=  3 ; $i++ ) {
	// Setting - drop down category for portfolio.
	$wp_customize->add_setting( 'select_category_for_portfolio_'. $i,
		array(
			'default'           => $default['select_category_for_portfolio'],
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'absint',
		)
	);
	$wp_customize->add_control( new Bizprime_Dropdown_Taxonomies_Control( $wp_customize, 'select_category_for_portfolio_'. $i,
		array(
	        'label'           => __( 'Category For portfolio Section', 'bizprime' ) . ' - ' . $i ,
	        'description'     => __( 'If category is selected the latest post from category will be published', 'bizprime' ),
	        'section'         => 'portfolio-section-settings',
	        'type'            => 'dropdown-taxonomies',
	        'taxonomy'        => 'category',
			'priority'    	  => 110,
	    ) ) );
}

/*button text*/
$wp_customize->add_setting( 'portfolio_button_text',
	array(
		'default'           => $default['portfolio_button_text'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'sanitize_text_field',
	)
);
$wp_customize->add_control( 'portfolio_button_text',
	array(
		'label'    		=> __( 'Button Text', 'bizprime' ),
		'description'	=> __( 'Removing the text from this section will disable the button on portfolio section', 'bizprime' ),
		'section'  		=> 'portfolio-section-settings',
		'type'     		=> 'text',
		'priority' 		=> 120,
	)
);

/*button url*/
$wp_customize->add_setting( 'portfolio_button_link',
	array(
		'default'           => $default['portfolio_button_link'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'esc_url_raw',
	)
);
$wp_customize->add_control( 'portfolio_button_link',
	array(
		'label'    		=> __( 'URL Link', 'bizprime' ),
		'section'  		=> 'portfolio-section-settings',
		'type'     		=> 'text',
		'priority' 		=> 130,
	)
);



