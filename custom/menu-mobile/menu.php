<?php namespace Roots\Sage\Custom\MenuMobile;

function assets() {
  wp_enqueue_style('sage/menumobile/css', get_template_directory_uri().'/custom/menu-mobile/menu.css', false, null);
  wp_enqueue_script('sage/js', get_template_directory_uri().'/custom/menu-mobile/menu.js', [], null, false);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\assets');