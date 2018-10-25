<?php

namespace ActiCache;

final class CacheKeys
{
    /**
     * @param $postId int post ID
     * @return String block base cache key
     */
    public static function getLayoutBaseCacheKey($postId)
    {
        return get_locale() . '/post-' . $postId . '/layout/';
    }
}