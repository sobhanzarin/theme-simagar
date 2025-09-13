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

      //
      // A text field
      array(
        'id'    => 'opt-text',
        'type'  => 'text',
        'title' => 'Simple Text',
      ),

    )
  ) );
}
