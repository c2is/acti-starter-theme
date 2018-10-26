<?php

add_action('init', 'templates_example');

/**
 * Usage example of ActiTemplate helper
 */
function templates_example()
{
    /* Get post url by its template */
    \ActiTemplate\Template::getTemplatePageUrl('page-contact.php');
}