<?php
if ( ! function_exists( 'tfuse_comment' ) ) :
    /**
     * The template for displaying content in the template-contact.php template.
     * To override this template in a child theme, copy this file
     * to your child theme's folder.
     *
     * @since Lifestyle 2.0
     */
    function tfuse_comment($comment, $args, $depth) {
        $GLOBALS['comment'] = $comment;
        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                ?>
    <li class="post pingback">
       <a name="comment-<?php comment_ID() ?>"></a>
                    <div id="li-comment-<?php comment_ID() ?>" class="comment-container comment-body">
                        <p><?php _e( 'Pingback:', 'tfuse' ); ?> <?php comment_author_link(); ?>
                            <span class="comment-date"><?php comment_date() ?></span>
                            <?php comment_text() ?>
                    </div><?php
                break;
            default :
                ?>
                <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <a name="comment-<?php comment_ID() ?>"></a>
                    <div id="li-comment-<?php comment_ID(); ?>" class="comment-container comment-body">
                        <div class="avatar"><?php echo get_avatar( $comment, 40 ); ?></div>
                        <div class="comment-text">
                            <div class="comment-author">
                                    <span class="link-author"><?php comment_author_link() ?></a></span><?php comment_date() ?>
                                         <span class="link-reply">
                                            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
                                         </span>
                                    </div>
                            <div class="comment-entry">
                                <?php comment_text() ?>
                            </div>
                            <?php if ( $comment->comment_approved == '0' ) : ?>
                            <p class='unapproved'><?php _e('Your comment is awaiting moderation.', 'tfuse'); ?></p>
                            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'tfuse' ); ?></em>
                            <br />
                            <?php endif; ?>
                        </div>
                        <!-- /.comment-head -->
                        <div id="comment-<?php comment_ID(); ?>"></div>
                        <div class="clear"></div>
                    </div>
                <?php
                break;
        endswitch;
    }
endif; // ends check for tfuse_comment()
