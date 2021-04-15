<?php

namespace Drupal\mymodule\Plugin\Layout;

use Drupal\Core\Layout\LayoutDefault;

/**
 * A layout from our flexible layout builder.
 *
 * @Layout(
 *   id = "flexible_layout",
 *   deriver = "Drupal\mymodule\Plugin\Deriver\FlexibleLayoutDeriver",
 *   admin_label = @Translation("Flexible layout"),
 *   category = @Translation("Flexible layout category"),
 * )
 */
class FlexibleLayout extends LayoutDefault {

  /**
   * {@inheritdoc}
   */
  public function build(array $regions) {
    $render_array = parent::build($regions);
    // Since this is a flexible layout builder, you probably need to do
    // something special to render the layout, so we override the ::build()
    // method which is responsible for creating a render array.
    return $render_array;
  }

}
