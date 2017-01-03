<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
get_header(); ?>
<?php
$activeSidebarCPA;
$activeSidebarCPB;
 ?>
<div class="wrapper" id="page-wrapper">

  <div class="container">
    <?php if (!is_active_sidebar('sidebarcfa') &  !is_active_sidebar('sidebarcfb')) {
    ?>
      <div id="primary" class="col-md-12 content-area">
    <?php
} elseif (!is_active_sidebar('sidebarcfa') &  is_active_sidebar('sidebarcfb')) {
    ?>
       <div id="primary" class="col-md-6 content-area">
         <?php $activeSidebarCPB = true;
} elseif (is_active_sidebar('sidebarcfa') &  !is_active_sidebar('sidebarcfb')) {
    ?>
            <div id="primary" class="col-md-6 content-area">
              <?php $activeSidebarCPA = true;
} elseif (is_active_sidebar('sidebarcfa') &  is_active_sidebar('sidebarcfb')) {
    ?>
                   <div id="primary" class="col-md-4 content-area">
                     <?php $activeSidebarCPA = true;
    $activeSidebarCPB = true;
}?>




             <main id="main" class="site-main" role="main">

               <?php while (have_posts()) : the_post(); ?>

                   <?php get_template_part('content', 'page'); ?>



               <?php endwhile; // end of the loop. ?>



             </main><!-- #main -->

      </div><!-- #primary -->


        <?php if (($activeSidebarCPB && !$activeSidebarCPA)) {
    ?>
          <div class="col-sm-6 col-md-6 columns">
            <div class="tk-block">
            <?php dynamic_sidebar('sidebarcfb');
    ?>
            </div>
          </div>
          <?php
} elseif (($activeSidebarCPA && !$activeSidebarCPB)) {
    ?>
            <div class="col-sm-6 col-md-6 columns box2">
              <div class="tk-block">
              <?php dynamic_sidebar('sidebarcfa');
    ?>
              </div>
            </div>
          <?php
} elseif (($activeSidebarCPA && $activeSidebarCPB)) {
    ?>
            <div class="col-sm-6 col-md-4 columns box2">
              <div class="tk-block">
              <?php dynamic_sidebar('sidebarcfa');
    ?>
              </div>
            </div>
            <div class="col-sm-6 col-md-4 columns">
              <div class="tk-block ">
              <?php dynamic_sidebar('sidebarcfb');
    ?>
              </div>
            </div>
          <?php
} ?>


</div>
    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
