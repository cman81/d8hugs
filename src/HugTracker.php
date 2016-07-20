<?php

namespace Drupal\hugs;
use Drupal\Core\State\State;

/**
 * Class HugTracker.
 *
 * @package Drupal\hugs
 */
class HugTracker {

  /**
   * Drupal\Core\State\State definition.
   *
   * @var \Drupal\Core\State\State
   */
  protected $state;
  /**
   * Constructor.
   */
  public function __construct(State $state) {
    $this->state = $state;
  }

}
