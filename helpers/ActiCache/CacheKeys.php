<?php

namespace ActiCache;

final class CacheKeys
{
    /**
     * @param $postId int post ID
     * @return string post base cache key
     */
    public static function getPostBaseCacheKey($postId)
    {
        return get_locale() . '/post-' . $postId . '/';
    }

    /**
     * @param $postId int post ID
     * @return String block base cache key
     */
    public static function getLayoutBaseCacheKey($postId)
    {
        return self::getPostBaseCacheKey($postId) . 'layout/';
    }
}