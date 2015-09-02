<?php
/*/////////////////////////////////////////////////////
	* Creates Admin Panel in dashboard settings page
	* Includes admin-panel.php
/////////////////////////////////////////////////////*/
add_action( 'init', '_bbAdminOptions' );

function _bbAdminOptions(){
    global $post_settings, $post_types_options, $plugins_options, $post_video_options, $bb_fields;
    
	if ( ! ( current_user_can( 'administrator' ) || current_user_can( 'developer' )) )
	    	return;
				
    require_once( BB_DIR . '/admin-panel.php' );
    	
    $prefix = 'bb_';

    $bb_fields = array(
		array(
		 	'id'	=> $prefix.'about_options',
		 	'type'	=> 'section',
		 	'label' => __( 'About Options', BB_LOCALE )
		),
		array(
			'desc'  => 'The title of the about section.',
		 	'id'	=> $prefix.'about_title',
		 	'type'	=> 'text',
		 	'label' => __( 'About Title', BB_LOCALE )
		),
		array(
			'desc'  => 'The about body text.',
		 	'id'	=> $prefix.'about_body',
		 	'type'	=> 'textarea',
		 	'label' => __( 'About Body', BB_LOCALE )
		),
		array(
			'label'	=> __( 'About Images', BB_LOCALE ),
			'desc'	=> 'Images that will appear in the about section.',
			'id'	=> $prefix.'about_images',
			'type'	=> 'repeatable',
			'repeatable_fields' => array(
				array(
			        'label' => 'Image',
			        'desc'  => 'Add an about image.',
			        'id'	  => $prefix.'about_image',
			        'type'  => 'image'
			    )
			)
		),		
		array(
		 	'id'	=> $prefix.'footer_options',
		 	'type'	=> 'section',
		 	'label' => __( 'Footer Options', BB_LOCALE )
		),
		array(
			'desc'  => 'Email where form posts will be directed to.',
		 	'id'	=> $prefix.'form_email',
		 	'type'	=> 'text',
		 	'label' => __( 'Form Email', BB_LOCALE )
		),
		array(
			'desc'  => 'Enter the url to your instagram account.',
		 	'id'	=> $prefix.'instagram_url',
		 	'type'	=> 'text',
		 	'label' => __( 'Instagram URL', BB_LOCALE )
		),
		array(
			'desc'  => 'Enter the url to your twitter account.',
		 	'id'	=> $prefix.'twitter_url',
		 	'type'	=> 'text',
		 	'label' => __( 'Twitter URL', BB_LOCALE )
		),
		array(
			'desc'  => 'Enter the url to your facebook account.',
		 	'id'	=> $prefix.'facebook_url',
		 	'type'	=> 'text',
		 	'label' => __( 'Facebook URL', BB_LOCALE )
		)		
	);
}
?>