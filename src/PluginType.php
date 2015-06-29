<?php

/**
 * @file
 * Contains \Drupal\plugin\PluginType.
 */

namespace Drupal\plugin;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\StringTranslation\TranslationWrapper;
use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\DependencyInjection\DependencySerializationTrait;

/**
 * Provides a plugin type.
 */
class PluginType implements PluginTypeInterface {

  use DependencySerializationTrait;

  /**
   * The ID.
   *
   * @var string
   */
  protected $id;

  /**
   * The human-readable label.
   *
   * @var \Drupal\Core\StringTranslation\TranslationWrapper|string
   */
  protected $label;

  /**
   * The human-readable description.
   *
   * @var \Drupal\Core\StringTranslation\TranslationWrapper|string|null
   */
  protected $description;

  /**
   * The plugin type provider.
   *
   * @var string
   *   The provider is the machine name of the module that provides the plugin
   *   type.
   */
  protected $provider;

  /**
   * The plugin manager.
   *
   * @var \Drupal\Component\Plugin\PluginManagerInterface
   */
  protected $pluginManager;

  /**
   * Constructs a new instance.
   *
   * @param mixed[] $definition
   */
  protected function __construct(array $definition, PluginManagerInterface $plugin_manager) {
    $this->id = $definition['id'];
    $this->label = $definition['label'] = new TranslationWrapper($definition['label']);
    $this->description = $definition['description'] = isset($definition['description']) ? new TranslationWrapper($definition['description']) : NULL;
    $this->pluginManager = $plugin_manager;
    $this->provider = $definition['provider'];
  }

  /**
   * {@inheritdoc}
   */
  public static function createFromDefinition(ContainerInterface $container, array $definition) {
    return new static($definition, $container->get($definition['plugin_manager_service_id']));
  }

  /**
   * {@inheritdoc}
   */
  public function getId() {
    return $this->id;
  }

  /**
   * {@inheritdoc}
   */
  public function getLabel() {
    return $this->label;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function getProvider() {
    return $this->provider;
  }

  /**
   * {@inheritdoc}
   */
  public function getPluginManager() {
    return $this->pluginManager;
  }

}
