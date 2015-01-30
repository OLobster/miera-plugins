<?php
/**
 *
 * RS Portfolio
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_intro( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'image'           => '',
    'title'           => '',
    'size'            => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  $url = (is_numeric($image) && !empty( $image ) ) ? wp_get_attachment_url($image):'';
  $class   =  ( !empty($image) ) ? '':'grey';

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

  $output    =  '<div class="element  clearfix col2-3 '.$class.' '.$pg_class.'  auto">';

  if( !empty($image)) {
    $output .=  '<div class="col2-3 auto">';
    $output .=  '<figure class="images">';
    $output .=  '<img src="'.$url.'" alt="">';
    $output .=  '</figure>';
    $output .=  '</div>';
  }

  $output   .=  ( !empty($image) ) ? '<div class="col2-3 auto white-bottom">':'';

  $output   .=  '<p class="small">'.$title.'</p>';
  $output   .=  '<'.$size.'>'.do_shortcode($content).'</'.$size.'>';
  $output   .=  ( !empty($image) ) ? '</div>':'';

  $output   .=  '</div>';

  return $output;

}
add_shortcode( 'miera_intro', 'miera_intro' );
