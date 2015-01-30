<?php
/**
 *
 * Carousel item section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_carousel_item( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'title'           => '',
    'text'            => '',
    'icon'            => '',
    'animation'       => '',
    'page_name'       => ''
  ), $atts ) );

  $data_animation = ($animation != '')?' data-animation="animated ' . $animation . '"':'';
  $animate_hide_class = ($animation != '')?" appear-animation animate-hide":'';

  $output = '';

  $icon = " " . $icon;

  $is_explode = is_explodable( $page_name );

  if($is_explode == true) {
    $explode_name = explode(',', $page_name);
    $pg_class = '';
    foreach($explode_name as $key => $name) {
      $name = str_replace(' ', '-', $name);
      $pg_class .= $name.' ';
    }
  } else {
    $page_name = str_replace(' ', '-', $page_name);
    $pg_class = $page_name;
  }


$output .= '<div class="item' . $animate_hide_class . '"' . $data_animation . '>' . "\n";
$output .= '	<div class="testimonials align-center">' . "\n";
$output .= '		<i class="fa' . $icon . '"></i>' . "\n";
$output .= '		<h4>' . $title . '</h4>' . "\n";
$output .= '		<p>' . $text . '</p>' . "\n";
$output .= '	</div>' . "\n";
$output .= '</div>' . "\n";

  return $output;

}
add_shortcode( 'miera_carousel_item', 'miera_carousel_item' );
