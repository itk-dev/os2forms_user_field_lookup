<?php

namespace Drupal\os2forms_user_field_lookup\Plugin\WebformElement;

use Drupal\Component\Utility\NestedArray;
use Drupal\Core\Form\FormStateInterface;
use Drupal\webform\Plugin\WebformElement\TextField;

/**
 * User field element.
 *
 * @WebformElement(
 *   id = "user_field_element",
 *   label = @Translation("User Field Element"),
 *   description = @Translation("User Field Element description"),
 *   category = @Translation("User fields")
 * )
 */
class UserFieldElement extends TextField {

  /**
   * {@inheritdoc}
   *
   * @phpstan-return array<string, mixed>
   */
  protected function defineDefaultProperties() {
    return [
      'readonly' => TRUE,
    ] + parent::defineDefaultProperties();
  }

  /**
   * {@inheritdoc}
   *
   * @phpstan-param array<string, mixed> $element
   * @phpstan-param array<string, mixed> $form
   */
  public function alterForm(array &$element, array &$form, FormStateInterface $form_state): void {
    if ($fieldName = $element['#os2forms_user_field_lookup_field_name'] ?? NULL) {
      if ($this->currentUser->isAuthenticated()) {
        /** @var \Drupal\user\Entity\User $user */
        $user = $this->entityTypeManager->getStorage('user')->load($this->currentUser->id());
        if ($user->hasField($fieldName)) {
          $value = $user->get($fieldName)->value;
          if (!empty($value)) {
            $element['#value'] = is_scalar($value) ? $value : json_encode($value);
            NestedArray::setValue($form['elements'], $element['#webform_parents'], $element);
          }
        }
      }
    }
  }

}
