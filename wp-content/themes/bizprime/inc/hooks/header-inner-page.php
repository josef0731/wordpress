<?php
global $post;
if (!function_exists('bizprime_single_page_title')) :
    function bizprime_single_page_title()
    { 
        global $post;
        $global_banner_image = get_header_image();
        // Check if single.
            if (is_singular()) {
                if ( has_post_thumbnail( $post->ID ) ) {
                    $banner_image_single_post = get_post_meta( $post->ID, 'bizprime-meta-checkbox', true );
                    if ( 'yes' == $banner_image_single_post ) {
                        $banner_image_array = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'bizprime-header-image' );
                        $global_banner_image = $banner_image_array[0];
                    }
                }
            }
            ?>
            <?php 
                $bg_animation = '';
                if (1 != bizprime_get_option('enable_moving_animation_option')) {
                    $bg_animation = 'no-animation';
                }
            ?>
        <div class="wrapper page-inner-title inner-banner data-bg <?php echo esc_attr($bg_animation); ?>" data-background="<?php echo esc_url($global_banner_image); ?>">
            <header class="entry-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8">
                            <?php if (is_singular()) { ?>
                                <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                                <?php if (!is_page()) { ?>
                                    <header class="entry-header">
                                        <div class="entry-meta entry-inner">
                                            <?php
                                            bizprime_posted_on(); ?>
                                        </div><!-- .entry-meta -->
                                    </header><!-- .entry-header -->
                                <?php }
                            } elseif (is_404()) { ?>
                                <h1 class="entry-title"><?php esc_html_e('Oops! That page can&rsquo;t be found.', 'bizprime'); ?></h1>
                            <?php } elseif (is_archive()) {
                                the_archive_title('<h1 class="entry-title">', '</h1>');
                                the_archive_description('<div class="taxonomy-description">', '</div>');
                            } elseif (is_search()) { ?>
                                <h1 class="entry-title"><?php printf(esc_html__('Search Results for: %s', 'bizprime'), '<span>' . get_search_query() . '</span>'); ?></h1>
                            <?php } else { ?>
                                <h1 class="entry-title"><?php esc_html_e('Latest Blog', 'bizprime'); ?></h1>
                            <?php }
                            ?>
                        </div>
                        <?php
                            /**
                            * Hook - bizprime_add_breadcrumb.
                            */
                            do_action( 'bizprime_action_breadcrumb' );
                        ?>
                    </div>
                </div>
            </header><!-- .entry-header -->
            <div class="inner-header-overlay">

            </div>
        </div>

        <?php
    }
endif;
add_action('bizprime-page-inner-title', 'bizprime_single_page_title', 15);
