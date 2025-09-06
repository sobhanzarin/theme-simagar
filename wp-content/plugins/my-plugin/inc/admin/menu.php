<?php
function mp_register_menu(){
    add_menu_page("تنیمات افزونه من",
    "افزونه من",
    'manage_options',
    'mp_setting',
    'mp_setting_page',
    '', '2');
}

add_action('admin_menu', 'mp_register_menu');

