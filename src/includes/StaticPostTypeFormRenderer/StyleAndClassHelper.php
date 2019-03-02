<?php
/**
 * Helper class for rendering style attribuets and class attributes
 *
 */
class StaticPostTypeFormRendererHelperStyleAndClass
{
    /**
     * Build style attributes and class attributes for inputs.
     *
     * @param array $options
     * @return string
     */
    public static function forInput($options)
    {
        $attrs = array();
        if (isset($options['class'])) {
            $attrs[] = 'class="' . $options['class'] . '"';
        }
        if (isset($options['style'])) {
            $attrs[] = 'style="' . $options['style'] . '"';
        }
        if (empty($attrs)) {
            $attrs[] = self::defaultInputStyle($options['input']);
        }
        return implode(' ', $attrs);
    }

    /**
     * Build style attributes and class attributes for labels.
     *
     * @param array $options
     * @return string
     */
    public static function forLabel($options)
    {
        $attrs = array();
        if (isset($options['label_class'])) {
            $attrs[] = 'class="' . $options['label_class'] . '"';
        }
        if (isset($options['label_style'])) {
            $attrs[] = 'style="' . $options['label_style'] . '"';
        }
        return implode(' ', $attrs);
    }

    /**
     * Build style attributes and class attributes for descriptions.
     *
     * @param array $options
     * @return string
     */
    public static function forDescription($options)
    {
        $attrs = array();
        if (isset($options['description_class'])) {
            $attrs[] = 'class="' . $options['description_class'] . '"';
        }
        if (isset($options['description_style'])) {
            $attrs[] = 'style="' . $options['description_style'] . '"';
        }
        if (empty($attrs)) {
            $attrs[] = 'class="static-post-type-description"';
        }
        return implode(' ', $attrs);
    }

    /**
     * Default style by input type.
     *
     * @param string $input_type
     * @return string
     */
    private static function defaultInputStyle($input_type)
    {
        switch ($input_type) {
            case 'text':
            case 'textarea':
                return ' style="margin-left: 10px;"';
                break;
        
            default:
                return ' style="margin-left: 10px;"';
                break;
      }
    }
}
