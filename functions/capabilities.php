<?php

add_action('admin_init', 'acti_administrator_capabilities');

/**
 * Add administrator capabilities
 */
function acti_administrator_capabilities()
{
    $role = get_role('administrator');

    $capabilitesManager = new \Capabilities\Capabilities();

    /* Capabilies to edit admin general theme settings and others */
    $actiCaps = array(
        'edit_theme_settings',
        'edit_cache_general_settings',
        'edit_builder_cache_layout'
    );
    $capabilitesManager::addCaps($actiCaps, $role);
}