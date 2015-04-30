<?php
/*
  Plugin Name: RG Home Videos
  Description: A plugin that create a custom post type displaying videos information on the home page.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */
add_action( 'init', 'rg_register_videos', 0 );
function rg_register_videos() {
    $labels = array(
		'name' => __( 'Videos', 'rg-videos' ),
		'singular_name' => __( 'videos', 'rg-videos' ),
		'add_new' => __( 'Add New Video', 'rg-videos' ),
		'add_new_item' => __( 'Add New Video', 'rg-videos' ),
		'edit_item' => __( 'Edit videos', 'rg-videos' ),
		'new_item' => __( 'New Videos Post Item', 'rg-videos' ),
		'view_item' => __( 'View Videos', 'rg-videos' ),
		'search_items' => __( 'Search Videos', 'rg-videos' ),
		'not_found' => __( 'Nothing found', 'rg-videos' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'rg-videos' ),
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
		  'rewrite' => array( 'slug' => 'videos' ), // changes name in permalink structure
		  'menu_icon' => get_template_directory_uri().'/inc/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'thumbnail' ),
    );
    register_post_type( 'videos', $args ); // adds your $args array from above    
	$prefix = 'pf_';
	$videos_options = array(
		array(
			'label' => 'Video URL',
			'desc' => "The URL for the video you wish to add. Supports(YouTube/Vimeo/VEVO)",
			'id' => $prefix . 'video_url',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Feature this Video',
			'desc' => "Make this video featured.",
			'id' => $prefix . 'featured',
			'std' => '',
			'type' => 'checkbox' // text area
		)
	);
	$videos_options_box = new custom_add_meta_box( 'videos', 'Video Options', $videos_options, 'videos', true );	
}