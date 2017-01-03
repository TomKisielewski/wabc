<?php
/**
 * The template for displaying all single posts.
 */
get_header(); ?>
<?php if ( ( get_theme_mod('carousel_display_front') && is_front_page() ) || ( get_theme_mod('carousel_display_archives', '1') && ( is_home() || is_archive() ) ) || ( ( get_theme_mod('carousel_display_singular') && is_singular() ) ) ) : ?>
  <div class="wrapper" id="wrapper-owl">
    <div class="container">
        <div class="col-md-12">
            <?php wabc_slider_template(); ?>
        </div>
    </div>
  </div>
<?php endif; ?>
<div class="wrapper" id="single-wrapper">
  <div class="container">

        <div id="primary" class="<?php if (is_active_sidebar('sidebar-1')) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">

            <main id="main" class="site-main" role="main">

                <?php while (have_posts()) : the_post(); ?>

                    <?php get_template_part('content', 'single'); ?>

                    <?php wabc_post_nav(); ?>

                    <?php
                    // If comments are open or we have at least one comment, load up the comment template
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                ?>
                <?php endwhile; // end of the loop. ?>

            </main><!-- #main -->

        </div><!-- #primary -->

        <?php get_template_part('sidebar'); ?>

    </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>
