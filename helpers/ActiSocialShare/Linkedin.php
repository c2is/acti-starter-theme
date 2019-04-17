<?php

namespace ActiSocialShare;

final class Linkedin extends ActiSocialShare implements ActiSocialShareInterface
{
    /**
     * Return Linkedin share url
     *
     * @param \WP_Post $post
     * @return string url
     */
    public function getShareUrl($post)
    {
        $postUrl = get_permalink($post);
        $linkedinUrl = sprintf('https://www.linkedin.com/shareArticle?mini=true&url=%1$s', $postUrl);

        return $linkedinUrl;
    }
}