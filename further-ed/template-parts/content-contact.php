<?php
/***
* Template part for displaying content in the page.php
* @link https://developer.wordpress.org/theme/basics/template-hierarchy/
*
* @package further-ed
* @since 1.0.0
*/
?>
<article <?php post_class();?> id="post-<?php the_ID();?>" >
<!-- entry header -->
<header>
<!-- get the page title -->
 </header>
<!-- if you had an image it will display using wordpress's largest default thumbnail sizing (settings in the admin - you can see the sizes) -->
<div class="contact-container">
    <div class = "form">
        <?php 
            
            $form = get_field('contact_form')?>
        
            <?php if($form) :  ?> 

                <div class="contact-us-form"><?php the_field('contact_form'); ?></div>

            <?php endif; ?>
        
        </div>
    <div class="entry-content contact">
    <?php the_content(); ?>
    </div>
</div>



</article>