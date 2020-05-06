<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 06.05.2020
 * Time: 00:27
 */

namespace Drupal\mymodule\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for My Module module.
 */
class MyPageController extends ControllerBase {

  /**
   * Returns markup for our custom page.
   */
  public function customPage() {
    return [
      '#markup' => t('Welcome to my custom page!'),
    ];
  }

  /**
   * Returns markup for our custom page.
   */
  public function cats($name) {
    return [
      '#markup' => t('My cats name is: @name', [
        '@name' => $name,
      ]),
    ];
  }
}
