<?php
/*
Plugin Name: Miera Plugins
Plugin URI: http://moonart.com.ua/
Author: MoonArt
Author URI: http://moonart.com.ua/
Version: 1.0
Description: Includes Works Custom Post Types and Visual Composer Shortcodes
Text Domain: miera
*/

// Define Constants
defined('EF_ROOT')		or define('EF_ROOT', dirname(__FILE__));
defined('EF_VERSION')	or define('EF_VERSION', '1.0');


//echo EF_ROOT;

if(!class_exists('MIERA_Plugins')) {

	class MIERA_Plugins {

		private $assets_js;

		public function __construct() { 
			$this->assets_js	= plugins_url('/composer/js', __FILE__);
			add_action('init', array($this, 'miera_register_works'), 0);
			add_action('admin_init', array($this, 'miera_load_map'));
			add_action( 'admin_print_scripts-post.php', array($this, 'vc_enqueue_scripts'), 99);
			add_action( 'admin_print_scripts-post-new.php', array($this, 'vc_enqueue_scripts'), 99);
			$this->miera_load_shortcodes();	
		}


		public function miera_register_works() {
			$post_type_labels       = array(
		      'name'                => 'Works',
		      'singular_name'       => 'Work',
		      'menu_name'           => 'Works',
		      'parent_item_colon'   => 'Parent Item:',
		      'all_items'           => 'All Works',
		      'view_item'           => 'View Item',
		      'add_new_item'        => 'Add New Item',
		      'add_new'             => 'Add New',
		      'edit_item'           => 'Edit Item',
		      'update_item'         => 'Update Item',
		      'search_items'        => 'Search works',
		      'not_found'           => 'No works found',
		      'not_found_in_trash'  => 'No works found in Trash',
		    );

		    $post_type_rewrite      = array(
		      'slug'                => 'work-item',
		      'with_front'          => true,
		      'pages'               => true,
		      'feeds'               => true,
		    );

		    $post_type_args         = array(
		      'label'               => 'work',
		      'description'         => 'Work information pages',
		      'labels'              => $post_type_labels,
		      'supports'            => array( 'title', 'thumbnail' ),
		      'taxonomies'          => array( 'post' ),
		      'hierarchical'        => false,
		      'public'              => true,
		      'show_ui'             => true,
		      'show_in_menu'        => true,
		      'show_in_nav_menus'   => true,
		      'show_in_admin_bar'   => true,
		      'can_export'          => true,
		      'has_archive'         => true,
		      'exclude_from_search' => true,
		      'publicly_queryable'  => true,
		      'rewrite'             => $post_type_rewrite,
		      'capability_type'     => 'post',
		    );
		    register_post_type( 'work', $post_type_args );

		    $taxonomy_labels                = array(
		      'name'                        => 'Work',
		      'singular_name'               => 'Work',
		      'menu_name'                   => 'Categories',
		      'all_items'                   => 'All Categories',
		      'parent_item'                 => 'Parent Category',
		      'parent_item_colon'           => 'Parent Category:',
		      'new_item_name'               => 'New Category Name',
		      'add_new_item'                => 'Add New Category',
		      'edit_item'                   => 'Edit Category',
		      'update_item'                 => 'Update Category',
		      'separate_items_with_commas'  => 'Separate categories with commas',
		      'search_items'                => 'Search categories',
		      'add_or_remove_items'         => 'Add or remove categories',
		      'choose_from_most_used'       => 'Choose from the most used categories',
		    );

		    $taxonomy_rewrite         = array(
		      'slug'                  => 'work-category',
		      'with_front'            => true,
		      'hierarchical'          => true,
		    );

		    $taxonomy_args          = array(
		      'labels'              => $taxonomy_labels,
		      'hierarchical'        => true,
		      'public'              => true,
		      'show_ui'             => true,
		      'show_admin_column'   => true,
		      'show_in_nav_menus'   => true,
		      'show_tagcloud'       => true,
		      'rewrite'             => $taxonomy_rewrite,
		    );
		    register_taxonomy( 'work-category', 'work', $taxonomy_args );


		    $taxonomy_tags_args     = array(
		      'hierarchical'        => false,
		      'show_admin_column'   => true,
		      'rewrite'             => 'work-tag',
		      'label'               => 'Tags',
		      'singular_label'      => 'Tags',
		    );
		    register_taxonomy( 'work-tag', array('work'), $taxonomy_tags_args );

		} //end of register work


		public function miera_load_map() {
			if(class_exists('Vc_Manager')) {
				require_once( EF_ROOT .'/'. 'composer/map.php');
				require_once( EF_ROOT .'/'. 'composer/init.php');
			}
		}

		public function miera_load_shortcodes() {

			foreach( glob( EF_ROOT . '/'. 'shortcodes/rs_*.php' ) as $shortcode ) {
				require_once(EF_ROOT .'/'. 'shortcodes/'. basename( $shortcode ) );
			}

			foreach( glob( EF_ROOT . '/'. 'shortcodes/vc_*.php' ) as $shortcode ) {
				require_once(EF_ROOT .'/' .'shortcodes/'. basename( $shortcode ) );
			}
			
		}

		public function vc_enqueue_scripts() {
			wp_enqueue_script( 'vc-script', $this->assets_js .'/vc-script.js' ,  array('jquery'), '1.0.0', true );
		}

	} // end of class

	new MIERA_Plugins;
} // end of class_exists