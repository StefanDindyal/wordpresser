<?php
/**
 * Defined number of placeholders
 *
 * @since Photo Artist 1.0
 */

$cfg['max_placeholders'] = 2;
$cfg['select_options'] = array(
    'post_types' => array(
        'post' => array(
            'name' => 'Posts',
            'has_id' => TRUE,
            'has_templates' => FALSE,
            'default_number' => 2
        ),
        'page' => array(
            'name' => 'Pages',
            'has_id' => TRUE,
            'has_templates' => TRUE,
            'default_number' => 2,
            'templates' => array(
            )
        )
    ),
    'categories' => array(
        'category' => array(
            'name' => 'Categories',
            'has_id' => TRUE,
            'has_templates' => FALSE,
            'default_number' => 2
        )
    ),
    'other' => array(
        'is_archive' => array(
            'name' => 'Archives',
            'has_id' => FALSE,
            'has_templates' => FALSE,
            'default_number' => 2
        ),
        'is_front_page' => array(
            'name' => 'Front Page',
            'has_id' => FALSE,
            'has_templates' => FALSE,
            'default_number' => 2
        ),
        'is_blogpage' => array(
        'name' => 'Blog Page',
        'has_id' => FALSE,
        'has_templates' => FALSE,
        'default_number' => 1
        ),
         'is_search' => array(
        'name' => 'Search Page',
        'has_id' => FALSE,
        'has_templates' => FALSE,
        'default_number' => 1
         ),

        'is_404' => array(
            'name' => '404 Error Page',
            'has_id' => FALSE,
            'has_templates' => FALSE,
            'default_number' => 2
        )
    )
);
#define number of placeholders for custom post types, defined manually
$cfg['post_types'] = array(
    'testimonials' => 2
);
#define number of placeholders for custom taxonomies, defined manually
$cfg['taxonomies'] = array();
$url = tf_config_extimage($this->ext->sidebars->_the_class_name, '');
$cfg['sidebar_positions_options'] =
    array(
        1 => array(
            'id' => 'sidebars_positions_1',
            'options' => array(
                'left_big'   => array($url . 'left.png', 'Position based on colors'),
                'right_big'  => array($url . 'right.png', 'Position based on colors'),
                'left_small'  => array($url . 'sidebar_left_thin.png', 'Sidebar on the left with larger content area'),
                'right_small' => array($url . 'sidebar_right_thin.png', 'Sidebar on the right with larger content area'),
            )
        ),
        2 => array(
            'id' => 'sidebars_positions_2',
            'options' => array(
                'full'         => array($url . 'full_width.png', 'No sidebar on the page'),

                'left_big'   => array($url . 'left.png', 'Position based on colors'),
                'right_big'  => array($url . 'right.png', 'Position based on colors'),

                'left_small'  => array($url . 'left_small.png', 'Sidebar small on the left with small content area'),
                'right_small' => array($url . 'right_small.png', 'Sidebar small on the right with small content area'),

                'left_big_small'    => array($url . 'left_big_small.png', 'Position based on colors'),
                'right_small_big'  => array($url . 'right_small_big.png', 'Position based on colors'),



                'left_small_big'    => array($url . 'left_small_big.png', 'Position based on colors'),
                'right_big_small'   => array($url . 'right_big_small.png', 'Position based on colors'),

                'right_small_left_big'   => array($url . 'right_small_left_big.png', 'Position based on colors'),
                'right_big_left_small'  => array($url . 'right_big_left_small.png', 'Position based on colors'),
            )
        )
);
$cfg['sidebar_disabled_types'] = array('sliders');
$cfg['sidebars_colors'] = array(1 => 'blue', 2 => 'yellow');
?>
