<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php wp_head(); ?>
<?php echo get_theme_mod('wabc_theme_script_code_setting'); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="hfeed site">

    <!-- ******************* The Navbar Area ******************* -->
    <div class="wrapper-fluid wrapper-navbar" id="wrapper-navbar">

        <a class="skip-link screen-reader-text" href="#content"><?php _e('Skip to content', 'wabc'); ?></a>

        <nav class="site-navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">

                        <div class="navbar navbar-inverse navbar-fixed-top">

                            <?php if (is_active_sidebar('off-canvas')): ?>
                                <!-- Off Canvas Toggle -->
                                <a class="off-canvas-toggle-link" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
                                    menu
                                </a>
                            <?php endif; ?>

                             <div class="container">
                               <?php if(get_theme_mod('site_logo')){?>
                                 <div class="cols-xs-12">
                                  <img src="<?php echo get_theme_mod('site_logo');?>" alt="<?php bloginfo('blogname');?>"  class="site-logo">
                                 </div>
                              <?php }?>



                                <div class="col-xs-<?php if (is_active_sidebar('off-canvas')): ?>11<?php else : ?>12<?php endif; ?>">

                                <div class="navbar-header">

                                    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                                      <span class="sr-only">Toggle navigation</span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                      <span class="icon-bar"></span>
                                    </button>

                                    <!-- Your site title as branding in the menu -->
                                    <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><?php bloginfo('name'); ?></a>

                                </div>

                                <!-- The WordPress Menu goes here -->
                                <?php wp_nav_menu(
                                    array(
                                        'theme_location' => 'primary',
                                        'container_class' => 'collapse navbar-collapse navbar-responsive-collapse',
                                        'menu_class' => 'nav navbar-nav',
                                        'fallback_cb' => '',
                                        'depth' => 4,
                                        'menu_id' => 'main-menu',
                                        'walker' => new wp_bootstrap_navwalker(),
                                    )
                                ); ?>

                        </div> <!-- .col-md-11 or col-md-12 end -->

                    </div> <!-- .container -->

            </div><!-- .navbar -->

        </nav><!-- .site-navigation -->

    </div><!-- .wrapper-navbar end -->
