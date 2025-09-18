<?php 

class Simagar_Widget_Auth_Btn extends \Elementor\Widget_Base {
    public function get_name(){
        return 'auth-btn';
    }
    public function get_title(){
        return 'دکمه حساب کاربری';
    }
    public function get_icon(){
        return 'eicon-user-circle-o';
    }
    public function get_categories(){
        return ['simagar-header-widget'] ;
    }
    protected function register_controls() {}

	protected function render() {}
}