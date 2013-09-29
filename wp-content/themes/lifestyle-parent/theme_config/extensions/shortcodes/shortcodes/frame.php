<?php

/**
 * Image Frames
 *
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 */

function tfuse_frame($atts, $content = null)
{
    extract(shortcode_atts(array('link' => '', 'target' => '_self', 'width' => '',
        'height' => '', 'alt' => '', 'align' => '', 'src' => '', 'prettyphoto' => ''), $atts));
    if($link){$link = ' href="'.$link.'"';}else{$link = "";}

    if ($prettyphoto == 'true')
        return '<p><span class="frame_' . $align . ' preload"><a ' . $link . ' target="' . $target . '" rel="prettyPhoto" '. $link .' ><img src="' . $src . '"  width="' . $width . '" height="' . $height . '" alt="' . $alt . '" /></a></span></p>';
    else
        return '<p><a ' . $link . ' target="' . $target . '" '.$link .' ><img src="' . $src . '"  width="' . $width . '" height="' . $height . '" alt="' . $alt . '" class="frame_' . $align . '" /></a></p>';
}

$atts = array(
    'name' => 'Image Frame',
    'desc' => 'Here comes some lorem ipsum description for this shortcode.',
    'category' => 1,
    'options' => array(
        array(
            'name' => 'Source',
            'desc' => 'Specifies the URL of an image',
            'id' => 'tf_shc_frame_src',
            'value' => 'http://themefuse.com/banners/125x125.png',
            'type' => 'text'
        ),
        array(
            'name' => 'Link',
            'desc' => 'Specifies the URL of the page the link goes to',
            'id' => 'tf_shc_frame_link',
            'value' => 'http://themefuse.com?iframe=true&width=100%&height=100%',
            'type' => 'text'
        ),
        array(
            'name' => 'Target',
            'desc' => 'Specifies where to open the linked shortcode',
            'id' => 'tf_shc_frame_target',
            'value' => '',
            'options' => array(
                '_self' => 'In the same frame as it was clicked',
                '_blank' => 'In a new window or tab',
                '_parent' => 'In the parent frame',
                '_top' => 'In the full body of the window',
            ),
            'type' => 'select'
        ),
        array(
            'name' => 'Width',
            'desc' => 'Specifies the width of an image',
            'id' => 'tf_shc_frame_width',
            'value' => '125',
            'type' => 'text'
        ),
        array(
            'name' => 'Height',
            'desc' => 'Specifies the height of an image',
            'id' => 'tf_shc_frame_height',
            'value' => '125',
            'type' => 'text'
        ),
        array(
            'name' => 'Alt',
            'desc' => 'Specifies an alternate text for an image',
            'id' => 'tf_shc_frame_alt',
            'value' => 'Premium Wordpress Themes',
            'type' => 'text'
        ),
        array(
            'name' => 'Align',
            'desc' => 'Select image align ,by default is (center)',
            'id' => 'tf_shc_frame_align',
            'value' => '',
            'options' => array(
                'center' => 'Align center',
                'left' => 'Align left',
                'right' => 'Align right',
            ),
            'type' => 'select'
        ),
        array(
            'name' => 'prettyPhoto',
            'desc' => 'Open image with prettyphoto',
            'id' => 'tf_shc_frame_prettyphoto',
            'value' => '',
            'type' => 'checkbox'
        )
    )
);

tf_add_shortcode('frame', 'tfuse_frame', $atts);
