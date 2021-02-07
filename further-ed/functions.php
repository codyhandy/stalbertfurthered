<?php
/**
* @package further-ed
* @since 1.0.0
**/
//STYLES & SCRIPTS FUNCTION
function fe_enqueue_styles() {
 //styles
 wp_enqueue_style( 'style', get_stylesheet_uri() );
 
 wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', array ( 'jquery' ), 1.1, true);
 //enqueue scripts:
 //wp_enqueue_scripts('file-name', get_template_directory_uri(), '/path/to/file.js', array('jquery'),1.1, true);
}
add_action('wp_enqueue_scripts', 'fe_enqueue_styles');


function register_menus() {
    register_nav_menus(
    array(
    'main-menu' => 'Main Menu',
    'footer-menu' => 'Footer Menu',
    )
    );
    }
    add_action( 'init', 'register_menus' );

    function theme_setup(){
        /** post formats */
        $post_formats =
       array('aside','image','gallery','video','audio','link','quote','status');
        add_theme_support( 'post-formats', $post_formats);
        /** post thumbnail **/
        add_theme_support( 'post-thumbnails' );
        
       add_action('after_setup_theme','theme_setup');
        /** post formats */
        $post_formats =
       array('aside','image','gallery','video','audio','link','quote','status');
        add_theme_support( 'post-formats', $post_formats);
        /** post thumbnail **/
        add_theme_support( 'post-thumbnails' );
        /** title-tag **/
        add_theme_support( 'title-tag' );
        /** HTML5 support **/
        add_theme_support( 'html5', array( 'comment-list', 'comment-form',
       'search-form', 'gallery', 'caption' ) );
        /** refresh widgest **/
        add_theme_support( 'customize-selective-refresh-widgets' );
        /** custom background **/
        $bg_defaults = array(
        'default-image' => '',
        'default-preset' => 'default',
        'default-size' => 'cover',
        'default-repeat' => 'no-repeat',
        'default-attachment' => 'scroll',
        );
        
        add_theme_support( 'custom-background', $bg_defaults );
        /** custom header **/
        $header_defaults = array(
        'default-image' => '',
        'width' => 300,
        'height' => 60,
        'flex-height' => true,
        'flex-width' => true,
        'default-text-color' => '',
        'header-text' => true,
        'uploads' => true,
        );
        add_theme_support( 'custom-header', $header_defaults );

        /** custom logo **/

        add_theme_support( 'custom-logo', array(
        'height' => 60,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
        'header-text' => array( 'site-title', 'site-description' ),
        ) );
       }

       add_action('after_setup_theme','theme_setup');

    //    $yf_includes = array(
    //     '/widgets.php', // Register widget area.
    //     );
    //     foreach ( $yf_includes as $file ) {
    //     $filepath = locate_template( 'includes' . $file );
    //     if ( ! $filepath ) {
    //     trigger_error( sprintf( 'Error locating /inc%s for inclusion',
    //    $file ), E_USER_ERROR );
    //     }
    //     require_once $filepath;
    //     }

        
        // add_action( 'wp_enqueue_scripts', function() {

        //     wp_enqueue_style( 'dashicons' );
        
        // } );

        function page_pagination(){
            global $wp_query;
    
            $total_pages = $wp_query ->max_num_pages;
            if ($total_pages > 1){
                $current_page = max(1, get_query_var('paged'));
                echo paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%', 
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text' => 'Prev',
                    'next_text' => 'Next'
                ));
            }
        }
        function post_pagination(){
            global $wp_query;
            ?>
            <ul class = "pagination" role="navigation"> 
            <li class ="prev-post-nav">
            <?php previous_post_link('%link', '< Prev'); ?>
            </li>
            <li class ="next-post-nav">
            <?php next_post_link('%link', 'Next >'); ?>
            </li>
            </ul>
            <?php
            }

function oenology_add_menu_parent_class( $items ) {
 
 $parents = array();
 foreach ( $items as $item ) {
 if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
 $parents[] = $item->menu_item_parent;
 }
 }
 
 foreach ( $items as $item ) {
 if ( in_array( $item->ID, $parents ) ) {
 $item->classes[] = 'has-children';
 }
 }
 
 return $items;
}
add_filter( 'wp_nav_menu_objects', 'oenology_add_menu_parent_class' );
