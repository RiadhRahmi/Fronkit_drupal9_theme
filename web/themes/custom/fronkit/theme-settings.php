<?php

/**
 * @file
 * Theme settings form for fronkit theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function fronkit_form_system_theme_settings_alter(&$form, &$form_state)
{

  $form['fronkit'] = [
    '#type' => 'details',
    '#title' => t('fronkit'),
    '#open' => TRUE,
  ];

  $form['fronkit']['font_size'] = [
    '#type' => 'number',
    '#title' => t('Font size'),
    '#min' => 12,
    '#max' => 18,
    '#default_value' => theme_get_setting('font_size'),
  ];

  $form['fronkit']['banner_background'] = [
    '#type' => 'select',
    '#title' => t('Banner background'),
    '#options' => [
      'style-1' => t('White background'),
      'style-2' => t('Dark background'),
      'style-3' => t('Image background'),
    ],
    '#default_value' => theme_get_setting('banner_background'),
  ];

  $form['fronkit']['input_rounded_style'] = [
    '#type' => 'select',
    '#title' => t('input rounded style'),
    '#options' => [
      'style-1' => t('Default Input'),
      'style-2' => t('Rounded Input'),
      'style-3' => t('Flat Input'),
    ],
    '#default_value' => theme_get_setting('input_rounded_style'),
  ];

  $form['fronkit']['submit_button_class_bg'] = [
    '#type' => 'textfield',
    '#title' => t('Submit Button Class background'),
    '#default_value' => theme_get_setting('submit_button_class_bg'),
  ];

  $form['fronkit']['submit_button_background'] = [
    '#type' => 'select',
    '#title' => t('Submit Button background'),
    '#options' => [
      'style-1' => t('Default Button'),
      'style-2' => t('Soft Button'),
      'style-3' => t('Outline Button'),
    ],
    '#default_value' => theme_get_setting('submit_button_background'),
  ];

  $form['fronkit']['submit_button_rounded_style'] = [
    '#type' => 'select',
    '#title' => t('Submit Button Style'),
    '#options' => [
      'style-1' => t('Default Button'),
      'style-2' => t('Rounded Button'),
      'style-3' => t('Flat Button'),
    ],
    '#default_value' => theme_get_setting('submit_button_rounded_style'),
  ];

  $form['fronkit']['submit_button_options'] = [
    '#type' => 'checkboxes',
    '#title' => t('Submit Button Options'),
    '#options' => [
      'btn-animation' => t('Add animation to button'),
      'btn-icon' => t('Add arrow right icon'),
    ],
    '#default_value' => theme_get_setting('submit_button_options'),
  ];

  $form['#attached']['library'][] = 'gavias_amon/gavias-amon-admin';
  // Get the build info for the form
  $build_info = $form_state->getBuildInfo();
  // Get the theme name we are editing
  $theme = \Drupal::theme()->getActiveTheme()->getName();
  // Create Omega Settings Object

  $form['core'] = array(
    '#type' => 'vertical_tabs',
    '#attributes' => array('class' => array('entity-meta')),
    '#weight' => -899
  );

  $form['theme_settings']['#group'] = 'core';
  $form['logo']['#group'] = 'core';
  $form['favicon']['#group'] = 'core';

  $form['theme_settings']['#open'] = FALSE;
  $form['logo']['#open'] = FALSE;
  $form['favicon']['#open'] = FALSE;

//  // Custom settings in Vertical Tabs container
//  $form['options'] = array(
//    '#type' => 'vertical_tabs',
//    '#attributes' => array('class' => array('entity-meta')),
//    '#weight' => -999,
//    '#default_tab' => 'edit-variables',
//    '#states' => array(
//      'invisible' => array(
//        ':input[name="force_subtheme_creation"]' => array('checked' => TRUE),
//      ),
//    ),
//  );

  /* --------- Setting general ----------------*/
  $form['general'] = array(
    '#type' => 'details',
    '#attributes' => array(),
    '#title' => t('Gerenal options'),
    '#weight' => -999,
    '#group' => 'options',
    '#open' => FALSE,
  );

//  $form['general']['sticky_menu'] =array(
//    '#type' => 'select',
//    '#title' => t('Enable Sticky Menu'),
//    '#default_value' => theme_get_setting('sticky_menu'),
//    '#group' => 'general',
//    '#options' => array(
//      '0'        => t('Disable'),
//      '1'        => t('Enable')
//    )
//  );

//  $form['general']['site_layout'] = array(
//    '#type' => 'select',
//    '#title' => t('Body Layout'),
//    '#default_value' => theme_get_setting('site_layout'),
//    '#options' => array(
//      'wide' => t('Wide (default)'),
//      'boxed' => t('Boxed'),
//    ),
//  );

//  $form['general']['preloader'] = array(
//    '#type' => 'select',
//    '#title' => t('Preloader Bar'),
//    '#default_value' => theme_get_setting('preloader'),
//    '#options' => array(
//      '0' => t('Disable'),
//      '1' => t('Enable')
//    ),
//  );

// User CSS
  $form['options']['css_customize'] = array(
    '#type' => 'details',
    '#attributes' => array(),
    '#title' => t('Customize css'),
    '#weight' => -996,
    '#group' => 'options',
    '#open' => TRUE,
  );
  $form['customize']['customize_css'] = array(
    '#type' => 'textarea',
    '#title' => t('Add your own CSS'),
    '#group' => 'css_customize',
    '#default_value' => theme_get_setting('customize_css'),
  );

  //Customize color ----------------------------------

//  $form['options']['settings_customize'] = array(
//    '#type' => 'details',
//    '#attributes' => array(),
//    '#title' => t('Settings Customize'),
//    '#weight' => -997,
//    '#group' => 'options',
//    '#open' => TRUE,
//  );
//  $form['options']['settings_customize']['settings'] = array(
//    '#type' => 'details',
//    '#open' => TRUE,
//    '#attributes' => array(),
//    '#title' => t('Cutomize Setting'),
//    '#weight' => -999,
//  );

//  $form['options']['settings_customize']['settings']['theme_skin'] = array(
//    '#type' => 'select',
//    '#title' => t('Theme Skin'),
//    '#default_value' => theme_get_setting('theme_skin'),
//    '#group' => 'settings',
//    '#options' => array(
//      ''        => t('Default'),
//      'green'   => t('Green'),
//      'lilac'   => t('Lilac'),
//      'orange'  => t('Orange'),
//      'red'     => t('Red'),
//      'yellow'  => t('Yellow'),
//    ),
//  );
//
//  $form['options']['settings_customize']['settings']['enable_customize'] = array(
//    '#type' => 'select',
//    '#title' => t('Enable Use Color Customzie'),
//    '#default_value' => theme_get_setting('enable_customize'),
//    '#group' => 'settings',
//    '#options' => array(
//      '0'        => t('Disable'),
//      '1'        => t('Enable'),
//    ),
//  );
//
//  //Customize General color
//  $form['options']['settings_customize']['general_color'] = array(
//    '#type' => 'details',
//    '#open' => TRUE,
//    '#attributes' => array(),
//    '#title' => t('Gerenal Color'),
//    '#weight' => -999,
//    '#group' => 'settings_customize',
//  );
//
//  $form['theme_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Theme Color'),
//    '#group'  => 'general_color',
//    '#default_value' => theme_get_setting('theme_color'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['text_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Text Color'),
//    '#group'  => 'general_color',
//    '#default_value' => theme_get_setting('text_color'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['link_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Link Color'),
//    '#group'  => 'general_color',
//    '#default_value' => theme_get_setting('link_color'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['link_hover_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Link Hover Color'),
//    '#default_value' => theme_get_setting('link_hover_color'),
//    '#group'  => 'general_color',
//    '#attributes' => array('class' => array('color-picker') )
//  );

//  //Customize Header Color
//  $form['options']['settings_customize']['header_color'] = array(
//    '#type' => 'details',
//    '#open' => TRUE,
//    '#attributes' => array(),
//    '#title' => t('Header Color'),
//    '#weight' => -999,
//    '#group' => 'settings_customize',
//  );
//
//  $form['header_bg'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Header | Background'),
//    '#group'  => 'header_color',
//    '#default_value' => theme_get_setting('header_bg'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['header_color_link'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Header | Link Color'),
//    '#group'  => 'header_color',
//    '#default_value' => theme_get_setting('header_color_link'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['header_color_link_hover'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Header | Link Color Hover'),
//    '#group'  => 'header_color',
//    '#default_value' => theme_get_setting('header_color_link_hover'),
//    '#attributes' => array('class' => array('color-picker') )
//  );

//Customize MAIN MENU Color
//  $form['options']['settings_customize']['menu_color'] = array(
//    '#type' => 'details',
//    '#open' => TRUE,
//    '#attributes' => array(),
//    '#title' => t('Menu Color'),
//    '#weight' => -999,
//    '#group' => 'settings_customize',
//  );
//
//  $form['menu_bg'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Menu | Background'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('menu_bg'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['menu_color_link'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Menu | Link Color'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('menu_color_link'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['menu_color_link_hover'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Menu | Link Color Hover'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('menu_color_link_hover'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['submenu_background'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Sub Menu | Background'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('submenu_background'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['submenu_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Sub Menu | Text Color'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('submenu_color'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['submenu_color_link'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Sub Menu | Link Color'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('submenu_color_link'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['submenu_color_link_hover'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Sub Menu | Link Color Hover'),
//    '#group'  => 'menu_color',
//    '#default_value' => theme_get_setting('submenu_color_link_hover'),
//    '#attributes' => array('class' => array('color-picker') )
//  );

  //Customize Footer Color
//  $form['options']['settings_customize']['footer_customize_color'] = array(
//    '#type' => 'details',
//    '#open' => TRUE,
//    '#attributes' => array(),
//    '#title' => t('Footer Color'),
//    '#weight' => -999,
//    '#group' => 'settings_customize',
//  );
//
//  $form['footer_bg'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Background'),
//    '#group'  => 'footer_customize_color',
//    '#default_value' => theme_get_setting('footer_bg'),
//    '#attributes' => array('class' => array('color-picker') )
//  );

//  $form['footer_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Link Color'),
//    '#group'  => 'footer_customize_color',
//    '#default_value' => theme_get_setting('footer_color'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['footer_color_link'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Link Color'),
//    '#group'  => 'footer_customize_color',
//    '#default_value' => theme_get_setting('footer_color_link'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['footer_color_link_hover'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Link Color Hover'),
//    '#group'  => 'footer_customize_color',
//    '#default_value' => theme_get_setting('footer_color_link_hover'),
//    '#attributes' => array('class' => array('color-picker') )
//  );

  //Customize Copyright Color
//  $form['options']['settings_customize']['copyright_customize_color'] = array(
//    '#type' => 'details',
//    '#open' => TRUE,
//    '#attributes' => array(),
//    '#title' => t('Copyright Color'),
//    '#weight' => -999,
//    '#group' => 'settings_customize',
//  );
//
//  $form['copyright_bg'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Background'),
//    '#group'  => 'copyright_customize_color',
//    '#default_value' => theme_get_setting('copyright_bg'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['copyright_color'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Link Color'),
//    '#group'  => 'copyright_customize_color',
//    '#default_value' => theme_get_setting('copyright_color'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['copyright_color_link'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Link Color'),
//    '#group'  => 'copyright_customize_color',
//    '#default_value' => theme_get_setting('copyright_color_link'),
//    '#attributes' => array('class' => array('color-picker') )
//  );
//
//  $form['copyright_color_link_hover'] =array(
//    '#type' => 'textfield',
//    '#class'  => 'input',
//    '#title' => t('Footer | Link Color Hover'),
//    '#group'  => 'copyright_customize_color',
//    '#default_value' => theme_get_setting('copyright_color_link_hover'),
//    '#attributes' => array('class' => array('color-picker') )
//  );


}




