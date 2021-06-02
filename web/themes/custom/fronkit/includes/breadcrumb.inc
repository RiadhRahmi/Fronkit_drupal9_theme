<?php
/**
 * @file
 * Theme and preprocess functions for breadcrumb.
 */



/**
 * Implements hook_preprocess_breadcrumb().
 */
function fronkit_preprocess_breadcrumb(&$variables)
{
  // We are creating a variable for the Current Page Title, to allow us to print
  // it after the breadcrumbs loop has run.
  $route_match = \Drupal::routeMatch();
  // Search page titles aren't resolved using the title_resolver service - it
  // will always return 'Search' instead of 'Search for [term]', which would
  // give us a breadcrumb of Home >> Search >> Search.
  // @todo Revisit after https://www.drupal.org/project/drupal/issues/2359901
  // @todo Revisit after https://www.drupal.org/project/drupal/issues/2403359
  $entity = $route_match->getParameter('entity');
  if ($entity instanceof SearchPageInterface) {
    $variables['current_page_title'] = $entity->getPlugin()->suggestedTitle();
  } else {
    $variables['current_page_title'] = \Drupal::service('title_resolver')->getTitle(\Drupal::request(), $route_match->getRouteObject());
  }
  // Since we are printing the 'Current Page Title', add the URL cache context.
  // If we don't, then we might end up with something like
  // "Home > Articles" on the Recipes page, which should read "Home > Recipes".
  $variables['#cache']['contexts'][] = 'url';
}