<?php
class StaticPostTypeFormRendererDescription
{
    /**
     * Render a description for the input.
     * This method calls `build` function and echo return value.
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
     * Build a description.
     *
     * @param string $field_name
     * @param array $options
     * @return string $html
     * 
     * $options
     * - description: A description.
     * - description_class: A class attribute of the description section. 
     * - description_style: A style attribute of the description section.
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
