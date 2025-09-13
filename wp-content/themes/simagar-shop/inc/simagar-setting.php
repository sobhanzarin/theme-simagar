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
    'title'  => 'تب اول',
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

      ),
  ) );
} 

function simagar_setting($key = "")
{
  $options = get_option('simagar_setting');
  return isset($options[$key]) ? $options[$key] : null;
}