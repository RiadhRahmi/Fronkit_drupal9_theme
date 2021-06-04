<?php

/**
 * @file
 * Theme and preprocess functions for forms.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_theme_suggestions_HOOK_alter().
 */
function fronkit_theme_suggestions_form_alter(array &$suggestions, array &$variables)
{
  $element = $variables['element'];

  // Add a suggestion based on the form id name.
  if (isset($element['#form_id'])) {
    $suggestions[] = $variables['theme_hook_original'] . '__' . $element['#form_id'];
  }
}

/**
 * Implements hook_theme_suggestions_HOOK_alter().
 */
function fronkit_theme_suggestions_form_element_alter(array &$suggestions, array &$variables)
{
  $element = $variables['element'];

  // Add a suggestion based on the element type.
  if (isset($element['#type'])) {
    $suggestions[] = $variables['theme_hook_original'] . '__' . $element['#type'];
  }
}

/**
 * Implements hook_preprocess_input().
 */
function fronkit_preprocess_input(&$variables)
{
  $element = $variables['element'];

  // Add the element type to the theme.
  $variables['type'] = $element['#type'];

  $input_rounded_style = theme_get_setting('input_rounded_style');

  switch ($input_rounded_style) {
    case 'style-2':
      $variables['attributes']['class'][] = 'form-control-pill';
      break;
    case 'style-3':
      $variables['attributes']['class'][] = 'form-control-flat';
      break;
    default:
      break;
  }
}

///**
// * Implements theme_preprocess_textarea().
// */
//function bootstrap5_preprocess_textarea(&$variables) {
//  $variables['attributes']['class'][] = 'form-control';
//}


/**
 * Implements hook_preprocess_form_element().
 */
function fronkit_preprocess_form_element(&$variables)
{
  $element = $variables['element'];

  // Add required class for checkbox and radio labels.
  if (in_array($element['#type'], ['checkbox', 'radio'])) {
    $variables['label']['#attributes']['class'] = ['form-check-label'];
  }

}

/**
 * Implements hook_form_FORM_ID_alter().
 */
function fronkit_form_search_block_form_alter(&$form, FormStateInterface $form_state, $form_id)
{
  // Update the placeholder and size of field.
  $form['keys']['#title'] = '';
  $form['keys']['#size'] = 20;
  $form['keys']['#placeholder'] = t('Search');
}

/**
 * Implements hook_form_alter().
 */
function fronkit_form_alter(&$form, FormStateInterface $form_state, $form_id)
{
  $submit_button_class_bg = theme_get_setting('submit_button_class_bg');
  $submit_button_background = theme_get_setting('submit_button_background');
  $submit_button_rounded_style = theme_get_setting('submit_button_rounded_style');
  $submit_button_options = theme_get_setting('submit_button_options');

  switch ($submit_button_background) {
    case 'style-1':
      $form['actions']['submit']['#attributes']['class'][] = 'btn-' . $submit_button_class_bg;
      break;
    case 'style-2':
      $form['actions']['submit']['#attributes']['class'][] = 'btn-' . $submit_button_class_bg . '-soft';
      break;
    case 'style-3':
      $form['actions']['submit']['#attributes']['class'][] = 'btn-outline-' . $submit_button_class_bg;
      break;
    default:
      break;
  }

  switch ($submit_button_rounded_style) {
    case 'style-2':
      $form['actions']['submit']['#attributes']['class'][] = 'btn-' . $submit_button_class_bg . ' btn-pill';
      break;
    case 'style-3':
      $form['actions']['submit']['#attributes']['class'][] = 'btn-' . $submit_button_class_bg . ' btn-flat';
      break;
    default:
      break;
  }

  if (isset($submit_button_options['btn-animation']) && $submit_button_options['btn-animation'] != null) {
    $form['actions']['submit']['#attributes']['class'][] = 'lift';
  }

  if (isset($submit_button_options['btn-icon']) && $submit_button_options['btn-icon'] != null) {
    $form['actions']['submit']['#prefix'] = '<span class="btn-icon ' . $submit_button_background . '">';
    $form['actions']['submit']['#suffix'] = '</div>';
  }



}


