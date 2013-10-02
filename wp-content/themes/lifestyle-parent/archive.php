<?php get_header();
global $page_class;
?>
<!-- middle -->
<div class="<?php if(is_home()){ echo 'cone'; } elseif(is_category()) { echo 'dome'; } elseif(is_page()){ echo 'dec'; } ?>">
<div <?php tfuse_class('middle');?>>
    <div class="container_24 fronter">
        <!-- featured list -->
        <?php
        tfuse_header_content();
        ?>
        <!--/ featured list -->
        <div class="divider_thin"></div>        
        <?php tfuse_sidebar_left_type() ?>
        <!--content -->
               <div class="<?php echo $page_class; ?> content">
                <?php if(tfuse_options('thash_id')){ ?>
                <div class="twtr-hold">
                    <div id="tweet-container" class="twtr-feed" data-tuser="<?php echo tfuse_options('thash_id'); ?>"></div>
                </div>
                <?php } ?>
                <div class="latest">The Latest <a href="<?php echo tfuse_options('feedburner_url'); ?>" class="latest-rss">gtms rss</a>
                    <div class="split"></div></div>
            <?php echo   tfuse_shortcode_content('before');   ?>
                <?php get_template_part('listing', 'blog');?>
            <?php echo   tfuse_shortcode_content('after');   ?>
            <?php tfuse_comments(); tfuse_pagination(); ?>
        </div>
        <?php tfuse_sidebar_right_type();?>
        <div class="clear"></div>
    </div>

    <!--/content -->
</div>
</div>
<!--/ middle -->
<?php get_footer(); ?>