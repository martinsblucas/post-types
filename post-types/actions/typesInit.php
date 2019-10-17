<?php
require_once(__DIR__ . '/../class/classTypes.php');
require_once(__DIR__ . '/../class/classTypesBd.php');
add_action('init', 'addNew');
function addNew() {
    $bd = new TypesBd();
    $getAll = $bd->findAll();
    foreach ($getAll as $post_type) {
        $postTypes = new Types();
        $labels = array();
        $args = array();
        $labels['name'] = $post_type['name'];
        $labels['singular_name'] = $post_type['singular_name'];
        $labels['menu_name'] = $post_type['menu_name'];
        $labels['name_admin_bar'] = $post_type['name_admin_bar'];
        $labels['add_new'] = $post_type['add_new'];
        $labels['add_new_item'] = $post_type['add_new_item'];
        $labels['edit_item'] = $post_type['edit_item'];
        $labels['view_item'] = $post_type['view_item'];
        $labels['all_items'] = $post_type['all_items'];
        $labels['search_items'] = $post_type['search_items'];
        $labels['parent_item_colon'] = $post_type['parent_item_colon'];
        $labels['not_found'] = $post_type['not_found'];
        $labels['not_found_in_trash'] = $post_type['not_found_in_trash'];
        $args['description'] = $post_type['description'];
        $args['public'] = $post_type['public'];
        $args['publicly_queryable'] = $post_type['publicly_queryable'];
        $args['show_ui'] = $post_type['show_ui'];
        $args['show_in_menu'] = $post_type['show_in_menu'];
        $args['query_var'] = $post_type['query_var'];
        $args['rewrite'] = $post_type['rewrite'];
        $args['capability_type'] = $post_type['capability_type'];
        $args['has_archive'] = $post_type['has_archive'];
        $args['hierarchical'] = $post_type['hierarchical'];
        $args['menu_position'] = $post_type['menu_position'];
        $args['menu_icon'] = $post_type['menu_icon'];
        $args['supports'] = $post_type['supports'];
        $args['show_in_rest'] = $post_type['show_in_rest'];
        $postTypes->addNew($labels, $args);
    }
}