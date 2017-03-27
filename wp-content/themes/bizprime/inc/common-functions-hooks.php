<?php
if ( ! function_exists( 'bizprime_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since bizprime 1.0.0
 */
function bizprime_the_custom_logo() {
    if ( function_exists( 'the_custom_logo' ) ) {
        the_custom_logo();
    }
}
endif;


if ( ! function_exists( 'bizprime_body_class' ) ) :

	/**
	 * body class.
	 *
	 * @since 1.0.0
	 */
	function bizprime_body_class($bizprime_body_class) {
		global $post;
		$global_layout = bizprime_get_option( 'global_layout' );
		$input = '';
		$home_content_status =	bizprime_get_option( 'home_page_content_status' );
		if( 1 != $home_content_status ){
			$input = 'home-content-not-enabled';
		}
		// Check if single.
		if ( $post && is_singular() ) {
			$post_options = get_post_meta( $post->ID, 'bizprime-meta-select-layout', true );
			if ( empty( $post_options ) ) {
				$global_layout = esc_attr( bizprime_get_option('global_layout') );
			} else{
				$global_layout = esc_attr($post_options);
			}
		}
		if ($global_layout == 'left-sidebar') {
			$bizprime_body_class[]= 'left-sidebar ' . esc_attr( $input );
		}
		elseif ($global_layout == 'no-sidebar') {
			$bizprime_body_class[]= 'no-sidebar ' . esc_attr( $input );
		}
		else{
			$bizprime_body_class[]= 'right-sidebar ' . esc_attr( $input );

		}
		return $bizprime_body_class;
	}
endif;

add_action( 'body_class', 'bizprime_body_class' );
/**
* Returns word count of the sentences.
*
* @since bizprime 1.0.0
*/
if ( ! function_exists( 'bizprime_words_count' ) ) :
	function bizprime_words_count( $length = 25, $bizprime_content = null ) {
		$length = absint( $length );
		$source_content = preg_replace( '`\[[^\]]*\]`', '', $bizprime_content );
		$trimmed_content = wp_trim_words( $source_content, $length, '...' );
		return $trimmed_content;
	}
endif;


if ( ! function_exists( 'bizprime_simple_breadcrumb' ) ) :

	/**
	 * Simple breadcrumb.
	 *
	 * @since 1.0.0
	 */
	function bizprime_simple_breadcrumb() {

		if ( ! function_exists( 'breadcrumb_trail' ) ) {

			require_once get_template_directory() . '/assets/libraries/breadcrumbs/breadcrumbs.php';
		}

		$breadcrumb_args = array(
			'container'   => 'div',
			'show_browse' => false,
		);
		breadcrumb_trail( $breadcrumb_args );

	}

endif;


if ( ! function_exists( 'bizprime_custom_posts_navigation' ) ) :
	/**
	 * Posts navigation.
	 *
	 * @since 1.0.0
	 */
	function bizprime_custom_posts_navigation() {

		$pagination_type = bizprime_get_option( 'pagination_type' );

		switch ( $pagination_type ) {

			case 'default':
				the_posts_navigation();
			break;

			case 'numeric':
				the_posts_pagination();
			break;

			default:
			break;
		}

	}
endif;

add_action( 'bizprime_action_posts_navigation', 'bizprime_custom_posts_navigation' );


if( ! function_exists( 'bizprime_excerpt_length' ) ) :

    /**
     * Excerpt length
     *
     * @since  bizprime 1.0.0
     *
     * @param null
     * @return int
     */
    function bizprime_excerpt_length( $length ){
        global $bizprime_customizer_all_values;
        $excerpt_length = $bizprime_customizer_all_values['excerpt_length_global'];
        if ( empty( $excerpt_length) ) {
            $excerpt_length = $length;
        }
        return absint( $excerpt_length );

    }

endif;
add_filter( 'excerpt_length', 'bizprime_excerpt_length', 999 );