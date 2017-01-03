<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 */
get_header(); ?>

<div class="wrapper" id="wrapper-top-widgets">
  <div class="container">
    <div class="col-md-12">


    <?php
    if (is_active_sidebar('sidebarslideshow')) {
        ;
    }?>
    <div class="row">
    <div id="TKslideshow">
    	<div class="col-md-12 slideshow">
    		<?php dynamic_sidebar('sidebarslideshow'); ?>
    	</div>
    </div>
    </div> <!-- end of class="row" -->
    <div id="TKcontent">
    	<div class="row">
    		<?php if (!is_active_sidebar('sidebara') && !is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
    ?>
    		<?php echo '<div><p> you need to put some Widgets</p></div>';
    ?>
    			<?php

} elseif (is_active_sidebar('sidebara') && is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
    ?>
    			  <div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
              <?php dynamic_sidebar('sidebara');
    ?>
    				  </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				<?php  dynamic_sidebar('sidebarb');
    ?>
    			    </div>
    				</div>
    				<div class="col-sm-4 col-md-4 columns">
    					<div class="tk-block">
    				  <?php  dynamic_sidebar('sidebarc');
    ?>
    				  </div>
    				</div>


    				<?php

} elseif (is_active_sidebar('sidebara') &&  is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
                        ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebara');
                        ?>
    							  </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarb');
                        ?>
    						    </div>
    							</div>



    							<?php

                    } elseif (is_active_sidebar('sidebara') &&  !is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
                        ?>
    						  <div class="col-md-12 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebara');
                        ?>
    							  </div>
    							</div>
    					<?php

                    } elseif (!is_active_sidebar('sidebara') &&  is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                        ?>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarb');
                        ?>
    						    </div>
    							</div>
    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarc');
                        ?>
    							  </div>
    							</div>


    							<?php

                    } elseif (!is_active_sidebar('sidebara') &&  !is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                        ?>

    							<div class="col-md-12 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarc');
                        ?>
    							  </div>
    							</div>


    							<?php

                    } elseif (!is_active_sidebar('sidebara') &&  is_active_sidebar('sidebarb') && !is_active_sidebar('sidebarc')) {
                        ?>
    						 <div class="col-md-12 columns">
    							<div class="tk-block">
    							<?php  dynamic_sidebar('sidebarb');
                        ?>
    						  </div>
    							</div>
    						<?php

                    } elseif (is_active_sidebar('sidebara') &&  !is_active_sidebar('sidebarb') && is_active_sidebar('sidebarc')) {
                        ?>
    						  <div class="col-md-6 columns">
    								<div class="tk-block">
    			          <?php dynamic_sidebar('sidebara');
                        ?>
    							  </div>
    							</div>

    							<div class="col-md-6 columns">
    								<div class="tk-block">
    							  <?php  dynamic_sidebar('sidebarc');
                        ?>
    							</div>
    							</div>


    							<?php

                    }
                    ?>
         </div>
    	</div>




   </div>
  </div>
</div>





<?php get_template_part('hero'); ?>

<?php /*get_template_part('sticky'); */?>

    <div class="wrapper" id="wrapper-index">
      <div class="container TomaszIndex">
        
        <?php if ( ( get_theme_mod('carousel_display_front') && is_front_page() ) || ( get_theme_mod('carousel_display_archives', '1') && ( is_home() || is_archive() ) ) || ( ( get_theme_mod('carousel_display_singular') && is_singular() ) ) ) : ?>
        <?php wabc_slider_template(); ?>
        <?php endif; ?>
      </div>

	   <div class="container">

	       <div id="primary" class="<?php if (is_active_sidebar('sidebar-1')) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">

                <main id="main" class="site-main" role="main">

                  <?php if ( have_posts() ) : ?>

                        <?php /* Start the Loop */ ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                                <?php
                                    /* Include the Post-Format-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                     */
                                    get_template_part( 'content', get_post_format() );
                                ?>

                        <?php endwhile; ?>

                        <?php the_posts_navigation(); ?>

                    <?php else : ?>

                        <?php get_template_part( 'loop-templates/content', 'none' ); ?>

                    <?php endif; ?>

                </main><!-- #main -->

	       </div><!-- #primary -->

           <?php get_sidebar(); ?>

       </div><!-- Container end -->
       <!-- here below shall I put middle widget -->

    </div><!-- Wrapper end -->

<?php get_footer(); ?>
