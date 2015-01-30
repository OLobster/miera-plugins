<?php
/**
 *
 * Employee section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_employee( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'name'            => '',
    'position'        => '',
    'photo'           => '',
    'social1'         => '',
    'social2'         => '',
    'social3'         => '',
    'social4'         => '',
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

  $photo_url = (is_numeric($photo) && !empty( $photo ) ) ? wp_get_attachment_url($photo):'';


$output .= '<div class="col-md-12' . $animate_hide_class . '"' . $data_animation . '>' . "\n";
$output .= '  <div class="staff-info team-thumb">' . "\n";
$output .= '    <div class="team">' . "\n";
$output .= '      <figure class="effect-hera">' . "\n";
$output .= '        <img alt="" src="' . $photo_url . '" class="img-responsive"/>' . "\n";
$output .= '        <figcaption>' . "\n";
$output .= '          <p>' . "\n";
$output .= '            <a href="' . $social1 . '"><i class="fa fa-fw fa-facebook"></i></a>' . "\n";
$output .= '            <a href="' . $social2 . '"><i class="fa fa-fw fa-twitter"></i></a>' . "\n";
$output .= '            <a href="' . $social3 . '"><i class="fa fa-fw fa-dribbble"></i></a>' . "\n";
$output .= '            <a href="' . $social4 . '"><i class="fa fa-fw fa-search"></i></a>' . "\n";
$output .= '          </p>' . "\n";
$output .= '        </figcaption>' . "\n";
$output .= '      </figure>' . "\n";
$output .= '    </div>' . "\n";
$output .= '    <h3>' . $name . '</h3>' . "\n";
$output .= '    <p>' . $position . '</p>' . "\n";
$output .= '  </div>' . "\n";
$output .= '</div>' . "\n";

  return $output;

}
add_shortcode( 'miera_employee', 'miera_employee' );
