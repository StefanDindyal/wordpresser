<?php
add_action( 'init', 'kc_story', 0 );
function kc_story() {
    $labels = array(
		'name' => __( 'Story', 'kc-story' ),
		'singular_name' => __( 'Story', 'kc-story' ),
		'add_new' => __( 'Add New Story', 'kc-story' ),
		'add_new_item' => __( 'Add New Story', 'kc-story' ),
		'edit_item' => __( 'Edit Story', 'kc-story' ),
		'new_item' => __( 'New Story Post Item', 'kc-story' ),
		'view_item' => __( 'View Story', 'kc-story' ),
		'search_items' => __( 'Search Story', 'kc-story' ),
		'not_found' => __( 'Nothing found', 'kc-story' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'kc-story' ),
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
		  'rewrite' => array( 'slug' => 'story' ), // changes name in permalink structure
		  // 'menu_icon' => get_template_directory_uri().'/inc/criton-options/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'editor', 'thumbnail' ),
    );
    register_post_type( 'story', $args ); // adds your $args array from above    
	$prefix = 'kc_';
	$story_options = array(
		array(
			'label' => 'Release Copy',
			'desc' => '',
			'id' => $prefix . 'released',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Spotify URI',
			'desc' => 'URI Copied from Spotify.',
			'id' => $prefix . 'album_uri',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'iTunes URL',
			'desc' => 'Full iTunes purchase URL.',
			'id' => $prefix . 'itunes',
			'std' => '',
			'type' => 'text' // text area
		),
		array(
			'label' => 'Bol.com URL',
			'desc' => 'Full Bol.com purchase URL.',
			'id' => $prefix . 'bol',
			'std' => '',
			'type' => 'text' // text area
		)
	);
	$story_box = new custom_add_meta_box( 'kc-story', 'Story Options', $story_options, 'story', true );
}