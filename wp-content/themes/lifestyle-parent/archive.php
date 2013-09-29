<?php get_header();
global $page_class;
?>
<!-- middle -->
<div <?php tfuse_class('middle');?>>
    <div class="container_24">
        <!-- featured list -->
        <?php
        tfuse_header_content();
        ?>
        <!--/ featured list -->
        <div class="divider_thin"></div>
        <?php tfuse_sidebar_left_type() ?>
        <!--content -->
               <div class="<?php echo $page_class; ?> content">
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
<!--/ middle -->
<?php get_footer(); ?>