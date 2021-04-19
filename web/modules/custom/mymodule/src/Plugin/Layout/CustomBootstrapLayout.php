<?php

namespace Drupal\mymodule\Plugin\Layout;

use Drupal\layout_builder\Plugin\Layout\MultiWidthLayoutBase;

/**
 * Class CustomBootstrapLayout
 * @package Drupal\mymodule\Plugin\Layout
 */
class CustomBootstrapLayout extends MultiWidthLayoutBase {

  /**
   * {@inheritdoc}
   */
  protected function getWidthOptions() {
    return [
      '1-col' => '1 column',
      '2-col' => '2 column',
      '3-col' => '3 column',
      '4-col' => '4 column',
      '6-col' => '6 column',
      '12-col' => '12 column',
    ];
  }

  public function build(array $regions) {
    foreach ($this->getPluginDefinition()->getRegionNames() as $region_name) {
      if (array_key_exists($region_name, $regions)) {
        foreach ($regions[$region_name] as $uuid => $block) {
          // add class to block
          $regions[$region_name][$uuid]['#attributes']['class'][] = $this->getColumnWidth();
        }
      }
    }

    return parent::build($regions);
  }

  protected function getColumnWidth() {
    $col = [
      '1-col' => 'col-12',
      '2-col' => 'col-6',
      '3-col' => 'col-4',
      '4-col' => 'col-3',
      '6-col' => 'col-2',
      '12-col' => 'col',
    ];

    return $col[$this->configuration['column_widths']];
  }

}
