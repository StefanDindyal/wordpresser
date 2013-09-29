<?php
if (!function_exists('tfuse_media')) :
    /**
     * Display post media.
     *
     * To override tfuse_media() in a child theme, add your own tfuse_media()
     * to your child theme's file.
     */
    function tfuse_media($return=false)
    {
        global $post;

        $tfuse_media['img_position'] = $tfuse_media['image'] = $tfuse_image = $tf_media_add_space = $output = '';
        $tfuse_media['img_dimensions'] = array();
        $tfuse_media['disable_listing_lightbox'] = tfuse_options('disable_listing_lightbox');
        $tfuse_media['disable_single_lightbox'] = tfuse_options('disable_single_lightbox');

        if (is_singular() )
        {
            $tfuse_media['video_link']              = tfuse_page_options('video_link');
            $tfuse_media['disable_video']           = tfuse_page_options('disable_video',tfuse_options('disable_video'));
            $tfuse_media['disable_image']           = tfuse_page_options('disable_image',tfuse_options('disable_image'));

            if ( !$tfuse_media['disable_image'] )
            {
                $tfuse_media['image']               = tfuse_page_options('single_image','');
                $tfuse_media['img_dimensions']      = tfuse_page_options('single_img_dimensions',tfuse_options('single_img_dimensions'));
                $tfuse_media['img_position']        = tfuse_page_options('single_img_position',tfuse_options('single_img_position'));
            }

            if ( !empty($tfuse_media['video_link'] ) && !$tfuse_media['disable_video'] )
            {
                $tfuse_media['video_dimensions']    = tfuse_page_options('video_dimensions',tfuse_options('video_dimensions'));
                $tfuse_media['video_position']      = tfuse_page_options('video_position',tfuse_options('video_position'));
                //if you have video and photo put  class that separety  video from photo clasa tf_media_add_space
                if ( !empty($tfuse_media['image']) ) $tf_media_add_space = ' tf_media_add_space';

                $output .= '<div class="video_embed '.$tfuse_media['video_position'].'" style="width:'.$tfuse_media['video_dimensions'][0].'px">';
                $video = new TF_GET_EMBED();
                $output .= $video->width($tfuse_media['video_dimensions'][0])->height($tfuse_media['video_dimensions'][1])->source('video_link')->get();        //$output .= tfuse_get_embed($tfuse_media['media_width'], $tfuse_media['media_height'], PREFIX . "_post_video");
                $output .= '</div><!--/.video_embed  -->';
            }
        }
        elseif ( !is_singular() )
        {
            $tfuse_media['image']               = tfuse_page_options('thumbnail_image');
            $tfuse_media['img_dimensions']      = tfuse_page_options('thumbnail_dimensions',tfuse_options('thumbnail_dimensions'));
            $tfuse_media['img_position']        = tfuse_page_options('thumbnail_position',tfuse_options('thumbnail_position'));
        }

        if (is_tax()){
            if ( !empty($tfuse_media['image']) )
            {
                $image = new TF_GET_IMAGE();
                $tfuse_image = $image->width($tfuse_media['img_dimensions'][0])->height($tfuse_media['img_dimensions'][1])->
                    properties(array('style'=>$tfuse_media['img_position'].$tf_media_add_space))->src($tfuse_media['image'])->get_img();

            }

        }elseif ( !empty($tfuse_media['image']) )
        {
            $image = new TF_GET_IMAGE();
            $tfuse_image = $image->width($tfuse_media['img_dimensions'][0])->height($tfuse_media['img_dimensions'][1])->
                properties(array('class'=>'frame_box '.$tfuse_media['img_position'].$tf_media_add_space))->src($tfuse_media['image'])->get_img();
        }

        if (  ( (!is_singular() && !$tfuse_media['disable_listing_lightbox']) || (is_singular() && !$tfuse_media['disable_single_lightbox']) ) && !empty($tfuse_image) )
        {
            $attachments = get_children( array('post_parent' => $post->ID, 'numberposts' => -1, 'post_type' => 'attachment', 'post_mime_type' => 'image') );
            if( !empty($attachments) )
            {
                foreach ($attachments as $att_id => $attachment)
                {
                    $tfuse_src = wp_get_attachment_image_src($att_id, 'full', true);
                    $tfuse_image_link_attach = $tfuse_src[0];

                    $output .= '<a href="'. $tfuse_image_link_attach.'" rel="prettyPhoto[gallery'.$post->ID.']"></a>';
                }
            }
            if ( !empty($tfuse_media['post_video']) ) $output .= '<a href="'. $tfuse_media['post_video'].'" rel="prettyPhoto[gallery'.$post->ID.']">'.$tfuse_image.'</a>';
            $output .='<span class="'.$tfuse_media['img_position'].' preload">';





            $output .= '<a href="'.$tfuse_media['image'].'" rel="prettyPhoto[gallery'.$post->ID.']">'.$tfuse_image.'</a>';
            $output .="</span>";
        }
        else
            $output .= '<a href="'.get_permalink($post->ID).'">'.$tfuse_image.'</a>';

        if( $return )
            return $output;
        else
            echo $output;
    }
endif;



