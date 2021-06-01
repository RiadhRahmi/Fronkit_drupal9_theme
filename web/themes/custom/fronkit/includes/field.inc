<?php

/**
 * @file
 * Theme and preprocess functions for fields.
 */

use Drupal\Component\Render\FormattableMarkup;

/**
 * Implements hook_preprocess_field().
 */
function fronkit_preprocess_field(&$variables) {
  $element = $variables['element'];
  $field_name = $element['#field_name'];
  $bundle = $element['#bundle'];

  // Add bundle to template.
  $variables['bundle'] = $bundle;

  // Add a clean field name without the field_BUNDLE_ prefix.
  $safe_field_name_prefix = 'field_' . $bundle . '_';
  $variables['field_name_clean'] = str_replace($safe_field_name_prefix, '', $field_name);

  // add index to paragraphs
  if ($variables['field_name'] == 'field_process_items' || $variables['field_name'] == 'field_features') {
    foreach ($variables['items'] as $idx => $item) {
      $variables['items'][$idx]['content']['#paragraph']->index = $idx + 1;
    }
  }

  // add FormattableMarkup to title links
  if ($variables['field_type'] == 'link') {
    foreach ($variables['items'] as $key => $item) {
      $title = $variables['items'][$key]['content']['#title'];
      $variables['items'][$key]['content']['#title'] = new FormattableMarkup($title, []);
    }
  }

  // social links classes
  $social_links = [
    'field_facebook_link' => 'ri-facebook-fill ri-md',
    'field_linkedin_link' => 'ri-linkedin-fill ri-md',
    'field_twitter_link' => 'ri-twitter-fill ri-md'
  ];

  if (array_key_exists($variables['field_name'], $social_links)) {
    foreach ($variables['items'] as $key => $item) {
      $title = '<i class="' . $social_links[$variables['field_name']] . '"></i>';
      $variables['items'][$key]['content']['#title'] = new FormattableMarkup($title, []);
    }
  }

  // add FormattableMarkup to title links
  if ($variables['field_name'] == "field_icon") {
    foreach ($variables['items'] as $key => $item) {
      $field_value = $variables['items'][$key]['content']['#context']['value'];
      $variables['items'][$key]['content']['#context']['value'] = new FormattableMarkup($field_value, []);
    }
  }
}


/**
 * Implements hook_theme_suggestions_HOOK_alter().
 */
function fronkit_theme_suggestions_field_alter(array &$suggestions, array $variables, $hook)
{
  $element = $variables['element'];
  $suggestions[] = 'field__' . $element['#entity_type'] . '__' . $element['#field_name'] . '__' . $element['#bundle'] . '__' . $element['#view_mode'];
}
