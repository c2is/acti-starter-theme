<?php

add_action('admin_init', 'actiAdministratorCapabilities');

/**
 * Add administrator capabilities
 */
function actiAdministratorCapabilities()
{
    $role = get_role('administrator');

    /* Capabilies to edit admin general theme settings and others */
    $actiCaps = array(
        'edit_theme_settings',
        'edit_cache_general_settings',
        'edit_builder_cache_layout'
    );
    \Capabilities\Capabilities::addCaps($actiCaps, $role);
}