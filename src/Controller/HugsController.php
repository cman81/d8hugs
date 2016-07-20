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
    return [
      '#theme' => 'hug_page',
      '#from' => $from,
      '#to' => $to,
    ];
  }

}
