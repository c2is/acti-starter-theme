<?php

//add_action('admin_init', 'administrator_capabilities');

function administrator_capabilities()
{
    $role = get_role('administrator');

    /* Add cap to manage Acti post type */
    manage_acti_post_type($role);
}

function manage_acti_post_type($role)
{
//    'edit_acti',
//        'read_post'          => 'read_acti',
//        'delete_post'        => 'delete_acti',
//        'edit_posts'         => 'edit_actis',
//        'edit_others_posts'  => 'edit_others_actis',
//        'publish_posts'      => 'publish_actis',
//        'read_private_posts' => 'read_private_actis',
//        'create_posts'       => 'edit_actis',
}