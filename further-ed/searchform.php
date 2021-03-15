<?php
/***
* The template for displaying search forms. Code borrowed from Understrap Theme (https://understrap.com/)
*
* @package further-ed
* @since 1.0.0
*/
?>
<form class="search-bar" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
<label class="sr-only" for="s"><?php esc_html_e( 'Search', 'further-ed' ); ?></label>
 <input class="field form-control" id="s" name="s" type="text"
 placeholder="<?php esc_attr_e( 'Search', 'further-ed' ); ?>" value="<?php the_search_query(); ?>">
 <button type="submit">
 <i class="fas fa-search"></i>
</button>
</form>
