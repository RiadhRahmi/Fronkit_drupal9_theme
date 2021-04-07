<?php

namespace Drupal\mymodule\Plugin\Layout;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Layout\LayoutDefault;
use Drupal\Core\Plugin\PluginFormInterface;

class MyLayoutClass extends LayoutDefault implements PluginFormInterface
{

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration()
  {
    return parent::defaultConfiguration() + [
        'layout_classes' => 'layout',
        'region_classes' => 'region',
      ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state)
  {
    $configuration = $this->getConfiguration();
    $form['layout_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Layout classes'),
      '#default_value' => $configuration['layout_classes'],
    ];

    $form['region_classes'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Region classes'),
      '#default_value' => $configuration['region_classes'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateConfigurationForm(array &$form, FormStateInterface $form_state)
  {
// any additional form validation that is required
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state)
  {
    $this->configuration['layout_classes'] = $form_state->getValue('layout_classes');
    $this->configuration['region_classes'] = $form_state->getValue('region_classes');
  }

}
