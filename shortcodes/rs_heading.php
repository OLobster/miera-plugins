<?php
/**
 *
 * Heading
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_heading( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'heading'         => '',
    'size'            => '',
    'animation'       => '',
    'page_name'       => ''
  ), $atts ) );

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


  $output  =  '<div class="element clearfix col-md-12 '.$pg_class.' grey auto' . $animate_hide_class . '"' . $data_animation . '>';
  $output .=  '<'.$size.'><strong>'.$heading.'</strong></'.$size.'>';
  $output .=  '<p>'.do_shortcode($content).'</p>';
  $output .=  '</div>';


  return $output;

}
add_shortcode( 'miera_heading', 'miera_heading' );
