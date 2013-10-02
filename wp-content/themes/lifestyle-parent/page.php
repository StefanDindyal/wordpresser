<?php global $is_tf_blog_page,$post,$is_tf_front_page,$page_class;
get_header();
if ($is_tf_blog_page)die;
$sidebar_position = tfuse_sidebar_position();
?>
<!-- middle -->
<div class="<?php if(is_home()){ echo 'cone'; } elseif(is_category()) { echo 'dome'; } elseif(is_page()){ echo 'dec'; } ?>">
<div <?php tfuse_class('middle');?>>
    <div class="container_24 fronter">
        <!-- featured list -->
        <?php tfuse_header_content(); ?>
        <div class="divider_thin"></div>
        <?php tfuse_sidebar_left_type() ?>
        <!--content -->
    <div class="<?php echo $page_class; ?> content">
        <?php echo   tfuse_shortcode_content('before');   ?>
        <div class="text">
        <?php if(have_posts()): the_post(); ?>
        <?php
        the_content();
        ?>
        <?php 
        // tfuse_comments(); 
        ?>
		</div>
            <?php echo   tfuse_shortcode_content('after');   ?>
	</div>
        <?php endif;?>
        <!--/ content -->
        <?php tfuse_sidebar_right_type();?>
        <div class="clear"></div>
    </div>
    <!--/content -->

</div>
</div>
<!--/ middle -->
<?php get_footer();?>
