<?php
class TFuse_Widget_Recent_Posts extends WP_Widget {

    function TFuse_Widget_Recent_Posts() {
        $widget_ops = array('classname' => 'widget_recent_entries', 'description' => __( "The most recent posts on your site",'tfuse') );
        $this->WP_Widget('recent-posts', __('TFuse - Recent Posts','tfuse'), $widget_ops);
        $this->alt_option_name = 'widget_recent_entries';

        add_action( 'save_post', array(&$this, 'flush_widget_cache') );
        add_action( 'deleted_post', array(&$this, 'flush_widget_cache') );
        add_action( 'switch_theme', array(&$this, 'flush_widget_cache') );
    }

    function widget($args, $instance) {
        $cache = wp_cache_get('widget_recent_posts', 'widget');

        if ( !is_array($cache) )
            $cache = array();

        if ( isset($cache[$args['widget_id']]) ) {
            echo $cache[$args['widget_id']];
            return;
        }

        ob_start();
        extract($args);

        $title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts','tfuse') : $instance['title'], $instance, $this->id_base);
        if ( !$number = (int) $instance['number'] )
            $number = 10;
        else if ( $number < 1 )
            $number = 1;
        else if ( $number > 15 )
            $number = 15;

        $template = empty( $instance['template'] ) ? 'box_white' : $instance['template'];
        //if (is_home()) $template = '';

        $before_widget = '<div  class="box box_menu widget_recent_entries posts">';
        $after_widget = '</div>';
        $before_title = '<h3>';
        $after_title = '</h3>';

        $r = new WP_Query(array('showposts' => $number, 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1));
        if ($r->have_posts()) :
            ?>
        <?php echo $before_widget;

            $title = tfuse_qtranslate($title);
            if ( $title ) echo $before_title . $title . $after_title; ?>
        <ul>
            <?php  while ($r->have_posts()) : $r->the_post(); ?>
            <li><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>"><?php if ( get_the_title() ) the_title(); else the_ID(); ?></a></li>
            <?php endwhile; ?>
        </ul>
        <?php echo $after_widget; ?>
        <?php
            // Reset the global $the_post as this query will have stomped on it
            wp_reset_postdata();

        endif;

        $cache[$args['widget_id']] = ob_get_flush();
        wp_cache_set('widget_recent_posts', $cache, 'widget');
    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = $new_instance['title'];
        $instance['number'] = (int) $new_instance['number'];
        $this->flush_widget_cache();

        $alloptions = wp_cache_get( 'alloptions', 'options' );
        if ( isset($alloptions['widget_recent_entries']) )
            delete_option('widget_recent_entries');

        if ( in_array( $new_instance['template'], array( 'box_white', 'box_white box_border' ) ) ) {
            $instance['template'] = $new_instance['template'];
        } else {
            $instance['template'] = 'box_white';
        }

        return $instance;
    }

    function flush_widget_cache() {
        wp_cache_delete('widget_recent_posts', 'widget');
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array(  'template' => 'box_white',) );
        $title = isset($instance['title']) ? esc_attr($instance['title']) : '';
        if ( !isset($instance['number']) || !$number = (int) $instance['number'] )
            $number = 5;
        $template = esc_attr( $instance['template'] );
        ?>


    <p><label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:','tfuse'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" /></p>

    <p><label for="<?php echo $this->get_field_id('number'); ?>"><?php _e('Number of posts to show:','tfuse'); ?></label>
        <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" /></p>
    <?php
    }
}



function TFuse_Unregister_WP_Widget_Recent_Posts() {
    unregister_widget('WP_Widget_Recent_Posts');
}
add_action('widgets_init','TFuse_Unregister_WP_Widget_Recent_Posts');

register_widget('TFuse_Widget_Recent_Posts');
?>