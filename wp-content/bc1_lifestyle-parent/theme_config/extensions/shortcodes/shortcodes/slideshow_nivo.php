<?php
/**
 * Slide Show Nivo
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

function tfuse_nivo_slideshow($atts, $content = null) {
    //extract short code attr
    extract(shortcode_atts(array(
        'width' => 400,
        'height' => 300,
        'effect' => 'sliceDown',
        'pausetime' => '',
    ), $atts));

    $content = trim($content);
    $image_arr = preg_split("/(\r?\n)/", $content);

    $rand_id = mt_rand();
    $return_html = '<div class="nivo_border" style="width:'.$width.'px;height:'.$height.'px;"><div id="'.$rand_id.'" class="nivoslide" style="width:'.$width.'px;height:'.$height.'px; visibility: hidden">';

    if(!empty($image_arr) && is_array($image_arr))
    {
        foreach($image_arr as $image)
        {
            $image = trim(strip_tags($image));

            if(!empty($image))
            {$getimage = new TF_GET_IMAGE();
                $img = $getimage->width($width)->height($height)->src($image)->get_img();
                $return_html.= $img;
            }
        }
    }

    $return_html.= '</div></div><br class="clear"/>';
    if ($pausetime != '' ) {} else $pausetime = 5;
    $return_html.= "<script>jQuery(window).load(function() { jQuery('#".$rand_id."').nivoSlider({ pauseTime: ".intval($pausetime*1000).", pauseOnHover: true, effect: '".$effect."', controlNav: true, captionOpacity: 1, directionNavHide: false, controlNavThumbs: true, controlNavThumbsFromRel:false, afterLoad: function(){
		jQuery('#".$rand_id."').css('visibility', 'visible');
	} }); });</script>";

    return $return_html;
}

$atts = array(
    'name' => 'Slideshow Nivo',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 6,
    'options' => array(
        array(
            'name' => 'Width',
            'desc' => 'Specifies the width of an slideshow text',
            'id' => 'tf_shc_nivo_slideshow_width',
            'value' => '400',
            'type' => 'text'
        ),
        array(
            'name' => 'Height',
            'desc' => 'Specifies the height of an slideshow text',
            'id' => 'tf_shc_nivo_slideshow_height',
            'value' => '300',
            'type' => 'text'
        ),
        /* add the fllowing option in case shortcode has content */
        array(
            'name' => 'Content',
            'desc' => 'Specifies the text of the shortcode',
            'id' => 'tf_shc_nivo_slideshow_content',
            'value' => '',
            'type' => 'textarea'
        )
    )
);

tf_add_shortcode('nivo_slideshow', 'tfuse_nivo_slideshow', $atts);

