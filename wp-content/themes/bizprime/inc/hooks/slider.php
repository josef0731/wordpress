<?php
if (!function_exists('bizprime_banner_slider_args')) :
    /**
     * Banner Slider Details
     *
     * @since bizprime 1.0.0
     *
     * @return array $qargs Slider details.
     */
    function bizprime_banner_slider_args()
    {
        $bizprime_banner_slider_number = absint(bizprime_get_option('number_of_home_slider'));
        $bizprime_banner_slider_from = esc_attr(bizprime_get_option('select_slider_from'));
        switch ($bizprime_banner_slider_from) {
            case 'from-page':
                $bizprime_banner_slider_page_list_array = array();
                for ($i = 1; $i <= $bizprime_banner_slider_number; $i++) {
                    $bizprime_banner_slider_page_list = bizprime_get_option('select_page_for_slider_' . $i);
                    if (!empty($bizprime_banner_slider_page_list)) {
                        $bizprime_banner_slider_page_list_array[] = absint($bizprime_banner_slider_page_list);
                    }
                }
                // Bail if no valid pages are selected.
                if (empty($bizprime_banner_slider_page_list_array)) {
                    return;
                }
                /*page query*/
                $qargs = array(
                    'posts_per_page' => esc_attr($bizprime_banner_slider_number),
                    'orderby' => 'post__in',
                    'post_type' => 'page',
                    'post__in' => $bizprime_banner_slider_page_list_array,
                );
                return $qargs;
                break;

            case 'from-category':
                $bizprime_banner_slider_category = esc_attr(bizprime_get_option('select_category_for_slider'));
                $qargs = array(
                    'posts_per_page' => esc_attr($bizprime_banner_slider_number),
                    'post_type' => 'post',
                    'cat' => $bizprime_banner_slider_category,
                );
                return $qargs;
                break;

            default:
                break;
        }
        ?>
        <?php
    }
endif;


if (!function_exists('bizprime_banner_slider')) :
    /**
     * Banner Slider
     *
     * @since bizprime 1.0.0
     *
     */
    function bizprime_banner_slider()
    {
        $bizprime_slider_button_text = esc_html(bizprime_get_option('button_text_on_slider'));
        $bizprime_slider_excerpt_number = absint(bizprime_get_option('number_of_content_home_slider'));
        if (1 != bizprime_get_option('show_slider_section')) {
            return null;
        }
        $bizprime_banner_slider_args = bizprime_banner_slider_args();
        $bizprime_banner_slider_query = new WP_Query($bizprime_banner_slider_args); ?>
        <section id="intro" class="hero-slider section-block overlay" >
            <div class="intro-slider carousel inner-controls" data-single-item data-transition="fade" data-navigation
                 data-pagination>
                <?php
                if ($bizprime_banner_slider_query->have_posts()) :
                    while ($bizprime_banner_slider_query->have_posts()) : $bizprime_banner_slider_query->the_post();
                        if (has_post_thumbnail()) {
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'bizprime-slider-image');
                            $url = $thumb['0'];
                        } else {
                            $url = NULL;
                        }
                        if (has_excerpt()) {
                            $bizprime_slider_content = get_the_excerpt();
                        } else {
                            $bizprime_slider_content = bizprime_words_count($bizprime_slider_excerpt_number, get_the_content());
                        }
                        ?>
                        <!-- Slide -->
                        <div class="slide-item">
                            <!-- BG Image -->
                            <div class="bg-image layer layer-zoomOutBg">
                                <img src="<?php echo esc_url($url); ?>">
                            </div>
                            <div class="container v-center">
                                <div class="row">
                                    <div class="col-sm-10 col-md-6">
                                        <div class="layer layer-fadeInLeft">
                                            <h2 class="slide-title"><?php the_title(); ?></h2>
                                        </div>
                                        <div class="layer layer-fadeInRight">
                                            <p><?php echo wp_kses_post($bizprime_slider_content); ?></p>
                                        </div>
                                        <div class="layer layer-fadeInUp">
                                            <?php if (!empty ($bizprime_slider_button_text)) { ?>
                                                <a href="<?php the_permalink(); ?>" class="btn twp-btn twp-btn-primary"><?php echo esc_html($bizprime_slider_button_text); ?></a>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </section>
            <!-- end slider-section -->
        <?php
    }
endif;
add_action('bizprime_action_front_page', 'bizprime_banner_slider', 10);