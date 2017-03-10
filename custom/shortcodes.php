<?php namespace Roots\Sage\Custom\Shortcodes;

add_shortcode( 'button', __NAMESPACE__.'\shortcode_button' );

function shortcode_button( $atts, $content = "&nbsp;" ){
    $href_value = array_key_exists('href',$atts) ? $atts['href'] : "#";
    $class_addition = array_key_exists('class',$atts) ? " ".$atts['class'] : "";
    $button = "<a href=\"$href_value\" class=\"btn btn-primary$class_addition\">{$content}</a>";
    return $button;
}