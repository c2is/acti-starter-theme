<?php

namespace ContentBuilder\Admin;

final class LayoutCacheAdmin
{
    const GLOBAL_CACHE_STATUS = 'options_cache_layout_enable';
    const GLOBAL_CACHE_DURATION = 'options_cache_layout_duration';

    /**
     * Set block cache status based on global options cache status value
     *
     * @param $field
     * @return mixed
     */
    public static function loadCacheStatusDefaultValue($field)
    {
        $globalCacheStatus = get_field(self::GLOBAL_CACHE_STATUS, 'option');
        $field['default_value'] = $globalCacheStatus;

        return $field;
    }

    /**
     * Set block cache status based on global options cache duration value
     *
     * @param $field
     * @return mixed
     */
    public static function loadCacheDurationDefaultValue($field)
    {
        $globalCacheDuration = get_field(self::GLOBAL_CACHE_DURATION, 'option');
        $field['default_value'] = $globalCacheDuration;

        return $field;
    }

    /**
     * Display the cache layout fields
     *
     * @param $field array ACF field
     * @return bool|array hide cache layout fields if user has not the permission to see it
     */
    public static function showLayoutCacheField($field)
    {
        if (self::isLayoutCacheField($field))
        {
            if(!current_user_can('edit_builder_cache_layout')) {
                return false;
            }
        }

        return $field;
    }

    /**
     * Check if field is from layout cache block
     *
     * @param $field array ACF field
     * @return bool true if field is from layout cache block
     */
    private static function isLayoutCacheField($field)
    {
        $isLayoutCacheField = false;
        switch ($field['_name'])
        {
            case 'cache':
            case 'layout_cache_enable':
            case 'layout_cache_duration':
                if (isset($field['parent']) && $field['parent']) {
                    preg_match("/\[([^\]]*)\]/", $field['prefix'], $matches);
                    $parentField = get_field_object($matches[1]);
                    if ($parentField['name'] == 'content_group_builder') {
                        $isLayoutCacheField = true;
                    }
                }
                break;
        }

        return $isLayoutCacheField;
    }
}