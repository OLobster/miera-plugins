<?php
/**
  * WPBakery Visual Composer Shortcodes settings
  *
  * @package VPBakeryVisualComposer
  *
 */

// Include Helpers
//include_once( T_PATH . '/' . F_DIR . '/composer/helpers.php' );
include_once( EF_ROOT . '/composer/params.php' );

if ( ! function_exists( 'is_plugin_active' ) ) {
  include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); // Require plugin.php to use is_plugin_active() below
}



$animations = array(
  __( 'No', 'js_composer' ) => '',
  __( 'Fade-In', 'js_composer' )          => 'fadeIn',
  __( 'Fade-In-Up', 'js_composer' )       => 'fadeInUp',
  __( 'Fade-In-Down', 'js_composer' )     => 'fadeInDown',
  __( 'Bounce-In-Left', 'js_composer' )   => 'bounceInLeft',
  __( 'Bounce-In-Right', 'js_composer' )  => 'bounceInRight',
);

$animation_params = array(
    'type'        => 'dropdown',
    'heading'     => 'Animation',
    'param_name'  => 'animation',
    'description' => 'Select the animation type',
    'group'       => 'Animation',
    'value'       => $animations,
);

vc_map( array(
  'name' => __( 'Row', 'js_composer' ),
  'base' => 'vc_row',
  'is_container' => true,
  'icon' => 'icon-wpb-row',
  'show_settings_on_create' => false,
  'category' => __( 'Content', 'js_composer' ),
  'description' => __( 'Place content elements inside the row', 'js_composer' ),
  'params' => array(
    array(
      'type' => 'colorpicker',
      'heading' => __( 'Font Color', 'js_composer' ),
      'param_name' => 'font_color',
      'description' => __( 'Select font color', 'js_composer' ),
      'edit_field_class' => 'vc_col-md-6 vc_column'
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Extra class name', 'js_composer' ),
      'param_name' => 'el_class',
      'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' ),
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Unique name for menu', 'js_composer' ),
      'param_name' => 'el_id',
      'description' => __( 'If you want to add this item to main menu, you have to put unique name in this field', 'js_composer' ),
    ),
    array(
      'type' => 'css_editor',
      'heading' => __( 'Css', 'js_composer' ),
      'param_name' => 'css',
      'group' => __( 'Design options', 'js_composer' )
    ),
    array(
      'type' => 'checkbox',
      'heading' => __( 'Video background', 'js_composer' ),
      'param_name' => 'el_video',
      'description' => __( 'Check this input if you want to add video background to this division', 'js_composer' ),
      'group' => __( 'Background options', 'js_composer' ),
      'value' => array( __( 'Use video as background', 'js_composer' ) => 'yes' )
    ),
    array(
      'type' => 'checkbox',
      'heading' => __( 'Full width', 'js_composer' ),
      'param_name' => 'video_full',
      'group' => __( 'Background options', 'js_composer' ),
      'dependency'  => array( 'element' => 'el_video', 'value' => array('yes') ),
      'value' => array( __( 'Full width video', 'js_composer' ) => 'yes' )
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Link for video in "webm" format', 'js_composer' ),
      'param_name' => 'video_webm',
      'dependency'  => array( 'element' => 'el_video', 'value' => array('yes') ),
      'group' => __( 'Background options', 'js_composer' )
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Link for video in "mp4" format', 'js_composer' ),
      'param_name' => 'video_mp4',
      'dependency'  => array( 'element' => 'el_video', 'value' => array('yes') ),
      'group' => __( 'Background options', 'js_composer' )
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Link for video in "ogg" format', 'js_composer' ),
      'param_name' => 'video_ogg',
      'dependency'  => array( 'element' => 'el_video', 'value' => array('yes') ),
      'group' => __( 'Background options', 'js_composer' )
    ),
    array(
      'type' => 'checkbox',
      'heading' => __( 'Top slider', 'js_composer' ),
      'param_name' => 'top_rev_slider',
      'group' => __( 'Revolution slider', 'js_composer' ),
      'value' => array( __( 'Use this block as top slider', 'js_composer' ) => 'yes' )
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Target for for arrow to scroll',
      'param_name'  => 'link_to',
      'placeholder' => 'Select Page',
      'admin_label' => true,
      'value'       => miera_element_values( 'post', array(
      'sort_order'  => 'ASC',
      'post_type'   => 'page',
      'hide_empty'  => false,
      'posts_per_page' => -1
      ) ),
      'std'         => '',
      'dependency'  => array( 'element' => 'top_rev_slider', 'value' => array('yes') ),
      'group' => __( 'Revolution slider', 'js_composer' )
    ),
    array(
      'type' => 'checkbox',
      'heading' => __( 'Background overlay', 'js_composer' ),
      'param_name' => 'back_overlay',
      'description' => __( 'Check this box if you want to add background overlay to this division', 'js_composer' ),
      'group' => __( 'Background options', 'js_composer' ),
      'value' => array( __( 'Add background overlay', 'js_composer' ) => 'yes' )
    ),
    array(
      'type' => 'colorpicker',
      'heading' => __( 'Overlay Color', 'js_composer' ),
      'param_name' => 'back_overlay_color',
      'description' => __( 'Select overlay color & opacity', 'js_composer' ),
      'dependency'  => array( 'element' => 'back_overlay', 'value' => array('yes') ),
      'group' => __( 'Background options', 'js_composer' ),
    ),
    array(
      'type' => 'checkbox',
      'heading' => __( 'Parallax background', 'js_composer' ),
      'param_name' => 'back_parallax',
      'description' => __( 'Check this box if you want to use parallax background', 'js_composer' ),
      'group' => __( 'Background options', 'js_composer' ),
      'value' => array( __( 'Add background parallax', 'js_composer' ) => 'yes' )
    ),
  ),
  'js_view' => 'VcRowView'
) );
vc_map( array(
  'name' => __( 'Row', 'js_composer' ), //Inner Row
  'base' => 'vc_row_inner',
  'content_element' => false,
  'is_container' => true,
  'icon' => 'icon-wpb-row',
  'weight' => 1000,
  'show_settings_on_create' => false,
  'description' => __( 'Place content elements inside the row', 'js_composer' ),
  'params' => array(
    array(
      'type' => 'colorpicker',
      'heading' => __( 'Font Color', 'js_composer' ),
      'param_name' => 'font_color',
      'description' => __( 'Select font color', 'js_composer' ),
      'edit_field_class' => 'vc_col-md-6 vc_column'
    ),
    array(
      'type' => 'textfield',
      'heading' => __( 'Extra class name', 'js_composer' ),
      'param_name' => 'el_class',
      'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
    ),
    array(
      'type' => 'css_editor',
      'heading' => __( 'Css', 'js_composer' ),
      'param_name' => 'css',
      'group' => __( 'Design options', 'js_composer' )
    )
  ),
  'js_view' => 'VcRowView'
) );



add_action( 'admin_init', 'vc_remove_elements', 10);
function vc_remove_elements( $e = array() ) {

  if ( !empty( $e ) ) {
    foreach ( $e as $key => $r_this ) {
      vc_remove_element( 'vc_'.$r_this );
    }
  }
}

$s_elemets = array( 'tabs', 'tab', 'accordion', 'accordion_tab', 'custom_heading', 'empty_space', 'clients', 'column_text', 'widget_sidebar', 'toggle', 'images_carousel', 'carousel', 'tour', 'gallery', 'posts_slider', 'posts_grid', 'teaser_grid', 'separator', 'text_separator', 'message', 'facebook', 'tweetmeme', 'googleplus', 'pinterest', 'single_image', 'button', 'toogle', 'button2', 'cta_button', 'cta_button2', 'video', 'gmaps', 'flickr', 'progress_bar', 'raw_html', 'raw_js', 'pie', 'wp_search', 'wp_meta', 'wp_recentcomments', 'wp_calendar', 'wp_pages', 'wp_custommenu', 'wp_text', 'wp_posts', 'wp_links', 'wp_categories', 'wp_archives', 'wp_rss' );
vc_remove_element('client', 'testimonial', 'contact-form-7');
vc_remove_elements( $s_elemets );



// ==========================================================================================
// HEADING
// ==========================================================================================
vc_map( array(
  'name'            => 'Heading',
  'base'            => 'miera_heading',
  'icon'            => '',
  'description'     => 'Custom Heading',
  'params'          => array(
    array(
      'type'        => 'dropdown',
      'heading'     => 'Heading',
      'param_name'  => 'size',
      'value'       => array(
        'H1'        =>  'h1',
        'H2'        =>  'h2',
        'H3'        =>  'h3',
        'H4'        =>  'h4',
        'H5'        =>  'h5',
        'H6'        =>  'h6',
      )
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Heading',
      'param_name'  => 'heading',
      'admin_label' => true
    ),
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
    ),
    $animation_params,
  )

) );




/**

 */

// ==========================================================================================
// IMAGES BLOCK
// ==========================================================================================
vc_map( array(
  'name'            => 'Images block',
  'base'            => 'miera_images_block',
  'icon'            => '',
  'description'     => 'Images block',
  'params'          => array(
    array(
      'type'        => 'attach_images',
      'heading'     => 'Images',
      'param_name'  => 'images',
      'description' => 'Upload your images.'
    ),
    $animation_params,
  )

) );

// ==========================================================================================
// LOGO SECTION
// ==========================================================================================
vc_map( array(
  'name'            => 'Logo',
  'base'            => 'miera_logo',
  'icon'            => '',
  'description'     => 'Logo block',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
      'value'       => 'Default title',
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Content',
      'holder'      => 'div',
      'param_name'  => 'content',
      'description' => 'This is optional field',
    ),
    $animation_params,
  )

) );


// ==========================================================================================
// TITLE
// ==========================================================================================
vc_map( array(
  'name'            => 'Title',
  'base'            => 'miera_title',
  'icon'            => '',
  'description'     => 'Custom Title',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Title',
      'param_name'  => 'title',
      'value'       => 'Default title',
    ),
    $animation_params,
  )

) );



// ==========================================================================================
// CONTENT
// ==========================================================================================
vc_map( array(
  'name'            => 'Paragraph',
  'base'            => 'miera_content',
  'icon'            => '',
  'description'     => 'Paragraph',
  'params'          => array(
    array(
      'type'        => 'textarea_html',
      'heading'     => 'Content',
      'param_name'  => 'content',
      'value'       => 'Default content',
    ),
    $animation_params,
  )

) );


// ==========================================================================================
// BUTTON
// ==========================================================================================
vc_map( array(
  'name'            => 'Button',
  'base'            => 'miera_button',
  'icon'            => '',
  'description'     => 'Button',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Button title',
      'param_name'  => 'title',
      'value'       => 'Button name',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Button link',
      'param_name'  => 'link',
      'value'       => '#',
    ),
    $animation_params,
  )

) );



// ==========================================================================================
// SERVICE SECTION
// ==========================================================================================
vc_map( array(
  'name'            => 'Service',
  'base'            => 'miera_service',
  'icon'            => '',
  'description'     => 'Service block',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Image',
      'value'       => 'fa-bicycle',
      'param_name'  => 'image',
      'description' => 'Type full name of Font Awesome icon. You can find icon on <a href="http://fontawesome.io/icons/">FontAwesome</a>'
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Name',
      'param_name'  => 'name',
    ),
    array(
      'type'        => 'textarea',
      'heading'     => 'Description',
      'holder'      => 'div',
      'param_name'  => 'description',
    ),
    $animation_params,
  )

) );



// ==========================================================================================
// BLOCKQUOTE
// ==========================================================================================
vc_map( array(
  'name'            => 'Blockquote',
  'base'            => 'miera_blockquote',
  'icon'            => '',
  'description'     => 'Blockquote',
  'params'          => array(
    array(
      'type'        => 'textarea',
      'heading'     => 'Blockquote',
      'param_name'  => 'blockqoute',
      'value'       => 'Default blockqoute',
    ),
    $animation_params,
  )

) );



// ==========================================================================================
// WORKS
// ==========================================================================================
vc_map( array(
  'name'            => 'Works',
  'base'            => 'miera_works',
  'icon'            => '',
  'description'     => 'Works',
  'params'          => array(
    array(
      'type'        => 'vc_efa_chosen',
      'heading'     => 'Select Categories',
      'param_name'  => 'cats',
      'placeholder' => 'Select category',
      'value'       => miera_element_values( 'categories', array(
        'sort_order'  => 'ASC',
        'taxonomy'    => 'work-category',
        'hide_empty'  => false,
      ) ),
      'std'         => '',
      'description' => 'you can choose spesific categories of works, default is all categories',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Post Per Page',
      'param_name'  => 'posts_per_page',
      'value'       => 12
    ),
    array(
      'type'        => 'dropdown',
      'heading'     => 'Items per row',
      'param_name'  => 'items_in_row',
      'value'       => array(
          __( 'Default', 'js_composer' )  => '',
          __( '1 item', 'js_composer' )   => '100%',
          __( '2 items', 'js_composer' )  => '50%',
          __( '3 items', 'js_composer' )  => '33.4%',
          __( '4 items', 'js_composer' )  => '25%',
          __( '5 items', 'js_composer' )  => '20%',
          __( '6 items', 'js_composer' )  => '16.67%',
        ),
    ),
    array(
        'type' => 'dropdown',
        'admin_label' => true, 
        'heading' => 'Order by',
        'param_name' => 'orderby',
        'value' => array(
          __('ID', "miera") => 'ID',
          __('Author', 'miera') => 'author',
          __('Post Title', 'miera') => 'title',
          __('Date', 'miera') => 'date',
          __('Last Modified', 'miera') => 'modified',
          __('Random Order', 'miera') => 'rand',
          __('Comment Count', 'miera') => 'comment_count',
          __('Menu Order', 'miera') => 'menu_order',
        ),
      ),
      array(
        'type' => 'dropdown',
        'admin_label' => true, 
        'heading' => 'Filter',
        'param_name' => 'show_filter',
        'value' => array(
          __('Yes', "miera") => 'yes',
          __('No', 'miera') => 'no',
        ),
      ),
    $animation_params,
  )

) );



// ==========================================================================================
// EMPLOYEE
// ==========================================================================================
vc_map( array(
  'name'            => 'Employee',
  'base'            => 'miera_employee',
  'icon'            => '',
  'description'     => 'Employee',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Employee name',
      'param_name'  => 'name',
      'value'       => 'John Doe',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Position',
      'param_name'  => 'position',
      'value'       => 'Founder',
    ),
    array(
      'type'        => 'attach_image',
      'heading'     => 'Photo',
      'param_name'  => 'photo',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Facebook link',
      'param_name'  => 'social1',
      'value'       => '#facebook',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Twitter link',
      'param_name'  => 'social2',
      'value'       => '#twitter',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Dribbble link',
      'param_name'  => 'social3',
      'value'       => '#dribbble',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Search link',
      'param_name'  => 'social4',
      'value'       => '#search',
    ),
    $animation_params,
  )

) );



// ==========================================================================================
// CAROUSEL
// ==========================================================================================
vc_map( array(
    "name" => __("Carousel", "js_composer"),
    "base" => "miera_carousel",
    'description'     => 'Carousel Wrapper',
    "as_parent" => array('only' => 'miera_carousel_item'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => "Carousel title",
            "param_name" => "title",
            "description" => "Carousel title",
        ),
        array(
            "type" => "textfield",
            "heading" => "Extra class name",
            "param_name" => "el_class",
            "description" => "If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",
        ),
        $animation_params,
    ),
    "js_view" => 'VcColumnView'
) );
vc_map( array(
    "name" => __("Carousel Item", "js_composer"),
    "base" => "miera_carousel_item",
    "content_element" => true,
    "as_child" => array('only' => 'miera_carousel'),
    "params" => array(
        array(
          'type'        => 'textfield',
          'heading'     => 'Title',
          'param_name'  => 'title',
          'value'       => 'Default title',
        ),
        array(
          'type'        => 'textarea',
          'heading'     => 'Text',
          'param_name'  => 'text',
          'value'       => 'Default text',
        ),
        array(
          'type'        => 'textfield',
          'heading'     => 'Font Awesome icon',
          'param_name'  => 'icon',
          'value'       => 'fa-bicycle',
          'description' => 'Type full name of Font Awesome icon. You can find icon on <a href="http://fontawesome.io/icons/">FontAwesome</a>'
        ),
        $animation_params,
    )
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Miera_Carousel extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Miera_Carousel_Item extends WPBakeryShortCode {
    }
}



// ==========================================================================================
// CLIENTS
// ==========================================================================================
vc_map( array(
    "name" => __("Clients", "js_composer"),
    "base" => "miera_clients",
    'description'     => 'Our clients',
    "as_parent" => array('only' => 'miera_client'),
    "content_element" => true,
    "show_settings_on_create" => false,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Block title (optional)", "js_composer"),
            "param_name" => "title",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        ),
        $animation_params,
    ),
    "js_view" => 'VcColumnView'
) );
vc_map( array(
    "name" => __("Client", "js_composer"),
    "base" => "miera_client",
    "content_element" => true,
    "as_child" => array('only' => 'miera_clients'),
    "params" => array(
        array(
            "type" => "attach_image",
            "heading" => __("Client Logo", "js_composer"),
            "param_name" => "logo",
        ),
        array(
            "type" => "textfield",
            "heading" => __("Extra class name", "js_composer"),
            "param_name" => "el_class",
            "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "js_composer")
        ),
    )
) );

if ( class_exists( 'WPBakeryShortCodesContainer' ) ) {
    class WPBakeryShortCode_Miera_Clients extends WPBakeryShortCodesContainer {
    }
}
if ( class_exists( 'WPBakeryShortCode' ) ) {
    class WPBakeryShortCode_Miera_Client extends WPBakeryShortCode {
    }
}



// ==========================================================================================
// FACTS
// ==========================================================================================
vc_map( array(
  'name'            => 'Fact',
  'base'            => 'miera_fact',
  'icon'            => '',
  'description'     => 'Fact item',
  'params'          => array(
    array(
      'type'        => 'textfield',
      'heading'     => 'Fact title',
      'param_name'  => 'title',
      'value'       => 'Default',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Fact count',
      'param_name'  => 'count',
      'value'       => '0',
    ),
    array(
      'type'        => 'textfield',
      'heading'     => 'Symbol after number',
      'param_name'  => 'symbol',
      'description' => 'For example, "K" or "+"',
    ),
    $animation_params,
  )

) );
