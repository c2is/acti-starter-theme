<?php

namespace ActiCache;

final class CacheKeys
{

    /**
     * @param $postId int post ID
     * @return String block base cache key
     */
    public static function getBlockBaseCacheKey($postId)
    {
        return 'post-' . $postId . '/block/';
    }
}