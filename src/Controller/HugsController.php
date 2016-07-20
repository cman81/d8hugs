<?php

namespace Drupal\hugs\Controller;

use Drupal\Core\Controller\ControllerBase;

use Drupal\hugs\HugTracker;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Class HugsController.
 *
 * @package Drupal\hugs\Controller
 */
class HugsController extends ControllerBase {

  protected $hugTracker;

  public function __construct(HugTracker $tracker) {
    $this->hugTracker = $tracker;
  }

  /**
   * Design pattern - factory method
   * @see https://api.drupal.org/api/drupal/core!lib!Drupal!Core!DependencyInjection!ContainerInjectionInterface.php/function/ContainerInjectionInterface%3A%3Acreate/8.2.x
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @return static
   */
  public static function create(ContainerInterface $container) {
    return new static($container->get('hugs.hug_tracker'));
  }

  /**
   * Hug.
   *
   * @return string
   *   Return Hello string.
   */
  public function hug($from, $to, $count) {
    // TODO: clear the ServiceBlock block cache before addHug()

    $this->hugTracker->addHug($to);
    if (!$count) {
      $count = $this->config('hugs.HugConfig')->get('count');
    }
    return [
      '#theme' => 'hug_page',
      '#from' => $from,
      '#to' => $to,
      '#count' => $count
    ];
  }

}
