<?php
/**
 * Class for rendering reference select boxes that references other post types.
 *
 * @see StaticPostTypeFormRendererSelect
 * @see StaticPostTypeFormRendererLabel
 * @see StaticPostTypeFormRendererDescription
 *
 */
class StaticPostTypeFormRendererReference
{
    /**
     * Render method for reference select boxes
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
     * Build HTML for reference select boxes with a label and a description.
     *
     * @param string $field_name
     * @param string $saved_value
     * @param array $options
     * @return string $html
     *
     * $options
     * - reference_query_options: Parameters for get_posts for reference values.
     *
     * @see StaticPostTypeFormRendererSelect::build
     */
    public static function build($field_name, $saved_value, $options)
    {
        $relation_posts = get_posts($options['reference_query_options']);
        $html = '';
        if (empty($relation_posts)) {
            $html .= StaticPostTypeFormRendererLabel::build($field_name, $options);
            $html .= 'nothing to select';
            return $html;
        }

        // select
        $values = array();
        foreach ($relation_posts as $post) {
            array_push($values, array($post->ID => $post->post_title));
        }
        $options['values'] = $values;

        $html = StaticPostTypeFormRendererSelect::build($field_name, $saved_value, $options);

        return $html;
    }
}
