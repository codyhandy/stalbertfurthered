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
        $catTitle = single_term_title('', false);
        // stores the ID of the parent category
        $catID = get_queried_object()->term_id;

        //creates the query to fetch the categories
        //parameters display the categories sorted by name.
        $args = array(
            'taxonomy' => 'espresso_event_categories',
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


    <div class="banner" style="background: url(<?php echo z_taxonomy_image_url($category->$catID); ?>) no-repeat 50% 50%; background-size: cover;">
        <div class="opacity">
            <div class="banner-text max-width">
                <h1><?php single_cat_title('', true); ?></h1>
                <?php if(category_description( $category->$catID )){
                        echo category_description( $category->$catID );
                } ?>
             </div>
        </div>
    </div>

    <div class="max-width indv-courses">
        <?php foreach($categories as $category) { ?>
            <h2><?php echo ($category->name) ?></h2>
            <!-- add the code to loop through the posts of the specific sub category -->
            <?php
                $args1 = array(
                    'post_type' => 'espresso_events',
                    'order' => 'ASC',

                    // displays only posts that fall under the sub category
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'espresso_event_categories',
                            'field' => 'slug',
                            'terms'    => array( $category->slug )
                        ),
                    )
                );
                //new WP_Query object saved as the variable $the_query.
                $the_event_query = new WP_Query( $args1 );
            ?>
            <div class="course-container single">
                <?php while ( $the_event_query->have_posts() ) : $the_event_query->the_post(); ?>
                    <div class="card course">
                        <h3><?php the_title(); ?></h3>

                        <?php echo get_the_excerpt(); ?>
                        
                        <!-- checks if the course if from a third party, if it is displays call/email info instead of learn more  -->
                        <?php if($thirdParty = get_field( 'is-third-party' )): ?>
                            <div>
                                <?php if($address = get_field( 'address' )): ?>
                                    <p><strong>Address:</strong> <?php the_field( 'address' ); ?></p>
                                <?php endif; ?>
                                <?php if($phone = get_field( 'telephone' )): ?>
                                    <p><strong>Phone:</strong> <?php the_field( 'telephone' ); ?></p>
                                <?php endif; ?>
                                <?php if($url = get_field( 'url' )): ?>
                                    <button class="btn"><a href="<?php the_field( 'url' ); ?>">Visit Site</a></button>
                                <?php endif; ?>
                            </div>
                            
                        <?php else: ?>
                            <button class="btn"><a href="<?php the_permalink(); ?>">Learn More</a></button>
                        <?php endif; ?>
                    </div>    
                <?php endwhile; ?>
            </div>

        <?php } ?>
    </div>
    

    
</main>

<?php get_footer(); ?>