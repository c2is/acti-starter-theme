<?php

namespace ActiSocialShare;

class ActiSocialShare
{
    /**
     * @var WP_Post
     */
    protected $_post;

    /**
     * ActiSocialShare constructor.
     * @param $postId int post ID
     */
    public function __construct($postId)
    {
        $this->_post = null;

        if ($postId) {
            $this->_post = get_post($postId);
        }
    }
}