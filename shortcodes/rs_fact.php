<?php
/**
 *
 * Fact section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_fact( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'title'           => '',
    'count'           => '',
    'symbol'          => '',
    'animation'       => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  $data_animation = ($animation != '')?' data-animation="animated ' . $animation . '"':'';
  $animate_hide_class = ($animation != '')?" appear-animation animate-hide":'';

  $count = intval($count);

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


$output .= '<div class="timer">' . "\n";
$output .= '  <div class="' . $animate_hide_class . '"' . $data_animation . '>' . "\n";
$output .= '    <div class="fact-counter"><span>' . $count . '</span>' . $symbol . '</div>' . "\n";
$output .= '    <h4 class="head-counter">' . $title . '</h4>' . "\n";
$output .= '  </div>' . "\n";
$output .= '</div>' . "\n";

  return $output;

}
add_shortcode( 'miera_fact', 'miera_fact' );
