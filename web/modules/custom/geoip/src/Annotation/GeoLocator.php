<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 07.05.2020
 * Time: 03:00
 */

namespace Drupal\geoip\Annotation;

use Drupal\Component\Annotation\Plugin;

/**
 * Defines a GeoLocator annotation object.
 *
 * @Annotation
 */
class GeoLocator extends Plugin {

  /**
   * The human-readable name.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $label;

  /**
   * A description of the plugin.
   *
   * @var \Drupal\Core\Annotation\Translation
   *
   * @ingroup plugin_translatable
   */
  public $description;

}
