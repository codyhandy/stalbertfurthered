<?php
/***
* Template part for displaying content on the course page
* @link https://developer.wordpress.org/theme/basics/template-hierarchy/
*
* @package further-ed
* @since 1.0.0
*/
?>
<article <?php post_class();?> id="post-<?php the_ID();?>" >
    <?php
        //creates the query to fetch the categories
        //parameters display the categories sorted by name.
        $args = array(
            'orderby' => 'name',
            'order' => 'ASC',
            'parent' => 0
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

    <section>
        <div class="max-width">
          <div class="card-container">
            <?php foreach($categories as $category) { ?>

            <a class="card" href="<?php echo (get_category_link( $category->term_id )) ?>">
                <div class="category-content">
                    <img src="<?php echo z_taxonomy_image_url($category->term_id); ?>" alt="Category Image">
                    <h3><?php echo ($category->name) ?></h3>
                </div>
            </a>
            <?php } ?>
          </div>
        </div>
    </section>
    

    
    

</article>