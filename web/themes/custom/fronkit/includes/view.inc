<?php

/**
 * @file
 * Theme and preprocess functions for views.
 */

/**
 * Implements hook_theme_suggestions_HOOK_alter().
 */
function fronkit_theme_suggestions_views_view_alter(array &$suggestions, array $variables) {
  // Add a suggestion based on the view name and the current display.
  $view = $variables['view'];
  $name = $view->id();
  $display = $view->current_display;
  $suggestions[] = 'views_view__' . $name;
  $suggestions[] = 'views_view__' . $name . '__' . $display;
}

/**
 * Implements hook_theme_suggestions_HOOK_alter().
 */
function fronkit_theme_suggestions_views_view_unformatted_alter(array &$suggestions, array $variables) {
  // Add a suggestion based on the view name and the current display.
  $view = $variables['view'];
  $name = $view->id();
  $display = $view->current_display;
  $suggestions[] = 'views_view_unformatted__' . $name . '__' . $display;
}




/**
 * Implements hook_preprocess_views_view.
 */
function fronkit_preprocess_views_view(&$variables)
{
  $view = $variables['view'];
  switch ($view->storage->id()) {
    case 'portfolio':
      if ($view->current_display == 'block_1') {
        $variables['more']['#options']['attributes']['class'] = 'btn btn-primary lift';
      }
  }
}
