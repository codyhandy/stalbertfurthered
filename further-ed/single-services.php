<?php
/*
*
*
* The template for displaying individual blog posts (full article/blog post).
*
* @package services
* @since 1.0.0
*/
//display header
get_header();
?>                

<?php if(have_posts()) : ?>
<!-- start the loop -->
<?php while(have_posts()) : the_post(); ?>

<?php if($serviceIcon = get_field( 'service-icon' )): ?>
                                <div class="icon"><?php the_field('service-icon'); ?></div>
                            <?php endif; ?>
                            <h3><?php $serviceHeading = get_field( 'service-heading' ); ?> <?php if($serviceHeading) {_e($serviceHeading);} ?></h3>
            <?php the_content(); ?>
  
 <?php endwhile; ?>
        <!-- end while loop -->
        <!-- this would be a good place to your pagination for individual article/blog posts -->
<?php else : ?>
        <!-- send to search page / some other general page with search function, tags, categories, archives,etc.. -->
<?php get_template_part('template-parts/content', 'none'); ?>
<?php endif; ?>

    <!-- //out of the loop: this would be a good place to add sidebar to the right of the article/blog. -->
<!-- //display footer -->
<?php get_footer(); ?>