<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
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
<div class="wrapper" id="archive-wrapper">



    <div class="container">

	   <div id="primary" class="<?php if (is_active_sidebar('sidebar-1')) : ?>col-md-8<?php else : ?>col-md-12<?php endif; ?> content-area">

            <main id="main" class="site-main" role="main">

                  <?php if (have_posts()) : ?>

                    <header class="page-header">
                        <?php
                            the_archive_title('<h1 class="page-title">', '</h1>');
                            the_archive_description('<div class="taxonomy-description">', '</div>');
                        ?>
                    </header><!-- .page-header -->

                    <?php /* Start the Loop */ ?>
                    <?php while (have_posts()) : the_post(); ?>

                        <?php
                            /* Include the Post-Format-specific template for the content.
                             * If you want to override this in a child theme, then include a file
                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                             */
                            get_template_part('content', get_post_format());
                        ?>

                    <?php endwhile; ?>

                        <?php wabc_paging_nav(); ?>

                    <?php else : ?>

                        <?php get_template_part('content', 'none'); ?>

                    <?php endif; ?>

              </main><!-- #main -->

	    </div><!-- #primary -->

        <?php get_sidebar(); ?>

     </div><!-- Container end -->

</div><!-- Wrapper end -->

<?php get_footer(); ?>