<?php

add_action('admin_init', 'administrator_capabilities');

/**
 * Add administrator capabilities
 */
function administrator_capabilities()
{
    $role = get_role('administrator');

    /* Add cap to manage Acti post type */
    manage_acti_post_type($role);
}

/**
 * Add caps to handle Acti custom post type
 * @param $role WP_Role
 */
function manage_acti_post_type($role)
{
    $role->add_cap('read_acti');
    $role->add_cap('delete_acti');
    $role->add_cap('edit_actis');
    $role->add_cap('edit_others_actis');
    $role->add_cap('publish_actis');
    $role->add_cap('read_private_actis');
    $role->add_cap('edit_actis');
}