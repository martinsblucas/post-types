<?php
/**
 * Plugin Name: Post Types
 * Description: Plugin de custom post types e custom metas
 * Author: Lucas Martins Barroso
 * Author URI: http://lucasmartinsbarroso.com.br/
 * Text Domain: post-types
 */
class PostTypes {
    static function install() {
        require_once (__DIR__ . '/actions/bdCreate.php');
    }
    static function deactivation() {

    }
    static function uninstall() {

    }
}
register_activation_hook( __FILE__, array( 'PostTypes', 'install' ) );
register_deactivation_hook( __FILE__, array( 'PostTypes', 'deactivation' ) );
register_uninstall_hook( __FILE__, array( 'PostTypes', 'uninstall' ) );
require_once (__DIR__ . '/actions/typesInit.php');
require_once(__DIR__ . '/painel/menu.php');