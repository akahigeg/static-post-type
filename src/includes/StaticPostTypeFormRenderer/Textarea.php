<?php
/**
 * Class for rendering textarea.
 *
 * @see StaticPostTypeFormRendererLabel
 * @see StaticPostTypeFormRendererDescription
 *
 */
class StaticPostTypeFormRendererTextarea
{
    /**
     * Render method for textareas.
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
     * Build HTML for textareas with a label and a description.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - rows: Rows attribute for the textarea. default: 5
     * - cols: Cols attribute for the textarea. defulat: 40
     * TODO: improve option values structure
     * - label: Label text.
     * - label_class: CSS class attribute for the label.
     * - label_style: Style attribute for the label.
     * - description: Description displayed below the textarea.
     * - description_class: CSS class attribute for the description.
     * - description_style: Style attribute for the description.
     */
    public static function build($field_name, $saved_value, $options)
    {
        if (!isset($options['label_style']) && !isset($options['label_class'])) {
            $options['label_class'] = 'for-textarea';
        }
        $html = StaticPostTypeFormRendererLabel::build($field_name, $options);

        $style_and_class = StaticPostTypeFormRendererHelperStyleAndClass::forInput($options);

        $rows = isset($options['rows']) ? $options['rows'] : '5';
        $cols = isset($options['cols']) ? $options['cols'] : '40';
        $html .= '<textarea name="' . $field_name . '" rows="' . $rows . '" cols="' . $cols . '" ' . $style_and_class . '>' . $saved_value . '</textarea>';

        $html .= StaticPostTypeFormRendererDescription::build($field_name, $options);

        return $html;
    }
}
