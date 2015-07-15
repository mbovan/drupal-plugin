<?php

/**
 * Contains \Drupal\plugin\Plugin\Plugin\PluginSelector\PluginSelectorInterface.
 */

namespace Drupal\plugin\Plugin\Plugin\PluginSelector;

use Drupal\Component\Plugin\ConfigurablePluginInterface;
use Drupal\Component\Plugin\PluginInspectionInterface;
use Drupal\Component\Plugin\PluginManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\plugin\Plugin\PluginDefinitionMapperInterface;
use Drupal\plugin\PluginTypeInterface;

/**
 * Defines a plugin to select and configure another plugin.
 */
interface PluginSelectorInterface extends PluginInspectionInterface, ConfigurablePluginInterface {

  /**
   * Sets the human-readable label.
   *
   * @param string $label
   *
   * @return $this
   */
  public function setLabel($label);

  /**
   * Gets the human-readable label.
   *
   * @return string
   */
  public function getLabel();

  /**
   * Sets the human-readable description.
   *
   * @param string $description
   *
   * @return $this
   */
  public function setDescription($description);

  /**
   * Gets the human-readable description.
   *
   * @return string
   */
  public function getDescription();

  /**
   * Sets whether a plugin must be selected.
   *
   * @param bool $required
   *
   * @return $this
   */
  public function setRequired($required = TRUE);

  /**
   * Returns whether a plugin must be selected.
   *
   * @return bool
   */
  public function isRequired();

  /**
   * Sets whether a plugin's configuration must be collected.
   *
   * @param bool $collect
   *
   * @return $this
   */
  public function setCollectPluginConfiguration($collect = TRUE);

  /**
   * Gets whether a plugin's configuration must be collected.
   *
   * @return bool
   */
  public function getCollectPluginConfiguration();

  /**
   * Sets whether previously selected plugins must be kept.
   *
   * @param bool $keep
   *
   * @return $this
   *
   * @see self::getPreviouslySelectedPlugins()
   */
  public function setKeepPreviouslySelectedPlugins($keep = TRUE);

  /**
   * Gets whether previously selected plugins must be kept.
   *
   * @return bool
   */
  public function getKeepPreviouslySelectedPlugins();

  /**
   * Sets previously selected plugins.
   *
   * @param \Drupal\Component\Plugin\PluginInspectionInterface[] $plugins
   *
   * @return $this
   *
   * @see self::setKeepPreviouslySelectedPlugins()
   * @see self::setCollectPluginConfiguration()
   */
  public function setPreviouslySelectedPlugins(array $plugins);

  /**
   * Gets previously selected plugins.
   *
   * @return \Drupal\Component\Plugin\PluginInspectionInterface[]
   *
   * @see self::setKeepPreviouslySelectedPlugins
   */
  public function getPreviouslySelectedPlugins();

  /**
   * Gets the selected plugin.
   *
   * @return \Drupal\Component\Plugin\PluginInspectionInterface
   */
  public function getSelectedPlugin();

  /**
   * Sets the selected plugin.
   *
   * @param \Drupal\Component\Plugin\PluginInspectionInterface $plugin
   *
   * @return $this
   */
  public function setSelectedPlugin(PluginInspectionInterface $plugin);

  /**
   * Resets the selected plugin.
   *
   * @return $this
   */
  public function resetSelectedPlugin();

  /**
   * Sets the selectable plugin type.
   *
   * @param \Drupal\plugin\PluginTypeInterface $plugin_type
   *   The type of which to select plugins.
   * @param \Drupal\Component\Plugin\PluginManagerInterface|null $plugin_manager
   *   The plugin manager used to discover selectable plugins, or NULL to use
   *   the plugin type's default plugin manager.
   *
   * @return $this
   */
  public function setSelectablePluginType(PluginTypeInterface $plugin_type, PluginManagerInterface $plugin_manager = NULL);

  /**
   * Builds the selector form.
   *
   * @param mixed[] $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *
   * @return array
   *   The form structure.
   */
  public function buildSelectorForm(array $form, FormStateInterface $form_state);

  /**
   * Validates the selector form.
   *
   * @param mixed[] $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function validateSelectorForm(array &$form, FormStateInterface $form_state);

  /**
   * Submits the selector form.
   *
   * @param mixed[] $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   */
  public function submitSelectorForm(array &$form, FormStateInterface $form_state);

}
