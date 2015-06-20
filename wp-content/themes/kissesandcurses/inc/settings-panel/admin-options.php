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
		 	'id'	=> $prefix.'kc_options',
		 	'type'	=> 'section',
		 	'label' => __( 'General Options', KC_LOCALE )
		)
	);
}
?>