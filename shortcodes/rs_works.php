<?php
/**
 *
 * Works section
 * @since 1.0.0
 * @version 1.1.0
 *
 */
function miera_works( $atts, $content = '', $id = '' ) {

  global $post;


  extract( shortcode_atts( array(
    'id'              => '',
    'class'           => '',
    'cats'            => '',
    'posts_per_page'  => '',
    'items_in_row' 	  => '',
    'orderby'         => '',
    'show_filter'     => '',
    'animation'       => '',
    'page_name'       => ''
  ), $atts ) );

  $output = '';

  if($animation != '') {
  	$data_animation = ' data-animation="animated ' . $animation . '"';
  	$animate_hide_class = " appear-animation animate-hide";
  }

  if( $items_in_row != '' ) {
  	$custom_width = ' style="width: ' . $items_in_row . ';"';
  }


  $output=''; 
  if( is_front_page() || is_home() ){
    $paged = ( get_query_var('paged') ) ? intval( get_query_var('paged') ) : intval( get_query_var('page') );
    //$posts_per_page = 8;
  } else {
    $paged = intval( get_query_var('paged') );
  }

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


$output .= '<div class="col-md-12' . $animate_hide_class . '" id="portfolio"' . $data_animation . '>' . "\n";

	$cat_ids = explode(',',$cats);

  $taxonomy = 'work-category';
  $tax_terms = get_terms($taxonomy, array('hide_empty' => false));

  $categories = array();
  foreach ($tax_terms as $tax_term) {
    if ( in_array($tax_term->term_id, $cat_ids) ) {
      $categories[] = $tax_term;
    }
  }


	$work_args = array(
    'posts_per_page'  =>  $posts_per_page,
    'post_type'   =>  'work',
    'paged'     =>  $paged,
    'orderby'   =>  $orderby,
    'tax_query' => array(
        array(
            'taxonomy'  => 'work-category',
            'field'     => 'ids',
            'terms'     => explode(',',$cats),
            'operator'  => 'IN'
        )
    )
  );

  $works = query_posts( $work_args );
  //print_r($works);

  // showing filter
  if ($show_filter == "yes") {
		$output .= '	<!-- Start Filter -->' . "\n";
		$output .= '	<ul class="folio-filter xtra" data-option-key="filter">' . "\n";
		$output .= '		<li><a class="selected" href="#filter" data-option-value="*">All</a></li>' . "\n";

      if ($categories) {
				foreach ($categories as $cat) {
					$output .= '		<li><a href="#filter" data-option-value=".' . $cat->slug . '">' . $cat->name . '</a></li>' . "\n";
				}
			}
		$output .= '	</ul>' . "\n";
		$output .= '	<!-- End Filter -->' . "\n";
	}

$output .= '	<div class="portfolio-grid">' . "\n";
$output .= '		<div id="folio" class="isotope">' . "\n";
$output .= '			<div id="da-thumbs" class="da-thumbs">' . "\n";

foreach ($works as $work) {
	$src = wp_get_attachment_image_src(get_post_thumbnail_id($work->ID), 'work');
	$post_category = get_the_terms($work->ID, 'work-category');
	$classes = ' ';
	foreach ($post_category as $cat) {
		$classes .= $cat->slug . " ";
	}
  //print_r($src);

	$output .= '				<div class="folio-item isotope-item' . $classes . '"' . $custom_width . '>' . "\n";
	$output .= '					<div class="portfolio-thumb">' . "\n";
	$output .= '						<a href="' . $src[0] . '" class="pop_lbox">' . "\n";
	$output .= '						<img src="' . $src[0] . '" class="img-responsive" alt=""/>' . "\n";
	$output .= '						</a>' . "\n";
	$output .= '					</div>' . "\n";
	$output .= '				</div>' . "\n";
}

$output .= '			</div>' . "\n";
$output .= '		</div>' . "\n";
$output .= '	</div>' . "\n";

$output .= '</div>' . "\n";

  return $output;

}
add_shortcode( 'miera_works', 'miera_works' );
