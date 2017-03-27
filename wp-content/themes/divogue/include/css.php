<?php
/**
 * Add custom css to frontend.
 *
 * @package    Hoot
 * @subpackage Divogue
 */

// Add action at 5 for adding css rules (premium hooks in at 6-9).
// Child themes can hook in at priority 10.
add_action( 'hybridextend_dynamic_cssrules', 'hoot_dynamic_cssrules', 5 );

/**
 * Custom CSS built from user theme options
 * For proper sanitization, always use functions from hoot/includes/sanitization.php
 * and hoot/customizer/sanitization.php
 *
 * @since 1.0
 * @access public
 */
function hoot_dynamic_cssrules() {

	/*** Settings Values ***/

	/* Lite Settings */

	$settings = array();
	$settings['grid_width']           = intval( hoot_get_mod( 'site_width', 1260 ) ) . 'px';
	$settings['accent_color']         = hoot_get_mod( 'accent_color' );
	$settings['accent_color_dark']    = hybridext_color_increase( $settings['accent_color'], 20.5, 20.5 );
	$settings['accent_font']          = hoot_get_mod( 'accent_font' );
	$settings['contrast_color']       = hoot_get_mod( 'contrast_color' );
	$settings['contrast_color_dark']  = hybridext_color_increase( $settings['contrast_color'], 20 );
	$settings['contrast_font']        = hoot_get_mod( 'contrast_font' );
	$settings['logo_fontface']        = hoot_get_mod( 'logo_fontface' );
	$settings['headings_fontface']    = hoot_get_mod( 'headings_fontface' );
	$settings['site_layout']          = hoot_get_mod( 'site_layout' );
	$settings['box_background_color'] = hoot_get_mod( 'box_background_color' );
	$settings['content_bg_color']     = ( $settings['site_layout'] == 'boxed' ) ?
	                                        $settings['box_background_color'] :
	                                        hoot_get_mod( 'background-color' );
	$settings['site_title_icon_size'] = hoot_get_mod( 'site_title_icon_size' );
	$settings['site_title_icon']      = hoot_get_mod( 'site_title_icon' );
	$settings['logo_image_width']     = hoot_get_mod( 'logo_image_width' );
	$settings['logo_image_width']     = ( intval( $settings['logo_image_width'] ) ) ?
	                                        intval( $settings['logo_image_width'] ) . 'px' :
	                                        '150px';
	$settings['logo']                 = hoot_get_mod( 'logo' );
	$settings['logo_custom']          = apply_filters( 'hoot_logo_custom_text', hybridextend_sortlist( hoot_get_mod( 'logo_custom' ) ) );

	// $wtmodule_bg = array( 'area_a', 'area_b', 'area_c', 'area_d', 'area_e', 'content' );
	// foreach ( $wtmodule_bg as $wtmname ) {
	// 	$settings['wtm_sectionbg'][ $wtmname . '_type'] = hoot_get_mod( "frontpage_sectionbg_{$wtmname}-type", 'none' );
	// 	$settings['wtm_sectionbg'][ $wtmname . '_image'] = hoot_get_mod( "frontpage_sectionbg_{$wtmname}-image" );
	// 	$settings['wtm_sectionbg'][ $wtmname . '_parallax'] = hoot_get_mod( "frontpage_sectionbg_{$wtmname}-parallax" );
	// }

	// Troubleshooting
	// echo '<!-- '; print_r($settings); echo ' -->';

	extract( apply_filters( 'hoot_custom_css_settings', $settings, 'lite' ) );

	/*** Add Dynamic CSS ***/

	/* Hoot Grid */

	hybridextend_add_css_rule( array(
						'selector'  => '.grid',
						'property'  => 'max-width',
						'value'     => $grid_width,
						'idtag'     => 'grid_width',
					) );

	/* Base Typography and HTML */

	hybridextend_add_css_rule( array(
						'selector'  => 'a',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) ); // Overridden in premium

	hybridextend_add_css_rule( array(
						'selector'  => '.accent-typo',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.invert-typo',
						'property'  => 'color',
						'value'     => $content_bg_color,
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.contrast-typo',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $contrast_color, 'contrast_color' ),
							'color'      => array( $contrast_font, 'contrast_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.enforce-typo',
						'property'  => 'background',
						'value'     => $content_bg_color,
					) );

	hybridextend_add_css_rule( array(
						'selector'  => 'input[type="submit"], #submit, .button',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => 'input[type="submit"]:hover, #submit:hover, .button:hover',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color_dark ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => 'input[type="submit"]:before, #submit:before, .button:before',
						'property'  => 'border-color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) );

	if ( 'standard' == $headings_fontface ) {
		hybridextend_add_css_rule( array(
						'selector'  => 'h1, h2, h3, h4, h5, h6, .title, .titlefont',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'font-family' => array( '"Droid Sans", sans-serif' ),
							),
					) ); // Removed in premium
	} elseif ( 'display' == $headings_fontface ) {
		hybridextend_add_css_rule( array(
						'selector'  => 'h1, h2, h3, h4, h5, h6, .title, .titlefont',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'font-family' => array( '"Oswald", sans-serif' ),
							),
					) ); // Removed in premium
	}

	/* Layout */

	hybridextend_add_css_rule( array(
						'selector'  => 'body',
						'property'  => 'background',
						'idtag'     => 'background',
					) );

	if ( $site_layout == 'boxed' ) {
		hybridextend_add_css_rule( array(
						'selector'  => '#main', // . ',' . '#header-supplementary',
						'property'  => 'background',
						'value'     => $box_background_color,
						'idtag'     => 'box_background_color',
					) );
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Topbar

	hybridextend_add_css_rule( array(
						'selector'  => '.topbar-wrap' . ',' . '#topbar' . ',' . '#header-supplementary' . ',' . '#header-supplementary:after' . ',' . '.sf-menu ul' . ',' . '.sf-menu ul li,.sf-menu ul li:first-child,.sf-menu ul li:last-child' . ',' . '#menu-primary-items',
						'property'  => 'border-color',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '#topbar .social-icons-icon',
						'property'  => 'color',
						'value'     => $contrast_font,
						'idtag'     => 'contrast_font',
					) );

	/* Header (Topbar, Header, Main Nav Menu) */
	// Text Logo

	if ( 'standard' == $logo_fontface ) {
		hybridextend_add_css_rule( array(
						'selector'  => '#site-title',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'font-family' => array( '"Droid Sans", sans-serif' ),
							),
					) ); // Removed in premium
	} elseif ( 'heading' == $logo_fontface ) {
		hybridextend_add_css_rule( array(
						'selector'  => '#site-title',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'font-family' => array( '"Dosis", sans-serif' ),
							),
					) ); // Removed in premium
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Logo (with icon)

	if ( intval( $site_title_icon_size ) ) {
		hybridextend_add_css_rule( array(
						'selector'  => '.site-logo-with-icon #site-title i',
						'property'  => 'font-size',
						'value'     => $site_title_icon_size,
						'idtag'     => 'site_title_icon_size',
					) );
	}

	if ( $site_title_icon && intval( $site_title_icon_size ) ) {
		hybridextend_add_css_rule( array(
						'selector'  => '.site-logo-with-icon #site-title',
						'property'  => 'margin-left',
						'value'     => $site_title_icon_size,
						'idtag'     => 'site_title_icon_size',
					) );
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Mixed/Mixedcustom Logo (with image)

	if ( !empty( $logo_image_width ) ) :
	hybridextend_add_css_rule( array(
						'selector'  => '.site-logo-mixed-image img',
						'property'  => 'max-width',
						'value'     => $logo_image_width,
						'idtag'     => 'logo_image_width',
					) );
	endif;

	/* Header (Topbar, Header, Main Nav Menu) */
	// Custom Logo

	if ( 'custom' == $logo || 'mixedcustom' == $logo ) {
		if ( is_array( $logo_custom ) && !empty( $logo_custom ) ) {
			$lcount = 1;
			foreach ( $logo_custom as $logo_custom_line ) {
				if ( !$logo_custom_line['sortitem_hide'] && !empty( $logo_custom_line['size'] ) ) {
					hybridextend_add_css_rule( array(
						'selector'  => '#site-logo-custom .site-title-line' . $lcount . ',#site-logo-mixedcustom .site-title-line' . $lcount,
						'property'  => 'font-size',
						'value'     => $logo_custom_line['size'],
						// 'idtag'     => 'logo_custom',
					) );
				}
				$lcount++;
			}
		}
	}

	/* Header (Topbar, Header, Main Nav Menu) */
	// Nav Menu

	hybridextend_add_css_rule( array(
						'selector'  => '#menu-primary-items > li.current-menu-item, #menu-primary-items > li:hover' . ',' . '.sf-menu ul li:hover > a',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $contrast_color, 'contrast_color' ),
							'color'      => array( $contrast_font, 'contrast_font' ),
							),
					) );

	// hybridextend_add_css_rule( array(
	// 					'selector'  => '.sf-menu ul',
	// 					'property'  => 'border-color',
	// 					'value'     => $contrast_color,
	// 				) );

	hybridextend_add_css_rule( array(
						'selector'  => '.menu-items.sf-menu ul li:hover > a',
						'property'  => 'background',
						'value'     => $contrast_color_dark,
						'media'     => 'only screen and (max-width: 799px)',
					) );

	/* Main #Content */

	hybridextend_add_css_rule( array(
						'selector'  => '.sticky .entry-sticky-tag',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $contrast_font, 'contrast_font' ),
							'color'      => array( $contrast_color, 'contrast_color' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.entry .entry-grid' . ',' . // Replaces '.archive-big .entry-grid,.archive-medium .entry-grid,.archive-small .entry-grid'
						               '#loop-meta.loop-meta-wrap:after', // Replaces '#loop-meta.pageheader-bg-default:after,#loop-meta.pageheader-bg-incontent:after,#loop-meta.pageheader-bg-none:after'
						'property'  => 'border-color',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.content .entry-byline',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $contrast_color, 'contrast_color' ),
							'color'      => array( $contrast_font, 'contrast_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.entry-footer .entry-byline',
						'property'  => 'color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) ); // Overridden in premium

	/* Light Slider */

	hybridextend_add_css_rule( array(
						'selector'  => '.lSSlideOuter .lSPager.lSpg > li:hover a, .lSSlideOuter .lSPager.lSpg > li.active a',
						'property'  => 'background-color',
						'value'     => $accent_color,
						'idtag'     => 'accent_color',
					) );

	/* Frontpage */

	// Set as inline CSS
	// foreach ( $wtmodule_bg as $wtmname ) {
	// 	if ( $wtm_sectionbg[ $wtmname . '_type'] == 'image' && !empty( $wtm_sectionbg[ $wtmname . '_image'] ) && empty( $wtm_sectionbg[ $wtmname . '_parallax'] ) ) {
	// 		hybridextend_add_css_rule( array(
	// 					'selector'  => "#frontpage-{$wtmname}",
	// 					'property'  => 'background-image',
	// 					'value'     => $wtm_sectionbg[ $wtmname . '_image'],
	// 					'idtag'     => "frontpage_sectionbg_{$wtmname}-image",
	// 				) );
	// 	}
	// }

	/* Sidebars and Widgets */

	hybridextend_add_css_rule( array(
						'selector'  => '.topborder-shadow:before, .bottomborder-shadow:after',
						'property'  => 'border-color',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.cta-headine span',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $accent_color, 'accent_color' ),
							'color'      => array( $accent_font, 'accent_font' ),
							),
					) );

	hybridextend_add_css_rule( array(
						'selector'  => '.content-block-style2 .content-block-icon.contrast-typo',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background' => array( $contrast_font, 'contrast_font' ),
							'color'      => array( $contrast_color, 'contrast_color' ),
							),
					) );

	// hybridextend_add_css_rule( array(
	// 					'selector' => '.content-block-style4 .content-block-icon.icon-style-none',
	// 					'property' => 'color',
	// 					'value'    => $accent_color,
	// 					'idtag'    => 'accent_color',
	// 				) );

	hybridextend_add_css_rule( array(
						'selector'  => '.social-icons-widget .social-icons-icon',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background'   => array( $contrast_color, 'contrast_color' ),
							'color'        => array( $contrast_font, 'contrast_font' ),
							'border-color' => array( $contrast_color, 'contrast_color' ), // for skype block
							),
					) );

	/* Plugins */

	hybridextend_add_css_rule( array(
						'selector'  => '#infinite-handle span',
						'property'  => array(
							// property  => array( value, idtag, important, typography_reset ),
							'background'   => array( $accent_color, 'accent_color' ),
							'color'        => array( $accent_font, 'accent_font' ),
							'border-color' => array( $accent_color, 'accent_color' ),
							),
					) );

	/* Footer */

	hybridextend_add_css_rule( array(
						'selector'  => '#sub-footer > .grid' . ',' . '.footer' . ',' . '.footer:before',
						'property'  => 'border-color',
						'value'     => $contrast_color,
						'idtag'     => 'contrast_color',
					) );

}