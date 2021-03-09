<?php
/*
*
*
*Template Name:About Us
*Description: template to display all about us information
*
* @package further-ed
* @since 1.0.0
*/
//display header
get_header();
?>

<?php
        //creates the query to fetch the services
        //parameters display the latest services.
        $args = array(
            'post_type' => 'single-service',
            'posts_per_page' => 3,
            'orderby' => 'date', 
            'order' => 'ASC' 

        );
        //new WP_Query object saved as the variable $the_query.
        $the_service_query = new WP_Query( $args );
    ?>

<section>
        <div class="max-width">
            <h2><?php $headingServices = get_field( 'heading-services' ); ?> <?php if($headingServices) {_e($headingServices);} ?></h2>

            <!-- loops through and displays posts from the "services categories" -->
            <?php if ( $the_service_query->have_posts() ) : ?>
            <div class="card-container">   
                    <?php while ( $the_service_query->have_posts() ) : $the_service_query->the_post();?>
                        <div class="card services">
                            <?php if($serviceIcon = get_field( 'service-icon' )): ?>
                                <div class="icon"><?php the_field('service-icon'); ?></div>
                            <?php endif; ?>
                            <h3><?php $serviceHeading = get_field( 'service-heading' ); ?> <?php if($serviceHeading) {_e($serviceHeading);} ?></h3>
                            <button class="btn"><a href="<?php the_permalink(); ?>">View More</a></button>
                        </div>
                    <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div> <!-- end of the card container -->
        </div>
    </section>

<?php get_footer(); ?>