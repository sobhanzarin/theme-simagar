<?php
/*
Plugin Name: لاگین باش
Plugin URI: 
Description: پلاگین ورود و ثبت نام لاگین باش
Version: 1.0.0
Author URI:
*/
// defined('ABSPATH') || exit;

define("LB_PLUGIN_DIR", plugin_dir_path(__FILE__));
define("LB_PLUGIN_URL", plugin_dir_url(__FILE__));
define("LB_PLUGIN_INC" , LB_PLUGIN_DIR . 'inc/');
define("LB_PLUGIN_VIEW", LB_PLUGIN_DIR . "views/");

if(is_admin()){
    include LB_PLUGIN_INC . 'admin/menu.php';
    include LB_PLUGIN_INC . 'admin/metabox.php';
}
