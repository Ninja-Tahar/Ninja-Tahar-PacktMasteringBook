<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 14.05.2020
 * Time: 03:36
 */

namespace Drupal\products;

use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityListBuilder;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * EntityListBuilderInterface implementation responsible for the Product entities.
 */
class ProductListBuilder extends EntityListBuilder {

  /**
   * {@inheritdoc}
   */
  public function buildHeader() {
    $header['id'] = $this->t('Product ID');
    $header['name'] = $this->t('Name');
    $header['source'] = $this->t('Source');
    $header['bundle'] = $this->t('Bundle');
    return $header + parent::buildHeader();
  }

  /**
   * {@inheritdoc}
   */
  public function buildRow(EntityInterface $entity) {
    /* @var $entity \Drupal\products\Entity\Product */
    $row['id'] = $entity->id();
    $row['name'] = Link::fromTextAndUrl(
      $entity->label(),
      new Url(
        'entity.product.canonical', [
          'product' => $entity->id(),
        ]
      )
    );
    $row['source'] = $entity->getSource();
    var_dump($entity->getTypedData());die;
    $row['bundle'] = $entity->getBundle();
    return $row + parent::buildRow($entity);
  }

}
