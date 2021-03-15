<?php
/***
* Template part for displaying content in the star.php
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
 <div class="star-entry-content max-width">
    
 </div>
<div class="max-width">
        <div class="section-one-star">
            <?php 
            
            $alternateone = get_field('alternate-one')?>
        
            <?php if($alternateone) :  ?>   
    
                
                <div class = "star-container">   
                 
                <h2><?php _e($alternateone['title']); ?></h2>

                <div><?php echo $alternateone['content']; ?></div>
                
                </div>
                
                <img class="mobile-hidden star-one-img" src = "<?php echo $alternateone['photo'] ?>"/>
                <?php endif; ?>
        </div>

        <div class="section-two-star">
            <?php 
            
            $alternatetwo = get_field('alternate-two')?>
        
            <?php if($alternatetwo) :  ?>   

                <img class="mobile-hidden star-two-img" src = "<?php echo $alternatetwo['photo'] ?>"/>

                <div class = "star-container">   
                 
                <h2><?php _e($alternatetwo['title']); ?></h2>

                <div><?php echo $alternatetwo['content']; ?></div>
                
                </div>
                
                
                
               
                <?php endif; ?>
        </div>

        <div class="section-three">
        <div class="contact"><?php the_field('contact'); ?></div>
        <div class="hours"><?php the_field('hours'); ?></div>
        </div>
            
       
</div>



    </div>
 <!-- other things you could put in here would be: pagination (more used for blog posts), custom posts, anything you need for site. -->
 </div>

</article>