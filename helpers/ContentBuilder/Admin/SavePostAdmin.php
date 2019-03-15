<?php

namespace ContentBuilder\Admin;

use ContentBuilder\Context;

final class SavePostAdmin
{
    /**
     * Copy content of flexible content blocks into post content - usefull for Wordpress search engine
     *
     * @param $postId int Post ID
     */
    public static function flexibleContentToPostContent($postId) {

        /* Check it's not an auto save routine */
        if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
            return;

        $postContent = '';

        /* Loop the flexible groups content rows */
        if (have_rows('content_group_builder', $postId))
        {
            $contextData = array(
                'post' => get_post($postId),
                'user' => new \Timber\User()
            );
            $context = new Context();
            $context->setContext($contextData);
            while (have_rows('content_group_builder', $postId))
            {
                the_row();

                /* Loop the flexible content rows */
                if (have_rows('content_builder'))
                {
                    while (have_rows('content_builder'))
                    {
                        the_row();

                        /* Layout format in ACF field is my_layout, format it to MyLayout */
                        $layoutName = str_replace('_', '', ucwords(get_row_layout(), '_'));
                        $fieldClassName = 'ContentBuilder\Block\Build' . $layoutName . 'Block';
                        $fieldClass = new $fieldClassName($context);
                        $postContent .= $fieldClass->renderHtml();
                    }
                }
            }
        }

        if ($postContent)
        {
            /* If calling wp_update_post, unhook this function so it doesn't loop infinitely */
            remove_action('save_post', '\ContentBuilder\Admin\SavePostAdmin::flexibleContentToPostContent');

            /* call wp_update_post update, which calls save_post again. E.g: */
            wp_update_post(array('ID' => $postId, 'post_content' => wp_strip_all_tags($postContent)));

            /* re-hook this function */
            add_action('save_post', '\ContentBuilder\Admin\SavePostAdmin::flexibleContentToPostContent');
        }
    }
}