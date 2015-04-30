<?php
/*
  Plugin Name: RG Home Slider
  Description: A plugin that create a custom post type displaying slider information on the home page.
  Version: 1
  Author: RGNRTR Custom Team
  License: GPLv2
 */
add_action( 'init', 'rg_register_slider', 0 );
function rg_register_slider() {
    $labels = array(
		'name' => __( 'Home Slider', 'rg-slider' ),
		'singular_name' => __( 'slider', 'rg-slider' ),
		'add_new' => __( 'Add New Slide', 'rg-slider' ),
		'add_new_item' => __( 'Add New Slide', 'rg-slider' ),
		'edit_item' => __( 'Edit slider', 'rg-slider' ),
		'new_item' => __( 'New slider Post Item', 'rg-slider' ),
		'view_item' => __( 'View slider', 'rg-slider' ),
		'search_items' => __( 'Search slider', 'rg-slider' ),
		'not_found' => __( 'Nothing found', 'rg-slider' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'rg-slider' ),
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
		  'supports' => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( 'slider', $args ); // adds your $args array from above    
	$prefix = 'rgs_';
	$slider_options = array(
		array(
			'label' => 'Slider Subtext (Artists Name)',
			'desc' => "Text that appears below the main title.",
			'id' => $prefix . 'slider_subtext',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Slider URL',
			'desc' => "",
			'id' => $prefix . 'slider_url',
			'std' => '',
			'type' => 'text' // text area
		),		
		array(
			'label' => 'Slider Open',
			'desc' => "Check to have the slider link open in a new tab.",
			'id' => $prefix . 'target_blank',
			'std' => '',
			'type' => 'checkbox'
		)
	);
	$slider_options_box = new custom_add_meta_box( 'home-slider', 'Home Slider Options', $slider_options, 'slider', true );	
}
// ,
// 		array(
// 			'label' => 'Slider URL',
// 			'desc' => "The slide will link to this URL.",
// 			'id' => $prefix . 'slider_url',
// 			'std' => '',
// 			'type' => 'text' // text area
// 		)