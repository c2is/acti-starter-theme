<?php

namespace ContentBuilder\Admin;

final class BlockCacheAdmin
{
    const GLOBAL_CACHE_STATUS = 'options_cache_block_enable';
    const GLOBAL_CACHE_DURATION = 'options_cache_block_duration';

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
}