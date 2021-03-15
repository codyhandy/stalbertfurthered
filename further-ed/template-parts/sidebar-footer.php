<?php
 /***
 * The sidebar containing the footer widget area.
 *
 * @package further-ed
 * @since 1.0
 */
 ?>
<div class="footer-top-colors">
     <div class ="footer-grid max-width">
               <div class = "column">
               <?php if ( is_active_sidebar( 'footer-col-one' ) ) : ?>
               <?php dynamic_sidebar( 'footer-col-one' ); ?>
               <?php endif; ?>
               </div>
          
               <div class = "column">
                    <?php if ( is_active_sidebar( 'footer-col-two' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-col-two' ); ?>
                    <?php endif; ?>
               </div>
               
               <div class = "column footer-nav">
                    <?php if ( is_active_sidebar( 'footer-col-three' ) ) : ?>
                    <?php dynamic_sidebar( 'footer-col-three' ); ?>
                    <?php endif; ?>
               </div>
     </div>
</div>
<div class ="footer-lower-colors">
     <div class ="footer-lower-grid max-width">
               <div class = "column">
               <?php if ( is_active_sidebar( 'footer-col-four' ) ) : ?>
               <?php dynamic_sidebar( 'footer-col-four' ); ?>
               <?php endif; ?>
               </div>
               <div class = "column">
               <?php if ( is_active_sidebar( 'footer-col-five' ) ) : ?>
               <?php dynamic_sidebar( 'footer-col-five' ); ?>
               <?php endif; ?>
               </div>
     </div>
</div>

