<?php
/**
 * The template for displaying Play Slider.
 * To override this template in a child theme, copy this file to your 
 * child theme's folder /theme_config/extensions/slider/designs/play/
 * 
 * If you want to change style or javascript of this slider, copy files to your 
 * child theme's folder /theme_config/extensions/slider/designs/play/static/
 * and change get_template_directory() with get_stylesheet_directory()
 */
$TFUSE->include->register_type('slider_js_folder', get_template_directory() . '/theme_config/extensions/slider/designs/'.$slider['design'].'/static/js');
$TFUSE->include->js('jquery.featureList-1.0.0', 'slider_js_folder', 'tf_footer');
?>



        <div class="popular_box">
            <h1><?php
                if($slider['type']=='custom'){
                echo $slide['slide_tab_title'];} ?></h1>
            <a class="prev"><?php  _e("prev","tfuse") ?></a>
            <a class="next"><?php  _e("next","tfuse") ?></a>
            <div class="top_carousel" style="">
                <ul style="">
            <?php foreach ($slider['slides'] as $slide) : ?>
                    <li style="overflow: visible; float: left; width: 230px; height: 155px; ">
                        <a href="<?php echo $slide['slide_url']; ?>"><img src="<?php echo $slide['slide_src']; ?>" height="96" width="220" class="slider-img" alt="<?php echo $slide['slide_title']; ?>"></a>
                        <a href="<?php echo $slide['slide_url']; ?>"><?php echo $slide['slide_subtitle']; ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>





