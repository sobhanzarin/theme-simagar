<?php

add_action('after_setup_theme', 'simagar_after_setup_theme');
function simagar_after_setup_theme(){
    add_theme_support('title-tag');

    register_nav_menu(
            'main-menu', 'منو اصلی',
        );
}