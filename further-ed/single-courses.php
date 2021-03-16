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
<!-- single-courses.php  -->

<article <?php post_class();?> id="post-<?php the_ID();?>" >

    <?php
        // arguments to collect the id of the parent category
    ?>

    <div class="banner" style="background: url(<?php echo z_taxonomy_image_url(  ); ?>) no-repeat 50% 50%; background-size: cover;">
        <div class="opacity">
            <div class="banner-text max-width">
                <?php the_title( '<h1>', '</h1>' ); ?>
            </div>
        </div>
    </div>

    <div class="max-width">
        <?php if($courseDesc = get_field( 'course-desc' )): ?>
            <p><?php the_field('course-desc'); ?></p>
        <?php endif; ?>

        <?php if($instructor = get_field( 'course-instructor' )): ?>
            <p><strong>Instructor:</strong> <?php the_field('course-instructor'); ?></p>
        <?php endif; ?>
        <?php if($location = get_field( 'course-location' )): ?>
            <p><strong>Location:</strong> <?php the_field('course-location'); ?></p>
        <?php endif; ?>
        <?php if($courseNotification = get_field( 'course-notification' )): ?>
            <p class="hi-lighted"><?php the_field('course-notification'); ?></p>
        <?php endif; ?>

        <div>
            <div class="details">
                <h2>Class Details</h2>

                <!-- Espresso Plugin will go here -->

                
            </div>
            <div class="venue">
                <h2>Venue</h2>
            </div>
            <?php if($hasWaitlist = get_field( 'has-waitlist' )): ?>
                <div class="waitlist">
                    <?php if($waitlistText = get_field( 'waitlist-text' )): ?>
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