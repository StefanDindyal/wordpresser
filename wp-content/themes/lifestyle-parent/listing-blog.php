<?php global $page_class;?>
<?php if(have_posts()) : while(have_posts()) : the_post();
    $category_get = get_query_var('cat');
    if(!isset($category_get)){
        $category_get = tfuse_blog_category() ;
    }
    ?>
<?php tfuse_ads_medle(); ?>
<div class="post-item">
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <div class="post-meta">
        <p class="icon_cat" style="color:<?php echo tfuse_options('cat_color',null,$category_get); ?>">
						<span class="categ_color_p">
							<?php /*<span class="align_catg"><?php
                                echo get_cat_name( $category_get);?></span>
                            <?php if(tfuse_options('cat_icon',null, $category_get)){echo '<img src="'. tfuse_options('cat_icon',null, $category_get).'" alt="'.get_cat_name( $category_get).'" />';}?>
							</span> */ ?>
                            <?php
                                // Get the URL of this category
                                $category_link = get_category_link( $get_cat_id );
                            ?>
                            <span class="align_catg">In: <a href="<?php echo esc_url( $category_link ); ?>"><?php echo get_cat_name( tfuse_blog_category());?></a></span>
        </p>
        <?php _e("Written by ","tfuse");?><span class="author"><?php the_author_posts_link(); ?></span> &nbsp;|&nbsp;<?php _e('on ','tfuse'); the_time('F jS, Y') ?> <?php /*&nbsp;|&nbsp; <a href="<?php comments_link(); ?>" class="link-comments">
            <?php comments_number("0 ".__('comments','tfuse'), "1 ".__('comment','tfuse'), "% ".__('comments','tfuse')); ?>
        </a>*/ ?>
    </div>
    <div class="clear"></div>
    <div class="entry">
        <?php
        tfuse_media();
        if ( tfuse_options('post_content') == 'content' ) the_content(''); else the_excerpt();
        ?>
        <ul class="lower-meta">
            <li class="fb"><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-layout="button_count" data-width="90" data-show-faces="false" data-font="trebuchet ms"></div></li>
            <li><a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php the_permalink(); ?>" data-count="none" data-text="<?php the_title(); ?>">Tweet</a></li>
            <li class="last"><a href="<?php the_permalink(); ?>" class="link-more"><?php _e("Read more","tfuse");?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<?php endwhile; else : ?>
<div class="<?php echo $page_class; ?> content">
    <div class="post-item">
        <p class="post-meta"><h2><?php _e('404 Error, page not found.','tfuse')?><h2></p>
        <div class="entry">
            <p><?php _e('Sorry! The content you are looking for is not here. This means one of two things. a) WordPress has broken and the sky will fall on your head, or b) nobody has posted anything that matches the URL you are at.','tfuse')?></p>
            <div class="clear"></div>
        </div>
    </div>
</div>
<?php endif;?>
