<?php
require_once('include/wp_bootstrap_navwalker.php');

function flyingehus_enqueue_scripts() {
  // Enqueue Scripts
  if ( !is_admin() ) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', true );

    wp_enqueue_script('jquery');
  }
  wp_enqueue_script('bootstrap-js', get_stylesheet_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array( 'jquery' ));
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/assets/js/script.js', array( 'jquery'));

  //Enqueue Styles
  wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/assets/bootstrap/css/bootstrap.min.css');
  //wp_enqueue_style('fontawesome', get_stylesheet_directory_uri() . '/assets/font-awesome/css/font-awesome.min.css');
  wp_enqueue_style('style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'flyingehus_enqueue_scripts' );

function flyingehus_setup() {

  // Register navigation menu
  register_nav_menu( 'primarymenu', __( 'Primary Menu', 'flyingehus' ) );
  // Disable standard wordpress intern gallery style (inline)
  add_filter( 'use_default_gallery_style', '__return_false' );
  }
add_action( 'after_setup_theme', 'flyingehus_setup' );

function wpdocs_custom_excerpt_length( $length ) {
    return 40;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function flyingehus_widgets_init() {

  register_sidebar( array(
    'name' => __( 'Main Sidebar', 'flyingehus' ),
    'id' => 'main-sidebar',
    'description' => __( 'Widget area.', 'flyingehus' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s ">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

  register_sidebar( array(
    'name' => __( 'Sidebar', 'flyingehus' ),
    'id' => 'sidebar',
    'description' => __( 'Widget area.', 'flyingehus' ),
    'before_widget' => '<li id="%1$s" class="widget %2$s ">',
    'after_widget'  => '</li>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ) );

}
add_action( 'widgets_init', 'flyingehus_widgets_init' );

// Enable shortcodes in text widgets
add_filter('widget_text','do_shortcode');

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}
/*
 * Hide WP Version
 */
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );

require_once('include/flyingehus-calendar.php');
