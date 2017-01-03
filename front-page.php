<?php
/**
 * Template Name: Front Page Template.
 */
get_header(); ?>

<?php get_template_part('top-widgets'); ?>

<?php
$activeSidebarA;
$activeSidebarB;
 ?>



<?php get_template_part('hero'); ?>

<?php /*get_template_part('sticky'); */?>


  <?php if ( ( get_theme_mod('carousel_display_front') && is_front_page() ) || ( get_theme_mod('carousel_display_archives', '1') && ( is_home() || is_archive() ) ) || ( ( get_theme_mod('carousel_display_singular') && is_singular() ) ) ) : ?>
    <div class="wrapper TOMASZ_FRONT_PAGE" id="wrapper-owl">
      <div class="container">
          <div class="col-md-12">
              <?php wabc_slider_template(); ?>
          </div>
      </div>
    </div>
  <?php endif; ?>


    <div class="wrapper" id="page-wrapper">


	   <div class="container">
       <?php if (!is_active_sidebar('sidebar-a') &  !is_active_sidebar('sidebar-b')) {
    ?>
         <div id="primary" class="col-md-12 content-area columns">
       <?php
} elseif (!is_active_sidebar('sidebar-a') &  is_active_sidebar('sidebar-b')) {
    ?>
          <div id="primary" class="col-md-8 content-area columns">
            <?php $activeSidebarB = true;
} elseif (is_active_sidebar('sidebar-a') &  !is_active_sidebar('sidebar-b')) {
    ?>
               <div id="primary" class="col-md-8 content-area columns">
                 <?php $activeSidebarA = true;
} elseif (is_active_sidebar('sidebar-a') &  is_active_sidebar('sidebar-b')) {
    ?>
                      <div id="primary" class="col-md-6 content-area columns">
                        <?php $activeSidebarA = true;
    $activeSidebarB = true;
}?>




                <main id="main" class="site-main" role="main">

                  <?php while (have_posts()) : the_post(); ?>

                      <?php get_template_part('content', get_post_format()); ?>

                      <?php
                          // If comments are open or we have at least one comment, load up the comment template
                          //if ( comments_open() || get_comments_number() ) :
                          //    comments_template();
                          //endif;
                      ?>

                  <?php endwhile; // end of the loop. ?>

                </main><!-- #main -->

	       </div><!-- #primary -->


           <?php if (($activeSidebarB && !$activeSidebarA)) {
    ?>
             <div class="col-sm-4 col-md-4 columns animation-element">
     					<div class="tk-block">
               <?php dynamic_sidebar('sidebar-b');
    ?>
     				  </div>
     				</div>
             <?php
} elseif (($activeSidebarA && !$activeSidebarB)) {
    ?>
               <div class="col-sm-4 col-md-4 columns box2 animation-element">
       					<div class="tk-block">
                 <?php dynamic_sidebar('sidebar-a');
    ?>
       				  </div>
       				</div>
             <?php
} elseif (($activeSidebarA && $activeSidebarB)) {
    ?>
               <div class="col-sm-6 col-md-3 columns box2 animation-element">
       					<div class="tk-block">
                 <?php dynamic_sidebar('sidebar-a');
    ?>
       				  </div>
       				</div>
               <div class="col-sm-6 col-md-3 columns animation-element">
       					<div class="tk-block ">
                 <?php dynamic_sidebar('sidebar-b');
    ?>
       				  </div>
       				</div>
             <?php
} ?>


</div>

       </div><!-- Container end -->

<?php get_template_part('middle-widgets'); ?>

    </div><!-- Wrapper end -->

<?php get_footer(); ?>
