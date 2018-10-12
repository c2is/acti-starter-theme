<?php

/**
 * The content-builder autoloader
 * @param $class
 */
function content_builder_autoloader($class)
{
    // We will use the autoloader only for this plugin
    // So we will allow only our namespace
    $parts = explode('\\', $class);
    if (!empty($parts[0]) && $parts[0] == 'ContentBuilder') {
        // We remove the main namespace (match with the "src" folder)
        array_shift($parts);
        // Rewrite the matching filename
        $filename = CONTENTBUILDER_BASE_PATH . CONTENTBUILDER_NAMESPACE_SRC . '/' . implode('/', $parts) . '.php';
        /** @noinspection PhpIncludeInspection */
        require_once($filename);
    }
}

spl_autoload_register('content_builder_autoloader');