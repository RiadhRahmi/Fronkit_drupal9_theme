<?php

/**
 * @file
 * Theme settings form for fronkit theme.
 */

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function fronkit_form_system_theme_settings_alter(&$form, &$form_state) {

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

}
