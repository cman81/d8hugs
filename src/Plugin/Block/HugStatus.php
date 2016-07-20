<?php

namespace Drupal\hugs\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'HugStatus' block.
 *
 * @Block(
 *  id = "hug_status",
 *  admin_label = @Translation("Hug status"),
 * )
 */
class HugStatus extends BlockBase {

  
  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
         'hugging_enabled' => $this->t(''),
        ] + parent::defaultConfiguration();
  
 }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form['hugging_enabled'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Hugging enabled'),
      '#description' => $this->t('Check for Hugging enabled website'),
      '#default_value' => $this->configuration['hugging_enabled'],
      '#weight' => '0',
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['hugging_enabled'] = $form_state->getValue('hugging_enabled');
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $message = $this->configuration['hugging_enabled']
      ? $this->t('Now accepting hugs')
      : $this->t('No hugs :-(');

    return ['#markup' => $message];
  }

}
