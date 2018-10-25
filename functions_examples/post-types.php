<?php

add_action('init', 'register_acti_post_type');

/**
 * Create the Acti post type
 */
function register_acti_post_type()
{
    $labels = array(
        'name' => 'Actis',
        'singular_name' => 'Acti',
    );

    $capabilities = array(
        'edit_post'          => 'edit_acti',
        'read_post'          => 'read_acti',
        'delete_post'        => 'delete_acti',
        'edit_posts'         => 'edit_actis',
        'edit_others_posts'  => 'edit_others_actis',
        'publish_posts'      => 'publish_actis',
        'read_private_posts' => 'read_private_actis',
        'create_posts'       => 'edit_actis',
    );

    $args = array(
        'labels' => $labels,
        'capabilities' => $capabilities,
        'taxonomies' => array('category'),
        'supports' => array('title', 'thumbnail', 'editor'),
        'show_in_rest' => true, // Usefull for Gutemberg
        'map_meta_cap' => true,
        'public' => true,
        'has_archive' => true
    );

    register_post_type('acti', $args);
}
