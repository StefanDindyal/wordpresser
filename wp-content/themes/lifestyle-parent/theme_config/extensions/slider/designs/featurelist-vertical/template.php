<?php
/**
 * The template for displaying Awkward Showcase.
 * To override this template in a child theme, copy this file to your
 * child theme's folder /theme_config/extensions/slider/designs/featureList-vertical/
 *
 * If you want to change style or javascript of this slider, copy files to your
 * child theme's folder /theme_config/extensions/slider/designs/featureList-vertical/static/
 * and change get_template_directory() with get_stylesheet_directory()
 */
$TFUSE->include->register_type('slider_js_folder', get_template_directory() . '/theme_config/extensions/slider/designs/'.$slider['design'].'/static/js');
$TFUSE->include->js('jquery.featureList-1.0.0', 'slider_js_folder', 'tf_footer');
?>
<script type="text/javascript">
    jQuery(document).ready(function() {
        jQuery.featureList(
            jQuery("#feature_tabs li"),
            jQuery("#feature_output li"), {
                start_item : 0,
                transition_interval: 5000
            }
        );
    });
</script>
<?php
$icon_name_cat=$category_ID=$category_ID_posts="";
if (isset($slider['general']['categories_select']))
{
    $category_ID = $slider['general']['categories_select'];
}
if($category_ID){
    $icon_name_cat = '<span class="icon_cat"><img src="'.tfuse_options('cat_icon',null,$category_ID).'" alt="" />
                         '. get_cat_name($category_ID).'
                   </span>';
}
$cats = explode(",",$category_ID);
?>
<!-- header image/slider -->
<div id="feature_list">
    <!-- featured list -->
    <?php   if($slider['type'] == "posts"){

    ?>
    <ul id="feature_tabs">
        <?php foreach ($slider['slides'] as $slide)

        echo '
        <li>
            <span class="link-title">'.$slide['slide_title'].'</span>
            <div class="feature_cat">
            <span class="icon_cat"><img src="'.tfuse_options('cat_icon',null,$slide['slide_cat_id'][0]->term_id).'" alt="" />
                         '. get_cat_name($slide['slide_cat_id'][0]->term_id).'
                   </span>
           <a href="'.$slide['slide_url'].'" class="link-more">'. _("Read more").'</a></div>
        </li>
        '; ?>
    </ul>

    <ul id="feature_output">
        <?php foreach ($slider['slides'] as $slide) echo '
        <li>
            <img src="'.$slide['slide_src'].'" width="960" alt="'.$slide['slide_title'].'" />
            <a href="'.$slide['slide_url'].'"></a>
        </li>
        ';?>
    </ul>
    <?php
}
elseif(sizeof($cats)=='1'||sizeof($cats)==''){

    ?>
    <ul id="feature_output">
        <?php foreach ($slider['slides'] as $slide) echo '
        <li>
            <div class="low-right"></div>
            <div class="titles">'.$slide['slide_title'].'<p>'.$slide['slide_subtitle'].'</p></div>
            <img src="'.$slide['slide_src'].'" width="960" alt="'.$slide['slide_title'].'" />
            <a href="'.$slide['slide_url'].'"></a>            
        </li>
        ';?>
    </ul>
    <ul id="feature_tabs">
        <?php foreach ($slider['slides'] as $slide)
            if($icon_name_cat!=''){
                echo '
                <li>
                    <span class="link-title">'.$slide['slide_title'].'</span>
                    <div class="feature_cat">
                    '.$icon_name_cat.'
                   <a href="'.$slide['slide_url'].'" class="link-more">'. _("Read more").'</a></div>
                </li>
                ';

            }else{
                if($slide['slide_subtitle_icon']){
                    $icon_slider = '<img src="'.$slide['slide_subtitle_icon'].'" alt="" width="22" height="22"/>';
                }else{
                    $icon_slider ='';
                }
                echo '
        <li>
        <div class="slip-cover"></div>
        <div class="purp"></div>
        <img src="'.$slide['slide_src'].'" width="100%" alt="'.$slide['slide_title'].'" />
            <div class="slip-titles"><a href="'.get_permalink($post_id_0).'">'.$slide['slide_title'].'<br>'.$slide['slide_subtitle'].'</a></div>
        </li>';
            }
       ?>
    </ul>
    <?php  }elseif(sizeof($cats)=='2'){ ?>
    <ul id="feature_tabs">
        <?php
        $args = array( 'numberposts' => '1','category' => $slider['general']['categories_select']['0'] );
        $recent_posts = wp_get_recent_posts( $args );
        $my_id = $recent_posts[0]['ID'];
        $post_id_0 = get_post($my_id);
        echo '
        <li>
        <img src="'.$slide['slide_src'].'" width="960" alt="'.$slide['slide_title'].'" />
            <div class="slip-titles">'.$post_id_0->post_title.'
            <p>'. get_cat_name($slider['general']['categories_select']['0']).'</p>
            </div>
            <a href="'.get_permalink($post_id_0).'" class="link-more"></a>
        </li>';

        $args1 = array( 'numberposts' => '1','category' => $slider['general']['categories_select']['2'] );
        $recent_posts1 = wp_get_recent_posts( $args1 );
        $my_id1 = $recent_posts1[0]['ID'];
        $post_id_1 = get_post($my_id1);
        echo '
        <li>
        <img src="'.$slide['slide_src'].'" width="960" alt="'.$slide['slide_title'].'" />
            <div class="slip-titles">'.$post_id_0->post_title.'
            <p>'. get_cat_name($slider['general']['categories_select']['0']).'</p>
            </div>
            <a href="'.get_permalink($post_id_0).'" class="link-more"></a>
        </li>';
        ?>
    </ul>
    <ul id="feature_output">
        <?php
        echo '
                <li>
        <img src="'. tfuse_page_options('single_image',null,$my_id).'" width="960" height="325" alt="'. $post_id_0->post_title.'" />
        <a href="'. get_permalink($my_id).'"></a>

        </li>
        <li>
            <img src="'. tfuse_page_options('single_image',null,$my_id1).'" width="960" height="325" alt="'. $post_id_1->post_title.'" />
            <a href="'.  get_permalink($my_id1).'"></a>
        </li>
        '; ?>
    </ul>
    <?php }elseif(sizeof($cats)>='3'){?>
    <ul id="feature_tabs">
        <?php
    $category_ID = $slider['general']['categories_select'];
    $cats = explode(",",$category_ID);
    foreach( $cats as $key=>$cat)
    {
        if($key < 3){
        $the_query = new WP_Query( 'cat='.$cat.'' );
        $the_query->the_post();
        echo '
        <li><div class="link-title">'.get_the_title($the_query->posts[0]->ID).'</div>
        <div class="feature_cat">
         <p class="icon_cat" style="color:'.tfuse_options('cat_color',null,$cat).'">
        <span class="categ_color_p">
        <span class="align_catg">'.get_cat_name($cat).'</span>
        <img src="'. tfuse_options('cat_icon',null,$cat).'" alt="'.get_cat_name($cat).'" />
        </span>
        </p>
        <a href="'.get_permalink($the_query->posts[0]->ID).'" class="link-more">'. __("Read more","tfuse").'</a></div>
        </li>';
        wp_reset_postdata();
        }
    }
        ?>
    </ul>
    <ul id="feature_output">
        <?php
        foreach( $cats as $key =>$cat)
        {
        if($key < 3){

            $the_query = new WP_Query( 'cat='.$cat.'' );
            $the_query->the_post();
        echo '
        <li>
        <img src="'. tfuse_page_options('single_image',null,$the_query->posts[0]->ID).'" width="960" height="325" alt="'.get_the_title($the_query->posts[0]->ID).'" />
        <a href="'.get_permalink($the_query->posts[0]->ID).'"></a>
        </li>
        '; wp_reset_postdata();
            }
        }?>
    </ul>
    <?php }?>

    <!--/ featured list -->
</div>
<!--/ header image/slider -->
