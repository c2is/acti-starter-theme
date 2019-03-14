<?php

namespace ActiSocialShare;

interface ActiSocialShareInterface
{
    /**
     * Return social share url
     * @param $post \WP_Post
     * @return string url
     */
    public function getShareUrl($post);
}