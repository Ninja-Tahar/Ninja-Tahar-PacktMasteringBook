<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 06.05.2020
 * Time: 01:14
 */

namespace Drupal\mymodule\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\RouteCollection;

class RouteSubscriber extends RouteSubscriberBase {

  /**
   * {@inheritdoc}
   */
  public function alterRoutes(RouteCollection $collection) {
    // Change path of mymodule.mypage to use a hyphen
    if ($route = $collection->get('mymodule.mypage')) {
      $route->setPath('/my-page');
    }
  }

}
