<?php
/*
Plugin Name: TinyMCE
Description: A shortcode.
Version: 1.0.1
Author: rGenerator
Author URI: http://www.rgenerator.com/
License: GPL v2.0
*/

function add_block_shortcode($shortcodeAttr, $content = null) {
        $shortcodeAttr = shortcode_atts( array(                 
                'itunes' => null,
                'amazon' => null,
                'jpc' => null,
                'musicload' => null,
                'clipfish' => null,
                'myvideo' => null,
                'ampya' => null,
                'vevo' => null,
                'youtube' => null,
                'googleplay' => null,
                'deezer' => null,
                'spotify' => null,
                'saturn' => null,
                'amazonmp3' => null,
                'mediamarkt' => null
        ), $shortcodeAttr);

        $itunes = $shortcodeAttr['itunes'];
        $amazon = $shortcodeAttr['amazon'];
        $jpc = $shortcodeAttr['jpc'];
        $musicload = $shortcodeAttr['musicload'];
        $clipfish = $shortcodeAttr['clipfish'];
        $myvideo = $shortcodeAttr['myvideo'];
        $ampya = $shortcodeAttr['ampya'];
        $vevo = $shortcodeAttr['vevo'];
        $youtube = $shortcodeAttr['youtube'];
        $googleplay = $shortcodeAttr['googleplay'];
        $deezer = $shortcodeAttr['deezer'];
        $spotify = $shortcodeAttr['spotify'];
        $saturn = $shortcodeAttr['saturn'];
        $amazonmp3 = $shortcodeAttr['amazonmp3'];
        $mediamarkt = $shortcodeAttr['mediamarkt'];

        if($itunes||$amazon||$jpc||$musicload||$clipfish||$myvideo||$ampya||$vevo||$youtube||$googleplay||$deezer||$spotify||$saturn||$amazonmp3||$mediamarkt){
            if($itunes){
                $buy1 = '<li><a class="itunes hidetext" target="_blank" href="'.$itunes.'">iTunes</a></li>';
            }
            if($amazon){
                $buy2 = '<li><a class="amazon hidetext" target="_blank" href="'.$amazon.'">Amazon</a></li>';
            }
            if($jpc){
                $buy3 = '<li><a class="jpc hidetext" target="_blank" href="'.$jpc.'">jpc</a></li>';
            }
            if($musicload){
                $buy4 = '<li><a class="musicload hidetext" target="_blank" href="'.$musicload.'">musicload</a></li>';
            }
            if($clipfish){
                $buy5 = '<li><a class="clipfish hidetext" target="_blank" href="'.$clipfish.'">clipfish</a></li>';
            }
            if($myvideo){
                $buy6 = '<li><a class="myvideo hidetext" target="_blank" href="'.$myvideo.'">myvideo</a></li>';
            }
            if($ampya){
                $buy7 = '<li><a class="ampya hidetext" target="_blank" href="'.$ampya.'">ampya</a></li>';
            }
            if($vevo){
                $buy8 = '<li><a class="vi hidetext" target="_blank" href="'.$vevo.'">vi</a></li>';
            }
            if($youtube){
                $buy9 = '<li><a class="youtube hidetext" target="_blank" href="'.$youtube.'">youtube</a></li>';
            }
            if($googleplay){
                $buy10 = '<li><a class="googleplay hidetext" target="_blank" href="'.$googleplay.'">googleplay</a></li>';
            }
            if($deezer){
                $buy11 = '<li><a class="deezer hidetext" target="_blank" href="'.$deezer.'">deezer</a></li>';
            }
            if($spotify){
                $buy12 = '<li><a class="spotify hidetext" target="_blank" href="'.$spotify.'">spotify</a></li>';
            }
            if($saturn){
                $buy13 = '<li><a class="saturn hidetext" target="_blank" href="'.$saturn.'">saturn</a></li>';
            }
            if($amazonmp3){
                $buy14 = '<li><a class="amazonmp3 hidetext" target="_blank" href="'.$amazonmp3.'">saturn</a></li>';
            }
            if($mediamarkt){
                $buy15 = '<li><a class="mediamarkt hidetext" target="_blank" href="'.$mediamarkt.'">saturn</a></li>';
            }
            $block = '<div class="ripper"><div class="ripped"><ul class="buy"><li><span>› Jetzt Kaufen:</span></li>'.$buy1.$buy2.$buy3.$buy4.$buy5.$buy6.$buy7.$buy8.$buy9.$buy10.$buy11.$buy12.$buy13.$buy14.$buy15.'</ul></div></div>';
            return $block;
        }else{
            return '';
        }
}

function add_table_shortcode( $atts, $content = null ) {
    $atts = shortcode_atts( array(
        'cells' => null
    ), $atts, 'table_shortcode');
    return '<span class="table-grid">' . $content . '</span>';
}

function rg_shortcode_button_init() {
    if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
         return;
    add_filter('mce_external_plugins', 'rg_register_tinymce_plugin'); 
    add_filter('mce_buttons', 'rg_add_tinymce_button');
    add_shortcode('block', 'add_block_shortcode');
    add_shortcode('table', 'add_table_shortcode');
}

//This callback registers our plug-in
function rg_register_tinymce_plugin($plugin_array) {
    $plugin_array['rg_tinymce_button'] = get_template_directory_uri().'/inc/admin-scripts.js';
    return $plugin_array;
}

//This callback adds our button to the toolbar
function rg_add_tinymce_button($buttons) {
    //$buttons[] = 'rg_block_button';
    array_push( $buttons, 'rg_block_button', 'rg_table_button' );
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