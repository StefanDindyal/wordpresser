<?php
/*
  Plugin Name: RG Home Slider
  Description: A plugin that create a custom post type displaying slider information on the home page.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */
add_action( 'init', 'register_slider', 0 );
function register_slider() {
    $labels = array(
		'name' => __( 'Home Slider', 'dgs-slider' ),
		'singular_name' => __( 'slider', 'dgs-slider' ),
		'add_new' => __( 'Add New Slide', 'dgs-slider' ),
		'add_new_item' => __( 'Add New Slide', 'dgs-slider' ),
		'edit_item' => __( 'Edit slider', 'dgs-slider' ),
		'new_item' => __( 'New slider Post Item', 'dgs-slider' ),
		'view_item' => __( 'View slider', 'dgs-slider' ),
		'search_items' => __( 'Search slider', 'dgs-slider' ),
		'not_found' => __( 'Nothing found', 'dgs-slider' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'dgs-slider' ),
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
		  'rewrite' => array( 'slug' => 'slider' ), // changes name in permalink structure
		  'menu_icon' => get_template_directory_uri().'/inc/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'thumbnail' ),
    );
    register_post_type( 'slider', $args ); // adds your $args array from above
}