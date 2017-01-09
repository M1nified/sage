<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Hide post title
 */
include_once 'meta-title.php';
function setup_boxes(){
    add_action('add_meta_boxes',__NAMESPACE__.'\add_meta_boxes');
}
add_action('load-post.php',__NAMESPACE__.'\setup_boxes');
add_action('load-post-new.php',__NAMESPACE__.'\setup_boxes');
function add_meta_boxes(){
    add_meta_box(
        'sage-meta-title',
        esc_html__('Hide title','Hides the title'),
        __NAMESPACE__.'\meta_title_callback',
        ['post','page'],
        'side',
        'default'
    );
}
