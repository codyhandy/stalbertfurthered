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

<?php if ( ! has_custom_logo() ) { ?>
                <?php if ( is_front_page() && is_home() ) : ?>
                        <!-- //if your page is set to front-page or blog display the site
                        title (appearance > customize) -->
                        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        itemprop="url"><?php bloginfo( 'name' ); ?></a>
                <?php else : ?>
                        <!-- //if your page is not set to front-page or blog display the
                        site title (appearance > customize) -->
                        <a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>"
                        itemprop="url"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
             <!-- //otherwise display the custom logo. -->
             <?php 
                } else {
                    the_custom_logo();
                }
             ?>
 
 </header>
<div id="content" class="site-content" >