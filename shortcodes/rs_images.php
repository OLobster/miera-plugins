<?php
/**
 *
 * Images block
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_images_block( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'title'           => '',
    'animation'       => '',
    'size'            => '',
    'images'          => '',
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

  // add images
  if ($images) {
    $is_explode_images = is_explodable($images);
    if ($is_explode_images ) {
      $exploded_images = explode(',', $images);
      $output .= '      <div class="col-md-12 align-center culture' . $animate_hide_class . ' img-margined"' . $data_animation . '>' . "\n";

      foreach ($exploded_images as $image) {
        $url = (is_numeric($image) && !empty( $image ) ) ? wp_get_attachment_url($image):'';

        $output .= '        <div class="col-md-3">' . "\n";
        $output .= '          <a href="' . $url . '" class="pop_lbox">' . "\n";
        $output .= '          <img src="' . $url . '" alt=""/>' . "\n";
        $output .= '          </a>' . "\n";
        $output .= '        </div>' . "\n";
      }

      $output .= '      </div>' . "\n";
    }
  }

  return $output;

}
add_shortcode( 'miera_images_block', 'miera_images_block' );
