<?php
/**
 *
 * Client section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_client( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'logo'            => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  $src = (is_numeric($logo) && !empty( $logo ) ) ? wp_get_attachment_url($logo):'';

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

$output .= '<li><img src="' . $src . '" alt="client"></li>' . "\n";

  return $output;

}
add_shortcode( 'miera_client', 'miera_client' );
