<?php

namespace Drupal\mymodule1\Entity;

use Drupal\Core\Config\Entity\ConfigEntityBase;

/**
 * @ConfigEntityType(
 *   id ="announcement",
 *   label = @Translation("Site Announcement"),
 *   handlers = {
 *     "list_builder" = "Drupal\mymodule1\SiteAnnouncementListBuilder",
 *     "form" = {
 *       "default" = "Drupal\mymodule1\SiteAnnouncementForm",
 *       "add" = "Drupal\mymodule1\SiteAnnouncementForm",
 *       "edit" = "Drupal\mymodule1\SiteAnnouncementForm",
 *       "delete" = "Drupal\Core\Entity\EntityDeleteForm"
 *     }
 *   "route_provider" = {
 *       "html" = "Drupal\Core\Entity\Routing\DefaultHtmlRouteProvider",
 *     },
 *   },
 *   config_prefix = "announcement",
 *   admin_permission = "administer site configuration",
 *   entity_keys = {
 *     "id" = "id",
 *     "label" = "label"
 *   },
 *   links = {
 *     "canonical" = "/admin/config/system/site-announcements/{announcement}",
 *     "delete-form" = "/admin/config/system/site-announcements/manage/{announcement}/delete",
 *     "edit-form" = "/admin/config/system/site-announcements/manage/{announcement}",
 *     "collection" = "/admin/config/system/site-announcements",
 *   },
 *   config_export = {
 *     "id",
 *     "label",
 *     "message",
 *   }
 * )
 */
class SiteAnnouncement extends ConfigEntityBase implements SiteAnnouncementInterface {

  /**
   * The announcement's message.
   *
   * @var string
   */
  protected $message;

  /**
   * {@inheritdoc}
   */
  public function getMessage() {
    return $this->message;
  }


}
