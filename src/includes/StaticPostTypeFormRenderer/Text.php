<?php
/**
 * Class for rendering text fields.
 *
 * @see StaticPostTypeFormRendererLabel
 * @see StaticPostTypeFormRendererDescription
 *
 */
class StaticPostTypeFormRendererText
{
    /**
     * Render method for text fields.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return void
     */
    public static function render($field_name, $saved_value, $options)
    {
        echo self::build($field_name, $saved_value, $options);
    }

    /**
     * Build HTML for text fields with a label and a description.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - size: Size attribute for the text field. default: 40
     * - placeholder: A placeholder.
     * TODO: improve option values structure
     * - label: Label text.
     * - label_class: CSS class attribute for the label.
     * - label_style: Style attribute for the label.
     * - description: Description displayed below the text field.
     * - description_class: CSS class attribute for the description.
     * - description_style: Style attribute for the description.
     */
    public static function build($field_name, $saved_value, $options)
    {
        $html = StaticPostTypeFormRendererLabel::build($field_name, $options);

        $style_and_class = StaticPostTypeFormRendererHelperStyleAndClass::forInput($options);

        $size = isset($options['size']) ? $options['size'] : '40';
        $placeholder = isset($options['placeholder']) ? $options['placeholder'] : '';
        $html .= '<input name="' . $field_name . '" type="text" value="' . $saved_value . '" size="' . $size . '" placeholder="' . $placeholder . '" ' . $style_and_class . '>';

        $html .= StaticPostTypeFormRendererDescription::build($field_name, $options);

        return $html;
    }
}
