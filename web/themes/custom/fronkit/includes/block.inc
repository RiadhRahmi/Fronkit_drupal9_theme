<?php

/**
 * @file
 * Theme and preprocess functions for block.
 */

use Drupal\Core\Render\Element;
use Drupal\Component\Utility\Html;


/**
 * Implements hook_theme_suggestions_HOOK_alter().
 */
function fronkit_theme_suggestions_block_alter(array &$suggestions, array $variables) {
  // Check for BlockContent.
  if ($variables['elements']['#configuration']['provider'] != 'block_content' || empty($variables['elements']['content']['#block_content'])) {
    return;
  }

  // Block suggestions for custom block bundles.
  if (isset($variables['elements']['content']['#block_content'])) {
    $bundle = $variables['elements']['content']['#block_content']->bundle();
    $view_mode = strtr($variables['elements']['#configuration']['view_mode'], '.', '_');
    array_splice($suggestions, 1, 0, 'block__bundle__' . $bundle);
    array_splice($suggestions, 1, 0, 'block__bundle__' . $bundle . '__' . $view_mode);
  }
}

/**
 * Implements hook_preprocess_block().
 */
function fronkit_preprocess_block(&$variables) {
  // Add a class to block title
  $variables['title_attributes']['class'][] = 'block-title';

  // Add a class indicating the custom block bundle.
  if (isset($variables['elements']['content']['#block_content'])) {

    $bundle = $variables['elements']['content']['#block_content']->bundle();
    $variables['attributes']['class'][] = Html::getClass('block-type-' . $bundle);

    $view_mode = strtr($variables['elements']['#configuration']['view_mode'], '.', '_');
    $variables['attributes']['class'][] = Html::getClass('view-mode-' . $view_mode);
  }

  // Add id to template.
  if (isset($variables['elements']['#id'])) {
    $variables['id'] = str_replace('_', '-', $variables['elements']['#id']);
  }

  // Check for BlockContent.
  if ($variables['elements']['#configuration']['provider'] != 'block_content' || empty($variables['elements']['content']['#block_content'])) {
    return;
  }

  // Get the block bundle.
  $block_content = $variables['elements']['content']['#block_content'];

  // Add bundle to template.
  $variables['bundle'] = $block_content->bundle();

}

/**
 * Implements template_preprocess_block_content().
 */
function fronkit_preprocess_block_content(&$variables) {
  // Helpful $content variable for templates.
  $variables += ['content' => []];
  foreach (Element::children($variables['elements']) as $key) {
    $variables['content'][$key] = $variables['elements'][$key];
  }
}


