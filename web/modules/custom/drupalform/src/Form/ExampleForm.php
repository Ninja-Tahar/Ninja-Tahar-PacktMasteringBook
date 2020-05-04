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

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class ExampleForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'drupalform_example_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    // Return array of Form API elements.
    $form['company_name'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Company name'),
    ];

    $form['phone'] = [
      '#type' => 'tel',
      '#title' => $this->t('Phone'),
    ];

    $form['email'] = [
      '#type' => 'email',
      '#title' => $this->t('Email'),
    ];

    $form['integer'] = [
      '#type' => 'number',
      '#title' => $this->t('Some integer'),
      // The increment or decrement amount
      '#step' => 1,
      // Miminum allowed value
      '#min' => 0,
      // Maxmimum allowed value
      '#max' => 100,
    ];

    $form['date'] = [
      '#type' => 'date',
      '#title' => $this->t('Date'),
      '#date_date_format' => 'Y-m-d',
    ];

    $form['website'] = [
      '#type' => 'url',
      '#title' => $this->t('Website'),
    ];

    $form['search'] = [
      '#type' => 'search',
      '#title' => $this->t('Search'),
      '#autocomplete_route_name' => FALSE,
    ];

    $form['range'] = [
      '#type' => 'range',
      '#title' => $this->t('Range'),
      '#min' => 0,
      '#max' => 100,
      '#step' => 1,
    ];

    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Save'),
    ];
    return $form;
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
  public function submitForm(array &$form,  FormStateInterface $form_state) {
    // Validation covered in later recipe, required to satisfy interface.
  }
}
