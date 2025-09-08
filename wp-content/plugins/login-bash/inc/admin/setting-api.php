<?php   
function lb_register_setting(){
    $args = [
        'type' => 'string',
        'sanitize_callback' => 'sanitize_text_field',
        'default' => null
    ];
    register_setting('general', '_lb_apikey', $args);
    add_settings_section(
		'_lb_setting_section',
		'تنظیمات پلاگین لاگین باش', 'lb_setting_section_handler',
		'general'
	);

    add_settings_field(
		'_lb_seeting_field',
		'توکن', 'lb_setting_field_handler',
		'general',
		'_lb_setting_section'
	);
    
}
function lb_setting_section_handler(){
        echo "لطفا api خود را وارد کنید.";
}
function lb_setting_field_handler(){
    $option = get_option('_lb_apikey');
    ?>
    <input type="text" name="_lb_apikey" id='apiKey' value='<?php echo isset($option) ? esc_attr($option) : "" ;?>'>
<?php }

add_action('admin_init', 'lb_register_setting');