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

<!-- insert banner here -->

<div class="banner" style="background: url(<?php $banner = get_field( 'banner-image' ); ?> <?php if($banner) {_e($banner);} ?>) no-repeat 50% 50%; background-size: cover;">
    <div class="opacity">
        <div class="banner-text max-width">
            <h1><?php $bannerHeading = get_field( 'main-heading' ); ?> <?php if($bannerHeading) {_e($bannerHeading);} ?></h1>
            <p><?php $bannerText = get_field( 'main-subheading' ); ?> <?php if($bannerText) {_e($bannerText);} ?></p>
        </div>
    </div>
</div>
       

<div class="service-container max-width lg-flex">
    <div class="entry-content text-left single-service">
     <?php the_content(); ?>
     </div>
     
    <div class = "form">
        <?php 
            
            $form = get_field('contact_form')?>
        
            <?php if($form) :  ?> 
    
                <div class="contact-us-form"><?php the_field('contact_form'); ?></div>
    
            <?php endif; ?>
        
        </div>
</div>
 
  
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