<?php

/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until your opening main
 *container section (i.e. <div class="main-content").
 * @package further-ed
 * @since 1.0.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="flex max-width">
            <div class="logo">
                <!-- this function displays the logo that is defined within the wordpress admin panel  -->
                <?php if (!has_custom_logo()) { ?>
                    <?php if (is_front_page() && is_home()) : ?>
                        <!-- //if your page is set to front-page or blog display the site title (appearance > customize) -->
                        <a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
                    <?php else : ?>
                        <!-- //if your page is not set to front-page or blog display tsite title (appearance > customize) -->
                        <a rel="home" href="<?php echo esc_url(home_url('/')); ?>" itemprop="url"><?php bloginfo('name'); ?></a>
                    <?php endif; ?>
                    <!-- //otherwise display the custom logo. -->
                <?php
                } else {
                    the_custom_logo();
                }
                ?>
            </div>

            <!-- this displays the main-menu and any items it contains  -->
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                // 'container_class' => 'main-nav', 
                // 'container_id' => 'main-nav',
                'menu_class' => 'main-menu',
                'menu_id' => 'main-menu',
                'fallback_cb' => ''
            ));
            ?>


            <!-- hamburger menu  -->
            <div class="mobile-btn">
                <svg viewBox="0 0 100 80" width="40" height="40">
                    <rect width="100" height="15"></rect>
                    <rect y="30" width="100" height="15"></rect>
                    <rect y="30" width="100" height="15"></rect>
                    <rect y="60" width="100" height="15"></rect>
                </svg>
            </div>
        </nav>

        <?php if (is_page()) : ?>
            <div class="banner" style="background: url(<?php $banner = get_field('banner-image'); ?> <?php if ($banner) {
                                                                                                            _e($banner);
                                                                                                        } ?>) no-repeat 50% 50%; background-size: cover;">
                <div class="opacity">
                    <div class="banner-text max-width">

                        <div class="banner-logo" style="width:100px;"><?php $bannerLogo = get_field('logo'); ?> <?php if ($bannerLogo) : ?> <img src="<?php echo $bannerLogo ?>" /><?php endif; ?></div>


                        <h1><?php $bannerHeading = get_field('main-heading'); ?> <?php if ($bannerHeading) {
                                                                                        _e($bannerHeading);
                                                                                    } ?></h1>
                        <p><?php $bannerText = get_field('main-subheading'); ?> <?php if ($bannerText) {
                                                                                    _e($bannerText);
                                                                                } ?></p>

                        <?php
                        $bannerLink = get_field('button');
                        if ($bannerLink) :
                            $bannerLink_url = $bannerLink['url'];
                            $bannerLink_title = $bannerLink['title'];
                            $bannerLink_target = $bannerLink['target'] ? $bannerLink['target'] : '_self';
                        ?>
                            <button class="btn-red donate"><a href="<?php echo esc_url($bannerLink_url); ?>" target="<?php echo esc_attr($bannerLink_target); ?>"><?php echo esc_html($bannerLink_title); ?></a></button>
                        <?php endif; ?>
                        <?php if ('yes' == get_field('search')) : ?>
                            <?php get_search_form(); ?>
                        <?php endif; ?>

                    </div>

                </div>
            </div>
            </div>
        <?php endif; ?>

    </header>
    <div id="content" class="site-content">