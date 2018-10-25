<?php

namespace ActiCache\Handler;

use ActiCache\Pool;

final class GlobalCacheHandler
{
    /**
     * Clear all cache of current language and site
     *
     * @return bool
     */
    public static function clearGlobalCache()
    {
        $actiPool = new Pool();
        /* @var $pool \Stash\Pool */
        $pool = $actiPool->getPool();

        $pool->deleteItem(get_locale());

        return $pool->purge();
    }
}