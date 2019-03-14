<?php

namespace ActiSocialShare;

final class Twitter extends ActiSocialShare implements ActiSocialShareInterface
{
    /**
     * Return Twitter share url
     *
     * @param \WP_Post $post
     * @return string url
     */
    public function getShareUrl($post)
    {
        $postUrl = get_permalink($post);
        $postTitle = get_the_title($post);
        $twitterUrl = sprintf('https://twitter.com/intent/tweet?text=%2$s&url=%1$s', $postUrl, $postTitle);

        return $twitterUrl;
    }
}