<?php

namespace Drupal\hugs\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class HugConfigForm.
 *
 * @package Drupal\hugs\Form
 */
class HugConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'hugs.HugConfig',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'hug_config_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('hugs.HugConfig');
    $form['count'] = [
      '#type' => 'number',
      '#title' => $this->t('Count'),
      '#description' => $this->t('Default hug count'),
      '#default_value' => $config->get('count'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('hugs.HugConfig')
      ->set('count', $form_state->getValue('count'))
      ->save();
  }

}
