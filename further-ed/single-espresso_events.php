<?php
/*
*
*
* The template for displaying individual blog posts (full article/blog post).
*
* @package courses
* @since 1.0.0
*/
//display header
get_header();
?>
<!-- category.php -->
<main <?php post_class(); ?> id="post-<?php the_ID(); ?>">
    <?php
    // uses the title 
    $categories = get_terms(
        'category',
        array('parent' => 0)
    );
    ?>
    <?php if (has_post_thumbnail($post->ID)) : ?>
        <?php $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'single-post-thumbnail'); ?>
    <?php endif; ?>

    <!-- single-courses.php  -->
    <div class="banner" style="background: url(<?php echo get_the_post_thumbnail_url(); ?>) no-repeat 50% 50%; background-size: cover;">
        <div class="opacity">
            <div class="banner-text max-width">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


        <div class="max-width">
            <div class="venue-container"><?php the_content(); ?></div>

            <!-- displays the ticket options -->
            <?php espresso_get_template_part('content', 'espresso_events-tickets'); ?>

            <div class="details-flex">
                <div class="venue-container">
                    <h2>Venue</h2>
                    <p><?php espresso_get_template_part('content', 'espresso_venues-location'); ?></p>
                </div>

                <div class="course-info">
                    <div class="details">
                        <h2>Class Details</h2>
                        <?php if ($courseNotification = get_field('course-notification')) : ?>
                            <p class="hi-lighted"><?php the_field('course-notification'); ?></p>
                        <?php endif; ?>
                        <?php if ($instructor = get_field('course-instructor')) : ?>
                            <h3><span class="heading-icon"><i class="fas fa-chalkboard-teacher"></i></span>Instructor</h3>
                            <p class="course-imp"><?php the_field('course-instructor'); ?></p> 
                        <?php endif; ?>
                        
                        <!-- displays the different dates of the course  -->
                        <?php espresso_list_of_event_dates(); ?>
                    </div>
                </div> <!-- end of the course information --> 
            </div> <!-- end of the course information section -->

            <!-- displays if the "hasWaitlist" has been selected when creating the event/course -->
            <?php if ($hasWaitlist = get_field('has-waitlist')) : ?>
                <div class="venue">
                    <h2>Waitlist</h2>
                </div>

                <div class="waitlist">
                    <?php if ($waitlistText = get_field('waitlist-text')) : ?>
                        <p><?php the_field('waitlist-text'); ?></p>
                    <?php endif; ?>
                    <p>If class is sold out - Please email here to be placed on the waitlist.</p>
                    <button class="btn"><a href="#">Apply for waitlist</a></button>
                </div>
            <?php endif; ?>

        </div> <!-- max-width wrapper -->

    </article>

    <!-- display footer -->
    <?php get_footer(); ?>