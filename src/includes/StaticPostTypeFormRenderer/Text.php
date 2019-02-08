<?php
/**
 * Rendering a text field on edit screen.
 *
 * @see StaticPostTypeFormRendererLabel
 * @see StaticPostTypeFormRendererDescription
 *
 */
class StaticPostTypeFormRendererText
{
    /**
     * Render a text field.
     * This method calls `build` function and echo return value.
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
     * Build a text field.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - size: A size of the text field.
     * - placeholder: A placeholder.
     * TODO: improve option values structure
     * - label: A label text.
     * - description: A description that shows under the text field.
     * - description_class: A class attribute of the description section.
     * - description_style: A style attribute of the description section.
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
