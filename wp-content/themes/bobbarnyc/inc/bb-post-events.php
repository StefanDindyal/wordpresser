<?php
add_action( 'init', 'bb_events', 0 );
function bb_events() {
    $labels = array(
		'name' => __( 'Events', 'bb-events' ),
		'singular_name' => __( 'Event', 'bb-events' ),
		'add_new' => __( 'Add New Event', 'bb-events' ),
		'add_new_item' => __( 'Add New Event', 'bb-events' ),
		'edit_item' => __( 'Edit Character', 'bb-events' ),
		'new_item' => __( 'New Event Post Item', 'bb-events' ),
		'view_item' => __( 'View Event', 'bb-events' ),
		'search_items' => __( 'Search Events', 'bb-events' ),
		'not_found' => __( 'Nothing found', 'bb-events' ),
		'not_found_in_trash' => __( 'Nothing found in Trash', 'bb-events' ),
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
		  'rewrite' => array( 'slug' => 'events' ), // changes name in permalink structure
		  // 'menu_icon' => get_template_directory_uri().'/inc/criton-options/images/menu_icon.png',
		  'menu_position' => 4, // search WordPress Codex for menu_position parameters
		  'supports' => array( 'title', 'thumbnail' ),
    );
    register_post_type( 'events', $args ); // adds your $args array from above
    function bb_events_custom_columns( $columns ) {
		$columns = array(
			"cb" => "<input type=\"checkbox\" />",
			"title" => "Title",
			"characterimage" => "Character",
			"date" => "Date"
		);
		return $columns;
	}
	add_filter( 'manage_edit-character_columns', 'bb_events_custom_columns' );
    function bb_events_custom_column_content( $column ) {
		global $post;
		$image_src = wp_get_attachment_url( get_post_thumbnail_id( $post->ID ) );		
		if ( "ID" == $column ){
			echo $post->ID;
		} elseif ( "characterimage" == $column ) {
			if($image_src){
				echo "<img id='work-img' src='$image_src' style='max-width:100px;' />";
			}
		}
	}
	add_action( 'manage_posts_custom_column', 'bb_events_custom_column_content' );
    function bb_events_meta($current_screen){
		if ( 'events' == $current_screen->post_type && 'post' == $current_screen->base ) {
			$prefix = 'bb_';			
			$fields = array(
				array(
				    'label' => 'Soundcloud Stream URL',
				    'desc'  => 'Enter the track url from Soundcloud and click the button to get the stream url.',
				    'id'    => $prefix.'stream_url',			
				    'type'  => 'soundcloud'
				),
				array(
				    'label' => 'Event Date',
				    'desc'  => 'Select the date of the event.',
				    'id'    => $prefix.'event_date',			
				    'type'  => 'date',
				    'width' => '15%'
				),
				array(
				    'label' => 'Event Time Start',
				    'desc'  => 'Select the time of the events start.',
				    'id'    => $prefix.'event_time_start',			
				    'type'  => 'timepicker',
				    'width' => '10%'
				),
				array(
				    'label' => 'Event Time End',
				    'desc'  => 'Select the time of the events end.',
				    'id'    => $prefix.'event_time_end',			
				    'type'  => 'timepicker',
				    'width' => '10%'
				),
				array(
				    'label' => 'Music by',
				    'desc'  => 'Artist or artists names.',
				    'id'    => $prefix.'music_by',			
				    'type'  => 'text'
				),
				array(
				    'label' => 'Hosted by',
				    'desc'  => 'Host or hosts names.',
				    'id'    => $prefix.'hosted_by',			
				    'type'  => 'text'
				)			
			);
			$event_box = new custom_add_meta_box( 'event_box', 'Event Options', $fields, 'events', true );
		}
	}
	add_action( 'current_screen', 'bb_events_meta' );
}