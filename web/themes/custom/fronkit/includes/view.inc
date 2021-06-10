<?php

/**
 * @file
 * Theme and preprocess functions for views.
 */

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
      break;
    case 'team':
      if ($view->current_display == 'block_2') {
        $variables['more']['#options']['attributes']['class'] = 'btn btn-primary btn-icon-arrow lift';
      }
      break;
    default:
      break;

  }
}
