<?php

/**
 * style Boxes
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 *
 */
function tfuse_style_box($atts, $content = null) {
    extract(shortcode_atts(array('title' => '', 'color' => '#666666'), $atts));
    return '
    <div class="styled_box_title" style="background: -webkit-gradient(linear, left top, left bottom, from('.$color.'), to('.$color.'));background: -moz-linear-gradient(top,  '.$color.',  '.$color.');filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='.$color.', endColorstr='.$color.');border:1px solid '.$color.';color:#ffffff;width:;">'.$title.'</div>

        <div class="styled_box_content" style="border:1px solid '.$color.';border-top:0;">' . do_shortcode($content) . '</div>
    ';
}

$atts = array(
    'name' => 'Style Box',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 7,
    'options' => array(
         array(
            'name' => 'Color',
            'desc' => 'Select column color',
            'id' => 'tf_shc_style_box_color',
            'value' => '',
            'type' => 'colorpicker'
        ),

        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Title',
            'desc' => 'Enter shortcode title',
            'id' => 'tf_shc_style_box_title',
            'value' => '',
            'type' => 'text'
        )
    ,
        array(
            'name' => 'Content',
            'desc' => 'Enter shortcode content',
            'id' => 'tf_shc_style_box_content',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('style_box', 'tfuse_style_box', $atts);
