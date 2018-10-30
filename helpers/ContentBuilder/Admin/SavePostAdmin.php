<?php

namespace ContentBuilder\Admin;

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
            while (have_rows('content_group_builder', $postId))
            {
                the_row();

                /* Loop the flexible content rows */
                if (have_rows('content_builder'))
                {
                    while (have_rows('content_builder'))
                    {
                        the_row();

                        $postContent = self::_buildPostContent($postContent, get_row_layout());
                    }
                }
            }
        }

        if ($postContent)
        {
            /* If calling wp_update_post, unhook this function so it doesn't loop infinitely */
            remove_action('save_post', '\ContentBuilder\Admin\SavePostAdmin::flexibleContentToPostContent');

            /* call wp_update_post update, which calls save_post again. E.g: */
            wp_update_post(array('ID' => $postId, 'post_content' => $postContent));

            /* re-hook this function */
            add_action('save_post', '\ContentBuilder\Admin\SavePostAdmin::flexibleContentToPostContent');
        }
    }

    /**
     * Build post content with content builder rows
     *
     * @param $postContent string
     * @param $layout string row layout
     * @return string
     */
    private static function _buildPostContent($postContent, $layout)
    {
        switch ($layout) :

            case 'text' :
                $postContent .= wp_strip_all_tags(get_sub_field('text_text'));
                break;

        endswitch;

        return $postContent;
    }
}