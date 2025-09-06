<?php
/*
Plugin Name: My plugin
Plugin URI: http://wordpress.org/
Description: This is First Plugin 
Version: 1.0.0
Author URI:
*/
defined('ABSPATH') || exit;
define('MP_PLUGIN_DIR', plugin_dir_path(__FILE__));
define('MP_PLUGIN_URL', plugin_dir_url(__FILE__));

define('MP_PLUGIN_INC', MP_PLUGIN_DIR . "inc/");


if(is_admin()){
    include MP_PLUGIN_INC . 'admin/menu.php';
}else {
    // include MP_PLUGIN_INC . 'front/';
}

