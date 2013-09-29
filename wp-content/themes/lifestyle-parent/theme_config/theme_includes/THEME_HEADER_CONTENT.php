<?php

if ( ! function_exists( 'tfuse_get_header_content' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override tfuse_slider_type() in a child theme, add your own tfuse_slider_type to your child theme's
 * functions.php file.
 */

    function tfuse_get_header_content()
    {
        global $TFUSE, $post, $header_image,$ID,$is_tf_front_page,$is_tf_blog_page;;
        $posts = $header_element = $header_image = $slider = null;

        if ( $is_tf_blog_page )
        {
            $header_element = tfuse_options('header_element_blog');
            if ( 'slider' == $header_element )
                $slider = tfuse_options('select_slider_blog');
        }
        elseif( $is_tf_front_page)
        {
            if(tfuse_options('use_page_options') && tfuse_options('homepage_category')=='page'){
                $page_id = $post->ID;
                $header_element = tfuse_page_options('header_element','',$page_id);
                if ( 'slider' == $header_element )
                    $slider = tfuse_page_options('select_slider','',$page_id);
               }
            else{
                $header_element = tfuse_options('header_element');
                if ( 'slider' == $header_element )
                    $slider = tfuse_options('select_slider');
            }
        }
        elseif ( is_singular() )
        {
            $ID = $post->ID;
            $header_element = tfuse_page_options('header_element');
            if ( 'slider' == $header_element )
                $slider = tfuse_page_options('select_slider');

        }
        elseif ( is_category() )
        {
            $ID = get_query_var('cat');
            $header_element = tfuse_options('header_element', null, $ID);
            if ( 'slider' == $header_element )
                $slider = tfuse_options('select_slider', null, $ID);
            elseif ( 'image' == $header_element )
                $header_image = tfuse_options('header_image', null, $ID);
        }
        elseif ( is_tax() )
        {
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $ID = $term->term_id;
            $header_element = tfuse_options('header_element', null, $ID);
            if ( 'slider' == $header_element )
                $slider = tfuse_options('select_slider', null, $ID);
            elseif ( 'image' == $header_element )
                $header_image = tfuse_options('header_image', null, $ID);
        }


        if ( $header_element != 'slider' )
        {
            get_template_part( 'header', 'image' );
            return;
        }
        elseif ( !$slider )
            return;

        $slider = $TFUSE->ext->slider->model->get_slider($slider);

        switch ($slider['type']):

            case 'custom':

                if ( is_array($slider['slides']) ) :
                    $slider_image_resize = ( isset($slider['general']['slider_image_resize']) && $slider['general']['slider_image_resize'] == 'true' ) ? true : false;
                    foreach ($slider['slides'] as $k => $slide) :
                        $image = new TF_GET_IMAGE();
                        $slider['slides'][$k]['slide_src'] = $image->width(960)->height(444)->src($slide['slide_src'])->resize($slider_image_resize)->get_src();   
                    endforeach;
                endif;

                break;

            case 'posts':
                $args = array( 'post__in' => explode(',',$slider['general']['posts_select']) );

                $args = apply_filters('tfuse_slider_posts_args', $args, $slider);
                $args = apply_filters('tfuse_slider_posts_args_'.$ID, $args, $slider);
                $posts = get_posts($args);
                break;

            case 'tags':
                $args = array( 'tag__in' => explode(',',$slider['general']['tags_select']) );

                $args = apply_filters('tfuse_slider_tags_args', $args, $slider);
                $args = apply_filters('tfuse_slider_tags_args_'.$ID, $args, $slider);
                $posts = get_posts($args);
                break;

            case 'categories':
                $slider['general']['sliders_posts_number'] = '';

                $args = 'cat='.$slider['general']['categories_select'].
                        '&posts_per_page='.$slider['general']['sliders_posts_number'];

                $args = apply_filters('tfuse_slider_categories_args', $args, $slider);
                $args = apply_filters('tfuse_slider_categories_args_'.$ID, $args, $slider);
                $posts = get_posts($args);
                break;

        endswitch;

        if ( is_array($posts) ) :
            $slider['slides'] = tfuse_get_slides_from_posts($posts,$slider);
        endif;

        if ( !is_array($slider['slides']) ) return;

        include_once(locate_template( '/theme_config/extensions/slider/designs/'.$slider['design'].'/template.php' ));
    }

endif;
add_action('tfuse_header_content', 'tfuse_get_header_content');


if ( ! function_exists( 'tfuse_get_slides_from_posts' ) ):
/**
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override tfuse_slider_type() in a child theme, add your own tfuse_slider_type to your child theme's
 * functions.php file.
 */
    function tfuse_get_slides_from_posts( $posts=array(), $slider = array() )
    {
        global $post;

        $slides = array();
        $slider_image_resize = ( isset($slider['general']['slider_image_resize']) && $slider['general']['slider_image_resize'] == 'true' ) ? $slider['general']['slider_image_resize'] : false;

        foreach ($posts as $k => $post) : setup_postdata( $post );

            $tfuse_image = $image = null;

            if ( !$single_image = tfuse_page_options('single_image') ) continue;

            $image = new TF_GET_IMAGE();
            $tfuse_image = $image->width(960)->height(325)->src($single_image)->resize($slider_image_resize)->get_src();

            $slides[$k]['slide_src'] = $tfuse_image;
            $slides[$k]['slide_url'] = get_permalink();
            $slides[$k]['slide_title'] = get_the_title();
            $slides[$k]['slide_cat_id'] = get_the_category($post->ID);

            if ( $subtitle = tfuse_page_options('slide_subtitle') )
                $slides[$k]['slide_subtitle'] = $subtitle;
            else
                $slides[$k]['slide_subtitle'] = tfuse_substr( get_the_excerpt(), 50 );

            if ( $slider['design'] == 'play' ) 
                $slides[$k]['slide_tab_title'] =tfuse_page_options('slide_tab_subtitle'); 

        endforeach;

        return $slides;
    }
endif;
