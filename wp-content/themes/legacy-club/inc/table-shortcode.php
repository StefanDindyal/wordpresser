<?php
/*
Plugin Name: TinyMCE
Description: A shortcode.
Version: 1.0.1
Author: rGenerator
Author URI: http://www.rgenerator.com/
License: GPL v2.0
*/

function table_shortcode( $atts, $content = null ) {
    return '<div class="table-grid">' . $content . '</div>';
}
add_shortcode( 'table', 'table_shortcode' );

function rg_shortcode_button_init() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
         return;
    add_filter('mce_external_plugins', 'rg_register_tinymce_plugin'); 
    add_filter('mce_buttons', 'rg_add_tinymce_button');
}

//This callback registers our plug-in
function rg_register_tinymce_plugin($plugin_array) {
    $plugin_array['rg_tinymce_button'] = get_template_directory_uri().'/inc/admin-scripts.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function rg_add_tinymce_button($buttons) {
    //$buttons[] = 'rg_block_button';
    array_push( $buttons, 'rg_table_button' );
    return $buttons;
}

function rg_refresh_mce($ver) {
  $ver += 3;
  return $ver;
}

// init process for registering our button
add_action('init', 'rg_shortcode_button_init');
add_filter( 'tiny_mce_version', 'rg_refresh_mce');
 
?>