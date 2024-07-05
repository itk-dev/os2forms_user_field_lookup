<?php

namespace Drupal\os2forms_user_field_lookup\Element;

use Drupal\Core\Render\Element\Textfield;

/**
 * User field element.
 *
 * @FormElement("user_field_element")
 */
class UserFieldElement extends Textfield {

  /**
   * {@inheritDoc}
   *
   * @phpstan-param array<string, mixed> $element
   * @phpstan-return array<string, mixed>
   */
  public static function preRenderTextfield($element): array {
    $element = parent::preRenderTextfield($element);
    static::setAttributes($element, ['os2forms-user-field-lookup']);

    return $element;
  }

}
