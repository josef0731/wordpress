<?php
if (!function_exists('bizprime_portfolio')) :
    /**
     * portfolio
     *
     * @since bizprime 1.0.0
     *
     */
    function bizprime_portfolio()
    {
        if (1 != bizprime_get_option('show_portfolio_section')) {
            return null;
        }
        ?>
        <!-- page-section:starts -->
        <section class="section-services section-block">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="section-head">
                            <h2 class="section-title solid-border">
                                <?php echo esc_html(bizprime_get_option('main_title_portfolio_section')); ?>
                            </h2>
                        </div>
                    </div>
                </div>
                <?php $bizprime_portfolio_category_list_array = array();
                for ($i = 1; $i <= 3; $i++) {
                    $bizprime_portfolio_category_list = bizprime_get_option('select_category_for_portfolio_' . $i);
                    if (!empty($bizprime_portfolio_category_list)) {
                        $bizprime_portfolio_category_list_array[] = absint($bizprime_portfolio_category_list);
                    }
                }
                $bizprime_portfolio_args = array();
                if( !empty( $bizprime_portfolio_category_list_array) ){
                    $bizprime_portfolio_args = array(
                        'post_type' => 'post',
                        'cat' => $bizprime_portfolio_category_list_array,
                        'ignore_sticky_posts' => true,
                        'posts_per_page' => 12,
                    );
                } ?>
                <div class="twp-portfolio portfolio-masonry">
                    <div class="row">
                        <div class="col-md-3">
                            <ul class="filter-group">
                                <li><span class="filter" data-filter="*"> <?php esc_html_e('show all','bizprime') ?></span></li>
                                <?php for ($j=0; $j < count($bizprime_portfolio_category_list_array) ; $j++) {
                                    $bizprime_category = get_cat_name( $bizprime_portfolio_category_list_array[$j]);
                                    $bizprime_category_id = get_cat_id($bizprime_category);
                                    if (!empty($bizprime_category)) { ?>
                                        <li><span class="filter" data-filter=".<?php echo esc_html('cat-'.$bizprime_category_id)?>"><?php echo esc_attr( $bizprime_category, 'bizprime' )?></span></li>
                                <?php }     
                                } ?>
                            </ul>
                            <?php 
                            $bizprime_portfolio_button_text = bizprime_get_option('portfolio_button_text');
                            if (!empty($bizprime_portfolio_button_text)) { ?>
                                <div class="view-all-portfolio">
                                        <a href="<?php echo esc_url(bizprime_get_option('portfolio_button_link')); ?>"
                                           class="btn twp-btn btn-block twp-btn-primary">
                                            <?php echo esc_html(bizprime_get_option('portfolio_button_text')); ?>
                                        </a>
                                </div>
                            <?php } ?>
                        </div>

                        <div class="col-md-9">
                            <div id="portfolio-grid" class="masonry">
                                <?php 
                                $bizprime_portfolio_post_query = new WP_Query($bizprime_portfolio_args);
                                if ($bizprime_portfolio_post_query->have_posts()) :
                                    while ($bizprime_portfolio_post_query->have_posts()) : $bizprime_portfolio_post_query->the_post();
                                        $bizprime_cat_id = array();
                                        if(has_post_thumbnail()){
                                            $thumb = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'full' );
                                            $url = $thumb['0'];
                                        }
                                        else{
                                            $url = get_template_directory_uri().'/images/no-image.jpg';
                                        }
                                        $bizprime_categories = get_the_category();
                                        foreach ($bizprime_categories as $bizprime_cat) {
                                            $bizprime_cat_id[] = $bizprime_cat->term_id;
                                        }
                                        $cat_ids = implode(' cat-',$bizprime_cat_id);
                                        $bizprime_single_cat_name = get_cat_name( $cat_ids);
                                        ?>
                                            <div class="portfolio-masonry-entry masonry-item cat-<?php echo esc_html($cat_ids); ?>">
                                                <div class="portfolio-wrapper">
                                                    <a href="<?php the_permalink(); ?>" class="img-hover">
                                                        <img src="<?php echo esc_url($url); ?>"
                                                             alt="">
                                                        <div class="hover-caption">
                                                            <h6 class="alttitle"><?php echo esc_html($bizprime_single_cat_name); ?></h6>
                                                            <h5><strong><?php the_title(); ?></strong></h5>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div> <!-- END .portfolio-masonry-entry-->
                                    <?php 
                                    endwhile;
                                endif; 
                                wp_reset_postdata(); 
                                ?>
                            </div>
                        </div> <!-- END #portfolio-grid -->
                    </div><!-- END .portfolio-masonry -->
                </div>
            </div>
        </section>
        <!-- page-section:ends -->
        <?php
    }
endif;
add_action('bizprime_action_front_page', 'bizprime_portfolio', 30);