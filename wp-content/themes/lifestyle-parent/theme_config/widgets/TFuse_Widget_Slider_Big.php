<?php

// =============================== Slider widget ======================================

class TFuse_slider_big extends WP_Widget {

    function TFuse_slider_big() {
        $widget_ops = array('description' => '' );
        parent::WP_Widget(false, __('TFuse - Slider Big', 'tfuse'),$widget_ops);
    }

    function widget($args, $instance) {
        $rand = rand(1,10000);

        extract( $args );
        $text = $instance['text'];
        (isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();
        if ( is_array($posts) ) { ?>

        <script type="text/javascript">

            jQuery(document).ready(function() {
                jQuery('.<?php echo $rand ?>').slides({
                    width: 300,
                    height: 200,
                    preload: true,
                    preloadImage: '<?php echo get_template_directory_uri() ?>/images/loading.gif',
                    paginationClass: 'pagination',
                    play: 5000,
                    pause: 2500,
                    effect: 'fade',
                    hoverPause: true
                });
            });
        </script>
        <div class="boxs box_slider extra-col" id="big_slides_wight">
            <div id="big_slides" class="<?php echo $rand ?>">
                <div class="slides_container">
                    <?php
                    $k=0;

                    foreach ($posts as $key=>$val) {
                        $k++;
                        if ($k==1)             $first = '  class="first" '; else $first = '';
                        if ($k==count($posts)) $last  = '  class="last" ';  else $last  = '';
                        $page = get_post($key);
                        if(isset($page))  {

                            $ff = tfuse_page_options('single_image',null,$page->ID);
                            $image = new TF_GET_IMAGE();
                            $tfuse_image = $image->width(300)->height(200)->src($ff)->get_img();
                            if($ff){
                                ?> <div><a href="<?php echo  $page->guid; ?>"><?php echo $tfuse_image ?></a></div>
                                <?php }} }?>
                </div>
            </div>
            <div class="short_description">
                <?php echo $text;?>
            </div>
        </div>
        <?php
        }
    }

    function form($instance) {
        $instance = wp_parse_args( (array) $instance, array( 'posts' => '','text' => '') );
        (isset($instance['posts'])) ? $posts = $instance['posts'] : $posts = array();
        $text = $instance['text'];

        ?>
    <p>
        <label for="<?php echo $this->get_field_id('text'); ?>"><?php _e('Slider Description','tfuse'); ?>:</label>
        <textarea class="widefat" id="<?php echo $this->get_field_id('text'); ?>" name="<?php echo $this->get_field_name('text'); ?>"><?php echo $text; ?></textarea>
    </p>
    <p>
        <label for="<?php echo $this->get_field_id('posts'); ?>"><?php _e('Slider Posts','tfuse'); ?></label>
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
register_widget('TFuse_slider_big');

?>