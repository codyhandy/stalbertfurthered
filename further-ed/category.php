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


    <div class="banner" style="background: url() no-repeat 50% 50%; background-size: cover;">
        <div class="opacity">
            <div class="banner-text max-width">
                <h1><?php single_cat_title('', true); ?></h1>
             </div>
        </div>
    </div>

    <div class="max-width">
        <?php foreach($categories as $category) { ?>
            <h2><?php echo ($category->name) ?></h2>
            <!-- add the code to loop through the posts of the specific sub category -->
            <?php 
                $args1 = array(
                    'post_type' => 'courses',
                    'posts_per_page' => 3,
                    'order' => 'ASC',
                    'category_name' => ($category->name) 
                );
                //new WP_Query object saved as the variable $the_query.
                $the_course_query = new WP_Query( $args1 );
            ?>

            <?php while ( $the_course_query->have_posts() ) : $the_course_query->the_post(); ?>
                <h3><?php the_title(); ?></h3>
                <?php if($courseDesc = get_field( 'course-desc' )): ?>
                    <p><?php the_field('course-desc'); ?></p>
                <?php endif; ?>

                <button class="btn"><a href="<?php the_permalink(); ?>">Learn More</a></button>
            <?php endwhile; ?>

        <?php } ?>
    </div>
    

    
</main>

<?php get_footer(); ?>