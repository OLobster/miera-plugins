<?php
/**
 *
 * Clients section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_clients( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'title'           => '',
    'animation'       => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  $data_animation = ($animation != '')?' data-animation="animated ' . $animation . '"':'';
  $animate_hide_class = ($animation != '')?" appear-animation animate-hide":'';

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

$output .= '<div class="col-md-8 align-center' . $animate_hide_class . '"' . $data_animation . '>' . "\n";

if ( $title != '' ) {
  $output .= '    <h4 class="clients-head">' . $title . '</h4>' . "\n";
}

$output .= '    <div class=" client-row">' . "\n";
$output .= '      <ul>' . "\n";
$output .=          do_shortcode($content);
$output .= '      </ul>' . "\n";
$output .= '    </div>' . "\n";
$output .= '  </div>' . "\n";

  return $output;

}
add_shortcode( 'miera_clients', 'miera_clients' );
