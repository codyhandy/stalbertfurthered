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
            'post_type' => 'single-service',
            'posts_per_page' => 3,
            'orderby' => 'date', 
            'order' => 'ASC' 

        );
        //new WP_Query object saved as the variable $the_query.
        $the_service_query = new WP_Query( $args );
    ?>

    <section class="section1">
        <div class="max-width lg-flex">
            <div class="text-container">
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
            </div>
            <?php if($imageSection1 = get_field( 'image-section1' )): ?>
            <div class="image-container mobile-hidden">
                <img src="<?php if($imageSection1) {_e($imageSection1);} ?>" alt="">
            </div>
            <?php endif; ?>
        </div> <!-- end of the max width wrapper -->
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
                <button class="btn inv"><a href="<?php print_r( esc_url ($link_url) ); ?>"><?php print_r( esc_html($link_title) ); ?></a></button>
                <?php endif; ?>  
        </div>
    </section>

    <section>
        <div class="max-width">
            <h2><?php $headingServices = get_field( 'heading-services' ); ?> <?php if($headingServices) {_e($headingServices);} ?></h2>

            <!-- loops through and displays posts from the "services categories" -->
            <?php if ( $the_service_query->have_posts() ) : ?>
            <div class="card-container">   
                    <?php while ( $the_service_query->have_posts() ) : $the_service_query->the_post();?>
                        <div class="card">
                            <?php if($serviceIcon = get_field( 'service-icon' )): ?>
                                <div class="icon"><?php the_field('service-icon'); ?></div>
                            <?php endif; ?>
                            <h3><?php $serviceHeading = get_field( 'service-heading' ); ?> <?php if($serviceHeading) {_e($serviceHeading);} ?></h3>
                            <button class="btn"><a href="<?php the_permalink(); ?>">View More</a></button>
                        </div>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div> <!-- end of the card container -->
        </div>
    </section>

    <section>
        <div class="max-width">
            <h2><?php $headingCourses = get_field( 'heading-courses' ); ?> <?php if($headingCourses) {_e($headingCourses);} ?></h2>
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

    <section>
        <div class="max-width">
            <h2><?php $headingPartners = get_field( 'heading-partners' ); ?> <?php if($headingPartners) {_e($headingPartners);} ?></h2>
        </div>
    </section>

</article>