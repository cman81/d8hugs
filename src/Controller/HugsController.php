<?php

namespace Drupal\hugs\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class HugsController.
 *
 * @package Drupal\hugs\Controller
 */
class HugsController extends ControllerBase {

  /**
   * Hug.
   *
   * @return string
   *   Return Hello string.
   */
  public function hug($from, $to) {
    $message = $this->t('%from sends hugs to %to', [
      '%from' => $from,
      '%to' => $to,
    ]);

    return ['#markup' => $message];
  }

}
