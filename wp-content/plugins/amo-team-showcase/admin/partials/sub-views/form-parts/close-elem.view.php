<?php
/**
 * Close Element - end tag for an element, e.g. </div>
 *
 * Reference:
 * $a  – Arguments, an array of predefined values for the current field
 *
 * @since   1.0.0
 */

$a['comment'] = Amo_Team_Showcase_AVH::get_conditional_value( $a['comment'], '<!-- ' . $a['comment'] . '-->' );

?>
</<?php echo $a['elem'] ?>><?php echo $a['comment'] ?>