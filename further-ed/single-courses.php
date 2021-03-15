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

    </div>

</article>

<!-- display footer -->
<?php get_footer(); ?>