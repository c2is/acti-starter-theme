<?php

/* Functions to load ACF select values */
add_filter('acf/load_field/name=push_post_type', 'ContentBuilder\Admin\BlockPushPostAdmin::loadPushPostTypes');

/* Function to load default values */
add_filter('acf/load_field/name=layout_cache_enable', 'ContentBuilder\Admin\LayoutCacheAdmin::loadCacheStatusDefaultValue');
add_filter('acf/load_field/name=layout_cache_duration', 'ContentBuilder\Admin\LayoutCacheAdmin::loadCacheDurationDefaultValue');

/* Delete post layout cache on post save */
add_action('save_post', 'ActiCache\Handler\PostCacheHandler::rebuildPostCache', 1);

/* Show cache layout fields */
add_filter('acf/prepare_field', 'ContentBuilder\Admin\LayoutCacheAdmin::showLayoutCacheField');

/* Copy content of content builder into post content */
add_action('save_post', '\ContentBuilder\Admin\SavePostAdmin::flexibleContentToPostContent');
