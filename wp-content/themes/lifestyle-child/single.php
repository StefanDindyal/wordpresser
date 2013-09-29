<?php get_header();
tfuse_sidebar_position();
global $TFUSE,$sidebar_l_1,$sidebar_l_2,$sidebar_r_1,$sidebar_r_2,$page_class;
$sidebar_position = $TFUSE->ext->sidebars->current_position;
$get_cat_id = get_the_category();
?>
<!-- middle -->
<div <?php tfuse_class('middle');?>>
    <div class="container_24">
        <!-- featured list -->
        <?php tfuse_header_content(); ?>
        <!--/ featured list -->
        <div class="divider_thin"></div>
<?php tfuse_sidebar_left_type() ;
        if(have_posts()): the_post();?>
        <!--content -->
        <div class="<?php echo $page_class; ?> content">
            <?php echo   tfuse_shortcode_content('before');   ?>
        <div class="text">
            <?php 
                // tfuse_media();
            ?>
            <br>
            <div class="post-item">
                <h2><?php the_title(); ?></h2>
                <div class="post-meta">
                    <p class="icon_cat" style="color:<?php echo tfuse_options('cat_color',null, tfuse_blog_category()); ?>">
						<span class="categ_color_p">
							<span class="align_catg"><?php echo get_cat_name( tfuse_blog_category());?></span>
							   <?php if(tfuse_options('cat_icon',null, tfuse_blog_category())){echo '<img src="'. tfuse_options('cat_icon',null, tfuse_blog_category()).'" alt="'. tfuse_blog_category().'" />';}?>
							</span>
                    </p>
                    <em>
                        <?php if ( !tfuse_page_options('disable_post_meta') ) : ?>
                        <?php  _e('by ', 'tfuse') ?><span class="author"><?php the_author_posts_link(); ?></span> &nbsp;|
                        <?php endif; ?>
                        <?php if ( !tfuse_page_options('disable_published_date') ) : ?>
                        &nbsp; <?php _e('on', 'tfuse') ?>&nbsp;<?php the_time('F jS, Y') ?> &nbsp;|&nbsp;
                        <?php endif; ?>
                        <?php /*<?php if ( !tfuse_page_options('disable_comments') ) : ?>
                        <a href="<?php comments_link(); ?>" class="link-comments"><?php comments_number("0 ".__('comments','tfuse'), "1 ".__('comment','tfuse'), "% ".__('comments','tfuse')); ?></a>
                        <?php endif; ?>*/ ?>
                    </em>
                </div>
                <?php echo   tfuse_shortcode_content('after');   ?>
            <?php 
                tfuse_media(); ?>
                <div class="clear"></div>
                <?php
                the_content();
                get_template_part("content-author");
                // tfuse_comments();?>
                <div id="fb_comments">
                    <div class="fb-comments" data-href="<?php the_permalink(); ?>" data-width="590"></div>                
               </div>
        </div>
        </div>
        <?php endif;?>

    </div>
        <?php tfuse_sidebar_right_type();?>
    <!--/content -->
        <div class="clear"></div>
    </div>

</div>
<!--/ middle -->
<?php get_footer(); ?>