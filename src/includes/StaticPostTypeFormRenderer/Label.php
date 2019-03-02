<?php
/**
 * Class for rendering labels.
 *
 */
class StaticPostTypeFormRendererLabel {
    /**
     * Render method for labels.
     *
     * @param string $field_name
     * @param array $options
     * @return void
     */
  public static function render($field_name, $options) {
    echo self::build($field_name, $options);
  }

    /**
     * Build HTML for labels.
     *
     * @param string $field_name
     * @param array $options
     * @return string $html
     *
     * $options
     * - label: Label text.
     * - label_class: CSS class attribute for the label.
     * - label_style: Style attribute for the label.
     */
  public static function build($field_name, $options) {
    if (isset($options['label']) == false) {
      return;
    }

    $style_and_class = StaticPostTypeFormRendererHelperStyleAndClass::forLabel($options);

    return '<label for="' . $field_name . '" ' . $style_and_class . '>' . $options['label'] . '</label>';
  }
}
