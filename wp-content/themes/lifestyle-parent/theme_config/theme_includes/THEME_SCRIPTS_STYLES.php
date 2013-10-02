<?php

add_action( 'wp_print_styles', 'tfuse_add_css' );
add_action( 'wp_print_scripts', 'tfuse_add_js' );

if ( ! function_exists( 'tfuse_add_css' ) ) :
    /**
     * This function include files of css.
     */
    function tfuse_add_css()
    {
        $template_directory = get_template_directory_uri();

        wp_register_style( 'prettyPhoto', TFUSE_ADMIN_CSS . '/prettyPhoto.css', false, '3.1.4' );
        wp_enqueue_style( 'prettyPhoto' );

        wp_register_style( 'jquery-ui-1.8.4.custom',tfuse_get_file_uri('/css/ui-lightness/jquery-ui-1.8.4.custom.css'), false );
        wp_enqueue_style( 'jquery-ui-1.8.4.custom' );

        wp_register_style( 'ui.selectmenu',tfuse_get_file_uri('/css/ui.selectmenu.css'), false );
        wp_enqueue_style( 'ui.selectmenu' );

        wp_register_style( 'shCore',tfuse_get_file_uri('/css/shCore.css'), false );
        wp_enqueue_style( 'shCore' );

        wp_register_style( 'shThemeDefault',tfuse_get_file_uri('/css/shThemeDefault.css'), false );
        wp_enqueue_style( 'shThemeDefault' );

        wp_register_style( 'slides',tfuse_get_file_uri('/css/slides.css'), false );
        wp_enqueue_style( 'slides' );

        $tfuse_browser_detect = tfuse_browser_body_class();

        if ( $tfuse_browser_detect[0] == 'ie7' )
            wp_enqueue_style('ie7-style',tfuse_get_file_uri('/css/ie.css'));

    }
endif;


if ( ! function_exists( 'tfuse_add_js' ) ) :
    /**
     * This function include files of javascript.
     */
    function tfuse_add_js()
    {
        $template_directory = get_template_directory_uri();

        // wp_enqueue_script( 'jquery' );

        wp_register_script( 'jquery.tools.min',tfuse_get_file_uri('/js/jquery.tools.min.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jquery.tools.min' );

        wp_register_script( 'general',tfuse_get_file_uri('/js/general.js'),array('jquery'), '', false );
        wp_enqueue_script( 'general' );

        wp_register_script( 'jcarousellite_1.3.min',tfuse_get_file_uri('/js/jcarousellite_1.3.min.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jcarousellite_1.3.min' );

        wp_register_script( 'jquery.easing.1.3',tfuse_get_file_uri('/js/jquery.easing.1.3.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jquery.easing.1.3' );

        wp_register_script( 'slides.jquery',tfuse_get_file_uri('/js/slides.jquery.js'),array('jquery'), '', false );
        wp_enqueue_script( 'slides.jquery' );

        wp_register_script( 'anythingSlider',tfuse_get_file_uri('/js/anythingSlider.js'),array('jquery'), '', false );
        wp_enqueue_script( 'anythingSlider' );

        wp_register_script( 'custom',tfuse_get_file_uri('/js/custom.js'),array('jquery'), '', false );
        wp_enqueue_script( 'custom' );

        wp_register_script( 'jquery-ui-1.8.4.custom.min',tfuse_get_file_uri('/js/jquery-ui-1.8.4.custom.min.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jquery-ui-1.8.4.custom.min' );



        wp_register_script( 'jquery.nivo.slider',tfuse_get_file_uri('/js/jquery.nivo.slider.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jquery.nivo.slider' );

        wp_register_script( 'jquery.prettyPhoto',tfuse_get_file_uri('/js/jquery.prettyPhoto.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jquery.prettyPhoto' );

        wp_register_script( 'jquery.reject.min',tfuse_get_file_uri('/js/jquery.reject.min.js'),array('jquery'), '', false );
        wp_enqueue_script( 'jquery.reject.min' );

        wp_register_script( 'shCore',tfuse_get_file_uri('/js/shCore.js'),array('jquery'), '', false );
        wp_enqueue_script( 'shCore' );

        wp_register_script( 'shBrushPlain',tfuse_get_file_uri('/js/shBrushPlain.js'),array('jquery'), '', false );
        wp_enqueue_script( 'shBrushPlain' );

        wp_register_script( 'styled.selectmenu',tfuse_get_file_uri('/js/styled.selectmenu.js'),array('jquery'), '', false );
        wp_enqueue_script( 'styled.selectmenu' );

        wp_register_script( 'ui.selectmenu',tfuse_get_file_uri('/js/ui.selectmenu.js'),array('jquery'), '', false );
        wp_enqueue_script( 'ui.selectmenu' );



    }
endif;