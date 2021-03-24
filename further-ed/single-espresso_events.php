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
                <p><?php echo get_the_excerpt(); ?></p>
            </div>
        </div>
    </div>
    <article <?php post_class(); ?> id="post-<?php the_ID(); ?>">


        <div class="max-width">
            <?php the_content(); ?>

            <!-- *** BRAE *** this tag has some custom styling that looks decent, could mimic that styling for instructor as well? -->
            <p><?php espresso_get_template_part('content', 'espresso_venues-location'); ?></p>

            <?php if ($instructor = get_field('course-instructor')) : ?>
                <p><strong>Instructor:</strong> <?php the_field('course-instructor'); ?></p>
            <?php endif; ?>
            <?php if ($courseNotification = get_field('course-notification')) : ?>
                <p class="hi-lighted"><?php the_field('course-notification'); ?></p>
            <?php endif; ?>

            <!-- displays the ticket options -->
            <!-- ** BRAE ** this shows the tickets however the button does not link the other page as it should - not sure if we should figure this out or just style the base page? If we style base page we
        cannot use the additional custom fields that i added. Let me know what you think -->
            <?php espresso_get_template_part('content', 'espresso_events-tickets'); ?>

            <div>
                <div class="details">
                    <h2>Class Details</h2>
                    <!-- displays the different dates of the course  -->
                    <?php espresso_list_of_event_dates(); ?>

                </div>
                <div class="venue">
                    <h2>Venue</h2>

                </div>
                <!-- displays if the "hasWaitlist" has been selected when creating the event/course -->
                <?php if ($hasWaitlist = get_field('has-waitlist')) : ?>
                    <div class="waitlist">
                        <?php if ($waitlistText = get_field('waitlist-text')) : ?>
                            <p><?php the_field('waitlist-text'); ?></p>
                        <?php endif; ?>
                        <p>If class is sold out - Please email here to be placed on the waitlist.</p>
                        <button class="btn"><a href="#">Apply for waitlist</a></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

    </article>

    <!-- display footer -->
    <?php get_footer(); ?>