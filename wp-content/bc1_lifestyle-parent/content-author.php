<?php
/**
 * The template for displaying content in the single.php template.
 * To override this template in a child theme, copy this file 
 * to your child theme's folder.
 *
 * @since Sportedge 2.0
 */
/**
     * tfuse_user_profile() function is located in theme_config/theme_includes/THEME_FUNCTIONS.php
     * Create your own tfuse_user_profile() to override in a child theme or use filter tfuse_user_profile.
     * 
     * Specific wich fileds form user profile to retrive: first_name,last_name,email,url,aim,yim,jabber,facebook,twitter etc.
     * 
     * @since Sportedge 2.0
     */

?>
<?php
if (!tfuse_page_options('disable_author_info')){
    $tfuse_meta = tfuse_action_user_profile();
    if(get_the_author_meta('description')|| (isset($tfuse_meta['facebook']) && ($tfuse_meta['facebook'])) || (isset($tfuse_meta['twitter']) && ($tfuse_meta['twitter']))   || (isset($tfuse_meta['in']) && ($tfuse_meta['in'])) ) {
    ?>
<!-- author description -->
<div class="author-box">
    <div class="author-description">
        <div class="author-image"><?php echo get_avatar( get_the_author_meta( 'ID' ), '100' ); ?></div>
        <?php if(!tfuse_page_options('disable_author_info')): ?>
        <div class="author-text">
            <h4><?php echo get_the_author(); ?></h4>
            <p><?php the_author_meta( 'description' ); ?></p>
                <?php if ( (isset($tfuse_meta['facebook']) && ($tfuse_meta['facebook'])) || (isset($tfuse_meta['twitter']) && ($tfuse_meta['twitter']))   || (isset($tfuse_meta['in']) && ($tfuse_meta['in'])) ) : ?>
                    <div class="author-contact"><label><?php _e('CONTACT THE AUTHOR:', 'tfuse'); ?></label>
                    <?php foreach($tfuse_meta as $key => $item): ?>
                        <?php if ($item ) { ?> <a href="<?php echo $item;?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icons/social_<?php echo $key; ?>_2.png" alt="social" width="20" height="20" border="0" /></a><?php } ?>
                        <?php endforeach; ?>
                    </div>
                <?php endif;?>
        </div><?php endif; ?>
        <div class="clear"></div>
    </div>
</div>
<!--/ author description -->
<?php }
}?>
