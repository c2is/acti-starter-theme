<?php

namespace ContentBuilder\Admin;

final class BlockPushPostAdmin
{
    /**
     * Set list of post types for block push_post
     *
     * @param $field
     * @return mixed
     */
    public static function loadPushPostTypes($field)
    {
        $postTypesArgs = array(
            'public' => true
        );

        $postTypes = get_post_types($postTypesArgs, 'objects');
        $field['choices'] = array();
        foreach ($postTypes as $postType)
        {
            /* Get post types that have category taxonomy */
            if ($postType->name == 'post' || in_array('category', $postType->taxonomies)) {
                $field['choices'][$postType->name] = $postType->label;
            }
        }

        return $field;
    }
}