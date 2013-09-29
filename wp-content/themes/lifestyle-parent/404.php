<?php get_header();
tfuse_sidebar_position();
global $sidebar_l_1,$sidebar_l_2,$sidebar_r_1,$sidebar_r_2,$page_class;
$sidebar_position = $TFUSE->ext->sidebars->current_position;
?>
<!-- middle -->
<div <?php tfuse_class('middle');?>>
    <div class="container_24">
        <?php
        tfuse_header_content();
        ?>
        <div class="divider_thin"></div>
        <!--content -->
        <?php tfuse_sidebar_left_type(); ?>
    <div class="<?php echo $page_class; ?> content">
        <div class="text">
            <div class="post-title">
                <h1><?php _e('404 Error', 'tfuse') ?></h1>
            </div>
            <div class="entry">
                <p><?php _e('Page not found', 'tfuse') ?></p>
                <p><?php _e('The page you were looking for doesn&rsquo;t seem to exist', 'tfuse') ?>.</p>
            </div>
        </div>
    </div>
        <?php tfuse_sidebar_right_type(); ?>
        <div class="clear"></div>
    </div>
    <!--/content -->

</div>
<!--/ middle -->
<?php get_footer(); ?>