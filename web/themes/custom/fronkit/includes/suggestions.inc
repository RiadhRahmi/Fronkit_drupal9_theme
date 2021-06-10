<?php

/**
 * @file
 * Theme suggestions.
 */


/**
 * Implements hook_theme_suggestions_hook_alter().
 */
function fronkit_theme_suggestions_user_alter(array &$suggestions, array $variables) {
  // Add a suggestion based on the view mode.
  $suggestions[] = $variables['theme_hook_original'] . '__' . $variables['elements']['#view_mode'];
}
