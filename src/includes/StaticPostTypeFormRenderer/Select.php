<?php
/**
 * Class for rendering select boxes.
 *
 * @see StaticPostTypeFormRendererLabel
 * @see StaticPostTypeFormRendererDescription
 *
 */
class StaticPostTypeFormRendererSelect
{
    /**
     * Render method for select boxes.
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
     * Build HTML for select boxes with a label and a description.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - values: Values of select options or values and labels of select options
     *     ex: $options['values'] = array('apple', 'orange', 'banana');
     *     ex: $options['values'] = array('r' => 'Red', 'g' => 'Green', 'b' => 'Blue');
     * - multiple: Is multiple. default: ''
     * - size: Size attribute for the text field. default: ''
     * - label: Label text.
     * - label_class: CSS class attribute for the label.
     * - label_style: Style attribute for the label.
     * - description: Description displayed below the text field.
     * - description_class: CSS class attribute for the description.
     * - description_style: Style attribute for the description.
     */
    public static function build($field_name, $saved_value, $options)
    {
        $size = isset($options['size']) ? ' size="' . $options['size'] . '"' : '';
        $multiple = isset($options['multiple']) && $options['multiple'] == true ? ' multiple' : '';
        if (!empty($multiple)) {
            if (!isset($options['label_style']) && !isset($options['label_class'])) {
                $options['label_class'] = 'for-multiple-select';
            }
        }

        $html = StaticPostTypeFormRendererLabel::build($field_name, $options);

        $saved_values = maybe_unserialize($saved_value);

        $style_and_class = StaticPostTypeFormRendererHelperStyleAndClass::forInput($options);

        $html .= '<select name="' . $field_name . '[]"' . $size . ' ' . $style_and_class . $multiple . '>';
        $html .= self::buildOptions($saved_values, $options);
        $html .= '</select>';

        $html .= StaticPostTypeFormRendererDescription::build($field_name, $options);

        return $html;
    }

    /**
     * Build HTML for select options.
     *
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - values: Values of select options or values and labels of select options
     */
    public static function buildOptions($saved_values, $options)
    {
        $html = '';
        foreach ($options['values'] as $value) {
            if (is_array($value)) {
                $option_value = array_keys($value)[0];
                $option_label = array_values($value)[0];
            } else {
                $option_value = $value;
                $option_label = $value;
            }
            if (is_array($saved_values) && in_array($option_value, $saved_values)) {
                $selected = ' selected';
            } else {
                $selected = '';
            }
            $html .= '<option value="' . $option_value . '"' . $selected . '>' . $option_label . '</option>';
        }

        return $html;
    }
}
