<?php

namespace Drupal\mymodule\Plugin\Deriver;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\mymodule\Plugin\Layout\FlexibleLayout;
use Drupal\Core\Layout\LayoutDefinition;

/**
 * Makes a flexible layout for each layout config entity.
 */
class FlexibleLayoutDeriver extends DeriverBase
{

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition)
  {

    for ($i = 0; $i < 3; $i++) {
      $this->derivatives["flexible_layout" . $i] = new LayoutDefinition([
        'class' => FlexibleLayout::class,
        'label' => "flexible layout " . $i,
        'category' => "Custom",
        'regions' => ['main' => ['label' => 'Main content']],
        'template' => 'flexible-layout-' . $i,
        'path' => drupal_get_path('module', 'mymodule') . "/layouts/flexible-layout",
      ]);
    }

    return $this->derivatives;
  }

}
