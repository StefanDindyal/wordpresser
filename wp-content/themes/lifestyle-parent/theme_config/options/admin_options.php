<?php

/* ----------------------------------------------------------------------------------- */
/* Initializes all the theme settings option fields for admin area. */
/* ----------------------------------------------------------------------------------- */

$options = array(
    'tabs' => array(
        array(
            'name' => 'General',
            'type' => 'tab',
            'id' => TF_THEME_PREFIX . '_general',
            'headings' => array(
                array(
                    'name' => 'General Settings',
                    'options' => array(/* 1 */
                        // Custom Logo Option
                        array(
                            'name' => 'Custom Logo',
                            'desc' => 'Upload a logo for your theme, or specify the image address of your online logo. (http://yoursite.com/logo.png)',
                            'id' => TF_THEME_PREFIX . '_logo',
                            'value' => '',
                            'type' => 'upload'
                        ),
                        // Custom Favicon Option
                        array(
                            'name' => 'Custom Favicon <br /> (16px x 16px)',
                            'desc' => 'Upload a 16px x 16px Png/Gif image that will represent your website\'s favicon.',
                            'id' => TF_THEME_PREFIX . '_favicon',
                            'value' => '',
                            'type' => 'upload',
                            'divider' => true
                        ),
                        // Adress Box Text
                        array(
                            'name' => 'Header Contact Info',
                            'desc' => 'This contact info appears on the right side in the header of the theme',
                            'id' => TF_THEME_PREFIX . '_header_text_box',
                            'value' => '',
                            'type' => 'textarea',
                            'divider' => true
                        ),
                        // Search Box Text
                        array(
                            'name' => 'Search Box text',
                            'desc' => 'Enter your Search Box text',
                            'id' => TF_THEME_PREFIX . '_search_box_text',
                            'value' => 'Type for search',
                            'type' => 'text',
                            'divider' => true
                        ),
                        // Tracking Code Option
                        array(
                            'name' => 'Tracking Code',
                            'desc' => 'Paste your Google Analytics (or other) tracking code here. This will be added into the footer template of your theme.',
                            'id' => TF_THEME_PREFIX . '_google_analytics',
                            'value' => '',
                            'type' => 'textarea',
                            'divider' => true
                        ),
                        // Custom CSS Option
                        array(
                            'name' => 'Custom CSS',
                            'desc' => 'Quickly add some CSS to your theme by adding it to this block.',
                            'id' => TF_THEME_PREFIX . '_custom_css',
                            'value' => '',
                            'type' => 'textarea'
                        )
                    ) /* E1 */
                ),
                array(
                    'name' => 'Social',
                    'options' => array(
                        // RSS URL Option
                        array('name' => 'RSS URL',
                            'desc' => 'Enter your preferred RSS URL. (Feedburner or other)',
                            'id' => TF_THEME_PREFIX . '_feedburner_url',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true
                        ),array('name' => 'Facebook URL',
                            'desc' => 'Enter your Facebook URL.',
                            'id' => TF_THEME_PREFIX . '_facebook_id',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array('name' => 'Twitter URL',
                            'desc' => 'Enter your Twitter URL.',
                            'id' => TF_THEME_PREFIX . '_twitter_id',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array('name' => 'Instagram URL',
                            'desc' => 'Enter your Instagram URL.',
                            'id' => TF_THEME_PREFIX . '_instagram_id',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array('name' => 'Twitter Username',
                            'desc' => 'Enter your Twitter Username.',
                            'id' => TF_THEME_PREFIX . '_tuser_id',
                            'value' => '',
                            'type' => 'text',
                            'divider' => true
                        ),
                        // E-Mail URL Option
                        array('name' => 'E-Mail URL',
                            'desc' => 'Enter your preferred E-mail subscription URL. (Feedburner or other)',
                            'id' => TF_THEME_PREFIX . '_feedburner_id',
                            'value' => '',
                            'type' => 'text'
                        )
                    )
                ),
                array(
                    'name' => 'Twitter',
                    'options' => array(
                        array(
                            'name' => 'Consumer Key',
                            'desc' => 'Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a> application <a href="http://screencast.com/t/yb44HiF2NZ">consumer key</a>.',
                            'id' => TF_THEME_PREFIX . '_twitter_consumer_key',
                            'value' => 'XW7t8bECoR6ogYtUDNdjiQ',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array(
                            'name' => 'Consumer Secret',
                            'desc' => 'Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a> application <a href="http://screencast.com/t/eaKJHG1omN">consumer secret key</a>.',
                            'id' => TF_THEME_PREFIX . '_twitter_consumer_secret',
                            'value' => 'Z7UzuWU8a4obyOOlIguuI4a5JV4ryTIPKZ3POIAcJ9M',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array(
                            'name' => 'User Token',
                            'desc' => 'Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a> application <a href="http://screencast.com/t/QEEG2O4H">access token key</a>.',
                            'id' => TF_THEME_PREFIX . '_twitter_user_token',
                            'value' => '1510587853-ugw6uUuNdNMdGGDn7DR4ZY4IcarhstIbq8wdDud',
                            'type' => 'text',
                            'divider' => true
                        ),
                        array(
                            'name' => 'User Secret',
                            'desc' => 'Set your <a href="http://screencast.com/t/zHu17C7nXy1">twitter</a>  application <a href="http://screencast.com/t/Yv7nwRGsz">access token secret key</a>.',
                            'id' => TF_THEME_PREFIX . '_twitter_user_secret',
                            'value' => '7aNcpOUGtdKKeT1L72i3tfdHJWeKsBVODv26l9C0Cc',
                            'type' => 'text'
                        )
                    )
                ),
                array(
                    'name' => 'Disable Theme settings',
                    'options' => array(
                        // Disable Image for All Single Posts
                        array('name' => 'Image on Single Post',
                            'desc' => 'Disable Image on All Single Posts? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_image',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Video for All Single Posts
                        array('name' => 'Video on Single Post',
                            'desc' => 'Disable Video on All Single Posts? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_video',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Comments for All Posts
                        array('name' => 'Post Comments',
                            'desc' => 'Disable Comments for All Posts? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_posts_comments',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Comments for All Pages
                        array('name' => 'Page Comments',
                            'desc' => 'Disable Comments for All Pages? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_pages_comments',
                            'value' => 'true',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Author Info
                        array('name' => 'Author Info',
                            'desc' => 'Disable Author Info? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_author_info',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Post Meta
                        array('name' => 'Post meta',
                            'desc' => 'Disable Post meta? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_post_meta',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable Post Published Date
                        array('name' => 'Post Published Date',
                            'desc' => 'Disable Post Published Date? These settings may be overridden for individual articles.',
                            'id' => TF_THEME_PREFIX . '_disable_published_date',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable posts lightbox (prettyPhoto) Option
                        array('name' => 'prettyPhoto on Categories',
                            'desc' => 'Disable opening image and attachemnts in prettyPhoto on Categories listings? If YES, image link go to post.',
                            'id' => TF_THEME_PREFIX . '_disable_listing_lightbox',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable posts lightbox (prettyPhoto) Option
                        array('name' => 'prettyPhoto on Single Post',
                            'desc' => 'Disable opening image and attachemnts in prettyPhoto on Single Post?',
                            'id' => TF_THEME_PREFIX . '_disable_single_lightbox',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'divider' => true
                        ),
                        // Disable preloadCssImages plugin
                        array('name' => 'preloadCssImages',
                            'desc' => 'Disable jQuery-Plugin "preloadCssImages"? This plugin loads automatic all images from css.If you prefer performance(less requests) deactivate this plugin.',
                            'id' => TF_THEME_PREFIX . '_disable_preload_css',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'on_update' => 'reload_page',
                            'divider' => true
                        ),
                        // Disable SEO
                        array('name' => 'SEO Tab',
                            'desc' => 'Disable SEO option?',
                            'id' => TF_THEME_PREFIX . '_disable_tfuse_seo_tab',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'on_update' => 'reload_page',
                            'divider' => true
                        ),
                        // Enable Dynamic Image Resizer Option
                        array('name' => 'Dynamic Image Resizer',
                            'desc' => 'This will Disable the thumb.php script that dynamicaly resizes images on your site. We recommend you keep this enabled, however note that for this to work you need to have "GD Library" installed on your server. This should be done by your hosting server administrator.',
                            'id' => TF_THEME_PREFIX . '_disable_resize',
                            'value' => 'false',
                            'type' => 'checkbox'
                        ),
                        array('name' => 'Image from content',
                            'desc' => 'If no thumbnail is specified then the first uploaded image in the post is used.',
                            'id' => TF_THEME_PREFIX . '_enable_content_img',
                            'value' => 'false',
                            'type' => 'checkbox'
			),
			// Remove wordpress versions for security reasons
                        array(
                            'name' => 'Remove Wordpress Versions',
                            'desc' => 'Remove Wordpress versions from the source code, for security reasons.',
                            'id' => TF_THEME_PREFIX . '_remove_wp_versions',
                            'value' => FALSE,
                            'type' => 'checkbox'
                        )
                    )
                ),
                array(
                    'name' => 'WordPress Admin Style',
                    'options' => array(
                        // Disable Themefuse Style
                        array('name' => 'Disable Themefuse Style',
                            'desc' => 'Disable Themefuse Style',
                            'id' => TF_THEME_PREFIX . '_deactivate_tfuse_style',
                            'value' => 'false',
                            'type' => 'checkbox',
                            'on_update' => 'reload_page'
                        )
                    )
                )
            )
        ),
        array(
            'name' => 'Homepage',
            'id' => TF_THEME_PREFIX . '_homepage',
            'headings' => array(
                array(
                    'name' => 'Homepage Population',
                    'options' => array(
                        array('name' => 'Homepage Population',
                            'desc' => ' Select which categories to display on homepage. More over you can choose to load a specific page or change the number of posts on the homepage from <a target="_blank" href="' . network_admin_url('options-reading.php') . '">here</a>',
                            'id' => TF_THEME_PREFIX . '_homepage_category',
                            'value' => '',
                            'options' => array('all' => 'From All Categories', 'specific' => 'From Specific Categories','page' =>'From Specific Page'),
                            'type' => 'select',
                            'install' => 'cat'
                        ),
                        array(
                            'name' => 'Select specific categories to display on homepage',
                            'desc' => 'Pick one or more
                            categories by starting to type the category name.',
                            'id' => TF_THEME_PREFIX . '_categories_select_categ',
                            'type' => 'multi',
                            'subtype' => 'category',
                        ),
                        // page on homepage
                        array('name' => 'Select Page',
                            'desc' => 'Select the page',
                            'id' => TF_THEME_PREFIX . '_home_page',
                            'value' => 'image',
                            'options' => tfuse_list_page_options(),
                            'type' => 'select',
                        ),
                        array('name' => 'Use page options',
                            'desc' => 'Use page options',
                            'id' => TF_THEME_PREFIX . '_use_page_options',
                            'value' => 'false',
                            'type' => 'checkbox'
                        )
                    )
                ),
                array(
                    'name' => 'Homepage Header',
                    'options' => array(
                        /// Element of Hedear
                        array('name' => 'Element of Hedear',
                            'desc' => 'Select type of element on the header.',
                            'id' => TF_THEME_PREFIX . '_header_element',
                            'value' => 'image',
                            'options' => array('none' => 'Without Header Element', 'slider' => 'Slider on Header'),
                            'type' => 'select',
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
                    )
                ),
                array(
                    'name' => 'Homepage Shortcodes',
                    'options' => array(
                        array('name' => 'Shortcodes befor Content',
                        'desc' => 'In this textarea you can input your prefered custom shotcodes.',
                        'id' => TF_THEME_PREFIX . '_content_top',
                        'value' => '',
                        'type' => 'textarea'
                    )
                        // Bottom Shortcodes
                    ,array('name' => 'Shortcodes after Content',
                            'desc' => 'In this textarea you can input your prefered custom shotcodes.',
                            'id' => TF_THEME_PREFIX . '_content_bottom',
                            'value' => '',
                            'type' => 'textarea'
                        )

                    )
                )
            )
        ),
        array(
            'name' => 'Blog',
            'id' => TF_THEME_PREFIX . '_blogpage',
            'headings' => array(
                array(
                    'name' => 'Blog Page Population',
                    'options' => array(
                        // Select the Blog Page
                        array('name' => 'Select Blog Page',
                            'desc' => 'Select the blog page',
                            'id' => TF_THEME_PREFIX . '_blog_page',
                            'value' => 'image',
                            'options' => tfuse_list_page_options(),
                            'type' => 'select',
                            'divider' => true
                        ),
                        array('name' => 'Blog Page Population',
                            'desc' => ' Select which categories to display on blog page. More over you can choose to load a specific page or change the number of posts on the homepage from <a target="_blank" href="' . network_admin_url('options-reading.php') . '">here</a>',
                            'id' => TF_THEME_PREFIX . '_blogpage_category',
                            'value' => '',
                            'options' => array('all' => 'From All Categories', 'specific' => 'From Specific Categories'),
                            'type' => 'select',
                            'install' => 'cat'
                        ),
                        array(
                            'name' => 'Select specific categories to display on homepage',
                            'desc' => 'Pick one or more
                            categories by starting to type the category name.',
                            'id' => TF_THEME_PREFIX . '_categories_select_categ_blog',
                            'type' => 'multi',
                            'subtype' => 'category',
                        )
                    )
                ),
                array(
                    'name' => 'Blog Page Header',
                    'options' => array(
                        /// Element of Hedear
                        array('name' => 'Element of Hedear',
                            'desc' => 'Select type of element on the header.',
                            'id' => TF_THEME_PREFIX . '_header_element_blog',
                            'value' => 'image',
                            'options' => array('none' => 'Without Header Element', 'slider' => 'Slider on Header'),
                            'type' => 'select',
                        ),
                        // Select Slider
                        $this->ext->slider->model->has_sliders() ?
                            array(
                                'name' => 'Slider',
                                'desc' => 'Select a slider for your post. The sliders are created on the <a href="' . admin_url( 'admin.php?page=tf_slider_list' ) . '" target="_blank">Sliders page</a>.',
                                'id' => TF_THEME_PREFIX . '_select_slider_blog',
                                'value' => '',
                                'options' => $TFUSE->ext->slider->get_sliders_dropdown(),
                                'type' => 'select'
                            ) :
                            array(
                                'name' => 'Slider',
                                'desc' => '',
                                'id' => TF_THEME_PREFIX . '_select_slider_blog',
                                'value' => '',
                                'html' => 'No sliders created yet. You can start creating one <a href="' . admin_url('admin.php?page=tf_slider_list') . '">here</a>.',
                                'type' => 'raw'
                            )
                    )
                )
            )
        ),
        array(
            'name' => 'Posts',
            'id' => TF_THEME_PREFIX . '_posts',
            'headings' => array(
                array(
                    'name' => 'Default Post Options',
                    'options' => array(
                        // Post Content
                        array('name' => 'Post Content',
                            'desc' => 'Select if you want to show the full content (use <em>more</em> tag) or the excerpt on posts listings (categories).',
                            'id' => TF_THEME_PREFIX . '_post_content',
                            'value' => 'excerpt',
                            'options' => array('excerpt' => 'The Excerpt', 'content' => 'Full Content'),
                            'type' => 'select',
                            'divider' => true
                        ),
                        // Single Image Position
                        array('name' => 'Image Position',
                            'desc' => 'Select your preferred image alignment',
                            'id' => TF_THEME_PREFIX . '_single_image_position',
                            'value' => 'alignleft',
                            'type' => 'images',
                            'options' => array('alignleft' => array($url . 'left_off.png', 'Align to the left'), 'alignright' => array($url . 'right_off.png', 'Align to the right'))
                        ),
                        // Single Image Dimensions
                        array('name' => 'Image Resize (px)',
                            'desc' => 'These are the default width and height values. If you want to resize the image change the values with your own. If you input only one, the image will get resized with constrained proportions based on the one you specified.',
                            'id' => TF_THEME_PREFIX . '_single_image_dimensions',
                            'value' => array(590, 206),
                            'type' => 'textarray',
                            'divider' => true
                        ),
                        // Thumbnail Posts Position
                        array('name' => 'Thumbnail Position',
                            'desc' => 'Select your preferred thumbnail alignment',
                            'id' => TF_THEME_PREFIX . '_thumbnail_position',
                            'value' => 'alignleft',
                            'type' => 'images',
                            'options' => array('alignleft' => array($url . 'left_off.png', 'Align to the left'), 'alignright' => array($url . 'right_off.png', 'Align to the right'))
                        ),
                        // Posts Thumbnail Dimensions
                        array('name' => 'Thumbnail Resize (px)',
                            'desc' => 'These are the default width and height values. If you want to resize the thumbnail change the values with your own. If you input only one, the thumbnail will get resized with constrained proportions based on the one you specified.',
                            'id' => TF_THEME_PREFIX . '_thumbnail_dimensions',
                            'value' => array(305, 206),
                            'type' => 'textarray',
                            'divider' => true
                        ),
                        // Video Position
                        array('name' => 'Video Position',
                            'desc' => 'Select your preferred video alignment',
                            'id' => TF_THEME_PREFIX . '_video_position',
                            'value' => 'alignleft',
                            'type' => 'images',
                            'options' => array('alignleft' => array($url . 'left_off.png', 'Align to the left'), 'alignright' => array($url . 'right_off.png', 'Align to the right'))
                        ),
                        // Video Dimensions
                        array('name' => 'Video Resize (px)',
                            'desc' => 'These are the default width and height values. If you want to resize the video change the values with your own. If you input only one, the video will get resized with constrained proportions based on the one you specified.',
                            'id' => TF_THEME_PREFIX . '_video_dimensions',
                            'value' => array(580, 349),
                            'type' => 'textarray'
                        )
                    )
                )
            )
        ),
        array(
            'name' => 'Header',
            'id' => TF_THEME_PREFIX . '_feader',
            'headings' => array(
                array(
                    'name' => 'Top Menu',
                    'options' => array(
                        array('name' => 'Top Menu Text',
                            'desc' => 'This will enable Top Menu Text.',
                            'id' => TF_THEME_PREFIX . '_page_header_right_text',
                            'value' => '',
                            'type' => 'text',
                        )
                    )
                )
            )
        ),
        array(
            'name' => 'Footer',
            'id' => TF_THEME_PREFIX . '_footer',
            'headings' => array(
                array(
                    'name' => 'Footer Content',
                    'options' => array(
                       //copyright
                        array('name' => 'Custom Copyright',
                            'desc' => 'Create your custom copyright',
                            'id' => TF_THEME_PREFIX . '_custom_copyright',
                            'value' => 'Copyright © 2011 Business name <a href="http://themefuse.com">All the respective rights reserved</a>',
                            'type' =>'textarea'

                        )
                    )
                )
            )
        ),
        array(
            'name' => 'Ads Manager',
            'id' => TF_THEME_PREFIX . '_adds',
            'headings' => array(
                array(
                    'name' => 'Ads Options',
                    'options' => array(

                        array('name' => 'Enable top ads',
                            'desc' => 'Enable the top ads space.',
                            'id' => TF_THEME_PREFIX . '_top_ads_space',
                            'value' => 'false',
                            'type' => 'checkbox',
                        ),
                        array(
                            'name'=>'Top ads image location',
                            'desc'=>'Enter the URL to the ad image 728x90 location',
                            'id'=> TF_THEME_PREFIX . '_top_ads_image',
                            'value' => '',
                            'type' =>'upload'
                        ),
                        array(
                            'name'=>'Top ads destination url',
                            'desc'=>'Enter the URL where this ad points to.',
                            'id'=> TF_THEME_PREFIX . '_top_ads_url',
                            'value' => '',
                            'type' =>'text'
                        ),
                        array(
                            'name'=>'Adsense code for top ads',
                            'desc'=>'Enter your adsense code (or other ad network code) here.',
                            'id'=> TF_THEME_PREFIX . '_top_ads_adsense',
                            'value' => '',
                            'type' =>'textarea',
                            'divider'=> true
                        ),
                        array('name' => 'Enable content ad ',
                            'desc' => 'Enable the content ad space.',
                            'id' => TF_THEME_PREFIX . '_ads_space',
                            'value' => 'false',
                            'type' => 'checkbox',
                        ),
                        array(
                            'name'=>'Top ad image location',
                            'desc'=>'Enter the URL to the ad image 468x60 location',
                            'id'=> TF_THEME_PREFIX . '_ads_image',
                            'value' => '',
                            'type' =>'upload'
                        ),
                        array(
                            'name'=>'Ad destination url',
                            'desc'=>'Enter the URL where this ad points to.',
                            'id'=> TF_THEME_PREFIX . '_ads_url',
                            'value' => '',
                            'type' =>'text'
                        ),
                        array(
                            'name'=>'Adsense code for content ad',
                            'desc'=>'Enter your adsense code (or other ad network code) here.',
                            'id'=> TF_THEME_PREFIX . '_ads_adsense',
                            'value' => '',
                            'type' =>'textarea',
                            'divider'=> true
                        ),
                        array('name' => 'Enable footer ads',
                            'desc' => 'Enable the footer ads space.',
                            'id' => TF_THEME_PREFIX . '_footer_ads_space',
                            'value' => 'false',
                            'type' => 'checkbox',
                        ),
                        array(
                            'name'=>'Footer ads image location',
                            'desc'=>'Enter the URL to the ad image 728x90 location',
                            'id'=> TF_THEME_PREFIX . '_footer_ads_image',
                            'value' => '',
                            'type' =>'upload'
                        ),
                        array(
                            'name'=>'Footer ads destination url',
                            'desc'=>'Enter the URL where this ad points to.',
                            'id'=> TF_THEME_PREFIX . '_footer_ads_url',
                            'value' => '',
                            'type' =>'text'
                        ),
                        array(
                            'name'=>'Adsense code for footer ads',
                            'desc'=>'Enter your adsense code (or other ad network code) here.',
                            'id'=> TF_THEME_PREFIX . '_footer_ads_adsense',
                            'value' => '',
                            'type' =>'textarea',
                        ),
                    )
                )
            )
        )
    )
);

?>