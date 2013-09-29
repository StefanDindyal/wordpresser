<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for categories area.             */
/* ----------------------------------------------------------------------------------- */

$options = array(
    // Element of Hedear
    array('name' => 'Element of Hedear',
        'desc' => 'Select type of element on the header.',
        'id' => TF_THEME_PREFIX . '_header_element',
        'value' => 'image',
        'options' => array('none' => 'Without Header Element', 'slider' => 'Slider on Header'),
        'type' => 'select'
    ),
    // Select Slider
    $this->ext->slider->model->has_sliders() ?
            array(
        'name' => 'Slider',
        'desc' => 'Select a slider for your post. The sliders are created on the <a href="' . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blank">Sliders page</a>.',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
        'type' => 'select'
            ) :
            array(
        'name' => 'Slider',
        'desc' => '',
        'id' => TF_THEME_PREFIX . '_select_slider',
        'value' => '',
        'html' => 'No sliders created yet. You can start creating one <a href="' . admin_url('admin.php?page=tf_slider_list') . '">here</a>.',
        'type' => 'raw'
            )
    ,
    // Custom Logo Option
    array(
        "name" 	=> "Category Icon",
        "desc" 		=> "Upload ogo. (http://yoursite.com/logo.png)",
        "id" 		=> TF_THEME_PREFIX . '_cat_icon',
        "value" => "",
        "type" 		=> "upload"),
    array(
        "name" 	=> "Category Color",
        "desc" 		=> "Select Color for icon text color",
        "id" 		=> TF_THEME_PREFIX . '_cat_color',
        "value" 	=> "#000000",
        "type" 		=> "colorpicker"),
         // Top Shortcodes
    array('name' => 'Shortcodes Befor Content',
        'desc' => 'In this textarea you can input your prefered custom shotcodes.',
        'id' => TF_THEME_PREFIX . '_content_top',
        'value' => '',
        'type' => 'textarea'
    )
    ,
    // Bottom Shortcodes
    array('name' => 'Shortcodes after Content',
        'desc' => 'In this textarea you can input your prefered custom shotcodes.',
        'id' => TF_THEME_PREFIX . '_content_bottom',
        'value' => '',
        'type' => 'textarea'
    )
);

?>