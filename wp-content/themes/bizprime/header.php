<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Bizprime
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- full-screen-layout/boxed-layout -->
<?php if (bizprime_get_option('homepage_layout_option') == 'full-width') {
    $bizprime_homepage_layout = 'full-screen-layout';
} elseif (bizprime_get_option('homepage_layout_option') == 'boxed') {
    $bizprime_homepage_layout = 'boxed-layout';
} ?>
<div id="page" class="site site-bg <?php echo esc_attr($bizprime_homepage_layout); ?>">
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'bizprime'); ?></a>

    <div class="search-box">
        <?php get_search_form(); ?>
    </div><!--    Searchbar Ends-->
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-3">
                    <div class="pull-left">
                        <?php if (bizprime_get_option('social_icon_style') == 'circle') {
                            $bizprime_social_icon = 'bordered-radius';
                        } else {
                            $bizprime_social_icon = '';
                        } ?>
                        <div class="social-icons <?php echo esc_attr($bizprime_social_icon); ?>">
                            <?php
                            wp_nav_menu(
                                array('theme_location' => 'social', 
                                        'link_before' => '<span>',
                                        'link_after' => '</span>',
                                        'menu_id' => 'social-menu',
                                        'fallback_cb' => false,
                                        'menu_class'=> false
                                    )); ?>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-lg-9">
                    <div class="top-bar-info">
                        <ul class="clearfix list-unstyled">
                            <?php 
                            $bizprime_top_header_location = esc_html(bizprime_get_option('top_header_location'));
                            if (!empty($bizprime_top_header_location)) { ?>
                                <li>
                                    <div class="grid-box icon-box">
                                        <i class="icon twp-icon ion-ios-location"></i>
                                    </div>
                                    <div class="grid-box icon-box icon-box-content">
                                        <h4 class="icon-box-title"><?php esc_html_e( 'Location', 'bizprime' ); ?></h4>
                                        <span class="icon-box-subtitle"><?php echo esc_html(bizprime_get_option('top_header_location')); ?></span>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php 
                            $bizprime_top_header_telephone = esc_attr(bizprime_get_option('top_header_telephone'));
                            if (!empty($bizprime_top_header_telephone)) { ?>
                                <li>
                                    <div class="grid-box icon-box">
                                        <i class="icon twp-icon ion-ios-telephone"></i>
                                    </div>
                                    <div class="grid-box icon-box icon-box-content">
                                        <h4 class="icon-box-title"><?php esc_html_e( 'Telephone', 'bizprime' ); ?></h4>
                                            <a href="tel:<?php echo preg_replace( '/\D+/', '', esc_attr( bizprime_get_option('top_header_telephone') ) ); ?>">
                                                 <span class="icon-box-subtitle">
                                                    <?php echo esc_attr( bizprime_get_option('top_header_telephone') ); ?>
                                                 </span>
                                            </a>
                                    </div>
                                </li>
                            <?php } ?>
                            <?php 
                            $bizprime_top_header_email = bizprime_get_option('top_header_email');
                            if (!empty($bizprime_top_header_email)) { ?>
                                <li>
                                    <div class="grid-box icon-box">
                                        <i class="icon twp-icon ion-ios-email"></i>
                                    </div>
                                    <div class="grid-box icon-box icon-box-content">
                                        <h4 class="icon-box-title"><?php esc_html_e( 'Email', 'bizprime' ); ?></h4>
                                            <a href="mailto:<?php echo esc_attr( bizprime_get_option('top_header_email') ); ?>">
                                                <span class="icon-box-subtitle">
                                                    <?php echo esc_attr( antispambot(bizprime_get_option('top_header_email'))); ?>
                                                </span>
                                            </a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="twp-nav ">
                        <ul class="navbar-extras">
                            <li>
                                <a href="#" class="search-button">
                                    <i class="icon twp-icon ion-ios-search"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!--    Topbar Ends-->
    <header id="masthead" class="site-header" role="banner">
        <div class="top-header">
            <div class="container">
                <div class="site-branding">
                    <?php
                    if (is_front_page() && is_home()) : ?>
                        <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                    rel="home"><?php bloginfo('name'); ?></a></span>
                    <?php else : ?>
                        <span class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                    rel="home"><?php bloginfo('name'); ?></a></span>
                        <?php
                    endif;
                    bizprime_the_custom_logo();
                    $description = get_bloginfo('description', 'display');
                    if ($description || is_customize_preview()) : ?>
                        <p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
                        <?php
                    endif; ?>
                </div><!-- .site-branding -->

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <a id="nav-toggle" href="#" aria-controls="primary-menu" aria-expanded="false">
                        <span class="screen-reader-text">
                            <?php esc_html_e('Primary Menu', 'bizprime'); ?>
                        </span>
                        <span class="icon-bar top"></span>
                        <span class="icon-bar middle"></span>
                        <span class="icon-bar bottom"></span>
                    </a>
                    <?php wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'menu_id' => 'primary-menu',
                        'container' => 'div',
                        'container_class' => 'menu'
                    )); ?>
                </nav><!-- #site-navigation -->
            </div>
        </div>
    </header>
    <!-- #masthead -->
    <!-- Innerpage Header Begins Here -->
    <?php
    if (is_front_page() && !is_home()) {

    } else {
        do_action('bizprime-page-inner-title');
    }
    ?>
    <!-- Innerpage Header Ends Here -->
    <div id="content" class="site-content">