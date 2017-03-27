<?php
/**
 * intro section
 *
 * @package bizprime
 */

$default = bizprime_get_default_theme_options();
/*intro section*/
// our intro Main Section.
$wp_customize->add_section( 'intro_section_settings',
	array(
		'title'      => esc_html__( 'Intro Section', 'bizprime' ),
		'priority'   => 120,
		'capability' => 'edit_theme_options',
		'panel'      => 'theme_front_page_section',
	)
);

// Setting - show-work-process-section.
$wp_customize->add_setting( 'show_our_intro_section',
	array(
		'default'           => $default['show_our_intro_section'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'bizprime_sanitize_checkbox',
	)
);
$wp_customize->add_control( 'show_our_intro_section',
	array(
		'label'    => esc_html__( 'Enable Intro Section', 'bizprime' ),
		'section'  => 'intro_section_settings',
		'type'     => 'checkbox',
		'priority' => 100,
	)
);

// Setting - show-intro-section.
$wp_customize->add_setting( 'select_intro_main_page',
	array(
		'default'           => $default['select_intro_main_page'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'bizprime_sanitize_dropdown_pages',
	)
);
$wp_customize->add_control( 'select_intro_main_page',
	array(
		'label'    => esc_html__( 'Select Main Intro Page', 'bizprime' ),
		'section'  => 'intro_section_settings',
		'type'     => 'dropdown-pages',
		'priority' => 130,
	)
);


/*content excerpt in intro*/
$wp_customize->add_setting( 'number_of_content_home_intro',
	array(
		'default'           => $default['number_of_content_home_intro'],
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'bizprime_sanitize_positive_integer',
	)
);
$wp_customize->add_control( 'number_of_content_home_intro',
	array(
		'label'    => esc_html__( 'Select No Words Of Intro', 'bizprime' ),
		'section'  => 'intro_section_settings',
		'type'     => 'number',
		'priority' => 180,
		'input_attrs'     => array( 'min' => 1, 'max' => 200, 'style' => 'width: 150px;' ),

	)
);

/*No of font icon*/

/*intro from page*/
for ( $i=1; $i <=  3 ; $i++ ) {
		$wp_customize->add_setting( 'number_of_home_intro_icon_'. $i , array(
		    'capability'        => 'edit_theme_options',
		    'sanitize_callback' => 'sanitize_text_field',
		) );

		$wp_customize->add_control( 'number_of_home_intro_icon_'. $i, array(
		    'input_attrs'       => array(
		        'style'           => 'width: 250px;'
		        ),
		    'label'             => esc_html__( 'Font Icon', 'bizprime' ) . ' - ' . $i ,
			'description'     => sprintf( __( 'Use icomoon icon: Eg: %1$s. %2$s See more here %3$s', 'bizprime' ), 'ion-android-bulb','<a href="'.esc_url('http://ionicons.com/cheatsheet.html').'" target="_blank">','</a>' ),
		    'priority'          =>  '120' . $i,
		    'section'           => 'intro_section_settings',
		    'type'        		=> 'text',
		    'priority'    		=> 180,
		    )
		);

        $wp_customize->add_setting( 'select_page_for_intro_'. $i, array(
            'capability'        => 'edit_theme_options',
            'sanitize_callback' => 'bizprime_sanitize_dropdown_pages',
        ) );

        $wp_customize->add_control( 'select_page_for_intro_'. $i, array(
            'input_attrs'       => array(
                'style'           => 'width: 50px;'
                ),
            'label'             => __( 'Intro From Page', 'bizprime' ) . ' - ' . $i ,
            'priority'          =>  '120' . $i,
            'section'           => 'intro_section_settings',
            'type'        		=> 'dropdown-pages',
            'priority'    		=> 180,
            )
        );
    }