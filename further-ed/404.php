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

<div class="banner" style="background: url('http://further-ed.web.dmitcapstone.ca/further-ed/wp-content/uploads/2021/03/richard-dykes-SPuHHjbSso8-unsplash.jpg') no-repeat 50% 50%; background-size: cover;">
                    <div class="opacity">
                        <div class="banner-text max-width">

                        <h1>Oops! That page can’t be found.</h1>
                        <p>
                        It looks like nothing was found at this location. Maybe try one of the links below or a search?
                        </p>
                         <?php get_search_form(); ?>   
                        </div>
                    
                    </div>
</div>


<div class="page-content max-width">

    

    <?php

    $serviceargs = array(
        'post_type' => 'services',
        'posts_per_page' => 3,
        'orderby' => 'date',
        'order' => 'ASC'

    );
    //new WP_Query object saved as the variable $the_query.
    $the_service_query = new WP_Query($serviceargs);

    ?>
    <h2>Services</h2>
     <?php if ($the_service_query->have_posts()): ?>
          <section>
                <div class="card-container">   
                        <?php while ($the_service_query->have_posts()):
            $the_service_query->the_post(); ?>
                            <div class="card services">
                                <?php if ($serviceIcon = get_field('service-icon')): ?>
                                    <div class="icon"><?php the_field('service-icon'); ?></div>
                                <?php
            endif; ?>
                                <h3><?php $serviceHeading = get_field('service-heading'); ?> <?php if ($serviceHeading)
            {
                _e($serviceHeading);
            } ?></h3>
                                <button class="btn"><a href="<?php the_permalink(); ?>">View More</a></button>
                            </div>
                        <?php
        endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php
        endif; ?>
                </div>
          </section>
    <h2>Course Categories</h2>
    <?php
    //creates the query to fetch the categories
    //parameters display the categories sorted by name.
    $args = array(
        'orderby' => 'name',
        'order' => 'ASC',
        'parent' => 0
    );

    // removes the "uncategorized" category from the array
    $uncategorized = get_categories(array(
        'slug' => 'uncategorized'
    ));
    if ($uncategorized)
    {
        $excluded_id = array();

        foreach ($uncategorized as $category)
        {
            $excluded_id[] = $category->term_id;
        }
        $args['exclude'] = $excluded_id;
    }

    // loads all categories into the array
    $categories = get_categories($args);
    ?>

        <section>
            <div class="max-width">
            <div class="course-container">
                <?php foreach ($categories as $category)
    { ?>

                <a class="card course" href="<?php echo (get_category_link($category->term_id)) ?>">
                    <div class="category-content">
                        <div class="card-bg" style="background: url(<?php echo z_taxonomy_image_url($category->term_id); ?>); no-repeat 50% 50%; background-size: cover;">
                            <div class="overlay">
                                <p>Learn More</p>
                            </div>
                        </div>
                        <h3><?php echo ($category->name) ?></h3>
                        <?php if (category_description($category->term_id))
        {
            echo category_description($category->term_id);
        } ?>
                    </div>
                </a>
                <?php
    } ?>
            </div> <!-- end of the course container -->
            </div>
        </section>
</div>
<?php get_footer(); ?>
