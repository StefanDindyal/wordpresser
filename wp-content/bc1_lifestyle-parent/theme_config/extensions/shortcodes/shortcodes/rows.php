<?php

/**
 * Rows
 *
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 */

function tfuse_row_box($atts, $content = null)
{
    extract(shortcode_atts(array('class' => ''), $atts));

    return '<div class="box border ' . $class . '">' . do_shortcode($content) . '<div class="clear"></div></div>';

}

$atts = array(
    'name' => 'Row Box',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 7,
    'options' => array(
        array(
            'name' => 'Class',
            'desc' => 'Select   Row  color',
            'id' => 'tf_shc_row_box_class',
            'value' => '_self',
            'options' => array(
                'box_white' => 'white',
                'box_blue' => 'blue',
                'box_light_gray' => 'light gray',
                'box_gray' => 'gray',
                'box_green' => 'green',
                'box_yellow' => 'yellow',
                'box_pink' => 'pink'
            ),
            'type' => 'select'
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'The page templates need to be constructed on rows. <br />
                You need to use the [row] shortcode when you want your content to go on another row.',
            'id' => 'tf_shc_row_box_content',
            'value' => '',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('row_box', 'tfuse_row_box', $atts);

function tfuse_row($atts, $content = null)
{
    return '<div class="row">' . do_shortcode($content) . '</div>';
}

$atts = array(
    'name' => 'Row',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 7,
    'options' => array(
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'The page templates need to be constructed on rows. <br />
                You need to use the [row] shortcode when you want your content to go on another row.',
            'id' => 'tf_shc_row_content',
            'value' => '',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('row', 'tfuse_row', $atts);
