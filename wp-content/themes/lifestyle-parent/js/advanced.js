jQuery(document).ready(function($) {

    $(document).bind({reservationform_preview:function(){
        $('select.select_styled').selectmenu({
            style:'dropdown'
        });
    },
        contact_form_preview_open:function(){
            $('select.select_styled').selectmenu({
                style:'dropdown'
            });
        }
    });


    $('.tfuse_selectable_code').live('click', function () {
        var r = document.createRange();
        var w = $(this).get(0);
        r.selectNodeContents(w);
        var sel = window.getSelection();
        sel.removeAllRanges();
        sel.addRange(r);
    });
    $('#tf_rf_form_name_select').change(function(){
        $_get=getUrlVars();
        if($(this).val()==-1 && 'formid' in $_get){
            delete $_get.formid;
        } else if($(this).val()!=-1){
            $_get.formid=$(this).val();
        }
        $_url_str='?';
        $.each($_get,function(key,val){
            $_url_str +=key+'='+val+'&';
        })
        $_url_str = $_url_str.substring(0,$_url_str.length-1);
        window.location.href=$_url_str;
    });


    function getUrlVars() {
        urlParams = {};
        var e,
            a = /\+/g,
            r = /([^&=]+)=?([^&]*)/g,
            d = function (s) {
                return decodeURIComponent(s.replace(a, " "));
            },
            q = window.location.search.substring(1);
        while (e = r.exec(q))
            urlParams[d(e[1])] = d(e[2]);
        return urlParams;
    }  $("#slider_slideSpeed,#slider_play,#slider_pause,#lifestyle_map_zoom").keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }
    });

    jQuery('#lifestyle_map_lat,#lifestyle_map_long').keydown(function(event) {
        // Allow: backspace, delete, tab, escape, and enter
        if ( event.keyCode == 190 || event.keyCode == 110|| event.keyCode == 189 || event.keyCode == 109 || event.keyCode == 46 || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 27 || event.keyCode == 13 ||
            // Allow: Ctrl+A
            (event.keyCode == 65 && event.ctrlKey === true) ||
            // Allow: home, end, left, right
            (event.keyCode >= 35 && event.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        else {
            // Ensure that it is a number and stop the keypress
            if (event.shiftKey || (event.keyCode < 48 || event.keyCode > 57) && (event.keyCode < 96 || event.keyCode > 105 )) {
                event.preventDefault();
            }
        }
    });

    $('#lifestyle_framework_options_metabox .handlediv, #lifestyle_framework_options_metabox .hndle').hide();
    $('#lifestyle_framework_options_metabox .handlediv, #lifestyle_framework_options_metabox .hndle').hide();

    var options = new Array();

    //hide header options if homepage_category  is different from tfuse_blog_posts or  tfuse_blog_cases

    options['lifestyle_homepage_category'] = jQuery('#lifestyle_homepage_category').val();
    jQuery('#lifestyle_homepage_category').bind('change', function() {
        options['lifestyle_homepage_category'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    options['lifestyle_header_element'] = jQuery('#lifestyle_header_element').val();
    jQuery('#lifestyle_header_element').bind('change', function() {
        options['lifestyle_header_element'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    options['lifestyle_page_title'] = jQuery('#lifestyle_page_title').val();
    jQuery('#lifestyle_page_title').bind('change', function() {
        options['lifestyle_page_title'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    options['slider_hoverPause'] = jQuery('#slider_hoverPause').val();
    jQuery('#slider_hoverPause').bind('change', function() {
        if (jQuery(this).next('.tf_checkbox_switch').hasClass('on'))  options['slider_hoverPause']= true;
        else  options['slider_hoverPause'] = false;
        tfuse_toggle_options(options);
    });

    options['map_type'] = jQuery('#lifestyle_map_type').val();
    jQuery(' #lifestyle_map_type').bind('change', function() {
        options['map_type'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    tfuse_toggle_options(options);

    function tfuse_toggle_options(options)
    {

        jQuery('#lifestyle_quote_before_slider, #lifestyle_select_slider,#lifestyle_header_text,#lifestyle_header_image,#lifestyle_image_caption,#lifestyle_link_text,#lifestyle_link_url, #lifestyle_link_target, #lifestyle_map_address, #lifestyle_map_lat, #lifestyle_map_long, #lifestyle_map_zoom, #lifestyle_map_type, #lifestyle_quote_after_image, #lifestyle_custom_title, .homepage_category_header_element').parents('.option-inner').hide();
        jQuery('#lifestyle_quote_before_slider, #lifestyle_select_slider,#lifestyle_header_text,#lifestyle_header_image,#lifestyle_image_caption,#lifestyle_link_text,#lifestyle_link_url, #lifestyle_link_target, #lifestyle_map_address, #lifestyle_map_lat, #lifestyle_map_long, #lifestyle_map_zoom, #lifestyle_map_type, #lifestyle_quote_after_image, #lifestyle_custom_title, .homepage_category_header_element').parents('.form-field').hide();
        jQuery('.lifestyle_header_img_dimensions').hide();
        var homepage = true;
        if (jQuery('.homepage_category_header_element').length == 1) homepage = false;
        if ( options['lifestyle_homepage_category'] == 'tfuse_blog_posts' || options['lifestyle_homepage_category'] == 'tfuse_blog_cases')
        {
            homepage = true;
            jQuery('.homepage_category_header_element').parents('.option-inner').show();
            jQuery('.homepage_category_header_element').parents('.form-field').show();
        }
        if(options['lifestyle_header_element'] == 'slider' && homepage)
        {
            jQuery('#lifestyle_quote_before_slider').parents('.option-inner').show();
            jQuery('#lifestyle_quote_before_slider').parents('.form-field').show();

            jQuery('#lifestyle_select_slider').parents('.option-inner').show();
            jQuery('#lifestyle_select_slider').parents('.form-field').show();
        }
        else if(options['lifestyle_header_element'] == 'image' && homepage)
        {
            jQuery('#lifestyle_header_image').parents('.option-inner').show();
            jQuery('#lifestyle_header_image').parents('.form-field').show();

            jQuery('.lifestyle_header_img_dimensions').show();


            jQuery('#lifestyle_image_caption').parents('.option-inner').show();
            jQuery('#lifestyle_image_caption').parents('.form-field').show();

            jQuery('#lifestyle_link_text').parents('.option-inner').show();
            jQuery('#lifestyle_link_text').parents('.form-field').show();

            jQuery('#lifestyle_link_url').parents('.option-inner').show();
            jQuery('#lifestyle_link_url').parents('.form-field').show();

            jQuery('#lifestyle_link_target').parents('.option-inner').show();
            jQuery('#lifestyle_link_target').parents('.form-field').show();

            jQuery('#lifestyle_quote_after_image').parents('.option-inner').show();
            jQuery('#lifestyle_quote_after_image').parents('.form-field').show();
        }
        else if (options['lifestyle_header_element'] == 'text' && homepage)
        {

            jQuery('#lifestyle_header_text').parents('.option-inner').show();
            jQuery('#lifestyle_header_text').parents('.form-field').show();
        }

        if(options['lifestyle_page_title'] == 'custom_title')
        {
            jQuery('#lifestyle_custom_title').parents('.option-inner').show();
            jQuery('#lifestyle_custom_title').parents('.form-field').show();
        }

        if (options['slider_hoverPause'])
        {
            jQuery('.slider_pause').show();
            jQuery('.slider_pause').next('.tfclear').show();
        }
        else
        {
            jQuery('.slider_pause').hide();
            jQuery('.slider_pause').next('.tfclear').hide();
        }

        if ( (options['map_type'] == 'map3') && (options['lifestyle_header_element'] == 'map') && homepage)
        {
            jQuery('#lifestyle_map_address').parents('.option-inner').show();
            jQuery('#lifestyle_map_address').parents('.form-field').show();
        }
    }
    options['lifestyle_homepage_category'] = jQuery('#lifestyle_homepage_category').val();
    jQuery('#lifestyle_homepage_category').bind('change', function() {
        options['lifestyle_homepage_category'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['lifestyle_blogpage_category'] = jQuery('#lifestyle_blogpage_category').val();
    jQuery('#lifestyle_blogpage_category').bind('change', function() {
        options['lifestyle_blogpage_category'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });
    options['lifestyle_header_element_blog'] = jQuery('#lifestyle_header_element_blog').val();
    jQuery('#lifestyle_header_element_blog').bind('change', function() {
        options['lifestyle_header_element_blog'] = jQuery(this).val();
        tfuse_toggle_options(options);
    });

    tfuse_toggle_options(options);

    function tfuse_toggle_options(options)
    {

        jQuery('#lifestyle_select_slider, #lifestyle_header_image, #lifestyle_custom_title ').parents('.option-inner').hide();
        jQuery('#lifestyle_select_slider, #lifestyle_header_image, #lifestyle_custom_title ').parents('.form-field').hide();

        if(options['lifestyle_header_element'] == 'slider')
        {
            jQuery('#lifestyle_select_slider').parents('.option-inner').show();
            jQuery('#lifestyle_select_slider').parents('.form-field').show();
        }
        else if(options['lifestyle_header_element'] == 'image')
        {
            jQuery('#lifestyle_header_image').parents('.option-inner').show();
            jQuery('#lifestyle_header_image').parents('.form-field').show();
        }

        if(options['lifestyle_page_title'] == 'custom_title')
        {
            jQuery('#lifestyle_custom_title').parents('.option-inner').show();
            jQuery('#lifestyle_custom_title').parents('.form-field').show();
        }

        if(options['lifestyle_homepage_category']=='all')
        {
            jQuery('.lifestyle_categories_select_categ,.lifestyle_home_page,.lifestyle_use_page_options').hide();
            jQuery('#homepage-header,#homepage-shortcodes').show();
        }
        else if(options['lifestyle_homepage_category']=='specific')
        {
            jQuery('#homepage-header,#homepage-shortcodes,.lifestyle_categories_select_categ').show();
            jQuery('.lifestyle_use_page_options,.lifestyle_home_page').hide();
        }
        else if(options['lifestyle_homepage_category']=='page')
        {
            jQuery('.lifestyle_categories_select_categ').hide();
            jQuery('.lifestyle_home_page,.lifestyle_use_page_options').show();
            if($('#lifestyle_use_page_options').is(':checked')) jQuery('#homepage-header,#homepage-shortcodes').hide();
            $('#lifestyle_use_page_options').live('change',function () {
                if(jQuery(this).is(':checked'))
                    jQuery('#homepage-header,#homepage-shortcodes').hide();
                else
                    jQuery('#homepage-header,#homepage-shortcodes').show();
            });
        }

        if(options['lifestyle_blogpage_category']=='all')
            jQuery('.lifestyle_categories_select_categ_blog').hide();
        else if(options['lifestyle_blogpage_category']=='specific')
            jQuery('.lifestyle_categories_select_categ_blog').show();

        jQuery('#lifestyle_select_slider_blog, #lifestyle_header_image_blog').parents('.option-inner').hide();
        jQuery('#lifestyle_select_slider_blog, #lifestyle_header_image_blog').parents('.form-field').hide();
        if(options['lifestyle_header_element_blog'] == 'slider')
        {
            jQuery('#lifestyle_select_slider_blog').parents('.option-inner').show();
            jQuery('#lifestyle_select_slider_blog').parents('.form-field').show();
        }
        else if(options['lifestyle_header_element_blog'] == 'image')
        {
            jQuery('#lifestyle_header_image_blog').parents('.option-inner').show();
            jQuery('#lifestyle_header_image_blog').parents('.form-field').show();
        }

    }
});

