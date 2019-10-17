<?php
class Types
{
    public function addNew(array $labels, array $args) {
        $labelsConstruct = array(
            'name' => _x( $labels['name'], 'post type general name', 'post-types' ),
            'singular_name' => _x( $labels['singular_name'], 'post type singular name', 'post-types' ),
            'menu_name' => _x( $labels['menu_name'], 'admin menu', 'post-types' ),
            'name_admin_bar' => _x( $labels['name_admin_bar'], 'add new on admin bar', 'post-types' ),
            'add_new' => _x( $labels['add_new'], 'text', 'post-types' ),
            'add_new_item' => __( $labels['add_new_item'], 'post-types' ),
            'new_item' => __( $labels['new_item'], 'post-types' ),
            'edit_item' => __( $labels['edit_item'], 'post-types' ),
            'view_item' => __( $labels['view_item'], 'post-types' ),
            'all_items' => __( $labels['all_items'], 'post-types' ),
            'search_items' => __( $labels['search_items'], 'post-types' ),
            'parent_item_colon' => __( $labels['parent_item_colon'], 'post-types' ),
            'not_found' => __( $labels['not_found'], 'post-types' ),
            'not_found_in_trash' => __( $labels['not_found_in_trash'], 'post-types' )
        );
        $argsConstruct = array(
            'labels' => $labelsConstruct,
            'description' => __( $args['description'], 'post-types' ),
            'public' => $args['public'],
            'publicly_queryable' => $args['publicly_queryable'],
            'show_ui' => $args['show_ui'],
            'show_in_menu' => $args['show_in_menu'],
            'query_var' => $args['query_var'],
            'rewrite' => array( 'slug' => $args['rewrite'] ),
            'capability_type' => $args['capability_type'],
            'has_archive' => $args['has_archive'],
            'hierarchical' => $args['hierarchical'],
            'menu_position' => $args['menu_position'],
            'menu_icon' => $args['menu_icon'],
            'supports' => $args['supports'],
            'show_in_rest' => $args['show_in_rest']
        );
        return register_post_type( $args['rewrite'], $argsConstruct);
    }
}