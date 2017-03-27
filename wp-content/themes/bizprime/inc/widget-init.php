<?php
/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function bizprime_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'bizprime' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'bizprime' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	$bizprime_footer_widgets_number = bizprime_get_option('number_of_footer_widget');

	if( $bizprime_footer_widgets_number > 0 ){
	    register_sidebar(array(
	        'name' => __('Footer Column One', 'bizprime'),
	        'id' => 'footer-col-one',
	        'description' => __('Displays items on footer section.','bizprime'),
	        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	        'after_widget' => '</aside>',
	        'before_title'  => '<h1 class="widget-title">',
	        'after_title'   => '</h1>',
	    ));
	    if( $bizprime_footer_widgets_number > 1 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Two', 'bizprime'),
	            'id' => 'footer-col-two',
	            'description' => __('Displays items on footer section.','bizprime'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $bizprime_footer_widgets_number > 2 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Three', 'bizprime'),
	            'id' => 'footer-col-three',
	            'description' => __('Displays items on footer section.','bizprime'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	    if( $bizprime_footer_widgets_number > 3 ){
	        register_sidebar(array(
	            'name' => __('Footer Column Four', 'bizprime'),
	            'id' => 'footer-col-four',
	            'description' => __('Displays items on footer section.','bizprime'),
	            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
	            'after_widget' => '</aside>',
	            'before_title'  => '<h1 class="widget-title">',
	            'after_title'   => '</h1>',
	        ));
	    }
	}
}
add_action( 'widgets_init', 'bizprime_widgets_init' );
