<?php
/**
 * Generate theme menu
 *
 * @since Lifestyle 2.0
 */

global $menus;


// -----------------------------------------------
register_nav_menus(array(
    'primary' => __('Primary Navigation', 'tfuse'),
    'secondary' => __('Secondary Navigation', 'tfuse'),
    'footer' => __('Footer Navigation', 'tfuse')

));


// -----------------------------------------------
$menus = array(
    'primary' => array(
        'depth' => 3,
        'container_class' => '',
        'menu_class' => 'dropdown',
        'theme_location' => 'primary',
        'fallback_cb' => 'tfuse_select_menu_msg',
        'link_before'     => '<span>',
        'link_after'      => '</span>'
    ),
    'secondary' => array(
        'depth' => 3,
        'container_class' => 'topmenu',
        'menu_class' => 'dropdown',
        'theme_location' => 'secondary',
        'fallback_cb' => 'tfuse_select_menu_msg',
        'link_before'     => '<span>',
        'link_after'      => '</span>'
    ),
    'footer' => array(
        'depth' => 3,
        'container_class' => 'botmenu',
        'menu_class' => 'dropdown',
        'theme_location' => 'footer',
        'fallback_cb' => 'tfuse_select_menu_msg',
        'link_before'     => '<span>',
        'link_after'      => '</span>'
    ),
);

// -----------------------------------------------
function tfuse_menu($menu_type) {
    global $menus;
    if (isset($menus[$menu_type])) {
        wp_nav_menu($menus[$menu_type]);
    }
}

function tfuse_select_menu_msg()
{
    echo '<div class="nomenue">
    Please go to the <a href="' . admin_url('nav-menus.php') . '" target="_blanck">Menu</a> section, create a  menu and then select the newly created menu from the Theme Locations box from the left.
    </div>';
}
