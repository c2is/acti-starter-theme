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
        'edit_theme_general_settings'
    );
    $capabilitesManager::addCaps($actiCaps, $role);
}