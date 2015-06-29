<?php

/**
 * @file
 * Contains \Drupal\plugin\PluginTypeInterface.
 */

namespace Drupal\plugin;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Defines a plugin type.
 */
interface PluginTypeInterface {

  /**
   * Creates a plugin type based on a definition.
   *
   * @param \Symfony\Component\DependencyInjection\ContainerInterface $container
   * @param mixed[] $definition
   *
   * @return static
   */
  public static function createFromDefinition(ContainerInterface $container, array $definition);

  /**
   * Gets the ID.
   *
   * @return string
   */
  public function getId();

  /**
   * Gets the human-readable label.
   *
   * @return \Drupal\Core\StringTranslation\TranslationWrapper|string
   */
  public function getLabel();

  /**
   * Gets the human-readable description.
   *
   * @return \Drupal\Core\StringTranslation\TranslationWrapper|string
   */
  public function getDescription();

  /**
   * Gets the plugin type provider.
   *
   * @return string
   *   The provider is the machine name of the module that provides the plugin
   *   type.
   */
  public function getProvider();

  /**
   * Gets the plugin manager.
   *
   * @return \Drupal\Component\Plugin\PluginManagerInterface
   */
  public function getPluginManager();

}
