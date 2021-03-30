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
<!-- hardcoded banner in for now, going to see if there is a way around this  -->
 <div class="banner" style="background: url( http://further-ed.web.dmitcapstone.ca/further-ed/wp-content/uploads/2021/03/stalbert-further-education-banner-scaled.jpg) no-repeat 50% 50%; background-size: cover;">
    <div class="opacity">
        <div class="banner-text max-width">
            <?php the_title( '<h1>', '</h1>' ); ?>
        </div>
    </div>
</div>

<!-- if you had an image it will display using wordpress's largest default thumbnail sizing (settings in the admin - you can see the sizes) -->
<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>
 <div class="entry-content max-width">
 <!-- display page or post content -->
 <?php
 the_content(); // displays all of the content within the editor in pages in the dashboard
 ?>
 <!-- other things you could put in here would be: pagination (more used for blog posts), custom posts, anything you need for site. -->
 </div>
 <footer class="entry-footer">
<!--adds a link to edit your content -->
 <?php edit_post_link( __('Edit','themenamehere'), '<span class="edit-link">', '</span>' ); ?>
 </footer>
</article>