<?php

add_action('admin_enqueue_scripts', 'actiAdminScripts');

/* Enqueue admin scripts for Acti starter theme */
function actiAdminScripts()
{
    wp_enqueue_script( 'acti-script', get_template_directory_uri() . '/assets/admin/js/acti-script.js' );
}