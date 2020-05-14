<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 14.05.2020
 * Time: 06:13
 */

namespace Drupal\products\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines an Importer item annotation object.
 *
 * @see \Drupal\products\Plugin\ImporterManager
 *
 * @Annotation
 */
class Importer extends Plugin {

  /**
   * The plugin ID.
   *
   * @var string
   */
  public $id;

  /**
   * The label of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;
}
