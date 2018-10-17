<?php

/**
 * Set block cache status based on global options cache status value
 *
 * @param $field
 * @return mixed
 */
function actiLoadCacheStatusDefaultValue($field)
{
    $globalCacheStatus = get_field('options_cache_block_enable', 'option');
    $field['default_value'] = $globalCacheStatus;

    return $field;
}
add_filter('acf/load_field/name=block_cache_enable', 'actiLoadCacheStatusDefaultValue');

/**
 * Set block cache status based on global options cache duration value
 *
 * @param $field
 * @return mixed
 */
function actiLoadCacheDurationDefaultValue($field)
{
    $globalCacheDuration = get_field('options_cache_block_duration', 'option');
    $field['default_value'] = $globalCacheDuration;

    return $field;
}
add_filter('acf/load_field/name=block_cache_duration', 'actiLoadCacheDurationDefaultValue');