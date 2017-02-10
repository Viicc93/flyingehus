<?php
require_once('include/wp_bootstrap_navwalker.php');

function flyingehus_enqueue_scripts() {
  // Enqueue Scripts
  if ( !is_admin() ) {
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js', false, '1.11.0', true );

    wp_enqueue_script('jquery');
  }
  wp_enqueue_script('bootstrap-js', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array( 'jquery' ));
  wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery', 'scrollreveal' ));

  //Enqueue Styles
  wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
  wp_enqueue_style('fontawesome_css', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
  wp_enqueue_style('style', get_stylesheet_uri());
}
add_action( 'wp_enqueue_scripts', 'flyingehus_enqueue_scripts' );

function flyingehus_setup() {
  // Adds RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );
  // Register navigation menu
  register_nav_menu( 'primary', __( 'Primary Menu', 'primarymenu' ) );
  // Disable standard wordpress intern gallery style (inline)
  add_filter( 'use_default_gallery_style', '__return_false' );
  }
add_action( 'after_setup_theme', 'flyingehus_setup' );

if (function_exists('add_theme_support')) {
  add_theme_support('post-thumbnails');
}

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

}
add_action( 'widgets_init', 'flyingehus_widgets_init' );

/*
 * Hide WP Version
 */
function no_generator() { return ''; }
add_filter( 'the_generator', 'no_generator' );
