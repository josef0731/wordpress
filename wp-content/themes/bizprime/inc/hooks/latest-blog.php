<?php
if (!function_exists('bizprime_blog')) :
    /**
     * blog
     *
     * @since bizprime 1.0.0
     *
     */
    function bizprime_blog()
    {
        $bizprime_blog_excerpt_number = absint(bizprime_get_option('number_of_excerpt_home_blog'));
        $bizprime_blog_category = esc_attr(bizprime_get_option('select_category_for_blog'));
        if (1 != bizprime_get_option('show_blog_section')) {
            return null;
        }
        ?>
        <section class="latest-post section-bg section-block">
            <div class="container">
                <div class="row">
                    <div class="latest-blog-heading clearfix">
                        <div class="col-sm-12 col-xs-12">
                            <div class="section-head">
                                <h2 class="section-title text-center">
                                    <?php echo esc_html(bizprime_get_option('main_title_blog_section')); ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix col-sm-12 mb-20">
                        <hr>
                    </div>
                    <div class="col-xs-12">
                        <?php
                        $bizprime_home_blog_args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 4,
                            'cat' => $bizprime_blog_category,
                        );
                        $bizprime_home_about_post_query = new WP_Query($bizprime_home_blog_args);
                        if ($bizprime_home_about_post_query->have_posts()) :
                            while ($bizprime_home_about_post_query->have_posts()) : $bizprime_home_about_post_query->the_post();
                                if (has_post_thumbnail()) {
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), 'bizprime-medium');
                                    $url = $thumb['0'];
                                } else {
                                    $url = get_template_directory_uri() . '/images/no-image.jpg';
                                }
                                if (has_excerpt()) {
                                    $bizprime_blog_content = get_the_excerpt();
                                } else {
                                    $bizprime_blog_content = bizprime_words_count($bizprime_blog_excerpt_number, get_the_content());
                                }
                                ?>
                                <article class="twp-post mb-20">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-4">
                                            <div class="image-box image-hover inner-title">
                                                <a href="<?php the_permalink(); ?>">
                                                <span class="latest-blog-img image data-bg clearfix"
                                                      data-background="<?php echo esc_url($url); ?>">
                                                </span>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-8">
                                            <div class="latestblog-title">
                                                <h3 class="entry-title  alt-font text-uppercase">
                                                    <a href="<?php the_permalink(); ?>">
                                                        <?php the_title(); ?>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div class="latestblog-content">
                                                <?php echo wp_kses_post($bizprime_blog_content); ?>
                                            </div>
                                            <div class="latestblog-meta">
                                                <ul class="twp-postmeta list-unstyled">
                                                    <li>
                                                        <a class="twp-postmeta-author"
                                                           href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                                            <i class="ion-android-person"></i> <?php echo esc_html(get_the_author()); ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <?php
                                                        $archive_day = get_the_time('d');
                                                        ?>
                                                        <a class="twp-postmeta-date"
                                                           href="<?php echo esc_attr(get_day_link('', '', $archive_day)); ?>">
                                                            <i class="ion-calendar"></i> <?php echo esc_attr(get_the_date('M j, Y')); ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <?php
                                wp_reset_postdata();
                            endwhile;
                        endif;
                        ?>
                    </div>
                    <?php 
                    $bizprime_blog_button_text = bizprime_get_option('blog_button_text');
                    if (!empty($bizprime_blog_button_text)) { ?>
                        <div class="col-sm-4 col-sm-offset-4 col-xs-12">
                            <div class="text-center">
                                <a href="<?php echo esc_url(bizprime_get_option('blog_button_link')); ?>"
                                   class="btn twp-btn btn-block twp-btn-primary mt-20 mb-20">
                                    <?php echo esc_html(bizprime_get_option('blog_button_text')); ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </section>
        <?php
    }
endif;
add_action('bizprime_action_front_page', 'bizprime_blog', 70);