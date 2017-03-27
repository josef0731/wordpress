<?php
if (!function_exists('bizprime_callback_section')) :
    /**
     * Tab callback Details
     *
     * @since bizprime 1.0.0
     *
     */
    function bizprime_callback_section()
    {
        $bizprime_callback_button_enable = bizprime_get_option('show_page_link_button');
        $bizprime_callback_button_text = bizprime_get_option('callback_button_text');
        $bizprime_callback_button_url = bizprime_get_option('callback_button_link');
        $bizprime_callback_page = array();
        $bizprime_callback_page[] = esc_attr(bizprime_get_option('select_callback_page'));
        if (1 != bizprime_get_option('show_our_callback_section')) {
            return null;
        }
        if (!empty($bizprime_callback_page)) {
        $bizprime_callback_page_args = array(
            'post_type' => 'page',
            'post__in' => $bizprime_callback_page,
            'orderby' => 'post__in'
        );
        }
        if (!empty($bizprime_callback_page_args)) {
            $bizprime_callback_page_query = new WP_Query($bizprime_callback_page_args);
            while ($bizprime_callback_page_query->have_posts()): $bizprime_callback_page_query->the_post();
                if (has_excerpt()) {
                    $bizprime_callback_main_content = get_the_excerpt();
                } else {
                    $bizprime_callback_main_content = bizprime_words_count(30 , get_the_content());
                } 
                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'full');
                $url = $thumb['0'];
                ?>
            <!--CTA Starts-->
            <section class="section-cta section-block text-center data-bg" data-background="<?php if (has_post_thumbnail()){ echo esc_url($url); } ?>">
                <div class="cta-overlay"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2">
                            <div class="cta-title mt-40 mb-30">
                                <h3>
                                    <?php the_title(); ?>
                                </h3>
                                <p>
                                    <?php echo esc_html($bizprime_callback_main_content); ?>
                                </p>
                                <div class="cta-btns-group">
                                    <?php if (!empty($bizprime_callback_button_text)) { ?>
                                        <a href="<?php echo esc_url($bizprime_callback_button_url ); ?>" class="btn twp-btn twp-btn-primary"><?php echo esc_html($bizprime_callback_button_text); ?></a>
                                    <?php } ?>
                                    <?php if ($bizprime_callback_button_enable != 1) { ?>
                                        <a href="<?php the_permalink();?>" class="btn twp-btn twp-btn-primary"><?php _e( 'View More', 'bizprime' ); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            <!--CTA Ends-->
            <?php endwhile;
            wp_reset_postdata();
        } ?>
    <?php 
    }
endif;
add_action('bizprime_action_front_page', 'bizprime_callback_section', 60);
    ?>
