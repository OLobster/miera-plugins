<?php
/**
 *
 * Logo section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_logo( $atts, $content = '', $id = '' ) {

  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'title'           => '',
    'animation'       => '',
    'size'            => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  $data_animation = ($animation != '')?' data-animation="animated ' . $animation . '"':'';
  $animate_hide_class = ($animation != '')?" appear-animation animate-hide":'';

  $content = do_shortcode($content);

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


//$output .= "\n\n\n" . '<!-- LOGO SECTION -->' . "\n";
//$output .= '<section id="logo-section" class="logo-section">' . "\n";
//$output .= '<section class="logo-section">' . "\n";
$output .= '  <div class="col-md-12 align-center logo-section' . $animate_hide_class . '"' . $data_animation . '>' . "\n";
$output .= '    <h3 class="uppercase">' . $title . '</h3>' . "\n";
	if ($content) {
		$output .= '    <p class="lead lead-para-logo">' . $content . '</p>' . "\n";
	}
$output .= '  </div>' . "\n";
//$output .= '</section>' . "\n";
//$output .= '<div class="clearfix"></div>' . "\n";
//$output .= '<!-- LOGO SECTION -->' . "\n";


  return $output;

}
add_shortcode( 'miera_logo', 'miera_logo' );
