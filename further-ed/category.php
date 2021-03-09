<?php
/***
* Template part for displaying for displaying category types.
* @link https://developer.wordpress.org/themes/template-files-section/post-template-files/#category-php-tag-php-and-taxonomy-php
*
* @package further-ed
* @since 1.0.0
*/

get_header();
?>
<!-- category.php -->
<main <?php post_class();?> id="post-<?php the_ID();?>">
    <?php
        // uses the title 
        $catTitle = single_cat_title('', false);
        $catID = get_cat_ID($catTitle);

        //creates the query to fetch the categories
        //parameters display the categories sorted by name.
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'parent' => $catID // the id of the current category page
        );

        // removes the "uncategorized" category from the array
        $uncategorized = get_categories( array( 'slug' => 'uncategorized' ) );
        if($uncategorized) {
            $excluded_id = array();

            foreach ( $uncategorized as $category ) {
                $excluded_id[] = $category->term_id;
            }
            $args['exclude'] = $excluded_id;
        }

        // loads all categories into the array
        $categories = get_categories($args);
    ?>

    <h2><?php single_cat_title('', true); ?></h2>

    <?php foreach($categories as $category) { ?>
        <h3><?php echo ($category->name) ?></h3>
        <!-- add the code to loop through the posts of the specific sub category -->
    <?php } ?>

    
</main>

<?php get_footer(); ?>