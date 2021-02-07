<?php
/***
* The template for displaying a 404 page.
*
* @package further-ed
* @since 1.0.0
*/
//display header
get_header();
?>
<main class="site-main" id="main">
<section class="error-404 not-found">
<header>
<h1 class="page-title">
<?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'theme name here' ); ?>
</h1>
</header>

<div class="page-content">
<p>
<?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the
links below or a search?', 'theme name here' ); ?>
</p>
<!-- display the search form -->
<?php get_search_form(); ?>
<!-- recent posts -->
<?php the_widget( 'WP_Widget_Recent_Posts' ); ?>
<!-- display categories -->
<div class="widget widget_categories">
<h2 class="widget-title">
<?php esc_html_e( 'Most Used Categories', 'theme name here' ); ?>
</h2>

 <ul>
 <?php wp_list_categories(
 array(
 'orderby' => 'count',
 'order' => 'DESC',
 'show_count' => 1,
 'title_li' => '',
 'number' => 10,
 ) //end of array
 ); ?> 
 </ul>
</div>

<!-- Monthly Archives -->
<?php
 //translators: %1$s: smiley
 $archive_content = '<p>' . sprintf( esc_html__( 'Try looking in the monthly archives. %1$s',
'theme name here' ), convert_smilies( ':)' ) ) . '</p>';
 the_widget( 'WP_Widget_Archives', 'dropdown=1', "after_title=$archive_content" );
 ?>
</div> <!-- //page content -->
</section>
</main>
<?php get_footer(); ?>