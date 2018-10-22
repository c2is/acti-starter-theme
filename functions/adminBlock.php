<?php

/* Functions to load ACF select values */
add_filter('acf/load_field/name=push_post_type', 'ContentBuilder\Admin\BlockPushPostAdmin::loadPushPostTypes');

/* Function to load default values */
add_filter('acf/load_field/name=block_cache_enable', 'ContentBuilder\Admin\BlockCacheAdmin::loadCacheStatusDefaultValue');
add_filter('acf/load_field/name=block_cache_duration', 'ContentBuilder\Admin\BlockCacheAdmin::loadCacheDurationDefaultValue');

add_action('save_post', 'ActiCache\Handler\BlockCacheHandler::clearPostBlocksCache', 1);