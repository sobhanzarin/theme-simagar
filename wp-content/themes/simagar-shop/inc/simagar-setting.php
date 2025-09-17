<?php 

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'simagar_setting';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => 'تنظیمات سیماگر شاپ',
    'menu_slug'  => 'simagar_shop_setting',
    'menu_hidden' => false,
    'framework_title' => 'سیماگر شاپ'
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'هدر',
    'fields' => array(

      array(
      'id'          => 'header-type',
      'type'        => 'select',
      'title'       => 'نوع هدر',
      'placeholder' => 'نوع هدر را انتخاب کنید',
      'options'     => array(
        'default'  => 'پیش فرض',
        'elementor'  => 'المنتور',
      ),
      'default'     => 'default'
    ),
    array(
    'id'    => 'logo-website',
    'type'  => 'media',
    'title' => 'انتخاب لوگو',
    ),
    array(
      'id'      => 'logo-width',
      'type'    => 'text',
      'title'   => 'عرض لوگو رو به PX وارد نمایید.',
      'default' => '130'
    ),
    
     array(
      'id'          => 'auth-btn-type',
      'type'        => 'select',
      'title'       => 'نوع دکمه حساب کاربری',
      'placeholder' => 'نوع دکمه را انتخاب کنید',
      'options'     => array(
        'modal'  => 'مدال بازشونده',
        'link'  => 'لینک سفارشی',
      ),
      'default'     => 'modal'
    ),
    array(
      'id'    => 'auth-btn-text',
      'type'  => 'text',
      'title' => 'متن دکمه',
      'dependency' => array('auth-btn-type', '==', 'link')
    ),
    array(
      'id'    => 'auth-btn-link',
      'type'  => 'text',
      'title' => 'لینک دکمه',
      'dependency' => array('auth-btn-type', '==', 'link')
    ),
    array(
      'id'    => 'phone-number-header',
      'type'  => 'text',
      'title' => 'شماره تماس',
      'dependency' => array('header-type', '==', 'default')
    ),
  ),
  ));
    CSF::createSection( $prefix, array(
    'title'  => 'استایل',
    'fields' => array(

      array(
      'id'          => 'font-family',
      'type'        => 'select',
      'title'       => 'انتخاب فونت',
      'placeholder' => 'فونت را انتخاب کنید',
      'options'     => array(
        'iransans'  => 'iransans',
        'dana'  => 'dana',
      ),
      'default'     => 'iransans'
    ),
    array(
    'id'    => 'main-coloe',
    'type'  => 'color',
    'title' => 'رنگ اصلی سایت',
    'default' => '#008ECC',
    ),

      ),
  ) );
} 

function simagar_setting($key = "")
{
  $options = get_option('simagar_setting');
  return isset($options[$key]) ? $options[$key] : null;
}