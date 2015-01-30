<?php
/**
 *
 * Carousel section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_carousel( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
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


$output .= '	<div class="col-md-12' . $animate_hide_class . '"' . $data_animation . '>' . "\n";
$output .= '		<div class="content-head align-center">' . "\n";
$output .= '			<h2 class="testimonial">' . $title . '</h2>' . "\n";
$output .= '		</div>' . "\n";
$output .= '		<div class="clearfix"></div>' . "\n";
$output .= '		<div class="owl-carousel owl-theme quote-slider">' . "\n";

$output .= do_shortcode($content);

$output .= '		</div>' . "\n";
$output .= '	</div>' . "\n";

  return $output;

}
add_shortcode( 'miera_carousel', 'miera_carousel' );
