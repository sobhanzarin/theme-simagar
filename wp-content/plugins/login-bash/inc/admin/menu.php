<?php
add_action('admin_menu', 'lb_register_menu');

function lb_register_menu(){
    add_menu_page("لاگین باش",
    "لاگین باش",
    'manage_options',
    'lb_home',
    'lb_home_page',
    '', '');
    add_submenu_page('lb_home',
    'تنظیمات',
    'تنظیمات',
    'manage_options',
    'lb_setting',
    'lb_setting_page');
}

function lb_home_page(){
    echo "<h1>page main login ba</h1>";
}
function lb_setting_page(){
    print_r($_POST);
    if(isset($_POST['submit'])){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            
            $data = [];
            foreach ($_POST as $key => $value) {
                  if($key != 'submit'){
                      $data[$key] = $value;
                  }
            }
            if(get_option('_lb_setting')){
                update_option('_lb_setting', $data);
            }else{
                add_option('_lb_setting', $data);
            }
        }
    }

    include LB_PLUGIN_VIEW . 'admin/setting.php' ;
}


