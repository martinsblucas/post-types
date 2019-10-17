<?php
add_action('admin_menu', 'registerMenu');
function registerMenu(){
    add_menu_page( 'Post Types', 'Post Types', 'manage_options', 'painel', 'registerMenuPages' );
    add_submenu_page( 'painel', 'Adicionar', 'Adicionar', 'manage_options', 'add', 'registerMenuPages' );
    add_submenu_page( 'painel', 'Gerenciar', 'Gerenciar', 'manage_options', 'all', 'registerMenuPages' );
    add_submenu_page( 'painel', 'Editar', 'Editar', 'manage_options', 'edit', 'registerMenuPages' );

}
function registerMenuPages(){
    include(__DIR__ . "/../painel/painel.php");
}