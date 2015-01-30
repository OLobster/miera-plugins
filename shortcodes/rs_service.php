<?php
/**
 *
 * Service section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_service( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'image'           => '',
    'animation'       => '',
    'name'            => '',
    'description'     => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  $data_animation = ($animation != '')?' data-animation="animated ' . $animation . '"':'';
  $animate_hide_class = ($animation != '')?" appear-animation animate-hide":'';

  $image = " " . $image;

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

  $output .= '  <div class="col-md-12 service-content' . $animate_hide_class . '"' . $data_animation . '>';
  $output .= '    <i class="fa' . $image . ' fa-2x"></i>';
  $output .= '    <h4>' . $name . '</h4>';
  $output .= '    <p>' . $description . '</p>';
  $output .= '  </div>';

  return $output;

}
add_shortcode( 'miera_service', 'miera_service' );
