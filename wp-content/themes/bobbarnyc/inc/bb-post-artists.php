<?php
add_action( 'init', 'kc_artists', 0 );
function kc_artists() {
    $labels = array(
		'name' => __( 'Artists', 'bb-artists' ),
		'singular_name' => __( 'Artist', 'bb-artists' ),
		'add_new' => __( 'Add New Artist', 'bb-artists' ),
		'add_new_item' => __( 'Add New Artist', 'bb-artists' ),
		'edit_item' => __( 'Edit Artist', 'bb-artists' ),
		'new_item' => __( 'New Artist Post Item', 'bb-artists' ),
		'view_item' => __( 'View Artist', 'bb-artists' ),
		'search_items' => __( 'Search Artists', 'bb-artists' ),
		'not_found' => __( 'Nothing found', 'bb-artists' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'bb-artists' ),
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
		  'rewrite' => array( 'slug' => 'artists' ), // changes name in permalink structure
		  // 'menu_icon' => get_template_directory_uri().'/inc/criton-options/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'editor' ),
    );
    register_post_type( 'artists', $args ); // adds your $args array from above       
}