<?php

namespace ActiTemplate;

final class Template
{
    /**
     * Retrieve page url from template
     *
     * @param $template string template name
     * @return null|string url of post
     */
    public static function getTemplatePageUrl($template)
    {
        $url = null;
        $args = array(
            'post_type' => 'page',
            'nopaging' => true,
            'meta_key' => '_wp_page_template',
            'meta_value' => $template
        );

        $pages = get_posts($args);
        if (!empty($pages)) {
            $url = get_permalink($pages[0]);
        }

        return $url;
    }
}