<?php
/**
 * Textarea - form input field
 *
 * Reference:
 * $a  – Arguments, an array of predefined values for the current field
 * $opts  – Option values, an array of values, which is saved in plugin's options / in post metadata
 * $metabox  – If the variable is set, then this form input will be used in a post metabox, thus it's name attribute
 *             will be set to a $metabox array, e.g.: amo-team-showcase['input_value_example']
 *
 * {p} – Plugin prefix for CSS classes, the {p} sign will be replaced with real prefix name on template output.
 *
 * @since   1.0.0
 */

$a['id']    = Amo_Team_Showcase_AVH::get_id_from_title( $a['title'], $a['id'] );
$a['value'] = Amo_Team_Showcase_AVH::get_standard_or_array_value( $opts, $a['id'], $a['std'] );
$a['placeholder'] = Amo_Team_Showcase_AVH::get_standard_or_array_value( $a, 'placeholder', $a['title'] );
$name = isset( $metabox ) ? Amo_Team_Showcase_AVH::metabox_or_normal_input_name( $metabox, $a, 'text', $a['sanitize'] ) : Amo_Team_Showcase_AVH::metabox_or_normal_input_name( false, $a, 'text', $a['sanitize'] );

?>
<div class="{p}setting-group<?php echo ' ', $a['class'] ?>"">
	<div class="{p}setting">
		<label class="{p}setting__label" for="{p}<?php echo $a['id'] ?>"><?php echo $a['title'] ?></label>
		<textarea rows="<?php echo $a['rows'] ?>" class="{p}setting__input {p}js-setting-text-field" id="{p}<?php echo $a['id'] ?>" name="<?php echo $name ?>" placeholder="<?php echo $a['placeholder'] ?>"><?php echo esc_attr( $a['value'] ) ?></textarea>
	</div><!-- .setting -->
	<div class="{p}setting__desc {p}text"><?php echo $a['desc'] ?></div>
</div><!-- .setting-group -->