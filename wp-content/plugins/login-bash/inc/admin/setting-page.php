<?php

function lb_add_setting_page(){
    add_options_page(
    'تنظیمات لاگین باش',
    'تنظیمات لاگین باش',
    'manage_options',
    'lb_setting_loginbash',
    'lb_setting_page_handler');
}

add_action('admin_menu', 'lb_add_setting_page');


function lb_setting_page_handler(){ ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        <form action="options.php" method="post">
     <?php
        settings_fields('loginbash');
        do_settings_sections('loginbash');
        submit_button('ذخیره'); ?>
        </form>
    </div>

   <?php }
function lb_setting_init(){
    register_setting('loginbash', '_lb_apikey');
    register_setting('loginbash', '_lb_password');

     add_settings_section(
		'_lb_setting_section',
		'تنظیمات افزونه',
        'lb_setting_section_handler',
		'loginbash'
	);

    add_settings_field(
		'_lb_apikey',
		'کلید api',
        'lb_apikey_html',
		'loginbash',
		'_lb_setting_section'
	);
    add_settings_field(
		'_lb_password',
		'رمز عبور',
        'lb_password_html',
		'loginbash',
		'_lb_setting_section'
	);
}


function lb_setting_section_handler() { 
    echo "";
 }

function lb_apikey_html(){
   $optionApi = get_option('_lb_apikey');
    ?>
    <input type="text" name="_lb_apikey" id='_lb_apikey' value='<?php echo isset($optionApi) ? esc_attr($optionApi) : "" ;?>'>
<?php 
}

function lb_password_html(){
   $optionpassword = get_option('_lb_password');
    ?>
    <input type="text" name="_lb_password" id='_lb_password' value='<?php echo isset($optionpassword) ? esc_attr($optionpassword) : "" ;?>'>
<?php 
}

add_action('admin_init', "lb_setting_init");