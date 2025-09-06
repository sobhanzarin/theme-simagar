<?php
function mp_register_menu(){
    add_menu_page("تنظیمات افزونه",
    "لاگین باش",
    'manage_options',
    'lb_setting',
    'lb_setting_page',
    '', '2');
}

add_action('admin_menu', 'mp_register_menu');

