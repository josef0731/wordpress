<?php
/**
 * Implement theme metabox.
 *
 * @package bizprime
 */

if ( ! function_exists( 'bizprime_add_theme_meta_box' ) ) :

	/**
	 * Add the Meta Box
	 *
	 * @since 1.0.0
	 */
	function bizprime_add_theme_meta_box() {

		$apply_metabox_post_types = array( 'post', 'page' );

		foreach ( $apply_metabox_post_types as $key => $type ) {
			add_meta_box(
				'theme-settings',
				esc_html__( 'Single Page/Post Settings', 'bizprime' ),
				'bizprime_render_theme_settings_metabox',
				$type
			);
		}

	}

endif;

add_action( 'add_meta_boxes', 'bizprime_add_theme_meta_box' );

if ( ! function_exists( 'bizprime_render_theme_settings_metabox' ) ) :

	/**
	 * Render theme settings meta box.
	 *
	 * @since 1.0.0
	 */
	function bizprime_render_theme_settings_metabox( $post, $metabox ) {

		$post_id = $post->ID;
		$bizprime_post_meta_value = get_post_meta($post_id);

		// Meta box nonce for verification.
		wp_nonce_field( basename( __FILE__ ), 'bizprime_meta_box_nonce' );
		// Fetch Options list.
		$bizprime_global_layout = bizprime_get_option('global_layout');
		$bizprime_single_image_layout = bizprime_get_option('single_post_image_layout');
	?>
	<div id="bizprime-settings-metabox-container" class="bizprime-settings-metabox-container">
		<div id="bizprime-settings-metabox-tab-layout">
			<h4><?php echo __( 'Layout Settings', 'bizprime' ); ?></h4>
			<div class="bizprime-row-content">
				 <!-- Checkbox Field-->
				     <p>
				     <div class="bizprime-row-content">
				         <label for="bizprime-meta-checkbox">
				             <input type="checkbox" name="bizprime-meta-checkbox" id="bizprime-meta-checkbox" value="yes" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-checkbox'] ) ) checked( $bizprime_post_meta_value['bizprime-meta-checkbox'][0], 'yes' ); ?> />
				             <?php _e( 'Check To Use Featured Image As Banner Image', 'bizprime' )?>
				         </label>
				     </div>
				     </p>
			     <!-- Select Field-->
			        <p>
			            <label for="bizprime-meta-select-layout" class="bizprime-row-title">
			                <?php _e( 'Single Page/Post Layout', 'bizprime' )?>
			            </label>
			            <select name="bizprime-meta-select-layout" id="bizprime-meta-select-layout">
			            	<?php if ($bizprime_global_layout == 'right-sidebar') { ?>
			                	<option value="right-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'bizprime' )?></option>';
				                <option value="left-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'bizprime' )?></option>';
				                <option value="no-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'bizprime' )?></option>';
			            	<?php }
			            		elseif ($bizprime_global_layout == 'left-sidebar') { ?>
				                <option value="left-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'bizprime' )?></option>';
			                	<option value="right-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'bizprime' )?></option>';
				                <option value="no-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'bizprime' )?></option>';
			            	<?php }
			            		elseif ($bizprime_global_layout == 'no-sidebar'){ ?>
				                <option value="no-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'no-sidebar' ); ?>><?php _e( 'No Sidebar', 'bizprime' )?></option>';
			            	    <option value="left-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'left-sidebar' ); ?>><?php _e( 'Primary Sidebar - Content', 'bizprime' )?></option>';
			                	<option value="right-sidebar" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-select-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-select-layout'][0], 'right-sidebar' ); ?>><?php _e( 'Content - Primary Sidebar', 'bizprime' )?></option>';
			            	<?php } ?>
			            </select>
			        </p>

		         <!-- Select Field-->
		            <p>
		                <label for="bizprime-meta-image-layout" class="bizprime-row-title">
		                    <?php _e( 'Single Page/Post Image Layout', 'bizprime' )?>
		                </label>
		                <select name="bizprime-meta-image-layout" id="bizprime-meta-image-layout">
		                	<?php if ($bizprime_single_image_layout == 'full') { ?>
		                    	<option value="full" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'bizprime' )?></option>';
		    	                <option value="right" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'bizprime' )?></option>';
		    	                <option value="left" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'bizprime' )?></option>';
		    	                <option value="no-image" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'bizprime' )?></option>';
		                	<?php }
		                		elseif ($bizprime_single_image_layout == 'right') { ?>
		    	                <option value="right" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'bizprime' )?></option>';
		    	                <option value="full" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'bizprime' )?></option>';
		    	                <option value="left" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'bizprime' )?></option>';
		    	                <option value="no-image" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'bizprime' )?></option>';
		                	<?php }
		                		elseif ($bizprime_single_image_layout == 'left'){ ?>
		                		<option value="left" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'bizprime' )?></option>';
		                		<option value="right" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'bizprime' )?></option>';
		                		<option value="full" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'bizprime' )?></option>';
		                		<option value="no-image" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'bizprime' )?></option>';
		                	<?php }
		                		elseif ($bizprime_single_image_layout == 'no-image'){ ?>
		                		<option value="no-image" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'no-image' ); ?>><?php _e( 'No-Image', 'bizprime' )?></option>';
		                		<option value="right" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'right' ); ?>><?php _e( 'Right', 'bizprime' )?></option>';
		                		<option value="full" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'full' ); ?>><?php _e( 'Full', 'bizprime' )?></option>';
		                		<option value="left" <?php if ( isset ( $bizprime_post_meta_value['bizprime-meta-image-layout'] ) ) selected( $bizprime_post_meta_value['bizprime-meta-image-layout'][0], 'left' ); ?>><?php _e( 'Left', 'bizprime' )?></option>';
		                	<?php } ?>
		                </select>
		            </p>
			</div><!-- .bizprime-row-content -->
		</div><!-- #bizprime-settings-metabox-tab-layout -->
	</div><!-- #bizprime-settings-metabox-container -->

    <?php
	}

endif;



if ( ! function_exists( 'bizprime_save_theme_settings_meta' ) ) :

	/**
	 * Save theme settings meta box value.
	 *
	 * @since 1.0.0
	 *
	 * @param int     $post_id Post ID.
	 * @param WP_Post $post Post object.
	 */
	function bizprime_save_theme_settings_meta( $post_id, $post ) {

		// Verify nonce.
		if ( ! isset( $_POST['bizprime_meta_box_nonce'] ) || ! wp_verify_nonce( $_POST['bizprime_meta_box_nonce'], basename( __FILE__ ) ) ) {
			  return; }

		// Bail if auto save or revision.
		if ( defined( 'DOING_AUTOSAVE' ) || is_int( wp_is_post_revision( $post ) ) || is_int( wp_is_post_autosave( $post ) ) ) {
			return;
		}

		// Check the post being saved == the $post_id to prevent triggering this call for other save_post events.
		if ( empty( $_POST['post_ID'] ) || $_POST['post_ID'] != $post_id ) {
			return;
		}

		// Check permission.
		if ( 'page' === $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return; }
		} else if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

			// Checks for input and saves (checkbox)
			    if( isset( $_POST[ 'bizprime-meta-checkbox' ] ) ) {
			    	   $valid_values = array(
                       'yes',
                       '',
   						);
			    	$new = sanitize_text_field($_POST['bizprime-meta-checkbox'],'yes');
			    	if( in_array( $new, $valid_values ) ) {
				    	update_post_meta($post_id, 'bizprime-meta-checkbox', $new);
			    	}
			    } else {
			    	$valid_values = array(
                       'yes',
                       '',
   					);
			    	$new = sanitize_text_field($_POST['bizprime-meta-checkbox'],'');
			    	if( in_array( $new, $valid_values ) ) {
			    		update_post_meta($post_id, 'bizprime-meta-checkbox', $new);
			    	}
			    }

			// Checks for input and saves if needed (select field)
			  	if( isset( $_POST[ 'bizprime-meta-select-layout' ] ) ) {
			  		$valid_values = array(
                       'right-sidebar',
                       'left-sidebar',
                       'no-sidebar',
   					);
			  		$new = sanitize_text_field($_POST['bizprime-meta-select-layout']);
			  		if( in_array( $new, $valid_values ) ) {
			  			update_post_meta($post_id, 'bizprime-meta-select-layout', $new);
			  		}
			  	}
			// Checks for input and saves if needed (select field)
			  	if( isset( $_POST[ 'bizprime-meta-image-layout' ] ) ) {
			  		$valid_values = array(
                       'full',
                       'right',
                       'left',
                       'no-image',
   					);
			  		$new = sanitize_text_field($_POST['bizprime-meta-image-layout']);
			  		if( in_array( $new, $valid_values ) ) {
				  		update_post_meta($post_id, 'bizprime-meta-image-layout', $new);
			  		}
			  	}
	}

endif;

add_action( 'save_post', 'bizprime_save_theme_settings_meta', 10, 3 );