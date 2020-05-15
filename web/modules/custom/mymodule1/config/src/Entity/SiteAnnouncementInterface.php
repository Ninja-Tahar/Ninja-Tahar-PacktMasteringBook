<?php

namespace Drupal\mymodule1\Entity;

use Drupal\Core\Config\Entity\ConfigEntityInterface;

interface SiteAnnouncementInterface extends ConfigEntityInterface {

  /**
   * Gets the message value.
   *
   * @return string
   */
  public function getMessage();

}
