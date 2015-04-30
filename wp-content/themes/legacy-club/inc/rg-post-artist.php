<?php
/*
  Plugin Name: RG artist
  Description: A plugin that create a custom post type displaying artist information in the header.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */

add_action( 'init', 'rg_register_artist', 0 );
function rg_register_artist() {
    $labels = array(
		'name' => __( 'Artist Post', 'rg-artist' ),
		'singular_name' => __( 'Artist', 'rg-artist' ),
		'add_new' => __( 'Add New Artist', 'rg-artist' ),
		'add_new_item' => __( 'Add New Artist', 'rg-artist' ),
		'edit_item' => __( 'Edit Artist', 'rg-artist' ),
		'new_item' => __( 'New Artist Post Item', 'rg-artist' ),
		'view_item' => __( 'View Artist', 'rg-artist' ),
		'search_items' => __( 'Search Artist', 'rg-artist' ),
		'not_found' => __( 'Nothing found', 'rg-artist' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'rg-artist' ),
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
		  'rewrite' => array( 'slug' => 'artist' ), // changes name in permalink structure
		  'menu_icon' => get_template_directory_uri().'/inc/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'thumbnail', 'editor' ),
    ); 
    register_post_type( 'artist', $args ); // adds your $args array from above	
	$prefix = 'rgs_';
	$artist_options = array(
		array(
			'label' => 'Artist Category',
			'desc' => "Artists category slug. Chosen when category is created.",
			'id' => $prefix . 'artist_cat',
			'std' => '',
			'type' => 'text' // text area
		)
	);
	$artist_options_box = new custom_add_meta_box( 'artist-page', 'Artist Options', $artist_options, 'artist', true );
}