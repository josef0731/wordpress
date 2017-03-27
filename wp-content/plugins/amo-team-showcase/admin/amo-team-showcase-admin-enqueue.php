<?php
$current_screen = get_current_screen();
$this->gpo->options_or_member_screen = 'amo-team' == $current_screen->id || 'amo-team_page_amo-team-options' == $current_screen->id;
global $pagenow;
$area = 'admin';

# General, small admin CSS file
wp_enqueue_style( $this->gpo->get_plugin_name() . '-general-admin', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/css/amo-team-showcase-general-admin.css', array(), AMO_TEAM_SHOWCASE_VERSION );


# Team Member post type (ONLY)
if ( 'amo-team' == $current_screen->id ) {
	wp_enqueue_script('jquery-ui-accordion');
	wp_enqueue_script('jquery-ui-sortable');

	// Enqueues all scripts, styles, settings, and templates necessary to use WP media library API.
	wp_enqueue_media();

} # IF | 'amo-team' post type


# Team Member post type or plugin's options page
if ( $this->gpo->options_or_member_screen ) {

	// Main, big admin CSS file
	wp_enqueue_style( $this->gpo->get_plugin_name() . '-admin', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/css/amo-team-showcase-admin.css', array(), AMO_TEAM_SHOWCASE_VERSION );

	// Color Picker + Alpha chanel color picker (inside 'amo-team-showcase-js-libraries.js')
	wp_enqueue_style( 'wp-color-picker' );

	// JS Libraries for the plugin
	wp_enqueue_script( $this->gpo->get_plugin_name() . '-js-libraries', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/js/amo-team-showcase-js-libraries.js', array( 'jquery', 'wp-color-picker' ), AMO_TEAM_SHOWCASE_VERSION, true );

	// Main admin Javascript file
	wp_enqueue_script( $this->gpo->get_plugin_name() . '-admin', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/js/amo-team-showcase-admin.js', array( 'jquery' ), AMO_TEAM_SHOWCASE_VERSION, true );

	// Pass variables to main plugin JS file
	wp_localize_script( $this->gpo->get_plugin_name() . '-admin', 'AmoTeamVarsAdmin',
		array(
			'currentScreen' => $current_screen->id,
			'pagenow' => $pagenow,
			'MemberFeatImgNotice' => __( 'Please set a featured image, to be able to publish / update the team member. It\'s recommended to upload / use the image, which size is at least 640x640 pixels.', 'amo-team' ),
			'mediaUploaderTitle' => __( 'Info Panel Image', 'amo-team' ),
			'SocialIconsLimitNotice' => __( 'The limit is reached, you can have only 12 social icons in team member info panel.', 'amo-team' ),
		)
	);
} # IF | Team Member post or plugin's options page


# Any post or page (edit screen)
if ( 'post.php' == $hook_suffix || 'post-new.php' == $hook_suffix ) {

	wp_enqueue_style( $this->gpo->get_plugin_name() . '-post-admin', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/css/amo-team-showcase-post-admin.css', array(), AMO_TEAM_SHOWCASE_VERSION );

	//wp_enqueue_style( $this->gpo->get_plugin_name() . '-rtl-admin' );

	wp_enqueue_script( $this->gpo->get_plugin_name() . 'post-js-libraries', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/js/amo-team-showcase-post-js-libraries.js', array( 'jquery' ), AMO_TEAM_SHOWCASE_VERSION, true );

	wp_enqueue_script( $this->gpo->get_plugin_name() . 'post-js-admin', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/js/amo-team-showcase-post-admin.js', array( 'jquery' ), AMO_TEAM_SHOWCASE_VERSION, true );

} # IF | post/page


# For RTL languages
if ( is_rtl() ) {
	wp_enqueue_style( $this->gpo->get_plugin_name() . '-rtl-admin', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/css/rtl-admin.css', array(), AMO_TEAM_SHOWCASE_VERSION );
} // IF | RTL


# Internet Explorer 9 JS fixes
wp_enqueue_script( $this->gpo->get_plugin_name() . 'ie9-fixes', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/js/ie9-fixes.js', array( 'jquery' ), AMO_TEAM_SHOWCASE_VERSION, true);
wp_script_add_data( $this->gpo->get_plugin_name() . 'ie9-fixes', 'conditional', 'lt IE 10' );

// Internet Explorer 9 stylesheet fixes
wp_enqueue_style( $this->gpo->get_plugin_name() . 'ie9-fixes', AMO_TEAM_SHOWCASE_PLUGIN_URL . $area . '/css/ie9-fixes.css', array(), AMO_TEAM_SHOWCASE_VERSION );
wp_style_add_data( $this->gpo->get_plugin_name() . 'ie9-fixes', 'conditional', 'lt IE 10' );