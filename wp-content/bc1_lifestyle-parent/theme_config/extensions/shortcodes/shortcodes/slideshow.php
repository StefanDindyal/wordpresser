<?php

/**
 * Slide Show
 *
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 *
 * Optional arguments:
 * width:
 * height:
 *
 * Slides documentation http://slidesjs.com/
 */

function tfuse_slideshow($atts, $content = null)
{

    //extract short code attr
    extract(shortcode_atts(array(
        'width' => 400,
        'height' => 300,
    ), $atts));

    $content = trim($content);
    $image_arr = preg_split("/(\r?\n)/", $content);

    $return_html = '<div class="slideshow" style="width:'.$width.'px;height:'.$height.'px"><div class="wrapper" style="width:'.$width.'px;height:'.intval($height+25).'px"><ul>';

    if(!empty($image_arr) && is_array($image_arr))
    {
        foreach($image_arr as $image)
        {
            $image = trim(strip_tags($image));

            if(!empty($image))
            { $getimage = new TF_GET_IMAGE();
                $img = $getimage->width($width)->height($height)->src($image)->get_img();
                $return_html.= '<li>';
                $return_html.= $img;
                $return_html.= '</li>'. PHP_EOL;
            }
        }
    }

    $return_html.= '</ul></div></div><br class="clear"/><br class="clear"/>';

    return $return_html;
}


$atts = array(
    'name' => 'Slideshow',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 6,
    'options' => array(
        array(
            'name' => 'Width',
            'desc' => 'Specifies the width of an slideshow',
            'id' => 'tf_shc_slideshow_width',
            'value' => '570',
            'type' => 'text'
        ),
        array(
            'name' => 'Height',
            'desc' => 'Specifies the height of an slideshow',
            'id' => 'tf_shc_slideshow_height',
            'value' => '270',
            'type' => 'text'
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Images',
            'desc' => 'Specifies the URLs of images of an shortcode, one per line.',
            'id' => 'tf_shc_slideshow_content',
            'value' => '',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('slideshow', 'tfuse_slideshow', $atts);



