<?php

/*
add_action('init', 'acti_menus');

add_filter('timber/context', 'add_menus_to_context');

function acti_menus()
{
    $menus = array(
        'main-menu' => 'Menu Principal',
        'footer-menu' => 'Menu Footer'
    );

    register_nav_menus($menus);
}

function add_menus_to_context()
{
    $context['main_menu'] = new \Timber\Menu( 'main-menu');

    return $context;
}
*/