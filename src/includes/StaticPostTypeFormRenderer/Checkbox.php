<?php
/**
 * Class for rendering checkboxes.
 *
 * @see StaticPostTypeFormRendererLabel
 * @see StaticPostTypeFormRendererDescription
 *
 */
class StaticPostTypeFormRendererCheckbox {
    /**
     * Render method for checkboxes.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return void
     */
  public static function render($field_name, $saved_value, $options) {
    echo self::build($field_name, $saved_value, $options);
  }

    /**
     * Build HTML for checkboxes with a label and a description.
     * Rendering `checked` by $saved_value
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - values: Values of checkboxes or values and labels of checkboxes
     *     ex: $options['values'] = array('apple', 'orange', 'banana');
     *     ex: $options['values'] = array('r' => 'Red', 'g' => 'Green', 'b' => 'Blue');
     * - label: Label text.
     * - label_class: CSS class attribute for the label.
     * - label_style: Style attribute for the label.
     * - description: Description displayed below the text field.
     * - description_class: CSS class attribute for the description.
     * - description_style: Style attribute for the description.
     */
  public static function build($field_name, $saved_value, $options) {
    $html = StaticPostTypeFormRendererLabel::build($field_name, $options);

    $style_and_class = StaticPostTypeFormRendererHelperStyleAndClass::forInput($options);

    $saved_values = maybe_unserialize($saved_value);
    foreach ($options['values'] as $value) {
      if (is_array($value)) {
        $option_value = array_keys($value)[0];
        $option_label = array_values($value)[0];
      } else {
        $option_value = $value;
        $option_label = $value;
      }
      if (is_array($saved_values) && in_array($option_value, $saved_values)) {
        $checked = ' checked';
      } else {
        $checked = '';
      }
      $html .= '<label class="for-checkbox-value">';
      $html .= '<input type="checkbox" name="' . $field_name . '[]" value="' . $option_value . '" ' . $style_and_class . $checked . '>';
      $html .= $option_label . '</label> ';
    }

    $html .= StaticPostTypeFormRendererDescription::build($field_name, $options);

    return $html;
  }
}
