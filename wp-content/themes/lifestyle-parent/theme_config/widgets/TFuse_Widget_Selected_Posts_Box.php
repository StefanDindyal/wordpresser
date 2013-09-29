<?php
class TFuse_Widget_Selected_Posts_Box extends WP_Widget {

    function TFuse_Widget_Selected_Posts_Box() {
        $widget_ops = array('description' => __( 'Show Selected Posts', 'tfuse') );
        parent::WP_Widget(false, __('TFuse - Selected Posts Box', 'tfuse'),$widget_ops);
    }

    function widget($args, $instance) {
        global $post;
        extract( $args );
        (isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();

        $before_widget = '<div class="extra-col">';
        $after_widget = '</div>';
        echo $before_widget;
        if ( is_array($posts) ) {
        foreach ($posts as $key=>$val) {
            $array_commented = new WP_Query('p='.$key);
            $array_commented->have_posts();
            $array_commented->the_post();
             ?>
                <div class="short_description">
                    <h3><a href="<?php  the_permalink();  ?>"><?php the_title();  ?></a></h3>
                    <p><?php if (tfuse_options('post_content') == 'content' ) the_content(''); else the_excerpt(); ?></p>
                </div>
                <?php
            wp_reset_postdata();
        }
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
        <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Select Posts List','tfuse'); ?></label>
        <?php
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
register_widget('TFuse_Widget_Selected_Posts_Box');

?>