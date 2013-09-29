<?php

// =============================== Tabs widget ======================================

class TFuse_Widget_Tabs extends WP_Widget {

	function TFuse_Widget_Tabs() {
		$widget_ops = array('description' => '' );
		parent::WP_Widget(false, __('TFuse - Tabs', 'tfuse'),$widget_ops);
	}

	function widget($args, $instance) {
		extract( $args );
		if (isset($instance['number']))
        {
            $number =  esc_attr($instance['number']);
        }
        else
        {
            $number = 5;
        }
	?>
    <div class="tab_new_class">
	    <div class="tf_sidebar_tabs tabs_framed">
                <ul class="tabs">
                    <li><a href="#tf_tabs_1"><?php _e('Recent Posts','tfuse'); ?></a></li>
                    <li><a href="#tf_tabs_2"><?php _e('Recent Comments','tfuse'); ?></a></li>
                </ul>
                <div id="tf_tabs_1" class="tabcontent">
                    <ul class="post_list recent_posts">
                    <?php   $rec_posts =  tfuse_shortcode_posts(array('sort' => 'recent', 'items' => $number));

                    foreach($rec_posts as $recpost_val ):

                        ?>

                        <li>
                            <a href="<?php echo $recpost_val['post_link']; ?>"><?php echo $recpost_val['post_img']; ?></a>
                            <a href="<?php echo $recpost_val['post_link']; ?>"><?php echo $recpost_val['post_title']; ?></a>
                            <div class="date"><?php echo $recpost_val['post_date_post']; ?></div>
                        </li>
                        <?php  endforeach; ?>
                    </ul>
                </div>
                <div id="tf_tabs_2" class="tabcontent">
                    <ul class="post_list recent_posts">
                        <?php
                            $comments = get_comments( array( 'number' => $number, 'status' => 'approve' ) );
                            if ( $comments ) {
                                $output = '';
                                foreach ( (array) $comments as $comment) {
                                    $output .=  '<li class="recentcomments">' . get_comment_author_link($comment->comment_ID) . ' on <a href="' . esc_url( get_comment_link($comment->comment_ID) ) . '">' . get_the_title($comment->comment_post_ID) . '</a><div class="date">' . get_comment_date('F jS, Y') . '</div> </li>';
                                }
                            }
                            echo $output;
                        ?>
                    </ul>
                </div>
        </div>
    </div>
	   <?php
        }

        function update($new_instance, $old_instance) {
            return $new_instance;
        }

        function form($instance) {
            $instance = wp_parse_args( (array) $instance, array(  'number' => '') );
            $number = esc_attr($instance['number']);
            ?>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts','tfuse'); ?>:</label>
            <input type="text" name="<?php echo $this->get_field_name('number'); ?>" value="<?php echo $number; ?>" class="widefat" id="<?php echo $this->get_field_id('number'); ?>" />
        </p>
        <?php
	}
}
register_widget('TFuse_Widget_Tabs');
