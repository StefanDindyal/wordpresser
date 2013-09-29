<?php
class TFuse_Widget_Selected_Posts extends WP_Widget {

    function TFuse_Widget_Selected_Posts() {
        $widget_ops = array('description' => __( 'Show Selected Posts', 'tfuse') );
        parent::WP_Widget(false, __('TFuse - Selected Posts', 'tfuse'),$widget_ops);
    }

    function widget($args, $instance) {
        global $post;
        extract( $args );
        (isset($instance['title'])) ? $title = esc_attr($instance['title']) : $title = '';
        (isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();

        $before_widget = '<div class="box box_menu widget_tfuse_posts">';
        $after_widget = '</div>';
        $before_title = '<h3>';
        $after_title = '</h3>';

        echo $before_widget;
        $title = tfuse_qtranslate($title);
        if ( $title )
            echo $before_title . $title . $after_title;
        ?>

    <?php
        if ( is_array($posts) ) { ?>
        <ul >
            <?php
            $k=0;
            foreach ($posts as $key=>$val) {

                $k++;
                if ($k==1)             $first = '  first '; else $first = '';
                if ($k==count($posts)) $last  = '  last ';  else $last  = '';
                if ($key == @$post->ID) {$active = ' current-item ';} else $active='';
                $page = get_post($key);
                $thumbnail_image = tfuse_page_options('thumbnail_image','',$key);
                echo '<li class="'.$first.$last.$active.'">
									<a href="' . get_permalink($key) . '">' . $page->post_title . '</a>
								</li>';
            } ?>
        </ul>
        <?php
        }
        ?>
    <?php
        echo $after_widget;
    }

    function update($new_instance, $old_instance) {
        return $new_instance;
    }

    function form($instance) {
        $instance = wp_parse_args( (array) $instance, array(  'posts' => '', 'template' => '') );
        (isset($instance['title'])) ? $title = esc_attr($instance['title']) : $title = '';
        (isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();
        $template = esc_attr( $instance['template'] );
        ?>

    <p>
        <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
        <input type="text" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $title; ?>" class="widefat" id="<?php echo $this->get_field_id('title'); ?>" />
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Select Posts List','tfuse'); ?></label>
        <?php
        $tfuse_posts = array();
        $tfuse_posts_obj = get_posts('numberposts=-1');
        if (is_array($tfuse_posts_obj)) {
            foreach ($tfuse_posts_obj as $tfuse_post) { ?>
                <br /><br />
                <?php
                if ( isset($instance['posts'][$tfuse_post->ID]) ) $checked = ' checked="checked" '; else $checked = '';
                ?>

                <input <?php echo $checked; ?> type="checkbox" name="<?php echo $this->get_field_name('posts'); ?>[<?php echo $tfuse_post->ID;?>]" value="1" id="<?php echo $this->get_field_id('posts'); ?>" />&nbsp;&nbsp;<?php echo $tfuse_post->post_title; ?>
                <?php
            }
        }
        ?>
    </p>
    <?php
    }
}
register_widget('TFuse_Widget_Selected_Posts');

?>