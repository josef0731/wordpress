<?php
global $hoot_theme, $hybridextend_style_builder;

if ( !isset( $hoot_theme->slider ) || empty( $hoot_theme->slider ) )
	return;

// Ok, so we have a slider to show. Now, lets display the slider.

/* Let developers alter slider via global $hoot_theme */
do_action( 'hoot_slider_start', 'html' );

/* Create Data attributes for javascript settings for this slider */
$atts = $class = $gridstyle = '';
if ( isset( $hoot_theme->sliderSettings ) && is_array( $hoot_theme->sliderSettings ) ) {

	if ( !empty( $hoot_theme->sliderSettings['class'] ) )
		$class .= ' ' . sanitize_html_class( $hoot_theme->sliderSettings['class'] );

	if ( !empty( $hoot_theme->sliderSettings['id'] ) )
		$atts .= ' id="' . sanitize_html_class( $hoot_theme->sliderSettings['id'] ) . '"';
	foreach ( $hoot_theme->sliderSettings as $setting => $value )
		$atts .= ' data-' . $setting . '="' . esc_attr( $value ) . '"';

}

/* Start Slider Template */
$slide_count = 1; ?>
<div class="hootslider-html-wrapper">
<ul class="lightSlider<?php echo $class; ?>"<?php echo $atts; ?>><?php
	foreach ( $hoot_theme->slider as $slide ) :

		$slide = wp_parse_args( $slide, array(
			'image' => '',
			'title' => '',
			'content' => '',
			'content_bg' => 'dark-on-light',
			'url' => '',
		) );
		$slide['button'] = empty( $slide['button'] ) ? sprintf( __( 'Read More %s', 'divogue' ), '&rarr;' ) : $slide['button'];
		$slide['background'] = empty( $slide['background'] ) ? '' : $slide['background'];

		if ( !empty( $slide['image'] ) ) :

			$slidestyle = '';
			$slidestylearray = $hybridextend_style_builder->css_rule_sanitized_array( 'background-color', $slide['background'] );
			if( is_array( $slidestylearray ) ) {
				foreach ( $slidestylearray as $property => $value ) {
					$slidestyle .= " $property: " . $value['value'] . ';';
				}
			}

			// Start Slide
			?><li class="lightSlide hootslider-html-slide hootslider-html-slide-<?php echo $slide_count; $slide_count++; ?>" <?php if ( !empty( $slidestyle ) ) echo ' style="' . esc_attr( $slidestyle ) . '"'; ?>>

				<?php if ( !empty( $slide['image'] ) ) { ?>
					<div class="hootslider-html-slide-img">
						<img src="<?php echo esc_url( $slide['image'] ); ?>">
					</div>
				<?php } ?>

				<?php if ( !empty( $slide['content'] ) || !empty( $slide['title'] ) || !empty( $slide['url'] ) ) { ?>
					<div class="hootslider-html-slide-entry-wrap">
						<div class="grid">
							<div class="column-1-3 hootslider-html-slide-column hootslider-html-slide-left">
								<div class="hootslider-html-slide-entry <?php echo 'style-' . $slide['content_bg']; ?>">
									<?php if ( !empty( $slide['title'] ) ) { ?>
										<h3 <?php hybridextend_attr( 'hootslider-html-slide-title', '', '' ); ?>>
											<?php echo esc_html( $slide['title'] ) ; ?>
										</h3>
									<?php } ?>
									<?php if ( !empty( $slide['content'] ) || !empty( $slide['url'] ) ) { ?>
										<div <?php hybridextend_attr( 'hootslider-html-slide-content', '', '' ); ?>>
											<?php
											if ( !empty( $slide['content'] ) )
												echo wp_kses_post( wpautop( $slide['content'] ) );
											if ( !empty( $slide['url'] ) )
												echo '<div class="hootslider-html-slide-link"><a ' . hybridextend_get_attr( 'hootslider-html-slide-button', 'html-slider', 'button button-small' ) . ' href="' . esc_url( $slide['url'] ) . '">' . esc_html( $slide['button'] ) . '</a></div>';
											?>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>

			</li><?php

		endif;
	endforeach; ?>
</ul>
</div>