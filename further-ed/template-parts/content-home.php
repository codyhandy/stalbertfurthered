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
<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php
    //creates the query to fetch the services
    //parameters display the latest services.
    $args = array(
        'post_type' => 'services',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'ASC'

    );
    //new WP_Query object saved as the variable $the_query.
    $the_service_query = new WP_Query($args);
    ?>

    <?php
    //creates the query to fetch the categories
    //parameters display the categories sorted by name.
    $args1 = array(
        'taxonomy' => 'espresso_event_categories',
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => 0
    );

    // removes the "uncategorized" category from the array
    $uncategorized = get_categories(array('slug' => 'uncategorized'));
    if ($uncategorized) {
        $excluded_id = array();

        foreach ($uncategorized as $category) {
            $excluded_id[] = $category->term_id;
        }
        $args1['exclude'] = $excluded_id;
    }

    // loads all categories into the array
    $categories = get_categories($args1);
    ?>

    <section class="section1">
        <div class="max-width lg-flex">
            <div>
                <h2><?php $headingSection1 = get_field('heading-section1'); ?> <?php if ($headingSection1) {
                                                                                    _e($headingSection1);
                                                                                } ?></h2>
                <p><?php $textSection1 = get_field('text-section1'); ?> <?php if ($textSection1) {
                                                                            _e($textSection1);
                                                                        } ?></p>

                <!-- this block is for dynamically loading links  -->
                <?php
                $linkSection1 = get_field('link-section1');
                if ($linkSection1) :
                    // create variables to store the link and the title
                    $link_title = $linkSection1['title'];
                    $link_url = $linkSection1['url'];
                ?>
                    <button class="btn"><a href="<?php print_r(esc_url($link_url)); ?>"><?php print_r(esc_html($link_title)); ?></a></button>
                <?php endif; ?>


            </div>
            <?php if ($imageSection1 = get_field('image-section1')) : ?>
                <div class="image-container mobile-hidden max-width">
                    <img src="<?php if ($imageSection1) {
                                    _e($imageSection1);
                                } ?>" alt="">
                </div>
            <?php endif; ?>
        </div> <!-- end of the max width wrapper -->
    </section>

    <section class="featured news">
        <div class="text-container max-width">


            <!-- only adds an image to this sections if one has been chosen -->
            <?php $imageFeatured = get_field('image-featured'); ?>
            <?php if ($imageFeatured) : ?>
                <div class="lg-flex">
                    <div class="image-container mobile-hidden max-width">
                        <img src="<?php if ($imageFeatured) {
                                        _e($imageFeatured);
                                    } ?>" alt="">
                    </div>
                <?php endif; ?>

                <div class="text-container">
                    <h2><?php $headingFeatured = get_field('heading-featured'); ?> <?php if ($headingFeatured) {
                                                                                        _e($headingFeatured);
                                                                                    } ?></h2>
                    <p><?php $textFeatured = get_field('text-featured'); ?> <?php if ($textFeatured) {
                                                                                _e($textFeatured);
                                                                            } ?></p>

                    <!-- this block is for dynamically loading links  -->
                    <?php
                    $linkFeatured = get_field('link-featured');
                    if ($linkFeatured) :
                        // create variables to store the link and the title
                        $link_title = $linkFeatured['title'];
                        $link_url = $linkFeatured['url'];
                    ?>
                        <button class="btn inv"><a href="<?php print_r(esc_url($link_url)); ?>"><?php print_r(esc_html($link_title)); ?></a></button>
                    <?php endif; ?>

                    <p><?php $textFeatured2 = get_field('text-featured-2'); ?> <?php if ($textFeatured2) {
                                                                                    _e($textFeatured2);
                                                                                } ?></p>

                    <?php
                    $linkFeatured2 = get_field('link-featured-2');
                    if ($linkFeatured2) :
                        // create variables to store the link and the title
                        $link_title = $linkFeatured2['title'];
                        $link_url = $linkFeatured2['url'];
                    ?>
                        <button class="btn inv"><a href="<?php print_r(esc_url($link_url)); ?>"><?php print_r(esc_html($link_title)); ?></a></button>
                    <?php endif; ?>
                </div>

                <?php if ($imageFeatured) : ?>
                </div> <!-- end of the flex container -->
            <?php endif; ?>
        </div>
    </section>

    <section>
        <div class="max-width">
            <h2><?php $headingServices = get_field('heading-services'); ?> <?php if ($headingServices) {
                                                                                _e($headingServices);
                                                                            } ?></h2>

            <!-- loops through and displays posts from the "services categories" -->
            <?php if ($the_service_query->have_posts()) : ?>
                <div class="card-container">
                    <?php while ($the_service_query->have_posts()) : $the_service_query->the_post(); ?>
                        <div class="card services">
                            <?php if ($serviceIcon = get_field('service-icon')) : ?>
                                <div class="icon"><?php the_field('service-icon'); ?></div>
                            <?php endif; ?>
                            <h3><?php $serviceHeading = get_field('service-heading'); ?> <?php if ($serviceHeading) {
                                                                                                _e($serviceHeading);
                                                                                            } ?></h3>
                            <button class="btn"><a href="<?php the_permalink(); ?>">View More</a></button>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                </div> <!-- end of the card container -->
        </div>
    </section>

    <section class="featured about padding">
        <div class="text-container max-width">
            <h2><?php $headingAbout = get_field('heading-about'); ?> <?php if ($headingAbout) {
                                                                            _e($headingAbout);
                                                                        } ?></h2>
            <p><?php $textAbout = get_field('text-about'); ?> <?php if ($textAbout) {
                                                                    _e($textAbout);
                                                                } ?></p>

            <!-- this block is for dynamically loading links  -->
            <?php
            $linkAbout = get_field('link-about');
            if ($linkAbout) :
                // create variables to store the link and the title
                $link_title = $linkAbout['title'];
                $link_url = $linkAbout['url'];
            ?>
                <button class="btn inv"><a href="<?php print_r(esc_url($link_url)); ?>"><?php print_r(esc_html($link_title)); ?></a></button>
            <?php endif; ?>
        </div>
    </section>

    <section>
        <div class="max-width">
            <h2><?php $headingCourses = get_field('heading-courses'); ?> <?php if ($headingCourses) {
                                                                                _e($headingCourses);
                                                                            } ?></h2>
            <div class="course-container">
                <?php foreach ($categories as $category) { ?>

                    <a class="card course" href="<?php echo (get_category_link($category->term_id)) ?>">
                        <div class="category-content">
                            <div class="card-bg" style="background: url(<?php echo z_taxonomy_image_url($category->term_id); ?>); no-repeat 50% 50%; background-size: cover;">
                                <div class="overlay">
                                    <p>Learn More</p>
                                </div>
                            </div>
                            <h3><?php echo ($category->name) ?></h3>
                        </div>
                    </a>
                <?php } ?>
            </div> <!-- end of the course container -->
        </div>
    </section>

    <section class="section2">
        <div class="text-container max-width padding">
            <h2><?php $headingSection2 = get_field('heading-section2'); ?> <?php if ($headingSection2) {
                                                                                _e($headingSection2);
                                                                            } ?></h2>
            <p><?php $textSection2 = get_field('text-section2'); ?> <?php if ($textSection2) {
                                                                        _e($textSection2);
                                                                    } ?></p>

            <!-- this block is for dynamically loading links  -->
            <?php
            $linkSection2 = get_field('link-section2');
            if ($linkSection2) :
                // create variables to store the link and the title
                $link_title = $linkSection2['title'];
                $link_url = $linkSection2['url'];
            ?>
                <button class="btn-red donate"><a href="<?php print_r(esc_url($link_url)); ?>"><?php print_r(esc_html($link_title)); ?></a></button>
            <?php endif; ?>
        </div>
    </section>

    <section>
        <div class="max-width">
            <h2><?php $headingPartners = get_field('heading-partners'); ?> <?php if ($headingPartners) {
                                                                                _e($headingPartners);
                                                                            } ?></h2>
        </div>
        <div class="course-container partner-container max-width">
            <?php

            $partnerargs = array(
                'post_type' => 'partners',
                'posts_per_page' => 8,
                'orderby' => 'date',
                'order' => 'ASC'

            );
            $the_query_partners = new WP_Query($partnerargs);
            ?>
            <?php if ($the_query_partners->have_posts()) :  ?>
                <?php while ($the_query_partners->have_posts()) : $the_query_partners->the_post(); ?>
                    <div class="course card partner-image">
                        <?php $partnerimage = get_field('partner-image'); ?>

                        <?php if ($partnerimage) :  ?>
                            <a href="<?php echo $partnerimage['link'] ?>"><img src="<?php echo $partnerimage['image']; ?>" /></a>
                        <?php endif; ?>
                    </div>

                <?php endwhile; ?>

                <?php wp_reset_postdata(); ?>
            <?php else : ?>
                <p><?php _e('Sorry, no posts matched your criteria') ?></p>
            <?php endif; ?>
        </div>

    </section>

</article>