<?php

add_action('admin_init', 'administrator_capabilities');

/**
 * Add administrator capabilities
 */
function administrator_capabilities()
{
    $role = get_role('administrator');

    $capabilitesManager = new \Capabilities\Capabilities();

    /* Add caps to allow role to manage 'acti' post type */
    $capabilitesManager::addPostTypeCaps('acti', $role);

    /* Add single cap to role */
    $capabilitesManager::addCap('custom_cap', $role);

    /* Add multiple caps to role */
    $caps = array('cap1', 'cap2', 'cap3');
    $capabilitesManager::addCaps($caps, $role);
}