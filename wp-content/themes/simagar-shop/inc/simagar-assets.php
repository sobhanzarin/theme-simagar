<?php 
add_action('wp_enqueue_scripts', 'simagar_enqueue_scripts');
function simagar_enqueue_scripts(){

    $theme_obj = wp_get_theme();
    $theme_version = $theme_obj->get('Version');

     // style 
    wp_enqueue_style('simagar-bootstrap', SIMAGAR_THEME_URL . "assets/css/bootstrap.min.css");
    wp_enqueue_style('simagar-main-style', SIMAGAR_THEME_URL . "assets/css/main.css");
    wp_enqueue_style('simagar-fontawwsome', SIMAGAR_THEME_URL . "assets/css/fontawesome.css");
    wp_enqueue_style('simagar-fontawwsome-light', SIMAGAR_THEME_URL . "assets/css/light.css");
    wp_enqueue_style('simagar-style', get_stylesheet());

    // js
    wp_enqueue_script('simagar-popper-js', SIMAGAR_THEME_URL . "assets/js/popper.min.js", array(), $theme_version, true);
    wp_enqueue_script('simagar-bootstrap-js', SIMAGAR_THEME_URL . "assets/js/bootstrap.min.js", array(), $theme_version, true);
    wp_enqueue_script('simagar-app-js', SIMAGAR_THEME_URL . "assets/js/min.js", array(), $theme_version, true);
}