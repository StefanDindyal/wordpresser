<?php

/**
 * Testimonials
 * 
 * To override this shortcode in a child theme, copy this file to your child theme's
 * theme_config/extensions/shortcodes/shortcodes/ folder.
 * 
 * Optional arguments:
 * title:
 * order: RAND, ASC, DESC
 */
function tfuse_testimonials($atts, $content = null) {
    global $testimonials_uniq;
    extract(shortcode_atts(array('title'=>'', 'order '=>'RAND'), $atts));
    $slide = $nav = $single = '';
    $testimonials_uniq = rand(1, 300);
    if (!empty($title))
        $title = '<h3>' . $title . '</h3>';

    if (!empty($order) && ($order == 'ASC' || $order == 'DESC'))
        $order = '&order=' . $order;
    else
        $order = '&orderby=rand';
    query_posts('post_type=testimonials&posts_per_page=-1' . $order);
    $k = 0;
    if (have_posts()) {
        while (have_posts()) {
            $k++;
            the_post();

            $profession = '';
            $terms = get_the_terms(get_the_ID(), 'positions');

            if (!is_wp_error($terms) && !empty($terms))
                foreach ($terms as $term)
                    $profession .= ', ' . $term->name;

            $slide .= '
            <div id="testimonials" class="quoteBox-big">
                <div class="quote"  id="quotes">
                    <div class="inner">
                        ' . get_the_excerpt() . '
                    </div>
                     <span class="quote-author alignright"> ' . get_the_title() . '</span>
                    <div class="clear"></div>
                </div>
            </div>
       ';
        } // End WHILE Loop
    } // End IF Statement
    wp_reset_query();

    if ($k > 1) {
        $nav = '<a href="#" class="prev"></a> <a href="#" class="next"></a>';
    }
    else
        $single = ' style="display: block"';

    $output = '
    <div id="testimonials' . $testimonials_uniq . '" >
        ' . $title . '
        <div class="slides_container"' . $single . '>
        ' . $slide . '
        </div><!--/ .slides_container -->
        ' . $nav . '
    </div><!--/ .slideshow slideQuotes -->
    <script language="javascript" type="text/javascript">
       jQuery(document).ready(function($){
            $("#testimonials' . $testimonials_uniq . '").slides({
                hoverPause: true,
                play: 9000,
                autoHeight: true,
                pagination: false,
                generatePagination: false,
                effect: "fade",
                fadeSpeed: 150});
        });
    </script>';

    return $output;
}

$atts = array(
    'name' => 'Testimonials',
    'desc' => 'Here comes some lorem ipsum description for the box shortcode.',
    'category' => 11,
    'options' => array(
        array(
            'name' => 'Title',
            'desc' => 'Specifies the title of an shortcode',
            'id' => 'tf_shc_testimonials_title',
            'value' => 'Testimonials',
            'type' => 'text'
        ),
        array(
            'name' => 'Order',
            'desc' => 'Select display order',
            'id' => 'tf_shc_testimonials_order',
            'value' => 'DESC',
            'options' => array(
                'RAND' => 'Random',
                'ASC' => 'Ascending',
                'DESC' => 'Descending'
            ),
            'type' => 'select'
        )
    )
);

tf_add_shortcode('testimonials', 'tfuse_testimonials', $atts);
