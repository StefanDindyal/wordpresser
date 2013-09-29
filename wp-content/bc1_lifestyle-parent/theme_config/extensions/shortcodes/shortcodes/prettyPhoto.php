<?php

/**
 * prettyPhoto
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * title:
 * link:
 * type: link/button
 * gallery:
 * style:
 * class:
 * 
 * http://www.no-margin-for-errors.com/projects/prettyphoto-jquery-lightbox-clone/
 */

function tfuse_prettyPhoto($atts, $content = null)
{
    extract(shortcode_atts(array('title' => '',	'link' => '', 'type' => 'link', 'gallery' => '', 'style' => '', 'class' => '','link_color'=>'#000000'), $atts));

    if (empty($gallery))
        $gallery = 'p_' . rand(1, 1000);
    if (!empty($style))
        $style = 'style="' . $style . '"';

    if ( $type == 'button' )
        return '<a href="' . $link . '" class="button_link  prettyPhoto ' . $class . '" rel="prettyPhoto[' . $gallery . ']"  style="color:'.$link_color.'" title="' . $title . '"><span>' . $content . '</span></a>';
    else
        return '<a href="' . $link . '" class="' . $class . ' prettyPhoto" ' . $style . ' rel="prettyPhoto[' . $gallery . ']" style="color:'.$link_color.'"  title="' . $title . '" >' . $content . '</a>';
}

$atts = array(
    'name' => 'PrettyPhoto',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 5,
    'options' => array(
        array(
            'name' => 'Type',
            'desc' => 'Specify the type for an shortcode',
            'id' => 'tf_shc_prettyPhoto_type',
            'value' => 'link',
            'options' => array(
                'link' => 'Link',
                'button' => 'Button'
            ),
            'type' => 'select'
        ),
        array(
            'name' => 'Title',
            'desc' => 'Specifies the title',
            'id' => 'tf_shc_prettyPhoto_title',
            'value' => '',
            'type' => 'text'
        ),
        array(
            'name' => 'Gallery',
            'desc' => 'Specify the name, if you want display images in gallery prettyPhoto',
            'id' => 'tf_shc_prettyPhoto_gallery',
            'value' => '',
            'type' => 'text'
        ),
        array(
            'name' => 'Style',
            'desc' => 'Specify an inline style for an shortcode',
            'id' => 'tf_shc_prettyPhoto_style',
            'value' => '',
            'type' => 'text'
        ),
        array(
            'name' => 'Link',
            'desc' => 'Specifies the URL of an image',
            'id' => 'tf_shc_prettyPhoto_link',
            'value' => '',
            'type' => 'text',
            'divider'=> true
        ),
        array(
            'name' => 'Link Color',
            'desc' => 'Specify link color',
            'id' => 'tf_shc_prettyPhoto_link_color',
            'value' => '#000000',
            'type' => 'colorpicker',
            'divider'=> true
        ),
        array(
            'name' => 'Class',
            'desc' => 'Specifies button class',
            'id' => 'tf_shc_prettyPhoto_class',
            'value' => '',
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
            'type' => 'select',
            'divider'=> true
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'Enter prettyPhoto Content',
            'id' => 'tf_shc_prettyPhoto_content',
            'value' => 'Open image with prettyPhoto',
            'type' => 'text'
        )
    )
);

tf_add_shortcode('prettyPhoto', 'tfuse_prettyPhoto', $atts);
