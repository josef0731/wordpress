<?php
/**
 * Public shortcodes for the plugin, class.
 *
 * @package    Amo_Team_Showcase
 * @subpackage Amo_Team_Showcase/public
 * @author     AMO Themo (Oleg Goltsev)
 */
class Amo_Team_Showcase_Shortcodes {


	/**
	 * The renderer (reference to object saved in Amo_Team_Showcase class instance)
	 * that's responsible for rendering partials (view templates) of the plugin
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var object Amo_Team_Showcase_Views_Renderer $renderer
	 */
	public $renderer = false;

	/**
	 * Reference to the instance of Amo_Team_Showcase, where all general (admin and public) functions/properties reside.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var object Amo_Team_Showcase $gpo
	 */
	private $gpo;

	/**
	 * Instance of Amo_Team_Showcase_Public, where all general public functions reside.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var object Amo_Team_Showcase_Public $plugin_public
	 */
	private $plugin_public;


	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param  object $general_plugin_obg - Reference to Amo_Team_Showcase object, where all general functions/properties reside.
	 * @param  object $plugin_public - Reference to Amo_Team_Showcase object, where all public functions/properties reside.
	 */
	public function __construct( $general_plugin_obg, $plugin_public ) {

		$this->gpo = $general_plugin_obg;
		$this->plugin_public = $plugin_public;

		$this->init_public_shortcodes();

	} // __construct


	/**
	 * Initialize/add plugin shortcodes.
	 *
	 * @since  1.0.0
	 */
	private function init_public_shortcodes() {
		add_shortcode( 'amoteam', array( $this, 'sc_amoteam' ) );
		add_shortcode( 'amo_member', array( $this, 'sc_amo_member' ) );
		add_shortcode( 'amoteam_text', array( $this, 'sc_amo_text_block' ) );
		add_shortcode( 'amoteam_skills', array( $this, 'sc_amo_skills' ) );
		add_shortcode( 'amoteam_skill', array( $this, 'sc_amo_single_skill' ) );
	} // init_public_shortcodes | FNC

	/*-------------------------------------------------------------------
	▐	0. SHORTCODES HELPER FUNCTIONS
	--------------------------------------------------------------------*/
	/**
	 * Helps to output team or team member shortcodes.
	 *
	 * @since  1.0.0
	 */
	private function team_or_member_loop( $type, $a, $query_args ) {
		$plugin_options = get_option( $this->gpo->get_plugin_name() . '-options');

		/*  SANITIZATION
		-------------------------------------------------------------------*/
		// Prevent item width be less than 200px
		if ( $a['item-width'] < 200 ) {	$a['item-width'] = 200; }

		// If not set "style" in the shortcode use plugin options parameter
		if ( ! $a['style'] || $a['style'] > 2.1  ) {
			$a['style'] = $plugin_options['tile-style'];
		} else {
			$a['style'] = str_replace( '.', '_', $a['style'] );
		}

		/*  PREPARATION
		-------------------------------------------------------------------*/
		$thumbs_html = $panels_html = $post_has_thumbnail = $sc_id = $round_style = '';
		$random_id = mt_rand( 1, mt_getrandmax() );
		$panel_is_on = ( 'off' != $a['panel'] ) ? true : false;
		$sc_extra_class = ' ' . esc_attr( $a['class'] );

		// Set classes for member tile
		$tile_classes = 'tile-style-' . $a['style'];
		if ( strpos( $tile_classes, '-2' ) ) {
			$tile_classes .= ' {p}round-style';
			$round_style = true;
		}
		if ( strpos( $a['style'], '_' ) ) {
			$tile_classes .=  ' {p}tile-style-' . $a['style'][0];
		}
		$tile_classes .= $sc_extra_class;

		/*  LOOP AND OUTPUT
		-------------------------------------------------------------------*/
		// Team / Member shortcode assembling Loop
		$sc_query = new WP_Query( $query_args );

		// Variable to determine first and last post in the query
		$posts_num = $sc_query->post_count;
		$post_counter = 0;

		if ( $sc_query->have_posts() ): while( $sc_query->have_posts() ): $sc_query->the_post();
			global $post;
			$post_counter ++;

			if ( has_post_thumbnail() ) {
				// post/member metaboxes
				$metaboxes = get_post_meta( $post->ID, 'amo-team-member-metabox', true );
				$image = wp_get_attachment_image_src( get_post_thumbnail_id(), AMO_TEAM_SHOWCASE_CSS_PREFIX . 'general' );
				$post_format_link = 'link' == $metaboxes['post_format'] || false;
				$panel_modal_id = AMO_TEAM_SHOWCASE_CSS_PREFIX . 'panel-' . $random_id . '-' . $post->ID;
				$post_title = get_the_title();
				$last_post = ( $post_counter == $posts_num ? true : false );
				$first_post = $post_counter === 1;

				// additional <li> classes
				// js fix class for round image style, if the image is not a rectangle
				$li_class = ( $round_style && $image[1] !== $image[2] ) ? ' {p}js-round-fix' : '';

				// common arguments
				$args = array(
					'class'            => $tile_classes, // escaped earlier in code
					'li_class'         => $li_class,
					'img_url'          => $image[0],
					'title'            => esc_html( $post_title ),
					'title_attr'       => esc_attr( $post_title ),
					'subtitle'         => esc_html( $metaboxes['subtitle'] ),
					'opts'             => $plugin_options,
					'sc_id'            => ( $first_post ?
						// complete $sc_id
						( $sc_id = AMO_TEAM_SHOWCASE_CSS_PREFIX . "sc-{$type}-" . $random_id ) : false ),
					'last_post'        => $last_post,
					'panel_or_link'    => ( $panel_is_on || $post_format_link ) ? true : false,
					'hover-icon'       => $post_format_link ? 'icon-hover-link' : 'icon-hover-info',
					'link_params'      => $post_format_link
						? 'target="_blank" href="' . esc_url( $metaboxes['link-url'] ) . '"'
						: 'class="'.AMO_TEAM_SHOWCASE_CSS_PREFIX.'popup-link" href="#' . $panel_modal_id . '"',
				);

				// render member thumbnails / tiles
				$this->renderer->set_variables( $args );
				$thumbs_html .= $this->renderer->render( 'general', 'tile-styles' );


				/*  INFO PANEL OUTPUT
				-------------------------------------------------------------------*/
				// First post opens panels wrapper div
				if ( $first_post ) { $panels_html .=  '<div class="'. AMO_TEAM_SHOWCASE_CSS_PREFIX . 'panels">'; };
				// render info panels
				if ( $panel_is_on && ! $post_format_link ) {
					$std_post_formats = in_array( $metaboxes['post_format'], array( false, 'qoute') );

					// panel classes
					$panel_classes = '{p}panel-align-' . $a['panel'];
					$panel_classes .= ' {p}panel-pf-' . ( $metaboxes['post_format'] ? $metaboxes['post_format'] : 'standard' );
					$panel_classes .= $sc_extra_class;

					// determine image for the panel
					if ( $metaboxes['post_format'] == 'image' && $metaboxes['panel-img'] ) {
						$img_url = esc_attr( $metaboxes['panel-img'] );
					} else {
						$img_url = $image[0];
					}

					$this->renderer->set_variables( $args + array(
							'panel_id'         => $panel_modal_id,
							'panel_classes'    => $panel_classes,
							'panel'            => $a['panel'],
							'panel_img'        => esc_attr( $img_url ),
							'metaboxes'        => $metaboxes,
							'std_post_formats' => $std_post_formats,
							'content'          => apply_filters( 'the_content', get_the_content() ),
							'code-block'       => ( ! empty( $metaboxes['code-block'] ) )
								? $this->plugin_public->remove_tags_and_attributes_from_html( $metaboxes['code-block'], array( 'script' ) )
								: false, // code-block
						) );
					$panels_html .= $this->renderer->render( 'panel' );
				} // panel_is_on
				if ( $last_post ) {	$panels_html .=  '</div><!-- .panels -->'; };

			} // IF has_post_thumbnail

		endwhile; endif;
		wp_reset_postdata(); // End $sc_query LOOP

		/*  <SCRIPT> VARIABLES
		-------------------------------------------------------------------*/
		$script_params = array(
			'type'       => $type,
			'scID'       => '#' . $sc_id,
			'itemWidth'  => (int) $a['item-width'],
			'itemMargin' => (int) $a['item-margin'],
			'align'      => $a['align'] ? $a['align'] : $plugin_options['tile-alignment'],
			'fullWidth'  => $a['full-width'],
			'panel'      => $a['panel'],
		);

		$thumbs_html .= '<script>amoTeamVars.'. $type .'SC.push('.json_encode($script_params).')</script>';

		// Output shortcode's HTML
		return $thumbs_html . $panels_html;
	} // team_or_member_loop | FNC


	/**
	 * Highlights certain word (designated by %word%), by wrapping it in <span>
	 *
	 * @since  1.0.0
	 */
	private function highlight_word( $string, &$unhighlight_string = false ) {
		if ( $unhighlight_string ) $unhighlight_string = str_replace( '%', '', $unhighlight_string);
		return preg_replace('/%([^%]+)%/', '<span class="{p}panel-highlight-word">$1</span>', $string );
	} // FNC

	/*-------------------------------------------------------------------
	▐	1. TEAM SHORTCODE
	--------------------------------------------------------------------*/
	public function sc_amoteam( $atts ) {
		// Attributes
		$a = shortcode_atts(
			array(
				'max'         => 50,
				'categories'  => false,
				'item-width'  => '250',
				'full-width'  => 'yes',
				'item-margin' => '20',
				'panel'       => 'right',

				'align'       => false, // not present in the SC
				'style'       => false,   // not present in the SC
				'class'       => '', // not present in the SC
			), $atts );

		/*  SANITIZATION
		-------------------------------------------------------------------*/
		// Prevent max number of members be more than 50
		if ( $a['max'] > 50) { $a['max'] = 50; }

		/*  PREPARATION
		-------------------------------------------------------------------*/
		// enqueue scripts needed for plugin's shortcode
		$this->plugin_public->enqueue_public_scripts_on_demand();

		// initiate render dependencies
		$this->gpo->render_dependencies( $this, true );

		// if categories are set in the shortcode
		$categories = $a['categories'] ? array(
			array(
				'taxonomy' => 'amo-team-category',
				'terms'    => explode( ',', $a['categories'] ),
			),
		) : '';

		// Team query arguments
		$team_query_args = array(
			'post_type' => 'amo-team',
			'posts_per_page' => $a['max'],
			'tax_query' => $categories,
		);

		/*  LOOP AND OUTPUT
		-------------------------------------------------------------------*/
		return $this->team_or_member_loop('team', $a, $team_query_args );
	} // amoteam | SHORTCODE


	/*-------------------------------------------------------------------
	▐	2. MEMBER SHORTCODE
	--------------------------------------------------------------------*/
	public function sc_amo_member( $atts ) {
		// Attributes
		$a = shortcode_atts(
			array(
				'id'          => false,
				'item-width'  => '250',
				'item-margin' => '20',
				'full-width'  => 'yes',
				'panel'       => 'right',
				'align'       => false,

				'style'       => false,   // not present in the SC
				'class'       => '', // not present in the SC
			), $atts );


		/*  SANITIZATION
		-------------------------------------------------------------------*/
		// If post id is empty, return
		if ( ! $a['id'] ) return false;

		// Prepare id/ids for WP query
		$a['id'] = explode( ',', $a['id'] );

		// Full-Width and item-margin parameters allowed only,
		// when more than one member/post in the shortcode block
//		if ( count( $a['id'] ) < 2 ) {
//			$a['item-margin'] = 0;
//			$a['full-width'] = 'no';
//		}

		/*  PREPARATION
		-------------------------------------------------------------------*/
		// enqueue scripts needed for plugin's shortcode
		$this->plugin_public->enqueue_public_scripts_on_demand();

		// initiate render dependencies
		$this->gpo->render_dependencies( $this, true );

		// Team query arguments
		$team_query_args = array(
			'post_type'      => 'amo-team',
			'post__in'       => $a['id'],
			'orderby'        => 'post__in',
			'posts_per_page' => - 1,
		);

		/*  LOOP AND OUTPUT
		-------------------------------------------------------------------*/
		return $this->team_or_member_loop( 'member', $a, $team_query_args );
	} // amo_member | SHORTCODE


	/*-------------------------------------------------------------------
	▐	3. TEXT BLOCK SHORTCODE
	--------------------------------------------------------------------*/
	function sc_amo_text_block( $atts, $content = "" ) {
		// Attributes
		$a = shortcode_atts(
			array(
				'title'         => '',
				'subtitle'      => '',
				'class'         => '', // not present in the SC
			), $atts );

		/*  Prepare variables for the template
		-------------------------------------------------------------------*/
		if ( $a['subtitle'] ) {
			$a['subtitle'] = $this->highlight_word( $a['subtitle'], $a['title'] );

		} else {
			$a['title']  = $this->highlight_word( $a['title'], $a['subtitle'] );
			$a['class'] .= ' {p}panel-sc-only-title';
		} // IF is subtitle


		/*  Prepare to render the template
		-------------------------------------------------------------------*/
		// enqueue scripts needed for plugin's shortcode
		$this->plugin_public->enqueue_public_scripts_on_demand();

		// initiate render dependencies
		$this->gpo->render_dependencies( $this, true );

		// render the shortcode
		$this->renderer->set_variables( array(
			'title'         => $a['title'],
			'subtitle'      => $a['subtitle'],
			'class'         => $a['class'],
			'content'       => do_shortcode( $content ),
		) );

		$html = $this->renderer->render( 'sc-text-block' );

		return $html;

	} // amo_bio | SHORTCODE


	/*-------------------------------------------------------------------
	▐	3. SKILLS SHORTCODE
	--------------------------------------------------------------------*/
	function sc_amo_skills( $atts, $content = "" ) {
		// Attributes
		$a = shortcode_atts(
			array(
				'title'    => '',
				'class'    => '', // not present in the SC
			), $atts );

		/*  Prepare variables for the template
		-------------------------------------------------------------------*/
		$a['title'] = $this->highlight_word( $a['title'] );


		/*  Prepare to render the template
		-------------------------------------------------------------------*/
		// enqueue scripts needed for plugin's shortcode
		$this->plugin_public->enqueue_public_scripts_on_demand();

		// initiate render dependencies
		$this->gpo->render_dependencies( $this, true );

		// render the shortcode
		$this->renderer->set_variables( array(
			'title'    => $a['title'],
			'class'    => $a['class'],
			'content'  => do_shortcode( $content ),
		) );

		$html = $this->renderer->render( 'sc-skills' );

		return $html;

	} // amo_bio | SHORTCODE


	/*-------------------------------------------------------------------
	▐	4. SINGLE SKILL SHORTCODE
	--------------------------------------------------------------------*/
	function sc_amo_single_skill( $atts ) {
		// Attributes
		$a = shortcode_atts(
			array(
				'title'    => '',
				'percent'  => '',
				'class'    => '', // not present in the SC
			), $atts );


		/*  Prepare to render the template
		-------------------------------------------------------------------*/
		$html = '';
		if ( is_object( $this->renderer ) ) {
			// render the shortcode
			$this->renderer->set_variables( array(
				'title'    => $a['title'],
				'percent'  => $a['percent'],
				'class'    => $a['class'],
			) );

			$html = $this->renderer->render( 'sc-skills-single' );
		}

		return $html;

	} // amo_single_skill | SHORTCODE


} // CLASS
