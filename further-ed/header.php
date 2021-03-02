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
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
 </head>
 <body <?php body_class(); ?> >
    <header>
        <nav class="flex max-width">
            <div class="logo">
            <!-- this function displays the logo that is defined within the wordpress admin panel  -->
                <?php if ( ! has_custom_logo() ) { ?>
                    <?php if ( is_front_page() && is_home() ) : ?>
                            <!-- //if your page is set to front-page or blog display the site title (appearance > customize) -->
                            <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
                    <?php else : ?>
                            <!-- //if your page is not set to front-page or blog display tsite title (appearance > customize) -->
                            <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>
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
                    <rect y="60" width="100" height="15"></rect>
                </svg>
            </div>
        </nav>

        <!-- trying to put this here so that it will work on all pages, if it doesnt work move back to content-home  -->
        <div class="banner" style="background: url(<?php $banner = get_field( 'banner-image' ); ?> <?php if($banner) {_e($banner);} ?>) no-repeat 50% 50%; background-size: cover;">
            <div class="opacity">
                <div class="banner-text max-width">
                    <h1><?php $bannerHeading = get_field( 'main-heading' ); ?> <?php if($bannerHeading) {_e($bannerHeading);} ?></h1>
                    <p><?php $bannerText = get_field( 'main-subheading' ); ?> <?php if($bannerText) {_e($bannerText);} ?></p>
                </div>
            </div>
        </div>
    
    </header>
<div id="content" class="site-content" >