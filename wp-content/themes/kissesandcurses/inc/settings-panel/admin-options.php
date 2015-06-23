<?php
/*/////////////////////////////////////////////////////
	* Creates Admin Panel in dashboard settings page
	* Includes admin-panel.php
/////////////////////////////////////////////////////*/
add_action( 'init', '_kcAdminOptions' );

function _kcAdminOptions(){
    global $post_settings, $post_types_options, $plugins_options, $post_video_options, $kc_fields;
    
	if ( ! ( current_user_can( 'administrator' ) || current_user_can( 'developer' )) )
	    	return;
				
    require_once( KC_DIR . '/admin-panel.php' );
    	
    $prefix = 'kc_';

    $kc_fields = array(
		array(
		 	'id'	=> $prefix.'options',
		 	'type'	=> 'section',
		 	'label' => __( 'Share Options', KC_LOCALE )
		),
		array(
			'desc'  => 'Short Tweet text that should include the sites url or shortlink if desired.',
		 	'id'	=> $prefix.'twitter_text',
		 	'type'	=> 'text',
		 	'label' => __( 'Twitter Share Text', KC_LOCALE )
		),
		array(
			'desc'  => 'The emails subject line when sharing.',
		 	'id'	=> $prefix.'email_subject',
		 	'type'	=> 'text',
		 	'label' => __( 'Email Subject Text', KC_LOCALE )
		),
		array(
			'desc'  => 'The emails body text when sharing.',
		 	'id'	=> $prefix.'email_body',
		 	'type'	=> 'text',
		 	'label' => __( 'Email Body Text', KC_LOCALE )
		)
	);
}
?>