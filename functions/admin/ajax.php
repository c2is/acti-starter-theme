<?php

add_action('wp_ajax_nopriv_actiFlushGlobalCache', 'actiFlushGlobalCache');
add_action('wp_ajax_actiFlushGlobalCache', 'actiFlushGlobalCache');
function actiFlushGlobalCache()
{
    $flushCache = ActiCache\Handler\GlobalCacheHandler::clearGlobalCache();
    if ($flushCache) {
        $message = '<div class="notice notice-success is-dismissible">Le cache de la langue courante a été supprimé</div>';
    }
    else {
        $message = '<div class="notice notice-error is-dismissible">Une erreur est survenue pendant la suppression du cache</div>';
    }

    echo $message;

    wp_die();
}
