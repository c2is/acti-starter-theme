<?php

/* Create ACF global theme options */
if (function_exists('acf_add_options_page'))
{
    /* Admin menu general settings */
    $optionPageArgs = array(
        'page_title' => 'Options générales',
        'menu_title' => 'Options générales',
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_theme_settings',
    );
    acf_add_options_page($optionPageArgs);

    /* Admin submenu theme settings */
    $themeOptionPageArgs = array(
        'page_title' => 'Options générales du thème',
        'menu_title' => 'Cache',
        'parent_slug' => 'theme-general-settings',
        'capability' => 'edit_cache_general_settings',
    );
    acf_add_options_sub_page($themeOptionPageArgs);
}

