<?php
/**
 * La getFormId méthode renvoie une chaîne unique pour identifier le formulaire, par exemple site_information,.
 * Vous pouvez rencontrer certains formulaires qui s'ajoutent _formà la fin de leur ID de formulaire.
 * Ce n'est pas obligatoire, et c'est juste une convention de dénomination souvent trouvée dans les versions précédentes de Drupal.
 *
 *La buildFormméthode est décrite dans les étapes suivantes. Les méthodes validateFormet submitFormsont toutes deux appelées
 * lors des processus d'API Form et sont traitées dans des recettes ultérieures.
 *
 * La buildFormméthode sera invoquée pour renvoyer les éléments de l'API Form qui sont rendus à l'utilisateur final.
 * Nous ajouterons un simple champ de texte pour demander un nom de société et un submitbouton.
 */

namespace Drupal\drupalform\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalform_example_form';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['drupalform.company'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Return array of Form API elements.
    $form['company_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Company name'),
      '#default_value' => $this->config('drupalform.company')->get('company_name'),
    ];

    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form,  FormStateInterface $form_state) {
    // Validation covered in later recipe, required to satisfy interface.
    if (!$form_state->isValueEmpty('company_name')) {
      // Value is set, perform validation.
      if (strlen($form_state->getValue('company_name')) <= 5) {
        // Set validation error.
        $form_state->setErrorByName('company_name', t('Company name is less than 5 characters'));
      }
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);
    $this->config('drupalform.company')->set('name', $form_state->getValue('company_name'));
  }
}
