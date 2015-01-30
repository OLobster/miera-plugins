<?php
/**
 *
 * VC COLUMN and VC COLUMN INNER
 * @since 1.0.0
 * @version 1.0.0
 *
 */

function miera_column_n( $atts, $content = '', $id = '' ) {
	extract( shortcode_atts( array(
	  'id'              => '',
	  'class'           => '',
	  'el_class'		=> '',
	  'css'				=> '',
	  'el_id'			=> '',
	  'el_video'		=> '',
	  'video_full'		=> '',
	  'video_webm'		=> '',
	  'video_mp4'		=> '',
	  'video_ogg'		=> '',
	  'top_rev_slider'	=> '',
	  'link_to'			=> '',
	  'back_overlay'	=> '',
	  'back_overlay_color'	=> '',
	  'back_parallax'	=> '',
	), $atts ) );

	$first = strpos($css, "{");
	$second = substr($css, $first+1);
	$styles = explode("}", $second);
	$styles = $styles[0];

	$rev_slider_class = ($top_rev_slider == "yes")?" top-rev-slider":'';

	if ($el_class) {
		$el_class = " " . $el_class;
	}

	$parallax_class = ($back_parallax == "yes")?' simple-parallax':'';

	$output = '';

	$output .= '<section style="' . $styles . '" class="section' . $el_class . $rev_slider_class . $parallax_class . '" id="' . $el_id . '">';

	if ($el_video == "yes") {
		$full_video_class = ($video_full == "yes") ? ' full-width-video' : ' container';
		$output .= '	<div class="video-wrapper' . $full_video_class . '">';
		$output .= '		<video loop="" muted="" autoplay="">';
		$output .= '			<source type="video/webm" src="' . $video_webm . '">';
		$output .= '			<source type="video/mp4" src="' . $video_mp4 . '">';
		$output .= '			<source type="video/ogg" src="' . $video_ogg . '">';
		$output .= '		</video>';
		$output .= '	</div>';
	}

	
	if ($back_overlay == "yes") {
		$output .= '<div class="overlay" style="background-color:' . $back_overlay_color . ';"></div>';
	}

	$output .= '<div class="container">';

	if ($top_rev_slider == "yes") {
		$output .= '<a class="arrow-down fa fa-angle-down page-scroll" href="#' . $link_to . '" data-scroll=""></a>';
	}

	$output .= '<div class="row">';
	$output .= do_shortcode($content);
	$output .= '</div></div>';
	$output .= '</section><div class="clearfix"></div>';
	//}
	
	return $output;
}

function nsv_column_m( $atts, $content = '', $id = '' ) {
	return "<div>OK</div>";
}



function miera_column( $atts, $content = '', $id = '' ) { 
	return do_shortcode($content); 
}

//add_shortcode('vc_column', 'miera_column_m');
//add_shortcode('vc_column_inner', 'miera_column');
add_shortcode('vc_row', 'miera_column_n');
add_shortcode('vc_row_inner', 'miera_column');




/**function miera_column( $atts, $content = '', $id = '' ) { return do_shortcode($content); }
add_shortcode('vc_column', 'miera_column');
add_shortcode('vc_column_inner', 'miera_column');
add_shortcode('vc_row', 'miera_column');
add_shortcode('vc_row_inner', 'miera_column');
*/