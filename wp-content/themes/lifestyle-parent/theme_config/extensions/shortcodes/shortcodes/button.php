<?php

/**
 * Buttons
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * style: custom css style
 * link: the destination of a link e.g. http://themefuse.com/
 * class: css class
 * target: _blank, _self, _parent, _top 
 */

function tfuse_button($atts, $content = null)
{
    extract( shortcode_atts(array('style' => '', 'link' => '#', 'class' => '','c_class' => '', 'target' => '_self'), $atts) );
    if ( !empty($c_class)){
        $class = 'button_link ' . $c_class;
        $style = 'style="cursor:pointer;" ';
    }else
    {
    if(!empty($class))
    {
        $class = 'button_link ' . $class;
        $style = 'style="cursor:pointer;" ';
    }


       }
           return '<a href="' . $link . '" class="' . $class . '"'.$style.' target="'.$target.'"><span>' . $content . '</span></a>';

}
$atts =

    array(
    'name' => 'Buttons',
    'desc' => 'Here comes some lorem ipsum description for the button shortcode.',
    'category' => 2,
    'options' => array(
        array(
            'name' => 'Class',
            'desc' => 'Select Class',
            'id' => 'tf_shc_button_class',
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
            'type' => 'select'
        ),
        array(
            'name' => 'Button Custom Style',
            'desc' => 'Specify button custom style, ex : btn_blue',
            'id' => 'tf_shc_button_c_class',
            'value' => '',
            'type' => 'Text'
        ),
        array(
            'name' => 'Link',
            'desc' => 'Specifies the URL of the page the link goes to',
            'id' => 'tf_shc_button_link',
            'value' => '#',
            'type' => 'text'
        ),
        array(
            'name' => 'Target',
            'desc' => 'Specifies where to open the linked shortcode',
            'id' => 'tf_shc_button_target',
            'value' => '_self',
            'options' => array(
                '_blank' => 'Opens the link in a new window or tab',
                '_parent' => 'Opens the link in the parent frame',
                '_self' => 'Opens the link in the same frame as it was clicked (this is default)',
                '_top' => 'Opens the link in the full body of the window',
            ),
            'type' => 'select'
        ),

        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'Enter shortcode content',
            'id' => 'tf_shc_button_content',
            'value' => 'button',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('button', 'tfuse_button', $atts);
