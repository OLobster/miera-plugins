<?php
/**
 *
 * Title section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_title( $atts, $content = '', $id = '' ) {

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

if ($title != '') {
	$output .= '<div class="col-md-12 align-center content-head' . $animate_hide_class . '"' . $data_animation . '>' . "\n";
	$output .= '  <h2>' . $title . '</h2>' . "\n";
	$output .= '</div>' . "\n";
}

  return $output;

}
add_shortcode( 'miera_title', 'miera_title' );
