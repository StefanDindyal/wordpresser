<?php

if (!defined('TFUSE'))
    exit('Direct access forbidden.');

/**
 * Description of GET_IMAGE
 *
 */
class TF_GET_IMAGE {

    public $out;
    public $src;
    public $before;
    public $after;
    public $id;
    public $resize;
    public $property_string = '';
    public $removeSizeParams = false;

    function __construct() {

    }

    function id($id = '') {
        if ($id != '') {
            $this->id = $id;
        } else {
            global $post;
            if (isset($post))
                $this->id = $post->ID;
            else
                $this->id = 0;
        }
        return $this;
    }

    function size($size = '') {
        if ($size == '') {
            $this->size = 'full';
        }
        else
            $this->size = $size;
        return $this;
    }

    function width($width = '') {
        if ($width == '') {
            $this->width = null;
        }
        else
            $this->width = $width;
        return $this;
    }

    function height($height = '') {
        if ($height == '') {
            $this->height = null;
        }
        else
            $this->height = $height;
        return $this;
    }

    function removeSizeParams($remove = false) {
        $this->removeSizeParams = (bool)$remove;
        return $this;
    }

    function order($order = 'ASC') {
        $this->order = $order;
        return $this;
    }

    function from_attachment() {
        $attachments = get_children(array(
            'post_parent' => $this->id,
            'numberposts' => -1,
            'post_type' => 'attachment',
            'post_mime_type' => 'image',
            'order' => $this->order,
            'orderby' => 'menu_order date')
        );

        if (!empty($attachments)) {
            $this->size = 'full';
            foreach ($attachments as $att_id => $attachment) {
                $src = wp_get_attachment_image_src($att_id, $this->size, true);
                $this->src = $src[0];
                $this->width = $src[1];
                $this->height = $src[2];
                break; //only one photo
            }
        }
        return $this;
    }

    function from_custom_field($key = 'single_imgage') {
        $src = tfuse_page_options($key);
        if ($src)
            $this->src = $src;
        else
            $this->src = null;
        return $this;
    }

    function from_thumbnail() {
        ob_start();
        the_post_thumbnail();
        $image_link_thumbnail = ob_get_contents();
        preg_match('/src=(["\'])(.*?)\1/', $image_link_thumbnail, $match);

        if (!isset($match[2]))
            $match[2] = '';
        ob_end_clean();
        $this->src = $match[2];
        return $this;
    }

    function from_src() {
        return $this;
    }

    function src($src = '') {
        if ($src == '') {
            $this->src = null;
        }
        else
            $this->src = $src;
        return $this;
    }

    function resize($resize = NULL, $quality = 100) {

        // Checks if function has been called manually
        if (isset($this->resize))
            return $this;

        if ($this->width && !$this->removeSizeParams)
            $this->property_string .= ' width="' . $this->width . '"';
        if ($this->height && !$this->removeSizeParams)
            $this->property_string .= ' height="' . $this->height . '"';

        // in framework TRUE inseamna ca nu face resize
        // daca se apeleaza direct functia resize() ... atunci TRUE face resize
        if (!isset($resize))
            $this->resize = tfuse_options('disable_resize');
        else
            $this->resize = !$resize;

        if (!$this->resize) {
            global $blog_id;
            if (isset($blog_id) && $blog_id > 0) {
                $im_parts = explode('/files/', $this->src);
                if (isset($im_parts[1])) {
                    $this->src = '/blogs.dir/' . $blog_id . '/files/' . $im_parts[1];
                }
            }
            $this->src = get_template_directory_uri() . '/framework/timthumb/timthumb.php?src=' . urlencode($this->src) . '&amp;h=' . $this->height . '&amp;w=' . $this->width . '&amp;zc=1&amp;q=' . $quality;
        }
        return $this;
    }

    function properties($props = array()) {
        $this->properties = $props;
        if (!in_array('alt', array_keys($this->properties)))
            $this->properties['alt'] = get_the_title($this->id);
        foreach ($this->properties as $name => $value) {
            if ($name !== 'src')
                $this->property_string .= ' ' . $name . '="' . $value . '"';
            else
                $this->src = $value;
        }
        return $this;
    }

    function before($before = '') {
        $this->before = $before;
        return $this;
    }

    function after($after = '') {
        $this->after = $after;
        return $this;
    }

    function get_src() {
        $this->resize();
        $this->out = $this->src;
        return $this->out;
    }

    function get_img() {
        $this->resize();
        $this->out = $this->before . '<img src="' . $this->src . '" ' . $this->property_string . ' />' . $this->after;
        return $this->out;
    }

    function __get($name) {
        if (in_array($name, get_class_methods($this)))
            return $this->$name();
        else {
            echo __('Warning. Property is required', 'tfuse') .': ' . $name;
        }
    }

    function __toString() {
        return (string) $this->out;
    }

    public static function get_src_link($src){
        global $blog_id;
        if (isset($blog_id) && $blog_id > 0) {
            $im_parts = explode('/files/', $src);
            if (isset($im_parts[1])) {
                $src = '/blogs.dir/' . $blog_id . '/files/' . $im_parts[1];
            }
        }
        return get_template_directory_uri() . '/framework/timthumb/timthumb.php?src=' . urlencode($src);
    }
}