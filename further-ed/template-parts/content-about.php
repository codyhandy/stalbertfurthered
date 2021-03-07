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
 <div class="entry-content max-width section1">
 <?php the_content(); ?>
 </div>
<div class="staff-card-deck three-column-grid section1 max-width blue">
            <?php
             
             $args = array(
                'post_type' => 'staff',
                'posts_per_page' => 3,
                'orderby' => 'date',
                'order' => 'ASC'
            
             );
             $the_query = new WP_Query($args);
             ?>
             <?php if($the_query->have_posts() ):  ?>
             <?php while ($the_query->have_posts() ): $the_query->the_post(); ?>
             <div class="staff-card">
             <?php 
            
            $photo = get_field('photo')?>
        
            <?php if($photo) :  ?> 
    
                <img src = "<?php echo $photo ?>"/>  
    
            <?php endif; ?>
    
            <?php 
            
            $name = get_field('name')?>
        
            <?php if($name) :  ?> 
    
                <h3><?php echo $name ?></h3>
    
            <?php endif; ?>
    
            <?php 
            
            $title = get_field('title')?>
        
            <?php if($title) :  ?> 
    
                <p><?php echo $title ?> </p>
    
            <?php endif; ?>
            </div>

             <?php endwhile; ?>
             
             <?php wp_reset_postdata(); ?>
             <?php else :?>
             <p><?php _e('Sorry, no posts matched your criteria') ?></p>
            <?php endif; ?>  
</div>

<div class = "partners">
    <?php 
        
        $partners = get_field('partners')?>
    
        <?php if($partners) :  ?> 

            <div class="partners"><?php the_field('partners'); ?></div>

        <?php endif; ?>
    
    </div>

    </div>
 <!-- other things you could put in here would be: pagination (more used for blog posts), custom posts, anything you need for site. -->
 </div>

</article>