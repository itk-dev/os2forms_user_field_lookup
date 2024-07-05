<?php

namespace Drupal\os2forms_user_field_lookup\Element;

use Drupal\Core\Render\Element\Checkbox;

/**
 * User field element.
 *
 * @FormElement("user_field_element_checkbox")
 */
class UserFieldElementCheckbox extends Checkbox {

  /**
   * {@inheritDoc}
   *
   * @phpstan-param array<string, mixed> $element
   * @phpstan-return array<string, mixed>
   */
  public static function preRenderCheckbox($element): array {
    $element = parent::preRenderCheckbox($element);
    // @see https://stackoverflow.com/a/6905050
    $element['#attributes']['onclick'] = 'return false';
    static::setAttributes($element, ['os2forms-user-field-lookup']);

    return $element;
  }

}
