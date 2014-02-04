<?php
/*
  Plugin Name: RG Home services
  Description: A plugin that create a custom post type displaying services information on the home page.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */
add_action( 'init', 'register_services', 0 );
function register_services() {
    $labels = array(
		'name' => __( 'Services', 'dgs-services' ),
		'singular_name' => __( 'Service', 'dgs-services' ),
		'add_new' => __( 'Add New Service', 'dgs-services' ),
		'add_new_item' => __( 'Add New Service', 'dgs-services' ),
		'edit_item' => __( 'Edit Services', 'dgs-services' ),
		'new_item' => __( 'New Service Post Item', 'dgs-services' ),
		'view_item' => __( 'View Services', 'dgs-services' ),
		'search_items' => __( 'Search Services', 'dgs-services' ),
		'not_found' => __( 'Nothing found', 'dgs-services' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'dgs-services' ),
		'parent_item_colon' => ''
	); 	
    $args = array( 
        'labels' => $labels, // adds your $labels array from above
		  'public' => true,
		  'publicly_queryable' => true,
		  'show_ui' => true,
		  'query_var' => true,
		  'capability_type' => 'post',
		  'hierarchical' => false,
		  'rewrite' => array( 'slug' => 'services' ), // changes name in permalink structure
		  'menu_icon' => get_template_directory_uri().'/inc/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'editor'),
    );
    register_post_type( 'services', $args ); // adds your $args array from above    
}