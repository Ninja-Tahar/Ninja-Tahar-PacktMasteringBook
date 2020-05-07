<?php
/**
 * Created by PhpStorm.
 * User: tahar
 * Date: 06.05.2020
 * Time: 22:25
 */

namespace Drupal\mymodule\Plugin\Block;

//use Drupal\block\BlockForm;
use Drupal\Core\Access\AccessResult;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @Block(
 *   id = "copyright_block",
 *   admin_label = @Translation("Copyright"),
 *   category = @Translation("Custom")
 * )
 */
class Copyright extends BlockBase {

//  /**
//   * {@inheritdoc}
//   */
//  public function build() {
//    $date = new \DateTime();
//    return [
//      '#markup' => t('Copyright @year&copy; My Company', [
//        '@year' => $date->format('Y'),
//      ]),
//    ];
//  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $date = new \DateTime();
    return [
      '#markup' => t('Copyright @year&copy; @company', [
        '@year' => $date->format('Y'),
        '@company' => $this->configuration['company_name'],
      ]),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    return [
      'company_name' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {

    $form['company_name'] = [
      '#type' => 'textfield',
      '#title' => t('Company name'),
      '#default_value' => $this->configuration['company_name'],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    $this->configuration['company_name'] = $form_state->getValue('company_name');
  }

//  /**
//   * {@inheritdoc}
//   */
//  protected function blockAccess(AccountInterface $account) {
//    $route_name = \Drupal::routeMatch()->getRouteName();
//    if ($account->isAnonymous() && !in_array($route_name,
//        array('user.login', 'user.logout'))) {
//      return AccessResult::allowed()
//        ->addCacheContexts(['route.name',
//          'user.roles:anonymous']);
//    }
//    return AccessResult::forbidden();
//  }
}
