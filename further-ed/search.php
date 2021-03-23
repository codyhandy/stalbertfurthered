<?php
/***
* The template for displaying search results
*
* @package further-ed
* @since 1.0.0
*/
//display header
get_header();
?>
<main class="site-main" id="main">
<?php if(have_posts()) : ?>
<header>
<h1 class="max-width banner-text">
<!-- /* translators: %s: query term */ -->
<?php printf(
esc_html__( 'Search Results for %s', 'further-ed'),
'<span>' . get_search_query() . '</span>'
); ?>
</h1>
</header>
<div class="max-width text-center">
<!-- start loop -->
<?php while(have_posts()) : the_post(); ?>
<!-- //do things -- display content : the function below will pull the content from the template partial. -->
<?php get_template_part( 'template-parts/content', 'search' ); ?>
 <?php endwhile; ?>
<!-- end while loop --> 
 <?php else : ?>
<!-- send to search page / some other general page with search function, tags, categories, archives,etc.. -->
<?php  get_template_part( 404 ); ?>
<?php endif; ?>
</div>
<!-- This is where you would add pagination. Pagination in a search result page is smart idea, especially if your search
returns a lot of results.-->
</main>
<?php get_footer();
