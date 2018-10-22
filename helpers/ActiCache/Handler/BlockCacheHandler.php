<?php

namespace ActiCache\Handler;

use ActiCache\CacheKeys;
use ActiCache\Pool;

final class BlockCacheHandler
{
    /**
     * Clear all Content builder blocks cache of selected post
     *
     * @param $post_id int Post ID
     */
    public static function clearPostBlocksCache($post_id)
    {
        $actiPool = new Pool();
        /* @var $pool \Stash\Pool */
        $pool = $actiPool->getPool();
        $baseCacheKey = CacheKeys::getBlockBaseCacheKey($post_id);

        $pool->deleteItem($baseCacheKey);
    }
}