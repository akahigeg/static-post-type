<?php
/**
 * A Class for rendering descriptions for inputs.
 *
 */
class StaticPostTypeFormRendererDescription
{
    /**
     * Render method for descriptions.
     *
     * @param string $field_name
     * @param array $options
     * @return void
     */
    public static function render($field_name, $options)
    {
        echo self::build($field_name, $options);
    }

    /**
     * Build HTML for descriptions.
     *
     * @param string $field_name
     * @param array $options
     * @return string $html
     * 
     * $options
     * - description: Description text.
     * - description_class: CSS class attribute for the description.
     * - description_style: Style attribute for the description.
     */
    public static function build($field_name, $options)
    {
        if (isset($options['description']) == false) {
            return;
        }

        $style_and_class = StaticPostTypeFormRendererHelperStyleAndClass::forDescription($options);

        return '<p ' . $style_and_class . '>' . $options['description'] . '</p>';
    }
}
