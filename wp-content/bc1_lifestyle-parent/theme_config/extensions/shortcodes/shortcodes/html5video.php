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
function tfuse_html5video($atts) {
    extract(shortcode_atts(array(
        'width' => '',
        'height' => '',
        'poster' => '',
        'url' => '',
        'webm' => '',
        'ogg' => '',), $atts));
    return '

    <div class="video-js-box vim-css">
    <video id="example_video_1" class="video-js" width="'.$width.'" height="'.$height.'" controls="controls" preload="auto" poster="'.$poster.'">
      <source src="'.$url.'" type=\'video/mp4; codecs="avc1.42E01E, mp4a.40.2"\' />
      <source src="'.$webm.'" type=\'video/webm; codecs="vp8, vorbis"\' />
      <source src="'.$ogg.'" type=\'video/ogg; codecs="theora, vorbis"\' />
      <object id="flash_fallback_1" class="vjs-flash-fallback" width="'.$width.'" height="'.$height.'" type="application/x-shockwave-flash"
        data="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf">
        <param name="movie" value="http://releases.flowplayer.org/swf/flowplayer-3.2.1.swf" />
        <param name="allowfullscreen" value="true" />
        <param name="flashvars" value=\'config={"playlist":["'.$poster.'", {"url": "'.$url.'","autoPlay":false,"autoBuffering":true}]}\' />
        <img src="'.$poster.'" width="640" height="264" alt="Poster Image"
          title="No video playback capabilities." />
      </object>
    </video>
  </div>';


}

$atts = array(
    'name' => 'Html 5 Video',
    'desc' => 'Html 5 Video Player shortcode.',
    'category' => 7,
    'options' => array(

        array(
            'name' => 'Vide URL',
            'desc' => 'Enter shortcode Video URL',
            'id' => 'tf_shc_html5video_url',
            'value' => 'http://video-js.zencoder.com/oceans-clip.mp4',
            'type' => 'text'
        ),
        array(
            'name' => 'Video Width',
            'desc' => 'Enter shortcode Video Width',
            'id' => 'tf_shc_html5video_width',
            'value' => '560',
            'type' => 'text'
        ),
        array(
            'name' => 'Video Height',
            'desc' => 'Enter shortcode Video Height',
            'id' => 'tf_shc_html5video_height',
            'value' => '350',
            'type' => 'text'
        ),
        array(
            'name' => 'Poster',
            'desc' => 'Enter shortcode Video Poster',
            'id' => 'tf_shc_html5video_poster',
            'value' => 'http://video-js.zencoder.com/oceans-clip.png" ',
            'type' => 'text'
        ),
        array(
            'name' => 'Webm',
            'desc' => 'Enter shortcode Video Webm , this is the default webm',
            'id' => 'tf_shc_html5video_webm',
            'value' => 'http://video-js.zencoder.com/oceans-clip.webm',
            'type' => 'text'
        ),
        array(
            'name' => 'ogg',
            'desc' => 'Enter shortcode Video ogg , this is the default ogg',
            'id' => 'tf_shc_html5video_ogg',
            'value' => 'http://video-js.zencoder.com/oceans-clip.ogg',
            'type' => 'text'
        ),
    )
);

tf_add_shortcode('html5video', 'tfuse_html5video', $atts);


function tfuse_youtube($atts)
{

    extract(shortcode_atts(array('url' => '','width' => '', 'height' => ''	,), $atts));
    $video_id = substr($url,31,11);
    return '
<div>
    <object type="application/x-shockwave-flash" data="http://www.youtube.com/v/'.$video_id.'&hd=1" style="width:'.$width.'px;height:'.$height.'px">
        <param name="wmode" value="opaque"><param name="movie" value="http://www.youtube.com/v/'.$video_id.'&hd=1" />
    </object>
  </div>';


}
    $atts = array(
        'name' => 'Youtube Video',
        'desc' => 'Youtube Video Player shortcode.',
        'category' => 7,
        'options' => array(

            array(
                'name' => 'Vide URL',
                'desc' => 'Enter shortcode Video URL',
                'id' => 'tf_shc_youtube_url',
                'value' => 'http://www.youtube.com/watch?v=5yB1XPzFzjk',
                'type' => 'text'
            ),
            array(
                'name' => 'Video Width',
                'desc' => 'Enter shortcode Video Width',
                'id' => 'tf_shc_youtube_width',
                'value' => '560',
                'type' => 'text'
            ),
            array(
                'name' => 'Video Height',
                'desc' => 'Enter shortcode Video Height',
                'id' => 'tf_shc_youtube_height',
                'value' => '350',
                'type' => 'text'
            )

        )
    );
tf_add_shortcode('youtube', 'tfuse_youtube', $atts);




function tfuse_vimeo($atts) {


extract(shortcode_atts(array('url' => '','width' => '', 'height' => ''	,), $atts));
$video_id = substr($url,17,8);
return '<object width="'.$width.'" height="'.$height.'"><param name="allowfullscreen" value="true" /><param name="wmode" value="opaque"><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" /><embed src="http://vimeo.com/moogaloop.swf?clip_id='.$video_id.'&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=00ADEF&amp;fullscreen=1" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" width="'.$width.'" height="'.$height.'" wmode="transparent"></embed></object>';


}
$atts = array(
    'name' => 'Vimeo Video',
    'desc' => 'Vimeo Video Player shortcode.',
    'category' => 7,
    'options' => array(

        array(
            'name' => 'Vide URL',
            'desc' => 'Enter shortcode Video URL',
            'id' => 'tf_shc_vimeo_url',
            'value' => 'http://vimeo.com/16919307',
            'type' => 'text'
        ),
        array(
            'name' => 'Video Width',
            'desc' => 'Enter shortcode Video Width',
            'id' => 'tf_shc_vimeo_width',
            'value' => '560',
            'type' => 'text'
        ),
        array(
            'name' => 'Video Height',
            'desc' => 'Enter shortcode Video Height',
            'id' => 'tf_shc_vimeo_height',
            'value' => '350',
            'type' => 'text'
        )

    )
);


tf_add_shortcode('vimeo', 'tfuse_vimeo', $atts);