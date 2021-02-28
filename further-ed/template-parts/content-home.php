<?php
/***
* Template part for displaying content in the front-page.php (home page)
* @link https://developer.wordpress.org/theme/basics/template-hierarchy/
*
* @package further-ed
* @since 1.0.0
*/
?>
<!-- content-home.php -->
<article <?php post_class();?> id="post-<?php the_ID();?>">
    <?php
        //creates the query to fetch the services
        //parameters display the latest services.
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => 3,
            'orderby' => 'date', 
            'order' => 'ASC' 

        );
        //new WP_Query object saved as the variable $the_query.
        $the_produce_query = new WP_Query( $args );
    ?>

    <section class="section1 max-width">
        <h2><?php $headingSection1 = get_field( 'heading-section1' ); ?> <?php if($headingSection1) {_e($headingSection1);} ?></h2>
        <p><?php $textSection1 = get_field( 'text-section1' ); ?> <?php if($textSection1) {_e($textSection1);} ?></p>

        <!-- this block is for dynamically loading links  -->
        <?php 
            $linkSection1 = get_field( 'link-section1' );
            if($linkSection1):
                // create variables to store the link and the title
                $link_title = $linkSection1['title'];
                $link_url = $linkSection1['url'];
        ?>
            <button class="btn"><a href="<?php print_r( esc_url ($link_url) ); ?>"><?php print_r( esc_html($link_title) ); ?></a></button>
            <?php endif; ?>
    </section>

    <section class="featured">
        <div class="max-width">
            <h2><?php $headingFeatured = get_field( 'heading-featured' ); ?> <?php if($headingFeatured) {_e($headingFeatured);} ?></h2>
            <p><?php $textFeatured = get_field( 'text-featured' ); ?> <?php if($textFeatured) {_e($textFeatured);} ?></p>

            <!-- this block is for dynamically loading links  -->
            <?php 
                $linkFeatured = get_field( 'link-featured' );
                if($linkFeatured):
                    // create variables to store the link and the title
                    $link_title = $linkFeatured['title'];
                    $link_url = $linkFeatured['url'];
            ?>
                <button class="btn"><a href="<?php print_r( esc_url ($link_url) ); ?>"><?php print_r( esc_html($link_title) ); ?></a></button>
                <?php endif; ?>  
        </div>
    </section>

    <section class="section2">
        <div class="max-width">
            <h2><?php $headingSection2 = get_field( 'heading-section2' ); ?> <?php if($headingSection2) {_e($headingSection2);} ?></h2>
            <p><?php $textSection2 = get_field( 'text-section2' ); ?> <?php if($textSection2) {_e($textSection2);} ?></p>

            <!-- this block is for dynamically loading links  -->
            <?php 
                $linkSection2 = get_field( 'link-section2' );
                if($linkSection2):
                    // create variables to store the link and the title
                    $link_title = $linkSection2['title'];
                    $link_url = $linkSection2['url'];
            ?>
                <button class="btn"><a href="<?php print_r( esc_url ($link_url) ); ?>"><?php print_r( esc_html($link_title) ); ?></a></button>
                <?php endif; ?>  
        </div>
    </section>

</article>