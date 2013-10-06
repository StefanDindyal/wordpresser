<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
            <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
            <title><?php  if(tfuse_options('disable_tfuse_seo_tab'))
            {wp_title( '|', true, 'right' );bloginfo( 'name' );
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description && ( is_home() || is_front_page() ) )
                    echo " | $site_description";}
            else wp_title(''); ?></title>
            <?php tfuse_meta(); ?>
            <link rel="profile" href="http://gmpg.org/xfn/11" />
            <link rel="stylesheet" type="text/css" media="all" href="<?php echo get_stylesheet_uri() ?>" />
            <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo(template_directory); ?>/custom.css" />
            <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php echo tfuse_options('feedburner_url', get_bloginfo_rss('rss2_url')); ?>" />
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
            <?php
            if ( is_singular() && get_option( 'thread_comments' ) )
                wp_enqueue_script( 'comment-reply' );
            tfuse_head();
            wp_head();
            ?>
            <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        </head>
        <body>
        <?php /*<div class="head_bar">
            <div class="container_24">
                <?php  /*tfuse_menu('primary');  ?>
                <span class="head_label"><?php echo tfuse_options('page_header_right_text') ?></span>
                <div class="clear"></div>
            </div>
        </div> */ ?>
        <!--/ head menu -->
        <div class="header">
            <div class="container_24 clearfix">
                <div class="clearfix">
                <div class="header_left">
                    <?php echo  tfuse_top_adds(); ?>                                        
                </div>
                <div class="header_right">
                    <div class="social_icons">
                        <?php tfuse_action_social();?>
                        <div class="at">@girlthatsmysong</div>
                        <div class="clearboth"></div>
                    </div>
                    <?php  echo  tfuse_search(); ?>
                </div>
                </div>
                <div class="nav-over">
                <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('description'); ?>" class="logo">
                        <img src="<?php echo tfuse_logo(); ?>" alt="<?php bloginfo('name'); ?>"  border="0" /></a>
                <div class="mobile-nav">
                    <div class="inner"></div>
                    <div class="icos">
                        <div class="bar"></div>
                        <div class="bar"></div>
                        <div class="bar"></div>
                    </div>
                </div>                
                <!-- topmenu -->
                <?php  tfuse_menu('secondary');  ?>
                <!--/ topmenu -->  
                </div>              
            </div>

        </div>
        <!--/ header -->
        <?php
            global $is_tf_blog_page;
            if($is_tf_blog_page) tfuse_category_on_blog_page();
        ?>
