<?php
if (!function_exists('bizprime_intro_args')) :
    /**
     * Tab Intro Details
     *
     * @since bizprime 1.0.0
     *
     * @return array $qargs Intro details.
     */
    function bizprime_intro_args()
    {
        $bizprime_intro_page_list_array = array();
        for ($i = 1; $i <= 3; $i++) {
            $bizprime_intro_page_list = bizprime_get_option('select_page_for_intro_' . $i);
            if (!empty($bizprime_intro_page_list)) {
                $bizprime_intro_page_list_array[] = absint($bizprime_intro_page_list);
            }
        }
        // Bail if no valid pages are selected.
        if (empty($bizprime_intro_page_list_array)) {
            return;
        }
        /*page query*/
        $qargs = array(
            'posts_per_page' => 3,
            'orderby' => 'post__in',
            'post_type' => 'page',
            'post__in' => $bizprime_intro_page_list_array,
        );
        return $qargs;
    }
endif;

if (!function_exists('bizprime_intro')) :
    /**
     * Banner Intro
     *
     * @since bizprime 1.0.0
     *
     */
    function bizprime_intro()
    {
        $bizprime_intro_excerpt_number = absint(bizprime_get_option('number_of_content_home_intro'));
        $bizprime_intro_main_title = '';
        $bizprime_intro_main_content = '';
        $bizprime_intro_main_url = '';
        $bizprime_intro_main_page = array();
        $bizprime_intro_main_page[] = esc_attr(bizprime_get_option('select_intro_main_page'));
        if (1 != bizprime_get_option('show_our_intro_section')) {
            return null;
        }
        /*service section main page args*/
        if (!empty($bizprime_intro_main_page)) {
            $bizprime_intro_main_page_args = array(
                'post_type' => 'page',
                'post__in' => $bizprime_intro_main_page,
                'orderby' => 'post__in'
            );
        }
        if (!empty($bizprime_intro_main_page_args)) {
            $bizprime_intro_main_page_query = new WP_Query($bizprime_intro_main_page_args);
            while ($bizprime_intro_main_page_query->have_posts()): $bizprime_intro_main_page_query->the_post();
                $bizprime_intro_main_title = get_the_title();
                $bizprime_intro_main_url = get_permalink();
                if (has_excerpt()) {
                    $bizprime_intro_main_content = get_the_excerpt();
                } else {
                    $bizprime_intro_main_content = bizprime_words_count(20 , get_the_content());
                }
            endwhile;
            wp_reset_postdata();
        } ?>
        <!-- page-section:starts -->
        <section class="section-about section-block">
            <div class="block">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-head text-center">
                                <h2 class="section-title solid-border">
                                    <a href = "<?php echo esc_url($bizprime_intro_main_url ); ?>">
                                        <?php echo wp_kses_post($bizprime_intro_main_title); ?>
                                    </a>
                                </h2>
                                <p><?php echo esc_html($bizprime_intro_main_content); ?></p>
                            </div>
                            <div class="all-intros">
                                <div class="row">
                                    <?php $bizprime_intro_args = bizprime_intro_args();
                                    $bizprime_intro_query = new WP_Query($bizprime_intro_args);
                                    $j = 1;
                                    if ($bizprime_intro_query->have_posts()) :
                                        while ($bizprime_intro_query->have_posts()) : $bizprime_intro_query->the_post();
                                            if (has_excerpt()) {
                                                $bizprime_intro_content = get_the_excerpt();
                                            } else {
                                                $bizprime_intro_content = bizprime_words_count($bizprime_intro_excerpt_number, get_the_content());
                                            }
                                            $bizprime_intro_icon = bizprime_get_option('number_of_home_intro_icon_' . $j);
                                            ?>
                                            <div class="col-md-4">
                                                <div class="service">
                                                    <span>
                                                        <i class="icon <?php echo esc_attr($bizprime_intro_icon); ?>"></i>
                                                    </span>
                                                </div>
                                                    <h4><a href= "<?php the_permalink();?>"><?php the_title(); ?></a></h4>
                                                    <p><?php echo esc_html($bizprime_intro_content); ?></p>
                                            </div>
                                            <?php
                                            $j++;
                                        endwhile;
                                        wp_reset_postdata();
                                    endif; ?>
                                </div>
                            </div><!-- All Intros -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action('bizprime_action_front_page', 'bizprime_intro', 30);
?>