<?php
/**
 * Initializing deafault sidebars
 *
 */

function tf_sidebar_cfg() {
    static $sidebar_cfg = array();
    #Sidebar options
    $beforeWidget = '<div id="%1$s" class="widget %2$s">';
    $afterWidget = '</div>';
    $beforeTitle = '<h3>';
    $afterTitle = '</h3>';
    #End sidebar options
    if (count($sidebar_cfg) == 0) {
        #Sidebar filters
        $beforeWidget = apply_filters('tfuse_filter_before_widget', $beforeWidget);
        $afterWidget = apply_filters('tfuse_filter_after_widget', $afterWidget);
        $beforeTitle = apply_filters('tfuse_filter_before_title', $beforeTitle);
        $afterTitle = apply_filters('tfuse_filter_after_title', $afterTitle);
        #End sidebar filters
        $sidebar_cfg = compact('beforeWidget', 'afterWidget', 'beforeTitle', 'afterTitle');
    }
    return $sidebar_cfg;
}

function tf_sidebars_init() {
    extract(tf_sidebar_cfg());
    register_sidebar(array('name' => 'General Sidebar', 'id' => 'sidebar-1', 'before_widget' => $beforeWidget, 'after_widget' => $afterWidget, 'before_title' => $beforeTitle, 'after_title' => $afterTitle));
    register_sidebar(array('name' => 'Bottom 1', 'id' => 'bottom-1', 'before_widget' => $beforeWidget, 'after_widget' => $afterWidget, 'before_title' => $beforeTitle, 'after_title' => $afterTitle));
    register_sidebar(array('name' => 'Bottom 2', 'id' => 'bottom-2', 'before_widget' => $beforeWidget, 'after_widget' => $afterWidget, 'before_title' => $beforeTitle, 'after_title' => $afterTitle));
    register_sidebar(array('name' => 'Bottom 3', 'id' => 'bottom-3', 'before_widget' => $beforeWidget, 'after_widget' => $afterWidget, 'before_title' => $beforeTitle, 'after_title' => $afterTitle));
    register_sidebar(array('name' => 'Bottom 4', 'id' => 'bottom-4', 'before_widget' => $beforeWidget, 'after_widget' => $afterWidget, 'before_title' => $beforeTitle, 'after_title' => $afterTitle));

}

tf_sidebars_init();
