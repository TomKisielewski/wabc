<?php

function wabc_scripts()
{
  wp_enqueue_style('wabc-theme', get_stylesheet_directory_uri().'/css/theme.css', array(), '0.2.8', false);
  //add font-awesome css
    wp_enqueue_style('fontAwesomeCss', get_stylesheet_directory_uri().'/css/font-awesome/font-awesome.css', array(), '0.2.8', false);

  wp_enqueue_script('jquery');
  wp_enqueue_script('wabc-navigation', get_template_directory_uri().'/js/bootstrap.min.js', array(), '20120206', true);
  //add to top script
  wp_enqueue_script('wabc-totop', get_template_directory_uri().'/js/totop.js', array(), '20120206', true);
  //add to matchHeight  script
  wp_enqueue_script('matchHeight', get_template_directory_uri().'/js/jquery.matchHeight.js', array(), '20120206', true);
  //add to animation script
  wp_enqueue_script('wabc-animation', get_template_directory_uri().'/js/tksd_animation.js', array(), '20120206', true);
  //add some css classes
  wp_enqueue_script('tksdAddClasses', get_template_directory_uri().'/js/tksd_addClasses.js', array(), '20120206', true);
  wp_enqueue_script('navtry', get_template_directory_uri().'/js/navtry.js', array(), '20120206', true);
  //waypoints
  wp_enqueue_script('waypoints', get_template_directory_uri().'/js/jquery.waypoints.min.js', array(), '20120206', true);
  // animateCss
  wp_enqueue_style('animateCss', get_stylesheet_directory_uri().'/css/animatecss/animate.min.css', array(), '0.2.8', false);
  // animate waypoints footer
  wp_enqueue_script('animatefooter', get_template_directory_uri().'/js/footerAnimateWaypoints.js', array(), '20120206', true);
  wp_enqueue_script('wabc-heights', get_template_directory_uri().'/js/wabc-heights.js', array(), '20120206', true);
  wp_enqueue_script('wabc-skip-link-focus-fix', get_template_directory_uri().'/js/skip-link-focus-fix.js', array(), '20130115', true);
  if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

}

add_action('wp_enqueue_scripts', 'wabc_scripts');
