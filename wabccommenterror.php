<?php
/**
 * The template for displaying comments error page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 */
get_header(); ?>

<div class="wrapper error-comment-wrapper" id="page-wrapper">

    <div class="container">

	   <div id="primary" class="<?php if (is_active_sidebar('sidebar-1')) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">
            <main id="main" class="site-main comments-error" role="main">

              <?php echo $message; ?>
              <?php echo '<p>'.$back_link.'</p>'; ?>




            </main><!-- #main -->

	    </div><!-- #primary -->

        <?php get_sidebar(); ?>

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
