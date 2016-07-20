<?php

namespace Drupal\hugs\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\hugs\HugTracker;

/**
 * Provides a 'ServiceBlock' block.
 *
 * @Block(
 *  id = "service_block",
 *  admin_label = @Translation("Service block"),
 * )
 */
class ServiceBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Drupal\hugs\HugTracker definition.
   *
   * @var \Drupal\hugs\HugTracker
   */
  protected $hugsHugTracker;
  /**
   * Construct.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param string $plugin_definition
   *   The plugin implementation definition.
   */
  public function __construct(
        array $configuration,
        $plugin_id,
        $plugin_definition,
        HugTracker $hugs_hug_tracker
  ) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->hugsHugTracker = $hugs_hug_tracker;
  }
  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('hugs.hug_tracker')
    );
  }
  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['service_block']['#markup'] = 'Last hugged: ' . $this->hugsHugTracker->getLastRecipient();

    return $build;
  }

}
