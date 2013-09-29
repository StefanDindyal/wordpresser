<?php
class TFuse_Widget_Testimonial extends WP_Widget {

    function TFuse_Widget_Testimonial()
    {
        $widget_ops = array('classname' => '', 'description' => __("Display and rotate your testimonials",'tfuse'));
        $this->WP_Widget('testimonial', __('TFuse - Testimonial','tfuse'), $widget_ops);
    }

    function widget( $args, $instance ) {
        extract($args);
        $title = apply_filters( 'widget_title',  empty($instance['title']) ? __('Testimonial','tfuse') : $instance['title'], $instance, $this->id_base);
        if (@$instance['random'])
            $order = '&order=ASC';
        else
            $order = '&orderby=rand';

        query_posts('post_type=testimonials&posts_per_page=-1' . $order);
        $k = 0;
        if (have_posts()) {
            while (have_posts()) {
                $k++;
                the_post();

                $slide = "";


                $slide .= '
                <div id="testimonials_manager_widget-4" class="box box_menu ww1231">
                    <h3>' .$title.'</h3>
                        <div id="quotes" class="quote">
                            <div class="inner1">
                           '. get_the_excerpt() . '
                            </div>
                            <span class="quote-author alignright">' . get_the_title() . '</span>
                            <div class="clear"></div>
                        </div>
                </div>
        ';
            } // End WHILE Loop
        } // End IF Statement
        wp_reset_query();

        echo $slide;

    }
    function update($new_instance, $old_instance)
    { $instance = $old_instance;
        $instance['random'] = isset($new_instance['random']);
        $instance['title'] = $new_instance['title'];
        return $instance;

    } // End function update

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'title' => '', 'random' => '') );
        $title = $instance['title'];

        ?>

    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" /></p>
    <p><input id="<?php echo $this->get_field_id('random'); ?>" name="<?php echo $this->get_field_name('random'); ?>" type="checkbox" <?php checked(isset($instance['random']) ? $instance['random'] : 0); ?> />&nbsp;<label for="<?php echo $this->get_field_id('random'); ?>"><?php _e('Disable Random','tfuse'); ?></label></p>
         <?php
       }

}
register_widget('TFuse_Widget_Testimonial'); ?>
