<?php
/**
 * @file
 * Theme and preprocess functions for pages.
 */



/**
 * Implements hook_preprocess_page().
 */
function fronkit_preprocess_page(&$variables)
{
  // get theme settings
  $banner_background_setting = theme_get_setting('banner_background');
  $variables['banner_background'] = $banner_background_setting;

  // add background image to banner
  if ($banner_background_setting == "style-3") {
    $node = \Drupal::routeMatch()->getParameter('node_preview');
    // default background image
    $variables['url_banner_image'] = base_path() . '/themes/custom/fronkit/images/banner.jpg';
    if (isset($variables['node']) || !empty($node)) {
      if (empty($node)) {
        $node = $variables['node'];
      }
      $type = $node->getType();

      if ($type == 'webform') {
        if ($node->get('field_banner_image')->value) {
          $media_entity = $node->get('field_banner_image')->referencedEntities()[0];
          $variables['url_banner_image'] = file_create_url($media_entity->get('field_media_image')->entity->uri->value);
        }
      }
    }
  }

}

