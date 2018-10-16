<?php

add_action('admin_init', 'acti_administrator_capabilities');

/**
 * Add administrator capabilities
 */
function acti_administrator_capabilities()
{
    $role = get_role('administrator');

    $capabilitesManager = new \Capabilities\Capabilities();
    $capabilitesManager::addCap('edit_theme_general_settings', $role);
}