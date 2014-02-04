<?php
/*
  Plugin Name: RG Home clients
  Description: A plugin that create a custom post type displaying clients information on the home page.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */
add_action( 'init', 'register_clients', 0 );
function register_clients() {
    $labels = array(
		'name' => __( 'Clients', 'dgs-clients' ),
		'singular_name' => __( 'Client', 'dgs-clients' ),
		'add_new' => __( 'Add New Client', 'dgs-clients' ),
		'add_new_item' => __( 'Add New Client', 'dgs-clients' ),
		'edit_item' => __( 'Edit Clients', 'dgs-clients' ),
		'new_item' => __( 'New Clients Post Item', 'dgs-clients' ),
		'view_item' => __( 'View Clients', 'dgs-clients' ),
		'search_items' => __( 'Search Clients', 'dgs-clients' ),
		'not_found' => __( 'Nothing found', 'dgs-clients' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'dgs-clients' ),
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
		  'rewrite' => array( 'slug' => 'clients' ), // changes name in permalink structure
		  'menu_icon' => get_template_directory_uri().'/inc/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( 'clients', $args ); // adds your $args array from above    
	$prefix = 'dgs_';
	$clients_options = array(
		array(
			'label' => 'Clients Official Site Name',
			'desc' => "Official Site Name. ie: myofficial.com or myofficial site",
			'id' => $prefix . 'clients_name',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Clients Official Site',
			'desc' => "Official Site URL.",
			'id' => $prefix . 'clients_url',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Clients Facebook',
			'desc' => "Facebook URL.",
			'id' => $prefix . 'clients_fb',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Clients Instagram',
			'desc' => "Instagram URL.",
			'id' => $prefix . 'clients_inst',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Clients Twitter',
			'desc' => "Twitter URL.",
			'id' => $prefix . 'clients_twtr',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Clients YouTube',
			'desc' => "YouTube URL.",
			'id' => $prefix . 'clients_yt',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Clients Vevo',
			'desc' => "Vevo URL.",
			'id' => $prefix . 'clients_ve',
			'std' => '',
			'type' => 'text' // text area
		)
	);
	$clients_options_box = new custom_add_meta_box( 'home-clients', 'Client Options', $clients_options, 'clients', true );	
}