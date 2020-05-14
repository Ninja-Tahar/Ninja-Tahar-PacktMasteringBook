<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 14.05.2020
 * Time: 06:16
 */

namespace Drupal\products\Plugin;

use Drupal\Component\Plugin\PluginInspectionInterface;

/**
 * Defines an interface for Importer plugins.
 */
interface ImporterInterface extends PluginInspectionInterface {

  /**
   * Performs the import. Returns TRUE if the import was successful or FALSE otherwise.
   *
   * @return bool
   */
  public function import();
}
