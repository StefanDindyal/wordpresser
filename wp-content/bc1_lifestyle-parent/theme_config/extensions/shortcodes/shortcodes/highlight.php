<?php

/**
 * HighLight
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * class: custom css class e.g. highlight_yellow, highlight_brown, highlight_blue, highlight_black, highlight_purple
 * style: custom css style e.g. color:#ffffff; background:#cc1d00
 */
function tfuse_highlight($atts, $content) {
    extract(shortcode_atts(array('class' => '', 'style' => '','text_color' => '', 'bg_color' =>'',), $atts));
    if(!empty($class))
    {
        $class = 'class="' . $class . '"';
        if(!empty($text_color))
        { $style = 'style="cursor:pointer; color:'.$text_color.';" ';}
        else
        { $style = '';}
    }
    else
    {
        if ( !empty($bg_color)&&!empty($text_color)){
            $class = '';
            $style = 'style="cursor:pointer; background:'.$bg_color.';color:'.$text_color.';" ';
        }
        else
        {
            if(!empty($bg_color))

            {$style = 'style="cursor:pointer; background:'.$bg_color.';" ';}
            if(!empty($text_color))

            { $style = 'style="cursor:pointer; color:'.$text_color.';" ';}
        }
    }
    return '<span '. $class . $style . '>' . strip_tags($content) . '</span>';
}

$atts = array(
    'name' => 'Highlight',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 9,
    'before_preview' => 'Lorem Ipsum is simply ',
    'after_preview' => '. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',
    'options' => array(
        array(
            'name' => 'Class',
            'desc' => 'Specify classes of the shortcode ',
            'id' => 'tf_shc_highlight_class',
            'value' => '',
            'options' => array(
                ''=>'Select',
                'highlight_yellow' => 'Yellow',
                'highlight_brown' => 'Brown',
                'highlight_blue' => 'Blue',
                'highlight_black' => 'Black',
                'highlight_purple' => 'Purple',
                'highlight_red' => 'Red',
                'highlight_gray' => 'Gray'
            ),


            'type' => 'select'
        ),
         array(
            'name' => 'Background color',
            'desc' => 'Specify an background color for the shortcode',
            'id' => 'tf_shc_highlight_bg_color',
            'value' => '#fcff00',
            'type' => 'colorpicker'
        ),
        array(
            'name' => 'Text color',
            'desc' => 'Specify an text color for the shortcode',
            'id' => 'tf_shc_highlight_text_color',
            'value' => '#000000',
            'type' => 'colorpicker'
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'Enter shortcode content',
            'id' => 'tf_shc_highlight_content',
            'value' => 'text of the printing',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('highlight', 'tfuse_highlight', $atts);
