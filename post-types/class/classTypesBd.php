<?php

class TypesBd
{
    public function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
        $this->tbName = $this->wpdb->prefix . "post_types";
    }

    public function create()
    {
        try {
            $query = $this->wpdb->prepare("CREATE TABLE IF NOT EXISTS " . $this->tbName . " (id integer not null primary key auto_increment, name varchar(150), singular_name varchar (150), menu_name varchar(150), name_admin_bar varchar (150), add_new varchar (150), add_new_item varchar (150), edit_item varchar (150), view_item varchar (150), all_items varchar (150), search_items varchar (150), parent_item_colon varchar (150), not_found varchar (150), not_found_in_trash varchar (150), description varchar (150), public boolean, publicly_queryable boolean, show_ui boolean, show_in_menu boolean, query_var boolean, rewrite varchar (150), capability_type varchar (150), has_archive boolean, hierarchical boolean, menu_position int(11), menu_icon varchar (150), supports varchar (150), show_in_rest boolean)", $this->tbName);
            return $this->wpdb->query($query);
        } catch (Exception $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }

    private function schema($array, $schema = 'view')
    {
        if ($schema == 'edit') {
            foreach ($array as $key => $result) {
                $array[$key]['supports'] = json_decode($array[$key]['supports']);
            }
            return $array;
        }
        else {
            foreach ($array as $key => $result) {
                $array[$key]['public'] == 1 ? $array[$key]['public'] = true : $array[$key]['public'] = false;
                $array[$key]['publicly_queryable'] == 1 ? $array[$key]['publicly_queryable'] = true : $array[$key]['publicly_queryable'] = false;
                $array[$key]['show_ui'] == 1 ? $array[$key]['show_ui'] = true : $array[$key]['show_ui'] = false;
                $array[$key]['show_in_menu'] == 1 ? $array[$key]['show_in_menu'] = true : $array[$key]['show_in_menu'] = false;
                $array[$key]['query_var'] == 1 ? $array[$key]['query_var'] = true : $array[$key]['query_var'] = false;
                $array[$key]['has_archive'] == 1 ? $array[$key]['has_archive'] = true : $array[$key]['has_archive'] = false;
                $array[$key]['hierarchical'] == 1 ? $array[$key]['hierarchical'] = true : $array[$key]['hierarchical'] = false;
                $array[$key]['supports'] = json_decode($array[$key]['supports']);
                $array[$key]['show_in_rest'] == 1 ? $array[$key]['show_in_rest'] = true : $array[$key]['show_in_rest'] = false;
            }
            return $array;
        }
    }

    public function findAll($schema = 'view')
    {
        try {
            $query = "SELECT * FROM " . $this->tbName;
            $results = $this->wpdb->get_results($query, 'ARRAY_A');
            $results = $this->schema($results, $schema);
            return $results;
        } catch (Exception $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }

    public function findOne($id, $schema = 'view')
    {
        try {
            $query = "SELECT * FROM " . $this->tbName . " WHERE id = ".$id;
            $result = $this->wpdb->get_results($query, 'ARRAY_A');
            $result = $this->schema($result, $schema);
            return $result;
        } catch (Exception $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }

    public function insert(array $args)
    {
        try {
            $query = array(
                'name' => $args['name'],
                'singular_name' => $args['singular_name'],
                'menu_name' => $args['menu_name'],
                'name_admin_bar' => $args['name_admin_bar'],
                'add_new' => $args['add_new'],
                'add_new_item' => $args['add_new_item'],
                'edit_item' => $args['edit_item'],
                'view_item' => $args['view_item'],
                'all_items' => $args['all_items'],
                'search_items' => $args['search_items'],
                'parent_item_colon' => $args['parent_item_colon'],
                'not_found' => $args['not_found'],
                'not_found_in_trash' => $args['not_found_in_trash'],
                'description' => $args['description'],
                'public' => $args['public'],
                'publicly_queryable' => $args['publicly_queryable'],
                'show_ui' => $args['show_ui'],
                'show_in_menu' => $args['show_in_menu'],
                'query_var' => $args['query_var'],
                'rewrite' => $args['rewrite'],
                'capability_type' => 'post',
                'has_archive' => $args['has_archive'],
                'hierarchical' => $args['hierarchical'],
                'menu_position' => $args['menu_position'],
                'menu_icon' => $args['menu_icon'],
                'supports' => $args['supports'],
                'show_in_rest' => $args['show_in_rest']
            );
            $response = $this->wpdb->insert($this->tbName, $query);
            if ($response != 1) {
                throw new Exception('Ocorreu um erro ao criar um novo post type');
            }
            return $response;
        } catch (Exception $e) {
            return 'Erro: ' . $e->getMessage();
        }
    }
}