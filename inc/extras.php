<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features
 */
 /**
  *  Custom no comments error page.
  */
 function custom_comment_error($message, $title = '', $args = array())
 {
     $errorTemplate = get_theme_root().'/'.get_template().'/wabccommenterror.php';
     $defaults = array('response' => 500);
     $r = wp_parse_args($args, $defaults);

     $have_gettext = function_exists('__');

     if (function_exists('is_wp_error') && is_wp_error($message)) {
         if (empty($title)) {
             $error_data = $message->get_error_data();
             if (is_array($error_data) && isset($error_data['title'])) {
                 $title = $error_data['title'];
             }
         }
         $errors = $message->get_error_messages();
         switch (count($errors)) {
    case 0 :
      $message = '';
      break;
    case 1 :
      $message = "<p>{$errors[0]}</p>";
      break;
    default :
      $message = "<ul>\n\t\t<li>".implode("</li>\n\t\t<li>", $errors)."\n\t";
      break;
    }
     } elseif (is_string($message)) {
         $message = "<p>$message</p>";
     }

  // Show the back button
      $back_link = '
        <p>
          <a href="javascript:history.back()" class="back">Back</a>
        </p>
      ';

     require_once $errorTemplate;
     die();
 }
function get_custom_comment_error()
{
    return 'custom_comment_error';
}
add_filter('wp_die_handler', 'get_custom_comment_error');

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @param array $args Configuration arguments.
 *
 * @return array
 */
function wabc_page_menu_args($args)
{
    $args['show_home'] = true;

    return $args;
}
add_filter('wp_page_menu_args', 'wabc_page_menu_args');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 *
 * @return array
 */
function wabc_body_classes($classes)
{
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    return $classes;
}
add_filter('body_class', 'wabc_body_classes');

if (version_compare($GLOBALS['wp_version'], '4.1', '<')) :
    /**
     * Filters wp_title to print a neat <title> tag based on what is being viewed.
     *
     * @param string $title Default title text for current view.
     * @param string $sep   Optional separator.
     *
     * @return string The filtered title.
     */
    function wabc_wp_title($title, $sep)
    {
        if (is_feed()) {
            return $title;
        }
        global $page, $paged;
// Add the blog name
        $title .= get_bloginfo('name', 'display');
// Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page())) {
            $title .= " $sep $site_description";
        }
// Add a page number if necessary:
        if (($paged >= 2 || $page >= 2) && !is_404()) {
            $title .= " $sep ".sprintf(__('Page %s', 'wabc'), max($paged, $page));
        }

        return $title;
    }
    add_filter('wp_title', 'wabc_wp_title', 10, 2);


endif;


/**
 * Sets the authordata global when viewing an author archive.
 *
 * This provides backwards compatibility with
 * http://core.trac.wordpress.org/changeset/25574
 *
 * It removes the need to call the_post() and rewind_posts() in an author
 * template to print information about the author.
 *
 * @global WP_Query $wp_query WordPress Query object.
 */
function wabc_setup_author()
{
    global $wp_query;

    if ($wp_query->is_author() && isset($wp_query->post)) {
        $GLOBALS['authordata'] = get_userdata($wp_query->post->post_author);
    }
}
add_action('wp', 'wabc_setup_author');

/**
 * Sets custom css managed by theme customizer.
 */
function wabc_customize_css()
{
    ?>
  <style type='text/css'>
  body #wrapper-navbar nav .navbar-inverse{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-footer3-widgets{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-footer .scrollToTop{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container .box2, body #page #single-wrapper .container .box2, body #page #wrapper-index .container .box2, body #page #archive-wrapper .container .box2, body #page #wrapper-hero .container .box2{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-top-widgets .container #TKcontent .tk-block h2.widgettitle{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-top-widgets .container #TKcontent .tk-block .textwidget i{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container .tk-block aside .title, body #page #page-wrapper .container .tk-block aside h3.widget-title, body #page #single-wrapper .container .tk-block aside .title, body #page #single-wrapper .container .tk-block aside h3.widget-title, body #page #wrapper-index .container .tk-block aside .title, body #page #wrapper-index .container .tk-block aside h3.widget-title, body #page #archive-wrapper .container .tk-block aside .title, body #page #archive-wrapper .container .tk-block aside h3.widget-title, body #page #wrapper-hero .container .tk-block aside .title, body #page #wrapper-hero .container .tk-block aside h3.widget-title{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container #primary #main article .entry-header h2.entry-title, body #page #single-wrapper .container #primary #main article .entry-header h2.entry-title, body #page #wrapper-index .container #primary #main article .entry-header h2.entry-title, body #page #archive-wrapper .container #primary #main article .entry-header h2.entry-title, body #page #wrapper-hero .container #primary #main article .entry-header h2.entry-title{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-footer-widgets .container #TKfootercontent .tk-block h2.widgettitle{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-navbar nav .navbar-inverse ul.navbar-nav li.dropdown ul.dropdown-menu{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-navbar nav .navbar-inverse ul.navbar-nav li.dropdown:hover ul.dropdown-menu{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-navbar nav .navbar-inverse ul.navbar-nav li.dropdown ul.dropdown-menu{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-navbar nav .navbar-inverse ul.navbar-nav li.dropdown:hover ul.dropdown-menu li.dropdown-submenu:hover ul.dropdown-menu{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-footer{
    background-color: <?php echo get_theme_mod('wabc_footer_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .product span.onsale{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main form.woocommerce-ordering select{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary ul.products li.product .button, body.woocommerce-page #page-wrapper .container #primary nav.woocommerce-pagination ul.page-numbers li span.current,body.woocommerce-page #page-wrapper .container #primary #main nav.woocommerce-pagination ul.page-numbers li a.page-numbers.next{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce a.wc-backward, body #page #page-wrapper .container #primary #main form button, body.woocommerce-page #page-wrapper .container #primary #main .product .woocommerce-tabs ul.tabs li.active{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }


  body.woocommerce-page #page-wrapper .container #primary ul.products li.product a .star-rating span::before, body.woocommerce-page #page-wrapper .container #primary ul.products li.product a h3, body.woocommerce-page #page-wrapper .container #primary #main h1.page-title, body.woocommerce-page #page-wrapper .container #primary #main .product .summary h1.product_title {
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container #primary #main form button, body #page #page-wrapper .container #primary #main form html input[type="button"], body #page #page-wrapper .container #primary #main form input[type="reset"], body #page #page-wrapper .container #primary #main form input[type="submit"], body #page #single-wrapper .container #primary #main form button, body #page #single-wrapper .container #primary #main form html input[type="button"], body #page #single-wrapper .container #primary #main form input[type="reset"], body #page #single-wrapper .container #primary #main form input[type="submit"], body #page #wrapper-index .container #primary #main form button, body #page #wrapper-index .container #primary #main form html input[type="button"], body #page #wrapper-index .container #primary #main form input[type="reset"], body #page #wrapper-index .container #primary #main form input[type="submit"], body #page #archive-wrapper .container #primary #main form button, body #page #archive-wrapper .container #primary #main form html input[type="button"], body #page #archive-wrapper .container #primary #main form input[type="reset"], body #page #archive-wrapper .container #primary #main form input[type="submit"], body #page #wrapper-hero .container #primary #main form button, body #page #wrapper-hero .container #primary #main form html input[type="button"], body #page #wrapper-hero .container #primary #main form input[type="reset"], body #page #wrapper-hero .container #primary #main form input[type="submit"]{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  .woocommerce .star-rating span:before{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce-message{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce .woocommerce-info{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }

  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce form.woocommerce-checkout #order_review .woocommerce-checkout-payment{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce .cart-collaterals .cart_totals .wc-proceed-to-checkout a.checkout-button{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce form.woocommerce-checkout #order_review .place-order input.button{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce .cart-collaterals .cross-sells h2{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }

  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce .cart-collaterals .cart_totals h2{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce a.remove{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?> !important;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce a.remove:hover{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .product .woocommerce-tabs .panel h2{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .product .upsells h2{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .product .related h2{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body.woocommerce-page #page-wrapper .container #primary #main .woocommerce form.login p.form-row label.inline{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container #tkhero aside .title, body #page #page-wrapper .container #tkhero aside h3.widget-title, body #page #single-wrapper .container #tkhero aside .title, body #page #single-wrapper .container #tkhero aside h3.widget-title, body #page #wrapper-index .container #tkhero aside .title, body #page #wrapper-index .container #tkhero aside h3.widget-title, body #page #archive-wrapper .container #tkhero aside .title, body #page #archive-wrapper .container #tkhero aside h3.widget-title, body #page #wrapper-hero .container #tkhero aside .title, body #page #wrapper-hero .container #tkhero aside h3.widget-title{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #middle-widgets-wrapper .container #TKMiddlecontent .tk-block h2.widgettitle{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container #primary #main nav.post-navigation .nav-links .nav-previous a, body #page #page-wrapper .container #primary #main nav.post-navigation .nav-links .nav-next a, body #page #single-wrapper .container #primary #main nav.post-navigation .nav-links .nav-previous a, body #page #single-wrapper .container #primary #main nav.post-navigation .nav-links .nav-next a, body #page #wrapper-index .container #primary #main nav.post-navigation .nav-links .nav-previous a, body #page #wrapper-index .container #primary #main nav.post-navigation .nav-links .nav-next a, body #page #archive-wrapper .container #primary #main nav.post-navigation .nav-links .nav-previous a, body #page #archive-wrapper .container #primary #main nav.post-navigation .nav-links .nav-next a, body #page #wrapper-hero .container #primary #main nav.post-navigation .nav-links .nav-previous a, body #page #wrapper-hero .container #primary #main nav.post-navigation .nav-links .nav-next a{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body .btn-default{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?> !important;
  }
  body #page #page-wrapper .container #primary #main header.page-header h1.page-title, body #page #single-wrapper .container #primary #main header.page-header h1.page-title, body #page #wrapper-index .container #primary #main header.page-header h1.page-title, body #page #archive-wrapper .container #primary #main header.page-header h1.page-title, body #page #wrapper-hero .container #primary #main header.page-header h1.page-title{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #page #page-wrapper .container #primary #main article blockquote, body #page #single-wrapper .container #primary #main article blockquote, body #page #wrapper-index .container #primary #main article blockquote, body #page #archive-wrapper .container #primary #main article blockquote, body #page #wrapper-hero .container #primary #main article blockquote{
    border-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-index .container article h2.entry-title a, body #page-wrapper .container article h2.entry-title a, body #single-wrapper .container article h2.entry-title a, body #archive-wrapper .container article h2.entry-title a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-index .container article .entry-meta span.posted-on a, body #page-wrapper .container article .entry-meta span.posted-on a, body #single-wrapper .container article .entry-meta span.posted-on a, body #archive-wrapper .container article .entry-meta span.posted-on a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-index .container article .entry-meta span.byline a, body #page-wrapper .container article .entry-meta span.byline a, body #single-wrapper .container article .entry-meta span.byline a, body #archive-wrapper .container article .entry-meta span.byline a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-index .container article footer.entry-footer span.cat-links a, body #page-wrapper .container article footer.entry-footer span.cat-links a, body #single-wrapper .container article footer.entry-footer span.cat-links a, body #archive-wrapper .container article footer.entry-footer span.cat-links a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-index .container article footer.entry-footer span.comments-link a, body #page-wrapper .container article footer.entry-footer span.comments-link a, body #single-wrapper .container article footer.entry-footer span.comments-link a, body #archive-wrapper .container article footer.entry-footer span.comments-link a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body .btn-default{
    border-color:<?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?> !important;
  }
  body #wrapper-index .container article footer.entry-footer span.tags-links a, body #page-wrapper .container article footer.entry-footer span.tags-links a, body #single-wrapper .container article footer.entry-footer span.tags-links a, body #archive-wrapper .container article footer.entry-footer span.tags-links a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body a{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  body #wrapper-index .container article h2.entry-title a:hover, body #page-wrapper .container article h2.entry-title a:hover, body #single-wrapper .container article h2.entry-title a:hover, body #archive-wrapper .container article h2.entry-title a:hover{
    color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }
  #wrapper-owl .container .wabc-slider .slide-title a{
    background-color: <?php echo get_theme_mod('wabc_nav_bkg_color_setting');
    ?>;
  }









  </style>
  <?php

}

add_action('wp_head', 'wabc_customize_css');
