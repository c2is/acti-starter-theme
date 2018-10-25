<?php

add_action('admin_init', 'administrator_capabilities');

/**
 * Add administrator capabilities
 */
function administrator_capabilities()
{
    $role = get_role('administrator');

    /* Add caps to allow role to manage 'acti' post type */
    \Capabilities\Capabilities::addPostTypeCaps('acti', $role);

    /* Add single cap to role */
    \Capabilities\Capabilities::addCap('custom_cap', $role);

    /* Add multiple caps to role */
    $caps = array('cap1', 'cap2', 'cap3');
    \Capabilities\Capabilities::addCaps($caps, $role);
}