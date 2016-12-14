<?php
/**
 * Sage includes
 *
 * The $sage_includes array determines the code library included in your theme.
 * Add or remove files to the array as needed. Supports child theme overrides.
 *
 * Please note that missing files will produce a fatal error.
 *
 * @link https://github.com/roots/sage/pull/1042
 */
$sage_includes = [
  'lib/assets.php',    // Scripts and stylesheets
  'lib/extras.php',    // Custom functions
  'lib/setup.php',     // Theme setup
  'lib/titles.php',    // Page titles
  'lib/wrapper.php',   // Theme wrapper class
  'lib/customizer.php' // Theme customizer
];

foreach ($sage_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sage'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// // Make sure featured images are enabled
// add_theme_support( 'post-thumbnails' );

// // Add featured image sizes
// add_image_size( 'featured-large', 640, 294, true ); // width, height, crop
// add_image_size( 'featured-small', 320, 147, true );

// // Add other useful image sizes for use through Add Media modal
// add_image_size( 'medium-width', 480 );
// add_image_size( 'medium-height', 9999, 480 );
// add_image_size( 'medium-something', 480, 480 );

// // Register the three useful image sizes for use in Add Media modal
// add_filter( 'image_size_names_choose', 'wpshout_custom_sizes' );
// function wpshout_custom_sizes( $sizes ) {
//     return array_merge( $sizes, array(
//         'medium-width' => __( 'Medium Width' ),
//         'medium-height' => __( 'Medium Height' ),
//         'medium-something' => __( 'Medium Something' ),
//     ) );
// }

// echo 'NAMESPACE:'.__NAMESPACE__;
// if ( function_exists( 'add_image_size' ) ) {
//   add_image_size( 'new-size', 350, 250, true ); //(cropped)
// }
// add_filter('image_size_names_choose', 'sage_image_sizes');
// function sage_image_sizes($sizes) {
//   // echo 'DODAJE2';
//   $addsizes = array(
//     "new-size" => __( "New Size")
//   );
//   $newsizes = array_merge($sizes, $addsizes);
//   return $newsizes;
// }