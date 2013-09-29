<?php

/**
 * Boxes
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * type: info, note, download, warrning or custom css classes e.g. download box_border
 * color: color name or hexadecimal color code e.g. blue, #dbecf8
 * style: custom css style
 */
function tfuse_box($atts, $content = null) {
    extract(shortcode_atts(array('type' => '', 'style' => '', 'color' => ''), $atts));
    return '<div class="box '.$type.' border ' . $color . '">' . do_shortcode($content) . '</div>';
}

$atts = array(
    'name' => 'Box',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 7,
    'options' => array(
        array(
            'name' => 'Type',
            'desc' => 'Select column type',
            'id' => 'tf_shc_box_type',
            'value' => '_self',
            'options' => array(
                '' => 'Select Stile',
                'download_box' => 'Download Box',
                'warrning_box' => 'Warrning Box',
                'note_box' => 'Note Box',
                'info_box' => 'Info Box'
            ),
            'type' => 'select'
        ),
        array(
            'name' => 'Color',
            'desc' => 'Select column color',
            'id' => 'tf_shc_box_color',
            'value' => '_self',
            'options' => array(
                'btn_dark_gray' => 'Dark Gray Button',
                'btn_orange' => 'Orange Button',
                'btn_green' => 'Green Button',
                'btn_blue' => 'Nautic Blue Button',
                'btn_red' => 'Red Button',
                'btn_cyan' => 'Cyan Button',
                'btn_yellow' => 'Yellow Button',
                'btn_violet' => 'Violet Button'
            ),
            'type' => 'select'
        ),

        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'Enter shortcode content',
            'id' => 'tf_shc_box_content',
            'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('box', 'tfuse_box', $atts);
