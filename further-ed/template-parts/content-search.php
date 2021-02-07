<?php
/***
* Template part for displaying content in the search.php
*
* @package further-ed
* @since 1.0.0
*/
?>
<article <?php post_class();?> id="post-<?php the_ID();?>" >
<!-- entry header -->
<header>
<!-- get the page title -->
 <?php the_title(
sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
'</a></h2>'
); ?>
 <?php if ( 'post' == get_post_type() ) : ?>
 <div class="post-meta-area">
 <ul>
 <!-- displays the date the post was published and the author -->
 <li><?php the_date(); ?> <span> | </span></li>
 <li><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"
rel="author"><?php _e( 'View Author Archive <span aria-hidden="true">&rarr;</span>'); ?></a>
 </li>
 </ul>
 <!-- this if/else already comes predefined in a list items as clickable links - check the dev tools -->
 <?php
 if( has_category() ){
 //display the category
 the_category();
 }
 ?>
 </div>
 <?php endif; ?>
</header>
<div class=”entry-summary”>
<?php the_excerpt(); ?>
</div>
</article>
