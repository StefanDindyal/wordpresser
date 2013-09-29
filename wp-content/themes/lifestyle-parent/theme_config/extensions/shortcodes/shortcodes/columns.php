<?php

/**
 * Columns
 *
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 *
 * Optional arguments:
 * type: 1, 1_2, 1_3, 1_4, 2_3 etc.
 * class:

 */


function tfuse_col($atts, $content = null)
{
    extract(shortcode_atts(array('type' => '', 'class' => ''), $atts));
    if(!empty($class)){$class = " box border $class";}
    return '<div class="col  ' .$type.$class . ' "><div class="inner">' . do_shortcode($content) . '</div></div>';
}

$atts = array(
    'name' => 'Columns',
    'desc' => 'Here comes some lorem ipsum description for the button shortcode.',
    'category' => 4,
    'options' => array(
        array(
            'name' => 'Type',
            'desc' => 'Select column type',
            'id' => 'tf_shc_col_type',
            'value' => '_self',
            'options' => array(
                'col_1' =>'column 1',
                'col_1_2' =>'column 1/2',
                'col_1_3' =>'column 1/3',
                'col_1_4' =>'column 1/4',
                'col_1_5' =>'column 1/5',
                'col_1_6' =>'column 1/6',
                'col_1_7' =>'column 1/7',
                'col_1_12' =>'column 1/12',
                'col_2_3' =>'column 2/3',
                'col_2_5' =>'column 2/5',
                'col_3_4' =>'column 3/4',
                'col_3_5' =>'column 3/5',
                'col_3_8' =>'column 3/8',
                'col_4_5' =>'column 4/5',
                'col_5_6' =>'column 5/6',
                'col_5_8' =>'column 5/8',
            ),
            'type' => 'select'
        ),
        array(
            'name' => 'Class',
            'desc' => 'Select column color',
            'id' => 'tf_shc_col_class',
            'value' => '_self',
            'options' => array(
                '' => 'Transparent',
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
            'desc' => 'Enter shortcode content',
            'id' => 'tf_shc_col_content',
            'value' => 'Insert your text here',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('col', 'tfuse_col', $atts);
?>