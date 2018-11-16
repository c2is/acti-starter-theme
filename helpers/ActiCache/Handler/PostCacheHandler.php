<?php

namespace ActiCache\Handler;

use ActiCache\CacheKeys;
use ActiCache\Pool;

final class PostCacheHandler
{
    /**
     * Clear all cache of selected post and rebuild it
     *
     * @param $postId int Post ID
     */
    public static function rebuildPostCache($postId)
    {
        self::clearPostCache($postId);

        $cacheEnabled = get_field('options_cache_layout_enable', 'option');
        if ($cacheEnabled) {
            self::buildPostCache($postId);
        }
    }

    /**
     * Clear all cache of selected post
     *
     * @param $postId int Post ID
     */
    public static function clearPostCache($postId)
    {
        $actiPool = new Pool();
        /* @var $pool \Stash\Pool */
        $pool = $actiPool->getPool();

        $baseCacheKey = CacheKeys::getLayoutBaseCacheKey($postId);
        $pool->deleteItem($baseCacheKey);
    }

    /**
     * Build cache of selected post
     *
     * @param $postId int Post ID
     */
    public static function buildPostCache($postId)
    {
        $postUrl = get_permalink($postId);
        $args = array(
            'timeout' => 5,
            'blocking' => true,
            'sslverify' => false
        );

        wp_remote_get($postUrl, $args);
    }
}