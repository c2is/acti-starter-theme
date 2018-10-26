<?php

add_action('init', 'templates_example');

/**
 * Usage example of ActiTemplate helper
 */
function templates_example()
{
    /* Get post object by its template */
    $post = \ActiTemplate\Template::getTemplatePageObject('page-contact.php');

    /* Get post ID by its template */
    $postID = \ActiTemplate\Template::getTemplatePageId('page-contact.php');

    /* Get post url by its template */
    $url = \ActiTemplate\Template::getTemplatePageUrl('page-contact.php');
}