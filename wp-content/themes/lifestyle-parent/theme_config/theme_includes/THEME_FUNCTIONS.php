<?php

if (!function_exists('tfuse_browser_body_class')):

    /* This Function Add the classes of body_class()  Function
     * To override tfuse_browser_body_class() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
    */

    add_filter('body_class', 'tfuse_browser_body_class');

    function tfuse_browser_body_class() {

        global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

        if ($is_lynx)
            $classes[] = 'lynx';
        elseif ($is_gecko)
            $classes[] = 'gecko';
        elseif ($is_opera)
            $classes[] = 'opera';
        elseif ($is_NS4)
            $classes[] = 'ns4';
        elseif ($is_safari)
            $classes[] = 'safari';
        elseif ($is_chrome)
            $classes[] = 'chrome';
        elseif ($is_IE) {
            $browser = $_SERVER['HTTP_USER_AGENT'];
            $browser = substr("$browser", 25, 8);
            if ($browser == "MSIE 7.0")
                $classes[] = 'ie7';
            elseif ($browser == "MSIE 6.0")
                $classes[] = 'ie6';
            elseif ($browser == "MSIE 8.0")
                $classes[] = 'ie8';
            else
                $classes[] = 'ie';
        }
        else
            $classes[] = 'unknown';

        if ($is_iphone)
            $classes[] = 'iphone';

        return $classes;
    } // End function tfuse_browser_body_class()
endif;


if (!function_exists('tfuse_class')) :
    /* This Function Add the classes for middle container
     * To override tfuse_class() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
    */

    function tfuse_class($param, $return = false) {
        $tfuse_class = '';
        $sidebar_position = tfuse_sidebar_position();
        if ($param == 'middle') {
            if (is_page_template('template-contact.php')) {
                if ($sidebar_position == 'left')
                    $tfuse_class = ' class="middle sidebarLeft nobg"';
                elseif ($sidebar_position == 'right')
                    $tfuse_class = ' class="middle sidebarRight nobg"';
                else
                    $tfuse_class = ' class="middle"';
            }
            else {
                if ($sidebar_position == 'left')
                    $tfuse_class = ' class="middle sidebarLeft"';
                elseif ($sidebar_position == 'right')
                    $tfuse_class = ' class="middle sidebarRight"';
                else
                    $tfuse_class = ' class="middle"';
            }
        }
        elseif ($param == 'content') {
            $tfuse_class = ( isset($sidebar_position) && $sidebar_position != 'full' ) ? ' class="grid_8 content"' : ' class="content"';
        }

        if ($return)
            return $tfuse_class;
        else
            echo $tfuse_class;
    }
endif;


if (!function_exists('tfuse_sidebar_position')):
    /* This Function Set sidebar position
     * To override tfuse_sidebar_position() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
    */
    function tfuse_sidebar_position() {
        global $TFUSE,$sidebar_l_1,$sidebar_l_2,$sidebar_r_1,$sidebar_r_2,$page_class;

        $sidebar_position = $TFUSE->ext->sidebars->current_position;

        if ($sidebar_position=='right_big') {
            $sidebar_l_1 = '';
            $sidebar_l_2 = '';

            $sidebar_r_1 = 'grid_8';
            $sidebar_r_2 = '';

            $page_class = 'grid_15 suffix_1';
        }
        elseif ($sidebar_position=='left_big') {
            $sidebar_l_1 = 'grid_8 suffix_1';
            $sidebar_l_2 = '';

            $sidebar_r_1 = '';
            $sidebar_r_2 = '';

            $page_class = 'grid_15';
        }
        elseif ($sidebar_position=='right_small') {
            $sidebar_l_1 = '';
            $sidebar_l_2 = '';

            $sidebar_r_1 = '';
            $sidebar_r_2 = 'grid_6';

            $page_class = 'grid_17 suffix_1';
        }
        elseif ($sidebar_position=='left_small') {
            $sidebar_l_1 = '';
            $sidebar_l_2 = 'grid_6 suffix_1';

            $sidebar_r_1 = '';
            $sidebar_r_2 = '';

            $page_class = 'grid_17';
        }
        elseif ($sidebar_position=='right_big_small' ) {
            $sidebar_l_1 = '';
            $sidebar_l_2 = '';

            $sidebar_r_1 = 'grid_8';
            $sidebar_r_2 = 'grid_6';

            $page_class = 'grid_10';
        }
        elseif ($sidebar_position=='left_big_small') {
            $sidebar_l_1 = 'grid_8';
            $sidebar_l_2 = 'grid_6';

            $sidebar_r_1 = '';
            $sidebar_r_2 = '';

            $page_class = 'grid_10';
        }
        elseif ($sidebar_position=='right_small_big') {
            $sidebar_l_1 = '';
            $sidebar_l_2 = '';

            $sidebar_r_1 = 'grid_8';
            $sidebar_r_2 = 'grid_6';

            $page_class = 'grid_10';
        }
        elseif ($sidebar_position=='left_small_big') {
            $sidebar_l_1 = 'grid_8';
            $sidebar_l_2 = 'grid_6';

            $sidebar_r_1 = '';
            $sidebar_r_2 = '';

            $page_class = 'grid_10';
        }
        elseif ($sidebar_position=='right_big_left_small') {
            $sidebar_l_1 = '';
            $sidebar_l_2 = 'grid_6';

            $sidebar_r_1 = 'grid_8';
            $sidebar_r_2 = '';

            $page_class = 'grid_10';
        }
        elseif ($sidebar_position=='right_small_left_big') {
            $sidebar_l_1 = 'grid_8';
            $sidebar_l_2 = '';

            $sidebar_r_1 = '';
            $sidebar_r_2 = 'grid_6';

            $page_class = 'grid_10';
        }
        elseif ($sidebar_position=='full') {
            $sidebar_l_1 = '';
            $sidebar_l_2 = '';

            $sidebar_r_1 = '';
            $sidebar_r_2 = '';

            $page_class = '';
        }
        return $sidebar_position;


    }

// End function tfuse_sidebar_position()
endif;


function tfuse_sidebar_left_type(){
    global $TFUSE,$sidebar_l_1,$sidebar_l_2,$sidebar_r_1,$sidebar_r_2,$page_class;
    $sidebar_position = $TFUSE->ext->sidebars->current_position;

    if($sidebar_position =='left_small_big'){
        echo " <!-- sidebar -->";
        if ($sidebar_l_2!='') {
            echo   '<div class="'.$sidebar_l_2.'">';
            get_sidebar('second'); echo '</div>';
        }
        if ($sidebar_l_1!='') {
            echo   '<div class="'.$sidebar_l_1.'">';
            get_sidebar();
            echo '</div>';
        }
        echo " <!--/ sidebar -->";

    }else{

        echo " <!-- sidebar -->";
        if ($sidebar_l_1!='') {
            echo   '<div class="'.$sidebar_l_1.'">';
            get_sidebar();
            echo '</div>';
        }
        if ($sidebar_l_2!='') {
            echo   '<div class="'.$sidebar_l_2.'">';
            get_sidebar('second'); echo '</div>';
        }
        echo " <!--/ sidebar -->";
    }


}


function tfuse_sidebar_right_type(){
    global $TFUSE,$sidebar_l_1,$sidebar_l_2,$sidebar_r_1,$sidebar_r_2,$page_class;
    $sidebar_position = $TFUSE->ext->sidebars->current_position;

    if($sidebar_position =='right_small_big'||$sidebar_position =='right_small_left_big'){
        echo " <!-- sidebar -->";
        if ($sidebar_r_2!='') {
            echo   '<div class="'.$sidebar_r_2.'">';
            get_sidebar('second'); echo '</div>';
        }
        if ($sidebar_r_1!='') {
            echo   '<div class="'.$sidebar_r_1.'">';
            get_sidebar();
            echo '</div>';
        }
        echo " <!--/ sidebar -->";

    }else{

        echo " <!-- sidebar -->";
        if ($sidebar_r_1!='') {
            echo   '<div class="'.$sidebar_r_1.'">';
            get_sidebar();
            echo '</div>';
        }
        if ($sidebar_r_2!='') {
            echo   '<div class="'.$sidebar_r_2.'">';
            get_sidebar('second'); echo '</div>';
        }
        echo " <!--/ sidebar -->";
    }


}




if (!function_exists('tfuse_count_post_visits')) :
    /**
     * tfuse_count_post_visits.
     *
     * To override tfuse_count_post_visits() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_count_post_visits()
    {
        if ( !is_single() ) return;

        global $post,$TFUSE;

        $tfuse_count =  get_post_meta($post->ID, TF_THEME_PREFIX . '_post_viewed', true);
        if ( empty($tfuse_count) ) $tfuse_count = 0;

        $popularArr = ( !$TFUSE->request->empty_COOKIE('popular')) ? explode(',', $TFUSE->request->COOKIE('popular')) : array();

        if ( !in_array($post->ID, $popularArr) )
        {
            update_post_meta($post->ID, TF_THEME_PREFIX . '_post_viewed', ++$tfuse_count);
            $popularArr[] = $post->ID;
            @setcookie('popular', implode(',', $popularArr),0,'/');
        }
    }
    add_action('wp_head', 'tfuse_count_post_visits');

// End function tfuse_count_post_visits()
endif;


if (!function_exists('tfuse_custom_title')):

    function tfuse_custom_title() {
        global $post;
        $tfuse_title_type = tfuse_page_options('page_title');

        if ($tfuse_title_type == 'hide_title')
            $title = '';
        elseif ($tfuse_title_type == 'custom_title')
            $title = tfuse_page_options('custom_title');
        else
            $title = get_the_title();

        echo ( $title ) ? '<h1>' . $title . '</h1>' : '';
    }

endif;

if (!function_exists('tfuse_archive_custom_title')):
    /**
     *  Set the name of post archive.
     *
     * To override tfuse_archive_custom_title() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_archive_custom_title()
    {
        $cat_ID = 0;
        if ( is_category() )
        {
            $cat_ID = get_query_var('cat');
            $title = single_term_title( '', false );
        }
        elseif ( is_tax() )
        {
            $term = get_term_by('slug', get_query_var('term'), get_query_var('taxonomy'));
            $cat_ID = $term->term_id;
            $title = single_term_title( $term->name , false );
        }
        elseif ( is_post_type_archive() )
        {
            $title = post_type_archive_title('',false);
        }

        $tfuse_title_type = tfuse_options('page_title',null,$cat_ID);

        if ($tfuse_title_type == 'hide_title')
            $title = '';
        elseif ($tfuse_title_type == 'custom_title')
            $title = tfuse_options('custom_title',null,$cat_ID);

        echo !empty($title) ? '<h1>' . $title . '</h1>' : '';
    }

endif;



if (!function_exists('tfuse_user_profile')) :
    /**
     * Retrieve the requested data of the author of the current post.
     *
     * @param array $fields first_name,last_name,email,url,aim,yim,jabber,facebook,twitter etc.
     * @return null|array The author's spefified fields from the current author's DB object.
     */
    function tfuse_user_profile( $fields = array() )
    {
        $tfuse_meta = null;

        // Get stnadard user contact info
        $standard_meta = array(
            'first_name' => get_the_author_meta('first_name'),
            'last_name' => get_the_author_meta('last_name'),
            'email'     => get_the_author_meta('email'),
            'url'       => get_the_author_meta('url'),
            'aim'       => get_the_author_meta('aim'),
            'yim'       => get_the_author_meta('yim'),
            'jabber'    => get_the_author_meta('jabber')
        );

        // Get extended user info if exists
        $custom_meta = (array) get_the_author_meta('theme_fuse_extends_user_options');

        $_meta = array_merge($standard_meta,$custom_meta);

        foreach ($_meta as $key => $item) {
            if ( !empty($item) && in_array($key, $fields) ) $tfuse_meta[$key] = $item;
        }

        return apply_filters('tfuse_user_profile', $tfuse_meta, $fields);
    }

endif;


if (!function_exists('tfuse_action_comments')) :
    /**
     *  This function disable post commetns.
     *
     * To override tfuse_action_comments() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_action_comments() {
        global $post;
        if (!tfuse_page_options('disable_comments'))
            comments_template( '', true );
    }

    add_action('tfuse_comments', 'tfuse_action_comments');
endif;


if (!function_exists('tfuse_get_comments')):
    /**
     *  Get post comments for a specific post.
     *
     * To override tfuse_get_comments() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_get_comments($return = TRUE, $post_ID) {
        $num_comments = get_comments_number($post_ID);

        if (comments_open($post_ID)) {
            if ($num_comments == 0) {
                $comments = __('No Comments',"tfuse");
            } elseif ($num_comments > 1) {
                $comments = $num_comments . __(' Comments',"tfuse");
            } else {
                $comments = "1". __(' Comment',"tfuse");
            }
            $write_comments = '<a class="link-comments" href="' . get_comments_link() . '">' . $comments . '</a>';
        } else {
            $write_comments = __('Comments are off',"tfuse");
        }
        if ($return)
            return $write_comments;
        else
            echo $write_comments;
    }

endif;


if (!function_exists('tfuse_pagination')) :
    /**
     * Display pagination to next/previous pages when applicable.
     *
     * To override tfuse_pagination() in a child theme, add your own tfuse_pagination()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */
    function tfuse_pagination() {
        global $wp_query;

        if ( $wp_query->max_num_pages > 1 ) : ?>
        <div class="other_posts">
            <?php next_posts_link( '<span class="nextp">'. __('more posts', 'tfuse').'</span>'); ?>
            <?php previous_posts_link('<span class="prevp">'.  __('older posts', 'tfuse').'</span>'); ?>
        </div>
        <?php endif;
    }
endif; // tfuse_pagination


if (!function_exists('tfuse_shortcode_content')) :
    /**
     *  Get post comments for a specific post.
     *
     * To override tfuse_shortcode_content() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_shortcode_content($position = '', $return = false)
    {
        $page_shortcodes = '';
        global $is_tf_front_page,$is_tf_blog_page,$post;
        $position = ( $position == 'before' ) ? 'content_top' : 'content_bottom';
        if ($is_tf_blog_page) {
            $page_shortcodes = tfuse_options($position);
        }
        elseif ($is_tf_front_page) {
            if(tfuse_options('use_page_options') && tfuse_options('homepage_category')=='page'){
                $page_id = $post->ID;
                $page_shortcodes = tfuse_page_options($position,'',$page_id);
            }
            else
                $page_shortcodes = tfuse_options($position);
        }
        elseif (is_singular()) {
            global $post;
            $page_shortcodes = tfuse_page_options($position);
        } elseif (is_category()) {
            $cat_ID = get_query_var('cat');
            $page_shortcodes = tfuse_options($position, '', $cat_ID);
        } elseif (is_tax()) {
            $taxonomy = get_query_var('taxonomy');
            $term = get_term_by('slug', get_query_var('term'), $taxonomy);
            $cat_ID = $term->term_id;
            $page_shortcodes = tfuse_options($position, '', $cat_ID);
        }

        $page_shortcodes = tfuse_qtranslate($page_shortcodes);

        $page_shortcodes = apply_filters('themefuse_shortcodes', $page_shortcodes);

        if ($return)
            return $page_shortcodes; else
            echo $page_shortcodes;
    }

// End function tfuse_shortcode_content()
endif;


if (!function_exists('tfuse_category_on_front_page')) :
    /**
     * Dsiplay homepage category
     *
     * To override tfuse_category_on_front_page() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_category_on_front_page()
    {
        if ( !is_front_page() ) return;

        global $is_tf_front_page,$homepage_categ;
        $is_tf_front_page = false;

        $homepage_category = tfuse_options('homepage_category');
        $homepage_category = explode(",",$homepage_category);
        foreach($homepage_category as $homepage)
        {
            $homepage_categ = $homepage;
        }

        if($homepage_categ == 'specific')
        {
            $is_tf_front_page = true;
            $archive = 'archive.php';
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $specific = tfuse_options('categories_select_categ');

            $items = get_option('posts_per_page');
            $ids = explode(",",$specific);
            $posts = array(); $num_post = 0;
            foreach ($ids as $id){
                $posts[] = get_posts(array('category' => $id));
            }
            foreach($posts as $post)
            {
                $num_posts = count($post);
                $num_post += $num_posts;
            }
            $max = $num_post/$items;
            if($num_posts%$items) $max++;

            $args = array(
                'cat' => $specific,
                'orderby' => 'date',
                'paged' => $paged
            );
            query_posts($args);


            wp_localize_script(
                'tf-load-posts',
                'nr_posts',
                array(
                    'max' => $max
                )
            );

            include_once(locate_template($archive));

            return;
        }
        elseif($homepage_categ == 'page')
        {
            global $front_page;
            $is_tf_front_page = true;
            $front_page = true;
            $archive = 'page.php';
            $page_id = tfuse_options('home_page');

            $args=array(
                'page_id' => $page_id,
                'post_type' => 'page',
                'post_status' => 'publish',
                'posts_per_page' => 1,
                'ignore_sticky_posts'=> 1
            );
            query_posts($args);
            include_once(locate_template($archive));
            wp_reset_query();
            return;
        }
        elseif($homepage_categ == 'all')
        {
            $archive = 'archive.php';

            $is_tf_front_page = true;
            wp_reset_postdata();
            include_once(locate_template($archive));
            return;
        }

    }

// End function tfuse_category_on_front_page()
endif;

if (!function_exists('tfuse_category_on_blog_page')) :
    /**
     * Dsiplay blogpage category
     *
     * To override tfuse_category_on_blog_page() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_category_on_blog_page()
    {

        global $is_tf_blog_page,$blogpage_categ;
        if ( !$is_tf_blog_page ) return;
        $is_tf_blog_page = false;

        $blogpage_category = tfuse_options('blogpage_category');
        $blogpage_category = explode(",",$blogpage_category);
        foreach($blogpage_category as $blogpage)
        {
            $blogpage_categ = $blogpage;
        }

        if($blogpage_categ == 'specific')
        {
            $is_tf_blog_page = true;
            $archive = 'archive.php';
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

            $specific = tfuse_options('categories_select_categ_blog');

            $items = get_option('posts_per_page');
            $ids = explode(",",$specific);
            $posts = array(); $num_post = 0;
            foreach ($ids as $id){
                $posts[] = get_posts(array('category' => $id));
            }
            foreach($posts as $post)
            {
                $num_posts = count($post);
                $num_post += $num_posts;
            }
            $max = $num_post/$items;
            if($num_posts%$items) $max++;

            $args = array(
                'cat' => $specific,
                'orderby' => 'date',
                'paged' => $paged
            );
            query_posts($args);
            wp_localize_script(
                'tf-load-posts',
                'nr_posts',
                array(
                    'max' => $max
                )
            );
            include_once(locate_template($archive));
            return;
        }
        elseif($blogpage_categ == 'all')
        {
            $is_tf_blog_page = true;
            $archive = 'archive.php';
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $categories = get_categories();

            $ids = array();
            foreach($categories as $cats){
                $ids[] = $cats -> term_id;
            }
            $items = get_option('posts_per_page');
            $posts = array(); $num_post = 0;

            foreach ($ids as $id){
                $posts[] = get_posts(array('category' => $id));
            }
            foreach($posts as $post)
            {
                $num_posts = count($post);
                $num_post += $num_posts;
            }
            $max = $num_post/$items;
            if($num_posts%$items) $max++;

            $args = array(
                'orderby' => 'date',
                'paged' => $paged
            );
            query_posts($args);
            wp_localize_script(
                'tf-load-posts',
                'nr_posts',
                array(
                    'max' => $max
                )
            );
            include_once(locate_template($archive));
            return;
        }
    }
// End function tfuse_category_on_blog_page()
endif;



if (!function_exists('tfuse_action_footer')) :
    /**
     * Dsiplay footer content
     *
     * To override tfuse_category_on_front_page() in a child theme, add your own tfuse_count_post_visits()
     * to your child theme's theme_config/theme_includes/THEME_FUNCTIONS.php file.
     */

    function tfuse_action_footer() {
        if(is_active_sidebar('bottom-1')||is_active_sidebar('bottom-2')||is_active_sidebar('bottom-3')||is_active_sidebar('bottom-4')){
            ?>
        <div class="bottom_content">
            <div class="container_24">
                <div class="inner2">
                    <div class="grid_6">
                        <div class="widget">
                            <?php dynamic_sidebar('bottom-1');?>
                        </div>
                    </div><!-- /.grid_2 -->

                    <div class="grid_6">
                        <div class="widget">
                            <?php dynamic_sidebar('bottom-2'); ?>
                        </div>
                    </div><!-- /.grid_2 -->

                    <div class="grid_6">
                        <div class="widget">
                            <?php dynamic_sidebar('bottom-3'); ?>
                        </div>
                    </div><!-- /.grid_2 -->

                    <div class="grid_6">
                        <div class="widget">
                            <?php dynamic_sidebar('bottom-4'); ?>
                        </div>
                    </div><!-- /.grid_2 -->
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <?php
        }
    }

    add_action('tfuse_footer', 'tfuse_action_footer');
endif;



if (!function_exists('tfuse_action_social')) :
    function tfuse_action_social() {
        if((tfuse_options('feedburner_url')==true)||(tfuse_options('twitter_id')==true)||(tfuse_options('facebook_id')==true)||(tfuse_options('instagram_id')==true))
        {?>
        <?php
            if(tfuse_options('feedburner_url'))
            {
                echo'<a href="';
                echo tfuse_options('feedburner_url') ;
                echo'" class="social-rss"  target="_blank"><strong>';
                // _e('RSS',"tfuse");
                echo'</strong>';
                // _e('subscribe',"tfuse");
                echo '</a>';
            }
            ?>
        <?php
            if(tfuse_options('twitter_id'))
            {
                echo'<a href="';
                echo tfuse_options('twitter_id') ;
                echo'" class="social-twitter" target="_blank"><strong>';
                // _e('Follow us',"tfuse");
                echo'</strong>';
                // _e('on Twitter',"tfuse");
                echo'</a>';
            }
            ?>
        <?php
            if(tfuse_options('facebook_id'))
            {echo'<a href="';
                echo tfuse_options('facebook_id') ;
                echo'" class="social-facebook"  target="_blank"><strong>';
                // _e('Join us',"tfuse");
                echo'</strong>';
                // _e('on Facebook',"tfuse");
                echo '</a>';
            }
            ?>
        <?php
            if(tfuse_options('instagram_id'))
            {echo'<a href="';
                echo tfuse_options('instagram_id') ;
                echo'" class="social-instagram"  target="_blank"><strong>';
                // _e('Join us',"tfuse");
                echo'</strong>';
                // _e('on Instagram',"tfuse");
                echo '</a>';
            }
            ?>
        <?php }

    }

    add_action('tfuse_social', 'tfuse_action_social');
endif;

add_filter('get_archives_link','tfuse_wid_link',99);
if (!function_exists('tfuse_wid_link')) :
    function  tfuse_wid_link($url) {
        $url = str_replace( '</a>&nbsp;', '&nbsp;', $url );
        $url = str_replace( '</li>', '</a></li>', $url );
        return $url;
    }endif;

add_filter('wp_list_bookmarks','tfuse_wid_link1',99);
if (!function_exists('tfuse_wid_link1')) :
    function  tfuse_wid_link1($url) {
        $url = str_replace( '</a>', '', $url );
        $url = str_replace( '</li>', '</a></li>', $url );
        return $url;
    }
endif;
add_filter('wp_list_categories','tfuse_wid_link2',99);
if (!function_exists('tfuse_wid_link2')) :
    function  tfuse_wid_link2($url) {
        if($url == ")"){
            $url = str_replace( '</a>', '', $url );
            $url = str_replace( ')', ')</a>', $url );
        }
        return $url;
    }endif;

function tfuse_search()
{
    ob_start();
    locate_template('searchform.php', true, false);
    $buffer = ob_get_contents();
    ob_end_clean();

    return $buffer;
}
/*Adds*/
function tfuse_top_adds($echo = FALSE) {
    global $TFUSE;
    $top_adds = null;

    if( tfuse_options('top_ads_space')&&!tfuse_options('top_ads_image')&&!tfuse_options('top_ads_adsense')){
        $top_adds =  '
            <!-- Top Banner-->
                <div class="adv_head_728x90">
                    <img src="'.tfuse_get_file_uri('/images/advert.gif').'" alt="advert">
                </div>
            <!--/ Top Banner-->';
    }elseif( tfuse_options('top_ads_space')&&tfuse_options('top_ads_image')&&!tfuse_options('top_ads_adsense'))
    {
        $top_adds = '
          <!-- Top Banner-->
          <div class="adv_head_728x90">
            <a href="'.tfuse_options('top_ads_url').'"  target="_blank"><img src="'.tfuse_options('top_ads_image').'" alt="advert"></a>
          </div>
          <!--/ Top Banner-->
          ';
    }elseif(tfuse_options('top_ads_adsense')&&tfuse_options('top_ads_space')&&!tfuse_options('top_ads_image')||tfuse_options('top_ads_adsense')&& tfuse_options('top_ads_space')&&tfuse_options('top_ads_image'))
    {
        $top_adds =  '<!-- Top Banner-->'.tfuse_options('top_ads_adsense').'<!--/ Top Banner-->';
    }
    else if(get_the_title($TFUSE->request->GET('page_id'))=="BANNERS ON"){
        $top_adds =  '
            <!-- Top Banner-->
                <div class="adv_head_728x90">
                    <img src="'.tfuse_get_file_uri('/images/advert.gif').'" alt="advert">
                </div>
            <!--/ Top Banner-->';

    }else{
        $top_adds="";
    }
    $top_adds = apply_filters( 'widget_text', $top_adds );
    return tfuse_options('adds', $top_adds);


}
function tfuse_footer_adds($echo = FALSE) {
    $page_id = null;
    global $TFUSE;
    if($TFUSE->request->isset_GET('page_id')){$page_id = $TFUSE->request->GET('page_id');}
    if( tfuse_options('footer_ads_space')&&!tfuse_options('footer_ads_image')&&!tfuse_options('footer_ads_adsense')){
        $footer_adds =  '
            <!-- footer Banner-->
                <div class="adv_head_728x90">
                    <img src="'.tfuse_get_file_uri('/images/advert.gif').'" alt="advert">
                </div>
            <!--/ footer Banner-->';
    }elseif( tfuse_options('footer_ads_space')&&tfuse_options('footer_ads_image')&&!tfuse_options('footer_ads_adsense'))
    {
        $footer_adds = '
          <!-- footer Banner-->
          <div class="adv_head_728x90">
            <a href="'.tfuse_options('footer_ads_url').'"  target="_blank"><img src="'.tfuse_options('footer_ads_image').'" alt="advert"></a>
          </div>
          <!--/ footer Banner-->
          ';
    }elseif(tfuse_options('footer_ads_adsense')&&tfuse_options('footer_ads_space')&&!tfuse_options('footer_ads_image')||tfuse_options('footer_ads_adsense')&& tfuse_options('footer_ads_space')&&tfuse_options('footer_ads_image'))
    {
        $footer_adds =  '<!-- footer Banner-->'.tfuse_options('footer_ads_adsense').'<!--/ footer Banner-->';
    }
    else if(get_the_title($TFUSE->request->GET('page_id'))=="BANNERS ON"){
        $footer_adds =  '
            <!-- footer Banner-->
                <div class="adv_head_728x90">
                    <img src="'.tfuse_get_file_uri('/images/advert.gif').'" alt="advert">
                </div>
            <!--/ footer Banner-->';

    }else{
        $footer_adds="";
    }
    $footer_adds = apply_filters( 'widget_text', $footer_adds );
    return tfuse_options('adds', $footer_adds);
}

function tfuse_ads($echo = FALSE) {
    if(tfuse_options('ads_space')=='1'&&!tfuse_options('ads_image')&&!tfuse_options('ads_adsense')){
        $ads =  '
            <!-- footer Banner-->
                <div class="adv_mid_468x60">
                    <img src="'.tfuse_get_file_uri('/images/adv_468x60.gif').'" alt="advert">
                </div>
            <!--/ footer Banner-->';
    }
    elseif(tfuse_options('ads_adsense')&&!tfuse_options('ads_image')||tfuse_options('ads_adsense')&&tfuse_options('ads_image'))
    {
        $ads =  '<!-- footer Banner-->'.tfuse_options('ads_adsense').'<!--/ footer Banner-->';
    }
    elseif(tfuse_options('ads_image')&&!tfuse_options('ads_adsense'))
    {
        $ads = '
          <!-- footer Banner-->
          <div class="adv_head_728x90">
            <a href="'.tfuse_options('ads_url').'"  target="_blank"><img src="'.tfuse_options('ads_image').'" alt="advert"></a>
          </div>
          <!--/ footer Banner-->
          ';
    }
    else
    {
        $ads = '';
    }
    $ads = apply_filters( 'widget_text', $ads );
    return tfuse_options('adds', $ads);
}


function tfuse_ads_medle($echo = FALSE) {
    global $post,$wp_query;
    if($post->ID == $wp_query->posts[$wp_query->post_count/2]->ID ){echo tfuse_ads();}

}

/*Sort BY*/
if (!function_exists('tfuse_sort_by')) :
    function tfuse_sort_by() {
        global $TFUSE,$is_tf_front_page;
        if($TFUSE->request->isset_GET('sort')){$sort_by =  $TFUSE->request->GET('sort');}else{$sort_by = '';}
        $category_get_sort = $TFUSE->request->GET('cat');
        $get_the_categ = get_the_category();
        if($category_get_sort){$post_cat =  $category_get_sort;}else{$post_cat = isset($get_the_categ[0]->cat_ID);}
        $page_id_s = $cat_id = $page_id = $cat_id_s =null;
        if($TFUSE->request->isset_GET('page_id')){$page_id = $TFUSE->request->GET('page_id');}
        if(is_page()){$page_id = get_the_ID();}
        if($TFUSE->request->isset_GET('cat')){$cat_id = $TFUSE->request->GET('cat');}
        if(is_category()){$cat_id =  get_query_var('cat'); }
        if($page_id > 0){

            $page_id_s = 'page_id='.$page_id.'&';
        }
        if($cat_id > 0){

            $cat_id_s = 'cat='.$cat_id.'&';
        }
        if($sort_by == 'date') query_posts($page_id_s.$cat_id_s.'&orderby=date&order=desc');
        if($sort_by == 'commented') query_posts($page_id_s.$cat_id_s.'orderby=comment&order=ASC');
        if($cat_id||$is_tf_front_page) : ?>
        <h2><?php if(!$is_tf_front_page){ echo get_cat_name($post_cat);}?> </h2>
        <div class="sort"><a href="?<?php echo $page_id_s ?><?php echo $cat_id_s ?>sort=commented" <?php  if($sort_by == 'commented') echo 'class="active"'?> ><?php _e("Popular","tfuse")?></a> <a href="?<?php echo $page_id_s ?><?php echo $cat_id_s ?>sort=date"  <?php  if($sort_by == 'commented') {} else echo 'class="active"'?> ><?php _e("By Date","tfuse")?></a></div>
        <?php endif;

    }endif;
/*Comment <p> delete*/
add_filter('comment_text','tfuse_coment_p',99);
if (!function_exists('tfuse_coment_p')) :
    function tfuse_coment_p($text) {
        $text = str_replace( '<p>', '', $text );
        $text = str_replace( '</p>', '', $text );
        return $text;
    }endif;

add_filter('get_avatar','tfuse_avatar_comment',99);
if (!function_exists('tfuse_avatar_comment')) :
    function  tfuse_avatar_comment($text) {
        $text = str_replace( "class='avatar avatar-", "class='photo avatar-", $text );
        return $text;
    }endif;

if (!function_exists('blog_categoru')) :
    function  tfuse_blog_category() {
        $post_cat=null;
        global $TFUSE;
        if($TFUSE->request->isset_GET('cat')){$post_cat = $TFUSE->request->GET('cat');}else{
            $cat_array = get_the_category( get_the_ID() );
            foreach($cat_array as $key=>$item){
                $post_cat = ($item->term_id);
            }
        }

        return $post_cat;
    }endif;

function tfuse_feedFilter($query) {
    if ($query->is_feed) {
        add_filter('the_content', 'tfuse_feedContentFilter');
    }
    return $query;
}
add_filter('pre_get_posts','tfuse_feedFilter');

function tfuse_feedContentFilter($content) {
    $thumb = tfuse_page_options('single_image');
    $image = '';
    if($thumb) {
        $image = '<a href="'.get_permalink().'"><img align="left" src="'. $thumb .'" alt="" width="200px" height="150px" /></a>';
        echo $image;
    }
    $content = $image . $content;
    return $content;
}
/*Function USer */
if ( ! function_exists( 'tfuse_action_user_profile' ) ) :

    function tfuse_action_user_profile()
    {
        $tfuse_meta = array();

        $meta = get_user_meta(get_the_author_meta( 'ID' ),'theme_fuse_extends_user_options',TRUE);
        if (!empty($meta)):
            foreach( $meta as $key => $item )
            {
                if ( $key == 'facebook' || $key == 'twitter' || $key == 'in') $tfuse_meta[$key] = $item;
            }
        endif;


        return $tfuse_meta;
    }
endif;
if ( !function_exists('tfuse_img_content')):

    function tfuse_img_content(){
        $content = $link = '';
        $args = array(
            'numberposts'     => -1,
        );
        $posts_array = get_posts( $args );
        $option_name = 'thumbnail_image';
        foreach($posts_array as $post):
            $featured = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID));
            if(tfuse_page_options('thumbnail_image',false,$post->ID)) continue;

            if(!empty($featured))
            {
                $value = $featured[0];
                tfuse_set_page_option($option_name, $value, $post->ID);
                tfuse_set_page_option('disable_image', true , $post->ID);
            }
            else
            {
                $args = array(
                    'post_type' => 'attachment',
                    'numberposts' => -1,
                    'post_parent' => $post->ID
                );
                $attachments = get_posts($args);
                if ($attachments) {
                    foreach ($attachments as $attachment) {
                        $value = $attachment->guid;
                        tfuse_set_page_option($option_name, $value, $post->ID);
                        tfuse_set_page_option('disable_image', true , $post->ID);
                    }
                }
                else
                {
                    $content = $post->post_content;
                    if(!empty($content))
                    {
                        preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $content,$matches);
                        if(!empty($matches))
                        {
                            $link = $matches[1];
                            tfuse_set_page_option($option_name, $link , $post->ID);
                            tfuse_set_page_option('disable_image', true , $post->ID);
                        }
                    }
                }
            }

        endforeach;
        tfuse_set_option('enable_content_img',false, $cat_id = NULL);
    }
endif;

if ( tfuse_options('enable_content_img'))
{
    add_action('tfuse_head','tfuse_img_content');
}

function tfuse_set_blog_page(){
    global $wp_query,$is_tf_blog_page;
    if(isset($wp_query->queried_object->ID)) $id_post = $wp_query->queried_object->ID;
    elseif(isset($wp_query->query['page_id'])) $id_post = $wp_query->query['page_id'];
    else $id_post = 0;
    if(tfuse_options('blog_page') != 0 && $id_post == tfuse_options('blog_page')) $is_tf_blog_page = true;
}
add_action('wp_head','tfuse_set_blog_page');

function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
    return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');