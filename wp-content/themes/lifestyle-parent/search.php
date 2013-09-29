<?php get_header();
tfuse_sidebar_position();
global $TFUSE,$sidebar_l_1,$sidebar_l_2,$sidebar_r_1,$sidebar_r_2,$page_class;
?>
<!-- middle -->
<div <?php tfuse_class('middle');?>>
    <div class="container_24">
        <!-- featured list -->
        <?php tfuse_header_content(); ?>
        <!--/ featured list -->
        <div class="divider_thin"></div>
        <?php tfuse_sidebar_left_type()  ?>
        <div class="<?php echo $page_class; ?> content">
            <div class="cat_title">
                <h1><?php printf( __( 'Search Results for: %s', 'tfuse' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
                <div class="clear"></div>
            </div>
            <?php if (have_posts()) : $count = 0; ?>
            <?php while (have_posts()) : the_post(); $count++; ?>
                <div class="post-item">
                    <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
                    <div class="post-meta">
                        <em><?php _e("by","tfuse");?>
                             <span class="author"><?php the_author_posts_link(); ?></span> &nbsp;|&nbsp; <?php _e("on","tfuse");?>
                            <?php the_time('F, jS Y') ?> &nbsp;|&nbsp;
                            <?php  comments_number("0 ".__('comments','tfuse'), "1 ".__('comment','tfuse'), "% ".__('comments','tfuse')); ?>
                        </em>
                    </div><!--/ .post-meta  -->
                    <div class="entry">
                        <?php
                        tfuse_media();
                        the_excerpt();
                        ?>
                        <a class="link-more" href="<?php the_permalink(); ?>"><?php _e("More","tfuse");?></a>
                        <div class="clear"></div>
                    </div><!-- /.entry -->
                </div><!-- /.post-item -->
                <!--/ post details -->
                <?php endwhile; else: ?>
            <h5><?php _e('Sorry, no posts matched your criteria.', 'tfuse') ?></h5>
            <?php endif; ?>
            <?php tfuse_pagination(); ?>
    </div>
        <?php tfuse_sidebar_right_type(); ?>
        <div class="clear"></div>
    </div>
    <!--/content -->

</div>
<!--/ middle -->
<?php get_footer(); ?>
