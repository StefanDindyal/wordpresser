<?php
/*
  Plugin Name: RG Home Music
  Description: A plugin that create a custom post type displaying music information on the home page.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */
add_action( 'init', 'rg_register_music', 0 );
function rg_register_music() {
    $labels = array(
		'name' => __( 'Music', 'rg-music' ),
		'singular_name' => __( 'Music', 'rg-music' ),
		'add_new' => __( 'Add New Music', 'rg-music' ),
		'add_new_item' => __( 'Add New Music', 'rg-music' ),
		'edit_item' => __( 'Edit Music', 'rg-music' ),
		'new_item' => __( 'New Music Post Item', 'rg-music' ),
		'view_item' => __( 'View Music', 'rg-music' ),
		'search_items' => __( 'Search Music', 'rg-music' ),
		'not_found' => __( 'Nothing found', 'rg-music' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'rg-music' ),
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
		  'rewrite' => array( 'slug' => 'music' ), // changes name in permalink structure
		  'menu_icon' => get_template_directory_uri().'/inc/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'thumbnail' ),
    );
    register_post_type( 'music', $args ); // adds your $args array from above    
	$prefix = 'pf_';
	$music_options = array(
		array(
			'label' => 'Player URL',
			'desc' => "The URL for the playlist or track you wish to add.",
			'id' => $prefix . 'music_url',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Packshot',
			'desc' => "The URL for the packshot link.",
			'id' => $prefix . 'pack_url',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Official Store',
			'desc' => "The URL for the Official Store buy option.",
			'id' => $prefix . 'store_url',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'iTunes',
			'desc' => "The URL for an iTunes buy option.",
			'id' => $prefix . 'itunes_url',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Amazon',
			'desc' => "The URL for an Amazon buy option.",
			'id' => $prefix . 'amazon_url',
			'std' => '',
			'type' => 'text' // text area
		)
	);
	$music_options_box = new custom_add_meta_box( 'music', 'Music Options', $music_options, 'music', true );	
}